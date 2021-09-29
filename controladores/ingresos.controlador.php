<?php

class ControladorIngresos{

	/*=============================================
	NUEVA COMPRA
    =============================================*/

	static public function ctrNuevoIngreso(){

		if(isset($_POST["fechaCompra"])){

			if($_POST['precioTotalCompra'] != '' AND $_POST['precioTotalCompra'] != '' AND $_POST['fechaCompra'] != ''){
                
                // CARGAR NUEVO PROVEEDOR

                if($_POST["proveedorCompra"] == 'otroProvCompra'){

                    $proveedor = $_POST["nuevoProvCompra"];

                    $respuesta = ControladorProveedores::ctrNuevoProveedor($proveedor);

                    if($respesta != 'ok'){
                        echo '<script>

                        	    new swal({
        
                                    icon: "error",
                                    title: "¡El Proveedor no ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
        
                        	        })
                                .then(function(result){
        
                        		        if(result.value){
                                
                        			    window.location = "registroCompras";
        
                        		        }
                                    
                                });
                            
                            </script>';

                    }

                }else{

                    $proveedor = $_POST["proveedorCompra"];

                } 

                // CARGA DE DATOS

                $tabla = 'animales';

                $engorde = (isset($_POST['engordeCompra'])) ? 1 : 0;

                $datos = array("animal" => $_POST["animalCompra"],
                "fecha" => $_POST["fechaCompra"],
                "proveedorCompra" => $proveedor,
                "machos" => $_POST['machosCompra'],
                "hembras" => $_POST['hembrasCompra'],
                "cantidad" => $_POST['cantidadCompra'],
                "engorde" => $engorde,
                "precioTotal" => $_POST["precioTotalCompra"],
                "kgTotal" => $_POST["kgTotalCompra"]);

                $respuestas[] = ControladorIngresos::ctrRegistroCompras($datos);

                $ultimoId = ControladorIngresos::ctrObtenerUltimoId(); 

                $ultimoId = ($ultimoId) ? $ultimoId[0] : 1; 
                
                if($_POST['machosCompra'] != 0){
                    
                    $datos['sexo'] = 'M';

                    for ($i=0; $i < $_POST['machosCompra'] ; $i++) { 
                        
                        $datos['idAnimal'] = $ultimoId.$datos['animal'];

                        $ultimoId++;

                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

                        $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

                    }

                }

                if($_POST['hembrasCompra'] != 0){
                    
                    $datos['sexo'] = 'H';

                    for ($i=0; $i < $_POST['hembrasCompra'] ; $i++) { 
                                                
                        $datos['idAnimal'] = $ultimoId.$datos['animal'];

                        $ultimoId++;
                        
                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

                        $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

                    }

                }

                if($_POST['cantidadCompra'] != 0){
                    
                    for ($i=0; $i < $_POST['cantidadCompra'] ; $i++) {
                               
                        $datos['idAnimal'] = $ultimoId.$datos['animal'];

                        $ultimoId++;
                        
                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

                        $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

                    }

                }


                if(!in_array('error',$respuestas)){

                    	echo '<script>

                            new swal({

                                icon: "success",
                                title: "¡La Compra ha sido guardada correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "registrosCompras";

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
                        
                            window.location = "registrosCompras";

                        }

                    });
                

                </script>';

                };  


		    }else{

                echo '<script>

                            new swal({

                                icon: "error",
                                title: "¡Hay campos que no pueden ir vacío!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "registrosCompras";

                                }

                            });
                        

                        </script>';


            }

	    }

    }

    static public function ctrObtenerUltimoId(){

        $tabla = 'animales';

        return $respuesta = ModeloIngresos::mdlObtenerUltimoId($tabla);

    }

    static public function ctrNuevoExterno($datos){

        $tabla = 'externos';

        $cantidad = ($datos['animal'] == 'pollo') ? $datos['cantidad'] : ($datos['machos'] + $datos['hembras']);

        $pesoPromedio = $datos['kgTotal'] / $cantidad;

        $precioPromedio = $datos['precioTotal'] / $datos['kgTotal'];

        $datos['pesoPromedio'] = str_replace(',','',number_format($pesoPromedio,2));

        $datos['precioPromedio'] = str_replace(',','',number_format($precioPromedio,2));

        $datos['idCompra'] = $datos['fecha']."-".$datos['animal']."-".$cantidad;

        return $respuesta = ModeloIngresos::mdlNuevoExterno($tabla,$datos);

    }

    static public function ctrRegistroCompras($datos){

        $tabla = 'registroingresos';

        $datos['cantidad'] = ($datos['animal'] == 'pollo') ? $datos['cantidad'] : ($datos['machos'] + $datos['hembras']);

        $datos['idCompra'] = $datos['fecha']."-".$datos['animal']."-".$datos['cantidad'];

        return $respuesta = ModeloIngresos::mdlRegistroCompras($tabla,$datos);

    }

    static public function ctrMostrarCompras($item,$valor,$orden){

        $tabla = 'registroingresos';

        return $resultado = ModeloIngresos::mdlMostrarCompras($tabla,$item,$valor,$orden);

    }

    static public function ctrEliminarCompra(){

        if(isset($_GET["idCompra"])){
            
            $idCompra = $_GET['idCompra'];

            $tabla = 'registroingresos';
            
            $tabla2 = null;

            $item = 'idCompra';

            $respuesta = ModeloIngresos::mdlEliminarCompra($tabla,$tabla2,$item,$idCompra);
            
            $tabla = 'externos';

            $tabla2 = 'animales';

            $respuesta = ModeloIngresos::mdlEliminarCompra($tabla,$tabla2,$item,$idCompra);



            if($respuesta == 'ok'){

                echo '<script>

                            new swal({

                                icon: "success",
                                title: "¡La Compra ha eliminada!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "registrosCompras";

                                }

                            });

                        </script>';

            }else{

                echo '<script>

                            new swal({

                                icon: "error",
                                title: "¡La Compra no ha sido eliminada correctamente! Avisar a Mauro",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "registrosCompras";

                                }

                            });

                        </script>';

            }

        }    
    }

    static public function ctrBuscarMadre($valor,$valor2){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        $item = 'idAnimal';

        $item2 = 'tipo';

        $item3 = 'caravana';

        $resultado = ModeloIngresos::mdlBuscarMadre($tabla,$tabla2,$item,$item2,$item3,$valor,$valor2);
    
        return $resultado[0]; 

    }
}   

?>