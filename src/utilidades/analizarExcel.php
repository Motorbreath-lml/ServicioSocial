<?php
//iniciar sesion para poder utilizar los mensajes
session_start();

//Utilidad que permite hacer una conexion a la base de datos
//include('utilidades/conexionbd.php');

//Cargar todas las bibliotecas para manejar los archivos de Excel
require '../../vendor/autoload.php';

//Cargar el espacio de nombres
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

// Crear una instancia de la clase AlertasDeMensajes
$alertas = new AlertasDeMensajes();
$alertas->guardarMensajes($_SESSION['mensajes']);
$rutaArchivoExcel=$_SESSION['rutaArchivo'];

$rutaDeJSON = __DIR__ . "\\inventariosJSON";
echo $rutaArchivoExcel.'<br>';
echo $rutaDeJSON.'<br>';

# Crear carpeta de JSON si no existe
if (!is_dir($rutaDeJSON)) {    
    if(!mkdir($rutaDeJSON, 0777, true)){
        $alertas->agregarMensajeDanger("Fallo al crear la carpeta " . $rutaDeJSON);
    }
}

var_dump($mensajes);

//Asociar la variable $mensajes a la sesion
//$_SESSION['mensajes']=$mensajes;
//header('Location: ../../public/cargarExcel.php');