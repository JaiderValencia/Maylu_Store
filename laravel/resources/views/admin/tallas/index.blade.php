@extends('layouts.admin')

@php
    $navActive = 'tallas';
@endphp

@section('title', 'Admin Tallas | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Gestión de tallas</h2>
                <p class="admin-subtitle">Administra las tallas disponibles.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('admin.tallas.create') }}">Crear talla</a>
        </div>

        <form method="GET" action="{{ route('admin.tallas.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre..." style="padding: 10px; border: 1px solid var(--border-color); border-radius: 4px; flex-grow: 1; max-width: 300px;">
            <button type="submit" class="btn btn-primary">Buscar</button>
            @if(request('search'))
                <a href="{{ route('admin.tallas.index') }}" class="btn btn-outline">Limpiar</a>
            @endif
        </form>

        @if (session('status'))
            <div class="alert success" role="status">
                {{ session('status') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert" style="background-color: #fef3f2; border-color: #fecdca; color: #b42318;" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad de prendas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tallas as $talla)
                        <tr>
                            <td>{{ $talla->nombre }}</td>
                            <td>{{ $talla->prendas_count }}</td>
                            <td>
                                <div class="admin-actions">
                                    <a class="btn btn-outline" href="{{ route('admin.tallas.edit', $talla) }}">Editar</a>
                                    <form action="{{ route('admin.tallas.destroy', $talla) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-state" colspan="3">No hay tallas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection
