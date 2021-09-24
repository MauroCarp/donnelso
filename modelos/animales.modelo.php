<?php

require_once "conexion.php";

class ModeloAnimales{

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

	static public function mdlServirHembra($tabla,$tabla2,$item,$valor,$item2,$valor2,$estadoRodeo){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal SET estadoRodeo = :estadoRodeo WHERE $tabla.$item = :$item AND $tabla2.$item2 = :$item2");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":estadoRodeo", $estadoRodeo, PDO::PARAM_STR);

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

    static public function mdlMostrarSanidad($tabla,$item,$valor){

        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha DESC");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        
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
