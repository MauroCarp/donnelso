<?php

require_once "conexion.php";

class ModeloAnimales{

	static public function mdlNuevoAnimal($tabla,$datos){

		if($tabla == 'animales'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo,caravana,fecha,peso,proveedor,sexo,destino,idParto,complicacion) VALUES(:idAnimal,:tipo,:caravana,:fecha,:peso,'Propio',:sexo,:destino,:idParto,:complicacion)"); 
			
			$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $datos["fechaNacimiento"], PDO::PARAM_STR);
			$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt->bindParam(":destino", $datos["destino"], PDO::PARAM_STR);
			$stmt->bindParam(":idParto", $datos["idParto"], PDO::PARAM_STR);
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

		if($stmt->execute()){
			
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

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY caravana ASC");
			
			if($item2 != NULL){
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY caravana ASC");
				
				$stmt-> bindParam(":".$item2, $valor2);

			}

			$stmt-> bindParam(":".$item, $valor);
			
			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY tipo ASC");
	
			$stmt->execute();
	
			return $stmt->fetchAll();

		}

	}

	static public function mdlMostrarAnimalSexo($tabla,$item,$valor,$item2,$valor2,$sexo){

			$tabla2 = ($sexo == 'M') ? 'machos' : 'hembras';

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item AND $tabla.$item2 = :$item2");
			
			$stmt-> bindParam(":".$item2, $valor2);

			$stmt-> bindParam(":".$item, $valor);

			$stmt->execute();

			return $stmt->fetchAll();

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

	static public function mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2){
	
		$stmt = Conexion::conectar()->prepare("SELECT COUNT($item) as caravanaValida FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
		$stmt->execute();	

		return $stmt->fetch();
				
		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlEliminarAnimal($tabla,$item,$valor){
	
		if($valor != 'pollo'){

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		
		}else{

			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item AND listoVenta = 1 AND id = (SELECT MAX(id) FROM $tabla WHERE $item = :$item AND listoVenta = 1)");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);


		}

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());

			return 'error';
			
		}
	
	}

	static public function mdlEditarAnimal($tabla,$datos){

		$resultado = '';

		if($datos['sexo'] == 'M'){
			
			$tabla2 = 'machos';
			
			$sexo = "$tabla2.idRodeo = :idRodeo";

		}else{

			$tabla2 = 'hembras';

			$sexo = "$tabla2.estadoRodeo = :estadoRodeo,$tabla2.caravanaMacho = :caravanaMacho,$tabla2.fecha = :fecha";

		}

		// if($datos['sexo'] == 'M'){
			
		// 	$stmt->bindParam(":idRodeo", $datos['idRodeo'], PDO::PARAM_STR);
			
		// }else{
			
		// 	$stmt->bindParam(":estadoRodeo", $datos['estadoRodeo'], PDO::PARAM_STR);

		// 	$sexo = "$tabla2.estadoRodeo = :estadoRodeo";

		// }

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal
		 SET $tabla.caravana = :caravana,
		  $tabla.fecha = :fecha,
		 $tabla.edad = :edad,
		 $tabla.peso = :peso,
		 $tabla.proveedor = :proveedor,
		 $tabla.sexo = :sexo,
		 $tabla.destino = :destino,
		 $tabla.complicacion = :complicacion,
		 $tabla2.estado = :estado
		 WHERE $tabla.idAnimal = :idAnimal");
		
		$fecha = ($datos['fecha'] == '') ? null : $datos['fecha'];
		$peso = ($datos['peso'] == '') ? null : $datos['peso'];

		$stmt->bindParam(":idAnimal", $datos['idAnimal'], PDO::PARAM_STR);
		$stmt->bindParam(":caravana", $datos['caravana'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
		$stmt->bindParam(":edad", $datos['edad'], PDO::PARAM_STR);
		$stmt->bindParam(":peso", $peso, PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $datos['proveedor'], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos['sexo'], PDO::PARAM_STR);
		$stmt->bindParam(":destino", $datos['destino'], PDO::PARAM_STR);
		$stmt->bindParam(":complicacion", $datos['complicacion'], PDO::PARAM_STR);
		$stmt->bindParam(":estado", $datos['estado'], PDO::PARAM_STR);
		
		
		if($stmt->execute()){
			
			$resultado = "ok";	
			
		}else{
			
			// return $stmt ->errorInfo();
			$resultado = 'error';
			
		}
		
		if(isset($datos['listoVenta'])){
			
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET listoVenta = :listoVenta WHERE idAnimal = :idAnimal");
			
			$stmt->bindParam(":listoVenta", $datos['listoVenta'], PDO::PARAM_STR);
			$stmt->bindParam(":idAnimal", $datos['idAnimal'], PDO::PARAM_STR);
			
			$stmt->execute();

			if($stmt->execute()){
				
				$resultado = "ok";	
				
			}else{
				print_r($stmt ->errorInfo());
	
				$resultado = 'error';
				
			}

		}
		
		return $resultado;
	
	}

}

?>
