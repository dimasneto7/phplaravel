<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index(Request $request) {

        $this->executar($request);

        print_r($request->session()->get('CLIENTE')['nome']);

        die();
        echo '<pre>';
        print_r($request->session()->all());
    }

    private function executar(Request $request) {

        // colocar variaveis na sessão
        // $request->session()->put('apelido', 'Neto');

        // $cliente = [
        //     'nome' => 'Dimas',
        //     'apelido' => 'Neto',
        //     'fone' => '97233-4851'
        // ];

        // $request->session()->put(['CLIENTE' => $cliente]);

        // $request->session()->flush();
    }
}
