<?php

class ControladorConsumo{

    // INSUMOS
	static public function ctrNuevoInsumo(){

			if($_POST['nuevoInsumo'] != '' AND $_POST['precio'] != ''){

                $tabla = 'insumos';

                $item = 'nombre';

                $insumoValido = ControladorConsumo::ctrInsumoValido($item,$_POST['nuevoInsumo']);

                if($insumoValido[0] != 0){

                    echo '<script>

                    new swal({

                        icon: "error",
                        title: "¡El insumo ya esta registrado!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    });                        

                    </script>';

                    return;

                }

                $datos = array("insumo" => $_POST["nuevoInsumo"],
                "fecha" => date('Y-m-d'),
                "precioKg" => 0
                );

                $respuesta = ModeloConsumo::mdlNuevoInsumo($tabla, $datos);

                $respuesta = ControladorConsumo::ctrNuevoRegistroInsumo($datos);
                
                $respuesta = ControladorConsumo::ctrStock($datos);

                if ($respuesta == 'ok'){

                echo '<script>

                new swal({

                        icon: "success",
                        title: "El insumo ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "consumo";

                        }

                    });

                </script>';

                }else{
             
                    echo '<script>

                    new  swal({

                        icon: "error",
                        title: "Hubo un error al cargar. Notificar a Mauro",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "consumo";

                        }

                    });

                </script>';
                
                }

		    }else{

                echo '<script>

                new swal({

                                icon: "error",
                                title: "¡Hay campos que no pueden ir vacíos!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            });                        

                        </script>';


            }

    }

    static public function ctrMostrarInsumo($item,$valor){

        $tabla = 'insumos';

        return $resultado = ModeloConsumo::mdlMostrarInsumo($tabla,$item,$valor);
    }

    static public function ctrActualizarInsumo($item,$valor,$item2,$valor2){

        $tabla = 'insumos';

       return  $respuesta = ModeloConsumo::mdlActualizarInsumo($tabla,$item,$valor,$item2,$valor2);
        
    }

    static public function ctrEliminarInsumo(){
        
		if(isset($_GET["idInsumo"])){

			$tabla ="insumos";

            $item = 'id';

            $valor = $_GET['idInsumo'];

			$respuesta = ModeloConsumo::mdlEliminarInsumo($tabla, $item,$valor);


			$respuesta = ControladorConsumo::ctrEliminarStock($item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				new swal({
					  icon: "success",
					  title: "El Insumo ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "consumo";

								}
							})

				</script>';

			}		

		}
    
    }

    static public function ctrInsumoValido($item,$valor){

        $tabla = 'insumos';

        return $respuesta = ModeloConsumo::mdlInsumoValido($tabla,$item,$valor);

    }


    // REGISTRO DE INSUMOS
    static public function ctrNuevoRegistroInsumo($datos){

        $tabla = 'registroInsumos';
        
        return $respuesta = ModeloConsumo::mdlNuevoInsumo($tabla,$datos);


    }
    
    static public function ctrMostrarRegistrosInsumo($item,$valor){

        $tabla = 'registroInsumos';

        $resultado = ModeloConsumo::mdlMostrarInsumo($tabla,$item,$valor);

        return $resultado;
    }

    static public function ctrEliminarRegistroInsumo(){
        
		if(isset($_GET["idRegistroInsumo"])){

			$tabla ="registroinsumos";

            $item = 'id';

            $valor = $_GET['idRegistroInsumo'];

            $respuesta = ModeloConsumo::mdlEliminarInsumo($tabla, $item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				new swal({
					  icon: "success",
					  title: "El Registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "consumo";

								}
							})

				</script>';

			}		

		}
    
    }


    // STOCK
    static public function ctrStock($datos){

        $tabla = 'stock';
        
        return $respuesta = ModeloConsumo::mdlStock($tabla,$datos);


    }

    static public function ctrMostrarStock($item,$valor){

        $tabla = 'stock';

        return $resultado = ModeloConsumo::mdlMostrarStock($tabla,$item,$valor);
    }
   
    static public function ctrEliminarStock($item,$valor){
        
        $tabla ="stock";

        $respuesta = ModeloConsumo::mdlEliminarStock($tabla, $item,$valor);
    
    }

    static public function ctrActualizarStock($datos,$operador){
        
        $tabla = 'stock';
        
        return $respuesta = ModeloConsumo::mdlActualizarStock($tabla, $datos, $operador);
        
    }


