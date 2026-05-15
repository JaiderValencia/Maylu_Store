<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Prenda;
use Illuminate\Http\Request;

class publicController extends Controller
{
    public function index()
    {
        $prendas = Prenda::orderByDesc('id')->take(3)->get();

        return view('index', compact('prendas'));
    }

    public function tienda(Request $request)
    {
        $categorias = Categoria::orderBy('nombre')->get();
        $activeCategory = $request->query('category');
        $activeCategory = is_numeric($activeCategory) ? (int) $activeCategory : null;

        $prendasQuery = Prenda::query()->orderByDesc('id');

        if ($activeCategory) {
            $prendasQuery->where('categoria_id', $activeCategory);
        }

        $prendas = $prendasQuery->get();
        $totalResultados = $prendas->count();

        return view('tienda', compact('prendas', 'categorias', 'totalResultados', 'activeCategory'));
    }

    public function tendencias()
    {
        $prendas = Prenda::orderByDesc('id')->take(3)->get();

        return view('tendencias', compact('prendas'));
    }

    public function producto(Request $request)
    {
        $prendaId = $request->query('id');

        if (! $prendaId) {
            abort(404);
        }

        $prenda = Prenda::with(['tallas' => function ($query) {
            $query->orderBy('nombre');
        }])->findOrFail($prendaId);

        return view('producto', compact('prenda'));
    }

    public function carrito()
    {
        return view('carrito');
    }

    public function contacto()
    {
        return view('contact');
    }

    public function login()
    {
        return view('login');
    }

    public function about()
    {
        return view('about');
    }
}
