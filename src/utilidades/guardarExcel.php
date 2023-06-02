<?php
//iniciar sesion para poder utilizar los mensajes
session_start();

//Importar la clase AlertasDeMensajes y ManejadorDeInventarios
require 'Clases/AlertasDeMensajes.php';
require 'Clases/ManejadorDeInventarios.php';

// Crear una instancia de la clase AlertasDeMensajes
$alertas = new AlertasDeMensajes();
$existeCarpeta=true;
$seGuardoArchivo=true;

// El siguiente script permite crear un directorio en el cual se guardaran los archivos de Excel
// Creacion de la ruta y carpeta en donde se guardan los archivos de excel provenientes del handler
// En windows la ruta de un archivo es con \ pero hay que escapar la diagonal, con la misma diagonal \\
$rutaDeExcel = __DIR__ . "\\archivos\\archivosExcelDelC72";

# Crear si no existe
if (!is_dir($rutaDeExcel)) {    
    if(!mkdir($rutaDeExcel, 0777, true)){
        $alertas->agregarMensajeDanger("Fallo al crear la carpeta " . $rutaDeExcel);
        $existeCarpeta=false;
    }
}

# Tomar el archivo. Recordemos que "file" es el valor del atributo "name" de nuestro input en el cargarExcel.php
$informacionDelArchivo = $_FILES["file"];
# La ubicación en donde XAMPP lo puso y el nombre
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];
$nombreArchivo = $informacionDelArchivo["name"];

#Validar que la extension del archivo sea .xls
if(!preg_match("/^.*\.xlsx?$/",$nombreArchivo)){
    $alertas->agregarMensajeWarning("El formato del archivo debe ser '.XLS' ó '.XLSX'");
    $seGuardoArchivo=false;
}else{
    $nuevaUbicacion = $rutaDeExcel . "\\" . $nombreArchivo;
    # Mover de la carpeta temporal a la carpeta en donde estan todos los archivos de excel
    if (move_uploaded_file($ubicacionTemporal, $nuevaUbicacion)) {
        $alertas->agregarMensajeSuccess("Archivo guardado satisfactoriamente");
    } else {
        $alertas->agregarMensajeDanger("Error al guardar archivo en la ruta: ".$nuevaUbicacion);
        $seGuardoArchivo=false;
    }
}

//Asociar la instancia de la clase AlertasDeMensajes a la sesion
$localizacion="";

if($seGuardoArchivo && $existeCarpeta){
    ManejadorDeInventarios::guardarInventarioComoJSON($nuevaUbicacion, $alertas);    
    $localizacion='inventariosJSON.php';
}else{    
    $localizacion='cargarExcel.php';
}

$_SESSION['mensajes'] = $alertas->obtenerMensajes();
header('Location: ../../public/'.$localizacion);