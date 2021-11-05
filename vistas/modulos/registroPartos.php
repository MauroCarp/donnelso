<?php



?>
<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Registro de Partos
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Registro de Partos</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalParto">
          
          Cargar Parto

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas tablaPartos" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Animal</th>
           <th>Fecha Parto</th>
           <th>Caravana Madre</th>
           <th>Caravana Padre</th>
           <th>Cantidad</th>
           <th>Sexo</th>
           <th>Mellizo</th> 
           <th>Complicaci&oacute;n</th> 
           <!-- <th></th>  -->

         </tr> 

        </thead>
    
        <tbody>

        <?php
            $item = null;

            $valor = null;
        
            $item2 = null;

            $valor2 = null;

            $registros = ControladorIngresos::ctrMostrarPartos($item,$valor,$item2,$valor2);
            
            $item2 = null;

            $valor2 = null;

            for ($a=0; $a < sizeof($registros); $a++) { 

              $item = 'idAnimal';
            
              $mellizos = ($registros[$a]['mellizo'] == 0 OR $registros[$a]['mellizo'] == null) ? '<button class="btn btn-danger btn-no-margintop"><i class="fa fa-times"></i></button>'  : '<button class="btn btn-success btn-no-margintop"><i class="fa fa-check"></i></button>'; 

              echo "<tr>
                          <td>".ucfirst($registros[$a]['tipo'])."</td>
                          <td>".formatearFecha($registros[$a]['fecha'])."</td>
                          <td>".$registros[$a]['caravanaMadre']."</td>
                          <td>".$registros[$a]['caravanaPadre']."</td>
                          <td>".$registros[$a]['cantidad']."</td>
                          <td>".$registros[$a]['sexo']."</td>
                          <td>".$mellizos."</td>
                          <td>".$registros[$a]['complicacion']."</td>
                          </tr>
                          ";
                          
                        }
                        // <td><button class='btn btn-success btnVerParto btn-no-margintop' idParto='".$registros[$a]['idParto']."' data-toggle='modal' data-target='#ventanaModalVerParto'><i class='fa fa-eye'></i></button></td>

        ?>

        </tbody>
    
    </table>

      </div>

    </div>

  </section>

</div>


