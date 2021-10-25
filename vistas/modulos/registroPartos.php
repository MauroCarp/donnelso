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
           
           <th>Fecha Parto</th>
           <th>Caravana Madre</th>
           <th>Caravana Padre</th>
           <th>Cantidad</th>
           <th>Sexo</th>
           <th>Mellizo</th> 
           <th>Complicaci&oacute;n</th> 
           <th></th> 

         </tr> 

        </thead>
    
        <tbody>

        <?php
            $item = null;

            $valor = null;

            $registros = ControladorIngresos::ctrMostrarPartos($item,$valor);
            
            $item2 = null;

            $valor2 = null;

            for ($i=0; $i < sizeof($registros); $i++) { 
                
                $item = 'idAnimal';

                $valor = $registros[$i]['idMadre'];
            
                $caravanaMadre = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

                $valor = $registros[$i]['idPadre'];
                
                $caravanaPadre = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);
               
                $mellizos = ($registros[$i]['mellizo'] != null) ? '<button class="btn btn-success"><i class="fa fa-check"></i></button>" ' : '<button class="btn btn-danger btn-no-margintop"><i class="fa fa-times"></i></button>' ;
                
                echo "<tr>
                            <td>".formatearFecha($registros[$i]['fecha'])."</td>
                            <td>".$caravanaMadre[$i]['caravana']."</td>
                            <td>".$caravanaPadre[$i]['caravana']."</td>
                            <td>".$registros[$i]['cantidad']."</td>
                            <td>".$registros[$i]['sexo']."</td>
                            <td>".$mellizos."</td>
                            <td>".$registros[$i]['complicacion']."</td>
                            <td><button class='btn btn-success btnVerParto btn-no-margintop' idParto=".$registros[$i]['idParto']."><i class='fa fa-eye'></i></button></td>
                        </tr>
                ";

            }

        ?>

        </tbody>
    
    </table>

      </div>

    </div>

  </section>

</div>
