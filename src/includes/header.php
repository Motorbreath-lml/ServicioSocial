<?php
$icono= match(basename($_SERVER['PHP_SELF'])){
    'index.php' => '<i class="fa-solid fa-industry"></i>',
    'inventario.php'=>'<i class="fa-solid fa-clipboard-list"></i>',
    'cargarExcel.php'=> '<i class="fa-regular fa-file-excel"></i>',
    default=>'<i class="fa-solid fa-otter"></i>'
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio de ingeniería industrial</title>
    <!-- Enlazar con las hojas de estilo de bootstrap -->
    <link rel="stylesheet" href="../src/assets/css/bootstrap.min.css">
    <!-- Enlazar con la hoja de estilo de fontawesome -->
    <link rel="stylesheet" href="../src/assets/css/all.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-dark bg-body-tertiary" data-bs-theme="dark">
        <div class="container">
            <a class="navbar-brand" href="index.php"><?= $icono ?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'cargarExcel.php') echo 'active'; ?>" href="cargarExcel.php">Cargar Excel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'contacto.php') echo 'active'; ?>" href="contacto.php">Contacto</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contacto.php">Prueba</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>