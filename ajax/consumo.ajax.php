<?php

require_once "../controladores/consumo.controlador.php";
require_once "../modelos/consumo.modelo.php";

class AjaxConsumo{

    public $insumo;
    public $precio;

    public function ajaxNuevoInsumo(){

        $valor = $this->insumo;

		$valor2 = $this->precio;

        $resultado = ControladorConsumo::ctrNuevoInsumo($valor,$valor2);

    }
    
}

if(isset($_POST["nuevoInsumo"])){

    $madreValida = new AjaxConsumo();

    $madreValida -> insumo = $_POST['nuevoInsumo'];
    
    $madreValida -> precio = $_POST['precio'];

    $madreValida -> ajaxNuevoInsumo();

}

if(isset($_POST['insumo'])){

    $item = 'nombre';

    $valor = $_POST['insumo'];

    $resultado = ControladorConsumo::ctrMostrarInsumo($item,$valor);

    print_r(json_encode($resultado));
}

if(isset($_POST['idFormula'])){

    $item = 'id';

    $valor = $_POST['idFormula'];

    $resultado = ControladorConsumo::ctrMostrarFormulas($item,$valor);

    print_r(json_encode($resultado));
    
}

if(isset($_POST['animal'])){

    $item = 'animal';

    $valor = $_POST['animal'];

    $resultado = ControladorConsumo::ctrMostrarFormulas($item,$valor);

    print_r(json_encode($resultado));



}


