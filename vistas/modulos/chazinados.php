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

        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalChazinado">Cargar Registro</button><br><br>

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Fecha</th>
           <th>N° Caravana</th>
           <th>Propio</th>
           <th>Kg Vivo</th>
           <th>Kg Limpio</th>
           <th></th>
        </tr> 

        </thead>

        <tbody>
       
            <tr>
                <td>27/07/2021</td>
                <td>10/4</td>
                <td><button class="btn btn-danger btn-no-margintop"><i class="fa fa-times"></i></button></td>
                <td>200 Kg</td>
                <td>148 Kg</td>
                <td>
                    
                    <div class="btn-group">
                
                        <button class="btn btn-warning btnEditarChazinado" idChazinado="2" style="margin-top:0px;" data-toggle="modal" data-target="#ventanaModalEditarChazinado"><i class="fa fa-pencil"></i></button>
                
                        <button class="btn btn-danger btnEliminarChazinado" idChazinado="2" style="margin-top:0px;"><i class="fa fa-times"></i></button>
                        
                    </div>

                </td>

            </tr>

            <tr>
                <td>20/06/2021</td>
                <td>8</td>
                <td><button class="btn btn-success btn-no-margintop"><i class="fa fa-check"></i></button></td>
                <td>250 Kg</td>
                <td>210 Kg</td>
                <td>
                    
                    <div class="btn-group">
                
                        <button class="btn btn-warning btnEditarChazinado" idChazinado="2" style="margin-top:0px;" data-toggle="modal" data-target="#ventanaModalEditarChazinado"><i class="fa fa-pencil"></i></button>
                
                        <button class="btn btn-danger btnEliminarChazinado" idChazinado="2" style="margin-top:0px;"><i class="fa fa-times"></i></button>
                        
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

include "modales/editarChazinado.modal.php";

?>
