<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

require_once "../controladores/stock.controlador.php";
require_once "../modelos/stock.modelo.php";

if(isset($_POST['idVenta'])){
    
    $item = 'id';
    
    $valor = $_POST['idVenta'];

    $respuesta = ControladorVentas::ctrMostrarVentas($item,$valor);
    
    print_r(json_encode($respuesta));

}

if(isset($_POST['tipo'])){
    
    $item = 'tipo';
    
    $valor = $_POST['tipo'];
    
    $item2 = 'listoVenta';
    
    $valor2 = 1;

    $respuesta = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);
    

    $opts = array(0=>"<option value='frizado'>Frizado</option>");
    
    for ($i=0; $i < sizeof($respuesta); $i++) { 
        
        $caravana = $respuesta[$i]['caravana'];

        $opts[] = "<option value='$caravana'>$caravana</option>";

    }

    echo implode('',$opts);

}

if(isset($_POST['mostrarStock'])){
    
    $item = null;
    
    $valor = null;
    
    $respuesta = ControladorStock::ctrMostrarStock($item,$valor);
    
    // $stockValido = ($respuesta > 0) ? true : false;

    // echo $stockValido;
print_r(json_encode($respuesta));
}


