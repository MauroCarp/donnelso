<?php

class ControladorIngresos{

	/*=============================================
	NUEVA COMPRA
    =============================================*/

	static public function ctrNuevoIngreso(){
        
        if(isset($_POST["btnIngresarCompra"])){

			if($_POST['precioTotalCompra'] != '' AND $_POST['precioTotalCompra'] != '' AND $_POST['fechaCompra'] != ''){
                
                // CARGAR NUEVO PROVEEDOR

                if($_POST["proveedorCompra"] == 'otroProvCompra'){

                    $proveedor = $_POST["nuevoProvCompra"];

                    $respuesta = ControladorProveedores::ctrNuevoProveedor($proveedor);

                    if($respuesta != 'ok'){
                        echo '<script>

                        	    new swal({
        
                                    icon: "error",
                                    title: "¡El Proveedor no ha sido guardado correctamente!",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
        
                        	        })
                            
                            </script>';

                    }

                }else{

                    $proveedor = $_POST["proveedorCompra"];

                } 

                // CARGA DE DATOS

                $tabla = 'animales';

                $engorde = (isset($_POST['engordeCompra'])) ? 'Engorde' : null;
                
                $totalAnimales = ($_POST['cantidadCompra'] != 0) ?  $_POST['cantidadCompra'] : ($_POST['machosCompra'] + $_POST['hembrasCompra']); 

                $peso = ($_POST['kgTotalCompra'] / $totalAnimales);

                $kgTotalCompra = ($_POST['kgTotalCompra'] == 0) ? 1  : $_POST['kgTotalCompra'];

                $precio = ($_POST['precioTotalCompra'] == 0) ? 0 : ($_POST['precioTotalCompra'] / $kgTotalCompra); 
                
                $listoVenta = ($engorde == null) ? 1 : 0; 

                $datos = array("tipo" => $_POST["animalCompra"],
                "fecha" => $_POST["fechaCompra"],
                "proveedor" => $proveedor,
                "machos" => $_POST['machosCompra'],
                "hembras" => $_POST['hembrasCompra'],
                "cantidad" => $_POST['cantidadCompra'],
                "totalAnimales" => $totalAnimales,
                "engorde" => $engorde,
                "precioTotal" => $_POST["precioTotalCompra"],
                "kgTotal" => $_POST["kgTotalCompra"],
                "peso" => $peso,
                "precio" => $precio,
                "listo" => $listoVenta);
                
                $datos['idCompra'] = $datos['fecha']."-".$datos['tipo']."-".$datos['cantidad'];

                $ultimoId = ControladorIngresos::ctrObtenerUltimoId(); 
                
                $ultimoId = ($ultimoId) ? $ultimoId[0] : 1; 

                $respuestas[] = ControladorIngresos::ctrRegistroCompras($datos);

                
                if($_POST['hembrasCompra'] != 0){
                    
                    $datos['sexo'] = 'H';

                    for ($i=0; $i < $_POST['hembrasCompra'] ; $i++) { 
                      
                        $tabla = 'animales';
  
                        $datos['idAnimal'] = $ultimoId.$datos['tipo'];

                        $datos['caravana'] = $datos['idAnimal']."/".$datos['proveedor']."/".formatearFecha($datos['fecha']);

                        $ultimoId++;
                        
                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);
                                     
                        $tabla = 'hembras';
                                
                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);

                    }

                }
                      
                if($_POST['machosCompra'] != 0){
                    
                    $datos['sexo'] = 'M';
                    
                    $datos['tipo'] = ($datos['tipo'] == 'ovino') ?  'cordero' : $datos['tipo'];

                    for ($i=0; $i < $_POST['machosCompra'] ; $i++) { 
                    
                            $tabla = 'animales';

                            $datos['idAnimal'] = $ultimoId.$datos['tipo'];
                            
                            $datos['caravana'] = $datos['idAnimal']."/".$datos['proveedor']."/".formatearFecha($datos['fecha']);

                            $ultimoId++;
                    
                            $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);
                            
                            $tabla = 'machos';
                            
                            $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla, $datos);
                                            
                    }
                    
                }

                if($_POST['cantidadCompra'] != 0){
                    
                    $tabla = 'animales';
                    
                    $datos['engorde'] = 'Engorde';
                    
                    $datos['listo'] = '0';

                    for ($i=0; $i < $_POST['cantidadCompra'] ; $i++) {
                               
                        $datos['idAnimal'] = $ultimoId.$datos['tipo'];

                        $datos['caravana'] = $datos['idAnimal']."/".$datos['proveedor']."/".formatearFecha($datos['fecha']);

                        $ultimoId++;
                        
                        $respuestas[] = ModeloIngresos::mdlNuevoIngreso($tabla,$datos);
                        
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
    CARGAR REGISTRO COMPRA
    =============================================*/
    
    static public function ctrRegistroCompras($datos){

        $tabla = 'registroingresos';

        return $respuesta = ModeloIngresos::mdlRegistroCompras($tabla,$datos);

    }

    /*=============================================
    MOSTRAR COMPRAS
    =============================================*/
    
    static public function ctrMostrarCompras($item,$valor){

        $tabla = 'registroingresos';

        return $resultado = ModeloIngresos::mdlMostrarCompras($tabla,$item,$valor);

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
    
    static public function ctrBuscarMadrePadre($valor,$item2,$valor2,$buscar){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        $item = 'tipo';

        return $resultado = ModeloIngresos::mdlBuscarMadrePadre($tabla,$tabla2,$item,$valor,$item2,$valor2,$buscar);
         

    }

    /*=============================================
	NUEVO PARTO
    =============================================*/

	static public function ctrNuevoParto(){

		if(isset($_POST["btnCargarParto"])){

                $tabla = 'animales';

                $mellizos = (isset($_POST['mellizos'])) ? $_POST['mellizos'] : 0; 

                $valor = ($_POST['animal'] == 'cordero') ? 'ovino' : $_POST['animal'];
                
                $datosParto = array("tipo" => $valor,
                "fechaParto" => $_POST["fechaParto"],
                "caravanaMadre" => $_POST["caravanaParto"],
                "cantidadNacidos" => $_POST['cantidadNacidos'],
                "sexo" => $_POST['sexo'],
                "mellizos" => $mellizos,
                "complicacionMadre" => $_POST["complicacionMadre"]);

                $item2 = 'caravana';

                $valor2 = $_POST['caravanaParto'];

                $buscar = 'caravanaMacho';

                $caravanaMacho = ControladorIngresos::ctrBuscarMadrePadre($valor,$item2,$valor2,$buscar);

                $datosParto['caravanaMacho'] = $caravanaMacho[0][0];

                // SE CARGA REGISTRO DE PARTO
                $respuestas[] = ControladorIngresos::ctrNuevoRegParto($datosParto);

                $idParto = ControladorIngresos::ctrMostrarUltimoRegParto();

                $idParto = $idParto['ultimoId'];

                // SE ACTUALIZA EL ESTADO DE LA HEMBRA
                $datosParto['estadoRodeo'] = 'Descanso';

                $actualizarHembra = ControladorServicios::ctrServirHembra('tipo','caravana',$datosParto);

                $respuestas[] = $actualizarHembra;

                // SE CARGAN LOS NACIDOS

                for ($i=0; $i < $datosParto['cantidadNacidos'] ; $i++) { 
                    
                    $tipo = ($_POST['animal'] == 'cordero' AND $_POST['sexoNacido'.($i +1)] == 'H') ? 'ovino' : $_POST['animal'];
                    
                    $idAnimal = ($tipo.$_POST['caravanaNacido'.($i + 1)]);
                    
                    $datosNacido = array(
                        'tipo' => $tipo,
                        'idAnimal' => $idAnimal,
                        'idParto'=> $idParto,
                        'peso' => $_POST['pesoNacido'.($i + 1)],
                        'fechaNacimiento' => $_POST['fechaParto'],
                        'sexo' => $_POST['sexoNacido'.($i + 1)],
                        'estado' => $_POST['estadoNacido'.($i + 1)],
                        'destino' => $_POST['destinoNacido'.($i + 1)],
                        'caravana' => $_POST['caravanaNacido'.($i + 1)],
                        'complicacion' => $_POST['complicacionNacido'.($i + 1)]);

                    $respuestas[] = ControladorAnimales::ctrNuevoAnimal($datosNacido);
                    
                }


                if(!in_array('error',$respuestas)){

                    	echo '<script>

                            new swal({

                                icon: "success",
                                title: "¡Los registros han sido guardados correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"

                            }).then(function(result){

                                if(result.value){
                                
                                    window.location = "registroPartos";

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
                        
                            window.location = "registroPartos";

                        }

                    });
                

                </script>';
                };  


		    

	    }

    }

    static public function ctrNuevoRegParto($datos){
    
        $tabla = 'partos';

        return $respuesta = ModeloIngresos::mdlNuevoRegParto($tabla,$datos);

    }

    static public function ctrMostrarUltimoRegParto(){

        $tabla = 'partos';

        return $respuesta = ModeloIngresos::mdlMostrarUltimoRegParto($tabla);

    }

    static public function ctrUltimaCaravanaHija($item,$valor,$item2,$valor2){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        return $resultado = ModeloIngresos::mdlUltimaCaravanaHija($tabla,$tabla2,$item,$valor,$item2,$valor2);

    }

    /*=============================================
    MOSTRAR PARTOS
    =============================================*/
    
    static public function ctrMostrarPartos($item,$valor,$item2,$valor2){

        $tabla = 'partos';

        return $resultado = ModeloIngresos::mdlMostrarPartos($tabla,$item,$valor,$item2,$valor2);

    }
}   

?>