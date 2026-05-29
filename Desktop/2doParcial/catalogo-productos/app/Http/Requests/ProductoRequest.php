<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; 
    }

    public function rules(): array
    {
        // Capturar el ID del producto si estamos en una actualización
        $productoId = $this->route('producto') ? $this->route('producto')->id : null;

        return [
            'nombre' => ['required', 'string', 'max:150'], 
            'sku' => [
                'required', 
                'string', 
                'max:50', 
                Rule::unique('productos', 'sku')->ignore($productoId) 
            ],
            'precio' => ['required', 'numeric', 'min:0'], 
            'stock' => ['required', 'integer', 'min:0'], 
            'categoria_id' => ['required', 'exists:categorias,id'], 
            'disponible' => ['nullable', 'boolean']
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del producto es totalmente obligatorio.',
            'sku.required' => 'El código SKU es obligatorio.',
            'sku.unique' => 'Este código SKU ya está registrado en el inventario.',
            'precio.required' => 'Debe ingresar un precio.',
            'precio.min' => 'El precio no puede ser un número negativo.',
            'stock.required' => 'El inventario inicial es requerido.',
            'stock.min' => 'El stock de productos disponible no puede ser menor a cero.',
            'categoria_id.required' => 'Debe seleccionar una categoría válida.',
            'categoria_id.exists' => 'La categoría seleccionada no existe en el sistema.',
        ];
    }
}