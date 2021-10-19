<?php

require_once "conexion.php";

class ModeloAnimales{

	static public function mdlNuevoAnimal($tabla,$datos){

		if($tabla == 'animales'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo,fechaIngreso,proveedor,sexo,destino) VALUES(:idAnimal,:tipo,:fechaIngreso,'Propio',:sexo,:destino)"); 
			
			$stmt->bindParam(":tipo", $datos["animal"], PDO::PARAM_STR);
			$stmt->bindParam(":fechaIngreso", $datos["fecha"], PDO::PARAM_STR);
			$stmt->bindParam(":destino", $datos["engorde"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
	
		}

        
		if($tabla == 'hembras' OR $tabla == 'machos'){

			if($tabla == 'hembras'){

				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,caravana,estado,estadoRodeo) VALUES(:idAnimal,:caravana,:estado,'Descanso')"); 
				
			}else{
				
				$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,caravana,estado) VALUES(:idAnimal,:caravana,:estado)"); 
			}
			
			$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
			$stmt->bindParam(":estado", $datos["estado"], PDO::PARAM_STR);
		}
            
		if($tabla == 'propios'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,caravana,fechaNacimiento,peso,complicacion) VALUES(:idAnimal,:caravana,:fechaNacimiento,:peso,:complicacion)"); 

			$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
			$stmt->bindParam(":fechaNacimiento", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
			$stmt->bindParam(":complicacion", $datos["complicacion"], PDO::PARAM_STR);
			
		}

		$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);

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

	static public function mdlMostrarAnimal($tabla,$item,$valor,$inner){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $inner ON $tabla.idAnimal = $inner.idAnimal WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $inner ON $tabla.idAnimal = $inner.idAnimal ORDER BY tipo ASC");
		
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
