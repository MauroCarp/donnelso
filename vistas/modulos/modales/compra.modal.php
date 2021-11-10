
<div id="ventanaModalCompra" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Compra</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    

                        <form method="POST">
                        
                            <div class='row'>
                                
                                <div class="col-lg-12">
                                
                                        <label for="animalCompra">Animal:</label><br>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalCompra" class="hide" value="cerdo" checked/>
                                            <i class="icon icon-cerdo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalCompra" class="hide" value="chivo"/>
                                            <i class="icon icon-chivo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalCompra" class="hide" value="ovino"/>
                                            <i class="icon icon-cordero"></i>
                                        </label>

                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalCompra" class="hide" value="vaca"/>
                                            <i class="icon icon-vaca"></i>
                                        </label>

                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalCompra" class="hide" value="pollo"/>
                                            <i class="icon icon-pollo"></i>
                                        </label>
                                
                                </div>

                            </div> 
                        
                            <div class="row">

                                <div class="col-xs-12 col-lg-6">

                                    <div class="form-group">
                                    
                                        <label for="fechaCompra">Fecha:</label>
                                        
                                        <input type="date" name="fechaCompra" id="fechaCompra" class="form-control" required> 
                                        
                                    </div>
                                    
                                </div>

                                <div class="col-xs-12 col-lg-6" id="cantidadCompra" style="display:none;">
                                    
                                    <div class="form-group">
                                    
                                        <label for="cantidadCompra">Cantidad:</label>
                                    
                                        <input type="number" id="cantidadCompra" name="cantidadCompra" class="form-control">
                                    
                                    </div>

                                </div>
                            
                            </div>

                            <div class="row" id="cantidadMHCompra">

                                <div class="col-xs-6 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="machosCompra">Machos:</label>
                                    
                                        <input type="number" id="machosCompra" name="machosCompra" value="0" class="form-control">
                                    
                                    </div>

                                </div>
                
                                <div class="col-xs-6 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="hembrasCompra">Hembras:</label>
                                    
                                        <input type="number" id="hembrasCompra" name="hembrasCompra" value="0" class="form-control">
                                    
                                    </div>

                                </div>
                            
                            </div>
                            
                            <div class="row">

                                <div class="col-xs-8 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="proveedorCompra">Proveedor: </label>
                                        
                                        <select id="proveedorCompra" name="proveedorCompra" class="form-control">
                                            <option value="">Seleccionar Proveedor</option>
                                        </select>
                                        
                                        <br>
                                        <input type="text" id="nuevoProvCompra" name="nuevoProvCompra" class="form-control" placeholder="Proveedor" style="display:none;"/>
                                    
                                    </div>
        
                                </div>

                                <div class="col-xs-4 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="engorde">Engorde: </label>
                                        <br>
                                        <input type="checkbox" id="engordeCompra" name="engordeCompra" style="height:20px;width:20px">
                                    
                                    </div>
        
                                </div>
                            
                            </div>

                            <div class="row">
                                <div class="col-xs-12 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="precioTotalCompra">Precio Total:</label>
                                    
                                        <input type="number" step="0.01" id="precioTotalCompra" name="precioTotalCompra" class="form-control" required>
                                    
                                    </div>

                                </div>
                                
                                <div class="col-xs-12 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="kgTotalCompra">Kg Total:</label>
                                    
                                        <input type="number" step="0.100" id="kgTotalCompra" name="kgTotalCompra" class="form-control" required>
                                    
                                    </div>

                                </div>

                            </div>
                            

                            <div class="row">

                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" type="submit" id="btnIngresarCompra" name="btnIngresarCompra">Ingresar</button>

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

$nuevoIngreso = new ControladorIngresos();
$nuevoIngreso -> ctrNuevoIngreso();

?>
