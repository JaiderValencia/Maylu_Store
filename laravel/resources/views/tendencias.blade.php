@extends('layouts.app')

@php
    $navActive = 'tendencias';
    $mobileShopLabel = 'Categorias';
    $mobileMenuNote = 'menu solo para el menu';
@endphp

@section('title', 'Tendencias | Maylu Store')

@section('styles')
    @vite(['resources/css/home.css', 'resources/css/tendencias.css'])
@endsection

@section('content')
    <!--productos-->
    <div class="tendencia-header">
        <h2>Tendencias</h2>
    </div>

    <div class="products-grid">
        @foreach ($prendas as $prenda)
            <a href="{{ route('producto', ['id' => $prenda->id]) }}" class="product-link">
                <div class="feature-item">
                    <div class="img-container">
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($prenda->ruta_imagen) }}"
                            alt="{{ $prenda->nombre }}">
                    </div>
                    <h3>{{ $prenda->nombre }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($prenda->descripcion, 15, '...') }}</p>
                    <span>${{ number_format((float) $prenda->precio, 0, ',', '.') }}</span>
                </div>
            </a>
        @endforeach
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection