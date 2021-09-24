
<div id="ventanaModalMuertes" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Cargar Muerte</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    
        
                        <div class='row'>
                            
                            <div class="col-lg-12">
                            
                                    <label for="animal">Animal:</label><br>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animal" class="hide" value="cerdo" checked/>
                                        <i class="icon icon-cerdo"></i>
                                    </label>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animal" class="hide" value="chivo"/>
                                        <i class="icon icon-chivo"></i>
                                    </label>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animal" class="hide" value="cordero"/>
                                        <i class="icon icon-cordero"></i>
                                    </label>

                                    <label style="font-size:2em;">
                                        <input type="radio" name="animal" class="hide" value="vaca"/>
                                        <i class="icon icon-vaca"></i>
                                    </label>
                            
                            </div>
                          
                            <div class="col-xs-12 col-lg-4">
                                
                                <div class="form-group">

                                    <label for="caravanaMuerte">N° Caravana</label>
                                
                                    <input type="text" class="form-control" id="caravanaMuerte" placeholder="N° Caravana" required>  

                                </div>

                            </div>

                            <div class="col-xs-12 col-lg-4">
                                
                                <div class="form-group">

                                    <label for="fechaMuerte">Fecha:</label>
                                
                                    <input type="date" class="form-control" id="fechaMuerte" required>  

                                </div>

                            </div>

                            <div class="col-xs-12 col-lg-4">
                                
                                <div class="form-group">

                                    <label for="motivoMuerte">Motivo:</label>
                                
                                    <select name="motivoMuerte" id="motivoMuerte" class="form-control">

                                    
                                        <option value="Empaste">Empaste</option>
                                        <option value="Parto">Parto</option>
                                        <option value="Neumonia">Neumonia</option>
                                        <option value="Diarrea">Diarrea</option>
                                        <option value="Otro">Otro</option>
                                    
                                    </select>  

                                    <input type="text" name="otroMotivoMuerte" id="otroMotivoMuerte"  class="form-control" placeholder="Otro Motivo" style="display:none;">

                                </div>

                            </div>
                                                      
                            <div class="col-lg-12">
                                
                                <button class="btn btn-primary btn-block" id="btnIngresarMuerte">Cargar Muerte</button>

                            </div>
                        </div> 

                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>


            

