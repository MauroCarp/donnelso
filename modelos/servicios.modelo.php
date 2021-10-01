<?php

require_once "conexion.php";

class ModeloServicios{

	static public function mdlNuevoRodeo($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,tipo,numeroRodeo,caravanaMacho,caravanasHembras,estado) VALUES(:fecha ,:tipo,:numeroRodeo,:caravanaMacho,:caravanasHembras, 1)"); 
        
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroRodeo", $datos["numeroRodeo"], PDO::PARAM_STR);
		$stmt->bindParam(":caravanaMacho", $datos["caravanaMacho"], PDO::PARAM_STR);
		$stmt->bindParam(":caravanasHembras", $datos["caravanaHembras"], PDO::PARAM_STR);

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

    static public function mdlMostrarRodeo($tabla,$item,$valor,$item2,$valor2){

		if($item2 != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY fecha DESC");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		}
		
        $stmt->execute();
        
		return $stmt->fetchAll();

        $stmt->close();
		
		$stmt = null;

    }

	static public function mdlDesctivarRodeo($tabla,$item,$valor,$item2,$valor2,$estadoRodeo){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE $item = :$item AND $item2 = :$item2");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt->bindParam(":estado", $estadoRodeo, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			return 'error';
			
		}
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

	static public function mdlServicioValido($tabla,$tabla2,$item,$valor,$item2,$valor2,$estadoRodeo){
        
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM  $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE estadoRodeo = :estadoRodeo AND $tabla.$item = :$item AND $tabla2.$item2 = :$item2");

        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
        $stmt->bindParam(":estadoRodeo", $estadoRodeo, PDO::PARAM_STR);

        $stmt->execute();

		return 	$stmt-> fetch();
		
		$stmt->close();
		
		$stmt = null;

    }

	static public function mdlMostrarReproductor($tabla,$tabla2,$datos){
		
		if($datos['sexo'] == 'M'){

			$stmt = Conexion::conectar()->prepare("SELECT $tabla2.caravana FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE
			
			$tabla.tipo = :tipo AND 
			$tabla.destino  = :destino AND 
			$tabla.sexo = :sexo AND 
			$tabla2.idRodeo IS :idRodeo  
			
			ORDER BY $tabla2.caravana DESC");
			
			$stmt->bindParam(":idRodeo", $datos['idRodeo'], PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla2.caravana FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal
			 WHERE 
			 
			 $tabla.tipo = :tipo AND 
			 $tabla.destino  = :destino AND 
			 $tabla.sexo = :sexo AND 
			 $tabla2.estadoRodeo = :estadoRodeo  
			 
			 ORDER BY $tabla2.caravana DESC");
			
			$stmt->bindParam(":estadoRodeo", $datos['estadoRodeo'], PDO::PARAM_STR);

		}
		
		$stmt->bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
		$stmt->bindParam(":destino", $datos['destino'], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos['sexo'], PDO::PARAM_STR);
	
		$stmt->execute();
			
		return $stmt->fetchAll();

		$stmt->close();
		
		$stmt = null;

	}
	

}

?>
