<div class="box">

    <!-- EMPIEZA LA TABLA -->

    <div class="box-body">

      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalSanidad">Agregar Registro</button><br><br>

      <table class="table table-bordered table-striped dt-responsive tablas tablaSanidad" width="100%">
          
        <thead>

          <tr>

            <th>Fecha</th>
            <th>Motivo</th>
            <th>Aplicaci&oacute;n</th>
            <th>N° Car.</th>
            <th>Comentarios</th>
            <th>$ Vet.</th>
            <th></th>

          </tr> 

        </thead>
        
        <tbody>

        <?php

        $item2 = null;

        $valor2 = null;

        $respuesta = ControladorSanidad::ctrMostrarSanidad($item,$animal,$item2,$valor2);

        for ($i=0; $i < sizeof($respuesta) ; $i++) { 

          echo "<tr>
                        <td>".formatearFecha($respuesta[$i]['fecha'])."</td>
                        <td>".ucfirst($respuesta[$i]['motivo'])."</td>
                        <td>".ucfirst($respuesta[$i]['aplicacion'])."</td>
                        <td>".$respuesta[$i]['caravana']."</td>
                        <td>".$respuesta[$i]['comentarios']."</td>
                        <td>".$respuesta[$i]['gastoVet']."</td>
                        <td>
                          <div class='btn-group'>
                                            
                              <button class='btn btn-warning btnEditarSanidad' idSanidad='".$respuesta[$i]['idSanidad']."' style='margin-top:0px;' id='modalEditarSanidad'  data-toggle='modal' data-target='#ventanaModalEditarSanidad'><span class='fa fa-pencil'></span></button>
                              <button class='btn btn-danger btnEliminarSanidad' idSanidad='".$respuesta[$i]['idSanidad']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                              
                          </div>
                        </td>
                    </tr>";
        }
                
        
        ?>

        </tbody>

      </table>

    </div>

</div>


         