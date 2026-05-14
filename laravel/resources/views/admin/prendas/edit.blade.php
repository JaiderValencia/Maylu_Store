@extends('layouts.admin')

@php
    $navActive = 'prendas';
@endphp

@section('title', 'Editar Prenda | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Editar prenda</h2>
                <p class="admin-subtitle">Actualiza los datos de la prenda.</p>
            </div>
        </div>

        @include('admin.prendas._form')
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/prendas-form.js', 'resources/js/partials.js'])
@endsection
