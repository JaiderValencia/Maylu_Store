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
            <li><a href="{{ route('tienda', ['cat' => 'todos']) }}" class="category-link" data-category="todos">Todos</a></li>
            <li><a href="{{ route('tienda', ['cat' => 'blusas']) }}" class="category-link" data-category="blusas">Blusas</a></li>
            <li><a href="{{ route('tienda', ['cat' => 'pantalones']) }}" class="category-link" data-category="pantalones">Pantalones</a></li>
            <li><a href="{{ route('tienda', ['cat' => 'bodys']) }}" class="category-link" data-category="bodys">Bodys</a></li>
            <li><a href="{{ route('tienda', ['cat' => 'deportivos']) }}" class="category-link" data-category="deportivos">Deportivos</a></li>
        </ul>
    </div>
    <!--productos-->
    <div class="products-grid" id="productsGrid"></div>
@endsection

@section('scripts')
    @vite(['resources/js/product.js', 'resources/js/tienda.js', 'resources/js/partials.js'])
@endsection
