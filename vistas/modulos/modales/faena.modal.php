
<div id="ventanaModalFaenar" class="modal fade" role="dialog">

    <div class="modal-dialog">

        <div class="modal-content"  style="left:0px">

            <div class="modal-header" style="background:#3c8dbc; color:white">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

            
                <h4 class="modal-title"><b>Faenar</b></h4>

            </div>

            <div class='modal-body' style='padding-bottom:0px;'>

                <div class='box-body'>
                    
                    <div class='box-header with-border'>    
        
                        <div class='row'>
                            
                            <div class="col-lg-12">
                            
                                    <label for="animalFaenar">Animal:</label><br>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animalFaenar" class="hide" value="cerdo" checked/>
                                        <i class="icon icon-cerdo"></i>
                                    </label>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animalFaenar" class="hide" value="chivo"/>
                                        <i class="icon icon-chivo"></i>
                                    </label>
            
                                    <label style="font-size:2em;">
                                        <input type="radio" name="animalFaenar" class="hide" value="cordero"/>
                                        <i class="icon icon-cordero"></i>
                                    </label>

                                    <label style="font-size:2em;">
                                        <input type="radio" name="animalFaenar" class="hide" value="vaca"/>
                                        <i class="icon icon-vaca"></i>
                                    </label>

                                    <label style="font-size:2em;">
                                        <input type="radio" name="animalFaenar" class="hide" value="pollo"/>
                                        <i class="icon icon-pollo"></i>
                                    </label>
                            
                            </div>

                        </div> 
                       
                        <div class="row">

                            <div class="col-xs-12 col-lg-6">

                                <div class="form-group">
                                
                                    <label for="fechaFaenar">Fecha:</label>
                                    
                                    <input type="date" name="fechaFaenar" id="fechaFaenar" class="form-control">
                                    
                                </div>
                                
                            </div>

                            <div class="col-xs-12 col-lg-6" id="cantidadFaenarPolloInput" style="display:none;">
                                
                                <div class="form-group">
                                
                                    <label for="cantidadFaenarPollo">Cantidad:</label>
                                
                                    <input type="number" id="cantidadFaenarPollo" class="form-control">
                                
                                </div>

                            </div>
                        
                        </div>

                        <div class="row" id="caravanaFaenarInput">
 
                            <div class="col-xs-12 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="faenaPropio">Propio: </label>
                                    <br>
                                    <input type="checkbox" id="faenaPropio" style="height:20px;width:20px" checked>
                                
                                </div>
    
                            </div>


                            <div class="col-xs-12 col-lg-6" id="inputCaravanaFaenar">
                                    
                                <div class="form-group">
                                
                                    <label for="caravanaFaenar">N° Caravana:</label>
                                
                                    <input type="text" id="caravanaFaenar" class="form-control">
                                
                                </div>

                            </div>
                            
                        </div>
                        
                        <div class="row">

                            <div class="col-xs-12 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="kgVivoFaenar">Kg Vivo:</label>
                                
                                    <input type="number" step="0.01" id="kgVivoFaenar" class="form-control">
                                
                                </div>

                            </div>
                        
                            <div class="col-xs-12 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="kgLimpioFaenar">Kg Limpio:</label>
                                
                                    <input type="number" step="0.01" id="kgLimpioFaenar" class="form-control">
                                
                                </div>

                            </div>   
                            
                        </div>
                        
                        <div class="row">

                            <div class="col-xs-8 col-lg-6">
                                
                                <div class="form-group">
                                
                                    <label for="lugarFaenar">Lugar: </label>
                                    
                                    <select id="lugarFaenar" class="form-control">

                                        <option value="Campo">Campo</option>
                                        <option value="Matadero">Matadero</option>

                                    </select>
                                
                                </div>
    
                            </div>

                        </div>
                         

                        <div class="row">

                            <div class="col-lg-12">
                                
                                <button class="btn btn-primary btn-block" id="brnIngresarCompra">Ingresar</button>

                            </div>
                        
                        </div>

                    </div>

                </div>  

            </div>

        </div> 

    </div>

</div>


            

