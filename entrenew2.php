
<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
  
$nombre=$_SESSION['vsNombre'];

   if ($nombre=="COLGATE PALMOLIVE CA") {

       $nombre="COLGATE PALMOLIVE CA INC";
     }


$pruebaget=$_REQUEST['id_orden']; //obtengo la variable id orden 












if (!isset($_GET['buscar']) or empty($_GET['buscar'])){
  
  include("connect.php");
   $conexion = conexion();/**CONSULTA ANTIGUA
  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
  **/

   /** CONSULTA NUEVA CON LA COTIZACION INCLUIDA REEMPLAZAR DESPUES 
   select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa=4595 order by t1.f_llegada desc**/
  $consulta = mysqli_query($conexion,"  select DISTINCT t1.id_logistica,t1.numorden_compra, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0   and t2.id_empresa='".$id."' order by t5.cot desc
 "); $ordenes_entregadas=mysqli_num_rows($consulta);


include("connect2.php");
   $conexion2 = conexion2();
   /**
  CONSULTA ANTIGUA 
  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc**/
/**
  CONSULTA NUEVA
  select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='PEP PROMOTIONS' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc 
  **/
/*
  $consulta2 = mysqli_query($conexion2,"select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc   

 ");*/
  $ordenes_entregadas2=mysqli_num_rows($consulta2);
   $conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2;





  //MOSTRANDO NUMERO DECOTIZACION SIN REPETIR 
   $consulta1 = mysqli_query($conexion2,"select DISTINCT  a3.cot from logitica a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc
  ");


 
   


}
  else{
    include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"  select t1.id_logistica, t1.numorden_compra, t1.id_orden, t1.origen, t1.f_empaque, t1.numorden_compra t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."' and t4.marca LIKE '%".$_GET['buscar']."%'  order by t1.destino asc 
 ");



     $ordenes_entregadas=mysqli_num_rows($consulta);



include("connect2.php");
   $conexion2 = conexion2();
 
  $consulta2 = mysqli_query($conexion2,"select a1.id_orden, a1.numorden_compra, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO' and a1.marca LIKE '%".$_GET['buscar']."%'   order by a1.f_llegada asc ");
  
$ordenes_entregadas2=mysqli_num_rows($consulta2);
$conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2; 
    
  }?>
   



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
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

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <style type="text/css">



  @import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");


* {
  box-sizing: border-box;
}



table {
  width: 100%;
}
table th {
  text-align: left;
  border-bottom: 1px solid #ccc;
}
table th, table td {
  padding: .4em;
}

table.fold-table > tbody > tr.view td, table.fold-table > tbody > tr.view th {
  cursor: pointer;
}
table.fold-table > tbody > tr.view td:first-child,
table.fold-table > tbody > tr.view th:first-child {
  position: relative;
  padding-left: 20px;
}
table.fold-table > tbody > tr.view td:first-child:before,
table.fold-table > tbody > tr.view th:first-child:before {
  position: absolute;
  top: 50%;
  left: 5px;
  width: 9px;
  height: 16px;
  margin-top: -8px;
  font: 16px fontawesome;
  color: #999;
  content: "\f0d7";
  transition: all .30s ease;
}
table.fold-table > tbody > tr.view:nth-child(4n-1) {
  background: #fff ;
}
table.fold-table > tbody > tr.view:hover {
  background: #E5E7E9;
}
table.fold-table > tbody > tr.view.open {
  background: #AED6F1 ;
  color: #17202A ;
}
table.fold-table > tbody > tr.view.open td:first-child:before, table.fold-table > tbody > tr.view.open th:first-child:before {
  transform: rotate(-180deg);
  color: #17202A ;
}
table.fold-table > tbody > tr.fold {
  display: none;
}
table.fold-table > tbody > tr.fold.open {
  display: table-row;
}

.fold-content {
  padding: .5em;
}
.fold-content h3 {
  margin-top: 0;
}
.fold-content > table {
  border: 2px solid #ccc;
}
.fold-content > table > tbody tr:nth-child(even) {
  background: #eee;
}
</style>

<style type="text/css">

 
tr:nth-child(odd):hover td {
  background:#D8D8D8;
}


 
</style>
 

      <?
if (trim($pruebaget) == false) {?>


 
   <?  
}
else{?>
 <script type="text/javascript">
 $(function(){
  $("#anuncio").modal();
 });
</script>



<?}

  ?>














   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index_unido.php" class="logo">
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
          <img  src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="img-circle" alt="User Image">
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
             <li><a href="index_unido.php"><i class="fas fa-door-open"></i> <span>INICIO</span></a></li>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        <li class="treeview">
          <a href="index_fotos.php">
            <i class="fas fa-print"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IMPRESION</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="vista_impresion.php"><i class="fas fa-print"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ORDENES EN IMPRESION</span></a></li>
        <li><a href="vista_corte.php"><i class="fas fa-cut"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   ORDENES EN CORTE</span></a></li>
        <li><a href="vista_acabados.php"><i class="fas fa-cogs"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ORDENES EN ACABADO</span></a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="index.php">
            <i class="fa fa-edit"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESPACHO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
        <li><a href="camino.php"><i class="fas fa-paper-plane"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDENES EN CAMINO</span></a></li>
        <li><a href="entregadas.php"><i class="fas fa-clipboard-check"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDENES ENTREGADAS</span></a></li>
          </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) 
    <section class="content-header">
      <h1>
        REGISTRO
        <small>ENVIOS COLOR DIGITAL SV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fas fa-door-open"></i> PAGINA PRINCIPAL</a></li>
        <li class="active">REGISTRO</li>
      </ol>
    </section>


 
       <div class="row">
        <div class="col-lg-3 col-xs-6">
      
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$conteo_entregadas?></h3>

              <p>ORDENES TERMINADAS</p>
            </div>
            <div class="icon">
              <i class="ion-thumbsup"></i>
            </div>           
          </div>
        </div>
      </div>
    --><br>

       <td>ENVIOS TERMINADOS:<img height='30px' src="focus/ENTREGADO.png" /> </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;

               

           
            <form method="get" action="entrenew.php">
 <div class="field" id="searchform" align="center">
  <input type="text" name="buscar" placeholder="Busque su OC/COT" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

<?php if (!isset($_GET['buscar']) or empty($_GET['buscar'])){

   }
   else{
     $consulta = mysqli_query($conexion,"select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t1.numorden_compra LIKE '%".$_GET['buscar']."%' ");
   }
 ?>
  


 

     
  


           
            <button type="submit" class="btn btn-primary" name="btnbuscar">Buscar</button>
    
</div>

<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</form>




  
    <!-- Main content -->
 <div  class="table-responsive" align="center">
<table class="fold-table"   >
   <thead class="bg-primary" >
                              <tr>

                                   <th width="70" align="center">OC</th>

                                 
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">ETD</th>
                                 <th width="70" align="center">ETA</th>  
                                 <th width="70" align="center">Items</th>
                                                              
                              
                                
                                    <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; Accion</th>
                              


                                

                               </tr>
                            </thead>
  <tbody>
  
      
                           
                                     
                           
                         
                               <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                  

                                    $status=$row['status'];
                                    $id=$row['id_logistica'];
                                      $data='#'.$id;
                                      $data2=$id;

                                    $ext=".png";

                                   ?>
                                     
                           
                                 <tr class="view">
                               
                                  <td align="left" >  <?php echo $row[   'numorden_compra'  ];    ?>  </td>
                                <td align="left" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                 <td align="left" > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td align="left" > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td align="left" >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td align="left">  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td align="left" >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td><a  class="fa fa-file-archive-o" aria-hidden="true" href="../sistema/zip/index.php?idorden=<?php echo $row['id_orden']; ?>"> </a>  </td>                           
                                                        
                                                              
                                    </tr>   

                                    <tr class="fold" >
      <td colspan="2">


        <div >
         
        <table class="table" border="1" >
  <thead class="bg-black" border="1">
   <tr>
<th class="text-left">Proceso</th>
<th class="text-left">Fecha/Hora</th>
</tr>
<br>
  </thead>
  <tbody>
    <?  $consulta2019 = mysqli_query($conexion," select status, f_hora from bitacora_s where id_orden='".$row['id_orden']."'");
?>
     <?php  while ($row2019 = mysqli_fetch_array($consulta2019)){

                                   ?>
    <tr >
      
      <td class="text-left" width="10">  
        <?php if (($row2019['status'])=="PROCESO"):?>
          <i class="fa fa-cog fa-spin"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="TRANSITO"):?>
          <i class="fa fa-truck" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="CARGANDO"):?>
          <i class="fa fa-users"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="DESPACHO"):?>
          <i class="fa fa-book" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE SALIDA"):?>
          <i class="fa fa-flag-checkered"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ADUANA DE DESTINO"):?>
          <i class="fa fa-building" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="ENTREGADO"):?>
          <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>
        <?php if (($row2019['status'])=="PROBLEMA"):?>
          <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> &nbsp; &nbsp; <?php echo $row2019[   'status'     ];  ?><?php endif ?>  </td>
          <td width="10" class="text-left">  <?php echo $row2019[   'f_hora'     ];  ?>  </td>
    </tr>
        <?php
                                 }
                               ?>



















 
  
  </tbody>
