<?php



?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de Compras
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de Compras</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalCompra">
          
          Cargar Ingreso

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablaCompras" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Fecha de Compra</th>
           <th>Animal</th>
           <th>Proveedor</th>
           <th>Cantidad</th>
           <th>Kg Total</th>
           <th>$ Total</th> 
           <th></th> 

         </tr> 

        </thead>

       </table>

      </div>

    </div>

  </section>

</div>


<?php

$eliminarCompra = new ControladorIngresos;
$eliminarCompra -> ctrEliminarCompra();

?>