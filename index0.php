<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];

   

//$foto=$_SESSION['vsFoto'];

include("connect.php");
$conexion = conexion();
include("cortes.php");
   
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->

  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <link href="css/theme.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">




  <!-- CSS Just for demo purpose, don't include it in your project -->


<!--------------------------------------------------------------------------------

        <link rel="stylesheet" href="modal/plugins/bootstrap/dist/css/bootstrap.min.css">          
        <link rel="stylesheet" href="modal/plugins/icon-kit/dist/css/iconkit.min.css">
        <link rel="stylesheet" href="modal/dist/css/theme.min.css">
<!--------------------------------------------------------------------------------->









</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <?$img=$base.".png";?>
      <span class="logo-lg"><b>COLOR</b><img width="40"  src="imagenes/<?echo $img;?>">     DIGITAL</span>
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
                
                  <small>Uso exclusivo para clientes 2019 <br><? echo $nombre.$id;?></small> <button type="button" class="nav-link ml-10" id="apps_modal_btn" data-toggle="modal" data-target="#appsModal"><i class="ik ik-grid"></i></button>
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
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    
    
 <? include("conteo_metros.php");?>

       
    <!-- Main content -->
     <!--<div class="main-content" style="margin-top: -150px; height: 50px;" >
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="oVER MASview-wrap">
                                    <h2 class="title-1">Sistema Produccion C.D</h2>
                                    <button class="au-btn au-btn-icon au-btn--blue">
                                      
                                </div>
                            </div>

                        </div>

                        <div class="row m-t-25">
                            <div class="col-sm-6 col-lg-4">
                                <div class="oVER MASview-item oVER MASview-item--c2">
                                    <div class="oVER MASview__inner">
                                        <div class="oVER MASview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-label"></i>
                                            </div>
                                            <div class="text" align="center">
                                                <h2> <?=$ordenes_activas?></h2>
                                                <span> PO Ordenes Activas</span>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div class="oVER MASview-item oVER MASview-item--c1">
                                    <div class="oVER MASview__inner">
                                        <div class="oVER MASview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check-all"></i>
                                            </div>
                                            <div class="text" align="center">
                                                <h2><?=$ordenes_finalizadas?></h2>
                                                <span> Ordenes Finalizadas </span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>

                             <div class="col-sm-6 col-lg-4">
                                <div class="oVER MASview-item oVER MASview-item--c3">
                                    <div class="oVER MASview__inner">
                                        <div class="oVER MASview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-print" style=""></i>
                                            </div>
                                            <div class="text" align="center">
                                                <h2> <?=number_format($totals, 2, '.', ',')?> Mts²</h2>
                                                <span> Metros Impresos</span>
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                          
                            <div class="col-sm-6 col-lg-4">
                                <div class="oVER MASview-item oVER MASview-item--c4">
                                    <div class="oVER MASview__inner">
                                        <div class="oVER MASview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-copy"></i>
                                            </div>
                                            <div class="text" align="center">
                                                <h2><?=$cotis?></h2>
                                                <span> Cotizaciones Color Digital</span>
                                            </div>
                                        </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>-->
                             <!-- |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| -->

<?
$nivel=$_SESSION['nivel'];

if ($nivel==1|| $nivel==2) {?>
 


<section class="content">

      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-info">
              <div class="inner">
                <p><h3 style="color:#fff" ><?=$ordenes_activas?></h3></p>

                <p>Ordenes Activas</p>
              </div>
              <div class="icon">
                <i class="ion-ios-albums"></i>
              </div>
              <a href="po.activas.php" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <h3 style="color:#fff"><?=$ordenes_finalizadas?></sup></h3>

                <p>Ordenes Finalizadas</p>
              </div>
              <div class="icon">
                <i class="ion-ios-bookmarks"></i>
              </div>
              <a href="po.fin.php" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-warning">
              <div class="inner">
                <h3 style="color:#fff"><?=number_format($totals, 2)?></h3>

                <p>Metros Impresos</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-danger">
              <div class="inner">
                <h3 style="color:#fff"><?=$cotis?></h3>

                <p>Cotizaciones Color Digital</p>
              </div>
              <div class="icon">
                <i class="ion-clipboard"></i>
              </div>
              <a href="cotizaciones.php" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-danger">
              <div class="inner">
                <h3 style="color:#fff"><?=$ordenes_activas_pop?></h3>

                <p>Ordenes Activas POP</p>
              </div>
              <div class="icon">
                <i class="ion-ios-briefcase"></i>
              </div>
              <a href="ajax3.php" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-primary">
              <div class="inner">
                <h3 style="color:#fff"><?=$ordenes_finalizadas_pop?></h3>

                <p>Ordenes Finalizadas POP</p>
              </div>
              <div class="icon">
                <i class="ion-checkmark-round"></i>
              </div>
              <a href="ajax3_fin.php" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-success">
              <div class="inner">
                <h3 style="color:#fff"><?=number_format($totals_pop, 2)?></h3>

                <p>POP Metros Impresos</p>
              </div>
              <div class="icon">
                <i class="ion-ios-pricetags"></i>
              </div>
              <a href="#" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
            <?  if ($_SESSION['base']=='esa') {
?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box btn-info">
              <div class="inner">
                <h3 style="color:#fff"><?=$cotiv?></h3>

                <p>Cotizaciones Vyasal</p>
              </div>
              <div class="icon">
                <i class="ion-clipboard"></i>
              </div>
              <a href="#" class="small-box-footer">VER MAS <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <?}?>

      </div>
    <section>

    
<?}?>
<div style="margin-top: 260px; margin-left: 400px;">
Sistema Produccion Color Digital 2020
   </div>        

      <!-- Button trigger modal -->
   <? include("modal_tintas.php")?>
    
<!-- ./wrapper -->

<!-- jQuery 3 -->
     <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>     
     
        <script src="modal/plugins/bootstrap/dist/js/bootstrap.min.js"></script>
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
  <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>
</html>
