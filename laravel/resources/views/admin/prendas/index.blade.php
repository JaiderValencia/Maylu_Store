@extends('layouts.admin')

@php
    $navActive = 'prendas';
@endphp

@section('title', 'Admin Prendas | Maylu Store')

@section('styles')
    @vite(['resources/css/admin-prendas.css'])
@endsection

@section('content')
    <section class="admin-section">
        <div class="admin-header">
            <div>
                <h2>Gestion de prendas</h2>
                <p class="admin-subtitle">Administra las prendas disponibles.</p>
            </div>
            <a class="btn btn-primary" href="{{ route('admin.prendas.create') }}">Crear prenda</a>
        </div>

        <form method="GET" action="{{ route('admin.prendas.index') }}" style="margin-bottom: 20px; display: flex; gap: 10px;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Buscar por nombre..." style="padding: 10px; border: 1px solid var(--border-color); border-radius: 4px; flex-grow: 1; max-width: 300px;">
            <button type="submit" class="btn btn-primary">Buscar</button>
            @if(request('search'))
                <a href="{{ route('admin.prendas.index') }}" class="btn btn-outline">Limpiar</a>
            @endif
        </form>

        @if (session('status'))
            <div class="alert success" role="status">
                {{ session('status') }}
            </div>
        @endif

        <div class="admin-table-wrapper">
            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Precio</th>
                        <th>Tallas disponibles</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($prendas as $prenda)
                        <tr>
                            <td>{{ $prenda->nombre }}</td>
                            <td>{{ \Illuminate\Support\Str::limit($prenda->descripcion, 15, '...') }}</td>
                            <td>${{ number_format((float) $prenda->precio, 2) }}</td>
                            <td>
                                <div class="size-pills">
                                    @forelse ($prenda->tallas as $talla)
                                        <span class="size-pill">{{ $talla->nombre }}</span>
                                        @if (! $loop->last)
                                            <span class="size-separator">-</span>
                                        @endif
                                    @empty
                                        <span class="size-empty">Sin tallas</span>
                                    @endforelse
                                </div>
                            </td>
                            <td>
                                <div class="admin-actions">
                                    <a class="btn btn-outline" href="{{ route('admin.prendas.edit', $prenda) }}">Editar</a>
                                    <form action="{{ route('admin.prendas.destroy', $prenda) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Eliminar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="empty-state" colspan="5">No hay prendas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </section>
@endsection

@section('scripts')
    @vite(['resources/js/partials.js'])
@endsection
