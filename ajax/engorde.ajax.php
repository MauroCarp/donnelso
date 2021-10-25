<?php

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

class AjaxEngorde{

    public $idAnimal;

    public $estado;

    public function ajaxCambiarEstado(){
        
        $item = 'idAnimal';
        
        $valor = $this->idAnimal;
        
        $item2 = 'listoVenta';
        
        $valor2 = $this->estado;
        
        $resultado = ControladorAnimales::ctrCambiarEstado($item,$valor,$item2,$valor2);

        echo json_encode($resultado);

    }

}

if(isset($_POST['idAnimal'])){

    $cambiarEstado = new ajaxEngorde();

    $cambiarEstado -> idAnimal = $_POST['idAnimal'];

    $cambiarEstado -> estado = $_POST['estado'];

    $cambiarEstado -> ajaxCambiarEstado();

}