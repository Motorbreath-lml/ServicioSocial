<?php

class FuncionesBaseDeDatos
{
    private static $host = 'localhost';
    private static $usuario = 'root';
    private static $password = '';//password
    private static $baseDatos = 'inventario_db';
    private static $conexion;

    private static function conectar(AlertasDeMensajes &$mensajes)
    {
        self::$conexion = mysqli_connect(self::$host, self::$usuario, self::$password, self::$baseDatos);
        if (mysqli_connect_errno()) {            
            $mensajes->agregarMensajeDanger("Error al conectar a la base de datos: " . mysqli_connect_error());
        }
    }

    private static function conectarSinMensajes()
    {
        self::$conexion = mysqli_connect(self::$host, self::$usuario, self::$password, self::$baseDatos);
        if (mysqli_connect_errno()) {            
            return("Error al conectar a la base de datos: " . mysqli_connect_error());            
        }
    }

    private static function desconectar()
    {
        mysqli_close(self::$conexion);
    }

    public static function obtenerElementosEtiquetados(AlertasDeMensajes &$mensajes)
    {
        self::conectar($mensajes);

        $sql="SELECT id_inventario FROM inventario WHERE etiquetado= true";

        $resultado = mysqli_query(self::$conexion, $sql);
        $filas = array();

        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $filas[] = $fila['id_inventario'];
            }
        } else {
            $mensajes->agregarMensajeDanger("Error al ejecutar consulta: " . mysqli_error(self::$conexion));
        }

        self::desconectar();

        return $filas;
    }

    public static function obtenerElementosNOEtiquetados(AlertasDeMensajes &$mensajes)
    {
        self::conectar($mensajes);

        $sql="SELECT id_inventario FROM inventario WHERE etiquetado= false";

        $resultado = mysqli_query(self::$conexion, $sql);
        $filas = array();

        if ($resultado) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $filas[] = $fila['id_inventario'];
            }
        } else {
            $mensajes->agregarMensajeDanger("Error al ejecutar consulta: " . mysqli_error(self::$conexion));
        }

        self::desconectar();

        return $filas;
    }
}