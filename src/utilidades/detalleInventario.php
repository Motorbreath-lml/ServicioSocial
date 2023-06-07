<?php
include '../src/utilidades/Clases/FuncionesBaseDeDatos.php';

function continuarInventario($nombreArchivo) {
    // Obtener los primeros valores del inventario
    $directorio='../src/utilidades/archivos/archivosInventariosJSON';
    $json = file_get_contents($directorio . '/' . $nombreArchivo);
    $json = json_decode($json, true);

    // $elemtosNoInventariados=$json['elementosNoInventariados'];

    //Hay que verificar si aun hay elementos para iventariar
    $primerosDiez = array_slice($json['elementosNoInventariados'], 0, 10);

    return FuncionesBaseDeDatos::obtenerDiezElementos(implode(', ',$primerosDiez));

    // echo '<pre>';
    // var_dump(FuncionesBaseDeDatos::obtenerDiezElementos(implode(', ',$primerosDiez)));
    // echo '</pre>';

    // // Ejemplo de obtención de valores ficticios
    // $codigo = "001";
    // $nombre = "Producto A";
    // $area = "Almacén";
    // $ubicacion = "Estante 1";

    // // Crear el arreglo asociativo con los valores obtenidos
    // $inventario = array(
    //     "codigo" => $codigo,
    //     "nombre" => $nombre,
    //     "area" => $area,
    //     "ubicacion" => $ubicacion
    // );

    // // Devolver el arreglo asociativo
    // return $inventario;
}

// require 'Clases/FuncionesInventarios.php';

// // Obtener el valor de la variable enviada desde JavaScript
// $nombreArchivo = $_POST['nombreArchivo'];
// $operacion= $_POST['operacion'];

// // Crear un arreglo con los datos que deseas enviar de vuelta
// $datos = array(
//     'resultado' => ''
// );

// function continuarInventario(){
//     $datos['datos']="";
// }

// switch ($operacion){
//     case "continuarInventario":
//         $datos['operacion'] = 'ok';

//         break;
//     default:
//         $datos['operacion'] = 'operacion: '.$operacion.' no encontrada ';
// }


// // Enviar la respuesta como JSON
// header('Content-Type: application/json');
// echo json_encode($datos);
?>
