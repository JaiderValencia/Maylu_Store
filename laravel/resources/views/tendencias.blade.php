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
        <!--1-->
        <a href="{{ route('producto', ['id' => 1]) }}" class="product-link">
            <div class="feature-item">
                <div class="img-container">
                    <img src="{{ asset('images/productos/top negro.avif') }}" alt="Top negro">
                </div>
                <h3>Top Negro</h3>
                <p>Tela fresca, perfecta para ocasiones casuales o formales</p>
                <span>$45.000</span>
            </div>
        </a>    
        <!--2-->
        <a href="{{ route('producto', ['id' => 2]) }}" class="product-link">
            <div class="feature-item">
                <div class="img-container">
                    <img src="{{ asset('images/productos/jean wide legs.avif') }}" alt="Jean wide leg">
                </div>
                <h3>Jean Wide Leg</h3>
                <p>Estilo moderno, cómodo y versátil para cualquier ocasión.</p>
                <span>$75.000</span>
            </div>
        </a>
        <!--3-->
        <a href="{{ route('producto', ['id' => 3]) }}" class="product-link">
            <div class="feature-item">
                <div class="img-container">
                    <img src="{{ asset('images/productos/body negro.avif') }}" alt="Body negro">
                </div>
                <h3>Body Negro</h3>
                <p>Ideal para resaltar tu figura</p>
                <span>$55.000</span>
            </div>
        </a>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
