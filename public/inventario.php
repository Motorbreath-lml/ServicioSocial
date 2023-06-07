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
        $datos=continuarInventario($nombreArchivo);
        break;      
}

//Saber si hay problemas de conexion de la base de datos
$estadoConexion=$datos['conexion'];
unset($datos['conexion']);

//Saber si ya son todos los elementos

?>
<div class="container">
<?php 
$contador=0;
foreach ($datos as $codigo => $valor) : 
?>
    <div class="card border-dark mb-3">
        <div class="card-header text-center">
            <strong>Código: <?= $codigo ?></strong>
        </div>
        <div class="card-body">            
            <h6 class="card-title">Nombre: <?= $valor['nombre'] ?></h6>
            <p class="card-text">Area <?= $valor['digito1'] ?>: <?= $valor['nombreArea'] ?></p>
            <p class="card-text">Localización <?= $valor['digito2'] ?><?= $valor['digito3'] ?>: <?= $valor['descripcion'] ?></p>
            <p class="card-text">Observaciones:</p>
            <textarea class="form-control mayusculas" rows="1"><?= $valor['observaciones'] ?></textarea>
            <div class="form-check d-flex justify-content-center">
              <input class="form-check-input" type="checkbox" id="Checkbox<?=$contador?>" name="Checkbox<?=$contador?>" value="0">
              <label class="form-check-label btn btn-sm btn-primary" for="Checkbox<?=$contador?>">
                <h5 class="card-title">Inventariar</h5>
              </label>                
            </div>
        </div>
    </div>
<?php 
$contador++;
endforeach; 
?>
</div>

<script>
    let textareas = document.querySelectorAll(".mayusculas");

    textareas.forEach(function(textarea) {
      textarea.addEventListener("input", function() {
        this.value = this.value.toUpperCase();
      });
    });
</script>

<!-- incluir el pie de pagina -->
<?php include ('../src/includes/footer.php')?>