
<div id="ventanaModalPreVenta" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content" id="" style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title">Pre-Venta</h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border' id='filtros'>    

                        <form method="post">
                        
                            <div class='row'>
                                
                                <div class="col-lg-12">
                                
                                    <div class="form-group">

                                        <label for="comprador">Comprador</label>
                                    
                                        <input type="text" class="form-control" id="comprador" name="comprador" placeholder="Comprador">  

                                    </div>

                                </div>

                                <div class="col-lg-12">
                                
                                        <label for="animal">Animal:</label><br>
                
                                        <label>
                                            <input type="radio" name="animal" class="hide" value="cerdo" checked/>
                                            <i class="icon icon-cerdo"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="animal" class="hide" value="chivo"/>
                                            <i class="icon icon-chivo"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="animal" class="hide" value="cordero"/>
                                            <i class="icon icon-cordero"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="animal" class="hide" value="pollo"/>
                                            <i class="icon icon-pollo"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="animal" class="hide" value="vaca"/>
                                            <i class="icon icon-vaca"></i>
                                        </label>
                                
                                </div>

                                
                                <div class="col-lg-12" id="inputSeccion">
                                

                                        <label for="seccion">Secci&oacute;n:</label><br>

                                        <label>
                                            <input type="radio" name="seccion" class="hide" value="entero" checked/>
                                            <i class="icon icon-entero"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="seccion" class="hide" value="medio"/>
                                            <i class="icon icon-medio"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="seccion" class="hide" value="cuartoDel"/>
                                            <i class="icon icon-cuartoDel"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="seccion" class="hide" value="costillar"/>
                                            <i class="icon icon-costillar"></i>
                                        </label>
                
                                        <label>
                                            <input type="radio" name="seccion" class="hide" value="cuartoTra"/>
                                            <i class="icon icon-cuartoTra"></i>
                                        </label>
    
                                
                                </div>

                                <div class="col-lg-12 hide" id="inputCantidad">
                                
                                    <div class="form-group">

                                        <label for="cantidad">Cantidad:</label>
                                    
                                        <input type="number" class="form-control input-mini" id="cantidad" name="cantidad" value="0">  

                                    </div>
                            
                                </div>
                            
                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" type="submit" name="cargarVenta">Cargar Pre-Venta</button>

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

$nuevaVenta -> ctrNuevaVenta();

?>

        

