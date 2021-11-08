
<div id="ventanaModalEditarMuertes" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Editar Muerte</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    
                        
                        <form  method="post">

                            <input type="hidden" name="editarIdMuerte" id="editarIdMuerte">
                            
                            <div class='row'>
                                
                                <div class="col-lg-12">
                                
                                        <label for="editarAnimal">Animal:</label><br>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="editarAnimal" class="hide" value="cerdo" disabled checked/>
                                            <i class="icon icon-cerdo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="editarAnimal" class="hide" value="chivo" disabled/>
                                            <i class="icon icon-chivo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="editarAnimal" class="hide" value="ovino" disabled/>
                                            <i class="icon icon-cordero"></i>
                                        </label>

                                        <label style="font-size:2em;">
                                            <input type="radio" name="editarAnimal" class="hide" value="vaca" disabled/>
                                            <i class="icon icon-vaca"></i>
                                        </label>
                                
                                </div>
                            
                                <div class="col-xs-12 col-lg-4">
                                    
                                    <div class="form-group">

                                        <label for="editarCaravanaMuerte">N° Caravana</label>
                                    
                                        <input type="text" class="form-control" id="editarCaravanaMuerte" name="editarCaravanaMuerte" readOnly required>  

                                    </div>

                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    
                                    <div class="form-group">

                                        <label for="editarFechaMuerte">Fecha:</label>
                                    
                                        <input type="date" class="form-control" id="editarFechaMuerte" name="editarFechaMuerte" required>  

                                    </div>

                                </div>

                                <div class="col-xs-12 col-lg-4">
                                    
                                    <div class="form-group">

                                        <label for="editarMotivoMuerte">Motivo:</label>
                                    
                                        <select name="editarMotivoMuerte" id="editarMotivoMuerte" name="editarMotivoMuerte" class="form-control">

                                        </select> 
                                        <br>
                                        <input type="text" class="form-control" id="editarOtroMotivo" name="editarOtroMotivo" style="display:none">  


                                    </div>

                                </div>
                                                        
                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" id="btnEditarMuerte" name="btnEditarMuerte">Editar Muerte</button>

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

$editarMuerte = new ControladorMuertes();

$editarMuerte -> ctrActualizarMuerte();
?>
