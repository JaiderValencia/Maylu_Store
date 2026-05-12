@extends('layouts.app')

@php
    $navActive = 'inicio';
@endphp

@section('title', 'Inicio | Maylu Store')

@section('meta')
    <meta
    name="Description"
    content="Tienda de ropa online, moda femenina, tendencias 2026"/>
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
                        <a href="{{ route('tienda') }}" class="btn btn-primary">Ver Tienda</a> <!--btn-primary definido en el global-->
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
            <a href="{{ route('tendencias') }}" class="btn btn-gold spacing">Ver tendencias</a>
        </div>
    </section>

    <!--intro section-->
    <section class="section intro-section">
        <div class="container">
            <div class="intro-grid"><!--va a tener dos partes una para la imagen y lo otro para contenido-->
                <div class="intro-image">
                    <img src="{{ asset('images/ropashop.jfif') }}" alt="Chica outfits"/>
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
                    <img src="{{ asset('images/productos/gallery 1.avif') }}" alt="cafe interior" class="img-small"/>
                    <img src="{{ asset('images/productos/gallery 2.avif') }}" alt="gallery 2" class="img-large"/>
                </div>
                <!--2-->
                <div class="space-y-4 pt-8">
                    <img src="{{ asset('images/productos/gallery 3.avif') }}" alt="cafe interior" class="img-large"/>
                    <img src="{{ asset('images/productos/gallery 4.avif') }}" alt="gallery 2" class="img-small"/>
                </div>
                <!--3-->
                <div class="space-y-4">
                    <img src="{{ asset('images/productos/gallery 5.avif') }}" alt="cafe interior" class="img-large"/>
                    <img src="{{ asset('images/productos/gallery 6.avif') }}" alt="gallery 2" class="img-small"/>
                </div>
                <!--4-->
                <div class="space-y-4 pt-8">
                    <img src="{{ asset('images/productos/gallery 7.avif') }}" alt="cafe interior" class="img-large"/>
                    <img src="{{ asset('images/productos/gallery 8.avif') }}" alt="gallery 2" class="img-small"/>
                </div>
                
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
