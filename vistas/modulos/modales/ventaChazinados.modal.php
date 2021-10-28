
<div id="ventanaModalVentaChazinados" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content" id="" style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title">Venta</h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border' id='filtros'>    

                        <form method="post">
                        
                            <div class='row'>
                                
                                <div class="col-lg-12">
                                
                                    <div class="form-group">

                                        <label for="compradorChazinado">Comprador</label>
                                    
                                        <input type="text" class="form-control" id="compradorChazinado" name="compradorChazinado" placeholder="Comprador" required>  

                                    </div>

                                </div>

                            </div>

                            <div id="selectsChazinados">

                                <div class="row">

                                    <div class="col-xs-5 col-lg-5">
                                        
                                        <div class="form-group">
                                        
                                            <label for="producto0">Producto:</label>
                                        
                                            <select  id="producto0" name="productos[]" class="form-control productos" required>
                                                   
                                                    <option value="salame">Salame</option>
                                                   
                                                    <option value="chorizo">Chorizo</option>
                                                   
                                                    <option value="morcilla">Morcilla</option>
                                                   
                                                    <option value="codeguin">Codeguin</option>
                                                   
                                                    <option value="jamon">Jamon</option>
                                                   
                                                    <option value="bondiola">Bondiola</option>
                                                   
                                                    <option value="chicharron">Chicharron</option>
                                                   
                                                    <option value="grasa">Grasa</option>
                                                   
                                                    <option value="carne">Carne</option>
                                                    
                                            </select>

                                        </div>

                                    </div>

                                    <div class="col-xs-5 col-lg-5">
                                        
                                        <div class="form-group">
                                        
                                            <label for="kg0">Kg:</label>
                                            
                                            <input type="number" step="0.01" name="kg[]" id="kg0" class="form-control kilos" required>
                                            
                                        </div>

                                    </div>

                                    <div class="col-xs-1 col-lg-1" style="padding-top:10px;">
                                                                    
                                        <button class="btn btn-default" id="agregarProducto" type="button">
                                            
                                            <i class="fa fa-plus"></i>
                                        
                                        </button>

                                    </div>

                                </div>

                            </div>
                            
                                
                            <div class="row">

                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" type="submit" name="cargarVentaChazinado">Cargar Venta</button>
                                    
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

$nuevaVenta = new ControladorVentas;

$nuevaVenta -> ctrNuevaVentaChazinado();

?>

        

