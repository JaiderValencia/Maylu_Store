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
    <section class="producto-detalle">
        <!-- IMAGEN -->
        <div class="producto-img">
            <img id="imagenProducto" src="" alt="">
        </div>

        <!-- INFORMACIÓN -->
        <div class="producto-info">
            <h2 id="nombreProducto"></h2>
            <p id="descripcionProducto"></p>
            <span id="precioProducto" class="precio"></span>

            <h4>Tallas</h4>
            <div class="tallas">
                <button>Talla S</button>
                <button>Talla M</button>
                <button>Talla L</button>
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
