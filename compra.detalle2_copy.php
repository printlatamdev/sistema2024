<?
session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];

?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 2020 backup</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="indes/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="indes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="indes/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="indes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="indes/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="indes/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
  <!-- ESTEEE -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>

  <!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
  <!-- ESTEEE -->
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>


  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->

  <!-- Theme style -->
  <script src="indes/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="indes/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="indes/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="indes/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="indes/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="indes/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="indes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="indes/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="indes/plugins/moment/moment.min.js"></script>
  <script src="indes/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="indes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="indes/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="indes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="indes/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="indes/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="indes/dist/js/demo.js"></script>


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />


  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGIN STYLES -->
  <!-- BEGIN PAGE STYLES -->
  <link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />






  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>




  <SCRIPT language=Javascript>
    function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode == 32) {
        return true;
      } else {
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      }


      return true;
    }
  </SCRIPT>


  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">





  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



  <?
  if (trim($pruebaget) == false) { ?>



  <?
  } else { ?>
    <script type="text/javascript">
      $(function() {
        $("#anuncio").modal();
      });
    </script>



  <? }

  ?>

  <script>
    $(function() {

      $(".fancyOther").fancybox({
        width: '100%',
        height: '100%',
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
      });
    });
  </script>





  <style>
    .content {
      margin-top: 80px;
    }
  </style>



  <style type="text/css">
    .zeroPadding {
      padding: 0 !important;
    }
  </style>


  <style>
    input[type="number"] {
      width: 100px;
    }






    .divTableHeading {
      background-color: #EEE;
      display: table-header-group;
      font-weight: bold;
    }

    .divTableFoot {
      background-color: #EEE;
      display: table-footer-group;
      font-weight: bold;
    }

    .divTableBody {
      display: table-row-group;
    }




    /*---------------------------------*/

    #sample_5 {
      border-style: solid;
      border-width: 1px;
      border-color: black;
    }


    #maintd {

      border-bottom: 1px solid #000000;
      border-right: 1px solid #000000;
    }

    #maintd2 {
      border-top: 1px solid #000000;
    }


    #maintd3 {
      border-bottom: 1px solid #000000;
    }

    #maintd4 {
      border-left: 1px solid #000000;
    }

    #maintd5 {
      border-left: 1px solid #000000;
      border-bottom: 1px solid #000000;
    }

    #maintd6 {
      border-top: 1px solid #000000;
      border-left: 1px solid #000000;
    }

    .dfs {
      background-color: #d3d3d3 !important;
    }

    /* Let's get this party started */
    ::-webkit-scrollbar {
      width: 12px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      -webkit-border-radius: 10px;
      border-radius: 10px;
      background: rgba(​192, 192, 192, 0.3);
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    ::-webkit-scrollbar-thumb:window-inactive {
      background: rgba(​192, 192, 192, 0.3);
    }



    /*------------------------------------------*/





    #fms {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fmsd1 {

      /* height: 110px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd2 {

      /*height: 170px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd3 {

      /*height: 60px;*/
      /* border-bottom: thin solid #000000;  */
    }



    #fms3 {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fms0 {

      display: flex;

    }


    .dataTables_filter input {
      width: 100px !important
    }



    body {


      background-color: "#ffffff" !important;

    }


    /*------------------------------------------*/





    #fmsp {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fmsd1p {

      /* height: 110px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd2p {

      /*height: 170px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd3p {

      /*height: 60px;*/
      /* border-bottom: thin solid #000000;  */
    }



    #fms3p {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fms0p {

      display: flex;

    }

    /*------------------------------------------*/
  </style>


  <style type="text/css" media="screen">
    a:link {
      color: #000000;
      text-decoration: none;
    }

    a:visited {
      color: #000000;
      text-decoration: none;
    }

    a:hover {
      color: #000000;
      text-decoration: none;
    }

    a:active {
      color: #000000;
      text-decoration: underline;
    }
  </style>





