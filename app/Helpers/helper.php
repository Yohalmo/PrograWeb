<?php

use Illuminate\Support\Facades\Storage;

if(!function_exists('isMobileDevice')){

    function isMobileDevice() {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
        |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
        , $_SERVER["HTTP_USER_AGENT"]);
    }
}

if(!function_exists('SubirImagen')){

    function SubirImagen($files, $carpeta) {

        $ext = $files->getClientOriginalExtension();
        $nombre = str_replace(['.' . $ext, ' '], ['', ''],$files->getClientOriginalName());
        $identificador = $nombre . '.' . $ext;
        $files->move(storage_path("app/public/$carpeta"), $identificador);

        return "storage/$carpeta/$identificador";
    }
}


