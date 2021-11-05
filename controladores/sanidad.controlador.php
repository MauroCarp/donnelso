<?php

class ControladorSanidad{

    
    static public function ctrNuevoRegistro(){

        if(isset($_POST['btnSanidad'])){

            $tabla = 'sanidad';
            
            $caravana = ($_POST['caravanaSanidad'] == '') ? null : $_POST['caravanaSanidad'];

            $datos = array(
            'animal'=>$_POST['animalSanidad'],
            'fecha'=>$_POST['fechaSanidad'],
            'motivo'=>$_POST['motivoSanidad'],
            'aplicacion'=>$_POST['aplicacionSanidad'],
            'caravana'=>$caravana,
            'comentarios'=>$_POST['comentariosSanidad'],
            'costoVeterinario'=>$_POST['costoVeterinario']
            );

            $respuesta = ModeloSanidad::mdlNuevoRegistro($tabla,$datos);

            if($respuesta == 'ok'){
                    
                echo '<script>

                   new swal({

                        icon: "success",
                        title: "El registro ha sido guardada correctamente!",
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

                new swal({

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
    }

    static public function ctrActualizarSanidad(){

        if(isset($_POST['btnSanidadEditar'])){

            $tabla = 'sanidad';
            
            $caravana = ($_POST['caravanaSanidadEditar'] == '') ? null : $_POST['caravanaSanidadEditar'];

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

                new swal({

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
    }

    static public function ctrMostrarSanidad($item,$valor,$item2,$valor2){

        $tabla = 'sanidad';

        return $respuesta = ModeloSanidad::mdlMostrarSanidad($tabla,$item,$valor,$item2,$valor2);

    }

    static public function ctrEliminarSanidad(){
        
        if(isset($_GET["idSanidad"])){

			$tabla ="sanidad";

            $item = 'idSanidad';

            $valor = $_GET['idSanidad'];

            $respuesta = ModeloSanidad::mdlEliminarSanidad($tabla, $item,$valor);

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

								window.location = "sanidad";

								}
							})

				</script>';

			}		

		}
    }
}   

?>