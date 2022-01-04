<?php

namespace App\Classes;

use Illuminate\Support\Facades\Log;

class Logger{

    public function log($level, $message){

        // tenta adicionar à mensagem a identificação do usuário ativo
        if(session()->has('usuario')){
            $message = '['.session('usuario')->usuario.'] - ' . $message;
        } else {
            $message = '[N/A] - ' . $message;
        }

        // registra uma entrada nos logs
        Log::channel('main')->$level($message);
    }
}
