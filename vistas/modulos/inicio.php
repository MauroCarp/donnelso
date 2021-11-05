<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Establecimiento Don Nelso
      
      <small>STOCK</small>
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Tablero</li>
    
    </ol>

  </section>

  <section class="content">

  <?php
    
    include 'inicio/cajas-superiores.php';

  ?>
  
    <div class="row">
      
      <div v-for="(boton, index) in btnPrincipales" :key="index" class="col-lg-2 col-xs-6">

          <button v-if="boton.modal" class="btn btn-primary btn-lg btn-block" data-toggle="modal" :data-target="boton.href"><b>{{boton.titulo}}</b></button>
         
          <a v-else class="btn btn-primary btn-lg btn-block" :href="boton.href"><b>{{boton.titulo}}</b></a>


      </div>
 
    </div>


    <div class="row">

          <div class="col-lg-12" style="text-align:center;">
            <br>
            <img src="vistas/img/plantilla/logo-inicio.png" style="height:250px;">
          
          </div>

    </div>

  </section>
 
</div>

<?php

include 'modales/proveedor.modal.php';
include 'modales/destino.modal.php';
include 'modales/sanidadBuscar.modal.php';

?>