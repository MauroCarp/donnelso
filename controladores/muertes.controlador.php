<?php

class ControladorMuertes{

    
    static public function ctrNuevaMuerte(){

        if(isset($_POST['btnIngresarMuerte'])){

            $tabla = 'muertes';
            
            $motivo = ($_POST['motivoMuerte'] == 'Otro') ? $_POST['otroMotivoMuerte'] : $_POST['motivoMuerte'];

            $datos = array(
            'animal'=>$_POST['animalMuerte'],
            'fechaMuerte'=>$_POST['fechaMuerte'],
            'caravanaMuerte'=>$_POST['caravanaMuerte'],
            'motivo'=>$motivo
            );

            $respuesta = ModeloMuertes::mdlNuevaMuerte($tabla,$datos);

            // ELIMINAR ANIMAL
            
            $item = 'tipo';
            
            $valor = $datos['animal'];
            
            $item2 = 'caravana';
            
            $valor2 = $datos['caravanaMuerte'];

            $respuesta = ControladorAnimales::ctrEliminarAnimal($item,$valor,$item2,$valor2);

            if($respuesta == 'ok'){
                    
                echo '<script>

                   new swal({

                        icon: "success",
                        title: "El registro ha sido guardado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "muertes";

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
                    
                        window.location = "muertes";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrActualizarMuerte(){

        if(isset($_POST['btnEditarMuerte'])){

            $tabla = 'muertes';
            
            $motivo = ($_POST['editarMotivoMuerte'] == 'Otro') ? $_POST['editarOtroMotivo'] : $_POST['editarMotivoMuerte'];

            $datos = array(
            'fecha'=>$_POST['editarFechaMuerte'],
            'motivo'=>$motivo,
            'id'=>$_POST['editarIdMuerte']
            );

            $respuesta = ModeloMuertes::mdlActualizarMuerte($tabla,$datos);
            
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "El registro ha sido actualizado correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "muertes";

                        }

                    });

                </script>';

            }else{
        
                echo '<script>

                new swal({

                    icon: "error",
                    title: "Hubo un error al modificar. Notificar a Mauro",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"

                }).then(function(result){

                    if(result.value){
                    
                        window.location = "muertes";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrMostrarMuerte($item,$valor){

        $tabla = 'muertes';

        return $respuesta = ModeloMuertes::mdlMostrarMuerte($tabla,$item,$valor);

    }

    static public function ctrEliminarMuerte(){
        
        if(isset($_GET["idMuerte"])){

			$tabla ="muertes";

            $item = 'id';

            $valor = $_GET['idMuerte'];

            $respuesta = ModeloMuertes::mdlEliminarMuerte($tabla, $item,$valor);

            if($respuesta == "ok"){

				echo'<script>

				new swal({
					  icon: "success",
					  title: "El registro  ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "muertes";

								}
							})

				</script>';

			}		

		}
    }
}   

?>