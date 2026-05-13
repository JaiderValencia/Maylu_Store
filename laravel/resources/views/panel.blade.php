@extends('layouts.app')

@php
    $navActive = '';
@endphp

@section('title', 'Panel Administrador | Maylu Store')

@section('meta')
    <meta
    name="Description"
    content="Tienda de ropa online, moda femenina, tendencias 2026"/>
@endsection

@section('styles')
    @vite(['resources/css/home.css', 'resources/css/panel.css'])
@endsection

@section('content')
    <section class="admin-section">
        <h2>Panel Administrador</h2>

        <form id="productForm" class="admin-form">
            <!-- Nombre -->
            <input type="text" id="nombre" placeholder="Nombre de la prenda" required>

            <!-- Descripción -->
            <textarea id="descripcion" placeholder="Descripción" required></textarea>

            <!-- Precio -->
            <input type="number" id="precio" placeholder="Precio" required>

            <div class="sizes-container">
                <p>Tallas disponibles</p>

                <div class="sizes-buttons">
                    <button type="button" class="size-btn">XS</button>
                    <button type="button" class="size-btn">S</button>
                    <button type="button" class="size-btn">M</button>
                    <button type="button" class="size-btn">L</button>
                    <button type="button" class="size-btn">XL</button>
                </div>
            </div>

            <!-- Imagen -->
            <input type="file" id="imagen" accept="image/*" required>

            <!-- Botón -->
            <button type="submit">Agregar Producto</button>
        </form>
    </section>

    <!-- CONTENEDOR PRODUCTOS -->
    <section class="products-grid" id="productsContainer"></section>
@endsection

@section('scripts')
    @vite(['resources/js/panel.js', 'resources/js/partials.js'])
@endsection
