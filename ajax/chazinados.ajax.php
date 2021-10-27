<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

class AjaxChazinados{

    public $estado;

    public $idPedido;

    public function ajaxActualizarEstado(){

        $item = 'realizado';

        $valor = $this->estado;

        $item2 = 'id';

        $valor2 = $this->idPedido;

        $resultado = ControladorVentas::ctrCambiarEstado($item,$valor,$item2,$valor2);
        
    }

}

if(isset($_POST['idPedido'])){

    $actualizarEstado = new AjaxChazinados();

    $actualizarEstado -> idPedido= $_POST['idPedido'];

    $actualizarEstado -> estado= $_POST['estado'];

    $actualizarEstado -> ajaxActualizarEstado();

    print_r(json_encode($actualizarEstado));

}