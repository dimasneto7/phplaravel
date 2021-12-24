<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Main extends Controller
{
    public function index() {


        // session()->flush();
        // session()->forget('nome');
        // session()->put('nome', 'joao');

        // $nome = session()->pull('nome');
        // echo $nome;

        // if(session()->has('nome')){
        //     echo 'sim';
        // } else {
        //     echo 'não';
        // }

        // session()->flash('valor_temp', 50000);

        // echo '<pre>';
        // print_r(session()->all());
        $this->teste();
    }

    private function teste(){
        if(session('valor_temp')){
            echo 'sim';
        } else {
            echo 'não';
        }
    }
}
