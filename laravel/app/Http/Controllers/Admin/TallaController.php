<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTallaRequest;
use App\Http\Requests\UpdateTallaRequest;
use App\Models\Talla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TallaController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $query = Talla::withCount('prendas')->orderBy('nombre');

        if ($search) {
            $query->where('nombre', 'like', '%' . $search . '%');
        }

        $tallas = $query->get();

        return view('admin.tallas.index', compact('tallas', 'search'));
    }

    public function create(): View
    {
        $talla = new Talla();
        return view('admin.tallas.create', compact('talla'));
    }

    public function store(StoreTallaRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        Talla::create([
            'nombre' => $validated['nombre'],
        ]);

        return redirect()
            ->route('admin.tallas.index')
            ->with('status', 'Talla creada.');
    }

    public function edit(Talla $talla): View
    {
        return view('admin.tallas.edit', compact('talla'));
    }

    public function update(UpdateTallaRequest $request, Talla $talla): RedirectResponse
    {
        $validated = $request->validated();

        $talla->update([
            'nombre' => $validated['nombre'],
        ]);

        return redirect()
            ->route('admin.tallas.index')
            ->with('status', 'Talla actualizada.');
    }

    public function destroy(Talla $talla): RedirectResponse
    {
        if ($talla->prendas()->count() > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar la talla porque tiene prendas asociadas.');
        }

        $talla->delete();

        return redirect()
            ->route('admin.tallas.index')
            ->with('status', 'Talla eliminada.');
    }
}
