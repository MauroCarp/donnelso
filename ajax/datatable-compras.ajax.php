<?php

require_once "../controladores/ingresos.controlador.php";
require_once "../modelos/ingresos.modelo.php";

class TablaCompras{

    public function mostrarTablaCompras(){

        $item = NULL;
        $valor = NULL;
        $orden = 'fecha';

        $compras = ControladorIngresos::ctrMostrarCompras($item,$valor,$orden);

        // if(count($compras == 0)){

        //     echo '{"data": []}';

        //     return;
        // }	
                
        $datosJson = array();

        $datosJson['data'] = array();

            for ($i=0; $i < sizeof($compras) ; $i++) { 

                $fecha = strtotime($compras[$i]['fecha']);

                $fecha = date('d-m-Y',$fecha);

                $boton = "<button class='btn btn-danger btnEliminarCompra btn-no-margintop' idCompra='".$compras[$i]['idCompra']."'><i class='fa fa-times'></i></button>";

                $datosJson['data'][$i][] = $fecha;
                $datosJson['data'][$i][] = ucfirst($compras[$i]["tipo"]);
                $datosJson['data'][$i][] = $compras[$i]["proveedor"];
                $datosJson['data'][$i][] = $compras[$i]["cantidad"];
                $datosJson['data'][$i][] = $compras[$i]["pesoTotal"].' Kg';
                $datosJson['data'][$i][] = '$ '.$compras[$i]["precioTotal"];
                $datosJson['data'][$i][] = $boton;

            }
  
            $datosJson = json_encode($datosJson);

          echo $datosJson;
  

    }

}

$mostrarTablaCompras = new TablaCompras();
$mostrarTablaCompras -> mostrarTablaCompras();

