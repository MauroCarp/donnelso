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

    static public function ctrMostrarAnimalSexo($item,$valor,$item2,$valor2,$sexo){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlMostrarAnimalSexo($tabla,$item,$valor,$item2,$valor2,$sexo);
         
    }

    static public function ctrCambiarEstado($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        return $respuesta = ModeloAnimales::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);
         
    }

    static public function ctrCaravanaValida($item,$valor,$item2,$valor2){
        
        $tabla = 'animales';
        
        return $respuesta = ModeloAnimales::mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2);
        
    }
    
    
    static public function ctrEliminarAnimal($item,$valor,$item2,$valor2){
    
        $animal  = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);
        
        $item = 'idAnimal';

        $idAnimal = $animal[0]['idAnimal'];
        
        $tabla = 'animales';

        $respuesta = ModeloAnimales::mdlEliminarAnimal($tabla,$item,$idAnimal);
    
        $tabla = ($animal[0]['sexo'] == 'M') ? 'machos' : 'hembras';

        return $respuesta = ModeloAnimales::mdlEliminarAnimal($tabla,$item,$idAnimal);

    }

    static public function ctrEditarAnimal($datos){
    
        $tabla = "animales";

        return $resultado = ModeloAnimales::mdlEditarAnimal($tabla,$datos);
        
    }

}

?>