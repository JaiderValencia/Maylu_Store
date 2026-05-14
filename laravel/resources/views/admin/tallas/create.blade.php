@extends('layouts.admin')

@php
    $navActive = 'tallas';
@endphp

@section('title', 'Crear Talla | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Crear talla</h2>
                <p class="admin-subtitle">Completa los datos para registrar una talla nueva.</p>
            </div>
        </div>

        @include('admin.tallas._form')
    </section>
@endsection
