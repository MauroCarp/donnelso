<?php

require_once "conexion.php";

class ModeloServicios{

	static public function mdlNuevoRodeo($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,tipo,numeroRodeo,caravanaMacho,caravanasHembras,estado) VALUES(:fecha ,:tipo,:numeroRodeo,:caravanaMacho,:caravanasHembras, 1)"); 
        
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":numeroRodeo", $datos["numeroRodeo"], PDO::PARAM_STR);
		$stmt->bindParam(":caravanaMacho", $datos["caravanaMachos"], PDO::PARAM_STR);
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

		if($item != null){
				
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = $valor");

			if($item2 != null){

				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY fecha DESC");
			
				$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

			}
			
			
		}

		// return $stmt;
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        $stmt->execute();

		return $stmt->fetchAll();

        $stmt->close();
		
		$stmt = null;

    }

	static public function mdlMostrarRodeosBuscar($tabla,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 LIKE :$item2 ORDER BY fecha DESC");
			
		$caravana = '%'.$valor2.'%';

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		
		$stmt->bindParam(":".$item2, $caravana, PDO::PARAM_STR);
			
        $stmt->execute();

		return $stmt->fetchAll();

        $stmt->close();
		
		$stmt = null;

    }

	static public function mdlDesctivarRodeo($tabla,$item,$valor,$estadoRodeo){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = :estado WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":estado", $estadoRodeo, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			return 'error';
			
		}
    }

	static public function mdlServirHembra($tabla,$tabla2,$item,$item2,$datos){

		if(isset($datos['cantidadNacidos'])){

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal SET 
			$tabla2.estadoRodeo = :estadoRodeo
			 WHERE $tabla.$item = :$item AND $tabla.$item2 = :$item2");

			$stmt->bindParam(":".$item2, $datos['caravanaMadre'], PDO::PARAM_STR);
		
		}else{

			$stmt = Conexion::conectar()->prepare("UPDATE $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal SET 
			$tabla2.estadoRodeo = :estadoRodeo,
			$tabla2.fecha = :fecha,
			$tabla2.caravanaMacho = :caravanaMacho
			 WHERE $tabla.$item = :$item AND $tabla.$item2 = :$item2");

			$stmt->bindParam(":caravanaMacho", $datos['caravanaMacho'], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
			$stmt->bindParam(":".$item2, $datos['caravana'], PDO::PARAM_STR);

		}
		
		$stmt->bindParam(":".$item, $datos['tipo'], PDO::PARAM_STR);
		$stmt->bindParam(":estadoRodeo", $datos['estadoRodeo'], PDO::PARAM_STR);
		// return $datos;
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
        
        $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) as servicioValido, $tabla2.fecha, $tabla2.caravanaMacho FROM  $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla2.estadoRodeo = :estadoRodeo AND $tabla.$item = :$item AND $tabla.$item2 = :$item2");

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

			$stmt = Conexion::conectar()->prepare("SELECT $tabla.caravana FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE
			
			$tabla.tipo = :tipo AND 
			$tabla.destino  = :destino AND 
			$tabla.sexo = :sexo AND 
			$tabla2.idRodeo IS :idRodeo  
			
			ORDER BY $tabla.caravana DESC");
			
			$stmt->bindParam(":idRodeo", $datos['idRodeo'], PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT $tabla.caravana FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.tipo = :tipo AND $tabla.destino  = :destino AND $tabla.sexo = :sexo AND $tabla2.estadoRodeo = :estadoRodeo  ORDER BY $tabla.caravana DESC");

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

	static public function mdlActualizarIdRodeoMacho($tabla1,$tabla2,$item,$valor,$item2,$valor2,$idRodeo){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla1 INNER JOIN $tabla2 ON $tabla1.idAnimal = $tabla2.idAnimal SET 
		$tabla2.idRodeo = :idRodeo
		WHERE $tabla1.$item = :$item AND $tabla1.$item2 = :$item2 AND $tabla1.sexo = 'M'");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		$stmt->bindParam(":idRodeo", $idRodeo, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			return $stmt ->errorInfo();

			return 'error';
			
		}
	

    }
	

}

?>
