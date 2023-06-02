<!-- incluir la cabecera de la pagina -->
<?php include('../src/includes/header.php') ?>

<?php include('../src/includes/modalExportacion.php') ?>

<br>
<br>
<div class="container text-center">
    <div class="row">
        <div class="col-lg-10 offset-lg-1">
            <form action="../src/utilidades/guardarExcel.php" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="file" class="form-label">Seleccionar un archivo de Excel del handheld C72 </label>
                    <input class="form-control" type="file" id="file" name="file" accept=".xls,.xlsx">
                    <div class="form-text">Seleccione un archivo en formato Excel (.xls, .xlsx)</div>
                </div>
                <button type="submit" class="btn btn-primary">Subir archivo</button>
            </form>
        </div>
    </div>
</div>

</br>


<!-- incluir el pie de pagina -->
<?php include('../src/includes/footer.php') ?>