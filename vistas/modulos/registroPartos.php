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
        
       <table class="table table-bordered table-striped dt-responsive tablaPartos" width="100%">
         
        <thead>
         
         <tr>
           
           <th>Caravana Madre</th>
           <th>Caravana Padre</th>
           <th>Fecha Parto</th>
           <th>Cantidad</th>
           <th>Sexo</th>
           <th>Mellizo</th> 
           <th>Complicaci&oacute;n</th> 

         </tr> 

        </thead>
    
        <tbody>

        <?php
            $item = null;

            $valor = null;

            // $registros = ControladorIngresos::ctrMostrarPartos($item,$valor);

            // for ($i=0; $i < sizeof($registros); $i++) { 
                
            //     $buscar = 'idAnimal';

            //     // $caravanaMadre = ControladorIngresos::ctrBuscarMadre();
                
            //     // $caravanaPadre = ControladorIngresos::ctrBuscarMadre();
                
            //     $mellizos = ($registros[$i]['mellizos']) ? '<button class="btn btn-success><i class="fa fa-check></i></button>" ' : '<button class="btn btn-warning><i class="fa fa-times></i></button>' ;
            //     echo "<tr>
            //                 <td>".$registros[$i]."</td>
            //                 <td>".$registros[$i]."</td>
            //                 <td>".$registros[$i]['fecha']."</td>
            //                 <td>".$registros[$i]['cantidad']."</td>
            //                 <td>".$registros[$i]['sexo']."</td>
            //                 <td>".$mellizos."</td>
            //                 <td>".$registros[$i]['complicacion']."</td>
            //             </tr>
            //     ";

            // }

        ?>

        </tbody>
    
    </table>

      </div>

    </div>

  </section>

</div>
