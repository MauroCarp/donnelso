<?php

require_once "conexion.php";

class ModeloAnimales{

	static public function mdlNuevoAnimal($tabla,$datos){
        
		if($tabla == 'animales'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo,fechaIngreso,proveedor,sexo,destino) VALUES(:idAnimal,:tipo,:fechaIngreso,'Propio',:sexo,:destino)"); 
			
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":fechaIngreso", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
	
			
		}
        
		if($tabla == 'hembras' OR $tabla == 'machos'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,caravana,estado) VALUES(:idAnimal,:caravana,:estado)"); 
			
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

}

?>
