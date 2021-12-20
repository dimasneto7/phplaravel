<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormularioRequest;
use Illuminate\Http\Request;

class Main extends Controller
{
    public function index() {

        return view('formulario');
    }

    public function formulario_submit(FormularioRequest $request) {

        $request->validated();

        echo 'Tudo ok!';
    }
}
