<div class="box">

    <!-- EMPIEZA LA TABLA -->

    <div class="box-body">

    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalSanidad">Agregar Registro</button><br><br> -->

    <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
      <thead>

        <tr>

          <th>N° Caravana</th>
          <th>Fecha Ingreso</th>
          <th>Peso Ingreso</th>
          <th>Estado</th>
          <th>Listo</th>

        </tr> 

      </thead>

      <tbody>

      <?php

        $item = 'tipo';

        $item2 = 'destino';

        $valor2 = 'Engorde';

        $respuesta = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

        for ($i=0; $i < sizeof($respuesta) ; $i++) { 
          
          $check = '';
          
          if($respuesta[$i]['listoVenta'] == 1){
            
            $estado = 'Listo p/ venta';

            $check =  'checked';
          
          }else{

            $estado = 'Engorde';
          
          }
          

          echo '
          <tr>
            <td>'.$respuesta[$i]['caravana'].'</td>
            <td>'.formatearFecha($respuesta[$i]['fecha']) .'</td>
            <td>'.$respuesta[$i]['peso'].' Kg</td>
            <td>'.$estado.'</td>
            <td><input type="checkbox" style="width:20px;height:20px;"  class="checkboxEngorde"  idAnimal="'.$respuesta[$i]['idAnimal'].'" '.$check.'></td>
          </tr>';

        }

      ?>
        

      </tbody>

      </table>

    </div>

</div>
         