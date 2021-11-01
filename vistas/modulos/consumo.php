<?php

  
?>
<div class="content-wrapper">

    <section class="content-header">

        <h1>Consumo</h1>

        <ol class="breadcrumb">

            <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Consumo</li>

        </ol>

        <br>

        <div class="row">

            <div class="col-md-12">

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
            
                <li role="presentation" class="active"><a href="#insumosFormulas" id="tabInsumosFormulas" aria-controls="insumosFormulas" role="tab" data-toggle="tab">Insumos / Formulas</a></li>
            
                <li role="presentation"><a href="#racionesStock" id="tabRacionesStock" aria-controls="racionesStock" role="tab" data-toggle="tab">Raciones / Stock</a></li>
            
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
    
                    <div role="tabpane2" class="tab-pane active" id="insumosFormulas"><?php include "tablas/consumo/insumosFormulas.tabla.php";?></div>   
                    
                    <div role="tabpane2" class="tab-pane" id="racionesStock"><?php include "tablas/consumo/racionesStock.tabla.php";?></div>
                    
            </div>

            </div> 

        </div> 

    </section>


</div> 

<?php

include "modales/consumo/agregarFormula.modal.php";

// include "modales/consumo/editarFormula.modal.php";

include "modales/consumo/verFormula.modal.php";

include "modales/consumo/agregarRacion.modal.php";

?>
