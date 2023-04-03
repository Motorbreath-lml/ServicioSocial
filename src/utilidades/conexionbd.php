<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inventario_db";

// Crear la conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar la conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}
// else
//     echo "Conexion exitosa!";

// // Hacer una consulta de selección
// $sql = "SELECT id, nombre, email FROM usuarios";
// $resultado = mysqli_query($conn, $sql);

// // Verificar si se encontraron resultados
// if (mysqli_num_rows($resultado) > 0) {
//     // Crear una tabla HTML para mostrar los resultados
//     echo "<table><tr><th>ID</th><th>Nombre</th><th>Email</th></tr>";
//     while($fila = mysqli_fetch_assoc($resultado)) {
//         echo "<tr><td>" . $fila["id"] . "</td><td>" . $fila["nombre"] . "</td><td>" . $fila["email"] . "</td></tr>";
//     }
//     echo "</table>";
// } else {
//     echo "No se encontraron resultados";
// }

// // Cerrar la conexión
// mysqli_close($conn);
?>
