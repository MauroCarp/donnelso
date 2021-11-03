<?php

require_once "conexion.php";

class ModeloIngresos{

	/*=============================================
	REGISTRO DE COMPRA
    ==============*/

	static public function mdlNuevoIngreso($tabla, $datos){
		
		if($tabla == 'animales'){
		
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,tipo,caravana,fecha, proveedor, sexo, destino,peso,precio,listoVenta) VALUES (:idAnimal, :tipo,:caravana,:fecha, :proveedor, :sexo, 'Engorde',:peso,:precio,:listoVenta)");

			$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
			$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
			$stmt->bindParam(":caravana", $datos["caravana"], PDO::PARAM_STR);
			$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
			$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
			$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
			$stmt->bindParam(":peso", $datos["peso"], PDO::PARAM_STR);
			$stmt->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
			$stmt->bindParam(":listoVenta", $datos["listo"], PDO::PARAM_STR);
			
		}
		
		if($tabla == 'machos' OR $tabla == 'hembras'){

			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal) VALUES (:idAnimal)");
	
			$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);

		}

		if($stmt->execute()){
			return "ok";	
			
		}else{
			
			var_dump($stmt->errorInfo());
			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}

   
	/*=============================================
	OBTENER ULTIMO ID
	=============================================*/
   
	static public function mdlObtenerUltimoId($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT MAX(id) FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}
   
	/*=============================================
	NUEVO EXTERNO
	=============================================*/
   
	static public function mdlNuevoExterno($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idAnimal,idCompra,precioPromedio,pesoPromedio) VALUES(:idAnimal, :idCompra, :precioPromedio, :pesoPromedio)");
		// var_dump($datos);
		$stmt->bindParam(":idAnimal", $datos["idAnimal"], PDO::PARAM_STR);
		$stmt->bindParam(":idCompra", $datos["idCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":precioPromedio", $datos["precioPromedio"], PDO::PARAM_STR);
		$stmt->bindParam(":pesoPromedio", $datos["pesoPromedio"], PDO::PARAM_STR);
	
		
		if($stmt->execute()){

			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			
			return 'error';
			
		}
		

		$stmt -> close();

		$stmt = null;

	}

	
	/*=============================================
	REGISTRO INGRESO
	=============================================*/
   
	static public function mdlRegistroCompras($tabla,$datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(idcompra,tipo,fecha,cantidad,machos,hembras,proveedor,engorde,precioTotal,pesoTotal) VALUES(:idCompra,:tipo,:fecha,:cantidad,:machos,:hembras,:proveedor,:engorde,:precioTotal,:pesoTotal)");

		$stmt->bindParam(":idCompra", $datos["idCompra"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo", $datos["tipo"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["totalAnimales"], PDO::PARAM_STR);
		$stmt->bindParam(":machos", $datos["machos"], PDO::PARAM_STR);
		$stmt->bindParam(":hembras", $datos["hembras"], PDO::PARAM_STR);
		$stmt->bindParam(":proveedor", $datos["proveedor"], PDO::PARAM_STR);
		$stmt->bindParam(":engorde", $datos["engorde"], PDO::PARAM_STR);
		$stmt->bindParam(":precioTotal", $datos["precioTotal"], PDO::PARAM_STR);
		$stmt->bindParam(":pesoTotal", $datos["kgTotal"], PDO::PARAM_STR);
	
		
		if($stmt->execute()){

			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			
			return 'error';
			
		}
		

		$stmt -> close();

		$stmt = null;

	}

	   
	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/
   
	static public function mdlMostrarCompras($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha ASC");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
			$stmt -> execute();
			
			return $stmt -> fetch();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha ASC");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

	}

	   
	/*=============================================
	MOSTRAR INGRESOS
	=============================================*/

	static public function mdlEliminarCompra($tabla,$tabla2,$item,$valor){

		if($tabla2 != NULL){
			
			$stmt = Conexion::conectar()->prepare("DELETE $tabla,$tabla2 FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item");
			
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");
	
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		
			
		}

		if($stmt->execute()){
			
			return "ok";	
			
		}else{
			
			var_dump($stmt ->errorInfo());


			return 'error';
			
		}
		
		$stmt->close();
		
		$stmt = null;


	}


	/*=============================================
	BUSCAR CARAVANA
	=============================================*/

	static public function mdlBuscarMadrePadre($tabla,$tabla2,$item,$valor,$item2,$valor2,$buscar){
		
		if($item2 == NULL){
		
			$stmt = Conexion::conectar()->prepare("SELECT $buscar FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item AND estadoRodeo = 'Servida' ");
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT $buscar FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item AND $tabla.$item2 = :$item2");

			$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
		}
		
		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
	
		$stmt -> execute();
		// var_dump($valor,$valor2,$buscar);
		// return $stmt;

		// var_dump($stmt ->errorInfo());

		return $stmt -> fetchAll();

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	NUEVO REG PARTO
	=============================================*/
	static public function mdlNuevoRegParto($tabla,$datos){
		
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(tipo,caravanaMadre,caravanaPadre,fecha,cantidad,sexo,mellizo,complicacion) VALUES(:tipo,:caravanaMadre,:caravanaPadre,:fecha,:cantidad,:sexo,:mellizo,:complicacion)");

		$stmt->bindParam(":tipo", $datos['tipo'], PDO::PARAM_STR);
		$stmt->bindParam(":caravanaMadre", $datos['caravanaMadre'], PDO::PARAM_STR);
		$stmt->bindParam(":caravanaPadre", $datos['caravanaMacho'], PDO::PARAM_STR);
		$stmt->bindParam(":fecha", $datos["fechaParto"], PDO::PARAM_STR);
		$stmt->bindParam(":cantidad", $datos["cantidadNacidos"], PDO::PARAM_STR);
		$stmt->bindParam(":sexo", $datos["sexo"], PDO::PARAM_STR);
		$stmt->bindParam(":mellizo", $datos["mellizos"], PDO::PARAM_STR);
		$stmt->bindParam(":complicacion", $datos["complicacionMadre"], PDO::PARAM_STR);
	
		// return $datos;

		if($stmt->execute()){

			
			return "ok";	
			
		}else{

			var_dump($stmt ->errorInfo());
			
			return 'error';
			
		}
		

		$stmt -> close();

		$stmt = null;

	}

	/*=============================================
	BUSCAR ULTIMO REGISTRO PARTO
	=============================================*/

	static public function mdlMostrarUltimoRegParto($tabla){
		
		$stmt = Conexion::conectar()->prepare("SELECT MAX(idParto) as ultimoId FROM $tabla");

		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;


	}

	/*=============================================
	BUSCAR ULTIMA CARAVANA HIJA
	=============================================*/

	static public function mdlUltimaCaravanaHija($tabla,$tabla2,$item,$valor,$item2,$valor2){

		$stmt = Conexion::conectar()->prepare("SELECT $tabla2.caravana FROM $tabla INNER JOIN $tabla2 ON $tabla.idAnimal = $tabla2.idAnimal WHERE $tabla.$item = :$item AND $tabla2.$item2 LIKE :$item2 ORDER BY $tabla2.id DESC");
		
		$caravanaHija = $valor2.'/%';

		$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $caravanaHija, PDO::PARAM_STR);
			
		$stmt -> execute();

		return $stmt -> fetch();

		$stmt -> close();

		$stmt = null;

	}

	
    /*=============================================
    MOSTRAR PARTOS
    =============================================*/
    
    static public function mdlMostrarPartos($tabla,$item,$valor,$item2,$valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item ORDER BY fecha ASC");
			
			if($item2 != null){
				
				$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item AND $item2 = :$item2 ORDER BY fecha ASC");
			
				$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);
			}

			// return $valor.$valor2;
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			
			$stmt -> execute();
			
			return $stmt -> fetchAll();
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY fecha ASC");
			
			$stmt -> execute();

			return $stmt -> fetchAll();
			
		}

		$stmt -> close();

		$stmt = null;

    }
}