</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%" width="150">
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="images/logo_color.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><? echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">


      <div class="container">

        <!--pegar codigo-->

        <div class="row">






        </div>

      </div>












      <!-- *************************************************************************************************************************************** -->

      <?
      // *********************************************************************************************************************************** //

      if (isset($_REQUEST["compra"])) {

        if($base == "esa"){
          include("suministros/connect.php");
        }else{
          include("suministros/connect2.php");
        }

        $compra = $_REQUEST["compra"];

        $rs_en = $mysqli->query("SELECT * FROM compra WHERE id_compra='" . $compra . "'");
        while ($fila_en = $rs_en->fetch_assoc()) {
          $id_empresa = $fila_en["id_empresa"];
          $empresa = $fila_en["empresa"];
          $solicita = $fila_en["solicita"];
          $fecha = $fila_en["fecha"];
          $op = $fila_en["op"];
        }

        $mysqli->close();
      }


      // *********************************************************************************************************************************** //



      ?>


      <div class="col-md-10">

        <div id="contenedor3" class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class=" icon-book-open font-green-sunglo"></i> Orden Compra # <label id="orden_color"><?= $compra ?></label>&nbsp;&nbsp;&nbsp;
              <a href="compra.editar.cabecera2.php?compra=<?= $compra ?>">
                <font color="white">Editar Cabecera</font>
              </a>
            </div>

          </div>




          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form id="fomr4" method="post" action="#" class="form-horizontal">
              <div class="form-body">



                <!--/row-->
                <div class="row">
                  <div class="col-md-10">


                    <div class="form-group">

                      <div class="col-md-5">
                        <label class="control-label"><strong>Proveedor:</strong></label>&nbsp;&nbsp; <label class="label1" id="cliente_color"><?= $empresa ?></label>




                      </div>


                      <div class="col-md-5">
                        <label class="control-label"><strong>Solicita:</strong></label>&nbsp;&nbsp;<label class="label1" id="vendedor_color"><?= $solicita ?></label>


                      </div>




                    </div>

                  </div>
                </div>
                <!--/row-->



                <!--/row-->
                <div class="row">
                  <div class="col-md-10">


                    <div class="form-group">

                      <div class="col-md-5">
                        <label class="control-label "><strong>Fecha:</strong></label>&nbsp;&nbsp;<label class="label1" id="fecha_color"><?= $fecha ?></label>



                      </div>


                      <div class="col-md-5">
                        <label class="control-label"><strong>OP:</strong></label>&nbsp;&nbsp;<label class="label1" id="vendedor_color"><?= $op ?></label>


                      </div>




                    </div>

                  </div>
                </div>
                <!--/row-->
























              </div>
            </form>
            <!-- END FORM-->

          </div>
        </div>


      </div>














      <!-- *************************************************************************************************************************************** -->





























































      <?
      // *********************************************************************************************************************************** //

      if (isset($_REQUEST["det"])) {

        if($base == "esa"){
          include("suministros/connect.php");
        }else{
          include("suministros/connect2.php");
        }

        $orden = $_REQUEST["orden"];
        $id_detalle = $_REQUEST["det"];

        $rs_m = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_detalle_cotizacion='" . $id_detalle . "' AND id_cotizacion='" . $orden . "'");

        while ($fila_m = $rs_m->fetch_assoc()) {

          $detalle = $fila_m["detalle"];
          $precio_unitario = $fila_m["precio"];
          $cantidad = $fila_m["cantidad"];
          $costo_total = $fila_m["costo_total"];
          $iva = $fila_m["iva"];
          $total_oferta = $fila_m["total_oferta"];
          $textarea = str_replace("<br>", "\n", $detalle);
        }

        $mysqli->close();
      }


      // *********************************************************************************************************************************** //



      ?>




      <div class="col-md-10">

        <!-- BEGIN SAMPLE FORM PORTLET-->
        <div id="contenedor2" class="portlet light bordered">
          <div class="portlet-title">
            <div class="caption font-green-sunglo">
              <i class="   icon-note font-green-sunglo"></i>
              Agregar Material
            </div>

            <div class="actions">
              <a href="#myModal_proveedor" role="button" class="btn green" data-toggle="modal">
                <i class="fa fa-database"></i> Crear Material</a>
            </div>

          </div>


          <div class="portlet-body form">

            <div class="form-body">

              <form id="form1" action="compra.sql_copy.php" method="post" role="form">

                <input type="hidden" name="bandera" value="2">
                <input type="hidden" name="compra" id="orden" value="<?= $compra ?>" />
                <input type="hidden" name="empresa" id="orden" value="<?= $empresa ?>" />
                <input type="hidden" name="id_empresa" id="orden" value="<?= $id_empresa ?>" />


                <div class="col-md-4">
                  <select id="material" name="material" class="select2_category form-control">
                    <?php

                      if($base == "esa"){
                        include("suministros/connect.php");
                      }else{
                        include("suministros/connect2.php");
                      }

                    if (isset($_REQUEST["actu"])) {
                      echo '<option selected value="' . $id_material . '_' . $material . '">' . $material . '</option>';
                    }

                    echo '<option value="0_Ninguno">Elija un Material</option>';

                    $rs = $mysqli->query("SELECT * FROM material WHERE estado='1' OR estado='3'");

                    while ($fila = $rs->fetch_row()) {
                      echo '<option value="' . $fila[0] . '_' . $fila[1] . '-' . $fila[2] . '">' . $fila[1] . '-' . $fila[2] . '</option>';
                    }

                    $mysqli->close();

                    ?>
                  </select>
                </div>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




                <input value="<?= $cantidad ?>" required size="2" type="number" name="cantidad" id="cantidad" step="any" min="0" placeholder="Cantidad" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                <input value="<?= $precio_unitario ?>" required size="2" type="number" name="precio_unitario" id="precio_unitario" step="any" min="0" placeholder="Precio" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                <input id='AddMaterial' type="submit" name="" value="Agregar" class="btn blue">
              </form>

              <br><br><br>

              <?
              if ($_SESSION['base'] == 'esa') {

              ?>
                <div class="tools">
                  <table border="0" width="45%" cellspacing="10">
                    <tr>
                      <td>
                        <form class="generar" name="form6" action="reportes/compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="iva" name="iva" value="13" />
                          <button id="genera" name="genera" type="submit" class="btn btn-danger btn-sm">Generar Orden</button>
                        </form>
                      </td>

                      <td>
                        <form class="generar" name="form6" action="reportes/compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="iva" name="iva" value="0" />
                          <button id="genera" name="genera" type="submit" class="btn btn-success btn-sm">Generar Orden Sin IVA</button>
                        </form>
                      </td>

                      <td>
                        <div class="mok">
                          <form class="generar2" name="form9" action="reportes/compra.imprimir.php" target="_blank" method="post">
                            <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                            <button type="submit" class="btn btn-success btn-sm">Imprimir Orden</button>
                          </form>
                        </div>
                      </td>
                    </tr>
                  </table>
                </div>
              <?

              } else {

              ?>
                <div class="tools">
                  <table border="0" width="40%" cellspacing="10">
                    <tr>
                      <td>
                        <form class="generar" name="form6" action="compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="moneda" name="moneda" value="dollar" />
                          <input type="hidden" id="iva" name="iva" value="15" />
                          <input type="checkbox" id="contactChoice1" name="ir" value="ir"><label for="contactChoice1"><b>IR</b></label>
                          <button id="genera" name="genera" type="submit" class="btn btn-danger btn-sm">Generar Orden Dolares</button>
                        </form>
                      </td>

                      <td>
                        <form class="generar" name="form6" action="compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="moneda" name="moneda" value="dollar" />
                          <input type="hidden" id="iva" name="iva" value="0" />
                          <input type="checkbox" id="contactChoice2" name="ir" value="ir"><label for="contactChoice2"><b>IR</b></label>
                          <button id="genera" name="genera" type="submit" class="btn btn-success btn-sm">Dolares Sin IVA</button>
                        </form>
                      </td>

                    </tr>
                  </table>

                  <br>

                  <table border="0" width="40%" cellspacing="10">
                    <tr>
                      <td>
                        <form class="generar" name="form6" action="compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="moneda" name="moneda" value="cordoba" />
                          <input type="hidden" id="iva" name="iva" value="15" />
                          <input type="checkbox" id="contactChoice3" name="ir" value="ir"><label for="contactChoice3"><b>IR</b></label>
                          <button id="genera" name="genera" type="submit" class="btn btn-danger btn-sm">Generar Orden Cordobas</button>
                        </form>
                      </td>

                      <td>
                        <form class="generar" name="form6" action="compra.pdf_copy.php" target="_self" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $compra ?>" />
                          <input type="hidden" id="moneda" name="moneda" value="cordoba" />
                          <input type="hidden" id="iva" name="iva" value="0" />
                          <input type="checkbox" id="contactChoice4" name="ir" value="ir"><label for="contactChoice4"><b>IR</b></label>
                          <button id="genera" name="genera" type="submit" class="btn btn-success btn-sm">Cordobas Sin IVA</button>
                        </form>
                      </td>

                    </tr>
                  </table>
                </div>
              <?

              }
              ?>


              <br>
              <!-- ************************************************************************************************************************************** -->
              <!-- PARTE DETALLES -->
              <?


                if($base == "esa"){
                  include("suministros/connect.php");
                }else{
                  include("suministros/connect2.php");
                }

              $compra = $_REQUEST["compra"];

              $cd = $mysqli->query("SELECT * FROM compra_detalle WHERE id_compra='" . $compra . "'");

              $rowcount = mysqli_num_rows($cd);

              if ($rowcount <= 0) {
                echo "<br><br><b>La orden de compra aun no contiene detalles.</b>";
              } else {

              ?>
                <br>
                <small><strong>Advertencia:</strong> No podra ingresar mas de 9 item</small>
                
                <!-- TABLA ARRAY DE AMATERIALES -->
                <table width="60%" border="1" cellpadding="15">
                  <tr align="center">
                    <td></td>
                    <td><b>
                        <font size="2px">Especificación de Material</font>
                      </b></td>
                    <td><b>
                        <font size="2px">Cantidad</font>
                      </b></td>
                    <td><b>
                        <font size="2px">Precio</font>
                      </b></td>
                    <td><b>
                        <font size="2px">Total</font>
                      </b></td>
                  </tr>
                  <tr align="center" height="12">
                    <td colspan="5"></td>
                  </tr>

                  <?

                  $t_o = "";
                  while ($fila_en = $cd->fetch_assoc()) {

                    $idc = $fila_en["id_detalle_compra"];
                    $str = $fila_en["material"];
                    $mat = str_replace("Varios -", "", $str);
                    $pre = $fila_en["precio"];
                    $cat = $fila_en["cantidad"];
                    $tot = $pre * $cat;
                    $costo_total = number_format($tot, 2, '.', '');
                    $t_o = $t_o + $costo_total;
                    echo ' <tr><td align="center"><a class="delete" href="compra.sql_copy.php?bandera=3&det=' . $idc . '&compra=' . $compra . '" ><img id="ex2" src="images/eli.png" alt="Eliminar Registro" /></a></td><td align="left">&nbsp;&nbsp;' . $mat . '</td><td align="center">' . $cat . '</td><td align="center">$' . $pre . '</td><td align="right"> $' . $costo_total . '&nbsp;</td></tr>';
                  }

                  $sub_total = number_format($t_o, 2, '.', '');
                  if ($_SESSION['base'] == 'esa') {
                    $iv = 0.13 * $t_o;
                    $en = "IVA(13%)";
                  } else {
                    $iv = 0.15 * $t_o;
                    $en = "IVA(15%)";
                  }
                  $iva = number_format($iv, 2, '.', '');
                  $tf = $t_o + $iva;
                  $total_orden = number_format($tf, 2, '.', '');

                  ?>
                  <tr align="center" height="12">
                    <td colspan="5"></td>
                  </tr>

                  <tr align="right">
                    <td colspan="4"><b>Subtotal</b>&nbsp;</td>
                    <td><b>$<?= $sub_total ?></b>&nbsp;</td>
                  </tr>
                  <tr align="right">
                    <td colspan="4"><b><?= $en; ?></b>&nbsp;</td>
                    <td><b>$<?= $iva ?></b>&nbsp;</td>
                  </tr>
                  <tr align="right">
                    <td colspan="4"><b>Costo Total</b>&nbsp;</td>
                    <td><b>$<?= $total_orden ?></b>&nbsp;</td>
                  </tr>
                </table>

              <?

              }

              $mysqli->close();

              ?>
              <!-- ************************************************************************************************************************************** -->





            </div>
            <br><br>
            <? if (isset($_REQUEST['flag'])) {
              echo "<font size='4px'><b>El correo fue enviado.</b></font>";
            } ?>
            <!--/row-->
            <div class="row mok">
              <div id="fms0" class="col-md-12">



                <div id="fms" class="col-md-10">







                  <form id="fomr1" method="post" action="compra.sql_copy.php" class="form-horizontal" enctype="multipart/form-data">
                    <input type="hidden" name="bandera" value="6">
                    <input type="hidden" name="orden" value="<?= $_REQUEST["compra"] ?>">

                    <label class="control-label "><strong>Mensaje </strong></label>
                    <div class="input">
                      <textarea rows="8" cols="80" name="mensaje">Buenos días Lic Campos, 
                                          &#13;&#10;Le adjunto orden de compra   
                                          &#13;&#10;&#13;&#10;Att. Luis Gonzalez
                                            </textarea>

                    </div>

                    <div class="clearfix"></div>
                    <div class="clearfix"></div>



                    <label class="control-label "><strong>Seleccione Correos:</strong></label>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <label class="control-label"><strong>Correos Adicionales:</strong></label>
                    <div class="input">
                      <input type="checkbox" name="arqui" value="cp@campospenate.com">Arq. Eduardo Campos
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input size="35px" type="text" id="email1" name="email1" /><br>

                      <input type="checkbox" name="senora" value="a.decampos@hotmail.com">Arq. Ana Maria de Campos


                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input size="35px" type="text" id="email2" name="email2" /><br>

                      <input type="checkbox" name="toto" value="ecampos@campospenate.com">Lic. Eduardo Campos

                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input size="35px" type="text" id="email3" name="email3" /><br>

                      <input type="checkbox" name="guli" value="nyracampos@gmail.com">Lic. Ana Maria Campos<br>

                    </div>

                    <br><br>

          <div id='message' style='font-size:10px'>Presione <strong>>>Generar Orden<<</strong> o <strong>>>Generar Orden sin IVA<<</strong> para habilitar esta opcion</div>
          <div class="input"><input type="submit" id="sent" name="eviar" value="Enviar Correo" class="btn yellow" ></div>
            <script type="text/javascript">
            $( "#sent" ).prop( "disabled", true );
            // $( "#genera").prop( "disabled", true );
            $( "#AddMaterial" ).click(function() {
                $( "#sent" ).prop( "disabled", true );
              });
              var materialColumn = '<?php echo $str?>';
              var  tableContent = '<?php echo $rowcount; ?>';

               if(tableContent > 0 && materialColumn != ''){
                $( "#genera" ).click(function() {
                  $("#message").hide();
                  $( "#sent" ).prop( "disabled", false );
                });
               }

            </script>


            </form>






                </div>



              </div>
            </div>


            <!--/row-->
            <br><br><br><br>


          </div>
        </div>


        <!-- END SAMPLE FORM PORTLET-->




      </div>


      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br><br><br>
      <br><br><br><br><br><br>





    </div>


    <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->





    <!-- ---------------------------------------------------------------------------------------------------------------------------- -->
    <div id="myModal_proveedor" class="modal fade" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
            <h4 class="modal-title"><b>Ingresar Nuevo Material</b></h4>
          </div>
          <div class="modal-body form">

            <!-- BEGIN FORM-->
            <form id="fomr2" method="post" action="suministros.descargas.php" class="form-horizontal">
              <input type="hidden" name="bandera" value="12">
              <input type="hidden" name="compra" value="<?= $_REQUEST["compra"] ?>">
              <div class="form-body">


                <!--/row-->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label class="control-label col-md-3"><strong>Tipo:</strong></label>

                      <div class="col-md-9">
                        <select id="material_tipo" name="material_tipo" class="select2_category form-control" tabindex="1">
                          <option value="0">Seleccione</option>
                          <?php

                              if($base == "esa"){
                                include("suministros/connect.php");
                              }else{
                                include("suministros/connect2.php");
                              }

                          $rs = $mysqli->query("SELECT * FROM material_tipo WHERE estado=1 ORDER BY id");

                          while ($fila = $rs->fetch_row()) {
                            echo '<option value="' . $fila[1] . '">' . $fila[1] . '</option>';
                          }

                          $mysqli->close();

                          ?>

                        </select>




                      </div>
                    </div>
                  </div>
                </div>
                <!--/row-->


                <!--/row-->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label class="control-label col-md-3"><strong>Categoria:</strong></label>
                      <div class="col-md-9">
                        <select id="material_cat" name="material_cat" class="select2_category form-control" tabindex="1">
                          <option value="0">Seleccione</option>
                          <?php

                          

                          if($base == "esa"){
                            include("suministros/connect.php");
                          }else{
                            include("suministros/connect2.php");
                          }

                          $rs = $mysqli->query("SELECT * FROM material_categoria WHERE estado=1 ORDER BY id");

                          while ($fila = $rs->fetch_row()) {
                            echo '<option value="' . $fila[2] . '">' . $fila[1] . '</option>';
                          }

                          $mysqli->close();

                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <!--/row-->


                <!--/row-->
                <div class="row">
                  <div class="col-md-9">
                    <div class="form-group">
                      <label class="control-label col-md-3"><strong>Nombre:</strong></label>
                      <div class="col-md-9">

                        <div class="input-group">
                          <span class="input-group-addon input-circle-left">
                            <i class="fa  fa-sort-down"></i>
                          </span>
                          <input name="nom_material" id="nom_material" type="text" class="form-control input-circle-right " required>
                        </div>

                      </div>
                    </div>
                  </div>
                </div>
                <!--/row-->



                <div class="form-actions">
                  <div class="row">
                    <div class="col-md-9">
                      <div class="row">
                        <div class="col-md-offset-3 col-md-9">
                          <input type="submit" value="Crear Nuevo Material" class="btn blue">

                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                    </div>
                  </div>
                </div>
            </form>
            <!-- END FORM-->




          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- ---------------------------------------------------------------------------------------------------------------------------- -->




  <!-- SECCION DE ALERTAS -->

  <!-- ******************************************************************************************************************* -->

  <a id="vacio" href="#modal1" role="button" data-toggle="modal"></a>


  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i> <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>Por favor llene todos los campos del formulario.</strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ******************************************************************************************************************* -->



  <!-- ******************************************************************************************************************* -->

  <a id="exito" href="#modal2" role="button" data-toggle="modal"></a>


  <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>Se ha creado la cotizacion exitosamente.<strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ******************************************************************************************************************* -->



  <!-- ******************************************************************************************************************* -->

  <a id="exito_detalle" href="#modal3" role="button" data-toggle="modal"></a>


  <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>Se ha eliminado el detalle exitosamente.<strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ******************************************************************************************************************* -->


  <!-- ******************************************************************************************************************* -->

  <a id="exito_detalle2" href="#modal4" role="button" data-toggle="modal"></a>


  <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>El detalle se ha actualizado exitosamente.<strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ******************************************************************************************************************* -->


  <!-- ******************************************************************************************************************* -->

  <a id="exito_detalle3" href="#modal5" role="button" data-toggle="modal"></a>


  <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
            <center>
              <h4><strong>Se ha agregado el detalle exitosamente.<strong></h4>
            </center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ******************************************************************************************************************* -->



















  <style>
    input[type="file"] {
      display: none;
    }


    .custom-file-upload {
      border: 1px solid #ccc;
      display: inline-block;
      padding: 3px 6px;
      cursor: pointer;
    }



    #orden_color {

      font-size: 18px !important;
      font-weight: bold;

    }





    #fms {


      border-style: solid;
      border-width: 1px;
      padding: 20px;
      height: 350px;

      margin-right: -1px;
      margin-bottom: -1px;



    }

    #fms2 {


      border-style: solid;
      border-width: 1px;
      padding: 20px;
      height: 225px;
      margin-right: -1px;
      margin-bottom: -1px;



    }


    #fms3 {


      border-style: solid;
      border-width: 1px;
      padding: 20px;
      height: 135px;
      margin-right: -1px;
      margin-bottom: -1px;
    }


    #detalle_color {


      width: 400px;
    }








    /* ********************************************** */

    #qw {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #qwd1 {

      /* height: 110px;*/
      border-bottom: thin solid #000000;
    }

    #qwd2 {

      /*height: 170px;*/
      border-bottom: thin solid #000000;
    }

    #qwd3 {

      /*height: 60px;*/
      /* border-bottom: thin solid #000000;  */
    }



    #qw3 {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #qw0 {

      display: flex;

    }


    /* ************************************* */


    .label1 {

      font-size: 16px !important;
      color: black !important;

    }


    #ex2 {
      width: 25px;
      height: 25px;
    }

    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    input[type="number"] {
      -moz-appearance: textfield;
    }
  </style>













  <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->




  <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->

  <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



  </div>
  <!-- END CONTENT -->


  </div>
  <!-- END CONTAINER -->









  <?php include("suminstros/footer.php"); ?>
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

