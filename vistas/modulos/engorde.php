<?php

  
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>Engorde</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Engorde</li>

        </ol>

        <br>

        <div class="row">

            <div class="col-md-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs tabs-engorde" role="tablist">
                <li role="engorde" class="active"><a href="#cerdo" aria-controls="cerdo" role="tab" data-toggle="tab">Cerdo</a></li>
                <li role="engorde"><a href="#cordero" aria-controls="cordero" role="tab" data-toggle="tab">Cordero</a></li>
                <li role="engorde"><a href="#chivo" aria-controls="chivo" role="tab" data-toggle="tab">Chivo</a></li>
                <li role="engorde"><a href="#oveja" aria-controls="oveja" role="tab" data-toggle="tab">Ovejas</a></li>
                <li role="engorde"><a href="#vaca" aria-controls="vaca" role="tab" data-toggle="tab">Vacas</a></li>
                <li role="engorde"><a href="#pollo" aria-controls="pollo" role="tab" data-toggle="tab">Pollos</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">

                    <div role="tabpane3" class="tab-pane active" id="cerdo"><?php $valor = 'cerdo'; include "tablas/engorde.tabla.php";?></div>
                    <div role="tabpane3" class="tab-pane" id="cordero"><?php  $valor = 'cordero'; include "tablas/engorde.tabla.php";?></div>
                    <div role="tabpane3" class="tab-pane" id="chivo"><?php $valor = 'chivo'; include "tablas/engorde.tabla.php";?></div>
                    <div role="tabpane3" class="tab-pane" id="oveja"><?php $valor = 'ovino'; include "tablas/engorde.tabla.php";?></div>
                    <div role="tabpane3" class="tab-pane" id="vaca"><?php $valor = 'vaca'; include "tablas/engorde.tabla.php";?></div>
                    <div role="tabpane3" class="tab-pane" id="pollo"><?php $valor = 'pollo'; include "tablas/engorde.tabla.php";?></div>

            </div>

            </div> 

        </div> 

    </section>


</div> 
