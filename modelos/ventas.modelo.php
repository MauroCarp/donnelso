<?php

require_once "conexion.php";

class ModeloVentas{

	static public function mdlNuevaVenta($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,vendedor,comprador,animal,seccion,cantidad,preventa) VALUES (:fecha,:vendedor,:comprador,:animal,:seccion,:cantidad,:preventa)");
		
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":comprador", $datos["comprador"], PDO::PARAM_STR);
		$stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
		$stmt->bindParam(":animal", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":seccion", $datos["seccion"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidad"], PDO::PARAM_STR);
		$stmt->bindParam(":preventa", $datos["preventa"], PDO::PARAM_STR);
		
		if($stmt->execute()){
			
			// print_r($stmt ->errorInfo());
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlActualizarVenta($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		fecha = :fecha,
		preventa = :preventa,
		precioVenta = :precioVenta,
		kgFinal = :kgFinal,
		comisionEmpleado = :comisionEmpleado
		WHERE id = :id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":preventa", $datos["preventa"], PDO::PARAM_STR);
		$stmt->bindParam(":kgFinal", $datos["kgFinal"], PDO::PARAM_STR);
		$stmt->bindParam(":precioVenta", $datos["precioFinal"], PDO::PARAM_STR);
		$stmt->bindParam(":comisionEmpleado", $datos["porcentajeEmpleado"], PDO::PARAM_STR);

		if($stmt->execute()){
			
			// print_r($stmt ->errorInfo());
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;

	}

    static public function mdlMostrarVentas($tabla,$item,$valor){

		if($item != NULL AND $item != 'chazinados'){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);

			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha asc");

			$stmt->execute();
	
			return $stmt->fetchAll();

		}

    }

    static public function mdlEliminarVenta($tabla,$item,$valor){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
    }

	static public function mdlNuevaVentaChazinado($tabla,$datos){
	
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,vendedor,comprador,producto,kg) VALUES (:fecha,:vendedor,:comprador,:producto,:kg)");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":comprador", $datos["comprador"], PDO::PARAM_STR);
		$stmt->bindParam(":vendedor", $datos["vendedor"], PDO::PARAM_STR);
		$stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
		$stmt->bindParam(":kg", $datos["kg"], PDO::PARAM_STR);

		if($stmt->execute()){
			
			// print_r($stmt ->errorInfo());
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		$item = :$item WHERE $item2 = :$item2");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}
}

?>
