<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Pre-Ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Pre-Ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

        <!-- EMPIEZA LA TABLA -->

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas tablaPreVentas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Vendedor</th>
           <th>Comprador</th>
           <th>Animal</th>
           <th>Porci&oacute;n / Cantidad</th>
           <th>Fecha</th>
           <th></th>
        </tr> 

        </thead>

        <tbody>

        <?php

        $item = 'preventa';

        $valor = 1;
        
        $respuesta = ControladorVentas::ctrMostrarVentas($item,$valor);

        for ($i=0; $i < sizeOf($respuesta) ; $i++) { 
          
          $seccionCantidad = ($respuesta[$i]['animal'] == 'pollo' OR $respuesta[$i]['animal'] == 'vaca') ? $respuesta[$i]['cantidad'] : ucfirst($respuesta[$i]['seccion']); 
          echo "<tr>
                      <td>".$respuesta[$i]['vendedor']."</td>
                      <td>".$respuesta[$i]['comprador']."</td>
                      <td>".ucfirst($respuesta[$i]['animal'])."</td>
                      <td>".$seccionCantidad."</td>
                      <td>".formatearFecha($respuesta[$i]['fecha'])."</td>
                      <td>
                          
                          <div class='btn-group'>
                      
                              <button class='btn btn-success btnFinalizarVenta' idPreVenta='".$respuesta[$i]['id']."' style='margin-top:0px;' data-toggle='modal' data-target='#ventanaModalFinalizarVenta'><i class='fa fa-arrow-circle-right'></i> Finalizar</button>
                      
                              <button class='btn btn-danger btnEliminarPreVenta' idPreVenta='".$respuesta[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                              
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

$eliminarPreVenta = new ControladorVentas;
$eliminarPreVenta-> ctrEliminarVenta();

include "modales/finalizarVenta.modal.php";

?>
