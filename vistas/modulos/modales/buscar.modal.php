
<div id="ventanaModalBuscar" class="modal fade" role="dialog">
  
        <div class="modal-dialog">

            <div class="modal-content"  style="left:0px">

                <div class="modal-header" style="background:#3c8dbc; color:white">

                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                
                    <h4 class="modal-title"><b>Animal</b></h4>

                </div>

                <div class='modal-body' style='padding-bottom:0px;'>

                    <div class='box-body'>
                        
                        <div class='box-header with-border'>    

                                <div class='row'>
                                    
                                    <div class="col-lg-12">
                                    
                                            <label for="animalBuscar">Animal:</label><br>
                    
                                            <label style="font-size:2em;">
                                                <input type="radio" name="animalBuscar" class="hide" value="cerdo" checked/>
                                                <i class="icon icon-cerdo"></i>
                                            </label>
                    
                                            <label style="font-size:2em;">
                                                <input type="radio" name="animalBuscar" class="hide" value="chivo"/>
                                                <i class="icon icon-chivo"></i>
                                            </label>
                    
                                            <label style="font-size:2em;">
                                                <input type="radio" name="animalBuscar" class="hide" value="ovino"/>
                                                <i class="icon icon-cordero"></i>
                                            </label>
                                          
                                            <label style="font-size:2em;">
                                                <input type="radio" name="animalBuscar" class="hide" value="vaca"/>
                                                <i class="icon icon-vaca"></i>
                                            </label>
                                    
                                    </div>
                                
                                    <div class="col-lg-12">
                                    
                                        <div class="form-group" id="inputCaravanaBuscar">

                                            <label for="caravanaBuscar">N° Caravana</label>
                                        
                                            <select class="form-control" id="caravanaBuscar" name="caravanaBuscar" required>  
                                            </select>

                                        </div>

                                    </div>
                                                            
                                    <div class="col-lg-12">
                                        
                                        <button class="btn btn-primary btn-block" id="btnBuscarAnimal">Buscar</button>

                                    </div>

                                </div> 

                        </div>

                    </div>  

                </div>

                <?php

                    include "verAnimal.modal.php"

                ?>

            </div> 

        </div>

</div>
    
<?php

$editarAnimal = new ControladorAnimales();

$editarAnimal -> ctrEditarAnimal();

?>

