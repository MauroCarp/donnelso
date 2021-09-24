<?php

require_once "../controladores/precios.controlador.php";
require_once "../modelos/precios.modelo.php";

if(isset($_POST['accion'])){
    
    if ($_POST['accion'] == 'cargarPrecios') {
        
        $item = null;
        
        $respuesta = ControladorPrecios::ctrMostrarPrecios($item);
        
        print_r(json_encode($respuesta));
    }

}

if (isset($_POST['animal'])) {

    $item = $_POST['animal'];

    $respuesta = ControladorPrecios::ctrMostrarPrecios($item);
    
    print_r(json_encode($respuesta));

}
