<div class="content-wrapper">

  <section class="content-header">
    
    <h1>Muertes</h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Muertes</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

        <!-- EMPIEZA LA TABLA -->

      <div class="box-body">

        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalMuertes">Cargar Muerte</button><br><br>

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Animal</th>
           <th>Fecha</th>
           <th>N° Caravana</th>
           <th>Motivo</th>
           <th></th>
        </tr> 

        </thead>

        <tbody>
       
            <tr>
                <td>Cerdo</td>
                <td>27/07/2021</td>
                <td>10/4</td>
                <td>Neumonia</td>
                <td>
                    
                    <div class="btn-group">
                
                        <button class="btn btn-warning btnEditarMuerte" idMuerte="2" style="margin-top:0px;" data-toggle="modal" data-target="#ventanaModalEditarMuertes"><i class="fa fa-pencil"></i></button>
                
                        <button class="btn btn-danger btnEliminarMuerte" idMuerte="2" style="margin-top:0px;"><i class="fa fa-times"></i></button>
                        
                    </div>

                </td>

            </tr>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<?php

include "modales/editarMuertes.modal.php";

?>
