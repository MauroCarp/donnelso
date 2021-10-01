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

    /*=============================================
	OBTENER ULTIMO ID
    =============================================*/

    static public function ctrObtenerUltimoId(){

        $tabla = 'animales';

        return $respuesta = ModeloIngresos::mdlObtenerUltimoId($tabla);

    }

    /*=============================================
	NUEVO INGRESO EXTERNO
    =============================================*/
    
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
    
    /*=============================================
    CARGAR REGISTRO COMPRA
    =============================================*/
    
    static public function ctrRegistroCompras($datos){

        $tabla = 'registroingresos';

        $datos['cantidad'] = ($datos['animal'] == 'pollo') ? $datos['cantidad'] : ($datos['machos'] + $datos['hembras']);

        $datos['idCompra'] = $datos['fecha']."-".$datos['animal']."-".$datos['cantidad'];

        return $respuesta = ModeloIngresos::mdlRegistroCompras($tabla,$datos);

    }

    /*=============================================
    MOSTRAR COMPRAS
    =============================================*/
    
    static public function ctrMostrarCompras($item,$valor,$orden){

        $tabla = 'registroingresos';

        return $resultado = ModeloIngresos::mdlMostrarCompras($tabla,$item,$valor,$orden);

    }

    /*=============================================
	ELIMINAR COMPRA
    =============================================*/

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

    /*=============================================
	BUSCAR MADRES
    =============================================*/
    
    static public function ctrBuscarMadrePadre($valor,$item2,$valor2){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        $item = 'tipo';

        $resultado = ModeloIngresos::mdlBuscarMadrePadre($tabla,$tabla2,$item,$valor,$item2,$valor2);

        return $resultado; 

    }

    	/*=============================================
	NUEVA PARTO
    =============================================*/

	static public function ctrNuevoParto(){

		if(isset($_POST["btnCargarParto"])){

                $tabla = 'animales';

                $mellizos = (isset($_POST['mellizos'])) ? $_POST['mellizos'] : 0; 

                $datosParto = array("animal" => $_POST["animal"],
                "fechaParto" => $_POST["fechaParto"],
                "caravanaMadre" => $_POST["caravanaParto"],
                "cantidadNacidos" => $_POST['cantidadNacidos'],
                "sexo" => $_POST['sexo'],
                "mellizos" => $mellizos,
                "complicacionMadre" => $_POST["complicacionMadre"]);

                $item2 = 'caravana';

                $valor2 = $_POST['caravanaParto'];

                $caravanaMacho = ControladorIngresos::ctrBuscarMadrePadre($datosParto['animal'],$item2,$valor2);

                $datosParto['caravanaMacho'] = $caravanaMacho[0][0];

                // SE CARGA REGISTRO DE PARTO
                $respuestas[] = ControladorIngresos::ctrNuevoRegParto($datosParto);

                // SE ACTUALIZA EL ESTADO DE LA HEMBRA

                $actualizarHembra = ControladorServicios::ctrServirHembra('tipo',$datosParto['animal'],'caravana',$datosParto['caravanaMadre'],'Descanso');

                $respuestas[] = $actualizarHembra;
                
                // SE CARGAN LOS NACIDOS

                for ($i=0; $i < $datosParto['cantidadNacidos'] ; $i++) { 
                    
                    $idAnimal = ($_POST['animal'].$_POST['caravanaNacido'.($i + 1)]);
                    
                    $datosNacido = array(
                        'tipo' => $_POST['animal'],
                        'idAnimal' => $idAnimal,
                        'peso' => $_POST['pesoNacido'.($i + 1)],
                        'fechaNacimiento' => $_POST['fechaParto'],
                        'sexo' => $_POST['sexoNacido'.($i + 1)],
                        'estado' => $_POST['estadoNacido'.($i + 1)],
                        'destino' => $_POST['destinoNacido'.($i + 1)],
                        'caravana' => $_POST['caravanaNacido'.($i + 1)],
                        'complicacion' => $_POST['complicacionNacido'.($i + 1)]);

                    $respuesta = ControladorAnimales::ctrNuevoAnimal($datosNacido);
                    
                }

        }}
    //             $ultimoId = ControladorIngresos::ctrObtenerUltimoId(); 

    //             $ultimoId = ($ultimoId) ? $ultimoId[0] : 1; 
                
    //             if($_POST['machosCompra'] != 0){
                    
    //                 $datos['sexo'] = 'M';

    //                 for ($i=0; $i < $_POST['machosCompra'] ; $i++) { 
                        
    //                     $datos['idAnimal'] = $ultimoId.$datos['animal'];

    //                     $ultimoId++;

    //                     $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

    //                     $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

    //                 }

    //             }

    //             if($_POST['hembrasCompra'] != 0){
                    
    //                 $datos['sexo'] = 'H';

    //                 for ($i=0; $i < $_POST['hembrasCompra'] ; $i++) { 
                                                
    //                     $datos['idAnimal'] = $ultimoId.$datos['animal'];

    //                     $ultimoId++;
                        
    //                     $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

    //                     $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

    //                 }

    //             }

    //             if($_POST['cantidadCompra'] != 0){
                    
    //                 for ($i=0; $i < $_POST['cantidadCompra'] ; $i++) {
                               
    //                     $datos['idAnimal'] = $ultimoId.$datos['animal'];

    //                     $ultimoId++;
                        
    //                     $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

    //                     $respuestas[] = ControladorIngresos::ctrNuevoExterno($datos);

    //                 }

    //             }


    //             if(!in_array('error',$respuestas)){

    //                 	echo '<script>

    //                         new swal({

    //                             icon: "success",
    //                             title: "¡La Compra ha sido guardada correctamente!",
    //                             showConfirmButton: true,
    //                             confirmButtonText: "Cerrar"

    //                         }).then(function(result){

    //                             if(result.value){
                                
    //                                 window.location = "registrosCompras";

    //                             }

    //                         });

    //                     </script>';

    //             }else{
                    
    //                 echo '<script>

    //                 new swal({

    //                     icon: "error",
    //                     title: "Hubo un error al cargar. Notificar a Mauro",
    //                     showConfirmButton: true,
    //                     confirmButtonText: "Cerrar"

    //                 }).then(function(result){

    //                     if(result.value){
                        
    //                         window.location = "registrosCompras";

    //                     }

    //                 });
                

    //             </script>';

    //             };  


	// 	    }else{

    //             echo '<script>

    //                         new swal({

    //                             icon: "error",
    //                             title: "¡Hay campos que no pueden ir vacío!",
    //                             showConfirmButton: true,
    //                             confirmButtonText: "Cerrar"

    //                         }).then(function(result){

    //                             if(result.value){
                                
    //                                 window.location = "registrosCompras";

    //                             }

    //                         });
                        

    //                     </script>';


    //         }

	//     }

    // }

    static public function ctrNuevoRegParto($datos){
    
        $tabla = 'partos';

        return $respuesta = ModeloIngresos::mdlNuevoRegParto($tabla,$datos);

    }

    static public function ctrUltimaCaravanaHija($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        return $resultado = ModeloIngresos::mdlUltimaCaravanaHija($tabla,$tabla2,$item,$valor,$item2,$valor2);

    }

}   

?>