</table>


        </div>
      </td>




    <!-----------------******************************************************************************************************************    -->


   
      <td colspan="2" width="30%"><!--inicio seunda tabla-->


        <div >
         

<b><span>DOCUMENTOS </span></b>
<b>


<?
$consulta2020 = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.p_vehiculo, t1.comprobante_entrega, t1.guia_aerea, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca ,t5.id_orden, t5.cot, t6.id_cotizacion, t6.archivo from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner JOIN cotizacion t6
   on t5.cot=t6.id_cotizacion where t1.id_orden='".$row['id_orden']."'
 ");


                                while ($row2020 = mysqli_fetch_array($consulta2020))
                                   {
                                    $destino=$row2020[5];
                                    $manifiesto=$row2020[9];
                                    $carta_porte=$row2020[10];
                                    $factura=$row2020[11];
                                    $duca_f=$row2020[12];
                                    $duca_t=$row2020[13];  
                                    $nota_envio=$row2020[16];
                                    $orden_compra=$row2020[15];
                                    $p_vehiculo=$row2020[17];
                                    $comprobante_entrega=$row2020[18];
                                    $guia_aerea=$row2020[19];
                                    $cot=$row2020[35];
                                    
                                    
                                                              


                                   }?>




  <table class="table" border="1" >
