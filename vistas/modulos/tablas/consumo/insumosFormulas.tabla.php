<div class="box">
    
  <div class="box-body">

    <div class="row">

        <!-- FORMULAS -->
      <div class="col-xs-12 col-lg-4 tablasConsumo">
        
        <div class="box-body">
          <h3 style="margin-top:0;margin-bottom:0;">Formulas</h3>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ventanaModalAgregarFormula">Agregar Formula</button><br><br>

          <table class="table table-bordered table-striped dt-responsive tablaFormulas" width="100%">
              
            <thead>
    
              <tr>
    
                <th>Nombre</th>
                <th>$ Kg</th>
                <td></td>

              </tr> 
    
            </thead>
    
            <tbody>

            <?php

              $item = NULL;
              $valor = NULL;

              $formulas = ControladorConsumo::ctrMostrarFormulas($item,$valor);

              for ($i=0; $i < sizeof($formulas) ; $i++) {

              echo "<tr>

                <td>".$formulas[$i]['nombre']."</td>
                <td>".number_format($formulas[$i]['precioKg'],2,',','.')."</td>
                <td>

                  <div class='btn-group'>
                                    
                    <button class='btn btn-success btnVerFormula' idFormula='".$formulas[$i]['id']."' style='margin-top:0px;' id='modalVerFormula'  data-toggle='modal' data-target='#ventanaModalVerFormula'><span class='fa fa-eye'></span></button>
                    <button class='btn btn-danger btnEliminarFormula' idFormula='".$formulas[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                  
                  </div>
                  
                  </td>
                  
                  </tr>";
                  
                  
              }

              ?>
    
            </tbody>
    
          </table>
    
        </div>

      </div>
      <?php

        $eliminarFormula = New ControladorConsumo;
        $eliminarFormula -> ctrEliminarFormula();
      
      ?>



      <!-- INSUMOS -->    
      <div class="col-xs-12 col-lg-4 tablasConsumo">
        
        <div class="box-body">
          <h3 style="margin-top:0;margin-bottom:0;">Insumos</h3>
<br><br><br>
          <table class="table table-bordered table-striped dt-responsive tablaInsumos" width="100%">
              
            <thead>
    
              <tr>
    
                <th>Insumo</th>
                <th></th>
                
              </tr> 
    
            </thead>
    
            <tbody>
            <tr id="inputNuevoInsumo">

              <td><input type="text" name="nombreInsumoNuevo" id="nombreInsumoNuevo"></td>

              <td><button id="cargarInsumo" class="btn btn-primary" style="margin-top:0px">Cargar Insumo</button></td>
            
            </tr>
            <?php

              $item = NULL;
              $valor = NULL;

              $insumos = ControladorConsumo::ctrMostrarInsumo($item,$valor);
              
              for ($i=0; $i < sizeof($insumos) ; $i++) {

              echo "<tr>

                <td>".$insumos[$i]['nombre']."</td>
                <!--<td>".$insumos[$i]['precioKg']."</td>-->
                <td>

                  <div class='btn-group'>
                                    
                      <button class='btn btn-danger btnEliminarInsumo' idInsumo='".$insumos[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                      
                  </div>

                </td>

              </tr>";
            
            
              }
            
            ?>
    
            </tbody>
    
          </table>
    
        </div>

      </div>

      <?php
      
      $eliminarInsumo = new ControladorConsumo;
      $eliminarInsumo-> ctrEliminarInsumo();
      
      ?>

      <!-- REGISTRO INSUMOS -->
      <div class="col-xs-12 col-lg-4 tablasConsumo">
        
        <div class="box-body">

          <h3 style="margin-top:0;margin-bottom:0;">Registro Insumos</h3>
          <table class="table table-bordered table-striped dt-responsive tablaRegistroInsumos" width="100%" style="margin-top:65px">
              
            <thead>
    
              <tr>
    
                <th>Nombre</th>
                <th>$ Kg</th>
                <th>Fecha</th>

              </tr> 
    
            </thead>
    
            <tbody>
              
            <?php

              $item = NULL;
              $valor = NULL;

              $insumos = ControladorConsumo::ctrMostrarRegistrosInsumo($item,$valor);
              
              for ($i=0; $i < sizeof($insumos) ; $i++) {

              echo "<tr>
                <td>".$insumos[$i]['nombre']."</td>
                <td>".$insumos[$i]['precioKg']."</td>
                <td>".formatearFecha($insumos[$i]['fecha'])."</td>
                <td><button class='btn btn-danger btnEliminarRegistroInsumo' idRegistroInsumo='".$insumos[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button></td>
            </tr>";
            
            
              }
            
            ?>
    
            </tbody>
    
          </table>
    
        </div>

      </div>
      
      <?php
      
      $eliminarRegistroInsumo = new ControladorConsumo;
      $eliminarRegistroInsumo -> ctrEliminarRegistroInsumo();
      
      ?>
    </div>

  </div>

</div>
         