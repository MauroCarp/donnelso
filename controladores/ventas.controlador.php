<?php

class ControladorVentas{

    static public function ctrNuevaVenta(){

        if(isset($_POST['cargarVenta'])){

            $tabla = 'ventas';
            
            $fecha = date('Y-m-d');

            $datos = array('comprador'=>$_POST['comprador'],
            'vendedor'=>$_SESSION['nombre'],
            'animal'=>$_POST['animal'],
            'seccion'=>$_POST['seccion'],
            'cantidad'=>$_POST['cantidad'],
            'fecha'=>$fecha,
            'preventa'=>1
            );

            $respuesta = ModeloVentas::mdlNuevaVenta($tabla,$datos);
            
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La Pre-Venta ha sido guardada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "pre-ventas";

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
                    
                        window.location = "pre-ventas";

                    }

                });

                </script>';
            
            }
        }
    }
  
    static public function ctrActualizarVenta(){

        if(isset($_POST['actualizarVenta'])){

            $tabla = 'ventas';
        
            $datos = array('id'=>$_POST['idVenta'],
            'fecha'=>$_POST['fechaVenta'],
            'preventa'=>0,
            'kgFinal'=>$_POST['kgFinal'],
            'precioFinal'=>$_POST['precioTotalVenta'],
            'porcentajeEmpleado'=>$_POST['porcentajeEmpleado']
            );

            $respuesta = ModeloVentas::mdlActualizarVenta($tabla,$datos);
            
            // ELIMINAR ANIMAL FAENADO
            
            if($_POST['animalFaenar'] != 'pollo'){
            
                $item = 'tipo'; 

                $valor = $_POST['animalFaenar'];
                
                $item2 = 'caravana';

                $valor2 = $_POST['caravanaFaenar'];

                $respuesta = ControladorAnimales::ctrEliminarAnimal($item,$valor,$item2,$valor2);
            }

            // ELIMNAR POLLOS

            // ACTUALIZAR STOCK
            $cantidad = 0;

            switch ($_POST['seccionFaenar']) {
                case 'entero':
                        $cantidad = 1;
                    break;
                
                case 'medio':
                        $cantidad = 0.5;
                    break;
                
                case 'cuartoDel':
                        $cantidad = 0.25;
                    break;
                
                case 'cuartoTra':
                        $cantidad = 0.25;
                    break;
                
                default:
                    # code...
                    break;
            }

            $item = 'animal';

            $valor = $_POST['animalFaenar'];
            
            $operador = '-';

            $respuesta = ControladorStock::ctrActualizarStock($item,$valor,$operador,$cantidad);

            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La Pre-Venta ha sido guardada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "ventas";

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
                    
                        window.location = "pre-ventas";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrMostrarVentas($item,$valor){

        $tabla = ($item == 'chazinados') ? 'ventaschazinados' : 'ventas';

        return $respuesta = ModeloVentas::mdlMostrarVentas($tabla,$item,$valor);

    }

    static public function ctrEliminarVenta(){
        
        if(isset($_GET["idVenta"])){

			$tabla ="ventas";

            $item = 'id';

            $valor = $_GET['idVenta'];

            $respuesta = ModeloVentas::mdlEliminarVenta($tabla, $item,$valor);

            if($respuesta == "ok"){
                
                echo'<script>

				new swal({
					  icon: "success",
					  title: "La Pre-Venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "pre-ventas";

								}
							})

				</script>';

			}else{

                echo'<script>

			    new swal({
					  icon: "error",
					  title: "La Pre-Venta no ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "pre-ventas";

								}
							})

				</script>';

            }		

		}
    }

    
    static public function ctrNuevaVentaChazinado(){

        if(isset($_POST['cargarVentaChazinado'])){

            $tabla = 'ventaschazinados';
            
            $fecha = date('Y-m-d');

            $datos = array('comprador'=>$_POST['compradorChazinado'],
            'vendedor'=>$_SESSION['nombre'],
            'fecha'=>$fecha);
            
            $productos = $_POST['productos'];
            $kilos = $_POST['kg'];

            for ($i=0; $i < sizeof($productos); $i++) { 

                $datos['producto'] = $productos[$i];

                $datos['kg'] = $kilos[$i];

                $respuesta = ModeloVentas::mdlNuevaVentaChazinado($tabla,$datos);
                
                $operador = '-';

                $item = 'kg'.ucfirst($productos[$i]);

                $respuesta = ControladorStock::ctrActualizarStockChazinadosSumarRestar($item,$kilos[$i],$operador);

                // var_dump($respuesta);
            }


            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La Venta ha sido registrada correctamente!",
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

    static public function ctrCambiarEstado($item,$valor,$item2,$valor2){
        
        $tabla = 'ventaschazinados';

        return $respuesta = ModeloVentas::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);

    }


}   

?>