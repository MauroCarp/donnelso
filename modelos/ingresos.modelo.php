<?php

require_once "conexion.php";

class ModeloIngresos{

	/*=============================================
	REGISTRO DE COMPRA
    ==============*/

	static public function mdlNuevoIngreso($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo, fechaIngreso, proveedor, sexo, destino) VALUES (:idAnimal, :tipo, :fechaIngreso, :proveedor, :sexo, :destino)");

		$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":fechaIngreso", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $datos["proveedorCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":destino", $datos["engorde"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}

   
	/*=============================================
	OBTENER ULTIMO ID
	=============================================*/
   
	static public function mdlObtenerUltimoId($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(id) FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
   
	/*=============================================
	NUEVO EXTERNO
	=============================================*/
   
	static public function mdlNuevoExterno($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,idCompra,precioPromedio,pesoPromedio) VALUES(:idAnimal, :idCompra, :precioPromedio, :pesoPromedio)");
		// var_dump($datos);
		$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
		$stmt->bindParam(":idCompra", $datos["idCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":precioPromedio", $datos["precioPromedio"], PDO::PARAM_STR);
		$stmt->bindParam(":pesoPromedio", $datos["pesoPromedio"], PDO::PARAM_STR);
	
		
		if($stmt->execute()){

			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			
			return 'error';
			
		}
		

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	REGISTRO INGRESO
	=============================================*/
   
	static public function mdlRegistroCompras($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcompra,tipo,fecha,cantidad,machos,hembras,proveedor,engorde,precioTotal,pesoTotal) VALUES(:idCompra,:tipo,:fecha,:cantidad,:machos,:hembras,:proveedor,:engorde,:precioTotal,:pesoTotal)");

		$stmt->bindParam(":idCompra", $datos["idCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":machos", $datos["machos"], PDO::PARAM_STR);
		$stmt->bindParam(":hembras", $datos["hembras"], PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $datos["proveedorCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":engorde", $datos["engorde"], PDO::PARAM_STR);
		$stmt->bindParam(":precioTotal", $datos["precioTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":pesoTotal", $datos["kgTotal"], PDO::PARAM_STR);
	
		
		if($stmt->execute()){

			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			
			return 'error';
			
		}
		

		$stmt -> close();

		$stmt = null;

	}

	   
	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/
   
	static public function mdlMostrarCompras($tabla,$item,$valor,$orden){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha ASC");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
			$stmt -> execute();
			
			return $stmt -> fetch();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha ASC");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}

	   
	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/

	static public function mdlEliminarCompra($tabla,$tabla2,$item,$valor){

		if($tabla2 != NULL){
			
			$stmt = Conexion::conectar()->prepare("DELETE $tabla,$tabla2 FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
	
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		
			
		}

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			
			var_dump($stmt ->errorInfo());


			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}


	/*=============================================
	BUSCAR CARAVANA
	=============================================*/

	static public function mdlBuscarMadre($tabla,$tabla2,$item,$item2,$item3,$valor,$valor2){
	
		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla INNER JOIN $tabla2 ON $tabla.$item = $tabla2.$item WHERE $tabla.$item2 = :$item2 AND $tabla2.$item3 = :$item3");
		
		$stmt -> bindParam(":".$item2, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item3, $valor2, PDO::PARAM_STR);
	
		$stmt -> execute();

		// var_dump($stmt ->errorInfo());

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}


}