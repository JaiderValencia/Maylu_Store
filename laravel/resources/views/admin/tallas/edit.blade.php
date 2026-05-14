@extends('layouts.admin')

@php
    $navActive = 'tallas';
@endphp

@section('title', 'Editar Talla | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Editar talla</h2>
                <p class="admin-subtitle">Modifica los datos de la talla.</p>
            </div>
        </div>

        @include('admin.tallas._form')
    </section>
@endsection
