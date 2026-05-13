<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class publicController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function tienda()
    {
        return view('tienda');
    }

    public function tendencias()
    {
        return view('tendencias');
    }

    public function producto()
    {
        return view('producto');
    }

    public function carrito()
    {
        return view('carrito');
    }

    public function contacto()
    {
        return view('contacto');
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
