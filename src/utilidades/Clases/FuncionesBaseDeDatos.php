<?php

function obtenerElementosEtiquetados(){
    $bd=obtenerConexion();
    
}

//Conexion a la base de datos
function obtenerConexion()
{
    $conexionBD= new mysqli(
        'localhost',
        'root',
        '',//pasword
        'inventario_db'
    );    
    return $conexionBD;
}