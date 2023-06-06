<!-- incluir la cabezera de la pagina -->
<?php include ('../src/includes/header.php')?>

<!-- Cuerpo de la pagina -->
<?php
include_once('../src/utilidades/detalleInventario.php');

// Obtener los valores de las variables desde $_GET
$nombreArchivo = $_GET['nombreArchivo'];
$operacion = $_GET['operacion'];
$contador;

if (isset($_GET['contador'])) {
    $contador = $_GET['contador'];
} else {
    $contador=0;
}

// Sanear los valores
$nombreArchivo = htmlspecialchars($nombreArchivo);
$operacion = htmlspecialchars($operacion);
$contador = (int) $contador;

$datos=array();

switch($operacion){
    case 'continuar':
        continuarInventario($nombreArchivo);
        break;      
}


?>

<!-- incluir el pie de pagina -->
<?php include ('../src/includes/footer.php')?>