
<div id="ventanaModalEditarSanidad" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Editar Registro Sanidad</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>   

                        <form method="post">

                            <input type="hidden" name="idSanidadEditar" id="idSanidadEditar">
                            <input type="hidden" name="animalSanidadEditar" id="animalSanidadEditar">

                            <div class="row">
                            
                                <div class="col-xs-6 col-lg-6">

                                    <div class="form-group">
                                    
                                        <label for="fechaSanidad">Fecha:</label>

                                        <input type="date" name="fechaSanidadEditar" id="fechaSanidadEditar" class="form-control">
                                    
                                    </div>
                                
                                </div>

                                <div class="col-xs-6 col-lg-6">

                                    <div class="form-group">
                                    
                                        <label for="motivoSanidad">Motivo:</label>

                                        <select name="motivoSanidadEditar" id="motivoSanidadEditar" class="form-control">

                                            <option value="desparaciacion">Desparacitaci&oacute;n</option>

                                            <option value="vacunacion">Vacunaci&oacute;n</option>

                                            <option value="tratamiento">Tratamiento</option>

                                        </select>
                                    
                                    </div>
                                
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-xs-6 col-lg-6">

                                    <div class="form-group">
                                    
                                        <label for="aplicacionSanidadEditar">Aplicaci&oacute;n:</label>

                                        <select name="aplicacionSanidadEditar" id="aplicacionSanidadEditar" class="form-control">

                                            <option value="general">General</option>

                                            <option value="individual">Individual</option>

                                        </select>
                                    
                                    </div>
                                
                                </div>

                                <div class="col-xs-6 col-lg-6" id="inputCaravanaSanidadEditar" style="display:none;">

                                    <div class="form-group">

                                        <label for="caravanaSanidad">N° Caravana:</label>

                                        <div class="input-group">
                    
                                            <span class="input-group-addon"><strong>N°</strong></span>

                                            <input type="text" class="form-control caravanaSanidad" id="caravanaSanidadEditar" name="caravanaSanidadEditar">

                                        </div>
                                    
                                    </div>
                                
                                </div>

                            </div>
                            
                            <div class="row">

                                <div class="col-xs-6 col-lg-6">

                                    <div class="form-group">

                                        <label for="comentariosSanidad">Comentarios:</label>
                                        
                                        <div>
                                        
                                            <textarea name="comentariosSanidadEditar" id="comentariosSanidadEditar" rows="3"></textarea>

                                        </div>

                                    </div>
                                
                                </div>
                            
                                <div class="col-xs-6 col-lg-6">

                                    <div class="form-group">

                                        <label for="costoVeterinario">$ Veterinario:</label>

                                        <div class="input-group">
                    
                                            <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                                            <input type="number" step="0.10" class="form-control" id="costoVeterinarioEditar" name="costoVeterinarioEditar">

                                        </div>
                                    
                                    </div>
                                
                                </div>

                            </div>
        
                            <div class="row">

                                <div class="col-lg-12">

                                    <button class="btn btn-primary btn-block" id="btnSanidadEditar" name="btnSanidadEditar">Editar Registro</button>
                                    
                                </div>

                            </div>
                        
                        </form>
                        
                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>


