<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMovieRequest extends FormRequest
{
    public function authorize(): bool{
        return true;
    }

    //Es lo que tiene que cumplir el mensaje para que no sale el error de messages
    public function rules(): array{
        return [
            'title' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'description' => 'nullable|string',
        ];
    }

    //Son los errores que saltaran si el usuario pone algun dato mal
    public function messages(): array{
        return [
            'title.required' => 'El título es obligatorio.',
            'title.max' => 'El título no puede superar los 255 caracteres.',
            'year.required' => 'El año es obligatorio.',
            'year.integer' => 'El año debe ser un número.',
            'year.min' => 'El año no puede ser anterior a 1900.',
            'year.max' => 'El año no puede ser mayor al actual.',
        ];
    }
}
