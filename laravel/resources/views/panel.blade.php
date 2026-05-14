@extends('layouts.admin')

@php
    $navActive = 'panel';
@endphp

@section('title', 'Panel Administrador | Maylu Store')

@section('styles')
    @vite(['resources/css/home.css', 'resources/css/panel.css'])
@endsection

@section('content')
    <section class="admin-section" style="padding: 48px; text-align: center;">
        <h2>Bienvenido al Panel de Administrador</h2>
        <p style="margin-top: 20px; color: #555;">Utiliza el menú de navegación superior para gestionar prendas, categorías y tallas.</p>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
