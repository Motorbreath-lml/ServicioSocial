<!-- incluir la cabezera de la pagina -->
<?php include('../src/includes/header.php') ?>

<?php
// Directorio a listar
$directorio = '../src/utilidades/inventariosJSON';

// Obtener el array de nombres de archivo en el directorio
$archivos = scandir($directorio);

// Eliminar los elementos "." y ".." del array
$archivos = array_diff($archivos, array('.', '..'));

//Ordenar el array de mayor a menor, mostrara los inventarios mas recientes primero
rsort($archivos);
?>

<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Nombre archivo</th>
                <th scope="col">Elementos etiquetados no inventariados</th>
                <th scope="col">Elementos no etiquetados no inventariados</th>
                <th scope="col">Elementos inventariados</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //Recorrer el arreglo para obtener el conteo de los valores de las llaves
            foreach ($archivos as $archivo) {
                $json = file_get_contents($directorio . '/' . $archivo);
                $json = json_decode($json, true);
                $url = 'detalleJSON.php?nombreArchivo=' . urlencode($archivo);
            ?>
                <tr>
                    <td scope="row"><a class="btn btn-secondary btn-sm" href="<?= $url?>"><?= $archivo ?></a></td>
                    <td><?= count($json['elementosEtiquetadosNoLeidos']) ?></td>
                    <td><?= count($json['elementosNoEtiquetados']) ?></td>
                    <td><?= count($json['elementosInventariados']) ?></td>
                </tr>

            <?php
            }
            ?>
        </tbody>
    </table>
</div>

<!-- incluir el pie de pagina -->
<?php include('../src/includes/footer.php') ?>