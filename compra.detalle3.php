

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

    <div class="row">


           



</div>

</div>












<!-- *************************************************************************************************************************************** -->

<?
// *********************************************************************************************************************************** //

if (isset($_REQUEST["compra"])) {

   include("suministros/connect.php");

   $compra=$_REQUEST["compra"];

   $rs_en=$mysqli->query("SELECT * FROM compra WHERE id_compra='".$compra."'");
     while ($fila_en = $rs_en->fetch_assoc()) {  $id_empresa = $fila_en["id_empresa"]; $empresa = $fila_en["empresa"];  $solicita = $fila_en["solicita"]; $fecha = $fila_en["fecha"]; $op = $fila_en["op"]; }

   $mysqli->close();
}


// *********************************************************************************************************************************** //



?>

        
            <div class="col-md-10" >

              <div  id="contenedor3" class="portlet box blue">
                <div class="portlet-title" style="margin-top: 60px;">
                  <div class="caption" >
                    <i class=" icon-book-open font-green-sunglo"></i> Orden Compra # <label  id="orden_color"><?=$compra?></label>&nbsp;&nbsp;&nbsp;
                    <a href="compra.editar.cabecera2.php?compra=<?=$compra?>"><font color="white">Editar Cabecera</font></a>                  </div>
                  
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
                                    <label class="control-label"><strong>Proveedor:</strong></label>&nbsp;&nbsp; <label class="label1" id="cliente_color"><?=$empresa?></label>



                                
                              </div>


                              <div class="col-md-5">
                                    <label class="control-label"><strong>Solicita:</strong></label>&nbsp;&nbsp;<label class="label1" id="vendedor_color"><?=$solicita?></label>

                                      
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
                              <label class="control-label "><strong>Fecha:</strong></label>&nbsp;&nbsp;<label class="label1" id="fecha_color"><?=$fecha?></label>


                                
                              </div>


                              <div class="col-md-5">
                              <label class="control-label"><strong>OP:</strong></label>&nbsp;&nbsp;<label class="label1" id="vendedor_color"><?=$op?></label>

                                      
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

   include("suministros/connect.php");

   $orden=$_REQUEST["orden"];
   $id_detalle = $_REQUEST["det"];

   $rs_m=$mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_detalle_cotizacion='".$id_detalle."' AND id_cotizacion='".$orden."'");
     
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
                         <i class="fa fa-database"></i>         Crear Material</a>
              </div>
                  
            </div>


            <div class="portlet-body form">
              
                <div class="form-body">
                  
                    <form id="form1" action="compra.sql2.php" method="post" role="form">
               
                    <input type="hidden" name="bandera" value="2">
                    <input type="hidden" name="compra" id="orden" value="<?=$compra?>" />
                    <input type="hidden" name="empresa" id="orden" value="<?=$empresa ?>" />
                    <input type="hidden" name="id_empresa" id="orden" value="<?=$id_empresa ?>" />
                                  

               <div class="col-md-4">
                <select id="material" name="material" class="select2_category form-control" >
                <?php

                    include("suministros/connect.php");

                    if (isset($_REQUEST["actu"])) { echo '<option selected value="'.$id_material.'_'.$material.'">'.$material.'</option>'; }

                    echo'<option value="0_Ninguno">Elija un Material</option>';
                    
                    $rs=$mysqli->query("SELECT * FROM material WHERE estado='1' OR estado='3'");

                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'_'.$fila[1].'-'.$fila[2].'">'.$fila[1].'-'.$fila[2].'</option>';  }

                    $mysqli->close();

                ?>    
              </select>
            </div>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




              <input value="<?=$cantidad?>" required size="2"  type="number" name="cantidad" id="cantidad" step="any" min="0" placeholder="Cantidad" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

              <input value="<?=$precio_unitario?>" required size="2" type="number" name="precio_unitario" id="precio_unitario" step="any" min="0" placeholder="Precio" required>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            
               <input type="submit" name="" value="Agregar" class="btn blue">
               </form>

               <br><br><br>

               <?
                  if ($_SESSION['base']=='esa') { 
 
                     ?>
                      <div class="tools">
                      <table border="0" width="45%" cellspacing="10" >
                      <tr><td>
                      <form class="generar" name="form6" action="reportes/compra.pdf.php" target="_self" method="post" >
                      <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                      <input type="hidden" id="iva" name="iva" value="13" />
                      <button id="genera" name="genera" type = "submit" class="btn btn-danger btn-sm" style="font-size: 12px;">Generar Orden</button>
                      </form></td>

                       <td>
                    <form class="generar" name="form6" action="reportes/compra.pdf.php" target="_self" method="post" >
                    <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                    <input type="hidden" id="iva" name="iva" value="0" />
                    <button id="genera" name="genera" type = "submit" class="btn btn-success btn-sm" style="font-size: 12px;">Generar Orden Sin IVA</button>
                    </form>
                    </td>

                      <td>
                      <div class="mok">
                      <form class="generar2" name="form9" action="reportes/compra.imprimir.php" target="_blank" method="post" >
                      <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                      <button type = "submit" class="btn btn-success btn-sm" style="font-size: 12px;">Imprimir Orden</button>
                      </form></div></td>
                      </tr>
                      </table>
                      </div>      
                     <?

                   } 
                  else{  
                     
                    ?>
                    <div class="tools">
                    <table border="0" width="40%" cellspacing="10">
                    <tr><td>
                    <form class="generar" name="form6" action="compra.pdf.php" target="_self" method="post"  >
                    <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                    <input type="hidden" id="moneda" name="moneda" value="dollar" />
                    <input type="hidden" id="iva" name="iva" value="15" />
                    <input type="checkbox" id="contactChoice1" name="ir" value="ir"><label for="contactChoice1"><b>IR</b></label>
                    <button id="genera" name="genera" type = "submit" class="btn btn-danger btn-sm">Generar Orden Dolares</button>
                    </form></td>

                     <td>
                    <form class="generar" name="form6" action="compra.pdf.php" target="_self" method="post" >
                    <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                    <input type="hidden" id="moneda" name="moneda" value="dollar" />
                    <input type="hidden" id="iva" name="iva" value="0" />
                    <input type="checkbox" id="contactChoice2" name="ir" value="ir"><label for="contactChoice2"><b>IR</b></label>
                    <button id="genera" name="genera" type = "submit" class="btn btn-success btn-sm">Dolares Sin IVA</button>
                    </form>
                    </td>

                    </tr>
                    </table>
                    
                    <br>

                    <table border="0" width="40%" cellspacing="10">
                    <tr>
                    <td>
                    <form class="generar" name="form6" action="compra.pdf.php" target="_self" method="post" >
                    <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                    <input type="hidden" id="moneda" name="moneda" value="cordoba" />
                    <input type="hidden" id="iva" name="iva" value="15" />
                    <input type="checkbox" id="contactChoice3" name="ir" value="ir"><label for="contactChoice3"><b>IR</b></label>
                    <button id="genera" name="genera" type = "submit" class="btn btn-danger btn-sm">Generar Orden Cordobas</button>
                    </form>
                    </td>

                     <td>
                    <form class="generar" name="form6" action="compra.pdf.php" target="_self" method="post" >
                    <input type="hidden" id="id" name="id" value="<?=$compra?>" />
                    <input type="hidden" id="moneda" name="moneda" value="cordoba" />
                    <input type="hidden" id="iva" name="iva" value="0" />
                    <input type="checkbox" id="contactChoice4" name="ir" value="ir"><label for="contactChoice4"><b>IR</b></label>
                    <button id="genera" name="genera" type = "submit" class="btn btn-success btn-sm">Cordobas Sin IVA</button>
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
              

               include("suministros/connect.php");

               $compra=$_REQUEST["compra"];

               $cd=$mysqli->query("SELECT * FROM compra_detalle WHERE id_compra='".$compra."'");
               
               $rowcount=mysqli_num_rows($cd);
               
               if($rowcount<=0){ echo "<br><br><b>La orden de compra aun no contiene detalles.</b>";  }
                else{ 

                      ?>
                        <br>
                         <table width="60%" border="1" cellpadding="15">
                          <tr align="center">
                            <td></td>
                            <td><b><font size="2px">Especificación de Material</font></b></td>
                            <td><b><font size="2px">Cantidad</font></b></td>
                            <td><b><font size="2px">Precio</font></b></td>
                            <td><b><font size="2px">Total</font></b></td>
                          </tr>
                          <tr align="center" height="12" ><td colspan="5" ></td></tr>
                       
                      <?
                    
                    $t_o="";
                    while ($fila_en = $cd->fetch_assoc()) { 

                     $idc = $fila_en["id_detalle_compra"];
                     $str = $fila_en["material"];
                     $mat = str_replace("Varios -", "", $str);
                     $pre = $fila_en["precio"];
                     $cat = $fila_en["cantidad"];
                     $tot = $pre * $cat;
                     $costo_total=number_format($tot, 2, '.', '');
                     $t_o=$t_o + $costo_total;
                     echo ' <tr><td align="center"><a class="delete" href="compra.sql2.php?bandera=3&det='.$idc.'&compra='.$compra.'" ><img id="ex2" src="images/eli.png" alt="Eliminar Registro" /></a></td><td align="left">&nbsp;&nbsp;'.$mat.'</td><td align="center">'.$cat.'</td><td align="center">$'.$pre.'</td><td align="right"> $'.$costo_total.'&nbsp;</td></tr>';

                    }

                     $sub_total=number_format($t_o, 2, '.', '');
                     if ($_SESSION['base']=='esa') { $iv=0.13*$t_o; $en="IVA(13%)"; } else { $iv=0.15*$t_o; $en="IVA(15%)"; }
                     $iva=number_format($iv, 2, '.', '');
                     $tf=$t_o + $iva;
                     $total_orden=number_format($tf, 2, '.', '');

                    ?>
                        <tr align="center" height="12" ><td colspan="5" ></td></tr>

                        <tr align="right"><td colspan="4" ><b>Subtotal</b>&nbsp;</td><td><b>$<?=$sub_total?></b>&nbsp;</td></tr>
                        <tr align="right"><td colspan="4" ><b><?=$en;?></b>&nbsp;</td><td><b>$<?=$iva?></b>&nbsp;</td></tr>
                        <tr align="right"><td colspan="4" ><b>Costo Total</b>&nbsp;</td><td><b>$<?=$total_orden?></b>&nbsp;</td></tr>
                        </table>

                    <?

                }
              
               $mysqli->close();
            
          ?>
          <!-- ************************************************************************************************************************************** -->

 

           

                </div>
                <br><br>
                <? if(isset($_REQUEST['flag'])){ echo "<font size='4px'><b>El correo fue enviado.</b></font>";   } ?>    
            <!--/row-->
            <div class="row mok">
                          <div id="fms0" class="col-md-12">



                          <div id="fms" class="col-md-10">

                                       

                                  
                                

                                      
                              <form id="fomr1" method="post" action="compra.sql2.php"  class="form-horizontal" enctype="multipart/form-data">
                                        <input type="hidden" name="bandera" value="6" >
                                        <input type="hidden" name="orden" value="<?=$_REQUEST["compra"]?>" >
                                        
                                        <label class="control-label "><strong>Mensaje</strong></label>
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

                                          <input type="checkbox" name="senora" value="a.decampos@hotmail.com" >Arq. Ana Maria de Campos


                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input size="35px" type="text" id="email2" name="email2" /><br>

                                          <input type="checkbox" name="toto" value="ecampos@campospenate.com">Lic. Eduardo Campos
                                          
                                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <input size="35px" type="text" id="email3" name="email3" /><br>

                                          <input type="checkbox" name="guli" value="nyracampos@gmail.com" >Lic. Ana Maria Campos<br>

                            
                                          </div>

                                    

                                           
                                            <br><br>


                                          <div class="input">
                                            <input type="submit" name="eviar" value="Enviar Correo" class="btn yellow">
                                            </div>
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
                    <input type="hidden" name="compra" value="<?=$_REQUEST["compra"]?>">
                      <div class="form-body">
                        

                                               <!--/row-->
                        <div class="row">
                          <div class="col-md-9">
                            <div class="form-group">
                              <label class="control-label col-md-3"><strong>Tipo:</strong></label>

                              <div class="col-md-9">
                                <select id="material_tipo" name="material_tipo" class="select2_category form-control"  tabindex="1">
                                  <option value="0">Seleccione</option>
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM material_tipo WHERE estado=1 ORDER BY id");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[1].'">'.$fila[1].'</option>';  }

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
                                <select id="material_cat" name="material_cat" class="select2_category form-control"  tabindex="1">
                                  <option value="0">Seleccione</option>
                                <?php

                                    include("suministros/connect.php");
                                    
                                    $rs=$mysqli->query("SELECT * FROM material_categoria WHERE estado=1 ORDER BY id");

                                       while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[2].'">'.$fila[1].'</option>';  }

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
             <center><h4><strong>Se ha creado la cotizacion exitosamente.<strong></h4></center>
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

