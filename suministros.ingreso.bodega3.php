

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];



  ?>
   







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta http-equiv="Expires" content="0">
  <meta http-equiv="Last-Modified" content="0">
  <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
  <meta http-equiv="Pragma" content="no-cache">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="update/update/img/favicon.png" rel="icon">
  <link href="update/update/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="update/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="update/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="update/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="update/lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="update/css/style.css" rel="stylesheet">
  <link href="update/css/style-responsive.css" rel="stylesheet">
  <script src="update/lib/chart-master/Chart.js"></script>

    <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="update/assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="update/assets/demo/demo.css" rel="stylesheet" />
   <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

      <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">

  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>


<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>

<!--LINK DE NUEVA PAGINA-->

<!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->


  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/navigation-dark.css">
  <link rel="stylesheet" href="assets/slicknav/slicknav.min.css">
  <!------ Include the above in your HEAD tag ---------->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">
  <link href="produccion/css/bootstrap.min.css" rel="stylesheet">
  <link href="produccion/css/style_nav.css" rel="stylesheet">

  <!-- END THEME STYLES -->
  <link rel="shortcut icon" href="images/color.ico"/>

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->

  <style type="text/css">
 

body {
  font-size: 140%;

  
}

p {
  font: oblique bold 120% cursive;
}
h1 {
  font: oblique bold 120% cursive;
}
h2{
  font: oblique bold 120% cursive;
}
h3 {
  font: oblique bold 120% cursive;
}
td {

font-family: sans-serif;
  font-weight: bolder;
}

</style>
  </style>
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>DASH<span>IO</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu">
          <!-- settings start -->
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-tasks"></i>
              <span class="badge bg-theme">4</span>
              </a>
            <ul class="dropdown-menu extended tasks-bar">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 4 pending tasks</p>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Dashio Admin Panel</div>
                    <div class="percent">40%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                      <span class="sr-only">40% Complete (success)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Database Update</div>
                    <div class="percent">60%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                      <span class="sr-only">60% Complete (warning)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Product Development</div>
                    <div class="percent">80%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                      <span class="sr-only">80% Complete</span>
                    </div>
                  </div>
                </a>
              </li>
              <li>
                <a href="index.html#">
                  <div class="task-info">
                    <div class="desc">Payments Sent</div>
                    <div class="percent">70%</div>
                  </div>
                  <div class="progress progress-striped">
                    <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                      <span class="sr-only">70% Complete (Important)</span>
                    </div>
                  </div>
                </a>
              </li>
              <li class="external">
                <a href="#">See All Tasks</a>
              </li>
            </ul>
          </li>
          <!-- settings end -->
          <!-- inbox dropdown start-->
          <li id="header_inbox_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-theme">5</span>
              </a>
            <ul class="dropdown-menu extended inbox">
              <div class="notify-arrow notify-arrow-green"></div>
              <li>
                <p class="green">You have 5 new messages</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-zac.jpg"></span>
                  <span class="subject">
                  <span class="from">Zac Snider</span>
                  <span class="time">Just now</span>
                  </span>
                  <span class="message">
                  Hi mate, how is everything?
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-divya.jpg"></span>
                  <span class="subject">
                  <span class="from">Divya Manian</span>
                  <span class="time">40 mins.</span>
                  </span>
                  <span class="message">
                  Hi, I need your help with this.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-danro.jpg"></span>
                  <span class="subject">
                  <span class="from">Dan Rogers</span>
                  <span class="time">2 hrs.</span>
                  </span>
                  <span class="message">
                  Love your new Dashboard.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="photo"><img alt="avatar" src="update/img/ui-sherman.jpg"></span>
                  <span class="subject">
                  <span class="from">Dj Sherman</span>
                  <span class="time">4 hrs.</span>
                  </span>
                  <span class="message">
                  Please, answer asap.
                  </span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all messages</a>
              </li>
            </ul>
          </li>
          <!-- inbox dropdown end -->
          <!-- notification dropdown start-->
          <li id="header_notification_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="index.html#">
              <i class="fa fa-bell-o"></i>
              <span class="badge bg-warning">7</span>
              </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-yellow"></div>
              <li>
                <p class="yellow">You have 7 new notifications</p>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Server Overloaded.
                  <span class="small italic">4 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-warning"><i class="fa fa-bell"></i></span>
                  Memory #2 Not Responding.
                  <span class="small italic">30 mins.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-danger"><i class="fa fa-bolt"></i></span>
                  Disk Space Reached 85%.
                  <span class="small italic">2 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">
                  <span class="label label-success"><i class="fa fa-plus"></i></span>
                  New User Registered.
                  <span class="small italic">3 hrs.</span>
                  </a>
              </li>
              <li>
                <a href="index.html#">See all notifications</a>
              </li>
            </ul>
          </li>
          <!-- notification dropdown end -->
        </ul>
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
 
          <?include("menu_new.php")?>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content" >
      <section class="wrapper" >


   



