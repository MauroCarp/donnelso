<?php

require_once "conexion.php";

class ModeloAnimales{

	static public function mdlNuevoAnimal($tabla,$datos){

		if($tabla == 'animales'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo,caravana,fecha,peso,proveedor,sexo,destino,idPadre,idMadre,complicacion) VALUES(:idAnimal,:tipo,:caravana,:fecha,:peso,'Propio',:sexo,:destino,:idPadre,:idMadre,:complicacion)"); 
			
			$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
			$stmt->bindParam(":idPadre", $datos["idPadre"], PDO::PARAM_STR);
			$stmt->bindParam(":idMadre", $datos["idMadre"], PDO::PARAM_STR);
			$stmt->bindParam(":complicacion", $datos["complicacion"], PDO::PARAM_STR);
	
		}

        
		if($tabla == 'hembras' OR $tabla == 'machos'){

			$estadoRodeo = ($datos['destino'] == 'Reproductor')  ? 'Descanso' : null;
			
			if($tabla == 'hembras'){

				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,estado,estadoRodeo) VALUES(:idAnimal,:estado,:estadoRodeo)"); 
				
				$stmt->bindParam(":estadoRodeo", $estadoRodeo, PDO::PARAM_STR);

			}else{
				
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,estado) VALUES(:idAnimal,:estado)"); 
			}
			
			$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		}

		$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
		// return $stmt;
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

	static public function mdlMostrarAnimal($tabla,$item,$valor,$item2,$valor2){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
			if($item2 != NULL){
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
				
				$stmt-> bindParam(":".$item2, $valor2);

			}

			$stmt-> bindParam(":".$item, $valor);
			// return $stmt;

			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY tipo ASC");
	
			// return $stmt;

			$stmt->execute();
	
			return $stmt->fetchAll();

		}

	}

	static public function mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
	
	}
}

?>
