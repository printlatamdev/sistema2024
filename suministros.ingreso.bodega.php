

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];



  ?>
   



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
  
  
 

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
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>


<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>


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


     



   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>COLOR</b>DIGITAL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">BIENVENIDO </span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
                  <!-- end message -->
                  
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="imagenes/persona.png" class="user-image" alt="User Image">
              <span class="hidden-xs"> <? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="imagenes/persona.png" class="img-circle" alt="User Image">

                <p>
                
                  <small>Uso exclusivo Color Digital 20<?echo $anio;?> <br> <? echo $nombre.$id;?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <? include ('aside.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">





     <div class="container">

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

                                    $mysqli->close();

                                                                ?>
                                  
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

                                    $mysqli->close();

                                                                ?>
                                  
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
<!-- END JAVASCRIPTS -->


             
      </div></div></span></a></li></ul></div></nav></header></div>
            

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



  <?php include("html/modal_add.php");?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php");?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php");?>
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



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>












</body>
</html>
