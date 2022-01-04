<?php

namespace App\Classes;

class Enc{

    public function encriptar($valor){
        return bin2hex(openssl_encrypt($valor, 'aes-256-cbc', '1061mF8QEvLtOE1SbINzDQ601bFnQTGm', OPENSSL_RAW_DATA, 'mQaWstCI4s5dJyvL'));
    }

    public function desencriptar($valor_encriptado){

        // verificar se a hash é valiida
        if(strlen($valor_encriptado)%2 != 0){
            return null;
        }

        return openssl_decrypt(hex2bin($valor_encriptado), 'aes-256-cbc', '1061mF8QEvLtOE1SbINzDQ601bFnQTGm', OPENSSL_RAW_DATA, 'mQaWstCI4s5dJyvL');
    }
}
