<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

class AjaxIngresos{

    public $caravanaMadre;
    public $tipoAnimal;
    public $caravanaValida;

    public function ajaxCaravanaValida(){

        $valor = $this->tipoAnimal;
		$valor2 = $this->caravanaMadre;

        $resultado = ControladorIngresos::ctrBuscarMadre($valor,$valor2);

        $this->caravanaValida = $resultado;

    }

}

if(isset($_POST["caravanaMadre"])){

    $madreValida = new AjaxIngresos();

    $madreValida -> caravanaMadre = $_POST['caravanaMadre'];
    
    $madreValida -> tipoAnimal = $_POST['tipo'];

    $madreValida -> ajaxCaravanaValida();

    print_r(json_encode($madreValida));

}