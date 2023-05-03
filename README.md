# ServicioSocial
Aplicacion Web que permite subir un archivo .xls con codigos unicos, los cuales se comparan con una base de datos y da un reporte del inventario.

El proyecto esta pensado para usarse en Windows con [XAMPP](https://www.apachefriends.org/es/index.html).
Este proyecto se colocara en la carpeta `C:\xampp\htdocs`

Se usa la biblioteca [PhpSpreadsheet](https://phpspreadsheet.readthedocs.io/en/latest/) para manejar los doumentos Excel. El uso de esta biblioteca se hace con [Composer](https://getcomposer.org/), la instalacion de composer agrega automaticamente el comando `composer` y `php` al path de Windows. Para verificar la instalacion se puede ejecutar los siguiente comandos `composer --version` y `php --version` en ambos tendremos informacion sobre las versiones de estas herramientas.
```
    $ php --version
PHP 8.2.4 (cli) (built: Mar 14 2023 17:54:25) (ZTS Visual C++ 2019 x64)
Copyright (c) The PHP Group
Zend Engine v4.2.4, Copyright (c) Zend Technologies
```
```
    $ composer --version
Composer version 2.5.5 2023-03-21 11:50:05
```
En caso contrario la instalacion no ha sido correcta.