-->














  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();




      <?
      if ($_SESSION['base'] == 'esa') {
      ?>
        //-----------------------------------------------------------------

        jQuery(document).on('click', '#genera', function() {

          jQuery(".mok").show();

        });
        //-----------------------------------------------------------------

      <?
      }
      ?>





      //-----------------------------------------------------------------

      jQuery('#cantidad,#precio_unitario').keyup(function() {

        var c = jQuery('#cantidad').val();
        var pu = jQuery('#precio_unitario').val();
        // var porcentaje= jQuery( "#porcentaje option:selected").val();
        var porcentaje = 0;
        var cp;

        if (c == "") {
          c = 0;
        }
        if (pu == "") {
          pu = 0;
        }

        if (porcentaje == 0.13) {
          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.13
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0.15) {

          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.15
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));
        } else if (porcentaje == 0) {

          tf = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(tf.toFixed(2));
          //jQuery( '#iva' ).val( 0.00 );  
          jQuery('#total_oferta').val(tf.toFixed(2));

        }

      }).keyup();


      jQuery("#porcentaje").change(function() {


        var c = jQuery('#cantidad').val();
        var pu = jQuery('#precio_unitario').val();
        var porcentaje = jQuery("#porcentaje option:selected").val();
        var cp;

        if (c == "") {
          c = 0;
        }
        if (pu == "") {
          pu = 0;
        }

        if (porcentaje == 0.13) {
          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.13
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0.15) {

          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.15
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));
        } else if (porcentaje == 0) {

          tf = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(tf.toFixed(2));
          jQuery('#iva').val(0.00);
          jQuery('#total_oferta').val(tf.toFixed(2));

        }



      });


      //----------------------------------------------------------





      //----------------------------------------------------------

      jQuery(document).on('click', '.delete', function() {

        //jQuery("#page-content").hide(); 
        var ff = jQuery(this).attr("page");
        var bandera = 3;


        // AJAX Code To Submit Form.
        var dataString = 'det=' + ff + '&bandera=' + bandera;

        jQuery.ajax({
          type: "POST",
          url: "cot.sql.php",
          data: dataString,
          cache: false,
          //contentType: false,
          //processData: false,

          success: function(result) {

            if (result != '') {


              jQuery("#collapse_" + ff).hide();
              jQuery("#pnn_" + ff).hide();
              jQuery("#aq_" + ff).hide();
              jQuery('#exito_detalle').click();
            }


          }

        });

        //jQuery('#page-content').fadeIn(1000);
        // return false;

      });

      //----------------------------------------------------------


      //*************************************************************************************************
      jQuery("#actualizar_detalle").click(function() {
        jQuery("#actualizar_detalle").prop("disabled", true);



        var orden = jQuery("#orden").val();
        var id_detalle = jQuery("#id_detalle").val();
        var costo_total = jQuery("#costo_total").val();
        var cantidad = jQuery("#cantidad").val();
        var precio_unitario = jQuery("#precio_unitario").val();
        var iva = jQuery("#iva").val();
        var total_oferta = jQuery("#total_oferta").val();
        var detalle = jQuery("#detalle").val();
        var bandera = 4;

        textarea_line = detalle.replace(new RegExp("\n", "g"), "<br>");



        if (cantidad == '' || precio_unitario == '' || detalle == '') {
          jQuery('#vacio').click();
          jQuery("#actualizar_detalle").prop("disabled", false);
        } else {


          jQuery("#form1").submit();



        }
        //*************************************************************************************************

        return false;
      });
      //**************************************************************************************************







    });
  </script>
  </div>
  </div></span></a></li>
  </ul>
  </div>
  </nav>
  </header>
  </div>


  <script src="bower_components/jquery/dist/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="bower_components/raphael/raphael.min.js"></script>
  <script src="bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="bower_components/moment/min/moment.min.js"></script>
  <script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>

  <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>



  <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
  <script src="ajax2/ajax.js" type="text/javascript"></script>



  <?php include("html/modal_add.php"); ?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php"); ?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php"); ?>
  <script src="script.js"></script>

  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
  <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
  <script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
  <script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


  <script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>




  <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>


















</body>

</html>