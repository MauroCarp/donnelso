<?php

session_start();

function formatearFecha($fecha){
  $fecha = explode('-',$fecha);
  $nuevaFecha = $fecha[2]."-".$fecha[1]."-".$fecha[0];
  return $nuevaFecha;
}

?>
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Establecimiento Don Nelso</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/icono-negro.png">
  
  <link rel="manifest" href="manifest.json">

  <!-- ANDROID -->
  <meta name="theme-color" content="#06820B">
    <!--========================
   =============
  PLUGINS DE CSS
  ======================================-->

  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
 
  <!-- ESTILOS PERSONALES -->
  <link rel="stylesheet" href="vistas/dist/css/style.css">

  <!-- Icomoon -->
  <link rel="stylesheet" href="vistas/bower_components/icomoon/css/icomoon.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

   <!-- Daterange picker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- Morris chart -->
  <link rel="stylesheet" href="vistas/bower_components/morris.js/morris.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/dist/sweetalert2.all.js"></script>
   <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

  <!-- iCheck 1.0.1 -->
  <script src="vistas/plugins/iCheck/icheck.min.js"></script>

  <!-- InputMask -->
  <script src="vistas/plugins/input-mask/jquery.inputmask.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
  <script src="vistas/plugins/input-mask/jquery.inputmask.extensions.js"></script>

  <!-- jQuery Number -->
  <script src="vistas/plugins/jqueryNumber/jquerynumber.min.js"></script>

  <!-- daterangepicker http://www.daterangepicker.com/-->
  <script src="vistas/bower_components/moment/min/moment.min.js"></script>
  <script src="vistas/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>

  <!-- Morris.js charts http://morrisjs.github.io/morris.js/-->
  <script src="vistas/bower_components/raphael/raphael.min.js"></script>
  <script src="vistas/bower_components/morris.js/morris.min.js"></script>

  <!-- ChartJS http://www.chartjs.org/-->
  <script src="vistas/bower_components/chart.js/Chart.js"></script>

  
  <!-- ChartJS LABELS https://github.com/emn178/chartjs-plugin-labels/-->
  <script src="vistas/bower_components/chart/Chart.bundle.js"></script>

  <script src="vistas/bower_components/chart/utils.js"></script>

  <script src="vistas/bower_components/chart/chartjs-plugin-labels.min.js"></script>

  <style>
  
    @media all {
      div.saltopagina{
        display: none;
        }
    }
    
    @media print{
      div.saltopagina{
          display:block;
          page-break-before:always;
      }
    }

  </style>
</head>

<!--=====================================
CUERPO DOCUMENTO
======================================-->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">
      
  <?php

  if(isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok"){

   echo '<div class="wrapper" id="app">';

    /*=============================================
    CABEZOTE
    =============================================*/

    include "modulos/cabezote.php";

    /*=============================================
    MENU
    =============================================*/

    include "modulos/menu.php";


    /*=============================================
    CONTENIDO
    =============================================*/

    if(isset($_GET["ruta"])){

      if($_GET["ruta"] == "inicio" ||
         $_GET["ruta"] == "registrosCompras" ||
         $_GET["ruta"] == "servicios" ||
         $_GET["ruta"] == "registroServicios" ||
         $_GET["ruta"] == "pre-ventas" ||
         $_GET["ruta"] == "ventas" ||
         $_GET["ruta"] == "engorde" ||
         $_GET["ruta"] == "sanidad" ||
         $_GET["ruta"] == "consumo" ||
         $_GET["ruta"] == "chazinados" ||
         $_GET["ruta"] == "muertes" ||
         $_GET["ruta"] == "usuarios" ||
         $_GET["ruta"] == "salir"){

        include "modulos/".$_GET["ruta"].".php";

      }else{

        include "modulos/404.php";

      }

    }else{

      include "modulos/inicio.php";

    }

    /*=============================================
    FOOTER
    =============================================*/

    include "modulos/footer.php";

    echo '</div>';

  }else{

    include "modulos/login.php";

  }

  ?>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>

