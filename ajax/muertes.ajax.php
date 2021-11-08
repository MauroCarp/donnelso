<?php

require_once "../controladores/muertes.controlador.php";
require_once "../modelos/muertes.modelo.php";

class AjaxMuertes{

    public $idMuerte;

    public function ajaxMostrarDatosMuerte(){

        $item = 'id';

        $valor = $this->idMuerte;

        $resultado = ControladorMuertes::ctrMostrarMuerte($item,$valor);

        print_r(json_encode($resultado));
        
    }

}

if(isset($_POST['idMuerte'])){

    $datosMuerte = new AjaxMuertes();

    $datosMuerte -> idMuerte = $_POST['idMuerte'];

    $datosMuerte -> ajaxMostrarDatosMuerte();

}
