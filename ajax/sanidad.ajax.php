<?php

require_once "../controladores/sanidad.controlador.php";
require_once "../modelos/sanidad.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

if(isset($_POST['idSanidad'])){

    $item = 'idSanidad';

    $valor = $_POST['idSanidad'];

    $item2 = null;
    
    $valor2 = null;

    $resultado = ControladorSanidad::ctrMostrarSanidad($item,$valor,$item2,$valor2);
    
    print_r(json_encode($resultado));

}

if(isset($_POST['caravana']) AND !isset($_POST['mostrarSanidad'])){

    $item = 'tipo';

    $valor = $_POST['tipo'];

    $item2 = 'caravana';

    $valor2 = $_POST['caravana'];

    $resultado = ControladorAnimales::ctrCaravanaValida($item,$valor,$item2,$valor2);
    
    print_r(json_encode($resultado));

}

if(isset($_POST['mostrarSanidad'])){

    
    $item = 'caravana';
    
    $valor = $_POST['caravana'];
    
    $item2 = 'animal';

    $valor2 = $_POST['tipo'];

    $resultado = ControladorSanidad::ctrMostrarSanidad($item,$valor,$item2,$valor2);

    print_r(json_encode($resultado));

}

