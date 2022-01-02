<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text_usuario' => ['required', 'email'],
            'text_senha' => ['required', 'min:3', 'max:20']
        ];
    }

    public function messages(){
        return [
            'text_usuario.required' => 'O usuario é de preenchimento obrigatorio.',
            'text_usuario.email' => 'Usuario tem que ser um email válido.',
            'text_senha.required' => 'Senha é obrigatoria.',
            'text_senha.min' => 'A senha tem que ter no mínimo :min caracteres.',
            'text_senha.max' => 'A senha tem que ter no máximo :max caracteres.'
        ];
    }
}
