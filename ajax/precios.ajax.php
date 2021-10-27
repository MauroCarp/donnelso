<?php

require_once "../controladores/precios.controlador.php";
require_once "../modelos/precios.modelo.php";

require_once "../controladores/stock.controlador.php";
require_once "../modelos/stock.modelo.php";

if(isset($_POST['accion'])){
    
    if ($_POST['accion'] == 'cargarPrecios') {
        
        $item = null;
        
        $respuesta = ControladorPrecios::ctrMostrarPrecios($item);
        
        print_r(json_encode($respuesta));
        
    }


    if ($_POST['accion'] == 'cargarStock') {
        
        $item = null;

        $valor = null;

        if($_POST['tabla'] == 'chazinados'){
            
            $respuesta = ControladorStock::ctrMostrarStockChazinado($item,$valor);
            
        }else{
            
            $respuesta = ControladorStock::ctrMostrarStock($item,$valor);
        
        }
        
        print_r(json_encode($respuesta));

    }

}

if (isset($_POST['animal'])) {

    $item = $_POST['animal'];

    $respuesta = ControladorPrecios::ctrMostrarPrecios($item);
    
    print_r(json_encode($respuesta));

}
