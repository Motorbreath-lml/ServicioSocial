# ServicioSocial
Aplicacion Web que permite subir un archivo .xls con codigos unicos, los cuales se comparan con una base de datos y da un reporte del inventario.

## Instalar herramientas

El proyecto esta pensado para usarse en Windows con [XAMPP](https://www.apachefriends.org/es/index.html).
Este proyecto se colocara en la carpeta `C:\xampp\htdocs`

Se usa la biblioteca [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/en/latest/) para manejar los doumentos Excel. El uso de esta biblioteca se hace con [Composer](https://getcomposer.org/), la instalacion de composer agrega automaticamente el comando `composer` y `php` al PATH de Windows. Para verificar la instalacion se puede ejecutar los siguiente comandos `composer --version` y `php --version` en una consola de Windows, en el desarrollo del proyecto se uso `Powershell`, en ambos comandos tendremos informacion sobre las versiones de estas herramientas.
```powershell
    $ php --version
PHP 8.2.4 (cli) (built: Mar 14 2023 17:54:25) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.2.4, Copyright (c) Zend Technologies
```
```powershell
    $ composer --version
Composer version 2.5.5 2023-03-21 11:50:05
```
Las versiones de `PHP` y `Composer` pueden ser diferentes, pero si se muestra un mensaje de comando no encontrado la instalación ha sido incorrecta.

Se recomienda instalar [Visual Studio Code](https://code.visualstudio.com/) y agregarlo al PATH de Windows para editar archivos de texto plano.

Para usar `PhpSpreadsheet` en el proyecto hay que permitir las extensiones `gd` y `zip`, estas se pueden habilitar en el archivo `C:\xampp\php\php.ini`, lo recomendable es usar Visual Studio Code para abrir el archivo y editarlo con el siguiente comando:
```powershell
    $ code C:\xampp\php\php.ini
```
En VS Code se usa la combinacion de teclas `Ctrl+F` para abrir el buscador de palabras en el texto, buscamos `extension=gd` y quitamos el `;` para quitar el comentario sobre la extension y poder habilitarla, el mismo proceso se hace con `extension=zip`, guardamos el archivo.

Finalmente se ejecuta el siguiente comando desde la carpeta raiz del proyecto `C:\xampp\htdocs\ServicioSocial` para instalar la dependencia de `PhpSpreadsheet` y otras dependencias que esta herramienta necesita para funcionar.
```powershell
    $ composer install
```

`XAMPP` contiene `MariaDB` que es un manejador de base de datos SQL. Para conectarse a `MariaDB` se puede hacer desde un navegador web en la direccion `localhost/phpmyadmin` para gestionar la base de datos con `phpMyAdmin`, tambien se puede usar el programa [Workbench](https://dev.mysql.com/downloads/workbench/) o el programa [HeidiSQL](https://www.heidisql.com/download.php), cualquiera permite abrir y ejecutar archivos SQL.

Por el momento no se han creado cuantas se usuario exclusivas para acceder a la base de datos, por lo tanto el usuario por defecto es `root` la contraseña esta en blanco y la direccion para conectarse a `MariaDB` es `127.0.0.1:3306`.

En la carpeta del proyecto `./BaseDeDatosEsquemas/scriptsSQL` contiene los srcipts SQL para la creacion de la base de datos de este proyecto, el orden ejecucion de los scripts es el siguiente:
1. BDInventario1.0.0.sql
2. insercciones_areas_y_materiales_completo.sql
3. insercciones_localizaciones.sql
4. insercciones_inventario.sql
