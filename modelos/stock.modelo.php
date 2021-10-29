<?php

require_once "conexion.php";

class ModeloStock{

    static public function mdlActualizarStock($tabla,$item,$valor,$sumaResta,$cantidad){
        
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET 
        stock = (SELECT stock FROM $tabla WHERE $item = :$item) $sumaResta $cantidad
        WHERE $item = :$item");
        
        $stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);

        if($stmt->execute()){
            
            return "ok";	
            
        }else{
            return $stmt ->errorInfo();

            return 'error';
            
        }
    

    }

    static public function mdlMostrarStock($tabla,$item,$valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			
			$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
			
		}else{
			
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			
		}

        $stmt->execute();

		return $stmt->fetchAll();

        $stmt->close();
		
		$stmt = null;

    }
	
	static public function mdlActualizarStockChazinados($tabla,$item,$diferencia,$operador){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = (SELECT $item FROM $tabla) $operador :$item");

		$stmt->bindParam(":".$item, $diferencia, PDO::PARAM_STR);
	
        if($stmt->execute()){
            
            return "ok";	
            
        }else{
            return $stmt ->errorInfo();

            return 'error';
            
        }
        
	}

    static public function mdlActualizarStockChazinadosEliminar($tabla,$item,$valor,$operador){
		
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = (SELECT $item FROM $tabla) $operador :$item");

		$stmt->bindParam(":".$item, $valor, PDO::PARAM_STR);
	
        if($stmt->execute()){
            
            return "ok";	
            
        }else{
            return $stmt ->errorInfo();

            return 'error';
            
        }
        
	}

}

?>
