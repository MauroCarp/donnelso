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

       <table class="table table-bordered table-striped dt-responsive tablas tablaMuertes" width="100%">
         
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
        
            <?php

              $item = null;

              $valor = null;

              $muertes = ControladorMuertes::ctrMostrarMuerte($item,$valor);

              for ($i=0; $i < sizeof($muertes); $i++) { 
                
                echo "<tr>
                            <td>".ucfirst($muertes[$i]['animal'])."</td>
                            <td>".formatearFecha($muertes[$i]['fecha'])."</td>
                            <td>".$muertes[$i]['caravana']."</td>
                            <td>".$muertes[$i]['motivo']."</td>
                            <td>
                                
                                <div class='btn-group'>
                            
                                    <button class='btn btn-warning btnEditarMuerte' idMuerte='".$muertes[$i]['id']."' style='margin-top:0px;' data-toggle='modal' data-target='#ventanaModalEditarMuertes'><i class='fa fa-pencil'></i></button>
                            
                                    <button class='btn btn-danger btnEliminarMuerte' type='button' idMuerte='".$muertes[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                                    
                                </div>

                            </td>

                          </tr>";

              }
            ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<?php

$eliminarMuerte = new ControladorMuertes;
$eliminarMuerte -> ctrEliminarMuerte();

include "modales/editarMuertes.modal.php";

?>
