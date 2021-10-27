<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/ingresos.controlador.php";
require_once "controladores/consumo.controlador.php";
require_once "controladores/proveedores.controlador.php";
require_once "controladores/ventas.controlador.php";
require_once "controladores/precios.controlador.php";
require_once "controladores/stock.controlador.php";
require_once "controladores/sanidad.controlador.php";
require_once "controladores/servicios.controlador.php";
require_once "controladores/animales.controlador.php";
require_once "controladores/muertes.controlador.php";
require_once "controladores/chazinados.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/ingresos.modelo.php";
require_once "modelos/consumo.modelo.php";
require_once "modelos/proveedores.modelo.php";
require_once "modelos/ventas.modelo.php";
require_once "modelos/precios.modelo.php";
require_once "modelos/stock.modelo.php";
require_once "modelos/sanidad.modelo.php";
require_once "modelos/servicios.modelo.php";
require_once "modelos/animales.modelo.php";
require_once "modelos/muertes.modelo.php";
require_once "modelos/chazinados.modelo.php";
require_once "extensiones/vendor/autoload.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();