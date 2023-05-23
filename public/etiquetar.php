<!-- incluir la cabezera de la pagina -->
<?php include ('../src/includes/header.php')?>

<!--Codigo de prueba de php ejecutando python-->
<?php
$nombre = "Carlos";
$edad = 31;
$resultado = exec("python mi_script.py $nombre $edad");
echo $resultado;
// codigo de mi_script.py
// import sys

// nombre = sys.argv[1]
// edad = sys.argv[2]

// print("Hola, " + nombre + ". Tu edad es " + edad + " años.")
?>

<!-- incluir el pie de pagina -->
<?php include ('../src/includes/footer.php')?>