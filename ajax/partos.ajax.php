<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

require_once "../controladores/animales.controlador.php";
require_once "../modelos/animales.modelo.php";

class AjaxPartos{

    public $idParto;

    public $dataParto;

    public $caravana;

    public $tipo;

    public function ajaxMostrarDatosParto(){

        $valor = $this->idParto;

        $item = 'idParto';

        $resultado = ControladorIngresos::ctrMostrarPartos($item,$valor);

        $item = 'idAnimal';

        $valor = $resultado['idMadre'];

        $item2 = null;

        $valor2 = null;
    
        $caravanaMadre = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

        $valor = $resultado['idPadre'];
        
        $caravanaPadre = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);


        $this->dataParto = array('tipo'=> $resultado['tipo'],'fecha'=>$resultado['fecha'],'caravanaMadre'=>$caravanaMadre[0]['caravana'],'caravanaPadre'=>$caravanaPadre[0]['caravana'],'cantidad'=>$resultado['cantidad']);
        
        $valor = $this->idParto;

        $item = 'idParto';
        
        $nacidos = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);
        
        for ($i=0; $i < sizeof($nacidos) ; $i++) { 
            
         $this->dataParto['nacido'.$i]['caravana'] = $nacidos[$i]['caravana'];   
         $this->dataParto['nacido'.$i]['sexo'] = $nacidos[$i]['sexo'];   
         $this->dataParto['nacido'.$i]['peso'] = $nacidos[$i]['peso'];   
         $this->dataParto['nacido'.$i]['complicacion'] = $nacidos[$i]['complicacion'];   

        }

    }

    public function ajaxMostrarRegistrosPartos(){

        $item = 'caravanaMadre';
        
        $valor = $this-> caravana;

        $item2 = 'tipo';
        
        $valor2 = $this->tipo;
        
        $resultado = ControladorIngresos::ctrMostrarPartos($item,$valor,$item2,$valor2);
      
        print_r(json_encode($resultado));

    }

}

if(isset($_POST['accion'])){

    if($_POST['accion'] == 'verParto'){

        $datosParto = new AjaxPartos();
    
        $datosParto -> idParto= $_POST['idParto'];
    
        $datosParto -> ajaxMostrarDatosParto();

        print_r(json_encode($datosParto));
    }

    if($_POST['accion'] == 'mostrarPartos'){

        $registrosPartos = new AjaxPartos();
    
        $registrosPartos -> caravana = $_POST['caravana'];
        
        $registrosPartos -> tipo = $_POST['tipo'];
    
        $registrosPartos -> ajaxMostrarRegistrosPartos();

    }


}