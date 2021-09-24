<?php

  
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>Sanidad</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Sanidad</li>

        </ol>

        <br>

        <div class="row">

            <div class="col-md-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-sanidad" role="tablist">
                <li role="presentation" class="active"><a href="#cerdo"  id="tabCerdo" aria-controls="cerdo" role="tab" data-toggle="tab">Cerdo</a></li>
                <li role="presentation"><a href="#cordero"  id="tabCordero" aria-controls="cordero" role="tab" data-toggle="tab">Cordero</a></li>
                <li role="presentation"><a href="#chivo"  id="tabChivo" aria-controls="chivo" role="tab" data-toggle="tab">Chivo</a></li>
                <li role="presentation"><a href="#oveja"  id="tabOveja" aria-controls="oveja" role="tab" data-toggle="tab">Ovejas</a></li>
                <li role="presentation"><a href="#vaca"  id="tabVaca" aria-controls="vaca" role="tab" data-toggle="tab">Vacas</a></li>
                <li role="presentation"><a href="#pollo"  id="tabPollo" aria-controls="pollo" role="tab" data-toggle="tab">Pollos</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="cerdo"><?php $item = 'animal'; $animal = 'cerdo'; include "tablas/sanidad.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="cordero"><?php $animal = 'cordero'; include "tablas/sanidad.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="chivo"><?php $animal = 'chivo'; include "tablas/sanidad.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="oveja"><?php $animal = 'oveja'; include "tablas/sanidad.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="vaca"><?php $animal = 'vaca'; include "tablas/sanidad.tabla.php";?></div>
                    <div role="tabpanel" class="tab-pane" id="pollo"><?php $animal = 'pollo'; include "tablas/sanidad.tabla.php";?></div>

            </div>

            </div> 

        </div> 

    </section>


</div> 

<?php

$eliminarRegistroSanidad = new ControladorSanidad;

$eliminarRegistroSanidad -> ctrEliminarSanidad();

$editarRegistroSanidad = new ControladorSanidad;

$editarRegistroSanidad -> ctrActualizarSanidad();

include "modales/sanidad.modal.php";

include "modales/sanidadEditar.modal.php";

?>
