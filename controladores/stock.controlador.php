<?php

class ControladorStock{

    static public function ctrActualizarStock($item,$valor,$sumaResta,$cantidad){

            $tabla = 'stockventa';

            return $respuesta = ModeloStock::mdlActualizarStock($tabla,$item,$valor,$sumaResta,$cantidad);
        
    }

    static public function ctrMostrarStock($item,$valor){
        
        $tabla = 'stockventa';

        $respuesta = ModeloStock::mdlMostrarStock($tabla,$item,$valor);

        $datos = array();

        for ($i=0; $i < sizeof($respuesta) ; $i++) { 
            
            $datos[$respuesta[$i]['animal']] = $respuesta[$i]['stock'];

        }

        return $datos;

    }


    static public function ctrMostrarStockChazinado($item,$valor){

        $tabla = 'stockchazinados';

        return $respuesta = ModeloStock::mdlMostrarStock($tabla,$item,$valor);

    }

    static public function ctrEditarStockChazinado($item,$datos){

    }



    static public function ctrActualizarStockChazinados($productoOriginal,$kgOriginal,$productoNuevo,$kgNuevo){

        $tabla = 'stockchazinados';

        if($productoOriginal == $productoNuevo){

            $diferencia = $kgNuevo - $kgOriginal;

            $operador = (esPositivo($diferencia)) ? '-' : '+';

            $diferencia = (esPositivo($diferencia)) ? $diferencia : str_replace('-','',$diferencia);

            $item = 'kg'.ucfirst($productoOriginal);

            $respuesta = ModeloStock::mdlActualizarStockChazinados($tabla,$item,$diferencia,$operador);

        }else{

            $operador = '+';

            $item = 'kg'.ucfirst($productoOriginal);

            $respuesta = ModeloStock::mdlActualizarStockChazinados($tabla,$item,$kgOriginal,$operador);

            $operador = '-';

            $item = 'kg'.ucfirst($productoNuevo);
            
            $respuesta = ModeloStock::mdlActualizarStockChazinados($tabla,$item,$kgNuevo,$operador);


        }
        
        return $respuesta;

    }

    static public function ctrActualizarStockChazinadosSumarRestar($producto,$kg,$operador){

        $tabla = 'stockchazinados';

        return $respuesta = ModeloStock::mdlActualizarStockChazinadosEliminar($tabla,$producto,$kg,$operador);

    }

}   


?>