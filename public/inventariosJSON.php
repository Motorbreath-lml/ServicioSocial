<!-- incluir la cabezera de la pagina -->
<?php include('../src/includes/header.php') ?>

<?php include('../src/includes/modalExportacion.php') ?>

<br>
<br>

<?php
// Directorio a listar
$directorio = '../src/utilidades/inventariosJSON';
echo $directorio.'<br>';

// Obtener el array de nombres de archivo en el directorio
$archivos = scandir($directorio);

// Eliminar los elementos "." y ".." del array
$archivos = array_diff($archivos, array('.', '..'));

// Imprimir la tabla HTML con los nombres de archivo
echo '<table class="table">';
echo '<thead><tr><th>Nombre de archivo</th></tr></thead>';
echo '<tbody>';
foreach ($archivos as $archivo) {
    echo '<tr><td>' . $archivo . '</td></tr>';
}
echo '</tbody>';
echo '</table>';
?>

</br>


<!-- incluir el pie de pagina -->
<?php include('../src/includes/footer.php') ?>