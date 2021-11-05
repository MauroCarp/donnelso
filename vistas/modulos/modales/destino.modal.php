<div id="ventanaModalDestinoBuscar" class="modal fade" role="dialog">
  
        <div class="modal-dialog">

            <div class="modal-content"  style="left:0px">

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                
                    <h4 class="modal-title"><b>Destino</b></h4>

                </div>

                <div class='modal-body' style='padding-bottom:0px;'>

                    <div class='box-body'>
                        
                        <div class='box-header with-border'>    

                                <div class='row'>
                                
                                    <div class="col-lg-12">
                                    
                                        <label for="destinoBuscar">Destino</label>
                                    
                                        <select class="form-control" id="destinoBuscar" name="destinoBuscar"  readOnly required>  
                                        </select>

                                    </div>

                                </div> 
    <br>
                                <div class="row" id="divEngorde" style="display:none;">
                                    
                                    <div class="col-xs-6 col-lg-4">

                                        <div class="form-group">
                
                                            <label for="listoVentaBuscar">Listo Para la Venta</label>
                                        <br>
                                            <input type="checkbox" id="listoVentaBuscar"  name="listoVentaBuscar" disabled style="width:20px;height:20px;">  

                                        </div>

                                    </div>
        
                                </div>

                                <div class="row" id="divReproductor" style="display:none;">
        
                                    
                                    <div class="" id="reproductorMacho" style="display:none;">

                                        <table class="table table-bordered table-striped dt-responsive tablas tablaRodeosMachoBuscar" width="100%">
                
                                            <thead>
                                        
                                                <tr>
                                        
                                                    <th>N° Rodeo</th>
                                                    <th>Fecha</th>
                                                    <th>Caravanas Hembras</th>
                                        
                                                </tr> 
                                    
                                            </thead>
                                    
                                            <tbody id="rodeosMachoBuscar">                            
                                    
                                            </tbody>
                                    
                                        </table>

                                    </div>
                                    
                                    <div class="" id="reproductorHembra" style="display:none;">
                                        
                                    <h3>RODEOS</h3>
                                    <table class="table table-bordered table-striped dt-responsive tablaRodeosHembrasBuscar" width="100%">
                
                                        <thead>
                                    
                                            <tr>
                                    
                                                <th>N° Rodeo</th>
                                                <th>Fecha</th>
                                                <th>Caravanas Hembras</th>
                                                <th>Caravanas Machos</th>
                                                <th></th>

                                            </tr> 
                                
                                        </thead>
                                
                                        <tbody id="rodeosHembraBuscar">                            
                                
                                        </tbody>
                                
                                    </table>

                                    <h3>PARTOS</h3>
                                    <table class="table table-bordered table-striped dt-responsive tablaPartosBuscar" width="100%">
                
                                        <thead>
                                    
                                            <tr>
                                                
                                                <th>Caravana Padre</th>
                                                <th>Fecha</th>
                                                <th>Cantidad</th>
                                                <th>Sexo</th>
                                                <th>Mellizos</th>
                                                <th>Complicaci&oacute;n</th>
                                                <th></th>

                                            </tr> 
                                
                                        </thead>
                                
                                        <tbody id="partosBuscar">                            
                                
                                        </tbody>
                                
                                    </table>
                                    
                                    </div>
        
                                </div>

                        </div>

                    </div>  

                </div>

            </div> 

        </div>

</div>
    


