<?php
require 'Clases/FuncionesInventarios.php';

// Obtener el valor de la variable enviada desde JavaScript
$nombreArchivo = $_POST['nombreArchivo'];
$operacion= $_POST['operacion'];

// Crear un arreglo con los datos que deseas enviar de vuelta
$datos = array(
    'resultado' => ''
);

function continuarInventario(){
    $datos['datos']="";
}

switch ($operacion){
    case "continuarInventario":
        $datos['operacion'] = 'ok';

        break;
    default:
        $datos['operacion'] = 'operacion: '.$operacion.' no encontrada ';
}


// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($datos);
?>
