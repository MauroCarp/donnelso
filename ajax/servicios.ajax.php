<?php

require_once "../controladores/servicios.controlador.php";
require_once "../modelos/servicios.modelo.php";

if (isset($_POST['servirHembra'])) {

        $item = 'tipo';

        $valor = $_POST['tipo'];
        
        $item2 = 'caravana';

        $valor2 = $_POST['caravana'];

        $estadoRodeo = $_POST['estadoRodeo'];
        
        $respuesta = ControladorServicios::ctrServirHembra($item,$valor,$item2,$valor2,$estadoRodeo);

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

if(isset($_POST['validarServicio'])){

        $item = 'tipo';

        $valor = $_POST['tipo'];

        $item2 = 'caravana';

        $valor2 = $_POST['caravana'];

        $estadoRodeo = 'Servida';

        $respuesta = ControladorServicios::ctrServicioValido($item,$valor,$item2,$valor2,$estadoRodeo);

        echo $valido = ($respuesta[0] == 1) ? true : false;
}

if(isset($_POST['cargarSelect'])){

        $datos = array('tipo' => $_POST['tipo'], 'destino'=> 'Reproductor','sexo'=>'M','idRodeo'=>null,'estadoRodeo'=>'Descanso');

        $respuesta = array();

        $tabla2 = 'machos';

        $machos = ControladorServicios::ctrMostrarReproductor($tabla2, $datos);

        $respuesta['machos'] = $machos;

        $tabla2 = 'hembras'; 

        $datos['sexo'] = 'H';

        $hembras = ControladorServicios::ctrMostrarReproductor($tabla2,$datos);

        $respuesta['hembras'] = $hembras;

        print_r(json_encode($respuesta));

}
