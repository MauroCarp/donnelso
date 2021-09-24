<?php

include('../controladores/proveedores.controlador.php');
include('../modelos/proveedores.modelo.php');

$tabla = $_POST['tabla'];

$proveedores = ControladorProveedores::ctrMostrarProveedores();

foreach($proveedores as $key => $proveedor){

  echo "<option value='".$proveedor[0]."'>".$proveedor[0]."</option>";

}

echo '<option value="otroProvCompra">Otro</option>';


?>
