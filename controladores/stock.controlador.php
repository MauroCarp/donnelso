<?php

class ControladorStock{

    static public function ctrActualizarStock($item,$valor,$sumaResta){

            $tabla = 'stockVenta';

            $respuesta = ModeloStock::mdlActualizarStock($tabla,$item,$valor,$sumaResta);
        
    }

    static public function ctrMostrarStock($item,$valor){

        $tabla = 'stockVenta';

        $respuesta = ModeloStock::mdlMostrarStock($tabla,$item,$valor);

        $datos = array();

        for ($i=0; $i < sizeof($respuesta) ; $i++) { 
            
            $datos[$respuesta[$i]['animal']] = $respuesta[$i]['stock'];

        }

        return $datos;
    }

}   


?>