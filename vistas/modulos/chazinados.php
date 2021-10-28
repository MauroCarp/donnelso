<div class="content-wrapper">

  <section class="content-header">
    
    <h1>Chazinados</h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Chazinados</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

        <!-- EMPIEZA LA TABLA -->

      <div class="box-body">

        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalChazinado">Cargar Carneada</button><br><br>

       <table class="table table-bordered table-striped dt-responsive tablaCarneadas tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Fecha</th>
           <th>N° Caravana</th>
           <th>Propio</th>
           <th>Kg Vivo</th>
           <th>Kg Limpio</th>
           <th>Chazinados</th>
           <th></th>
        </tr> 

        </thead>

        <tbody>
          
          <?php
              
              $item = null;

              $valor = null;

              $respuesta = ControladorChazinados::ctrMostrarChazinado($item,$valor);

              for ($i=0; $i < sizeof($respuesta) ; $i++) { 
                
                $propio = (!$respuesta[$i]['propio']) ? '<button class="btn btn-danger btn-no-margintop"><i class="fa fa-times"></i></button>' : '<button class="btn btn-success btn-no-margintop"><i class="fa fa-check"></i></button>';

                echo '<tr>
                              <td>'.formatearFecha($respuesta[$i]['fecha']).'</td>
                              <td>'.$respuesta[$i]['caravanas'].'</td>
                              <td>'.$propio.'</td>
                              <td>'.$respuesta[$i]['kgVivo'].'</td>
                              <td>'.$respuesta[$i]['kgLimpio'].'</td>
                              <td><button class="btn btn-default modalVerChazinados btn-no-margintop" idCarneada="'.$respuesta[$i]['idCarneada'].'" data-toggle="modal" data-target="#ventanaModalVerChazinados"><b>Chazinado</b></button></td>
                              <td>
                                  
                                  <div class="btn-group">
                              
                                      <button class="btn btn-warning btnEditarCarneada" idCarneada="'.$respuesta[$i]['idCarneada'].'" style="margin-top:0px;" data-toggle="modal" data-target="#ventanaModalEditarCarneada"><i class="fa fa-pencil"></i></button>
                                      
                                  </div>

                              </td>

                          </tr>';

              }

          ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<?php

include "modales/editarChazinado.modal.php";
include "modales/verChazinados.modal.php";

?>
