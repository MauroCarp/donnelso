<?php

class ControladorChazinados{

    
    static public function ctrNuevaCarneada(){

        if(isset($_POST['btnIngresarChazinado'])){

            $tabla = 'carneadas';

            $caravanas = implode('-',$_POST['caravanaChazinado']);

            $propio = (isset($_POST['propioChazinado'])) ? 1 : 0;

            $datos = array(
                'fecha'=>$_POST['fechaChazinado'],
                'propio'=>$propio,
                'caravanas'=>$caravanas,
                'kgVivo'=>$_POST['kgVivoChazinado'],
                'kgVivo'=>$_POST['kgLimpioChazinado'],
                'kgChorizos'=>$_POST['kgChorizos'],
                'kgMorcillas'=>$_POST['kgMorcillas'],
                'kgSalames'=>$_POST['kgSalames'],
                'kgBondiolas'=>$_POST['kgBondiolas'],
                'kgJamon'=>$_POST['kgJamon'],
                'kgGrasa'=>$_POST['kgGrasa'],
                'kgCodeguin'=>$_POST['kgCodeguin'],
                'kgChicharron'=>$_POST['kgChicharron'],
                'kgCarne'=>$_POST['kgCarne']
            );

            $respuesta = ModeloChazinados::mdlNuevaCarneada($tabla,$datos);

            var_dump($respuesta);

        }
        
    }

    // static public function ctrMostrarAnimal($item,$valor,$item2,$valor2){

    //     $tabla = 'animales';

    //     return $respuesta = ModeloAnimales::mdlMostrarAnimal($tabla,$item,$valor,$item2,$valor2);
         
    // }

    // static public function ctrCambiarEstado($item,$valor,$item2,$valor2){

    //     $tabla = 'animales';

    //     return $respuesta = ModeloAnimales::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);
         
    // }

    // static public function ctrCaravanaValida($item,$valor,$item2,$valor2){
        
    //     $tabla = 'animales';

    //     return $respuesta = ModeloAnimales::mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2);

    // }
}

?>