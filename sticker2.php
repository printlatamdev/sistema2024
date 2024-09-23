<?php

session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'] ?? '';

function conexion()
{
  $server = 'localhost';
  $usuario = 'admin';
  $clave = 'AG784512';
  $bd = 'esa22';

  $con = mysqli_connect($server, $usuario, $clave, $bd);
  if (!$con) {
    die('no conecta amigo ' . mysqli_error());
  } else {
    return ($con);
  }
}

$conexion = conexion();
?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | <?php echo date('Y');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css"
    rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>

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


  <link rel="stylesheet" href="uikit/css/uikit.min.css" />
  <link rel="stylesheet" href="uikit/css/components/datepicker.min.css" />
  <link rel="stylesheet" href="uikit/css/components/autocomplete.min.css" />

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css"/>
  <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
    type="text/css"/>
  <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
    type="text/css"/>
  <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />
  <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"
    id="style_color" />
  <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


  <script>
    $(function () {
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
      border-bottom: thin solid #000000;
    }

    #fmsd2 {
      border-bottom: thin solid #000000;
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
      border-bottom: thin solid #000000;
    }

    #fmsd2p {
      border-bottom: thin solid #000000;
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
    <?php require_once('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="images/logo_color.png" alt="AdminLTE Logo" style="opacity: .8;margin-left:10%" width="150">
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php } ?>
          <div class="info">
            <a href="#" class="d-block"><? echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
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

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">


        <div class="row">




          <div class="col-md-9">

            <div id="contenedor1" class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  <i class="icon-settings"></i> Generar Stickers
                </div>
                <ul class="nav nav-tabs">
                  <li class="active">
                    <a href="#portlet_tab_1_1" data-toggle="tab">
                      <strong>Color Digital</strong></a>
                  </li>

                </ul>
              </div>




              <div class="portlet-body form">
                <div class="tab-content">
                  <div class="tab-pane active" id="portlet_tab_1_1">
                    <div class="skin skin-minimal">



                      <div class="portlet light bordered">

                        <div class="portlet-body form">
                          <!-- BEGIN FORM-->
                          <form id="fomr1" method="post" action="sticker.pdf.php" class="form-horizontal">
                            <div class="form-body">





                              <!--/row-->
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="form-group">



                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Imagen:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa  fa-bookmark-o"></i>
                                        </span>
                                        <select id="imagen" name="imagen" class="form-control" data-live-search="true"
                                          tabindex="1">

                                          <?php

                                          $directorio = opendir("images/stickers"); //ruta actual
                                          
                                          while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
                                          {
                                            if (is_dir($archivo)) //verificamos si es o no un directorio
                                            {
                                            } else {
                                              echo "<option value='" . $archivo . "'>" . $archivo . "</option>";
                                            }
                                          }

                                          ?>
                                        </select>
                                      </div>
                                    </div>



                                    <div class="col-md-5">

                                      <!-- **************************************************************************************************** -->
                                      <script src="js/uploadifive/jquery.min.js" type="text/javascript"></script>
                                      <script src="js/uploadifive/jquery.uploadifive.js"
                                        type="text/javascript"></script>
                                      <link rel="stylesheet" type="text/css" href="js/uploadifive/uploadifive.css">

                                      <div id="queue_fac"></div>
                                      <div style="overflow:hidden">
                                        <div style="float:left">
                                          <p align="left"><input id="file_fac" name="file_fac" type="file"></p>
                                        </div>
                                        <div style="float:left; padding-left:20px">
                                          <label id="message_fac" name="message_fac">

                                          </label>
                                        </div>
                                      </div>
                                      <script type="text/javascript">
                                        var $fac = jQuery.noConflict();
                                        $fac(function () {
                                          $fac('#file_fac').uploadifive({
                                            'uploadScript': 'sticker.save.php',
                                            'fileType': 'image/*',
                                            'buttonText': 'Subir Foto',
                                            'multi': true,
                                            'removeCompleted': true,
                                            'method': 'post',
                                            'formData': {
                                              'bandera': '1',
                                              'carpeta': '1'
                                            },
                                            'onUploadComplete': function (file, data, response) {
                                              $fac('#message_fac').html(data);
                                            },
                                            'onQueueComplete': function (uploads) {
                                              location.reload();
                                              //console.log(uploads);
                                              //alert(uploads.successful + ' files were uploaded successfully.');   //location.reload();  
                                            },
                                            'height': 45,
                                            'width': 100
                                          });
                                        });
                                      </script>
                                    </div>







                                  </div>
                                </div>
                              </div>
                              <!--/row-->






                              <br><br>


                              <!--/row-->
                              <div class="row">
                                <div class="col-md-10">


                                  <div class="form-group">

                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Cliente:</strong></label>

                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input id="empresa" name="empresa" type="text" class="form-control" required>
                                      </div>



                                    </div>


                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Orden de Produccion:</strong></label>

                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="op" id="op" type="number" class="form-control" required>
                                      </div>
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
                                      <label class="control-label"><strong>Fecha:</strong></label>
                                      <!-- <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="fecha" id="fecha" type="text" class="form-control" required>
                                      </div>-->
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input autocomplete="off" required id="fecha" name="fecha" type="text"
                                          class="form-control"
                                          data-uk-datepicker="{format:'DD-MM-YYYY', i18n:{ months:['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre',  ] } }">
                                        <span class="input-group-btn">
                                          <button class="btn default" type="button"><i
                                              class="fa fa-calendar"></i></button>
                                        </span>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Hora:</strong></label>
                                      <!-- <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="hora" id="hora" type="text" class="form-control" required>
                                      </div>-->
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input autocomplete="off" required id="hora" name="hora" type="text"
                                          class="form-control" data-uk-timepicker="{format:'12h'}">
                                        <span class="input-group-btn">
                                          <button class="btn default" type="button"><i class="fa fa-times"></i></button>
                                        </span>
                                      </div>
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
                                      <label class="control-label"><strong>Tel:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="tel" id="tel" type="text" class="form-control"
                                          value="(503) 2213-5501" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Email:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="email" id="email" type="text" class="form-control"
                                          value="logistica@printlatam.com" required>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--/row-->



                              <hr>



                              <!--/row-->
                              <div class="row">
                                <div class="col-md-10">


                                  <div class="form-group">

                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Pais de Origen:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="origen" id="origen" type="text" class="form-control" required
                                          value="EL SALVADOR">
                                      </div>
                                    </div>


                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Pais de Destino:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa  fa-bookmark-o"></i>
                                        </span>
                                        <select id="destino" name="destino" class="select2_category form-control"
                                          tabindex="1">
                                          <?php

                                          include("suministros/connect.php");

                                          $rs = $mysqli->query("SELECT * FROM pais WHERE estado=1");

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
                              </div>
                              <!--/row-->


                              <!--/row-->
                              <div class="row">
                                <div class="col-md-10">
                                  <div class="form-group">
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Proveedor:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="pro" id="pro" type="text" class="form-control"
                                          value="COLOR DIGITAL" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Campaña:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="camp" id="camp" type="text" class="form-control" required>
                                      </div>
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
                                      <label class="control-label"><strong>Categoria:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="cat" id="cat" type="text" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Total Bultos:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="bultos" id="bultos" type="text" class="form-control" required>
                                      </div>
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
                                      <label class="control-label"><strong>Unidades por Bultos:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="unp" id="unp" type="text" class="form-control" required>
                                      </div>
                                    </div>
                                    <div class="col-md-5">
                                      <label class="control-label"><strong>Peso:</strong></label>
                                      <div class="input-group">
                                        <span class="input-group-addon input-circle-left">
                                          <i class="fa   fa-bookmark-o"></i>
                                        </span>
                                        <input name="peso" id="peso" type="text" class="form-control" required>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!--/row-->



                              <!--/row-
                        <div class="row">
                          <div class="col-md-10">
                            

                            <div class="form-group">

                              <div class="col-md-5">
                                    <label class="control-label"><strong>Contacto:</strong></label>
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-users"></i>
                                  </span>
                                  <select id="contacto" name="contacto" class="select2_category form-control"  tabindex="1">
                                  <option value="0">Seleccione Contacto</option>        
                                  </select>
                                    </div>
                              </div>

                              
                              <div class="col-md-5">
                                    <label class="control-label "><strong>Fecha de Entrega:</strong></label>
                                    <div class="input-group input-medium date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                                  <input id="entrega" name="entrega" type="text" class="form-control" readonly>
                                  <span class="input-group-btn">
                                  <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                                  </span>
                                        </div>
                              </div>
                                  


                            </div>

                          </div>
                        </div>
                        /row-->







                            </div>
                        </div>


                      </div>
                      <div class="form-actions">

                        <input class="btn blue" type="submit" value="Crear Stickers">

                      </div>


                      </form>

                      <form action="sticker.pdf.reporte.php" method="POST">
                        <div class="form-actions">

                          <input class="btn blue" type="submit" value="Finalizado Enviar Informacion">

                        </div>
                      </form>
                      <!-- END FORM-->



                    </div>
                  </div>



















                  <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



                  <style>
                    .custom-file-upload {
                      border: 1px solid #ccc;
                      display: inline-block;
                      padding: 3px 6px;
                      cursor: pointer;
                    }



                    #cliente_color,
                    #contacto_color,
                    #orden_color {

                      font-size: 18px !important;
                      font-weight: bold;

                    }




                    #fms {


                      border-style: solid;
                      border-width: 1px;
                      padding: 20px;
                      height: 275px;

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
                  </style>
                </div>
                <!-- END CONTENT -->


              </div>
              <!-- END CONTAINER -->

              <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
              <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js"
                type="text/javascript"></script>
              <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
                type="text/javascript"></script>
              <script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
              <script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
              <script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
              <script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
              <script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
              <script type="text/javascript"
                src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>
              <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



              <script>
                jQuery(document).ready(function () {

                  // jQuery( "#contenedor2" ).hide();
                  //jQuery( "#details" ).hide();  


                  Metronic.init(); // init metronic core componets
                  Layout.init(); // init layout
                  QuickSidebar.init(); // init quick sidebar
                  FormSamples.init();
                  ComponentsPickers.init();


                });
              </script>







              <?php
              //include("footer.php");
              ?>
              <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
              <!-- BEGIN CORE PLUGINS -->
              <!--[if lt IE 9]>
<script src="suministros/assets/global/plugins/respond.min.js"></script>
<script src="suministros/assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->



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




      <script src="uikit/js/uikit.min.js"></script>
      <script src="uikit/js/components/datepicker.min.js"></script>
      <script src="uikit/js/components/autocomplete.min.js"></script>


      <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
      <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
      <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
        type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
        type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
        type="text/javascript"></script>
      <!-- END CORE PLUGINS -->
      <!-- BEGIN PAGE LEVEL PLUGINS -->
      <script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js"
        type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"
        type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"
        type="text/javascript"></script>
      <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
      <script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
      <script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js"
        type="text/javascript"></script>
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



      <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
      <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
      <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>






      <!-- jQuery -->

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
      <script src="bower_components/jquery/dist/jquery.min.js"></script>
      <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
      <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
      <script src="ajax2/ajax.js" type="text/javascript"></script>

</body>

</html>