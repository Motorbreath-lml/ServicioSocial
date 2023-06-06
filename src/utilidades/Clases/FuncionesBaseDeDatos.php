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
        }else{
            return 'ok';
        }
    }

    private static function desconectar()
    {
        mysqli_close(self::$conexion);
    }

    public static function obtenerDiezElementos($claves)
    {
        $arreglo = array();

        $arreglo['conexion']=self::conectarSinMensajes();

        $sql="SELECT inventario.id_inventario as codigo, inventario.nombre, areas.id_area as digito_1, areas.nombre as nombre_del_area,  localizaciones.digito_2, localizaciones.digito_3, localizaciones.descripcion, inventario.observaciones
                FROM inventario_db.inventario, inventario_db.areas, inventario_db.localizaciones 
                WHERE inventario.localizacion_id=localizaciones.id_localizacion 
                AND  localizaciones.area_id=areas.id_area
                AND id_inventario IN ($claves);";

        $resultado = mysqli_query(self::$conexion, $sql);

        if (mysqli_num_rows($resultado) > 0) {
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $codigo = $fila['codigo'];
                $nombre = $fila['nombre'];
                $digito1 = $fila['digito_1'];
                $nombreArea = $fila['nombre_del_area'];
                $digito2 = $fila['digito_2'];
                $digito3 = $fila['digito_3'];
                $descripcion = $fila['descripcion'];
                $observaciones = $fila['observaciones'];

                // Asignar los valores al arreglo asociativo
                $arreglo[$codigo] = array(
                    'nombre' => $nombre,
                    'digito1' => $digito1,
                    'nombreArea' => $nombreArea,
                    'digito2' => $digito2,
                    'digito3' => $digito3,
                    'descripcion' => $descripcion,
                    'observaciones' => $observaciones
                );
            }
        } else {
            $arreglo['completo']='si';
        }

        self::desconectar();

        return $arreglo;
    }

    public static function obtenerTodosLosElementos(AlertasDeMensajes &$mensajes)
    {
        self::conectar($mensajes);

        $sql="SELECT id_inventario FROM inventario";

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