<div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption">
                <i class="fa  fa-cubes"></i>Ingreso de Suministros
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
                    
                    
                    <li class="active" >
                      <a href="#tab_6_1" data-toggle="tab">
                      <strong>Materiales</strong> </a>
                    </li>


                    <li >
                      <a href="#tab_6_3" data-toggle="tab">
                      <strong>Tintas</strong> </a>
                    </li>

                    
                  </ul>
                </div>
                       




                          <div class="col-md-8 col-sm-8 col-xs-8">
                  <div class="tab-content">
                    
                      
         <!-- *********************************************************************** -->
                     <div class="tab-pane fade"  id="tab_6_3">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                           <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Ingreso de Tintas</span>
                        </div>
                        <div class="actions">
                          
                        </div>
                      </div>


                      <div class="portlet-body form">
                      <form id="fomr_tinta" method="post" action="suministros.descargas.php" class="form-horizontal" enctype="multipart/form-data">
                      <input type="hidden" value="5" name="bandera" id="bandera">
                          <div class="form-body">
                            


                             <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Tipo:</strong></label>
                              <div class="col-md-9">
                                <select id="tipo_tinta" name="tipo_tinta" class="select2_category form-control"  tabindex="1">

                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT tipo  FROM `tinta_tipo` WHERE estado='1'"); 

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

                                    $mysqli->close(); ?>

                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->


                        <br>



                         <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Color:</strong></label>
                              <div class="col-md-9">
                                <select id="color_tinta" name="color_tinta" class="select2_category form-control"  tabindex="1">
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT DISTINCT color FROM tinta");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[0].'</option>';  }

                                    $mysqli->close();?>
                                    <option value="white">white</option>
                                  
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                        <br>



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
                                  <input name="cantidad_tinta" id="cantidad_tinta" type="text" class="form-control input-circle-right " required>
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->
                        <br>

                            <!--/row-->
                            <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Comprobante 1:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compro_1" name="compro_1" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compro_1"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                                                    <br>


                          <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Comprobante 2:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compro_2" name="compro_2" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compro_2"><strong>OK</strong></label>
                                            </div>

                                  
                                    </div>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--/row-->

                          

                            
                            
                          </div>
                          <div class="form-actions noborder">
                              <button  type="submit" class="btn blue">Ingresar</button>
                            <!--<button id="ingreso_tinta" type="button" class="btn blue">Ingresar</button>-->
                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                                          <!-- *********************************************************************** -->
                                            <form id="excel_form"  role="form" method="post" action="excel.tinta.php">
                          <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="dd-mm-yyyy">
                          <span class="input-group-addon">Fecha:</span>
                        <input type="text" class="form-control" name="fecha" required>
                      </div>

                      <br>
                                            <button id="excel" type="submit" class="btn red">Generar Excel</button> 
                                            </form>
                                          <!-- *********************************************************************** -->

                    </div>



                     <!-- *********************************************************************** -->
                     <div class="tab-pane fade" id="tab_6_2">
                    <!-- BEGIN SAMPLE FORM PORTLET-->
                    <div class="portlet light bordered">
                      <div class="portlet-title">
                        <div class="caption font-black-sunglo">
                           <i class="icon-arrow-down font-black"></i>
                          <span class="caption-subject bold ">Ingreso de Papel</span>
                        </div>
                        <div class="actions">
                          
                        </div>
                      </div>
                      <div class="portlet-body form">
                        <form  role="form" method="post" action="#">
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
                                  Color</label>
                                  <label class="radio-inline">
                                  <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="campos" />
                                  Campos </label>
                                  <label class="radio-inline">
                                  <input class="rad" type="radio" name="empresa_papel" id="empresa_papel" value="Cnl" />
                                  Color en Linea </label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                        <!--/row--> 


                            
                            
                          </div>
                          <div class="form-actions noborder">
                            <button id="papel" type="button" class="btn blue">Ingresar</button>
                            
                          </div>
                        </form>
                      </div>
                    </div>
                    <!-- END SAMPLE FORM PORTLET-->


                    </div>

                    
          <!-- ******************************************************************************************** -->       

                    
          <!-- ******************************************************************************************** -->         
                     <div class="tab-pane active"  id="tab_6_1">
                          
          <div class="portlet light bordered">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class="icon-arrow-down font-black"></i>
                        <span class="caption-subject bold ">Ingreso de Materiales</span>
                    </div>
                    <div class="tools">
                      
                    </div>
                  </div>
                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form id="fomr2" method="post" action="suministros.descargas.php" class="form-horizontal" enctype="multipart/form-data">
                      <input type="hidden" value="9" name="bandera" id="bandera">
                      <div class="form-body">


                         <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Orden de Compra:</strong></label>
                              <div class="col-md-9">
                                <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>
                                  <input name="compra" id="compra" type="text" class="form-control input-circle-right " required>
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
                              <label class="control-label col-md-3"><strong>Proveedor:</strong></label>
                              <div class="col-md-9">
                                <select id="proveedor" name="proveedor" class="select2_category form-control"  tabindex="1" required>
                                <option value="0">Seleccione Proveedor</option> 
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM proveedor");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'. $fila[0].'_'. $fila[1].'">'.strtoupper($fila[1]).'</option>';  }

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
                              <label class="control-label col-md-3"><strong>Material:</strong></label>
                              <div class="col-md-9">
                                <select id="material" name="material" class="select2_category form-control"  tabindex="1" required>
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM material WHERE estado=1");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].' - '.$fila[2].'</option>';  }

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
                              <label class="control-label col-md-3"><strong>Cantidad:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>
                                  <input name="cantidad" id="cantidad" type="text" class="form-control input-circle-right " required>
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
                              <label class="control-label col-md-3"><strong>Orden Compra:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="compra_imagen" name="compra_imagen" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_compra"><strong>OK</strong></label>
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
                              <label class="control-label col-md-3"><strong>Factura:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-sort-down"></i>
                                  </span>

                                              <div class="input">
                                            <label class="custom-file-upload">
                                                <input type="file" id="factura_imagen" name="factura_imagen" />
                                                Seleccionar Foto
                                            </label>
                                            <label id="ok_factura"><strong>OK</strong></label>
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
                              <label class="control-label col-md-3"><strong>Nota:</strong></label>
                              <div class="col-md-9">
                                
                                  <div class="input-group">
                                  
                                  <textarea cols="45" rows="4" name="nota" id="nota"></textarea>
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
                                <button  type="submit" class="btn blue">Ingresar</button>

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

  <a id="vacio" href="#modal1" role="button"  data-toggle="modal"></a>


  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Ingrese un Codigo!</strong></h4></center>
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

