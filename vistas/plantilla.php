<?php

    session_start();

?>


<!DOCTYPE html>
<html lang="es"> 
<head>
  
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Sistema Control de Informes</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="icon" href="vistas/img/plantilla/itai.ico">

  <!-- ===================== Plugins de CSS ======================== -->

    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="vistas/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="vistas/bower_components/Ionicons/css/ionicons.min.css">
  <!-- devicon -->
  <link rel="stylesheet" href="https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="vistas/dist/css/AdminLTE.css">
  <!-- AdminLTE Skins. -->
  <link rel="stylesheet" href="vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- DataTables -->
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="vistas/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">


  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="vistas/plugins/iCheck/all.css">

  <!-- ===================== Plugins de JAVASCRIPT ======================== -->
  
<!-- jQuery 3 -->
<script src="vistas/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="vistas/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="vistas/dist/js/adminlte.min.js"></script>
</head>
<!-- DataTables -->
<script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>

<script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>

<script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

<script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script> 

<!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>

<!-- bootstrap datepicker -->
<script src="vistas/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

<!-- iCheck 1.0.1 -->
<script src="vistas/plugins/iCheck/icheck.min.js"></script>

<!-- ChartJS http://www.chartjs.org/-->
<script src="vistas/bower_components/Chart.js/Chart.js"></script>
<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/pie.js"></script>
<script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
<link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>



  <!-- ====================== CUERPO DEL DOCUMENTO  ======================== -->

<body class="hold-transition skin-blue sidebar-collapse sidebar-mini login-page">

        <!-- ========================== WRAPPER =============================== -->

      <?php   

        if(isset ($_SESSION["iniciarSesionInformes"]) && $_SESSION["iniciarSesionInformes"]  == "ok")
        {

          echo '<div class="wrapper">';

                  /*====== CABEZOTE O ENCABEZADO ======*/

                  include "modulos/cabezote.php";

                  /*============== MENU ===============*/   
            
                  include "modulos/menu.php";

                  /*=========== INICIO =============*/  

                  if (isset($_GET["ruta"])){

                      if($_GET["ruta"] == "dashboard" ||
                         $_GET["ruta"] == "inicio" ||
                         $_GET["ruta"] == "usuarios" ||
                         $_GET["ruta"] == "solicitudes-informacion" ||
                         $_GET["ruta"] == "solicitudes-arco" || 
                         $_GET["ruta"] == "capacitaciones" ||  
                         $_GET["ruta"] == "categorias" ||
                         $_GET["ruta"] == "productos" ||
                         $_GET["ruta"] == "clientes" || 
                         $_GET["ruta"] == "ventas" ||
                         $_GET["ruta"] == "crear-venta" ||
                         $_GET["ruta"] == "reportes" ||
                         $_GET["ruta"] == "salirsesion" ){

                          include "modulos/".$_GET["ruta"].".php";

                  } else {

                      include "modulos/404.php";

                         }

                  } else {

                      include "modulos/inicio.php";

                         }

                /*============= FOOTER ==============*/ 

                 include "modulos/footer.php";

          echo '</div>';

        }else{

          include "modulos/login.php";

        }  

      ?>

        <!-- ========================= END WRAPPER ================================ -->

    <!-- AQUÍ PONEMOS LOS SCRIPT DE JAVASCRIPT -->

    <script src="vistas/js/plantilla.js"></script>
    <script  src="vistas/js/usuarios.js" ></script>
    <script src="vistas/js/solicitudes_informacion.js"></script>

</body>
</html>
