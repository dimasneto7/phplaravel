<?php

namespace App\Classes;

class Random {

    public function teste(){
        return 'Random!!!';
    }

    public function SMSToken(){
        return rand(100000, 999999);
    }
}
