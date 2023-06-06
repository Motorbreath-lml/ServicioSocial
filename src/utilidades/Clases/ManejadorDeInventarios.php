<?php

//Cargar los elementos de la carpeta vendor
require '../../vendor/autoload.php';
require 'FuncionesBaseDeDatos.php';

class ManejadorDeInventarios
{    
    /**
     * Guarda los elementos leídos del archivo de Excel como JSON.
     *
     * @param string $rutaArchivo La ruta al archivo de Excel.
     * @param AlertasDeMensajes $alertas Objeto AlertasDeMensajes para manejar los mensajes.
     * @return void
     */
    public static function guardarInventarioComoJSON($rutaArchivo, &$alertas)
    {
        // Abre el archivo de Excel.
        $spreadsheet = PhpOffice\PhpSpreadsheet\IOFactory::load($rutaArchivo);       
        
        $worksheet = $spreadsheet->getActiveSheet();

        $columnaA = $worksheet->getColumnIterator('A', 'A');
        $elementosInventariados = array();
        foreach ($columnaA as $row) {
            $cellIterator = $row->getCellIterator();
            foreach($cellIterator as $cell){
                $elemento=strval($cell->getValue());
                if (!empty($elemento)&&$elemento!='EPC') {
                    $elementosInventariados[$elemento] = ""; //La llave es el codigo del elemento y el valor las observaciones
                }
            }            
        }

        //Todos los Elementos
        $todosLosElementos= FuncionesBaseDeDatos::obtenerTodosLosElementos($alertas);

        //Elementos que faltan por inventariar
        $elementosNoInventariados=array_values(array_diff($todosLosElementos,array_keys($elementosInventariados)));

        //Elementos no reconocidos
        $elementosNoReconocidos=array_values(array_diff(array_keys($elementosInventariados),$todosLosElementos));

        //Limpiar deatos
        $elementosInventariados=array_diff_key($elementosInventariados,array_flip($elementosNoReconocidos));
        
        // Crea el arreglo asociativo con los elementos necesarios para elaborar un inventario
        $data = array(
            'elementosNoReconocidos'=>$elementosNoReconocidos,
            'elementosInventariados'=>$elementosInventariados,
            'elementosNoInventariados'=>$elementosNoInventariados
        );
        
        // Convierte el arreglo a JSON.
        $json = json_encode($data);
        
        // Guarda el JSON en un archivo en la ruta especificada.
        $fecha = date('Y-m-d_H-i-s');
        $rutaDeJSON = "archivos/archivosInventariosJSON/$fecha.json";
        if (!file_exists(dirname($rutaDeJSON))) {
            mkdir(dirname($rutaDeJSON), 0777, true);
        }

        //Guardar informacion en el archivo creado
        if (file_put_contents($rutaDeJSON, $json)) {
            $alertas->agregarMensajeSuccess("El archivo de inventario se ha guardado correctamente.");
        } else {
            $alertas->agregarMensajeDanger("Error al guardar el archivo de inventario. Ruta de guardado: ".$rutaDeJSON);
        }
    }
}
