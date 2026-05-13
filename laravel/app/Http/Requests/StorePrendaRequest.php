<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePrendaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|min:3|max:120',
            'descripcion' => 'required|string|min:10|max:1000',
            'precio' => 'required|numeric|min:0.01',
            'imagen' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'categoria_id' => 'required|integer|exists:categorias,id',
            'tallas' => 'required|array|min:1',
            'tallas.*' => 'integer|exists:tallas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max' => 'El nombre no puede superar 120 caracteres.',
            'descripcion.required' => 'La descripcion es obligatoria.',
            'descripcion.string' => 'La descripcion debe ser texto.',
            'descripcion.min' => 'La descripcion debe tener al menos 10 caracteres.',
            'descripcion.max' => 'La descripcion no puede superar 1000 caracteres.',
            'precio.required' => 'El precio es obligatorio.',
            'precio.numeric' => 'El precio debe ser un numero.',
            'precio.min' => 'El precio debe ser mayor a 0.',
            'imagen.required' => 'La imagen es obligatoria.',
            'imagen.image' => 'La imagen debe ser un archivo de imagen.',
            'imagen.mimes' => 'La imagen debe ser jpg, jpeg, png o webp.',
            'imagen.max' => 'La imagen no puede superar 2MB.',
            'categoria_id.required' => 'La categoria es obligatoria.',
            'categoria_id.integer' => 'La categoria no es valida.',
            'categoria_id.exists' => 'La categoria seleccionada no existe.',
            'tallas.required' => 'Selecciona al menos una talla.',
            'tallas.array' => 'Las tallas seleccionadas no son validas.',
            'tallas.min' => 'Selecciona al menos una talla.',
            'tallas.*.integer' => 'Las tallas seleccionadas no son validas.',
            'tallas.*.exists' => 'La talla seleccionada no existe.',
        ];
    }
}
