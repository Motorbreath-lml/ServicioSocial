<?php
/**
 * Clase para manejar alertas de mensajes.
 */
class AlertasDeMensajes
{
    /**
     * @var array $mensajes Arreglo asociativo de mensajes.
     */
    protected $mensajes = array(
        'success' => array(),
        'warning' => array(),
        'danger' => array()
    );

    /**
     * Sobre escribe los mensajes que se le pasan por parametro en el objeto
     *
     * @param string $mensajes Un arreglo Asociativo
     */
    public function guardarMensajes($mensajes)
    {
        $this->mensajes = $mensajes;
    }

    /**
     * Agrega un mensaje a la lista de mensajes para la llave 'success'.
     *
     * @param string $mensaje El mensaje a agregar.
     */
    public function agregarMensajeSuccess($mensaje)
    {
        $this->mensajes['success'][] = $mensaje;
    }

    /**
     * Agrega un mensaje a la lista de mensajes para la llave 'warning'.
     *
     * @param string $mensaje El mensaje a agregar.
     */
    public function agregarMensajeWarning($mensaje)
    {
        $this->mensajes['warning'][] = $mensaje;
    }

    /**
     * Agrega un mensaje a la lista de mensajes para la llave 'danger'.
     *
     * @param string $mensaje El mensaje a agregar.
     */
    public function agregarMensajeDanger($mensaje)
    {
        $this->mensajes['danger'][] = $mensaje;
    }

    /**
     * Agrega una nueva llave al arreglo de mensajes.
     *
     * @param string $llave La llave a agregar.
     * @param array $mensajes_arr (Opcional) Los mensajes a agregar para la llave.
     */
    public function agregarLlave($llave, $mensajes_arr = array())
    {
        $this->mensajes[$llave] = $mensajes_arr;
    }

    /**
     * Agrega un mensaje a una llave existente en el arreglo de mensajes.
     *
     * @param string $llave La llave a la que se agregará el mensaje.
     * @param string $mensaje El mensaje a agregar.
     */
    public function agregarMensaje($llave, $mensaje)
    {
        if (array_key_exists($llave, $this->mensajes)) {
            $this->mensajes[$llave][] = $mensaje;
        } else {
            throw new Exception("La llave '$llave' no existe en el arreglo de mensajes.");
        }
    }

    /**
     * Regresa el arreglo asociativo de mensajes.
     *
     * @return array El arreglo asociativo de mensajes.
     */
    public function obtenerMensajes()
    {
        return $this->mensajes;
    }
}
