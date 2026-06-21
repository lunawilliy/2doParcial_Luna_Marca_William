<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSitioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'      => ['required', 'string', 'min:3', 'max:120'],
            'url'         => ['required', 'url', 'max:255'],
            'categoria'   => ['required', 'in:Educación,Herramientas,Noticias,Entretenimiento,Redes sociales,Otros'],
            'descripcion' => ['nullable', 'string', 'max:500'],
            'destacado'   => ['nullable', 'boolean'],
        ];
    }
}