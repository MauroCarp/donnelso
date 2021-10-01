<?php

class ControladorAnimales{

    
    static public function ctrNuevoAnimal($datos){


        // SE CARGA EN TABLA ANIMALES
        $tabla = 'animales';

        $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
    
        // SE CARGA EN MACHO/HEMBRA SEGUN CORRESPONDA

        $tabla = ($datos['sexo'] == 'H') ? 'hembras' : 'machos'; 

        $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);
        
        // SE CARGA EN PROPIO
        
        $tabla = 'propios';
        
        $respuesta = ModeloAnimales::mdlNuevoAnimal($tabla,$datos);

    }

}

?>