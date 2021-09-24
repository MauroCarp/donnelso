<?php

require_once "conexion.php";

class ModeloPrecios{

	static public function mdlActualizarPrecios($tabla,$datos){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
            cerdo =  :cerdo,
            cordero =  :cordero,
            chivo =  :chivo,
            pollo =  :pollo,
            vaca =  :vaca,
            chorizo =  :chorizo,
            morcilla =  :morcilla,
            salame =  :salame,
            bondiola =  :bondiola,
            jamon =  :jamon,
            grasa =  :grasa,
            codeguines =  :codeguines,
            chicharron =  :chicharron,
            carne =  :carne, 
            comisionEmpleado =  :comisionEmpleado 
            WHERE id = :id 
            ");

		$stmt->bindParam(":cerdo", $datos["precioCerdo"], PDO::PARAM_INT);
		$stmt->bindParam(":cordero", $datos["precioCordero"], PDO::PARAM_INT);
		$stmt->bindParam(":chivo", $datos["precioChivo"], PDO::PARAM_INT);
		$stmt->bindParam(":pollo", $datos["precioPollo"], PDO::PARAM_INT);
		$stmt->bindParam(":vaca", $datos["precioVaca"], PDO::PARAM_INT);
		$stmt->bindParam(":chorizo", $datos["precioChorizo"], PDO::PARAM_INT);
		$stmt->bindParam(":morcilla", $datos["precioMorcilla"], PDO::PARAM_INT);
		$stmt->bindParam(":salame", $datos["precioSalames"], PDO::PARAM_INT);
		$stmt->bindParam(":bondiola", $datos["precioBondiola"], PDO::PARAM_INT);
		$stmt->bindParam(":jamon", $datos["precioJamon"], PDO::PARAM_INT);
		$stmt->bindParam(":grasa", $datos["precioGrasa"], PDO::PARAM_INT);
		$stmt->bindParam(":codeguines", $datos["precioCodeguines"], PDO::PARAM_INT);
		$stmt->bindParam(":chicharron", $datos["precioChicharron"], PDO::PARAM_INT);
		$stmt->bindParam(":carne", $datos["precioCarne"], PDO::PARAM_INT);
		$stmt->bindParam(":comisionEmpleado", $datos["comisionEmpleado"], PDO::PARAM_INT);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

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

    static public function mdlMostrarPrecios($tabla,$item){

        if($item != NULL){

			$stmt = Conexion::conectar()->prepare("SELECT $item FROM $tabla");

			$stmt-> bindParam(":".$item, $valor);
		
			$stmt->execute();

			return $stmt->fetch();

		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		
			$stmt->execute();
	
			return $stmt->fetch();

		}

    }

}

?>
