<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ventas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Ventas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

        <!-- EMPIEZA LA TABLA -->

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas tablaVentas" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Vendedor</th>
           <th>Comprador</th>
           <th>Animal</th>
           <th>Porci&oacute;n / Cantidad</th>
           <th>Fecha</th>
           <th>Kg Final</th>
           <th>$ Venta</th>
           <th>$ Empleado</th>
  
        </tr> 

        </thead>

        <tbody>

        <?php

        $item = 'preventa';

        $valor = 0;
        
        $respuesta = ControladorVentas::ctrMostrarVentas($item,$valor);

        for ($i=0; $i < sizeOf($respuesta) ; $i++) { 

          $seccionCantidad = ($respuesta[$i]['animal'] == 'pollo' OR $respuesta[$i]['animal'] == 'vaca') ? $respuesta[$i]['cantidad'] : ucfirst($respuesta[$i]['seccion']); 

          echo "<tr>
                      <td>".$respuesta[$i]['vendedor']."</td>
                      <td>".$respuesta[$i]['comprador']."</td>
                      <td>".ucfirst($respuesta[$i]['animal'])."</td>
                      <td>".$seccionCantidad."</td>
                      <td>".$respuesta[$i]['fecha']."</td>
                      <td>".$respuesta[$i]['kgFinal']."</td>
                      <td>".$respuesta[$i]['precioVenta']."</td>
                      <td>".$respuesta[$i]['comisionEmpleado']."</td>
                  </tr>";
       
        }


        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>