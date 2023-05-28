<?php
$icono = match (basename($_SERVER['PHP_SELF'])) {
    'index.php' => '<i class="fa-solid fa-industry"></i>',
    'inventariosJSON.php' => '<i class="fa-solid fa-clipboard-list"></i>',
    'cargarExcel.php' => '<i class="fa-solid fa-upload"></i>',
    'detalleJSON.php'=>'<i class="fa-solid fa-clipboard-check"></i>',
    default => '<i class="fa-solid fa-otter"></i>'
};

//Para mostrar errores temporales y mensajes de informacion
session_start();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorio de ingeniería industrial</title>
    <link rel="icon" type="image/png" href="../src/assets/img/favicon-16x16.png" sizes="16x16">
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
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'inventariosJSON.php') echo 'active'; ?>" href="inventariosJSON.php">Inventarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'etiquetar.php') echo 'active'; ?>" href="etiquetar.php">Etiquetar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="contacto.php">Prueba</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Mensajes Informativos que solo se mostraran si existen-->
    <?php
    if (isset($_SESSION['mensajes'])) {
        $mensajes = $_SESSION['mensajes'];
        foreach ($mensajes as $tipo => $mensaje_arr) {
            foreach ($mensaje_arr as $mensaje) { ?>
                <div class="alert alert-<?= $tipo ?> alert-dismissible fade show" role="alert">
                    <?= $mensaje ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
    <?php }
        }
    }
    ?>

    <!-- Eliminar mensaje de sesion para que no se repitan una vez mostrados-->
    <?php
    unset($_SESSION['mensajes']);
    ?>
    <hr>