<?php

class ControladorChazinados{

    
    static public function ctrNuevaCarneada(){

        if(isset($_POST['btnIngresarChazinado'])){

            $tabla = 'carneadas';

            $caravanas = implode('*',$_POST['caravanaChazinado']);

            $propio = (isset($_POST['propioChazinado'])) ? 1 : 0;

            $datos = array(
                'fecha'=>$_POST['fechaChazinado'],
                'propio'=>$propio,
                'caravanas'=>$caravanas,
                'kgVivo'=>$_POST['kgVivoChazinado'],
                'kgLimpio'=>$_POST['kgLimpioChazinado'],
                'kgChorizos'=>$_POST['kgChorizos'],
                'kgMorcillas'=>$_POST['kgMorcillas'],
                'kgSalames'=>$_POST['kgSalames'],
                'kgBondiolas'=>$_POST['kgBondiolas'],
                'kgJamon'=>$_POST['kgJamon'],
                'kgGrasa'=>$_POST['kgGrasa'],
                'kgCodeguin'=>$_POST['kgCodeguin'],
                'kgChicharron'=>$_POST['kgChicharron'],
                'kgCarne'=>$_POST['kgCarne']
            );

            $respuesta = ModeloChazinados::mdlNuevaCarneada($tabla,$datos);

            // ELIMINAR ANIMALES 

            $caravanas = explode('*',$caravanas);

            $item = 'caravana';

            $item2 = 'tipo';

            $valor2 = 'cerdo';

            for ($i=0; $i < sizeof($caravanas); $i++) { 
                
                $valor = $caravanas[$i];

                $respuesta = ControladorAnimales::ctrEliminarAnimal($item,$valor,$item2,$valor2);
                // var_dump($respuesta);

            }


            if($respuesta == "ok"){
                
                echo'<script>

				new swal({
					  icon: "success",
					  title: "La Carneada ha sido cargada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "chazinados";

								}
							})

				</script>';

			}else{

                echo'<script>

			    new swal({
					  icon: "error",
					  title: "La Carneada no ha sido cargada correctamente.Informar a Mauro",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "chazinados";

								}
							})

				</script>';

            }		
        }
        
    }

    static public function ctrMostrarChazinado($item,$valor){

        $tabla = ($item == 'idCarneada' OR $item == null) ? 'carneadas' : 'ventaschazinados';

        return $respuesta = ModeloChazinados::mdlMostrarChazinado($tabla,$item,$valor);
         
    }

    static public function ctrEditarCarneada(){

        if(isset($_POST['btnEditarChazinado'])){

            // ACTUALIZAR STOCK

            $datosStock = array(
                'chorizo' => $_POST['editarKgChorizos'],
                'morcilla' => $_POST['editarKgMorcillas'],
                'salame' => $_POST['editarKgSalames'],
                'bondiola' => $_POST['editarKgBondiolas'],
                'jamon' => $_POST['editarKgJamon'],
                'codeguin' => $_POST['editarKgCodeguines'],
                'grasa' => $_POST['editarKgGrasa'],
                'chicharron' => $_POST['editarKgChicharron'],
                'carne' => $_POST['editarKgCarne']
            );
                
            $tabla = 'ventaschazinados';

            $item = 'idCarneada';

            $valor = $_POST['idCarneada'];
            
            $datosOriginales = ControladorChazinados::ctrMostrarChazinado($item,$valor);

            $tabla = 'stockchazinados';

            // // var_dump($datosStock);
            // var_dump($datosOriginales);

            foreach ($datosStock as $key => $value) {
                
                if($value != $datosOriginales[$key]){
                    
                    $diferencia = $datosOriginales[$key] - $value;

                    $operador = (esPositivo($diferencia)) ? '-' : '+';

                    $diferencia = (esPositivo($diferencia)) ? $diferencia : str_replace('-','',$diferencia);

                    $item = 'kg'.ucfirst($key);

                    $respuesta = ModeloStock::mdlActualizarStockChazinados($tabla,$item,$diferencia,$operador);
                    
                    // var_dump($respuesta);
                }
            
            }

                            
            // ACTUALIZAR CARNEADA

            $tabla = 'carneadas';

            $propio = (isset($_POST['editarPropioChazinado'])) ? 1 : 0;

            $datos = array(
            'idCarneada'=>$_POST['idCarneada'],
            'fecha'=>$_POST['editarFechaChazinado'],
            'propio'=>$propio,
            'kgVivo'=>$_POST['editarKgVivoChazinado'],
            'kgLimpio'=>$_POST['editarKgLimpioChazinado'],
            'chorizos'=>$_POST['editarKgChorizos'],
            'morcillas'=>$_POST['editarKgMorcillas'],
            'salames'=>$_POST['editarKgSalames'],
            'bondiolas'=>$_POST['editarKgBondiolas'],
            'jamon'=>$_POST['editarKgJamon'],
            'codeguines'=>$_POST['editarKgCodeguines'],
            'grasa'=>$_POST['editarKgGrasa'],
            'chicharron'=>$_POST['editarKgChicharron'],
            'carne'=>$_POST['editarKgCarne']);

            $respuesta = ModeloChazinados::mdlEditarCarneada($tabla,$datos);

            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La carneada ha sido editada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "chazinados";

                        }

                    });

                </script>';

            }else{
        
                echo '<script>

                swal({

                    icon: "error",
                    title: "Hubo un error al cargar. Notificar a Mauro",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "chazinados";

                    }

                });

                </script>';
            
            }
        
        }

    }

    static public function ctrEditarVentaChazinados(){

        if(isset($_POST['editarVentaChazinado'])){

            $tabla = 'ventaschazinados';

            $item = 'id';

            $valor = $_POST['idVentaChazinado'];
            
            $datosOriginales = ControladorChazinados::ctrMostrarChazinado($item,$valor);

            $productoOriginal = $datosOriginales['producto'];
            
            $kgOriginal = $datosOriginales['kg'];

            $datos = array(
            'idVenta'=>$_POST['idVentaChazinado'],
            'comprador'=>$_POST['compradorChazinadoEditar'],
            'producto'=>$_POST['productoEditar'],
            'kg'=>$_POST['kgEditar']);

            $productoNuevo = $datos['producto'];

            $kgNuevo = $datos['kg'];

            $actualizarStock = ControladorStock::ctrActualizarStockChazinados($productoOriginal,$kgOriginal,$productoNuevo,$kgNuevo);
        
            $respuesta = ModeloChazinados::mdlEditarVentaChazinados($tabla,$datos);
            
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La carneada ha sido editada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "ventasChazinado";

                        }

                    });

                </script>';

            }else{
        
                echo '<script>

                swal({

                    icon: "error",
                    title: "Hubo un error al cargar. Notificar a Mauro",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "ventasChazinado";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrEliminarVenta(){
        
        if(isset($_GET["idVentaChazinado"])){
            
            $producto = 'kg'.ucfirst($_GET['producto']);

            $kg = $_GET['kg'];

            $operador = '+';
            
            $respuesta = ControladorStock::ctrActualizarStockChazinadosSumarRestar($producto,$kg,$operador);

			$tabla ="ventaschazinados";
            
            $item = 'id';

            $valor = $_GET['idVentaChazinado'];
            
            $respuesta = ModeloVentas::mdlEliminarVenta($tabla, $item,$valor);

            if($respuesta == "ok"){
                
                echo'<script>

				new swal({
					  icon: "success",
					  title: "La Venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ventasChazinado";

								}
							})

				</script>';

			}else{

                echo'<script>

			    new swal({
					  icon: "error",
					  title: "La Venta no ha sido borrada correctamente.Informar a Mauro",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ventasChazinado";

								}
							})

				</script>';

            }		

		}
    }

    

}

?>