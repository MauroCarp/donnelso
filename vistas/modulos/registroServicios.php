<?php

  
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>Registro Servicios</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Registro Servicios</li>

        </ol>

        <br>

        <div class="row">

            <div class="col-md-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-sanidad" role="tablist">
                <li role="presentation" class="active"><a href="#cerdo"  id="tabCerdo" aria-controls="cerdo" role="tab" data-toggle="tab">Cerdo</a></li>
                <li role="presentation"><a href="#cordero"  id="tabCordero" aria-controls="cordero" role="tab" data-toggle="tab">Ovinos</a></li>
                <li role="presentation"><a href="#chivo"  id="tabChivo" aria-controls="chivo" role="tab" data-toggle="tab">Chivo</a></li>
                <li role="presentation"><a href="#vaca"  id="tabVaca" aria-controls="vaca" role="tab" data-toggle="tab">Vacas</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="cerdo"><?php 
                    
                    $item = 'tipo'; 
                    $animal = 'cerdo';
                    $item2 = 'estado';
                    $valor2 = '0';
                    include "tablas/registroServicios.tabla.php";
                    
                    ?></div>
                    
                    <div role="tabpanel" class="tab-pane" id="cordero"><?php $animal = 'ovino'; include "tablas/registroServicios.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="chivo"><?php $animal = 'chivo'; include "tablas/registroServicios.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="vaca"><?php $animal = 'vaca'; include "tablas/registroServicios.tabla.php";?></div>

            </div>

            </div> 

        </div> 

    </section>


</div> 

  
<!-- // // ELIMINAR REGISTRO RODEO

// $('.tablaRegistrosServicios').on('click','.btnEliminarRegistroRodeo', function(){

//     let idRodeo = $(this)[0].attributes[1].nodeValue;

//     new swal({
//         title: '¿Está seguro de borrar el registro?',
//         text: "¡Si no lo está puede cancelar la accíón!",
//         icon: 'warning',
//         showCancelButton: true,
//         confirmButtonColor: '#3085d6',
//           cancelButtonColor: '#d33',
//           cancelButtonText: 'Cancelar',
//           confirmButtonText: 'Si, borrar registro!'
//       }).then(function(result){
    
//         if(result.value){
    
//           window.location = `index.php?ruta=registroServicios&idRodeo=${idRodeo}`
          
//         }
    
//       })
    
    
// }); -->


<?php

$eliminarRegistroServicio = new ControladorServicios();

$eliminarRegistroServicio -> ctrEliminarRegistroRodeo();

?>
