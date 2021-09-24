<?php

class ControladorProveedores{

    /*=============================================
	VER PROVEEDORES
    =============================================*/

	static public function ctrMostrarProveedores(){

        $tabla = 'proveedores';
        
		$respuesta = ModeloProveedores::mdlMostrarProveedores($tabla);

        return $respuesta;

    }

    /*=============================================
	NUEVO PROVEEDORES
    =============================================*/

	static public function ctrNuevoProveedor($proveedor){

        $tabla = 'proveedores';

        $proveedor = ucwords($proveedor);

		$respuesta = ModeloProveedores::mdlNuevoProveedor($tabla,$proveedor);

        return $respuesta;

    }

}   

?>