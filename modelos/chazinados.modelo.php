<?php

require_once "conexion.php";

class ModeloChazinados{

	static public function mdlNuevaCarneada($tabla,$datos){


			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,caravanas,propio,kgVivo,kgLimpio,chorizo,morcilla,salame,bondiola,jamon,grasa,codeguin,chicharron,carne) VALUES(:fecha,:caravanas,:propio,:kgVivo,:kgLimpio,:kgChorizos,:kgMorcillas,:kgSalames,:kgBondiolas,:kgJamon,:kgGrasa,:kgCodeguin,:kgChicharron,:kgCarne)"); 

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

	static public function mdlMostrarChazinado($tabla,$item,$valor){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
			$stmt-> bindParam(":".$item, $valor);
			
			$stmt->execute();

			return $stmt->fetch();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha ASC");
		
			$stmt->execute();
	
			return $stmt->fetchAll();

		}


	}

	static public function mdlEditarCarneada($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		fecha = :fecha,
		propio = :propio,
		kgVivo = :kgVivo,
		kgLimpio = :kgLimpio,
		chorizo = :chorizo,
		morcilla = :morcilla,
		salame = :salame,
		bondiola = :bondiola,
		jamon = :jamon,
		codeguin = :codeguines,
		grasa = :grasa,
		chicharron = :chicharron,
		carne = :carne
		WHERE idCarneada = :idCarneada");

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":propio", $datos["propio"], PDO::PARAM_STR);
		$stmt->bindParam(":kgVivo", $datos["kgVivo"], PDO::PARAM_STR);
		$stmt->bindParam(":kgLimpio", $datos["kgLimpio"], PDO::PARAM_STR);
		$stmt->bindParam(":chorizo", $datos["chorizos"], PDO::PARAM_STR);
		$stmt->bindParam(":morcilla", $datos["morcillas"], PDO::PARAM_STR);
		$stmt->bindParam(":salame", $datos["salames"], PDO::PARAM_STR);
		$stmt->bindParam(":bondiola", $datos["bondiolas"], PDO::PARAM_STR);
		$stmt->bindParam(":jamon", $datos["jamon"], PDO::PARAM_STR);
		$stmt->bindParam(":grasa", $datos["grasa"], PDO::PARAM_STR);
		$stmt->bindParam(":codeguines", $datos["codeguines"], PDO::PARAM_STR);
		$stmt->bindParam(":chicharron", $datos["chicharron"], PDO::PARAM_STR);
		$stmt->bindParam(":carne", $datos["carne"], PDO::PARAM_STR);
		$stmt->bindParam(":idCarneada", $datos["idCarneada"], PDO::PARAM_INT);
		
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

	static public function mdlEditarVentaChazinados($tabla,$datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
		comprador = :comprador,
		producto = :producto,
		kg = :kg
		WHERE id = :id");

		$stmt->bindParam(":comprador", $datos["comprador"], PDO::PARAM_STR);
		$stmt->bindParam(":producto", $datos["producto"], PDO::PARAM_STR);
		$stmt->bindParam(":kg", $datos["kg"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["idVenta"], PDO::PARAM_STR);
		
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

}

?>
