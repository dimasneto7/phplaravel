<?php

namespace App\Classes;

class Tools{

    public function printData($data){
        if(is_array($data) || is_object($data)){
            echo '<pre>';
            print_r($data);
        } else {
            echo $data;
        }

        die('FIM');
    }

    public function teste(){
        echo 'LOLOLOLOLOLOL';
    }
}
