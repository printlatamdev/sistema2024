<?php
session_start();

$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'];
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 20<?php echo $anio; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
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
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->

  <!-- Theme style -->

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>







  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

  <link rel="stylesheet" href="css/custom.css">




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



  <?php
  if (trim($pruebaget) == false) { ?>



  <?php
  } else { ?>
    <script type="text/javascript">
      $(function() {
        $("#anuncio").modal();
      });
    </script>



  <?php
   }

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

    <?php  require('navbar.php'); ?>

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
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
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
        <div class="table-wrapper">
          <div class="table-title">
            <div class="row">
              <div class="col-sm-3">

                <h2><b>Directorio</b></h2>
              </div>


              </script>
              <div class="col-sm-3">
                <a class="btn btn-warning" data-toggle="modal" data-target="#modal-container"><i class="material-icons">&#xE147;</i> <span>Agregar Contacto</span></a>
              </div>
              <div class="col-sm-3">
                <a class="btn btn-success" data-toggle="modal" data-target="#myModal_autocomplete"><i class="material-icons">&#xE147;</i> <span>Agregar Empresa</span></a>
              </div>
              <div class="col-sm-3">
                <a class="btn btn-info" data-toggle="modal" data-target="#myModal_proveedor"><i class="material-icons">&#xE147;</i> <span>Agregar Proveedor</span></a>
              </div>

            </div>
          </div>
          <div class='col-sm-4 pull-right'>
            <div id="custom-search-input">
              <div class="input-group col-md-12">
                <input type="text" class="form-control" placeholder="Buscar" id="q" onkeyup="load(1);" />
                <span class="input-group-btn">
                  <button class="btn btn-info" type="button" onclick="load(1);">
                    <span class="glyphicon glyphicon-search"></span>
                  </button>
                </span>





              </div>
            </div>
          </div>
          <div class='clearfix'></div>

          <hr>
          <div id="loader"></div><!-- Carga de datos ajax aqui -->
          <div id="resultados"></div><!-- Carga de datos ajax aqui -->
          <div class='outer_div'></div><!-- Carga de datos ajax aqui -->



          <!-- Modal -->

          <div id="myModal_autocomplete" class="modal fade" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header bg-success">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                  <h4 class="modal-title"><b>Ingresar Nueva Empresa</b></h4>
                </div>
                <div class="modal-body form">
                  <form action="save.empresa.php" class="form-horizontal form-row-seperated" method="post">
                    <div class="form-group">
                      <label class="col-sm-4 control-label"><b>Nombre</b></label>
                      <div class="col-sm-8">
                        <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-user"></i>
                          </span>
                          <input type="text" id="typeahead_example_modal_1" name="nombre" class="form-control" required />
                          <input type="hidden" name="pais" value="<?=$base;?>">
                        </div>
                        <p class="help-block">
                        </p>
                      </div>
                    </div>




                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>

                </div>

                </form>
              </div>

            </div>
          </div>
        </div>
      </div>




      <div id="myModal_proveedor" class="modal fade" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="modal-title"><b>Ingresar Nueva Proveedor</b></h4>
            </div>
            <div class="modal-body form">
              <form action="save.proveedor.php" class="form-horizontal form-row-seperated" method="post">
                <div class="form-group">
                  <label class="col-sm-4 control-label"><b>Nombre</b></label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-user"></i>
                      </span>
                      <input type="text" id="typeahead_example_modal_1" name="nombre" class="form-control" required />
                    </div>
                    <p class="help-block">

                    </p>
                  </div>
                </div>



                <div class="form-group">
                  <label class="col-sm-4 control-label"><b>Credito:</b></label>
                  <div class="col-sm-8">
                    <div class="input-group">
                      <span class="input-group-addon">
                        <i class="fa fa-tasks"></i>
                      </span>
                      <input type="text" id="typeahead_example_modal_1" name="credito" class="form-control" required />
                    </div>
                    <p class="help-block">

                    </p>
                    <input type="hidden" name="pais" value="<?=$base;?>">
                  </div>
                </div>




            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>

            </div>

            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
  <form method="post" action="save.contacto.php" enctype="multipart/form-data">
    <div id="modal-container" class="modal fade hidden-print" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">Nuevo Contacto</h4>
                </div>
                <div class="modal-body">
                    <div class="form-horizontal">
                        <div class="row">
                            <!-- Empresa -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="empresa" class="col-md-2 control-label">Empresa:</label>
                                    <div class="col-md-10">
                                        <select class="form-control selectpicker" data-live-search="true" id="empresa" name="empresa" required>
                                            <option value="" disabled selected>Seleccione Empresa</option>
                                            <?php
                                            include("suministros/connect.php");
                                            $rs = $mysqli->query("SELECT * FROM empresa");
                                            while ($fila = $rs->fetch_row()) {
                                                echo '<option value="' . htmlspecialchars($fila[0], ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($fila[1], ENT_QUOTES, 'UTF-8') . '</option>';
                                            }
                                            $mysqli->close();
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Nombre -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="contacto" class="col-md-2 control-label">Nombre:</label>
                                    <div class="col-md-10">
                                        <input type="text" id="contacto" name="contacto" class="form-control" placeholder="Nombre" required>
                                        <p class="help-block">E.g: Alejandra Sanchez, Claudia Cornejo</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Teléfono -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="tel" class="col-md-2 control-label">Teléfono:</label>
                                    <div class="col-md-10">
                                        <input type="text" id="tel" name="tel" class="form-control" placeholder="Teléfono" required>
                                        <p class="help-block">E.g: 2236-7845, 2245-1278</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Celular -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cel" class="col-md-2 control-label">Celular:</label>
                                    <div class="col-md-10">
                                        <input type="text" pattern="[0-9\-]+" id="cel" name="cel" class="form-control" placeholder="Celular" required>
                                        <p class="help-block">E.g: 7788-4563, 7645-1278</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="email" class="col-md-2 control-label">Email:</label>
                                    <div class="col-md-10">
                                        <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                                        <p class="help-block">E.g: administrador@campospenate.com</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Hidden Field for Base -->
                            <input type="hidden" value="<?= htmlspecialchars($base, ENT_QUOTES, 'UTF-8'); ?>" name="pais">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Guardar</button>
                </div>
            </div>
        </div>
    </div>
</form>


 
  <script src="js/script_directorio.js"></script>

  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong><a href="#">Sistema Produccion</a>.</strong>
    Color Digital 2020
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 2.0.1
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

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
<!--   <script>
    <?if(empty($_REQUEST['error'])){?>
      setTimeout(function() {  
        $('#duplicado').fadeIn('slow'); 
      }, 5000);

        <?}?>
  </script> -->
</body>

</html>