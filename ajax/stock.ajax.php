<?php

require_once "../controladores/consumo.controlador.php";
require_once "../modelos/consumo.modelo.php";

if(isset($_POST['accion'])){

    if($_POST['accion'] == 'mostrarDatos'){

        $item = NULL;
        
        $valor = NULL;
        
        $resultado = ControladorConsumo::ctrMostrarStock($item,$valor);
        
        print_r(json_encode($resultado));
    
    }

    if($_POST['accion'] == 'actualizarStock'){

        if($_POST['insumo']){

            $fecha = date('Y-m-d');

            $datos = array('insumo'=>$_POST['insumo'],'kilos'=>$_POST['kilos'],'precioKg'=>$_POST['precio'],'fecha'=>$fecha);

            $operador = '+';
            
            $respuesta = ControladorConsumo::ctrActualizarStock($datos,$operador);

            // ACTUALIZAR  PRECIO INSUMO

            $item = 'precioKg';

            $valor = $_POST['precio'];

            $item2 = 'nombre';

            $valor2 = $_POST['insumo'];
            
            $respuesta = ControladorConsumo::ctrActualizarInsumo($item,$valor,$item2,$valor2);

            // 
            $respuesta = ControladorConsumo::ctrNuevoRegistroInsumo($datos);

            echo $respuesta;

        }else{

            echo 'CampoVacio';
        
        }

    }
}

