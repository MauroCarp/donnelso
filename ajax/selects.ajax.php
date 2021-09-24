<?php

require_once "../controladores/consumo.controlador.php";
require_once "../modelos/consumo.modelo.php";

$tipo = $_POST['select'];


$item = NULL;

$valor = NULL;

if($tipo == 'insumos'){

    $resultado = ControladorConsumo::ctrMostrarInsumo($item,$valor);
    
    echo "<option value=''>Seleccionar Insumo</option>";

    for ($i=0; $i < sizeof($resultado) ; $i++) { 

        echo "<option value='".$resultado[$i]['nombre']."'>".$resultado[$i]['nombre']."</option>";

    }

}