<a id="exito" href="#modal2" role="button"  data-toggle="modal"></a>


  <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El Codigo <label id="code"></label> se ha descargado.<strong></h4></center>
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

  <a id="error" href="#modal3" role="button"  data-toggle="modal"></a>


  <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel3" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El Codigo <label id="code2"></label> ya se encuentra descargado.</strong></h4></center>
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

  <a id="vacio_material" href="#modal4" role="button"  data-toggle="modal"></a>


  <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Por favor llene todos los campos del formulario.</strong></h4></center>
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

<a id="exito2" href="#modal5" role="button"  data-toggle="modal"></a>


  <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El material se ha ingresado con exito.<strong></h4></center>
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

  <a id="fallo" href="#modal6" role="button"  data-toggle="modal"></a>


  <div id="modal6" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Cantidad a descargar excede cantidad en existencia!</strong></h4></center>
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

<a id="exito3" href="#modal7" role="button"  data-toggle="modal"></a>


  <div id="modal7" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>La tinta se ha ingresado con exito.<strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn green">OK</button>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->








<?
include("footer.php");
?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();



    jQuery( "#ok_compra" ).hide();
    jQuery( "#ok_factura" ).hide();
  jQuery( "#ok_compro_1" ).hide();
    jQuery( "#ok_compro_2" ).hide();


   jQuery('#compra_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compra" ).hide();

    }else{ jQuery( "#ok_compra" ).show(); }
   });


   jQuery('#factura_imagen').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_factura" ).hide();

    }else{ jQuery( "#ok_factura" ).show(); }
   });  


   
   jQuery('#compro_1').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compro_1" ).hide();

    }else{ jQuery( "#ok_compro_1" ).show(); }
   });   


   
   jQuery('#compro_2').bind('change', function() {

    if (this.files[0].size>1048576) { 

      alert("La imagen que intenta subir excede el tamaño permitido.");
        jQuery( "#ok_compro_2" ).hide();

    }else{ jQuery( "#ok_compro_2" ).show(); }
   });   


   
      
});


</script>

      

        <!-- ./col -->
       
      <!-- /.row -->
      <!-- Main row -->
    
<!-- ./wrapper -->

<!-- jQuery 3 -->




<script type="text/javascript">
  


  $(document).ready(function(){
      $("tr.Galleta_Grande").on('click', function()  { 
    $(this).next("tr.Galleta_Chica").toggle(); 
});
      $('tr.Galleta_Grande').click();
});


</script>

             
      </div></div></span></a></li></ul></div></nav></header></div>
        <!-- /row -->
      </section>
    </section></section>
    <!--main content end-->
    <!--footer start-->
   
    <!--footer end-->
  </section>

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
<!-- IMPORTANsuministros/T! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGEsuministros/ LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="suministros/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>




 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>



 <script src="update/lib/jquery/jquery.min.js"></script>

  <script src="update/lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="update/lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="update/lib/jquery.scrollTo.min.js"></script>
  <script src="update/lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="update/lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="update/lib/common-scripts.js"></script>
  <script type="text/javascript" src="update/lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="update/lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="update/lib/sparkline-chart.js"></script>
  <script src="update/lib/zabuto_calendar.js"></script>




</body>

</html>