    // FORMULAS
    static public function ctrNuevaFormula(){

        if(array_key_exists('insumo',$_POST)){
            
            if(!in_array('Seleccionar Insumo',$_POST['insumo'])){

                $tabla = 'formulas';

                $datos = array("nombre" => $_POST["nombreFormulaNueva"],
                "animal"=> $_POST['formulaAnimal'],
                "precioKg"=> $_POST['precioTotal'],
                "fecha" => date('Y-m-d')
                );
                

                for($i = 0; $i < sizeOf($_POST['insumo']); $i++){
                    
                    $indiceInsumo = 'insumo'.($i + 1);
                    $datos[$indiceInsumo] = $_POST['insumo'][$i];

                    $indiceKg = 'kgInsumo'.($i + 1);
                    $datos[$indiceKg] = $_POST['kgInsumo'][$i];

                    $indicePrecio = 'precioInsumo'.($i + 1);
                    $datos[$indicePrecio] = $_POST['precioInsumo'][$i];

                }

                $respuesta = ModeloConsumo::mdlNuevaFormula($tabla, $datos);
                
                if($respuesta == 'ok'){
                    
                    echo '<script>

                    new  swal({

                            icon: "success",
                            title: "La formula ha sido guardada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"

                        }).then(function(result){

                            if(result.value){
                            
                                window.location = "consumo";

                            }

                        });

                    </script>';

                }else{
            
                    echo '<script>

                    new swal({

                        icon: "error",
                        title: "Hubo un error al cargar. Notificar a Mauro",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "consumo";

                        }

                    });

                    </script>';
                
                }

            }else{

                echo '<script>
        
                new swal({
        
                    icon: "error",
                    title: "¡Hay campos que no pueden ir vacíos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
        
                });                        
        
                </script>';
        
        
            }

        }
    }

    static public function ctrMostrarFormulas($item,$valor){

        $tabla = 'formulas';

        return $resultado = ModeloConsumo::mdlMostrarFormulas($tabla,$item,$valor);
    }

    static public function ctrEliminarFormula(){

        if(isset($_GET["idFormula"])){

			$tabla ="formulas";

            $item = 'id';

            $valor = $_GET['idFormula'];

            $respuesta = ModeloConsumo::mdlEliminarInsumo($tabla, $item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				new swal({
					  icon: "success",
					  title: "La Formula ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "consumo";

								}
							})

				</script>';

			}		

		}
    
    }

    // RACIONES

    static public function ctrCargarRacion(){
      
        if(isset($_POST['cargarRacion'])){

            $tabla = 'raciones';

            $datos = array(
                'tipo'=>$_POST['tipoRacion'],
                'animal'=>$_POST['animalRacion'],
                'fecha'=>$_POST['fechaRacion'],
                'formula'=>$_POST['formulaRacion'],
                'kilos'=>$_POST['kgRacion']
            );


            $item = 'nombre';

            $valor = $datos['formula'];

            $operador = '-';

            $formula = ControladorConsumo::ctrMostrarFormulas($item,$valor);
            
            if($formula[0]['insumo2'] != null){
                
                $kgTotal = 0;

                $insumo1 = $formula[0]['insumo1'];
                $kg1 = $formula[0]['kg1'];

                $insumo2 = $formula[0]['insumo2'];
                $kg2 = $formula[0]['kg2'];
                    
                $kgTotal = $kg1 + $kg2;

                
                $porcentaje1 = ($kg1 * 100) / $kgTotal;
                $porcentaje2 = ($kg2 * 100) / $kgTotal;

                $kilosInsumo1 = $datos['kilos'] * ($porcentaje1 / 100);

                $datosStock = array('insumo' => $insumo1,
                'kilos' => $kilosInsumo1);
                
                $actualizarStock = ControladorConsumo::ctrActualizarStock($datosStock,$operador);
                
                
                $kilosInsumo2 = $datos['kilos'] * ($porcentaje2 / 100);

                $datosStock = array('insumo' => $insumo2,
                'kilos' => $kilosInsumo2);

                $actualizarStock = ControladorConsumo::ctrActualizarStock($datosStock,$operador);
                


            }else{

                $datosStock = array('insumo' => $formula[0]['insumo1'],
                'kilos' => $datos['kilos']);
    
                $actualizarStock = ControladorConsumo::ctrActualizarStock($datosStock,$operador);

            }
        

            $respuesta = ModeloConsumo::mdlCargarRacion($tabla,$datos);

            if($respuesta == 'ok'){
                    
                echo '<script>

                   new swal({

                        icon: "success",
                        title: "El registro ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "consumo";

                        }

                    });

                </script>';

            }else{
        
                echo '<script>

               new swal({

                    icon: "error",
                    title: "Hubo un error al cargar. Notificar a Mauro",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "consumo";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrMostrarRacion($item,$valor){
      
        $tabla = 'raciones';

        return $respuesta = ModeloConsumo::mdlMostrarRacion($tabla,$item,$valor);

    }

    static public function ctrEliminarRacion(){

        if(isset($_GET["idRacion"])){

			$tabla ="raciones";

            $item = 'id';

            $valor = $_GET['idRacion'];

            $respuesta = ModeloConsumo::mdlEliminarInsumo($tabla, $item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				new swal({
					  icon: "success",
					  title: "El registro ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "consumo";

								}
							})

				</script>';

			}		

		}
    
    }

}   

?>