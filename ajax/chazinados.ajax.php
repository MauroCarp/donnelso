<?php

require_once "../controladores/ventas.controlador.php";
require_once "../modelos/ventas.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

require_once "../controladores/chazinados.controlador.php";
require_once "../modelos/chazinados.modelo.php";

class AjaxChazinados{

    public $estado;

    public $idPedido;

    public $idCarneada;
    
    public $idVenta;

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

        $opts = array();
        for ($i=0; $i < sizeof($resultado) ; $i++) { 
                                                    
            $opts[] = "<option value='".$resultado[$i]['caravana']."'>".$resultado[$i]['caravana']."</option>";
            
        }

        print_r(implode('',$opts));
        
    }

    public function ajaxMostrarCarneada(){

        $item = 'idCarneada';

        $valor = $this->idCarneada;

        $resultado = ControladorChazinados::ctrMostrarChazinado($item,$valor);

        print_r(json_encode($resultado));
        
    }

    public function ajaxMostrarVenta(){

        $item = 'id';

        $valor = $this->idVenta;

        $resultado = ControladorChazinados::ctrMostrarChazinado($item,$valor);

        print_r(json_encode($resultado));
        
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

    if($_POST['accion'] == 'cargarDataEditar'){

        $cargarData = new AjaxChazinados();
    
        $cargarData -> idCarneada = $_POST['idCarneada'];
    
        $cargarData -> ajaxMostrarCarneada();
    
    }

    if($_POST['accion'] == 'cargarDataVenta'){

        $cargarDataVenta = new AjaxChazinados();
    
        $cargarDataVenta -> idVenta = $_POST['idVenta'];
    
        $cargarDataVenta -> ajaxMostrarVenta();
    
    }

}


