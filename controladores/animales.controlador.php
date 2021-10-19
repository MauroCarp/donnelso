<?php

class ControladorAnimales{

    
    static public function ctrNuevoAnimal($datos){


        // SE CARGA EN TABLA ANIMALES
        $tabla = 'animales';

        $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
    

        // SE CARGA EN MACHO/HEMBRA SEGUN CORRESPONDA

        // if($datos['animal'] != 'pollo'){
            
        //     $tabla = ($datos['sexo'] == 'H') ? 'hembras' : 'machos'; 

        //     $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
        
        // }     

        // // SE CARGA EN PROPIO
        
        // $tabla = 'propios';
        
        // $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);

    }

    static public function ctrMostrarAnimal($item,$valor,$inner){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlMostrarAnimal($tabla,$item,$valor,$inner);
         
    }

    static public function ctrCambiarEstado($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);
         
    }

}

?>