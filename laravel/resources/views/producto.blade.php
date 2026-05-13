@extends('layouts.app')

@php
    $navActive = 'inicio';
@endphp

@section('title', 'Descripcion | Maylu Store')

@section('styles')
    @vite(['resources/css/tienda.css', 'resources/css/producto.css', 'resources/css/home.css'])
@endsection

@section('content')
    <!-- CONTENIDO DEL PRODUCTO -->
    <section
        class="producto-detalle"
        data-product-id="{{ $prenda->id }}"
        data-product-name="{{ $prenda->nombre }}"
        data-product-price="{{ $prenda->precio }}"
    >
        <!-- IMAGEN -->
        <div class="producto-img">
            <img
                id="imagenProducto"
                src="{{ \Illuminate\Support\Facades\Storage::url($prenda->ruta_imagen) }}"
                alt="{{ $prenda->nombre }}"
            >
        </div>

        <!-- INFORMACIÓN -->
        <div class="producto-info">
            <h2 id="nombreProducto">{{ $prenda->nombre }}</h2>
            <p id="descripcionProducto">{{ $prenda->descripcion }}</p>
            <span id="precioProducto" class="precio">
                ${{ number_format((float) $prenda->precio, 0, ',', '.') }}
            </span>

            <h4>Tallas</h4>
            <div class="tallas">
                @forelse ($prenda->tallas as $talla)
                    <button type="button">Talla {{ $talla->nombre }}</button>
                @empty
                    <span class="tallas-empty">Sin tallas disponibles</span>
                @endforelse
            </div>
            <div class="cantidad">
                <label for="cantidadProducto">Cantidad</label>
                <input id="cantidadProducto" type="number" min="1" step="1" value="1" required>
            </div>
            <button id="agregarCarrito" class="btn btn-primary" type="button">Agregar al carrito</button>
            <p id="cartFeedback" class="cart-feedback" role="status" aria-live="polite"></p>

        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/product.js'])
@endsection