<a id="exito_detalle" href="#modal3" role="button"  data-toggle="modal"></a>


  <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Se ha eliminado el detalle exitosamente.<strong></h4></center>
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

<a id="exito_detalle2" href="#modal4" role="button"  data-toggle="modal"></a>


  <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>El detalle se ha actualizado exitosamente.<strong></h4></center>
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

<a id="exito_detalle3" href="#modal5" role="button"  data-toggle="modal"></a>


  <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Se ha agregado el detalle exitosamente.<strong></h4></center>
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


#detalle_color{


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


#ex2 { width: 25px; height: 25px;     }

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
            if ($_SESSION['base']=='esa') {
         ?>
        //-----------------------------------------------------------------

          jQuery(document).on('click','#genera',function(){

          jQuery( ".mok" ).show(); 
            
          });
        //-----------------------------------------------------------------

         <?
     } 
   ?>



  
   
   //-----------------------------------------------------------------

        jQuery( '#cantidad,#precio_unitario' ).keyup(function() {
                       
                        var c = jQuery( '#cantidad' ).val();
                        var pu = jQuery( '#precio_unitario' ).val();
                       // var porcentaje= jQuery( "#porcentaje option:selected").val();
                       var porcentaje= 0;
                        var cp;

                        if(c==""){ c=0; }
                        if(pu==""){ pu=0; } 

              if(porcentaje==0.13){
                     cp = parseFloat(c)*parseFloat(pu);
                     jQuery( '#costo_total' ).val( cp.toFixed(2) );   
                     civa = parseFloat(cp) * 0.13
                     jQuery( '#iva' ).val( civa.toFixed(2) );    
                     tf= parseFloat(cp) + parseFloat(civa)
                     jQuery( '#total_oferta' ).val( tf.toFixed(2) );
                       
             }
             else if(porcentaje==0.15){

                     cp = parseFloat(c)*parseFloat(pu);
                     jQuery( '#costo_total' ).val( cp.toFixed(2) );   
                     civa = parseFloat(cp) * 0.15
                     jQuery( '#iva' ).val( civa.toFixed(2) );    
                     tf= parseFloat(cp) + parseFloat(civa)
                     jQuery( '#total_oferta' ).val( tf.toFixed(2) );
             }
             else if (porcentaje==0){
                     
                      tf = parseFloat(c)*parseFloat(pu);
                      jQuery( '#costo_total' ).val( tf.toFixed(2) );  
                      //jQuery( '#iva' ).val( 0.00 );  
                      jQuery( '#total_oferta' ).val( tf.toFixed(2) );  
                     
            }
             
        }).keyup();


        jQuery( "#porcentaje" ).change(function() {
         

           var c = jQuery( '#cantidad' ).val();
                        var pu = jQuery( '#precio_unitario' ).val();
                        var porcentaje= jQuery( "#porcentaje option:selected").val();
                        var cp;

                        if(c==""){ c=0; }
                        if(pu==""){ pu=0; } 

              if(porcentaje==0.13){
                     cp = parseFloat(c)*parseFloat(pu);
                     jQuery( '#costo_total' ).val( cp.toFixed(2) );   
                     civa = parseFloat(cp) * 0.13
                     jQuery( '#iva' ).val( civa.toFixed(2) );    
                     tf= parseFloat(cp) + parseFloat(civa)
                     jQuery( '#total_oferta' ).val( tf.toFixed(2) );
                       
             }
             else if(porcentaje==0.15){

                     cp = parseFloat(c)*parseFloat(pu);
                     jQuery( '#costo_total' ).val( cp.toFixed(2) );   
                     civa = parseFloat(cp) * 0.15
                     jQuery( '#iva' ).val( civa.toFixed(2) );    
                     tf= parseFloat(cp) + parseFloat(civa)
                     jQuery( '#total_oferta' ).val( tf.toFixed(2) );
             }
             else if (porcentaje==0){
                     
                      tf = parseFloat(c)*parseFloat(pu);
                      jQuery( '#costo_total' ).val( tf.toFixed(2) );  
                      jQuery( '#iva' ).val( 0.00 );  
                      jQuery( '#total_oferta' ).val( tf.toFixed(2) );  
                     
            }



        });


        //----------------------------------------------------------



        

       //----------------------------------------------------------

        jQuery(document).on('click','.delete',function(){

                    //jQuery("#page-content").hide(); 
                    var ff =jQuery(this).attr("page");
                    var bandera = 3;


                    // AJAX Code To Submit Form.
                      var dataString = 'det='+ ff + '&bandera='+ bandera;

                      jQuery.ajax({
                      type: "POST",
                      url: "cot.sql.php",
                      data: dataString,
                      cache: false,
                      //contentType: false,
                      //processData: false,
                                 
                      success: function(result){

                          if(result != '')
                          {                    

                              
                              jQuery( "#collapse_"+ff ).hide();
                        jQuery( "#pnn_"+ff ).hide();
                        jQuery( "#aq_"+ff ).hide(); 
                        jQuery('#exito_detalle').click();
                          }


                       }

                    });
                          
                    //jQuery('#page-content').fadeIn(1000);
                   // return false;

               });

     //----------------------------------------------------------


//*************************************************************************************************
jQuery("#actualizar_detalle").click(function(){
jQuery( "#actualizar_detalle" ).prop( "disabled", true );    



var orden = jQuery("#orden").val();
var id_detalle = jQuery("#id_detalle").val();
var costo_total = jQuery("#costo_total").val();
var cantidad = jQuery("#cantidad").val();
var precio_unitario = jQuery("#precio_unitario").val();
var iva = jQuery("#iva").val();
var total_oferta = jQuery("#total_oferta").val();
var detalle = jQuery("#detalle").val();
var bandera = 4;

textarea_line = detalle.replace(new RegExp("\n","g"), "<br>");
 
     

if(cantidad=='' || precio_unitario=='' || detalle=='' )
{
  jQuery('#vacio').click();
  jQuery( "#actualizar_detalle" ).prop( "disabled", false );
}
else
{
                
    
      jQuery("#form1").submit();
        


}
//*************************************************************************************************

return false;
});
//**************************************************************************************************







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
  <!-- js placed at the end of the document so the pages load faster -->
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





<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->


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
