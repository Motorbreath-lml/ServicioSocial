<?php
//Utilidad que permite hacer una conexion a la base de datos
include('utilidades/conexionbd.php');

//Cargar todas las bibliotecas
require 'vendor/autoload.php';

//Cargar el espacio de nombres
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;

#Megustia crear un archivo PHP que sea solo para utilidades
// El siguiente script permite crear un directorio en el cual se guardaran los archivos de Excel
// Creacion de la ruta y carpeta en donde se guardan los archivos de excel provenientes del handler
// En windows la ruta de un archivo es con \ pero hay que escapar la diagonal, con la misma diagonal \\
$rutaDeExcel = __DIR__ . "\\excel_del_handler";
//Crea la carpeta la ruta si no existe
# Crear si no existe
if (!is_dir($rutaDeExcel)) {    
    if(!mkdir($rutaDeExcel, 0777, true)){
        die('Fallo al crear la carpeta '. $rutaDeExcel);
    }
}

# Tomar el archivo. Recordemos que "archivo_excel" es el atributo "name" de nuestro input en el index.php
$informacionDelArchivo = $_FILES["archivo_excel"];
# La ubicación en donde PHP lo puso
$ubicacionTemporal = $informacionDelArchivo["tmp_name"];
#Nota: aquí tomamos el nombre que trae, megustaria renombrarlo con fecha y hora en que se procesa
$nombreArchivo = $informacionDelArchivo["name"];
#echo "EL tipo del archivo ".$informacionDelArchivo['type'];
#Validar que la extension del archivo sea .xls
if(!preg_match("/^.*\.xls$/",$nombreArchivo)){
    die('El tipo de archivo debe ser de Excel');
}
$nuevaUbicacion = $rutaDeExcel . "\\" . $nombreArchivo;
# Mover de la carpeta temporal a la carpeta en donde estan todos los archivos de excel
$resultado = move_uploaded_file($ubicacionTemporal, $nuevaUbicacion);
if ($resultado === true) {
    echo "Archivo guardado satisfactoriamente";
} else {
    echo "Error al subir archivo";
}

$inputFileName = $nuevaUbicacion;
#Nota: crear un archivo log que registre los movimeintos
#$helper->log('Loading file ' . /** @scrutinizer ignore-type */ pathinfo($inputFileName, PATHINFO_BASENAME) . ' using IOFactory to identify the format');
$spreadsheet = IOFactory::load($inputFileName);
$sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
echo('<pre>');
var_dump($sheetData);
echo('</pre>');



?>