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
  <title>Color Digital | 2020</title>
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

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

  <!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet"
    type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet"
    type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />


  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet"
    type="text/css" />
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
  <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css"
    id="style_color" />
  <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>


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





  <link rel="shortcut icon" href="images/color.ico" />



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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



  <link rel="shortcut icon" href="images/color.ico" />

  <SCRIPT language=Javascript>

    function isNumberKey(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode == 32) { return true; }
      else {
        if (charCode > 31 && (charCode < 48 || charCode > 57))
          return false;
      }


      return true;
    }

  </SCRIPT>

  <style>
    #div1,
    #div2,
    #div3 {
      background-color: #f4f4f4;
      margin: 5px;
      width: 50px;
      height: 0px;
    }

    #div2 {
      margin-top: 0px;
      margin-left: 60px;
      margin-bottom: 0px;
      !important
    }
  </style>



</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php include('navbar.php'); ?>
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
            <a href="#" class="d-block"><?php $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php include("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12" style="margin-left: 10px;">

        <div id="page-content">


          <div class="row">

            <div class="col-md-10">
              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="col-md-6"><a href="solicitudes_elsalvador.php"><button type="button"
                      class="btn btn-danger">VER SOLICITUDES SV</button></a></div>
                <div class="col-md-6"><a href="solicitudes_nicaragua.php"><button type="button"
                      class="btn btn-danger">VER SOLICITUDES NI</button></a></div>
              </div>
              <div id="contenedor1" class="portlet box blue">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="icon-settings"></i> Generar Solicitud de Despacho
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
                            <form method="post" action="solicitud_pdf.php" enctype="multipart/form-data">
                              <div class="form-row">

                              </div>
                              <div class="form-group col-md-6">
                                <b>PAIS ORIGEN</b>
                                <select id="pais" class="form-control" name="origen" required="required">

                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <b>PAIS DESTINO</b>
                                <select id="destini" class="form-control" name="destino" required="required">

                                </select>
                                <!--<select id="inputState" class="form-control" name="destino" required="required">
        <option value="">SELECCIONE PAIS DE DESTINO</option>
         <? php/*

                                      include("connectin.php");
                                      
                                      $rs=$mysqli->query("select*from pais");

                                         while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[3].'">'.$fila[3].'</option>';  }

                                         //$value=$fila[0];



                                      $mysqli->close();

                                                                 */ ?> 
      </select>-->
                              </div>
                              <div class="form-group col-md-6">
                                <b>POP</b>
                                <select multiple id="pop" class="form-control" name="pop[]">

                                </select>
                              </div>
                              <div class="form-group col-md-6">
                                <b>TRANSPORTE</b>
                                <select id="peso" class="form-control" name="capacidad" required="required">

                                </select>
                                <!--<select id="inputState" class="form-control" name="capacidad" required="required">
        <option value="1.5">1.5 TON</option>
        <option value="4">4 TON</option>
        <option value="8">8 TON</option>
        <option value="12">12 TON</option>
        <option value="21">21 TON</option>
        <!--<option value="MARITIMO">MARITIMO</option>-->

                                <!--</select>-->
                              </div>
                              <div class="form-group col-md-6">
                                <b>FLETE</b>
                                <input type="text"  class="form-control" name="flete" value="0" id="inputEmail4" placeholder="INGRESE COSTO DE FLETE" required="required">
                                <!-- <select id="costo" class="form-control" name="flete" required="required"> -->

                                </select>


                              </div>


                              <div class="form-group col-md-6">
                                <b>PROVEEDOR </b>
                                <select id="inputState" class="form-control" name="proveedor" required="required">
                                  <option value="">SELECCIONE PROVEEDOR</option>
                                  <option value="TRANSPORTE POSADA">TRANSPORTE POSADA</option>
                                  <option value="DHL EXPRESS">DHL EXPRESS</option>
                                  <option value="C807 OPERADOR LOGISTICO">C807 OPERADOR LOGISTICO</option>
                                  <option value="BE LOGISTIC SOLUTIONS">BE LOGISTIC SOLUTIONS</option>
                                </select>
                              </div>

                              <div class="form-group col-md-6">
                                <b>ENTREGA ADICIONAL</b>
                                <input type="text" class="form-control" name="entrega" value="0" id="inputPassword4"
                                  placeholder="INGRESE COSTO DE ENTREGA ADICIONAL" required="required">
                              </div>
                          </div>
                          <div class="form-group col-md-6">
                            <b>TRAMITE ADUANAL</b>
                            <input type="text" class="form-control" name="aduanal" value="0" id="inputEmail4"
                              placeholder="INGRESE COSTO DE TRAMITE ADUANAL" required="required">
                          </div>
                          <div class="form-group col-md-6">
                            <b>CANCELACION DE SCANNER(SINI)</b>
                            <input type="text" class="form-control" name="cancelacion" value="18" id="inputPassword4"
                              placeholder="INGRESE COSTO DE SINI" required="required" readonly>
                          </div>
                          <!--<?php //$var1='<p id="resultado1"></p>';echo $var1;
                          //$var2='<p id="resultado2"></p>';echo $var2; 
                          
                          ?>-->





                          <div class="form-group col-md-6">
                            <b>TIPO TRANSPORTE</b>
                            <select id="inputState" class="form-control" name="transporte" required="required">
                              <option value="">TIPO DE TRANSPORTE</option>
                              <option value="AEREO">AEREO</option>
                              <option value="TERRESTRE">TERRESTRE</option>
                              <!--<option value="MARITIMO">MARITIMO</option>-->

                            </select>
                          </div>


                          <div class="form-group col-md-6">
                            <b>FLETE INCLUYE: </b>
                            <input type="text" class="form-control" name="detalleflete" placeholder="INGRESE DETALLE"
                              required="required">
                          </div>

                          <br>

                          <button type="submit" class="btn btn-primary">GENERAR SOLICITUD</button>
                          </form>

                          <br><br><br><br>
                          <br><br><br><br>

                          <!-- END FORM-->

                        </div>

                      </div>
                    </div>

                  </div>
                </div>
              </div>
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


        .label1 {

          font-size: 16px !important;
          color: black !important;

        }


        #ex2 {
          width: 25px;
          height: 25px;
        }
      </style>













      <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


    </div>
  </div>
  </div>
  <!-- END CONTENT -->


  </div>
  <!-- END CONTAINER -->








  <?php
  include("footer.php");
  ?>



  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
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

  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    jQuery(document).ready(function () {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();






    });
  </script>
  <script type="text/javascript">
    $(document).ready(function () {
      $.ajax({
        type: 'POST',
        url: 'pais_select.php'

      })
        .done(function (pais) {
          $('#pais').html(pais)
        })
        .fail(function () {
          alert('Hubo un errror al cargar el pais')
        })

      $('#pais').on('change', function () {
        var id = $('#pais').val()
        $.ajax({
          type: 'POST',
          url: 'pop_select.php',
          data: { 'id': id }
        })
          .done(function (pais) {
            $('#pop').html(pais)
          })
          .fail(function () {
            alert('Hubo un error al cargar')
          })
      })
      $('#pop').on('change', function () {
        var id = $('#pop').val()


      })

      //$('#enviar').on('click', function(){
      // var resultado = $('#pais option:selected').text() 

      //  $('#resultado1').html(resultado)
      //})
      //$('#enviar').on('click', function(){
      // var resultado1 = $('#pop option:selected').text()

      // $('#resultado2').html(resultado1)
      //})


    })

  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $.ajax({
        type: 'POST',
        url: 'destino_select.php'

      })
        .done(function (destini) {
          $('#destini').html(destini)
        })
        .fail(function () {
          alert('Hubo un errror al cargar las listas_rep')
        })

      $('#destini').on('change', function () {
        var id = $('#destini').val()
        $.ajax({
          type: 'POST',
          url: 'select_flete.php',
          data: { 'id': id }
        })
          .done(function (destini) {
            $('#peso').html(destini)
          })
          .fail(function () {
            alert('Hubo un error al cargar')
          })
      })
      $('#peso').on('change', function () {
        var id = $('#destini').val()
        var peso = $('#peso').val()
        $.ajax({
          type: 'POST',
          url: 'costofleteselect.php',
          data: { 'id': id, 'peso': peso }
        })
          .done(function (destini) {
            $('#costo').html(destini)
          })
          .fail(function () {
            alert('Hubo un error al cargar')
          })

      })

      //$('#enviar').on('click', function(){
      // var resultado = $('#pais option:selected').text() 

      //  $('#resultado1').html(resultado)
      //})
      //$('#enviar').on('click', function(){
      // var resultado1 = $('#pop option:selected').text()

      // $('#resultado2').html(resultado1)
      //})


    })

  </script>



  <?php
  include("footer.php");
  ?>
  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <!--[if lt IE 9]>
<script src="suministros/assets/global/plugins/respond.min.js"></script>
<script src="suministros/assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->





</body>

</html>