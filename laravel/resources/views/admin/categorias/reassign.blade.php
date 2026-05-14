@extends('layouts.admin')

@php
    $navActive = 'categorias';
@endphp

@section('title', 'Reasignar Prendas | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Reasignar y Eliminar Categoría</h2>
                <p class="admin-subtitle">La categoría <strong>{{ $categoria->nombre }}</strong> tiene <strong>{{ $prendasCount }}</strong> prenda(s) asociada(s).</p>
            </div>
        </div>

        @if ($errors->any())
            <div class="form-errors" role="alert">
                Revisa los campos marcados.
            </div>
        @endif

        <form class="admin-form" method="POST" action="{{ route('admin.categorias.process_reassign', $categoria) }}">
            @csrf

            <div class="alert" style="background-color: #fff3cd; border-color: #ffe69c; color: #664d03;" role="alert">
                Para poder eliminar esta categoría, primero debes reasignar sus prendas a otra categoría.
            </div>

            <div class="form-grid" style="margin-top: 20px;">
                <div class="form-group full">
                    <label for="nueva_categoria_id">Mover prendas a:</label>
                    <select id="nueva_categoria_id" name="nueva_categoria_id" required>
                        <option value="" disabled selected>Selecciona una categoría</option>
                        @foreach ($otrasCategorias as $otraCategoria)
                            <option value="{{ $otraCategoria->id }}" @selected((string) $otraCategoria->id === (string) old('nueva_categoria_id'))>
                                {{ $otraCategoria->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('nueva_categoria_id')
                        <p class="form-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="form-actions">
                <button class="btn btn-danger" type="submit">Reasignar y Eliminar</button>
                <a class="btn btn-outline" href="{{ route('admin.categorias.index') }}">Cancelar</a>
            </div>
        </form>
    </section>
@endsection
