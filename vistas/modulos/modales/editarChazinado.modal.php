
<div id="ventanaModalEditarChazinado" class="modal fade" role="dialog">

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
                                
                                    <label for="editarFechaChazinado">Fecha:</label>
                                    
                                    <input type="date" name="editarFechaChazinado" id="editarFechaChazinado" class="form-control">
                                    
                                </div>
                                
                            </div>

                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="editarPropioChazinado">Propio:</label><br>
                                
                                    <input type="checkbox" id="editarPropioChazinado" name="editarPropioChazinado" value="true" checked class="icheck-success">
                                
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-xs-6 col-lg-6" id="caravanaChazinadoInput" >
                                    
                                <div class="form-group">
                                
                                    <label for="editarCaravanaChazinado">N° Caravana:</label>
                                
                                    <input type="text" id="editarCaravanaChazinado" class="form-control">
                                
                                </div>

                            </div>
                            
                        

                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="editarKgVivoChazinado">Kg Vivo:</label>
                                
                                    <input type="number" step="0.01" id="editarKgVivoChazinado" class="form-control">
                                
                                </div>

                            </div>
                        
                        
                            <div class="col-xs-6 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="kgLimpioFaenar">Kg Limpio:</label>
                                
                                    <input type="number" step="0.01" id="kgLimpioFaenar" class="form-control">
                                
                                </div>

                            </div>   
                            

                            <div class="col-xs-6 col-lg-6" id="inputEditarPrecioKgVivo" style="display:none;">
                                
                                <div class="form-group">
                                
                                    <label for="editarPrecioKgVivo">$ Kg Vivo: </label>
                                    
                                    <input type="number" step="0.01" id="editarPrecioKgVivo" class="form-control">
                                
                                </div>
    
                            </div>

                        </div>
                         
                        <div class="row">
                        
                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgChorizos">Chorizos: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgChorizos" id="editarKgChorizos">

                                    </div>
                                
                                </div>
                        
                            </div>

                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgMorcillas">Morcillas: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgMorcillas" id="editarKgMorcillas">

                                    </div>
                                
                                </div>
                        
                            </div>

                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgSalames">Salames: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgSalames" id="editarKgSalames">

                                    </div>
                                
                                </div>
                        
                            </div>

                        </div>

                        <div class="row">
                        
                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgBondiolas">Bondiolas: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgBondiolas" id="editarKgBondiolas">

                                    </div>
                                
                                </div>
                        
                            </div>

                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgJamon">Jam&oacute;n: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgJamon" id="editarKgJamon">

                                    </div>
                                
                                </div>
                        
                            </div>

                            <div class="col-xs-4 col-lg-4">
                                
                                <div class="form-group">
                                    
                                    <label for="editarKgGrasa">Grasa: </label>
                                    
                                    <div class="input-group">
                                        
                                        <span class="input-group-addon"><b>Kg</b></span>

                                        <input type="number" class="form-control" name="editarKgGrasa" id="editarKgGrasa">

                                    </div>
                                
                                </div>
                        
                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-12">
                                
                                <button class="btn btn-primary btn-block" id="btnEditarChazinado">Ingresar</button>

                            </div>
                        
                        </div>

                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>


            

