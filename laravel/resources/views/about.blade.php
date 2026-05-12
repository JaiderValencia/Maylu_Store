@extends('layouts.app')

@php
    $navActive = 'inicio';
@endphp

@section('title', 'Nuestra Historia |Maylu Store')

@section('styles')
    @vite(['resources/css/about.css', 'resources/css/home.css'])
@endsection

@section('content')
    <!-- HERO -->
    <section class="about-hero">
        <div class="overlay">
            <h1>Somos Maylu</h1>
            <span>Moda femenina pensada para resaltar tu esencia</span>
        </div>
    </section>

    <!-- CONTENIDO -->
    <section class="about-content container">

        <div class="about-block">
            <h2>Nuestra historia</h2>
            <p>
                Maylu nace del sueño de emprender y crear una marca que represente la autenticidad,
                la confianza y el estilo de cada mujer. Buscamos que cada prenda no solo siga
                tendencias, sino que conecte con tu personalidad.
            </p>
        </div>

        <div class="about-block">
            <h2>Nuestros valores</h2>
            <ul>
                <li>✨ Diseño con intención</li>
                <li>💛 Calidad en cada detalle</li>
                <li>👗 Estilo versátil</li>
                <li>🤍 Confianza y autenticidad</li>
            </ul>
        </div>

    </section>

    <!-- MASCOTAS -->
    <section class="about-pets">
        <h2>El origen de Maylu</h2>

        <p>
            El nombre Maylu nace de dos seres muy especiales: nuestras mascotas.
            Ellas representan amor, compañía y autenticidad, valores que queremos
            transmitir en cada una de nuestras prendas.
        </p>

        <div class="pets-gallery">
            <img src="{{ asset('images/maya y luna.jpeg') }}" alt="Mascotas">
        </div>
        <p class="maylu-name">
        <span class="highlight">May</span>a ♥ <span class="highlight">Lu</span>na
    </p>
        </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
