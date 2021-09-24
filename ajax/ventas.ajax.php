<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

if(isset($_POST['idVenta'])){
    
    $item = 'id';
    
    $valor = $_POST['idVenta'];

    $respuesta = ControladorVentas::ctrMostrarVentas($item,$valor);
    
    print_r(json_encode($respuesta));

}
