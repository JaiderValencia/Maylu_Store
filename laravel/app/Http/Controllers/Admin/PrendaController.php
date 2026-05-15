<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorePrendaRequest;
use App\Http\Requests\UpdatePrendaRequest;
use App\Models\Categoria;
use App\Models\Prenda;
use App\Models\Talla;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PrendaController extends Controller
{
    public function index(Request $request): View
    {
        $search = $request->query('search');

        $query = Prenda::with([
            'tallas' => function ($query) {
                $query->orderBy('nombre');
            }
        ])->orderByDesc('id');

        if ($search) {
            $query->where('nombre', 'like', '%' . $search . '%');
        }

        $prendas = $query->get();

        return view('admin.prendas.index', compact('prendas', 'search'));
    }

    public function create(): View
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $tallas = Talla::orderBy('nombre')->get();
        $prenda = new Prenda();
        $selectedTallas = [];

        return view('admin.prendas.create', compact('categorias', 'tallas', 'prenda', 'selectedTallas'));
    }

    public function store(StorePrendaRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $imagePath = $request->file('imagen')->store('prendas', 'public');

        try {
            DB::transaction(function () use ($validated, $imagePath) {
                $prenda = Prenda::create([
                    'nombre' => $validated['nombre'],
                    'descripcion' => $validated['descripcion'],
                    'precio' => $validated['precio'],
                    'ruta_imagen' => $imagePath,
                    'categoria_id' => $validated['categoria_id'],
                ]);

                $prenda->tallas()->sync($validated['tallas']);
            });
        } catch (\Throwable $exception) {
            // If the transaction fails, remove the uploaded file to avoid orphaned images.
            Storage::disk('public')->delete($imagePath);

            throw $exception;
        }

        return redirect()
            ->route('admin.prendas.index')
            ->with('status', 'Prenda creada.');
    }

    public function edit(Prenda $prenda): View
    {
        $prenda->load('tallas');
        $categorias = Categoria::orderBy('nombre')->get();
        $tallas = Talla::orderBy('nombre')->get();
        $selectedTallas = $prenda->tallas->pluck('id')->all();

        return view('admin.prendas.edit', compact('prenda', 'categorias', 'tallas', 'selectedTallas'));
    }

    public function update(UpdatePrendaRequest $request, Prenda $prenda): RedirectResponse
    {
        $validated = $request->validated();
        $oldImagePath = $prenda->ruta_imagen;
        $newImagePath = null;

        if ($request->hasFile('imagen')) {
            $newImagePath = $request->file('imagen')->store('prendas', 'public');
        }

        try {
            DB::transaction(function () use ($prenda, $validated, $newImagePath) {
                $payload = [
                    'nombre' => $validated['nombre'],
                    'descripcion' => $validated['descripcion'],
                    'precio' => $validated['precio'],
                    'categoria_id' => $validated['categoria_id'],
                ];

                if ($newImagePath) {
                    $payload['ruta_imagen'] = $newImagePath;
                }

                $prenda->update($payload);
                $prenda->tallas()->sync($validated['tallas']);
            });
        } catch (\Throwable $exception) {
            if ($newImagePath) {
                Storage::disk('public')->delete($newImagePath);
            }

            throw $exception;
        }

        if ($newImagePath && $oldImagePath && $oldImagePath !== $newImagePath) {
            // Old images are deleted only after DB updates succeed to avoid data loss.
            Storage::disk('public')->delete($oldImagePath);
        }

        return redirect()
            ->route('admin.prendas.index')
            ->with('status', 'Prenda actualizada.');
    }

    public function destroy(Prenda $prenda): RedirectResponse
    {
        $prenda->delete();

        return redirect()
            ->route('admin.prendas.index')
            ->with('status', 'Prenda eliminada.');
    }
}
