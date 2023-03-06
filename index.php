<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo XLS</title>
</head>
<body>
    <h1>Selecciona el archivo .xls a subir</h1>
    <p>Mencionar la ruta por defecto del handler y como es la estructura de nombres del archivo</p>
    <form action="main.php" method="post" enctype="multipart/form-data">
        <input type="file" name="archivo_excel" required/>
        <button type="submit">Enviar </button>
    </form>
    
</body>
</html>