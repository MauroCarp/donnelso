<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

class AjaxInicio{

    public $tipo;

    public $caravana;

    public function ajaxMostrarDatosAnimal(){

        $item = 'tipo';

        $valor = $this->tipo;

        $item2 = 'caravana';

        $valor2 = $this->caravana;

        $resultado = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

        $sexo = $resultado[0]['sexo'];

        $resultado = ControladorAnimales::ctrMostrarAnimalSexo($item,$valor,$item2,$valor2,$sexo);

        print_r(json_encode($resultado));
        
    }

}

if(isset($_POST['accion'])){

    if($_POST['accion'] == 'mostrarAnimal'){

        $datosAnimal = new AjaxInicio();
    
        $datosAnimal -> tipo = $_POST['tipo'];

        $datosAnimal -> caravana = $_POST['caravana'];
    
        $datosAnimal -> ajaxMostrarDatosAnimal();

    }


}
