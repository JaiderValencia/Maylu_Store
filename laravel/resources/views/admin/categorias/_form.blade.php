@php
    $isEdit = isset($categoria) && $categoria->exists;
    $formAction = $isEdit ? route('admin.categorias.update', $categoria) : route('admin.categorias.store');
    $submitLabel = $isEdit ? 'Actualizar categoría' : 'Crear categoría';
@endphp

@if ($errors->any())
    <div class="form-errors" role="alert">
        Revisa los campos marcados.
    </div>
@endif

<form class="admin-form" method="POST" action="{{ $formAction }}">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="form-grid">
        <div class="form-group full">
            <label for="nombre">Nombre de la categoría</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $categoria->nombre ?? '') }}"
                required
                minlength="3"
                maxlength="50"
            >
            @error('nombre')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-actions">
        <button class="btn btn-primary" type="submit">{{ $submitLabel }}</button>
        <a class="btn btn-outline" href="{{ route('admin.categorias.index') }}">Volver</a>
    </div>
</form>
