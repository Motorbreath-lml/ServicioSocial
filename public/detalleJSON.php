<!-- incluir la cabezera de la pagina -->
<?php include('../src/includes/header.php') ?>

<?php
$nombreArchivo = $_GET['nombreArchivo'];
echo '<script>let nombreArchivo = "' . $nombreArchivo . '";</script>'; //Variable para JS

$nombreSinExtension = pathinfo($nombreArchivo, PATHINFO_FILENAME);

// Convertir la cadena a un objeto DateTime
$dateTime = DateTime::createFromFormat("Y-m-d_H-i-s", $nombreSinExtension);

//Truccion de dias y meses
function traducirDiaSemana($diaSemana)
{
    $diaSemana = strtolower($diaSemana);
    switch ($diaSemana) {
        case 'monday':
            return 'Lunes';
        case 'tuesday':
            return 'Martes';
        case 'wednesday':
            return 'Miércoles';
        case 'thursday':
            return 'Jueves';
        case 'friday':
            return 'Viernes';
        case 'saturday':
            return 'Sábado';
        case 'sunday':
            return 'Domingo';
        default:
            return 'Día desconocido';
    }
}

function traducirMes($mes)
{
    $meses = array(
        'january' => 'enero',
        'february' => 'febrero',
        'march' => 'marzo',
        'april' => 'abril',
        'may' => 'mayo',
        'june' => 'junio',
        'july' => 'julio',
        'august' => 'agosto',
        'september' => 'septiembre',
        'october' => 'octubre',
        'november' => 'noviembre',
        'december' => 'diciembre'
    );

    $mes = strtolower($mes);

    if (array_key_exists($mes, $meses)) {
        return ucfirst($meses[$mes]);
    } else {
        return 'Mes desconocido';
    }
}

// Obtener los componentes de fecha y hora
$diaSemana = $dateTime->format("l");
$dia = $dateTime->format("d");
$mes = $dateTime->format("F");
$anio = $dateTime->format("Y");
$hora = $dateTime->format("h:i A");

// Generar el mensaje completo
$mensaje = "Inventario del día: " . traducirDiaSemana($diaSemana) . " " . $dia . " de " . traducirMes($mes) . " del " . $anio . ", subido al servidor a las " . $hora;

//Continuar con el inventario
$url = 'inventario.php?nombreArchivo=' . urlencode($nombreArchivo) . '&operacion=';

?>

<h5 class="text-center"><?=$mensaje?></h5>

<div class="container text-center">
    <h4>Detalle JSON</h4>    
    <div class="row justify-content-evenly">
        <div class="col-6 col-md mb-3">
            <a class="btn btn-primary" href="<?= $url .'continuar'?>">Continuar con el inventario</a>
        </div>
        <div class="col-6 col-md mb-3">
            <button class="btn btn-primary">Editar inventario</button>
        </div>
        <div class="col-6 col-md mb-3">
            <button class="btn btn-primary">Generar reporte</button>
        </div>
    </div>    
</div>

<div id="resultado"></div>

<script>
    function obtenerDatos() {
    
    // Obtener el valor de 'nombreArchivo' de la URL
    let urlParams = new URLSearchParams(window.location.search);
    let nombreArchivo = urlParams.get('nombreArchivo');

    // Usar el valor en tu código
    console.log(nombreArchivo); // Imprime el valor en la consola


    // Enviar una solicitud al archivo PHP usando fetch
    fetch("../src/utilidades/detalleInventario.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
        },
        body: JSON.stringify({ nombreArchivo: nombreArchivo, operacion:"continuarInventario" }),
    })
        .then(function (response) {
            if (response.ok) {
                return response.json(); // Si la respuesta es JSON
                //return response.text(); // Si la respuesta es texto
            }
            throw new Error("Error al obtener los datos.");
        })
        .then(function (data) {
            // Manipular los datos recibidos
            mostrarDatos(data);
        })
        .catch(function (error) {
            console.error(error);
        });
    }
</script>
<!-- incluir el pie de pagina -->
<?php include('../src/includes/footer.php') ?>