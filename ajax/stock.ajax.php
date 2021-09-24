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

            $respuesta = ControladorConsumo::ctrNuevoRegistroInsumo($datos);

            echo $respuesta;

        }else{

            echo 'CampoVacio';
        
        }

    }
}

