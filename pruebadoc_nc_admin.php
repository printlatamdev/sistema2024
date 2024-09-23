<?
//include("session.php");
//include("connect.php");

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
$nombre=$_SESSION['vsNombre'];

$id       = $_GET["id"];

   include("connect2.php");
   $conexion = conexion2();
   

  $consulta = mysqli_query($conexion," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.p_vehiculo, a2.id_orden, a2.cot, a3.id_cotizacion, a3.archivo from logitica a1 INNER JOIN pop_detalle a2 ON a1.id_orden=a2.id_orden inner join cotizacion a3 on a2.cot=a3.id_cotizacion WHERE a1.id_orden='".$id."' order by a1.f_llegada asc
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {
                                    $destino=$row[7];
                                    $manifiesto=$row[12];
                                    $carta_porte=$row[13];
                                    $factura=$row[14];
                                    $duca_f=$row[16];
                                    $duca_t=$row[15];  
                                    $nota_envio=$row[17];
                                    $orden_compra=$row[18];
                                    $p_vehiculo=$row[19];
                                    $archivo=$row[23];
                                    
                                                              


                                   }




                                   if ($factura==null) {

                                    $mensaje1="Sin subir";
                                     # code...
                                   }
                                   else{

                                    $mensaje1="Ver Factura";
                                   }

                                 


                                 if ($duca_f==null) {

                                  $mensaje2="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje2="Ver Duca_f";

                                  }

                                   if ($nota_envio==null) {

                                  $mensaje3="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje3="Ver nota_envio_cd";

                                  }


                                   if ($orden_compra==null) {

                                  $mensaje4="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje4="Ver orden_compra";

                                  }
                               



                               if ($carta_porte==null) {

                                  $mensaje5="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje5="Ver Carta_porte";

                                  }

                                   if ($manifiesto==null) {

                                  $mensaje6="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje6="Ver Manifiesto";

                                  }


                                   if ($duca_t==null) {

                                  $mensaje7="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje7="Ver Duca_t";

                                  }
                               

                               




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

   <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/navigation-dark.css">
    <link rel="stylesheet" href="assets/slicknav/slicknav.min.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



  <script>
    $('[data-fancybox]').fancybox({
  protect: true
});
function myFunction(val) {
    var v =  val;
    window.open("documentos.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}

function myFunction2(val) {
    var v =  val;
    window.open("fotoprueba.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,top=1,left=2000,width=2000,height=2000");
}
</script>

 <SCRIPT language=Javascript>
    
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode==32){ return true;} 
         else{  
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                  return false;
             }
        

         return true;
      }


      function myFunction3(val) {
    var v =  val;
    window.open("registro_status.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}


    
   </SCRIPT>

   <style type="text/css">
      #contenedor22 {
  width: 200%;
  max-width: 3000px;
}
    </style>

     <style>
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);



div.table-title {
   display: block;
  margin: auto;
  max-width: 200px;
  padding:5px;
  width: 80%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 800px;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:20px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 400px;
  padding:5px;
  width: 50%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight:600;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:60;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
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
              <span class="hidden-xs"<? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="img-circle" alt="User Image">

                <p>
                 <? echo $nombre;?>
                  <small>Uso exclusivo para clientes 2019</small>
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
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><? echo $nombre;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">¿QUE DESEAS VER?</li>
        <li class="active treeview">
          
            <li><a href="index_admin.php"><i class="fas fa-door-open"></i> <span>INICIO</span></a></li>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
        <li><a href="proceso_admin.php"><i class="fas fa-dolly"></i> <span>ORDENES EN PROCESO</span></a></li>
        <li><a href="camino_admin.php"><i class="fas fa-paper-plane"></i> <span>ORDENES EN CAMINO</span></a></li>
        <li><a href="entregadas_admin.php"><i class="fas fa-clipboard-check"></i> <span>ORDENES ENTREGADAS</span></a></li>
        <!--<li><a href="logueo.php"><i class="fas fa-clipboard-check"></i> <span>ACCESOS AL SISTEMA</span></a></li>-->
        
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        DOCUMENTOS
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fas fa-door-open"></i> PAGINA PRINCIPAL</a></li>
        <li class="active">REGISTRO</li>
      </ol>
    </section>
<table class="table-fill">
<thead>

<tr>
<th class="text-left">Documentos </th>
<th class="text-left">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover">
  <?php if ($destino=="SV"): ?>
    <tr>
         <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
        <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php else: ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
                
        
      <?php endif ?>
      <?php else: ?>
  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"): ?>
      
        <tr>
        <td class="text-left">Cotizacion</td>
        
        <td class="text-left"><?php if ($archivo!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" data-fancybox="preview">

                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
        </tr>
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
        </tr>
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php else: ?>
        <!-- GUIA AEREA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        
      <?php endif ?></td>
      </tr>
      <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php else: ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid "  alt=""> 
                </div>
                
        
      <?php endif ?></td>
      </tr>
      <tr>
      <td class="text-left">Comprobante de Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
                
        
      <?php else: ?>
        <!-- comprobante de entrega -->
            
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
                
               
             

        
      <?php endif ?></td>
      </tr>
  <?php else: ?>
    <?php if ($destino=="GT"||$destino=="HN"): ?>
      <tr>
        <td class="text-left">Cotizacion</td>
        
        <td class="text-left"><?php if ($archivo!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" data-fancybox="preview">

                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
        </tr>
        <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"    alt=""> 
              </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
      </tr>
      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null): ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null): ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" data-fancybox="preview" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt="">  
                    </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                  </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <?php else: ?>
       <tr>
        <td class="text-left">Cotizacion</td>
        
        <td class="text-left"><?php if ($archivo!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_nica19/<?php echo $archivo; ?>" data-fancybox="preview">

                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/cotizaciones_nica19/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
        </tr>
        <tr>
        <td class="text-left">Manifiesto de Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"   alt=""> 
              </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div>
          
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null): ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview">

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php else: ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php endif ?>
         </td>
      </tr>
      <tr>
        <td class="text-left">Duca_F</td>
        <td class="text-left"><?php if ($duca_f!=null): ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" data-fancybox="preview">
                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Duca_T</td>
        <td class="text-left"><?php if ($duca_t!=null): ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_t; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null): ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" data-fancybox="preview" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php endif ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php else: ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php endif ?></td>
      </tr>

    <?php endif ?>
    
  <?php endif ?>
<?php endif ?>









</tbody>
</table>
</div>

    <script type="text/javascript">
      
      $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });




    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});

    $(".rotate").fancybox({   
    width  : 2000,
    height : 2000,
    type   :'iframe',
    autoScale : 'true'
});



    

</script>
  

      <!-- Small boxes (Stat box) -->
      



      

        <!-- ./col -->
       
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
