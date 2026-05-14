@extends('layouts.admin')

@php
    $navActive = 'categorias';
@endphp

@section('title', 'Editar Categoría | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Editar categoría</h2>
                <p class="admin-subtitle">Modifica los datos de la categoría.</p>
            </div>
        </div>

        @include('admin.categorias._form')
    </section>
@endsection
