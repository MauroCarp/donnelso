<?php

class ControladorChazinados{

    
    static public function ctrNuevaCarneada(){

        if(isset($_POST['btnIngresarChazinado'])){

            $tabla = 'carneadas';

            $caravanas = implode('-',$_POST['caravanaChazinado']);

            $propio = (isset($_POST['propioChazinado'])) ? 1 : 0;

            $datos = array(
                'fecha'=>$_POST['fechaChazinado'],
                'propio'=>$propio,
                'caravanas'=>$caravanas,
                'kgVivo'=>$_POST['kgVivoChazinado'],
                'kgLimpio'=>$_POST['kgLimpioChazinado'],
                'kgChorizos'=>$_POST['kgChorizos'],
                'kgMorcillas'=>$_POST['kgMorcillas'],
                'kgSalames'=>$_POST['kgSalames'],
                'kgBondiolas'=>$_POST['kgBondiolas'],
                'kgJamon'=>$_POST['kgJamon'],
                'kgGrasa'=>$_POST['kgGrasa'],
                'kgCodeguin'=>$_POST['kgCodeguin'],
                'kgChicharron'=>$_POST['kgChicharron'],
                'kgCarne'=>$_POST['kgCarne']
            );

            $respuesta = ModeloChazinados::mdlNuevaCarneada($tabla,$datos);

            var_dump($respuesta);

        }
        
    }

    static public function ctrMostrarCarneada($item,$valor){

        $tabla = 'carneadas';

        return $respuesta = ModeloChazinados::mdlMostrarCarneada($tabla,$item,$valor);
         
    }

      
    static public function ctrEditarCarneada(){

        if(isset($_POST['btnEditarChazinado'])){

            $tabla = 'carneadas';

            $propio = (isset($_POST['editarPropioChazinado'])) ? 1 : 0;

            $datos = array(
            'idCarneada'=>$_POST['idCarneada'],
            'fecha'=>$_POST['editarFechaChazinado'],
            'propio'=>$propio,
            'kgVivo'=>$_POST['editarKgVivoChazinado'],
            'kgLimpio'=>$_POST['editarKgLimpioChazinado'],
            'chorizos'=>$_POST['editarKgChorizos'],
            'morcillas'=>$_POST['editarKgMorcillas'],
            'salames'=>$_POST['editarKgSalames'],
            'bondiolas'=>$_POST['editarKgBondiolas'],
            'jamon'=>$_POST['editarKgJamon'],
            'codeguines'=>$_POST['editarKgCodeguines'],
            'grasa'=>$_POST['editarKgGrasa'],
            'chicharron'=>$_POST['editarKgChicharron'],
            'carne'=>$_POST['editarKgCarne']);

            $respuesta = ModeloChazinados::mdlEditarCarneada($tabla,$datos);
            
//             var_dump($respuesta);
// die();
            if($respuesta == 'ok'){
                    
                echo '<script>

                    new swal({

                        icon: "success",
                        title: "La carneada ha sido editada correctamente!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"

                    }).then(function(result){

                        if(result.value){
                        
                            window.location = "chazinados";

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
                    
                        window.location = "chazinados";

                    }

                });

                </script>';
            
            }
        }
    }

    static public function ctrEliminarVenta(){
        
        if(isset($_GET["idVentaChazinado"])){

			$tabla ="ventaschazinados";

            $item = 'id';

            $valor = $_GET['idVentaChazinado'];

            $respuesta = ModeloVentas::mdlEliminarVenta($tabla, $item,$valor);

            if($respuesta == "ok"){
                
                echo'<script>

				new swal({
					  icon: "success",
					  title: "La Venta ha sido borrada correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ventasChazinado";

								}
							})

				</script>';

			}else{

                echo'<script>

			    new swal({
					  icon: "error",
					  title: "La Venta no ha sido borrada correctamente.Informar a Mauro",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "ventasChazinado";

								}
							})

				</script>';

            }		

		}
    }


    // static public function ctrCambiarEstado($item,$valor,$item2,$valor2){

    //     $tabla = 'animales';

    //     return $respuesta = ModeloAnimales::mdlCambiarEstado($tabla,$item,$valor,$item2,$valor2);
         
    // }

    // static public function ctrCaravanaValida($item,$valor,$item2,$valor2){
        
    //     $tabla = 'animales';

    //     return $respuesta = ModeloAnimales::mdlCaravanaValida($tabla,$item,$valor,$item2,$valor2);

    // }
}

?>