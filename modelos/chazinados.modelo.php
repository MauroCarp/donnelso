<?php

require_once "conexion.php";

class ModeloChazinados{

	static public function mdlNuevaCarneada($tabla,$datos){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,caravanas,propio,kgVivo,kgLimpio,'kgChorizos','kgMorcillas','kgSalames','kgBondiolas','kgJamon','kgGrasa','kgCodeguin','kgChicharron','kgCarne') VALUES(:fecha,:caravanas,:propio,:kgVivo,:kgLimpio,:kgChorizos,:kgMorcillas,:kgSalames,:kgBondiolas,:kgJamon,:kgGrasa,:kgCodeguin,:kgChicharron,:kgCarne)"); 

			$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt->bindParam(":caravanas", $datos["caravanas"], PDO::PARAM_STR);
			$stmt->bindParam(":propio", $datos["propio"], PDO::PARAM_STR);
			$stmt->bindParam(":kgVivo", $datos["kgVivo"], PDO::PARAM_STR);
			$stmt->bindParam(":kgLimpio", $datos["kgLimpio"], PDO::PARAM_STR);
			$stmt->bindParam(":kgChorizos", $datos["kgChorizos"], PDO::PARAM_STR);
			$stmt->bindParam(":kgMorcillas", $datos["kgMorcillas"], PDO::PARAM_STR);
			$stmt->bindParam(":kgSalames", $datos["kgSalames"], PDO::PARAM_STR);
			$stmt->bindParam(":kgBondiolas", $datos["kgBondiolas"], PDO::PARAM_STR);
			$stmt->bindParam(":kgJamon", $datos["kgJamon"], PDO::PARAM_STR);
			$stmt->bindParam(":kgGrasa", $datos["kgGrasa"], PDO::PARAM_STR);
			$stmt->bindParam(":kgCodeguin", $datos["kgCodeguin"], PDO::PARAM_STR);
			$stmt->bindParam(":kgChicharron", $datos["kgChicharron"], PDO::PARAM_STR);
			$stmt->bindParam(":kgCarne", $datos["kgCarne"], PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;

	}

	// static public function mdlMostrarAnimal($tabla,$item,$valor,$item2,$valor2){

	// 	if($item != NULL){

	// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
	// 		if($item2 != NULL){
				
	// 			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
				
	// 			$stmt-> bindParam(":".$item2, $valor2);

	// 		}

	// 		$stmt-> bindParam(":".$item, $valor);
	// 		// return $stmt;

	// 		$stmt->execute();

	// 		return $stmt->fetchAll();

	// 	}else{
			
	// 		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY tipo ASC");
	
	// 		// return $stmt;

	// 		$stmt->execute();
	
	// 		return $stmt->fetchAll();

	// 	}

	// }

	// static public function mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2){

	// 	$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item2 = :$item2 WHERE $item = :$item");
		
	// 	$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
	// 	$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

	// 	if($stmt->execute()){
			
	// 		return "ok";	
			
	// 	}else{
	// 		print_r($stmt ->errorInfo());

	// 		return 'error';
			
	// 	}
	
	// }

	// static public function mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2){
	
	// 	$stmt = Conexion::conectar()->prepare("SELECT COUNT($item) as caravanaValida FROM $tabla WHERE $item = :$item AND $item2 = :$item2");
		
	// 	$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
	// 	$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		
	// 	$stmt->execute();	

	// 	return $stmt->fetch();
				
	// 	$stmt->close();
		
	// 	$stmt = null;

	// }

}

?>
