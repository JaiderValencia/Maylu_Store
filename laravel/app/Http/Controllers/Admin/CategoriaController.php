<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Models\Categoria;
use App\Models\Prenda;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoriaController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');
        
        $query = Categoria::withCount('prendas')->orderBy('nombre');

        if ($search) {
            $query->where('nombre', 'like', '%' . $search . '%');
        }

        $categorias = $query->get();

        return view('admin.categorias.index', compact('categorias', 'search'));
    }

    public function create(): View
    {
        $categoria = new Categoria();

        return view('admin.categorias.create', compact('categoria'));
    }

    public function store(StoreCategoriaRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Categoria::create([
            'nombre' => $validated['nombre'],
        ]);

        return redirect()
            ->route('admin.categorias.index')
            ->with('status', 'Categoría creada.');
    }

    public function edit(Categoria $categoria): View
    {
        return view('admin.categorias.edit', compact('categoria'));
    }

    public function update(UpdateCategoriaRequest $request, Categoria $categoria): RedirectResponse
    {
        $validated = $request->validated();

        $categoria->update([
            'nombre' => $validated['nombre'],
        ]);

        return redirect()
            ->route('admin.categorias.index')
            ->with('status', 'Categoría actualizada.');
    }

    public function destroy(Categoria $categoria): RedirectResponse
    {
        if ($categoria->prendas()->count() > 0) {
            return redirect()
                ->route('admin.categorias.reassign', $categoria)
                ->with('error', 'No se puede eliminar la categoría porque tiene prendas asociadas. Reasigne las prendas a otra categoría antes de eliminar.');
        }

        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('status', 'Categoría eliminada.');
    }

    public function reassign(Categoria $categoria): View
    {
        $otrasCategorias = Categoria::where('id', '!=', $categoria->id)->orderBy('nombre')->get();
        $prendasCount = $categoria->prendas()->count();

        return view('admin.categorias.reassign', compact('categoria', 'otrasCategorias', 'prendasCount'));
    }

    public function processReassign(Request $request, Categoria $categoria): RedirectResponse
    {
        $request->validate([
            'nueva_categoria_id' => 'required|exists:categorias,id',
        ], [
            'nueva_categoria_id.required' => 'Debe seleccionar una nueva categoría.',
            'nueva_categoria_id.exists' => 'La categoría seleccionada no es válida.',
        ]);

        if ($request->nueva_categoria_id == $categoria->id) {
            return redirect()->back()->withErrors(['nueva_categoria_id' => 'Debe seleccionar una categoría diferente.']);
        }

        Prenda::where('categoria_id', $categoria->id)->update([
            'categoria_id' => $request->nueva_categoria_id
        ]);

        $categoria->delete();

        return redirect()
            ->route('admin.categorias.index')
            ->with('status', 'Prendas reasignadas y categoría eliminada exitosamente.');
    }
}
