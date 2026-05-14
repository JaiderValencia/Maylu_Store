@php
    $isEdit = isset($talla) && $talla->exists;
    $formAction = $isEdit ? route('admin.tallas.update', $talla) : route('admin.tallas.store');
    $submitLabel = $isEdit ? 'Actualizar talla' : 'Crear talla';
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
            <label for="nombre">Nombre de la talla</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $talla->nombre ?? '') }}"
                required
                minlength="1"
                maxlength="50"
            >
            @error('nombre')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="form-actions">
        <button class="btn btn-primary" type="submit">{{ $submitLabel }}</button>
        <a class="btn btn-outline" href="{{ route('admin.tallas.index') }}">Volver</a>
    </div>
</form>
