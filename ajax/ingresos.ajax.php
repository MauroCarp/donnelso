<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

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

        $resultado = ControladorIngresos::ctrBuscarMadrePadre($valor,$item2,$valor2);

        $this->caravanasMadre = $resultado;

    }

}

// if(isset($_POST["caravanaMadre"])){

//     $madreValida = new AjaxIngresos();

//     $madreValida -> caravanaMadre = $_POST['caravanaMadre'];
    
//     $madreValida -> tipoAnimal = $_POST['tipo'];

//     $madreValida -> ajaxCaravanaValida();

//     print_r(json_encode($madreValida));

// }

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