<thead class="bg-black">
<br><br>
<tr  border="1" >

<th class="text-left" width="20">Documento </th>
<th class="text-left" width="20">Ver pdf</th>
</thead>
</tr>
<tbody class="table-hover"  border="1">
  
  

  <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"){ ?>

  <tr>
         <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
      
        <tr>
        <td class="text-left">Factura</td>
        
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{ ?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
          
            </div> 
             <?php } ?>
         </td>
        </tr>
      <tr>
      <td class="text-left">Guia Aerea</td>
      <td class="text-left"><?php if ($guia_aerea!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- GUIA AEREA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">Orden de Compra</td>
      <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
        
      <?php }else{ ?>
        <!-- ORDEN DE COMPRA -->
             
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
                
        
      <?php } ?></td>
      </tr>
      <tr>
      <td class="text-left">C.Entrega</td>
      <td class="text-left"><!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>        
      <?php }else{ ?>
        <!-- comprobante de entrega -->
            
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>          
               
             

        
      <?php } ?></td>
      </tr>

       <?php } ?>


<!--TERMINA EL MENU PARA AEREO-->













  



<!--FIN PARA MENU DE GUATEMALA Y HONDURAS-->



    <?php if ($destino=="GT"||$destino=="HN"||$destino=="CR"||$destino=="PN"){ ?>
      <tr>
        <td class="text-left">Cotizacion</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
      </tr>
      
      <tr>
        <td class="text-left">M.Carga </td>
        <td class="text-left"><?php if ($manifiesto!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                 
                   
                </a>
            </div>
          
        <?php } else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png " class="zoom img-fluid " height="50 PX"   alt=""> 
              </div>
          
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Carta Porte</td>
        <td class="text-left"><?php if ($carta_porte!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid "  height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div>
          
        <?php } ?></td>
      </tr>
               
      
      <tr>
        <td class="text-left">Factura</td>
        <td class="text-left"><?php if ($factura!=null){ ?>
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" data-fancybox="preview"  >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
            <?php }else{?>
                
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
          
            </div> 
             <?php } ?>
         </td>
      </tr>
     
      </tr>
    
<?php } ?>


















   <?php if ($destino=="SV"){ ?>
             <td class="text-left">Cotizacion_sv</td>
        
        <td class="text-left">
               <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                <a href="../sistema/cotizaciones_esa19/<?php echo $cot; ?>" data-fancybox="preview" >

                     <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                 
                   
                </a>
            </div>
           
         </td>
        </tr>
      
     
      <tr>
        <td class="text-left">Nota de Envio</td>
        <td class="text-left"><?php if ($nota_envio!=null){ ?>
                <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" data-fancybox="preview" >
                         <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt="">  
                    </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"  alt=""> 
                </div>
        <?php } ?></td>
      </tr>
      <tr>
        <td class="text-left">Orden de Compra</td>
        <td class="text-left"><!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null){ ?>
                 <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" data-fancybox="preview" >
                    <img  src="../sistema/artes_esa17/IMGPDF/PDF.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                  </a>
                </div>
          
        <?php }else{ ?>
          <div class="col-lg-2 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFILE.png" class="zoom img-fluid " height="50 PX"   alt=""> 
                </div>
        <?php } ?></td>
      </tr>
</td>
      </tr>            



  <? } ?>





</tbody>
</table></b>

        </div>
      </td><!-- fin segunda tabla -->
     <td colspan="2" width="30%"><!--inicio tercera tabla-->


        <div >
          

          
        </div>





      </td>
    </tr>







                                     <? } ?>


                            



  













   
            </tbody>
          </table>          
        </div>
      </td>





    </tr>




  </tbody>
</table>
<!-- partial -->

      
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</form><br><br>

























                         


 

<script src="js/seccion.js"></script>

     <script type="text/javascript">

    function pasarDatos2(id) {

    
      document.getElementById('id_orden').value= id;

       
        

        
        


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




<script type="text/javascript">
  


  $(document).ready(function(){
      $("tr.Galleta_Grande").on('click', function()  { 
    $(this).next("tr.Galleta_Chica").toggle(); 
});
      $('tr.Galleta_Grande').click();
});


</script>


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



<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script><script  src="./script.js"></script>
<script type="text/javascript">
  $(function(){
  $(".fold-table tr.view").on("click", function(){
    $(this).toggleClass("open").next(".fold").toggleClass("open");
  });
});
</script>
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
    width  : 600,
    height : 300,
    type   :'iframe'
});



    

</script>



</body>
</html>
