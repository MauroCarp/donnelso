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

            $respuesta = ModeloServicios::mdlNuevoRodeo($tabla,$datos);

            if($respuesta == 'ok'){
                    
                echo '<script>

                    swal({

                        type: "success",
                        title: "El registro ha sido guardada correctamente!",
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

                    type: "error",
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

                    swal({

                        type: "success",
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

                    type: "error",
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

    static public function ctrEliminarRodeo(){
        
        if(isset($_GET["idSanidad"])){

			$tabla ="sanidad";

            $item = 'idSanidad';

            $valor = $_GET['idSanidad'];

            $respuesta = ModeloSanidad::mdlEliminarSanidad($tabla, $item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El registro  ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "sanidad";

								}
							})

				</script>';

			}		

		}
    }
}   

?>