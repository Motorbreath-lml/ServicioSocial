<!-- incluir la cabezera de la pagina -->
<?php include('../src/includes/header.php') ?>

<form action="almacenarExcel.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="file" class="form-label">Seleccionar archivo de Excel</label>
        <input class="form-control" type="file" id="file" name="file" accept=".xls,.xlsx">
        <div class="form-text">Seleccione un archivo en formato Excel (.xls, .xlsx)</div>
    </div>
    <button type="submit" class="btn btn-primary">Cargar archivo</button>
</form>


<!-- incluir el pie de pagina -->
<?php include('../src/includes/footer.php') ?>