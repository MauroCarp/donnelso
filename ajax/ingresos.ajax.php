<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

class AjaxIngresos{

    public $caravanasMadre;
    public $tipoAnimal;
    public $caravanaMadre;
    public $ultimaCaravanaHija;

    public function ajaxUltimaCaravanaHija(){

        $valor = $this->tipoAnimal;
		$valor2 = $this->caravanaMadre;

        $item = 'tipo';

        $item2 = 'caravana';

        $resultado = ControladorIngresos::ctrUltimaCaravanaHija($item,$valor,$item2,$valor2);

        $this->ultimaCaravanaHija = $resultado;

    }

    public function ajaxBuscarMadres(){

        $valor = $this->tipoAnimal;

        $item2 = null;
        
        $valor2 = null;

        $buscar = 'caravana';
        
        $resultado = ControladorIngresos::ctrBuscarMadrePadre($valor,$item2,$valor2,$buscar);

        $this->caravanasMadre = $resultado;

    }

    public function ajaxCaravanasBuscar(){

        $item = 'tipo';

        $valor = $this->tipoAnimal;

        $item2 = null;
        
        $valor2 = null;

        
        $resultado = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

        print_r(json_encode($resultado));

    }

}

if(isset($_POST["accion"])){

    $caravanasBuscar = new AjaxIngresos();
    
    $caravanasBuscar -> tipoAnimal = $_POST['tipo'];

    $caravanasBuscar -> ajaxCaravanasBuscar();

}

if(isset($_POST['tipoAnimal'])){

    $buscarMadres = new AjaxIngresos();

    $buscarMadres -> tipoAnimal = $_POST['tipoAnimal'];

    $buscarMadres -> ajaxBuscarMadres();

    print_r(json_encode($buscarMadres));

}

if(isset($_POST['caravana'])){

    $ultimaCaravana = new ajaxIngresos();

    $ultimaCaravana -> tipoAnimal = $_POST['tipo'];

    $ultimaCaravana -> caravanaMadre = $_POST['caravana'];

    $ultimaCaravana -> ajaxUltimaCaravanaHija();

    print_r(json_encode($ultimaCaravana));

}