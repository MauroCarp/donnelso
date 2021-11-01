
<div id="ventanaModalEditarFormula" class="modal fade" role="dialog">

<div class="modal-dialog">

    <div class="modal-content"  style="left:0px">

        <div class="modal-header" style="background:#3c8dbc; color:white">

            <button type="button" class="close" data-dismiss="modal">&times;</button>

        
            <h4 class="modal-title"><b>Editar Formula</b></h4>

        </div>

        <div class='modal-body' style='padding-bottom:0px;'>

            <div class='box-body'>
                
                <div class='box-header with-border'>   

                <form method="post">

                    <div class="row">
                        
                    <div class="col-xs-6 col-lg-6">

                        <div class="form-group">

                            <label for="nombreFormulaEditar">Nombre:</label>

                            <input type="text" name="nombreFormulaEditar" id="nombreFormulaEditar" class="form-control" required>

                        </div>

                    </div>

                    <div class="col-xs-6 col-lg-6">

                        <div class="form-group">

                        <label for="formulaAnimal">Animal:</label>

                        <select name="formulaAnimal" id="formulaAnimal" class="form-control">
                            <option value="Cerdo">Cerdo</option>
                            <option value="Ovinos">Ovinos</option>
                            <option value="Pollos">Pollos</option>
                            <option value="Vacas">Vacas</option>
                        </select>

                        </div>

                    </div>

                    </div>
                    
                    <div class="row">
                        
                        <div class="col-xs-4 col-lg-4">
                        
                            <b>Insumo</b>
                        
                        </div>
                        
                        <div class="col-xs-4 col-lg-4">
                        
                            <b>Kg</b>
                        
                        </div>

                        <div class="col-xs-4 col-lg-4">
                        
                            <b>$ Kg</b>
                        
                        </div>
                    
                    </div>
                        
                    <div id="inputsContainerEditar">


                        <div class="row" >

                            <div class="col-xs-4 col-lg-4">

                                <select name="insumoEditar[]" id="insumoEditar0" class="form-control insumosEditar" onchange='habilitarKgInsumos(this.id,this.value)'>
                                    
                                <?php
                                
                                    $item = NULL;

                                    $valor = NULL;

                                    $resultado = ControladorConsumo::ctrMostrarInsumo($item,$valor);
                                    
                                    echo "<option value=''>Seleccionar Insumo</option>";

                                    for ($i=0; $i < sizeof($resultado) ; $i++) { 

                                        echo "<option value='".$resultado[$i]['nombre']."'>".$resultado[$i]['nombre']."</option>";

                                    }
                            
                                ?>
                                </select>
                                
                            </div>


                            <div class="col-xs-3 col-lg-3">

                                <input type="number" class="form-control kgInsumoEditar" id="kgInsumoEditar0" name="kgInsumoEditar[]" onchange="calcularDatos(this.id,this.value,'Editar')" value="0">

                            </div>

                            <div class="col-xs-3 col-lg-3">

                                <!-- <input type="number" class="form-control preciosInsumosEditar" id="precioInsumoEditar0" name="precioInsumoEditar[]" readOnly> -->

                            </div>
                        
                        </div>
                    
                    </div>
                    
                    <br>
    
                    <div class="row">

                        <div class="col-xs-4 col-lg-4">
                            
                            <strong style="font-size:1.5em;">Totales</strong>

                        </div>

                        <div class="col-xs-3 col-lg-3">

                            <div class="input-group">

                                <span class="input-group-addon">Kg</span>

                                <input type="number" class="form-control" id="kgTotalEditar" name="KgTotalEditar" value="0" readOnly>

                            </div>

                        </div>

                        <div class="col-xs-3 col-lg-3">

                        <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                                <input type="number" class="form-control" id="precioTotalEditar" name="PrecioTotalEditar" value="0" readOnly>

                            </div>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-xs-2">
                        
                            <button class="btn btn-primary" type="button" onClick="agregarInput('inputsContainerEditar','Editar')"><i class="fa fa-plus"></i></button>

                        </div>

                    </div>

                    <div class="row">

                        <div class="col-lg-12">

                            <button class="btn btn-primary btn-block" id="btnSanidad">Editar Formula</button>
                            
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

// $editarFormula = new ControladorConsumo;
// $editarFormula -> ctrnuevaFormula();

?>

        