<script>

  Vue.component('cajas-superiores',{
    
    data: function (){
      
      return{
        cajasSuperiores: [
        
        {tipo:'Lechones',idCantidad: 'cantidadCerdo',icono: 
        'icon-cerdo', numeroCantidad: 23,numeroPrecio: 450,idPrecio: 'precioKgCerdo'},
        
        {tipo:'Chivos',idCantidad: 'cantidadChivo',icono: 
        'icon-chivo', numeroCantidad: 12,numeroPrecio: 450,idPrecio: 'precioKgChivo'},
        
        {tipo:'Corderos',idCantidad: 'cantidadCordero',icono: 
        'icon-cordero', numeroCantidad: 14,numeroPrecio: 450,idPrecio: 'precioKgCordero'},
        
        {tipo:'Pollos',idCantidad: 'cantidadPollo',icono: 
        'icon-pollo', numeroCantidad: 23,numeroPrecio: 450,idPrecio: 'precioKgPollo'},
        
        {tipo:'Vacas',idCantidad: 'cantidadVaca',icono: 
        'icon-vaca', numeroCantidad: 22,numeroPrecio: 450,idPrecio: 'precioKgVaca'},
        ]
    
      }
    
    },
    template: `
      <div class="row">
      
        <caja-superior
          v-for="(animal, index) in cajasSuperiores" 
          :key="index" 
          :tipo="animal.tipo"
          :idCantidad="animal.idCantidad"
          :icono="animal.icono"
          :numeroCantidad="animal.numeroCantidad"
          :numeroPrecio="animal.numeroPrecio"
          :idPrecio="animal.idPrecio">

        </caja-superior>
      
      </div>
    `

  })

  Vue.component('caja-superior',{

    props:{
      tipo: String,
      idCantidad: String,
      idPrecio: String,
      numeroCantidad: Number,
      numeroPrecio: Number,
      icono: String,
    },
    template: `
    <div  class="col-lg-2 col-xs-6">

      <div class="small-box bg-green">
        
        <div class="inner">
          
          <p style="font-size:150%;font-weight:bold;">{{ tipo }}<br>
            <strong><span :id="idCantidad" style="font-size:1.3em;">{{numeroCantidad}}</span></strong> <br>
            $ <span :id="idPrecio" style="font-size:.8em;">{{numeroPrecio}}</span> /Kg
          </p>

        </div>
        
        <div class="icon">
          
          <i :class="icono"></i>
        
        </div>

      </div>
    
    </div>
    `

  })

  Vue.component('stock-chazinados',{
    
    data: function (){
      
      return{
        stockChazinados: [
        
        {tipo:'Salames',idCantidad: 'stockSalames',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgSalame'},

        {tipo:'Chorizos',idCantidad: 'stockChorizos',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgChorizo'},

        {tipo:'Morcillas',idCantidad: 'stockMorcillas',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgMorcilla'},

        {tipo:'Bondiola',idCantidad: 'stockBondiola',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgBondiola'},

        {tipo:'Jamon',idCantidad: 'stockJamon',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgJamon'},

        {tipo:'Codeguines',idCantidad: 'stockCodeguines',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgCodeguin'},

        {tipo:'Grasa',idCantidad: 'stockGrasa',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgGrasa'},

        {tipo:'Chicharron',idCantidad: 'stockChicharron',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgChicharron'},

        {tipo:'Carne',idCantidad: 'stockCarne',icono: 
        '', numeroCantidad: '22 Kg',numeroPrecio: 450,idPrecio: 'precioKgCarne'},
        ]
    
      }
    
    },
    template: `
      <div class="row">
      
        <caja-StockChazinados
          v-for="(animal, index) in stockChazinados" 
          :key="index" 
          :tipo="animal.tipo"
          :idCantidad="animal.idCantidad"
          :icono="animal.icono"
          :numeroCantidad="animal.numeroCantidad"
          :numeroPrecio="animal.numeroPrecio"
          :idPrecio="animal.idPrecio">

          </caja-StockChazinados>
      
      </div>
    `

  })

  Vue.component('caja-StockChazinados',{

    props:{
      tipo: String,
      idCantidad: String,
      idPrecio: String,
      numeroCantidad: String,
      numeroPrecio: Number,
      icono: String,
    },
    template: `
    <div  class="col-lg-4 col-xs-6">

      <div class="small-box bg-green">
        
        <div class="inner">
          
          <p style="font-size:150%;font-weight:bold;">{{ tipo }}<br>
            <strong><span :id="idCantidad" style="font-size:1.3em;">{{numeroCantidad}}</span></strong> <br>
            $ <span :id="idPrecio" style="font-size:.8em;">{{numeroPrecio}}</span> /Kg
          </p>

        </div>
        
        <div class="icon">
          
          <i :class="icono"></i>
        
        </div>

      </div>
    
    </div>
    `

  })


  const app = new Vue({
    el:'#app',
    data:{
      btnPrincipales:[
        {titulo: 'Pre-Venta',href:'#ventanaModalPreVenta',modal:true},
        {titulo: 'Venta',href:'pre-ventas',modal:false},
        {titulo: 'Parto',href:'#ventanaModalParto',modal:true},
        {titulo: 'Ingreso',href:'#ventanaModalCompra',modal:true},
        {titulo: 'Servicios',href:'#ventanaModalServicios',modal:true},
        {titulo: 'Engorde',href:'engorde',modal:false},
        {titulo: 'Sanidad',href:'sanidad',modal:false},
        {titulo: 'Faenar',href:'#ventanaModalFaenar',modal:true},
        {titulo: 'Chazinados',href:'#ventanaModalChazinado',modal:true},
        {titulo: 'Stock Chazinados',href:'#ventanaModalStockChazinados',modal:true},
        {titulo: 'Consumo',href:'consumo',modal:false},
        {titulo: 'Muertes',href:'#ventanaModalMuertes',modal:true},
      ]

    
    }
  });

</script>

<script src="vistas/js/app.js"></script>
<script src="vistas/js/plantilla.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/ventas.js"></script>
<script src="vistas/js/reportes.js"></script>
<script src="vistas/js/archivos.js"></script>
<script src="vistas/js/ingresos.js"></script>
<script src="vistas/js/faenar.js"></script>
<script src="vistas/js/servicios.js"></script>
<script src="vistas/js/chazinados.js"></script>
<script src="vistas/js/sanidad.js"></script>
<script src="vistas/js/consumo.js"></script>
<script src="vistas/js/racionesStock.js"></script>
<script src="vistas/js/precios.js"></script>
<script src="vistas/js/engorde.js"></script>
<script src="vistas/js/muertes.js"></script>

</body>
</html>
