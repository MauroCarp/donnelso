<?php

class ControladorPrecios{

    static public function ctrActualizarPrecios(){

        if(isset($_POST['actualizarPrecios'])){

            $tabla = 'precios';
        
            $datos = array(
            'id'=>$_POST['idPrecio'],
            'precioCerdo'=>$_POST['precioCerdo'],
            'precioCordero'=>$_POST['precioCordero'],
            'precioChivo'=>$_POST['precioChivo'],
            'precioPollo'=>$_POST['precioPollo'],
            'precioVaca'=>$_POST['precioVaca'],
            'precioChorizo'=>$_POST['precioChorizo'],
            'precioMorcilla'=>$_POST['precioMorcilla'],
            'precioSalames'=>$_POST['precioSalames'],
            'precioBondiola'=>$_POST['precioBondiola'],
            'precioJamon'=>$_POST['precioJamon'],
            'precioGrasa'=>$_POST['precioGrasa'],
            'precioCodeguines'=>$_POST['precioCodeguines'],
            'precioChicharron'=>$_POST['precioChicharron'],
            'precioCarne'=>$_POST['precioCarne'],
            'comisionEmpleado'=>$_POST['comisionEmpleado']
            );

            $respuesta = ModeloPrecios::mdlActualizarPrecios($tabla,$datos);
            
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "Los precios han sido actualizados!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "inicio";

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
                    
                            window.location = "inicio";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrMostrarPrecios($item){

        $tabla = 'precios';

        return $respuesta = ModeloPrecios::mdlMostrarPrecios($tabla,$item);

    }

}   

?>