<?php

require_once "conexion.php";

class ModeloSanidad{

	static public function mdlNuevoRegistro($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(animal,fecha,aplicacion,motivo,caravana,comentarios,gastoVet) VALUES(:animal,:fecha ,:aplicacion,:motivo,:caravana,:comentarios,:gastoVet)"); 
        
        var_dump($datos['fecha']);
        $stmt->bindParam(":animal", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":aplicacion", $datos["aplicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
		$stmt->bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
		$stmt->bindParam(":gastoVet", $datos["costoVeterinario"], PDO::PARAM_STR);


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

	static public function mdlActualizarSanidad($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		animal = :animal,
		fecha = :fecha ,
		aplicacion = :aplicacion,
		motivo = :motivo,
		caravana = :caravana,
		comentarios = :comentarios,
		gastoVet = :gastoVet WHERE idSanidad = :id"); 
        
        $stmt->bindParam(":animal", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":motivo", $datos["motivo"], PDO::PARAM_STR);
		$stmt->bindParam(":aplicacion", $datos["aplicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
		$stmt->bindParam(":comentarios", $datos["comentarios"], PDO::PARAM_STR);
		$stmt->bindParam(":gastoVet", $datos["costoVeterinario"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);


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

    static public function mdlMostrarSanidad($tabla,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha DESC");
		
		if($item2 != null){
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY fecha DESC");

			$stmt->bindParam(":".$item2, $valor, PDO::PARAM_STR);

		}

        $stmt->bindParam(":".$item, $valor2, PDO::PARAM_STR);
        
		// return $stmt;

        $stmt->execute();
        
		return $stmt->fetchAll();

        $stmt->close();
		
		$stmt = null;

    }

	static public function mdlEliminarSanidad($tabla,$item,$valor){
        
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
    }

}

?>
