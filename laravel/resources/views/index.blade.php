@extends('layouts.app')

@php
    $navActive = 'inicio';
@endphp

@section('title', 'Inicio | Maylu Store')

@section('meta')
    <meta name="Description" content="Tienda de ropa online, moda femenina, tendencias 2026" />
@endsection

@section('styles')
    @vite(['resources/css/home.css'])
@endsection

@section('content')
    <!--seccion del hero-->
    <section class="hero-section">
        <div class="hero-overlay"> <!--fondo que se va a fucionar con el contenido-->

            <div class="conteiner hero-content"> <!--tiene dos clases-->
                <span class="badge">100% Colombiana</span>
                <h1>Descubre tu look perfecto con Maylu</h1>
                <p class="lead">Prendas diseñadas para resaltar tu estilo único. Blusas, bodys, pantalones y más.</p>
                <div class="hero-buttons">
                    <a href="{{ route('tienda') }}" class="btn btn-primary">Ver Tienda</a>
                    <!--btn-primary definido en el global-->
                    <a href="{{ route('about') }}" class="btn btn-primary">Nuestra Historia</a>
                </div>
            </div>
        </div>
    </section>

    <!--Featured Menu-->
    <section class="section bg-warm featured-section">
        <div class="container text-center">
            <h2 class="section-title">Prendas en tendencia</h2>

            <div class="feature-grid">
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
            <a href="{{ route('tendencias') }}" class="btn btn-gold spacing">Ver tendencias</a>
        </div>
    </section>

    <!--intro section-->
    <section class="section intro-section">
        <div class="container">
            <div class="intro-grid"><!--va a tener dos partes una para la imagen y lo otro para contenido-->
                <div class="intro-image">
                    <img src="{{ asset('images/ropashop.jfif') }}" alt="Chica outfits" />
                </div>

                <div class="intro-text">
                    <h2>Moda con identidad propia</h2>
                    <p>En Maylu creemos que cada prenda cuenta una historia. Diseñamos ropa femenina que combina tendencia,
                        comodidad y autenticidad para que te sientas segura en cada momento.</p>

                    <ul class="features-list">
                        <li>
                            <i class="fa-solid fa-moon"></i> Diseños exclusivos
                        </li>
                        <li>
                            <i class="fa-solid fa-moon"></i> Comodidad y estilo
                        </li>
                        <li>
                            <i class="fa-solid fa-moon"></i> Envios en la zona metropolitana de Medellin
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!--Process section-->
    <section class="section process-section"> <!--el bg-dark lo unico que hace es modificar el fondo-->
        <div class="container">
            <div class=" text-center process-header">
                <span class="section-badge">Detalles que importan</span>
                <h2 class="section-title">Tu estilo empieza aquí</h2>
            </div>
            <div class="process-grid">
                <!--1-->
                <div class="process-card">
                    <div class="icon-container">
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h3>1. Diseño</h3>
                    <p>Cada prenda de Maylu es creada pensando en mujeres auténticas y seguras de sí mismas.
                        Nos inspiramos en las últimas tendencias de la moda para ofrecer diseños modernos, versátiles
                        y fáciles de combinar</p>
                </div>
                <!--2-->
                <div class="process-card">
                    <div class="icon-container">
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h3>2. Calidad</h3>
                    <p>Seleccionamos cuidadosamente cada tela para garantizar suavidad, resistencia y comodidad en cada uso.
                        Nuestras prendas están confeccionadas con atención al detalle</p>
                </div>

                <!--3-->
                <div class="process-card">
                    <div class="icon-container">
                        <i class="fa-regular fa-star"></i>
                    </div>
                    <h3>3. Estilos</h3>
                    <p>En Maylu creemos que el estilo es una forma de expresión personal. Por eso ofrecemos prendas que se
                        adaptan a diferentes personalidades y momentos, ayudándote a destacar tu esencia con confianza</p>
                </div>
            </div>
        </div>
    </section>
    <!--Gallery section-->
    <section class="section gallery-section">
        <div class="container">
            <div class="text-center gallery-header">
                <span class="section-badge">Prendas que encontraras</span>
                <h2 class="section-title">Vista previa</h2>
            </div>

            <div class="gallery-grid">
                <!--1-->
                <div class="space-y-4">
                    <img src="{{ asset('images/productos/gallery 1.avif') }}" alt="cafe interior" class="img-small" />
                    <img src="{{ asset('images/productos/gallery 2.avif') }}" alt="gallery 2" class="img-large" />
                </div>
                <!--2-->
                <div class="space-y-4 pt-8">
                    <img src="{{ asset('images/productos/gallery 3.avif') }}" alt="cafe interior" class="img-large" />
                    <img src="{{ asset('images/productos/gallery 4.avif') }}" alt="gallery 2" class="img-small" />
                </div>
                <!--3-->
                <div class="space-y-4">
                    <img src="{{ asset('images/productos/gallery 5.avif') }}" alt="cafe interior" class="img-large" />
                    <img src="{{ asset('images/productos/gallery 6.avif') }}" alt="gallery 2" class="img-small" />
                </div>
                <!--4-->
                <div class="space-y-4 pt-8">
                    <img src="{{ asset('images/productos/gallery 7.avif') }}" alt="cafe interior" class="img-large" />
                    <img src="{{ asset('images/productos/gallery 8.avif') }}" alt="gallery 2" class="img-small" />
                </div>

            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection