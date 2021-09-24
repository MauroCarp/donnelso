
<div id="ventanaModalChazinado" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Chazinados</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    
                       
                        <div class="row">

                            <div class="col-xs-6 col-lg-6">

                                <div class="form-group">
                                
                                    <label for="fechaChazinado">Fecha:</label>
                                    
                                    <input type="date" name="fechaChazinado" id="fechaChazinado" class="form-control">
                                    
                                </div>
                                
                            </div>

                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="propioChazinado">Propio:</label><br>
                                
                                    <input type="checkbox" id="propioChazinado" name="propioChazinado" value="true" checked class="icheck-success">
                                
                                </div>

                            </div>

                        </div>

                        <div id="caravanaChazinadoInput">

                            <div class="row">

                                <div class="col-xs-6 col-lg-6">
                                        
                                    <div class="form-group">
                                    
                                        <label for="caravanaChazinado1">N° Caravana:</label>
                                    
                                        <input type="text" id="caravanaChazinado1" class="form-control">
                                    
                                    </div>

                                </div>

                                <div class="col-xs-1 col-lg-1" style="padding-top:10px;">
                                                                
                                    <button class="btn btn-default" id="agregarCaravanaChazinado">
                                        
                                        <i class="fa fa-plus"></i>
                                    
                                    </button>

                                </div>
 
                            
                            </div>

                        </div>

                            
                        <div class="row">

                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="kgVivoChazinado">Kg Vivo:</label>
                                
                                    <input type="number" step="0.01" id="kgVivoChazinado" class="form-control">
                                
                                </div>

                            </div>
                        
                        
                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="kgLimpioChazinado">Kg Limpio:</label>
                                
                                    <input type="number" step="0.01" id="kgLimpioChazinado" class="form-control">
                                
                                </div>

                            </div>   
                            

                            <div class="col-xs-6 col-lg-6" id="inputPrecioKgVivo" style="display:none;">
                                
                                <div class="form-group">
                                
                                    <label for="precioKgVivo">$ Kg Vivo: </label>
                                    
                                    <input type="number" step="0.01" id="precioKgVivo" class="form-control">
                                
                                </div>
    
                            </div>

                        </div>
                         
                        <div class="row">
    
                            <div class="col-xs-6 col-lg-2">
                                
                                <button class="btn btn-default" id="produccionChazinados"><b>Producci&oacute;n</b></button>

                            </div>

                        </div>

                        <div id="divProduccion" style="display:none;">

                            <div class="row">
                            
                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgChorizos">Chorizos: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgChorizos" id="kgChorizos">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgMorcillas">Morcillas: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgMorcillas" id="kgMorcillas">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgSalames">Salames: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgSalames" id="kgSalames">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                            </div>

                            <div class="row">
                            
                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgBondiolas">Bondiolas: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgBondiolas" id="kgBondiolas">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgJamon">Jam&oacute;n: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgJamon" id="kgJamon">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgGrasa">Grasa: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgGrasa" id="kgGrasa">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                            </div>

                            <div class="row">
                            
                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgCodeguin">Codeguines: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgCodeguin" id="kgCodeguin">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgChicharron">Chicharron: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgChicharron" id="kgChicharron">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                                <div class="col-xs-4 col-lg-4">
                                    
                                    <div class="form-group">
                                        
                                        <label for="kgCarne">Carne: </label>
                                        
                                        <div class="input-group">
                                            
                                            <span class="input-group-addon"><b>Kg</b></span>

                                            <input type="number" class="form-control" name="kgCarne" id="kgCarne">

                                        </div>
                                    
                                    </div>
                            
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                
                                <button class="btn btn-primary btn-block" id="btnIngresarChazinado">Ingresar</button>

                            </div>
                        
                        </div>

                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>


            

