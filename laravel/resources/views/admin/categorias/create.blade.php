@extends('layouts.admin')

@php
    $navActive = 'categorias';
@endphp

@section('title', 'Crear Categoría | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Crear categoría</h2>
                <p class="admin-subtitle">Completa los datos para registrar una categoría nueva.</p>
            </div>
        </div>

        @include('admin.categorias._form')
    </section>
@endsection
