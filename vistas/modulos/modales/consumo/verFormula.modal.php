
<div id="ventanaModalVerFormula" class="modal fade" role="dialog">

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

                                <label for="nombreFormulaVer">Nombre:</label>

                                <input type="text" id="nombreFormulaVer" class="form-control" readOnly>

                            </div>

                        </div>

                        <div class="col-xs-6 col-lg-6">

                            <div class="form-group">

                                <label for="formulaAnimalVer">Animal:</label>

                                <input id="formulaAnimalVer" class="form-control" readOnly>

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
                        
                    <div id="inputsContainerVer">

                    </div>
                    
                    <br>
    
                    <div class="row">

                        <div class="col-xs-4 col-lg-4">
                            
                            <strong style="font-size:1.5em;">Totales</strong>

                        </div>

                        <div class="col-xs-3 col-lg-3">

                            <div class="input-group">

                                <span class="input-group-addon">Kg</span>

                                <input type="number" class="form-control" id="kgTotalVer" readOnly>

                            </div>

                        </div>

                        <div class="col-xs-3 col-lg-3">

                        <div class="input-group">
                                
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>

                                <input type="number" class="form-control" id="precioTotalVer" readOnly>

                            </div>

                        </div>

                    </div>

                </form>
                
                </div>

            </div>  

        </div>

    </div> 

</div>

</div>
