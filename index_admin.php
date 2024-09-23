<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];

$nombre=$_SESSION['vsNombre'];
$user=$_SESSION['user'];

unset($_SESSION['vsIdtemporal']);  
//$foto=$_SESSION['vsFoto'];

   include("connect.php");
   $conexion = conexion();

  $TRANSITO = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1  and t1.status!='PROCESO' and t1.status!='CARGANDO' and t1.status!='DESPACHO' order by t1.f_llegada asc
 ");

  $ordenessv=mysqli_num_rows($TRANSITO);


 $aduana = mysqli_query($conexion,"   select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1  and t1.status!='PROCESO' and t1.status!='CARGANDO' and t1.status!='DESPACHO' and t1.status!='TRANSITO' order by t1.f_llegada asc
 ");

  $aduanasv=mysqli_num_rows($aduana);


















   include("connect2.php");
   $conexion2 = conexion2();

  $consulta = mysqli_query($conexion2," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE  a1.estado=1 and a1.status='TRANSITO' OR a1.status='ADUANA DE SALIDA' OR a1.status='ADUANA DE DESTINO' OR a1.status='PROBLEMA' order by a1.f_llegada asc

 ");

    $ordenesni=mysqli_num_rows($consulta);

    $ordenesaduana=$ordenesni+$aduanasv;


    $ordenes_transito=$ordenessv+$ordenesni;



  $PROCESO = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1  and t1.status='PROCESO' OR t1.status='CARGANDO' OR t1.status='DESPACHO'  order by t1.f_llegada asc
 ");

    $ordenes_prosv=mysqli_num_rows($PROCESO);

   

   if ($nombre=="COLGATE PALMOLIVE CA") {

       $nombre="COLGATE PALMOLIVE CA INC";
     }

  $consulta = mysqli_query($conexion2,"  
   select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE  a1.estado=1 and a1.status='PROCESO' OR a1.status='CARGANDO' OR a1.status='DESPACHO' order by a1.f_llegada asc


 ");


    $ordenes_proni=mysqli_num_rows($consulta);

    $ordenes_proceso=$ordenes_proni+$ordenes_prosv;



    $ENTREGADAS = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0    order by t1.f_llegada asc
 ");

      $ordenes_ensv=mysqli_num_rows($ENTREGADAS);





$consulta = mysqli_query($conexion2,"  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc

 ");
  


    $ordenes_enni=mysqli_num_rows($consulta);


    $ordenes_entregadas=$ordenes_enni+$ordenes_ensv;









   

   
?>





<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
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
        <span class="sr-only">BIENVENIDO</span>
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
              <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs">ADMINISTRADOR</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="img-circle" alt="User Image">

                <p>
                 ADMINISTRADOR
                  <small>Uso exclusivo para clientes 2019 <? echo $nombre;?></small>
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

    <? include ('aside2.php');?>
 

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      
        CLIENTES
      </h1>
      <ol class="breadcrumb">
        <li><a href="index_admin.php"><i class="fas fa-door-open"></i> PAGINA PRINCIPAL</a></li>
        <li class="active">REGISTRO</li>
      </ol>
    </section>
<br><br><br><br>
    <!-- Main content -->
    <section class="responsive">
      <!-- Small boxes (Stat box) -->
      <div class="responsive">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <img src="logos3/pep.jpg" width="100%" height="150">
            <a href="index_unido.php?id=4595" class="small-box-footer">VER ORDENES <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="responsive">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <img src="logos3/colgate.jpg" width="100%" height="150">
            <a href="index_unido.php?id=4193" class="small-box-footer">VER ORDENES <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="responsive">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <img src="logos3/genomma.jpg" width="100%" height="150">
            <a href="index_unido.php?id=4612" class="small-box-footer">VER ORDENES <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
       <div class="responsive">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <img src="logos3/hh.jpg" width="100%" height="150">
            <a href="index_unido.php?id=4459" class="small-box-footer">VER ORDENES <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      <!-- Main row -->
    
<!-- ./wrapper -->

<!-- jQuery 3 -->
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
</body>
</html>
