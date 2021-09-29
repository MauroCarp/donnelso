<?php

class ControladorServicios{

    
    static public function ctrNuevoRodeo(){

        if(isset($_POST['btnCargarRodeo'])){

            $tabla = 'rodeos';

            $caravanasHembras = implode('-',$_POST['caravanaHembras']);

            $datos = array(
            'tipo'=>$_POST['animalServicio'],
            'fecha'=>$_POST['fechaServicio'],
            'numeroRodeo'=>$_POST['rodeoNumero'],
            'caravanaMacho'=>$_POST['caravanaMachoRodeo'],
            'caravanaHembras'=>$caravanasHembras);

            // CARGAR RODEO
            $respuesta = ModeloServicios::mdlNuevoRodeo($tabla,$datos);

            // MODIFICAR MACHO
            // $tabla2 = 'machos';
            
            // $item = 'idRodeo';

            // $valor = ControladorServicios::ctrMostarRodeo();
            // $respuesta = ControladorAnimales::ctrActualizarAnimal($tabla2);

            if($respuesta == 'ok'){
                    
                echo '<script>

                  new  swal({

                        icon: "success",
                        title: "El registro ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "servicios";

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
                    
                        window.location = "servicios";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrActualizarRodeo($item,$valor,$item2,$valor2){

            $tabla = 'rodeos';

            $datos = array(
            'animal'=>$_POST['animalSanidadEditar'],
            'fecha'=>$_POST['fechaSanidadEditar'],
            'motivo'=>$_POST['motivoSanidadEditar'],
            'aplicacion'=>$_POST['aplicacionSanidadEditar'],
            'caravana'=>$caravana,
            'comentarios'=>$_POST['comentariosSanidadEditar'],
            'costoVeterinario'=>$_POST['costoVeterinarioEditar'],
            'id'=>$_POST['idSanidadEditar']
            );

            $respuesta = ModeloSanidad::mdlActualizarSanidad($tabla,$datos);
            
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "El registro ha sido actualizado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "sanidad";

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
                    
                        window.location = "sanidad";

                    }

                });

                </script>';
            
            }
        
    }

    static public function ctrMostrarRodeo($item,$valor,$item2,$valor2){

        $tabla = 'rodeos';

        return $respuesta = ModeloServicios::mdlMostrarRodeo($tabla,$item,$valor,$item2,$valor2);

    }

    static public function ctrDesctivarRodeo(){
        
        if(isset($_GET["numRodeo"]) AND isset($_GET['tipo'])){

			$tabla = "rodeos";
            
            $item = 'numeroRodeo';

            $valor = $_GET['numRodeo'];
            
            $item2 = 'tipo';

            $valor2 = $_GET['tipo'];

            $estadoRodeo = 0;

            $respuesta = ModeloServicios::mdlDesctivarRodeo($tabla, $item,$valor,$item2,$valor2,$estadoRodeo);
            
            if($respuesta == "ok"){

                echo'<script>

				new swal({
					  icon: "success",
					  title: "El registro  ha sido desactivado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "servicios";

								}
							})

				</script>';

			}		

		}
    }

    static public function ctrServirHembra($item,$valor,$item2,$valor2,$estadoRodeo){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        $respuesta = ModeloServicios::mdlServirHembra($tabla,$tabla2,$item,$valor,$item2,$valor2,$estadoRodeo);

        return $respuesta;

    }

    static public function ctrServicioValido($item,$valor,$item2,$valor2,$estadoRodeo){

        $tabla = 'animales';

        $tabla2 = 'hembras';

        $respuesta = ModeloServicios::mdlServicioValido($tabla,$tabla2,$item,$valor,$item2,$valor2,$estadoRodeo);

        return $respuesta;

    }

    static public function ctrMostrarReproductor($tabla2,$datos){

        $tabla = 'animales';

        return $respuesta = ModeloServicios::mdlMostrarReproductor($tabla,$tabla2,$datos);

    }

}   


?>