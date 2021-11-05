
<div class='box-body'  style="display:none" id="ventanaModalVerAnimal">
    
    <div class='box-header with-border'>    
            
        <div class="box box-widget widget-user">


            <div class="widget-user-header bg-aqua-active" align="center">

                <i class="img-circle icon-cerdo" style="font-size:5.5em;color:#006E8C;"></i>
            
            </div>


            <div class="box-footer">

                <div class="row">

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Caravana</h5>

                            <input type="text" class="form-control description-text" id="caravanaBuscada"  readOnly>    
                            <input type="hidden" id="idAnimalBuscada">
                        </div>
            
                    </div>

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Edad</h5>

                            <input type="text" class="form-control description-text" id="edadBuscada" readOnly>    

                        </div>
            
                    </div>

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Sexo</h5>

                            <div class="form-group" align="left">
                                    
                                <input type="radio" id="sexoMacho" name="sexoBuscada" checked value="M" style="height:20px;width:20px;" disabled><b>&nbsp;Macho</b><br>
                                <input type="radio" id="sexoHembra" name="sexoBuscada" value="H" style="height:20px;width:20px;" disabled><b>&nbsp;Hembra</b>
                                                                    
                            </div>

                        </div>

                    </div>

                    <div class="col-sm-3">

                        <div class="description-block">

                            <h5 class="description-header">Proveedor</h5>

                            <span class="description-text"><button class="btn btn-default btn-no-margintop" id="btnProveedor" data-toggle="modal" data-target="#ventanaModalProveedorBuscar">Propio</button></span>
    
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Destino</h5>

                            <span class="description-text"><button class="btn btn-default btn-no-margintop" id="btnDestinoBuscar" data-toggle="modal" data-target="#ventanaModalDestinoBuscar">Reproductor</button></span>

                        </div>
            
                    </div>

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Sanidad</h5>

                            <span class="description-text"><button class="btn btn-default btn-no-margintop" id="btnSanidadBuscar" data-toggle="modal" data-target="#ventanaModalSanidadBuscar">Sanidad</button></span>

                        </div>

                    </div>

                    <div class="col-sm-3 border-right">

                        <div class="description-block">

                            <h5 class="description-header">Estado</h5>

                            <select name="estadoBuscar" id="estadoBuscar" class="form-control" readOnly>
                            </select>

                        </div>

                    </div>

                    <div class="col-sm-3">

                        <div class="description-block">

                            <h5 class="description-header">Complicacion</h5>

                            <textarea name="complicacionBuscar" id="complicacionBuscar" cols="10" rows="3" disabled="true"></textarea>
    
                        </div>

                    </div>

                </div>

                <div class="row">

                    <div class="col-sm-9">
                    </div>
                    <div class="col-sm-3">

                        <button class="btn btn-warning" id="activarEdicion">Activar Edici&oacute;n</button>
                        <button class="btn btn-success" id="editarAnimal"  name="editarAnimal" style="display:none">Editar Animal</button>

                    </div>

            </div>

            </div>

        </div> 

    </div>

</div>
