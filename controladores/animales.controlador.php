<?php

class ControladorAnimales{

    
    static public function ctrNuevoAnimal(){

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

                   new  swal({

                        type: "success",
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
    }
    
}   

?>