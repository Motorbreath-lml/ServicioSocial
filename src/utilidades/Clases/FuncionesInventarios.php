<?php
class FuncionesInventarios{
    private static function continuarInventario($nombreArchivo){
        $json = file_get_contents('inventariosJSON/'.$nombreArchivo);
        $json = json_decode($json, true);

        
    }
}