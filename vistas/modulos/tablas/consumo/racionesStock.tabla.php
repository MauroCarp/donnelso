<div class="box">
    
  <div class="box-body">
   
    <div class="row">

        <div class="col-xs-12 col-lg-8">
        
            <div class="box-body">

                <h3>Raciones</h3>

                <table class="table table-bordered table-striped dt-responsive tablas tablaRaciones" width="100%">
                    
                    <thead>

                        <tr>

                        <th>Tipo</th>
                        <th>Fecha</th>
                        <th>Animal</th>
                        <th>Formula</th>
                        <th>Kg</th>
                        <th></th>

                        </tr> 

                    </thead>

                    <tbody>
                    <?php
                    
                    $item = NULL;

                    $valor = NULL;
                    
                    $resultados = ControladorConsumo::ctrMostrarRacion($item,$valor);

                    for ($i=0; $i < sizeOf($resultados) ; $i++) { 
                        
                      echo "<tr>
                            
                                <td>".$resultados[$i]['tipo']."</td>
                            
                                <td>".formatearFecha($resultados[$i]['fecha'])."</td>
                            
                                <td>".$resultados[$i]['animal']."</td>
                            
                                <td>".$resultados[$i]['formula']."</td>
                            
                                <td>".$resultados[$i]['kilos']."</td>

                                <td>
                                    <div class='btn-group'>
                            
                                        <button class='btn btn-danger btnEliminarRacion' idRacion='".$resultados[$i]['id']."' style='margin-top:0px;'><i class='fa fa-times'></i></button>
                                
                                    </div>
                                
                                </td>
                                
                            </tr>";

                    }
                    
                    
                    ?>
                    </tbody>

                </table>

                <button class="btn btn-primary" id="modalAgregarRacion"  data-toggle="modal" data-target="#ventanaModalAgregarRacion"><i class="fa fa-plus"></i></button>

            </div>

        </div>

        <?php
        
        $eliminarRacion = new ControladorConsumo;
        $eliminarRacion -> ctrEliminarRacion();
        
        ?>
      
        <div class="col-xs-12 col-lg-4">
         
            <div class="box-body">
                
                <h3>Stock</h3>

                <?php
                
                $item = NULL;
                
                $valor = NULL;
                
                $resultado = ControladorConsumo::ctrMostrarInsumo($item,$valor);
                
                for ($i=0; $i < sizeOf($resultado) ; $i++) { ?>
                    
                    <div class="row">
                        
                        <div class="col-xs-4 col-lg-4">
                    
                            <b><?php echo $resultado[$i]['nombre'];?></b>
                    
                        </div>
                        
                        <div class="col-xs-4 col-lg-4">
                    
                            <div class="input-group">
                        
                                <span class="input-group-addon"><strong>Kg</strong></span>
                    
                                <input type="number" class="form-control" id="kg<?php echo str_replace(' ','',$resultado[$i]['nombre']);?>" name="kg<?php echo $resultado[$i]['nombre'];?>" readOnly>
                    
                            </div>
                    
                        </div>
                    
                        <div class="col-xs-4 col-lg-4">
                    
                            <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                    
                                <input type="number" class="form-control" id="precio<?php echo str_replace(' ','',$resultado[$i]['nombre']);?>" name="precio<?php echo $resultado[$i]['nombre'];?>" readOnly>
                    
                            </div>
                    
                        </div>
                    
                    </div>
                
                <?php 
                
                }

                ?>

                <!-- Agregar -->
                <form method="post">
                    
                    <div class="row">
                        
                        <div class="col-xs-4 col-lg-4">

                            <select name="insumoStock" id="insumoStock" class="form-control">

                            </select>

                        </div>
                        
                        <div class="col-xs-4 col-lg-4">

                            <div class="input-group">
                        
                                <span class="input-group-addon"><strong>Kg</strong></span>

                                <input type="number" class="form-control" id="kgStock" name="kgStock" value="0">

                            </div>

                        </div>

                        <div class="col-xs-4 col-lg-4">

                            <div class="input-group">
                        
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                                <input type="number" class="form-control" id="precioStock" name="precioStock" value="0">

                            </div>

                        </div>

                        <div class="col-xs-12 col-lg-12">

                            <button class="btn btn-primary btn-block" id="agregarStock" name="actualizarStock">Actualizar Stock</button>
                        
                        </div>
                    
                    </div>
                
                </form>

            </div>
        
        </div>
          
    </div>

  </div>

</div>
