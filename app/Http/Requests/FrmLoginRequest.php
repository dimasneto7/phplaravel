<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FrmLoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text_usuario' => ['required', 'email', 'max:30']
        ];
    }

    public function messages(){

        return [
            'text_usuario.required' => 'Tem que estar preenchido.',
            'text_usuario.email' => 'Tem que ser um email válido',
            'text_usuario.max' => 'Tem que ter no máximo 30 caracteres'
        ];
    }
}
