<?php

class ControladorAnimales{

    
    static public function ctrNuevoAnimal($datos){


        // SE CARGA EN TABLA ANIMALES
        $tabla = 'animales';

        $respuesta[] = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
    

        // SE CARGA EN MACHO/HEMBRA SEGUN CORRESPONDA

        if($datos['tipo'] != 'pollo'){
            
            $tabla = ($datos['sexo'] == 'H') ? 'hembras' : 'machos'; 

            $respuesta[] = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
        
        }     

        return $respuesta;
        
    }

    static public function ctrMostrarAnimal($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlMostrarAnimal($tabla,$item,$valor,$item2,$valor2);
         
    }

    static public function ctrCambiarEstado($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);
         
    }

    static public function ctrCaravanaValida($item,$valor,$item2,$valor2){
        
        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2);

    }
}

?>