<?php

require_once "conexion.php";

class ModeloProveedores{

	/*=============================================
	MOSTRAR PROVEEDORES
	=============================================*/

	static public function mdlMostrarProveedores($tabla){


        $stmt = Conexion::conectar()->prepare("SELECT proveedor FROM $tabla ORDER BY proveedor ASC");

        $stmt -> execute();

        return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

     /*=============================================
	NUEVO PROVEEDOR
    ==============*/

	static public function mdlNuevoProveedor($tabla, $proveedor){

		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(proveedor) VALUES (:proveedor)");
		
		
		$stmt->bindParam(":proveedor", $proveedor, PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			
			return $stmt->errorInfo();
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}

// 	/*=============================================
// 	REGISTRO DE COMPRA
//     ==============*/

// 	static public function mdlNuevoIngreso($tabla, $datos){

		
// 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo, fechaIngreso, proveedor, sexo, destino) VALUES (:tipo, :fechaIngreso, :proveedor, :sexo, :destino)");
		
		
// 		$stmt->bindParam(":tipo", $datos["animal"], PDO::PARAM_STR);
// 		$stmt->bindParam(":fechaIngreso", $datos["fechaIngreso"], PDO::PARAM_STR);
// 		$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
// 		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
// 		$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);

// 		print_r($stmt->errorInfo(), true);
		
// 		if($stmt->execute()){
			
// 			return "ok";	
			
// 		}else{
			
// 			return $stmt->errorInfo();
			
// 		}
		
// 		$stmt->close();
		
// 		$stmt = null;


// 	}

//     /*=============================================
// 	NUEVO PROVEEDOR
//     ==============*/

// 	static public function mdlNuevoProveedor($tabla, $proveedor){

		
// 		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(proveedor) VALUES (:proveedor)");
		
		
// 		$stmt->bindParam(":proveedor", $proveedor, PDO::PARAM_STR);
		
		
// 		if($stmt->execute()){
			
// 			return "ok";	
			
// 		}else{
			
// 			return $stmt->errorInfo();
			
// 		}
		
// 		$stmt->close();
		
// 		$stmt = null;


// 	}

// 	/*=============================================
// 	EDITAR USUARIO
// 	=============================================*/

// 	static public function mdlEditarUsuario($tabla, $datos){
	
// 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombre, password = :password, perfil = :perfil, foto = :foto WHERE usuario = :usuario");

// 		$stmt -> bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
// 		$stmt -> bindParam(":password", $datos["password"], PDO::PARAM_STR);
// 		$stmt -> bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
// 		$stmt -> bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
// 		$stmt -> bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);

// 		if($stmt -> execute()){

// 			return "ok";
		
// 		}else{

// 			return "error";	

// 		}

// 		$stmt -> close();

// 		$stmt = null;

// 	}

// 	/*=============================================
// 	ACTUALIZAR USUARIO
// 	=============================================*/

// 	static public function mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2){

// 		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

// 		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
// 		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

// 		if($stmt -> execute()){

// 			return "ok";
		
// 		}else{

// 			return "error";	

// 		}

// 		$stmt -> close();

// 		$stmt = null;

// 	}

// 	/*=============================================
// 	BORRAR USUARIO
// 	=============================================*/

// 	static public function mdlBorrarUsuario($tabla, $datos){

// 		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

// 		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

// 		if($stmt -> execute()){

// 			return "ok";
		
// 		}else{

// 			return "error";	

// 		}

// 		$stmt -> close();

// 		$stmt = null;


// 	}

}