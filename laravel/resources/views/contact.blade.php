@extends('layouts.app')

@php
    $navActive = 'contacto';
@endphp

@section('title', 'Contactos | Maylu Store')

@section('styles')
    @vite(['resources/css/contact.css', 'resources/css/home.css'])
@endsection

@section('content')
    <section class="contact-section">

        <h2>Contáctanos</h2>
        <p>Estamos aquí para ayudarte. Escríbenos o síguenos en nuestras redes.</p>

        <div class="contact-cards">

            <!-- WhatsApp -->
            <a href="https://wa.me/573001112233" target="_blank" class="contact-card">
                <i class="fa-brands fa-whatsapp"></i>
                <h3>WhatsApp</h3>
                <span>Escríbenos directamente</span>
            </a>

            <!-- Instagram -->
            <a href="https://www.instagram.com/maylu_store_/" target="_blank" class="contact-card">
                <i class="fa-brands fa-instagram"></i>
                <h3>Instagram</h3>
                <span>@maylu.store</span>
            </a>
        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
