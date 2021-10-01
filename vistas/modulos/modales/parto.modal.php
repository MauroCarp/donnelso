
<div id="ventanaModalParto" class="modal fade" role="dialog">
  
    <form method="post">

        <div class="modal-dialog">

            <div class="modal-content"  style="left:0px">

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                
                    <h4 class="modal-title"><b>Madre</b></h4>

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
                                
                                    <div class="col-lg-12">
                                    
                                        <div class="form-group" id="inputCaravanaParto">

                                            <label for="caravanaParto">N° Caravana</label>
                                        
                                            <select class="form-control" id="caravanaParto" name="caravanaParto" required>  
                                            </select>

                                        </div>

                                    </div>
                                                            
                                    <div class="col-lg-12">
                                        
                                        <button class="btn btn-primary btn-block" id="btnParirModal">Parir</button>

                                    </div>

                                </div> 

                        </div>

                    </div>  

                </div>

            </div> 

        </div>

        <div class="modal-dialog" style="width:70%;display:none" id="inputNacimientos">
            
            <div class="modal-content">
            
                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>


                    <h4 class="modal-title"><b>Parto</b></h4>

                </div>

                <div class='modal-body' style='padding-bottom:0px;'>

                    <div class='box-body'>
                        
                        <div class='box-header with-border' id="inputNacidos">    

                            <div class="row">

                                <div class="col-xs-12 col-lg-3">

                                    <div class="form-group">
                                    
                                        <label for="fechaParto">Fecha:</label>
                                        
                                        <input type="date" name="fechaParto" id="fechaParto" class="form-control" required>
                                        
                                    </div>
                                    
                                </div>
                                
                                <div class="col-xs-12 col-lg-3">
                                    
                                    <div class="form-group">
                                    
                                        <label for="cantidadNacidos">Cantidad:</label>
                                    
                                        <input type="number" id="cantidadNacidos" name="cantidadNacidos" class="form-control">
                                    
                                    </div>
                                
                                </div>
                                
                                <div class="col-xs-12 col-lg-3">
                                    
                                    <div class="form-group">
                                    
                                        <label for="sexoParto">Sexo:</label>

                                        <div id="sexoParto">

                                            <input type="radio" name="sexo" checked value="M" style="height:20px;width:20px;"><b>M</b>
                                            <input type="radio" name="sexo" value="H" style="height:20px;width:20px;"><b>H</b>
                                            <input type="radio" name="sexo" value="M/H" style="height:20px;width:20px;"><b>M/H</b>
                                        
                                        </div>
                                    
                                    </div>
                                
                                </div>
                                
                                <div class="col-xs-12 col-lg-3">
                                    
                                    <div class="form-group">
                                    
                                        <label for="mellizos">Mellizos: </label>
                                        <br>
                                        <input type="checkbox" id="mellizos" name="mellizos" value="1" style="height:20px;width:20px">
                                    
                                    </div>
                                
                                </div>
                            </div>

                            <div class="row">
                                
                                <div class="col-xs-12 col-lg-3">
                                    
                                    <div class="form-group">
                                    
                                        <label for="complicacion">Complicaciones:</label>
                                    
                                        <textarea class="form-control" name="complicacionMadre" id="complicacion" rows="3"></textarea>
                                        
                                    </div>
                                
                                </div>

                            </div>

                            

                        </form>


                        </div>
                
                    </div>
                
                </div>
        
            </div>

        </div>
    
        
    </form>
    
</div>
    
<?php

$cargarParto = new ControladorIngresos;

$cargarParto -> ctrNuevoParto();

?>

