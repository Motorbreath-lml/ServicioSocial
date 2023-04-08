<?php
//iniciar sesion para poder utilizar los mensajes
session_start();

//Utilidad que permite hacer una conexion a la base de datos
//include('utilidades/conexionbd.php');

//Cargar todas las bibliotecas
require '../../vendor/autoload.php';

//Cargar el espacio de nombres
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

//Creacion de variable de sesion 'mensajes' para mostrar informacion sobre el procesimiento
$mensajes = array(
    'success' => array(),
    'warning' => array(),
    'danger' => array()
);

// El siguiente script permite crear un directorio en el cual se guardaran los archivos de Excel
// Creacion de la ruta y carpeta en donde se guardan los archivos de excel provenientes del handler
// En windows la ruta de un archivo es con \ pero hay que escapar la diagonal, con la misma diagonal \\
$rutaDeExcel = __DIR__ . "\\archivosExcelDelC72";
echo $rutaDeExcel;

# Crear si no existe
if (!is_dir($rutaDeExcel)) {    
    if(!mkdir($rutaDeExcel, 0777, true)){
        $mensajes['danger'][]="'Fallo al crear la carpeta '. $rutaDeExcel";
        //die('Fallo al crear la carpeta '. $rutaDeExcel);
    }
}

# Tomar el archivo. Recordemos que "file" es el valor del atributo "name" de nuestro input en el cargarExcel.php
$informacionDelArchivo = $_FILES["file"];
# La ubicación en donde XAMPP lo puso y el nombre
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];
$nombreArchivo = $informacionDelArchivo["name"];
#echo "EL tipo del archivo ".$informacionDelArchivo['type'];
#Validar que la extension del archivo sea .xls
if(!preg_match("/^.*\.xlsx?$/",$nombreArchivo)){
    $mensajes['warning'][]="El formato del archivo debe ser '.XLS' ó '.XLSX'";
    //die('El tipo de archivo debe ser de Excel');
}
$nuevaUbicacion = $rutaDeExcel . "\\" . $nombreArchivo;
# Mover de la carpeta temporal a la carpeta en donde estan todos los archivos de excel
//$resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
if (move_uploaded_file($ubicacionTemporal, $nuevaUbicacion)) {
    //echo "Archivo guardado satisfactoriamente";
    $mensajes['success'][]='Archivo guardado satisfactoriamente';
} else {
    $mensaje['danger'][]='Error al subir archivo';
    //echo "Error al subir archivo";
}

//Asociar la variable $mensajes a la sesion
$_SESSION['mensajes']=$mensajes;
header('Location: ../../public/cargarExcel.php');