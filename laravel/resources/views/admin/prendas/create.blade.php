@extends('layouts.app')

@php
    $navActive = '';
@endphp

@section('title', 'Crear Prenda | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Crear prenda</h2>
                <p class="admin-subtitle">Completa los datos para registrar una prenda nueva.</p>
            </div>
        </div>

        @include('admin.prendas._form')
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/prendas-form.js', 'resources/js/partials.js'])
@endsection
