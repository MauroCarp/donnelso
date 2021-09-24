<?php

require_once "../controladores/sanidad.controlador.php";
require_once "../modelos/sanidad.modelo.php";

if(isset($_POST['idSanidad'])){

    $item = 'idSanidad';

    $valor = $_POST['idSanidad'];

    $resultado = ControladorSanidad::ctrMostrarSanidad($item,$valor);
    
    print_r(json_encode($resultado));

}


