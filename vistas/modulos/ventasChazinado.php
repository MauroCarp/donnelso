<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Ventas Chazinados
    
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
           <th>Fecha</th>
           <th>Producto</th>
           <th>Kg</th>
           <th>Precio</th>
  
        </tr> 

        </thead>

        <tbody>

        <?php

        $item = 'chazinados';

        $valor = null;

        $respuesta = ControladorVentas::ctrMostrarVentas($item,$valor);

        for ($i=0; $i < sizeOf($respuesta) ; $i++) { 

            $precioProducto = ControladorPrecios::ctrMostrarPrecios($respuesta[$i]['producto']);

            $precioTotal = $precioProducto[0] * $respuesta[$i]['kg'];

            echo "<tr>
                        <td>".$respuesta[$i]['vendedor']."</td>
                        <td>".$respuesta[$i]['comprador']."</td>
                        <td>".formatearFecha($respuesta[$i]['fecha'])."</td>
                        <td>".ucfirst($respuesta[$i]['producto'])."</td>
                        <td>".$respuesta[$i]['kg']." Kg</td>
                        <td>$ ".$precioTotal."</td>
                    </tr>";
       
        }


        ?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>