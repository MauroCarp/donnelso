<?php

require_once "../controladores/sanidad.controlador.php";
require_once "../modelos/sanidad.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

if(isset($_POST['idSanidad'])){

    $item = 'idSanidad';

    $valor = $_POST['idSanidad'];

    $resultado = ControladorSanidad::ctrMostrarSanidad($item,$valor);
    
    print_r(json_encode($resultado));

}

if(isset($_POST['caravana'])){

    $item = 'tipo';

    $valor = $_POST['tipo'];

    $item2 = 'caravana';

    $valor2 = $_POST['caravana'];

    $resultado = ControladorAnimales::ctrCaravanaValida($item,$valor,$item2,$valor2);
    
    print_r(json_encode($resultado));


}

