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
        $elementosLeidos = array();
        foreach ($columnaA as $row) {
            $cellIterator = $row->getCellIterator();
            foreach($cellIterator as $cell){
                $elemento=strval($cell->getValue());
                if (!empty($elemento)&&$elemento!='EPC') {
                    $elementosLeidos[] = $elemento;
                }
            }            
        }

        //Elementos Etiquetados     
        $elementosEtiquetados=FuncionesBaseDeDatos::obtenerElementosEtiquetados($alertas);

        //Elementos NoEtiquetados
        $elementosNoEtiquetados=FuncionesBaseDeDatos::obtenerElementosNoEtiquetados($alertas);

        //Elementos Etiquetados NO leidos
        $elementosEtiquetadosNoLeidos=array_diff($elementosEtiquetados,$elementosLeidos);

        //Elementos inventariados
        $elementosInventariados=array_diff($elementosEtiquetados,$elementosEtiquetadosNoLeidos);

        //Elementos no reconocidos
        $elementosNoReconocidos=array_diff($elementosLeidos,$elementosEtiquetados,$elementosNoEtiquetados);
        
        // Crea el arreglo asociativo con los elementos necesarios para elaborar un inventario
        $data = array(
            'elementosLeidos' => $elementosLeidos,
            'elementosEtiquetados'=>$elementosEtiquetados,
            'elementosEtiquetadosNoLeidos'=>$elementosEtiquetadosNoLeidos,
            'elementosNoEtiquetados'=>$elementosNoEtiquetados,
            'elementosNoReconocidos'=>$elementosNoReconocidos,
            'elementosInventariados'=>$elementosInventariados
        );
        
        // Convierte el arreglo a JSON.
        $json = json_encode($data);
        
        // Guarda el JSON en un archivo en la ruta especificada.
        $fecha = date('Y-m-d_H-i-s');
        $rutaDeJSON = "inventariosJSON/$fecha.json";
        if (!file_exists(dirname($rutaDeJSON))) {
            mkdir(dirname($rutaDeJSON), 0777, true);
        }
        if (file_put_contents($rutaDeJSON, $json)) {
            $alertas->agregarMensajeSuccess("El archivo de inventario se ha guardado correctamente.");
        } else {
            $alertas->agregarMensajeDanger("Error al guardar el archivo de inventario.");
        }
    }
}
