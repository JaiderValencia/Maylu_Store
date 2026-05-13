@php
    $isEdit = isset($prenda) && $prenda->exists;
    $formAction = $isEdit ? route('admin.prendas.update', $prenda) : route('admin.prendas.store');
    $submitLabel = $isEdit ? 'Actualizar prenda' : 'Crear prenda';
    $selectedValues = old('tallas', $selectedTallas ?? []);
    $selectedCategory = old('categoria_id', $prenda->categoria_id);
@endphp

@if ($errors->any())
    <div class="form-errors" role="alert">
        Revisa los campos marcados.
    </div>
@endif

<form class="admin-form" data-prenda-form method="POST" action="{{ $formAction }}" enctype="multipart/form-data">
    @csrf
    @if ($isEdit)
        @method('PUT')
    @endif

    <div class="form-grid">
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre', $prenda->nombre) }}"
                required
                minlength="3"
                maxlength="120"
            >
            @error('nombre')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="precio">Precio</label>
            <input
                type="number"
                id="precio"
                name="precio"
                value="{{ old('precio', $prenda->precio) }}"
                required
                min="0.01"
                step="0.01"
            >
            @error('precio')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="categoria_id">Categoria</label>
            <select id="categoria_id" name="categoria_id" required>
                <option value="" disabled @selected(empty($selectedCategory))>Selecciona una categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->id }}" @selected((string) $categoria->id === (string) $selectedCategory)>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
            @error('categoria_id')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group full">
            <label for="descripcion">Descripcion</label>
            <textarea
                id="descripcion"
                name="descripcion"
                rows="4"
                required
                minlength="10"
                maxlength="1000"
            >{{ old('descripcion', $prenda->descripcion) }}</textarea>
            @error('descripcion')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group full">
            <label>Tallas disponibles</label>
            <div class="checkbox-grid">
                @foreach ($tallas as $talla)
                    <label class="checkbox-pill">
                        <input
                            type="checkbox"
                            name="tallas[]"
                            value="{{ $talla->id }}"
                            @checked(in_array($talla->id, $selectedValues))
                        >
                        <span>{{ $talla->nombre }}</span>
                    </label>
                @endforeach
            </div>
            <p class="form-error" data-size-error></p>
            @error('tallas')
                <p class="form-error">{{ $message }}</p>
            @enderror
            @error('tallas.*')
                <p class="form-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group full">
            <label for="imagen">Imagen</label>
            <input
                type="file"
                id="imagen"
                name="imagen"
                accept="image/*"
                @if (! $isEdit) required @endif
            >
            @error('imagen')
                <p class="form-error">{{ $message }}</p>
            @enderror

            @if ($isEdit && $prenda->ruta_imagen)
                <div class="current-image">
                    <span>Imagen actual</span>
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($prenda->ruta_imagen) }}" alt="Imagen de la prenda">
                </div>
            @endif
        </div>
    </div>

    <div class="form-actions">
        <button class="btn btn-primary" type="submit">{{ $submitLabel }}</button>
        <a class="btn btn-outline" href="{{ route('admin.prendas.index') }}">Volver</a>
    </div>
</form>
