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
        
       <table class="table table-bordered table-striped dt-responsive tablas tablaVentasChazinados" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Vendedor</th>
           <th>Comprador</th>
           <th>Fecha</th>
           <th>Producto</th>
           <th>Kg</th>
           <th>Precio</th>
           <th>Pedido Realizado</th>
           <th></th>
  
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

            $realizado = ($respuesta[$i]['realizado'])  ? "<button class='btn btn-success btnPedidoRealizado' estado=1 idPedido='".$respuesta[$i]['id']."' style='margin-top:0px;'><b>Pedido Realizado</b></button>" : " <button class='btn btn-danger btnPedidoRealizado' estado=0 idPedido='".$respuesta[$i]['id']."' style='margin-top:0px;'><b>Pedido Pendiente</b></i></button>";

            echo "<tr>
                        <td>".$respuesta[$i]['vendedor']."</td>
                        <td>".$respuesta[$i]['comprador']."</td>
                        <td>".formatearFecha($respuesta[$i]['fecha'])."</td>
                        <td>".ucfirst($respuesta[$i]['producto'])."</td>
                        <td>".$respuesta[$i]['kg']." Kg</td>
                        <td><b>$</b> ".$precioTotal."</td>
                        <td>".$realizado."</td>
                        <td>
                          <div class='btn-group'>
                        
                                <button class='btn btn-warning btnEditarVentaChazinado' idVentaChazinado='".$respuesta[$i]['id']."' style='margin-top:0px;' data-toggle='modal' data-target='#ventanaModalEditarVentaChazinado'><i class='fa fa-pencil'></i></button>
                        
                                <button class='btn btn-danger btnEliminarVentaChazinado' idVentaChazinado='".$respuesta[$i]['id']."' producto='".$respuesta[$i]['producto']."' kg='".$respuesta[$i]['kg']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                                
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

$eliminarVentaChazinado = new ControladorChazinados;
$eliminarVentaChazinado -> ctrEliminarVenta();

include "modales/editarVentaChazinados.modal.php";

?>