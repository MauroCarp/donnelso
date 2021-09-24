<?php

require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

if (isset($_POST['servirHembra'])) {

        $item = 'tipo';

        $valor = $_POST['tipo'];
        
        $item2 = 'caravana';

        $valor2 = $_POST['caravana'];

        $estadoRodeo = $_POST['estadoRodeo'];
        
        $respuesta = ControladorAnimales::ctrServirHembra($item,$valor,$item2,$valor2,$estadoRodeo);

        print_r($respuesta);

}

if (isset($_POST['mostrarRodeos'])) {
        
        $item = 'estado';
                
        $valor = 1;
        
        $item2 = 'tipo';
        
        $valor2 = $_POST['tipo'];
        
        $resultado = ControladorServicios::ctrMostrarRodeo($item,$valor,$item2,$valor2);
        
        print_r(json_encode($resultado));


}


