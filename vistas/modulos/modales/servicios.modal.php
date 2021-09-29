
<div id="ventanaModalServicios" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Servicios</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    
                        
                        <form method="post">
                        
                            <div class='row'>
                                
                                <div class="col-lg-12">
                                
                                        <label for="animalServicio">Animal:</label><br>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalServicio" class="hide" value="cerdo" checked/>
                                            <i class="icon icon-cerdo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalServicio" class="hide" value="chivo"/>
                                            <i class="icon icon-chivo"></i>
                                        </label>
                
                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalServicio" class="hide" value="ovino"/>
                                            <i class="icon icon-cordero"></i>
                                        </label>

                                        <label style="font-size:2em;">
                                            <input type="radio" name="animalServicio" class="hide" value="vaca"/>
                                            <i class="icon icon-vaca"></i>
                                        </label>

                                </div>

                            </div> 
                        
                            <div class="row">

                                <div class="col-xs-12 col-lg-6">

                                    <div class="form-group">
                                    
                                        <label for="fechaServicio">Fecha:</label>
                                        
                                        <input type="date" name="fechaServicio" id="fechaServicio" class="form-control" required>
                                        
                                    </div>
                                    
                                </div>

                            
                            </div>

                            <div class="row">

                                <div class="col-xs-6 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="rodeoNumero">Rodeo:</label>
                                    
                                        <input type="number" id="rodeoNumero" name="rodeoNumero" class="form-control" required>
                                    
                                    </div>

                                </div>
                            
                            </div>
                            
                            <div class="row">

                                <div class="col-xs-12 col-lg-6">
                                    
                                    <div class="form-group">
                                    
                                        <label for="caravanaMachoRodeo">N° Caravana Macho:</label>
                                    
                                        <select id="caravanaMachoRodeo" name="caravanaMachoRodeo" class="form-control" required>
                                        </select>
                                    
                                    </div>

                                </div>
                            
                            </div>

                            <div id="inputsHembras">
                                    
                                <div class="row">

                                    <div class="col-xs-11 col-lg-5">
                                        
                                        <div class="form-group">
                                        
                                            <label for="caravanaHembra0">N° Caravana Hembra:</label>
                                        
                                            <select  id="caravanaHembra0" name="caravanaHembras[]" class="form-control caravanaHembras" required>
                                            </select>

                                        </div>

                                    </div>
                                

                                    <div class="col-xs-1 col-lg-1" style="padding-top:10px;">
                                                                    
                                        <button class="btn btn-default" id="agregarHembraRodeo" type="button">
                                            
                                            <i class="fa fa-plus"></i>
                                        
                                        </button>

                                    </div>
                                
                                </div>


                            </div>

                            <div class="row">

                                <div class="col-lg-12">
                                    
                                    <button class="btn btn-primary btn-block" type="submit" id="btnCargarRodeo" name="btnCargarRodeo">Cargar Rodeo</button>

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

$nuevoRodeo = new ControladorServicios;

$nuevoRodeo -> ctrNuevoRodeo();

?>

