
<div id="ventanaModalFinalizarVenta" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content" id="" style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title">Finalizar Venta</h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    

                        <form method="post">

                            <input type="hidden" name="idVenta" id="idVenta">
                            
                            <div class='row'>
                                
                                <div class="col-xs-12 col-lg-6">
                                
                                    <div class="form-group">

                                        <label for="fechaVenta">Fecha:</label>
                                                
                                        <input type="date" class="form-control" id="fechaVenta" name="fechaVenta">
            
                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-lg-6">
                                
                                    <div class="form-group">

                                        <label for="compradorVenta">Comprador</label>
                                    
                                        <input type="text" class="form-control" id="compradorVenta" readOnly>  

                                    </div>

                                </div>
                            
                            </div>

                            <div class="row">

                                <div class="col-lg-6  callout callout-success">
                                
                                    <label for="animalFaenar">Animal:</label><br>

                                    <strong id="animalFaenarText" style="font-size:1.4em;"></strong>
                                    <i style="font-size:1.5em"></i>

                                    <input type="hidden" name="animalFaenar" id="animalFaenar">                
                                
                                </div>
                                    
                                <div class="col-lg-6 callout callout-success" id="inputSeccionFinalizar">
                                        
                                    <label for="seccionFinalizar">Secci&oacute;n:</label><br>
                                        
                                    <strong id="seccionFinalizar" style="font-size:1.4em;"></strong>
                                    
                                    <input type="hidden" name="seccionFaenar" id="seccionFaenar">                
                                
                                </div>

                                <div class="col-lg-6 callout callout-success hide" id="inputCantidadFinalizar">
                            
                                    <label for="cantidadFinalizar">Cantidad:</label><br>

                                    <strong id="cantidadFinalizar" style="font-size:1.4em;"></strong>
                                    <input type="hidden" name="cantidadVenta" id="cantidadVenta">
                                </div>
                            
                            </div>
                            
                            <div class="row">
                                
                                <div class="col-xs-12 col-lg-12" style="text-align:center;font-size:1.5em;">
                                    
                                    <strong>Faenar</strong>
                                
                                </div>

                            </div>
                            
                            <div class="row">
                                
                                <div id="inputCaravanaVacasVenta" class="hide">
                                </div>
                                    
                                <div id="inputCaravanaVenta">

                                    <div class="col-xs-12 col-lg-6">
                                    
                                        <div class="form-group">

                                            <label for="caravanaFaenar">Caravana:</label>
                                            
                                                <select name="caravanaFaenar" id="caravanaFaenar" class="form-control">

                                                <?php
                                                    
                                                    $item = 'tipo';

                                                    $valor = '';

                                                    $item2 = 'listoVenta';

                                                    $valor2 = 1;

                                                    $caravanasListasVenta = ControladorAnimales::ctrMostrarAnimal($item,$valor,$item2,$valor2);

                                                ?>
                                                
                                                </select>

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-12 col-lg-6">
                                
                                    <div class="form-group">

                                        <label for="kgFinal">Kg Final:</label>
                                    
                                        <div class="input-group">
            
                                            <span class="input-group-addon"><strong>Kg</strong></span>

                                            <input type="number" step="0.10" class="form-control" id="kgFinal" name="kgFinal">

                                        </div>

                                    </div>
                                
                                </div>

                            </div>
                            
                            <div class="row">
                                
                                <div class="col-xs-12 col-lg-6">
                                
                                    <div class="form-group">
            
                                        <label for="precioTotal">$ Total:</label>
                                    
                                        <div class="input-group">
            
                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                
                                            <input type="number" step="0.10" class="form-control" id="precioTotal" name="precioTotalVenta" readOnly>
            
                                        </div>
            
                                    </div>

                                </div>

                                <div class="col-xs-12 col-lg-6">
                                
                                    <div class="form-group">
            
                                        <label for="porcentajeEmpleado">% Empleado:</label>
                                    
                                        <div class="input-group">
            
                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                
                                            <input type="number" step="0.10" class="form-control" id="porcentajeEmpleado" name="porcentajeEmpleado" readOnly>
            
                                        </div>
            
                                    </div>

                                </div>
                            
                            </div>

                            <div class="row">
                            
                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" name="actualizarVenta" type="submit">Finalizar Venta</button>

                                </div>

                            </div> 
                    
                        </form>
                    
                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>

<?php 

$cargarVenta = new ControladorVentas;
$cargarVenta -> ctrActualizarVenta();

?>       

