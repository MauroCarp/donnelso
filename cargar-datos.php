<?php
error_reporting(E_ERROR | E_PARSE);

require_once('extensiones/excel/php-excel-reader/excel_reader2.php');
require_once('extensiones/excel/SpreadsheetReader.php');
require_once('modelos/conexion.php');


function fechaExcel($fecha){
	$fechaTemp = explode("-",$fecha);
	$nuevaFecha = $fechaTemp[1]."-".$fechaTemp[0]."-".$fechaTemp[2];
	$standarddate = "20".substr($nuevaFecha,6,2) . "-" . substr($nuevaFecha,3,2) . "-" . substr($nuevaFecha,0,2);
	return $standarddate;
}

function comprobarVacio($campo,$campoVacio){

    $campoVacio = ($campo == '') ? ($campoVacio + 1) : $campoVacio;

    return $campoVacio;

}

if( isset($_FILES["nuevosDatos"]) ){

	$error = false;

	$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];

    $tipo = $_POST['tipo'];

	if(in_array($_FILES["nuevosDatos"]["type"],$allowedFileType)){

        $ruta = "extensiones/excel/cargas/" . $_FILES['nuevosDatos']['name'];

        move_uploaded_file($_FILES['nuevosDatos']['tmp_name'], $ruta);

        $nombreArchivo = str_replace(' ', '',$_FILES['nuevosDatos']['name']);

        $rowValida = FALSE;

        $Reader = new SpreadsheetReader($ruta);	

		$sheetCount = count($Reader->sheets());
        
		for($i=0;$i<$sheetCount;$i++){

            $Reader->ChangeSheet($i);
        
            $rowValida = FALSE;

            $rowNumber = 0;

            foreach ($Reader as $Row){

                $rowNumber++;

                if($rowValida == TRUE){   

                    if($tipo == 'ovino'){
                        
                        $caravanaNumero   =   $Row[0];
                        $caravanaColor   =   $Row[1];
                        $sexo   =   $Row[2];
                        $edad   =   $Row[3];
                        $proveedor   =   $Row[4];
                        $servida = $Row[5];

                        $tipoTemp = ($tipo == 'ovino' AND $sexo == 'M') ? 'cordero' : $tipo;

                        $idAnimal = $tipoTemp.$caravanaNumero.$caravanaColor;

                        $caravana = $caravanaNumero.$caravanaColor;
                        

                        $sql = "INSERT INTO animales(idAnimal,tipo,caravana,edad,proveedor,sexo,destino)VALUES('$idAnimal','$tipoTemp','$caravana','$edad','$proveedor','$sexo','Reproductor')";
                        // echo "$sql<br>";

                        mysqli_query($conexion,$sql);
                        
                        echo mysqli_error($conexion);
                        
                        $tabla = ($sexo == 'H') ? 'hembras' : 'machos';

                        $intoEstadoRodeo = ($sexo == 'H') ? ',estadoRodeo' : '';

                        $valueEstadoRodeo = ($sexo == 'H') ? ",'Descanso'" : '';
                            
                        $sql = "INSERT INTO $tabla(idAnimal $intoEstadoRodeo)VALUES('$idAnimal' $valueEstadoRodeo)";
                        
                        // echo "$sql<hr>";
                        mysqli_query($conexion,$sql);
                        
                        echo mysqli_error($conexion);
                    
                    }else{
    
                            $caravanaNumero   =   $Row[0];
                            $sexo   =   $Row[1];
                            $proveedor   =  'Propio';
    
                            $idAnimal = $tipo.$caravanaNumero;
    
                            $sql = "INSERT INTO animales(idAnimal,tipo,caravana,proveedor,sexo,destino)VALUES('$idAnimal','$tipo','$caravanaNumero','$proveedor','$sexo','Reproductor')";

                            mysqli_query($conexion,$sql);
                            
                            echo mysqli_error($conexion);
                            
                            $tabla = ($sexo == 'H') ? 'hembras' : 'machos';
    
                            $intoEstadoRodeo = ($sexo == 'H') ? ',estadoRodeo' : '';
    
                            $valueEstadoRodeo = ($sexo == 'H') ? ",'Descanso'" : '';
                                
                            $sql = "INSERT INTO $tabla(idAnimal $intoEstadoRodeo)VALUES('$idAnimal' $valueEstadoRodeo)";
                            
                            // echo "$sql<hr>";
                            mysqli_query($conexion,$sql);
                            
                            echo mysqli_error($conexion);
                        

                    }



                
                }

                if($rowNumber == 1){

                    $rowValida = TRUE;

                }


            }	

        }

    }

}

?>

<form role="form" method="post" enctype="multipart/form-data" action="cargar-datos.php">

     <div class="form-group">
      
      <div class="panel">Seleccionar Archivo</div>

      <input type="file" class="nuevosDatos" name="nuevosDatos">

    </div>

    <div class="form-group">
      
      <div class="panel">Tipo</div>

      <select name="tipo">
          <option value="cerdo">Cerdo</option>
          <option value="ovino">ovino</option>
          <option value="chivo">chivo</option>
          <option value="vaca">vaca</option>
          <option value="pollo">pollo</option>
      </select>

    </div>


<div class="modal-footer">

  <button type="submit" class="btn btn-primary">Cargar Datos</button>

</div>

</form>
