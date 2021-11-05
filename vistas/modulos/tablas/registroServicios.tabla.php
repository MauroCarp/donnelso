<div class="box">

    <!-- EMPIEZA LA TABLA -->

    <div class="box-body">

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalServicios">Agregar Registro</button><br><br>

      <table class="table table-bordered table-striped dt-responsive tablas tablaRegistrosServicios" width="100%">
          
        <thead>

          <tr>

            <th>Animal</th>
            <th>Fecha</th>
            <th>Macho</th>
            <th>Hembras</th>
            <th></th>

          </tr> 

        </thead>
        
        <tbody>

        <?php

        $respuesta = ControladorServicios::ctrMostrarRodeo($item,$animal,$item2,$valor2);

        for ($i=0; $i < sizeof($respuesta) ; $i++) { 

          echo "<tr>
                        <td>".ucfirst($respuesta[$i]['tipo'])."</td>
                        <td>".formatearFecha($respuesta[$i]['fecha'])."</td>
                        <td>".$respuesta[$i]['caravanaMacho']."</td>
                        <td>".$respuesta[$i]['caravanasHembras']."</td>
                        <td>
                          <div class='btn-group'>
                                            
                              <button class='btn btn-danger btnEliminarRegistroRodeo' idRegistro='".$respuesta[$i]['idRodeo']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                              
                          </div>
                        </td>
                    </tr>";
        }
                
        
        ?>

        </tbody>

      </table>

    </div>

</div>



         