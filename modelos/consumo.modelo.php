<?php

require_once "conexion.php";

class ModeloConsumo{

	// INSUMOS

	static public function mdlNuevoInsumo($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre,fecha,precioKg) VALUES (:nombre, :fecha, :precioKg)");

		$stmt->bindParam(":nombre", $datos["insumo"], PDO::PARAM_STR);

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		
		$stmt->bindParam(":precioKg", $datos["precioKg"], PDO::PARAM_STR);

		if($stmt->execute()){
			
			// print_r($stmt ->errorInfo());
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}
	
	static public function mdlMostrarInsumo($tabla,$item,$valor){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetch();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha DESC");
		
			$stmt->execute();
	
			return $stmt->fetchAll();

		}
		
	}

	static public function mdlActualizarInsumo($tabla,$item,$valor,$item2,$valor2){
		
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE  $item2 = :$item2"); 
        
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt->bindParam(":".$item2, $valor2, PDO::PARAM_STR);

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

	static public function mdlInsumoValido($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM $tabla WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
		
		$stmt->execute();

		return $stmt->fetch();

	}

	static public function mdlEliminarInsumo($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
	
	}

	// STOCK
	static public function mdlStock($tabla, $datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,insumo,kilos,precio) VALUES (:fecha,:insumo,:kilos,:precio)");

		$cero = 0;
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":insumo", $datos["insumo"], PDO::PARAM_STR);
		$stmt->bindParam(":kilos", $cero , PDO::PARAM_INT);
		$stmt->bindParam(":precio", $cero, PDO::PARAM_INT);
		


		if($stmt->execute()){
			
			print_r($stmt ->errorInfo());
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());

			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}

	static public function mdlActualizarStock($tabla, $datos, $operador){
		
		if($operador == '+'){

			$stmt = Conexion::conectar()->prepare("UPDATE stock SET 
			fecha = :fecha,
			kilos = (SELECT kilos FROM stock WHERE insumo = :insumo) $operador :kilos,
			precio = :precio,
			insumo = :insumo
			WHERE id = (SELECT id FROM stock WHERE insumo = :insumo)");
		
			$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt->bindParam(":precio", $datos["precioKg"], PDO::PARAM_STR);		
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("UPDATE stock SET 
			kilos = (SELECT kilos FROM stock WHERE insumo = :insumo) $operador :kilos
			WHERE id = (SELECT id FROM stock WHERE insumo = :insumo)");

		}	

		$stmt->bindParam(":insumo", $datos["insumo"], PDO::PARAM_STR);
		$stmt->bindParam(":kilos", $datos["kilos"], PDO::PARAM_STR);	


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

	static public function mdlMostrarStock($tabla,$item,$valor){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetch();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY insumo asc");
		
			$stmt->execute();
	
			return $stmt->fetchAll();

		}
		
	}

	static public function mdlEliminarStock($tabla,$item,$valor){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE insumo = (SELECT nombre FROM insumos WHERE $item = :$item)");
		
		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			print_r($stmt ->errorInfo());

			return 'error';
			
		}
	
	}

	// FORMULAS
	static public function mdlNuevaFormula($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,nombre,animal,precioKg,insumo1,kg1,insumo2,kg2,insumo3,kg3) VALUES (:fecha,:nombre,:animal,:precioKg,:insumo1,:kg1,:insumo2,:kg2,:insumo3,:kg3)");

		$insumo2 = (isset($datos["insumo2"])) ? $datos["insumo2"] : null;
		$kg2 = (isset($datos["kgInsumo2"])) ? $datos["kgInsumo2"] : null;
		$insumo3 = (isset($datos["insumo3"])) ? $datos["insumo3"] : null;
		$kg3 = (isset($datos["kgInsumo3"])) ? $datos["kgInsumo3"] : null;

		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":animal", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":precioKg", $datos["precioKg"], PDO::PARAM_STR);
		$stmt->bindParam(":insumo1", $datos["insumo1"], PDO::PARAM_STR);
		$stmt->bindParam(":kg1", $datos["kgInsumo1"], PDO::PARAM_STR);
		$stmt->bindParam(":insumo2",$insumo2, PDO::PARAM_STR);
		$stmt->bindParam(":kg2", $kg2, PDO::PARAM_STR);
		$stmt->bindParam(":insumo3", $insumo3, PDO::PARAM_STR);
		$stmt->bindParam(":kg3", $kg3, PDO::PARAM_STR);

		if($stmt->execute()){
			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());

			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;

	}

	static public function mdlMostrarFormulas($tabla,$item,$valor){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY nombre asc");
		
			$stmt->execute();
	
			return $stmt->fetchAll();

		}
		
	}

	// RACIONES

	static public function mdlCargarRacion($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo,animal,fecha,formula,kilos) VALUES(:tipo,:animal,:fecha,:formula,:kilos)");

		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":animal", $datos["animal"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":formula", $datos["formula"], PDO::PARAM_STR);		
		$stmt->bindParam(":kilos", $datos["kilos"], PDO::PARAM_INT);


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

	static public function mdlMostrarRacion($tabla,$item,$valor){

		if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetchAll();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha asc");
		
			$stmt->execute();
	
			return $stmt->fetchAll();

		}
		
	}


}