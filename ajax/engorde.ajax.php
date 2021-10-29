<?php

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

require_once "../controladores/stock.controlador.php";
require_once "../modelos/stock.modelo.php";

class AjaxEngorde{

    public $idAnimal;

    public $estado;

    public $tipo;

    public function ajaxCambiarEstado(){
        
        $item = 'idAnimal';
        
        $valor = $this->idAnimal;
        
        $item2 = 'listoVenta';
        
        $valor2 = $this->estado;
        
        $resultado = ControladorAnimales::ctrCambiarEstado($item,$valor,$item2,$valor2);

        // SUMAR O RESTAR A STOCK

        $sumaResta = ($valor2 == 1) ? '+' : '-';

        $item = 'animal';

        $tipo = $this->tipo;

        $actualizarStock = ControladorStock::ctrActualizarStock($item,$tipo,$sumaResta,1);

        echo json_encode($resultado);

    }

}

if(isset($_POST['idAnimal'])){

    $cambiarEstado = new ajaxEngorde();

    $cambiarEstado -> idAnimal = $_POST['idAnimal'];

    $cambiarEstado -> estado = $_POST['estado'];

    $cambiarEstado -> tipo = $_POST['tipo'];

    $cambiarEstado -> ajaxCambiarEstado();

}