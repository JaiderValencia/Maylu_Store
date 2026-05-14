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
        <form method="POST" action="{{ route('login.post') }}">
            @csrf
            <h2>Iniciar Sesión</h2>

            @if ($errors->any())
                <div class="alert" style="background-color: #fef3f2; border-color: #fecdca; color: #b42318; padding: 10px; margin-bottom: 15px; border-radius: 5px;">
                    {{ $errors->first() }}
                </div>
            @endif

            <!-- EMAIL -->
            <div class="form-group">
                <label>Correo</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="ejemplo@mail.com" required>
            </div>

            <!-- CONTRASEÑA -->
            <div class="form-group">
                <label>Contraseña</label>
                <input type="password" name="password" required>
            </div>

            <!-- BOTÓN -->
            <button type="submit">Ingresar</button>
        </form>
    </div>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
