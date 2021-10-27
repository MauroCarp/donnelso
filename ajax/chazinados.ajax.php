<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

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

    public function ajaxCargarSelect(){

        $item = 'tipo';

        $valor = 'cerdo';

        $item2 = null;

        $valor2 = null;

        $resultado = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

        for ($i=0; $i < sizeof($resultado) ; $i++) { 
                                                    
            echo "<option value='".$resultado[$i]['caravana'].">".$resultado[$i]['caravana']."</option>";
            
        }
        
    }

}

if(isset($_POST['idPedido'])){

    $actualizarEstado = new AjaxChazinados();

    $actualizarEstado -> idPedido= $_POST['idPedido'];

    $actualizarEstado -> estado= $_POST['estado'];

    $actualizarEstado -> ajaxActualizarEstado();

    print_r(json_encode($actualizarEstado));

}

if(isset($_POST['accion'])){

    if($_POST['accion'] == 'cargarSelect'){

        $cargarSelect = new AjaxChazinados();
    
        $cargarSelect -> ajaxCargarSelect();
    
    }

}


