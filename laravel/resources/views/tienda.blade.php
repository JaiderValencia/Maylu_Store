@extends('layouts.app')

@php
    $navActive = 'tienda';
@endphp

@section('title', 'Tienda | Maylu Store')

@section('styles')
    @vite(['resources/css/tienda.css', 'resources/css/home.css'])
@endsection

@section('content')
    <!--categorias-->
    <div class="sidebar">
        <h3>Categorías</h3>
        <ul>
            <li>
                <a
                    href="{{ route('tienda') }}"
                    class="category-link @if (empty($activeCategory)) active @endif"
                    data-category="todos"
                >
                    Todos
                </a>
            </li>
            @foreach ($categorias as $categoria)
                <li>
                    <a
                        href="{{ route('tienda', ['category' => $categoria->id]) }}"
                        class="category-link @if ((string) $categoria->id === (string) $activeCategory) active @endif"
                        data-category="{{ $categoria->id }}"
                    >
                        {{ $categoria->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
    <!--productos-->
    <div class="products-grid" id="productsGrid">
        @forelse ($prendas as $prenda)
            <a href="{{ route('producto', ['id' => $prenda->id]) }}" class="product-link">
                <div class="feature-item">
                    <div class="img-container">
                        <img
                            src="{{ \Illuminate\Support\Facades\Storage::url($prenda->ruta_imagen) }}"
                            alt="{{ $prenda->nombre }}"
                        >
                    </div>
                    <h3>{{ $prenda->nombre }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($prenda->descripcion, 15, '...') }}</p>
                    <span>${{ number_format((float) $prenda->precio, 0, ',', '.') }}</span>
                </div>
            </a>
        @empty
            <div class="admin-section">
                <div class="alert" role="status">No hay prendas para mostrar.</div>
            </div>
        @endforelse
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
