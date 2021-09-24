
<div id="ventanaModalAgregarRacion" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Cargar Raci&oacute;n</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>   

                        <form method="post">
                            
                            <div class="row">
                                
                                <div class="col-xs-12 col-lg-4">

                                    <div class="form-group">
                                    
                                        <label for="tipoRacion">Tipo:</label>

                                        <select name="tipoRacion" id="tipoRacion" class="form-control">

                                            <option value="Silo">Silo</option>
                                            <option value="Molienda">Molienda</option>

                                        </select>
                                    
                                    </div>
                                    
                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <div class="form-group">
                                        
                                        <label for="fechaRacion">Fecha:</label>
                            
                                        <input type="date" name="fechaRacion" id="fechaRacion" required>
                                    
                                    </div>
                                    
                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <div class="form-group">

                                        <label for="animalRacion">Animal:</label>

                                        <select name="animalRacion" id="animalRacion" class="form-control" required>

                                            <option value="">Seleccionar Animal</option>
                                            <option value="Cerdo">Cerdo</option>
                                            <option value="Ovinos">Ovinos</option>
                                            <option value="Pollos">Pollos</option>
                                            <option value="Vacas">Vacas</option>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <div class="form-group">

                                        <label for="formulaRacion">Formula:</label>

                                        <select name="formulaRacion" id="formulaRacion" class="form-control"  disabled='true' required>

                                        </select>

                                    </div>

                                </div>

                                <div class="col-xs-12 col-lg-4">

                                    <div class="form-group">
                                        
                                        <label for="kgRacion">Kg:</label>
                            
                                        <input type="number" name="kgRacion" id="kgRacion" class="form-control" required>
                                    
                                    </div>
                                    
                                </div>

                            </div>
                            
                            <div class="row">

                                <div class="col-lg-12">

                                <button class="btn btn-primary btn-block" type="submit" id="cargarRacion" name="cargarRacion">Cargar Raci&oacute;n</button>
                                    
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

$cargarRacion = new ControladorConsumo;
$cargarRacion -> ctrCargarRacion();

?>

            

