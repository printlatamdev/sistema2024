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
  <title>Color Digital | 2023</title>
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


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
  <script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>





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

  <!--link para select con buscador-->
  <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css'>

  <!-------------->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
  <!--termina select con buscador-->


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php  require('navbar.php'); ?>
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




        <div class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class="fa  fa-cubes"></i>Salida de Suministros
            </div>
            <div class="tools">
              <a href="javascript:;" class="collapse">
              </a>

            </div>
          </div>
          <div class="portlet-body">
            <div class="row">
              <div class="col-md-3 col-sm-3 col-xs-3">
                <ul class="nav nav-tabs tabs-left">
                  <li class="active">
                    <a href="#tab_6_1" data-toggle="tab">
                      <strong>Tintas</strong> </a>
                  </li>
                  <li>
                    <a href="#tab_6_3" data-toggle="tab">
                      <strong>Materiales</strong> </a>
                  </li>


                </ul>
              </div>





              <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="tab-content">


                  <!-- *********************************************************************** -->
                  <div class="tab-pane active" id="tab_6_1">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                          <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Descarga de Tintas</span>
                        </div>
                        <div class="actions">

                        </div>
                      </div>
                      <div class="portlet-body form">
                        <form role="form" method="post" action="#">
                          <div class="form-body">
                            <div class="form-group form-md-line-input has-success">
                              <div class="input-icon">
                                <input name="codigo" id="codigo" type="text" class="form-control" required>
                                <label for="form_control_1">codigo</label>
                                <span class="help-block">Ingrese el codigo que se encuentra en la viñeta</span>
                                <i class="fa fa-barcode"></i>
                              </div>
                            </div>


                            <!--/row-->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Empresa:</strong></label>
                                  <div class="col-md-9">
                                    <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                      <label class="radio-inline">
                                        <input class="rad_tinta" type="radio" name="empresa_tinta" id="empresa_tinta" value="color" checked />
                                        Color</label>


                                      <?php

                                      if ($_SESSION['base'] == 'esa') {


                                        echo '<label class="radio-inline">
                                  <input class="rad_tinta" type="radio" name="empresa_tinta" id="empresa_tinta" value="nicaragua" />
                                  Nicaragua </label>';
                                      }


                                      ?>






                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->



                          </div>
                          <div class="form-actions noborder">
                            <button id="tinta" type="button" class="btn blue">Descargar</button>

                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                  </div>

                  <!-- *********************************************************************** -->
                  <div class="tab-pane fade" id="tab_6_2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                          <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Descarga de Papel</span>
                        </div>
                        <div class="actions">

                        </div>
                      </div>
                      <div class="portlet-body form">
                        <form role="form" method="post" action="#">
                          <div class="form-body">
                            <div class="form-group form-md-line-input has-success">
                              <div class="input-icon">
                                <input name="codigo" id="codigo" type="text" class="form-control" required>
                                <label for="form_control_1">codigo</label>
                                <span class="help-block">Ingrese el codigo que se encuentra en la viñeta</span>
                                <i class="fa fa-barcode"></i>
                              </div>
                            </div>

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Empresa:</strong></label>
                                  <div class="col-md-9">
                                    <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa_papel" id="empresa_papel_papel" value="color" checked />
                                        Color
                                      </label>
                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="campos" />
                                        Campos
                                      </label>
                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="Cnl" />
                                        Color en Linea
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->

                          </div>
                          <div class="form-actions noborder">
                            <button id="papel" type="button" class="btn blue">Descargar</button>

                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                  </div>


                  <!-- ******************************************************************************************** -->


                  <!-- ******************************************************************************************** -->
                  <!-- DESCARGA DE MATERIALES--->
                  <div class="tab-pane fade" id="tab_6_3">

                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption">
                          <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Descarga de Materiales</span>
                        </div>
                        <div class="tools">

                        </div>
                      </div>
                      <div class="portlet-body form">
                        <!-- BEGIN FORM-->
                        <form id="fomr2" method="post" action="#" class="form-horizontal">
                          <div class="form-body">
                            <!--/row-->
                            <!--<div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Material:</strong></label>
                              <div class="col-md-9">
                                <select id="material" name="material" class="select2_category form-control"  tabindex="1">
                                  <?php
                                  //include("suministros/connect.php");
                                  //$rs=$mysqli->query("SELECT * FROM material WHERE estado=1");
                                  //while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].' - '.$fila[2].'</option>';
                                  //}
                                  //$mysqli->close();
                                  ?>
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>-->
                            <!--/row-->

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Material:</strong></label>
                                  <div class="col-md-9">

                                    <div class="input-group">
                                      <select class="selectpicker form-control" id="material" name="material" data-show-subtext="true" data-live-search="true" tabindex="1" style="height: 10px; width: 10px;">
                                        <option value="">Seleccione el material</option>
                                        <?php
                                        //Se le agrego el nombre antiguo para no perderse a la hora de descragar el material.
                                        include($base . "_db.php");
                                        $rs = $mysqli->query("SELECT * FROM material WHERE estado=1");
                                        while ($fila = $rs->fetch_row()) {
                                          echo '<option value="' . $fila[0] . '">' . $fila[1] . ' - ' . $fila[2] . ' - ' . $fila[12] . '</option>';
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
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Cantidad:</strong></label>
                                  <div class="col-md-9">

                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa  fa-sort-down"></i>
                                      </span>
                                      <input name="cantidad" id="cantidad" type="number" class="form-control input-circle-right" required>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Orden:</strong></label>
                                  <div class="col-md-9">

                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa  fa-sort-down"></i>
                                      </span>


                                      <select id="orden" name="orden" class="select2_category form-control" tabindex="1">

                                        <?php
                                        include($base . "_db.php");
                                        //CONSULTAS ANTIGUAS
                                        /*$rs=$mysqli->query("SELECT * FROM pop WHERE estado=1");
                                    $rs2=$mysqli->query("SELECT * FROM orden WHERE estado=1");
                                    $rs3=$mysqli->query("SELECT * FROM campos WHERE estado=1");*/

                                        $rs = $mysqli->query("SELECT * FROM pop");
                                        $rs2 = $mysqli->query("SELECT * FROM orden");
                                        $rs3 = $mysqli->query("SELECT * FROM campos");
                                        ?>
                                        <option value="0000">SIN POP</option>

                                        <?php
                                        while ($fila = $rs->fetch_row()) {
                                          echo '<option value="' . $fila[0] . '">' . $fila[0] . ' - ' . $fila[15] . '-POP' . '</option>';
                                        }
                                        while ($fila2 = $rs2->fetch_row()) {
                                          echo '<option value="' . $fila2[0] . '">' . $fila2[0] . ' - ' . $fila2[2] . '-OP' . '</option>';
                                        }
                                        while ($fila3 = $rs3->fetch_row()) {
                                          echo '<option value="' . $fila3[0] . '">' . $fila3[0] . ' - ' . $fila3[2] . '-CAMPOS' . '</option>';
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
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Comprobante:</strong></label>
                                  <div class="col-md-9">

                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa  fa-sort-down"></i>
                                      </span>
                                      <input name="comprobante" id="comprobante" type="text" class="form-control input-circle-right " required>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Entrega:</strong></label>
                                  <div class="col-md-9">

                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa  fa-sort-down"></i>
                                      </span>
                                      <input name="entrega" id="entrega" type="text" class="form-control input-circle-right " required>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Nota:</strong></label>
                                  <div class="col-md-9">
                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa fa-sort-down"></i>
                                      </span>
                                      <input name="nota" id="nota" type="text" class="form-control input-circle-right" required>
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->



                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Salida:</strong></label>
                                  <div class="col-md-9">
                                    <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                        <i class="fa  fa-sort-down"></i>
                                      </span>

                                      <div class="input">
                                        <label class="custom-file-upload">
                                          <input type="file" id="arte" name="arte" />
                                          Seleccionar Foto
                                        </label>
                                        <label id="ok"><strong>OK</strong></label>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->



                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>POP:</strong></label>
                                  <div class="col-md-9">
                                    <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label class="radio-inline">
                                        <input type="checkbox" name="pop" id="pop" value="1" j />
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>


                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>OP:</strong></label>
                                  <div class="col-md-9">
                                    <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label class="radio-inline">
                                        <input type="checkbox" name="op" id="op" value="1" />
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->

                            <!--/row-->
                            <div class="row">
                              <div class="col-md-9">
                                <div class="form-group">
                                  <label class="control-label col-md-3"><strong>Empresa:</strong></label>
                                  <div class="col-md-9">
                                    <div class="radio-list">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa" id="empresa" value="color" />Color
                                      </label>

                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa" id="empresa" value="campos" />Campos
                                      </label>

                                      <label class="radio-inline">
                                        <input class="rad" type="radio" name="empresa" id="empresa" value="nicaragua" />Nicaragua
                                      </label>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!--/row-->


                            <input type="hidden" name="base" value="<?= $base ?>">
                            <div class="form-actions">
                              <div class="row">
                                <div class="col-md-9">
                                  <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                      <button id="materiales" type="button" class="btn blue">Descargar</button>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-6"></div>
                              </div>
                            </div>
                        </form>
                        <!-- END FORM-->
                      </div>
                    </div>

                  </div>

                  <!-- ******************************************************************************************** -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->




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
                  <h4><strong>Ingrese un Codigo!</strong></h4>
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
                  <h4><strong>El Codigo <label id="code"></label> se ha descargado.<strong></h4>
                </center>
              </p>
              <input type="image" src='assets/images/firmar.png' name="Firmar" onclick="test5();">
            </div>
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn green">OK</button>
            </div>
          </div>
        </div>
      </div>
      <!-- ******************************************************************************************************************* -->


      <!-- ******************************************************************************************************************* -->

      <a id="error" href="#modal3" role="button" data-toggle="modal"></a>


      <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="alert alert-danger"> <i class="fa fa-warning"></i> <strong>Alerta!</strong></h4>
            </div>
            <div class="modal-body">
              <p>
                <center>
                  <h4><strong>El Codigo<label id="code2"></label> ya se encuentra descargado.</strong></h4>
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

      <a id="exis" href="#modal45" role="button" data-toggle="modal"></a>


      <div id="modal45" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="alert alert-danger"> <i class="fa fa-warning"></i><strong>Alerta!</strong></h4>
            </div>
            <div class="modal-body">
              <p>
                <center>
                  <h4><strong>El Codigo <label id="code45"></label> no existe. Reingrese el codigo.</strong></h4>
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

      <a id="vacio_material" href="#modal4" role="button" data-toggle="modal"></a>


      <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
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

      <!--funcion para firma digital-->
      <script type="text/javascript">
        function test5() {
          var url = "firma/firma.php";
          javascript: window.location.href = url;
        }
      </script>

      <a id="exito2" href="#modal5" role="button" data-toggle="modal"></a>

      <!--MODAL PARA FIRMA DIGITAL-->
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
                  <h4><strong>El material se ha descargado.<strong></h4>
                </center>
              </p>

              <input type="image" src='assets/images/firmar.png' name="Firmar" onclick="test5();">

            </div>
            <div class="modal-footer">

            </div>
          </div>
        </div>
      </div>
      <!--FIN ACCIONES PARA FIRMA DIGITAL-->

      <!-- ******************************************************************************************************************* -->


      <!-- ******************************************************************************************************************* -->

      <a id="fallo" href="#modal6" role="button" data-toggle="modal"></a>


      <div id="modal6" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
              <h4 class="alert alert-danger"> <i class="fa fa-warning"></i><strong>Alerta!</strong></h4>
            </div>
            <div class="modal-body">
              <p>
                <center>
                  <h4><strong>Cantidad a descargar excede cantidad en existencia!</strong></h4>
                </center>
              </p>
            </div>
            <div class="modal-footer">
              <button data-dismiss="modal" class="btn red">OK</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- END CONTENT -->


  </div>
  <!-- END CONTAINER -->

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
  </style>


  <?php
  include("footer.php");
  ?>


  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->

  <script src="suministros.descarga2.js"></script>
  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();

      /*
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });
*/

      jQuery("#ok").hide();


      jQuery('#arte').bind('change', function() {

        if (this.files[0].size > 1048576) {

          alert("La imagen que intenta subir excede el tamaño permitido.");
          jQuery("#ok").hide();

        } else {
          jQuery("#ok").show();
        }



      });

    });
  </script>
  <!-- END JAVASCRIPTS -->



  </div>
  </div></span></a></li>
  </ul>
  </div>
  </nav>
  </header>
  </div>


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









  <style type="text/css">
    .zeroPadding {
      padding: 0 !important;
    }
  </style>


  <script type="text/javascript">
    $(document).ready(function() {
      $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
      });





      $(".zoom").hover(function() {

        $(this).addClass('transition');
      }, function() {

        $(this).removeClass('transition');
      });
    });

    $(".rotate").fancybox({
      width: 600,
      height: 300,
      type: 'iframe'
    });
  </script>
  <!-- SCRIPR DE AJAX PARA PASAR VARIABLES A LA MISMA PAGINA-->
  <script type="text/javascript">
    function Hola(nombre, mensaje) {
      var parametros = {
        "Nombre": nombre,
        "Mensaje": mensaje
      };
      $.ajax({
        data: parametros,
        url: 'ajax/procesoAjax.php',
        type: 'post',
        dataType: 'json',

        success: function(response) {

          $("#resultado").html(response);
          $("#resultado2").html(response);
        }

      });
    }
  </script>





  <script src="js/seccion.js"></script>

  <script type="text/javascript">
    function pasarDatos2(id) {


      document.getElementById('id_orden').value = id;








      // document.getElementById('idPrecio').value=id;



    }
  </script>

  <script type="text/javascript">
    function changeColor(newColor) {
      var elem = document.getElementById('para');

    }
  </script>




  <!-- ./col -->

  <!-- /.row -->
  <!-- Main row -->

  <!-- ./wrapper -->

  <!-- jQuery 3 -->




  <!-- END PAGE LEVEL SCRIPTS -->

  <script src="reportes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="reportes/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
  <!-- END CORE PLUGINS -->
  <!-- BEGIN PAGE LEVEL PLUGINS -->
  <script src="reportes/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
  <!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
  <script src="reportes/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
  <!-- END PAGE LEVEL PLUGINS -->
  <!-- BEGIN PAGE LEVEL SCRIPTS -->
  <script src="reportes/assets/global/scripts/metronic.js" type="text/javascript"></script>
  <script src="reportes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
  <script src="reportes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
  <script src="reportes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
  <script src="reportes/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
  <script src="reportes/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
  <script src="reportes/assets/global/plugins/select2/select2.min.js"></script>
  <script src="reportes/assets/admin/pages/scripts/form-samples.js"></script>

  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();

      jQuery(".buttons").on("click", function() {
        jQuery("#page-content").hide();
        jQuery("#page-content").load(jQuery(this).attr("page"));
        jQuery('#page-content').fadeIn(1000);
        return false;
      });

    });
  </script>




</body>

</html>