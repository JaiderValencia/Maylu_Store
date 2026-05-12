@extends('layouts.app')

@php
    $navActive = 'login';
    $mobileShopLabel = 'Categorias';
    $mobileMenuNote = 'menu solo para el menu';
@endphp

@section('title', 'Login | Maylu Store')

@section('styles')
    @vite(['resources/css/home.css', 'resources/css/login.css'])
@endsection

@section('content')
    <!--Formulario de inicio de sesión-->
    <div class="login-container">
        <form id="loginForm">

            <h2>Iniciar Sesión</h2>

            <!-- EMAIL -->
            <div class="form-group">
                <label>Correo</label>
                <input type="email" id="email" placeholder="ejemplo@mail.com" required>
            </div>

            <!-- CONTRASEÑA -->
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" id="password" required>
            </div>

            <!-- BOTÓN -->
            <button type="submit">Ingresar</button>
            <p id="mensaje"></p>
        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/login.js', 'resources/js/partials.js'])
@endsection
