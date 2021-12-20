<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormularioRequest extends FormRequest
{
    public function rules()
    {
        return [
            'text_nome' => 'required|min:5|max:30',
            'text_telefone' => 'required|min:9|max:9',
            'text_email' => 'required|email'
        ];
    }
}
