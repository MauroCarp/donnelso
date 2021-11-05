<div class="content-wrapper">

    <section class="content-header">

        <h1>Servicios</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Servicios</li>

        </ol>

        <br>

        <div class="row">

            <div class="col-md-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-servicios" role="tablist">
                <li role="presentation" class="active"><a href="#cerdoServicio"  id="tabCerdoServicio" aria-controls="cerdoServicio" role="tab" data-toggle="tab">Cerdo</a></li>
                <li role="presentation"><a href="#corderoServicio"  id="tabCorderoServicio" aria-controls="corderoServicio" role="tab" data-toggle="tab">Ovinos</a></li>
                <li role="presentation"><a href="#chivoServicio"  id="tabChivoServicio" aria-controls="chivoServicio" role="tab" data-toggle="tab">Chivo</a></li>
                <li role="presentation"><a href="#vacaServicio"  id="tabVacaServicio" aria-controls="vacaServicio" role="tab" data-toggle="tab">Vacas</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                    <div role="tabpanel" class="tab-pane active" id="cerdoServicio"></div>
                    <div role="tabpanel" class="tab-pane" id="corderoServicio"></div>
                    <div role="tabpanel" class="tab-pane" id="chivoServicio"></div>
                    <div role="tabpanel" class="tab-pane" id="vacaServicio"></div>
            
            </div>

            </div> 

        </div> 

    </section>


</div> 

<?php

$eliminarRodeo = new ControladorServicios;

$eliminarRodeo -> ctrDesctivarRodeo();

?>
