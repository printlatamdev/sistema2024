<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
  
$nombre=$_SESSION['vsNombre'];
if (!isset($_GET['buscar']) or empty($_GET['buscar'])){
  
  include("connect.php");
   $conexion = conexion();
    /** CONSULTA ANTUGUA  
     select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
    **/

  $consulta = mysqli_query($conexion,"  select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."' and t5.cot=723 order by t5.cot desc
 ");



      $ordenes_entregadas=mysqli_num_rows($consulta);


include("connect2.php");
   $conexion2 = conexion2();

   /** CONSULTA ANTUGUA 
   select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc
   **/

/** LISTA DE NUMERO DE COTIZACION SIN REPETIR DE ENTREGADAS  
select DISTINCT t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa=4193 ORDER BY t5.cot ASC
**/

  $consulta2 = mysqli_query($conexion2,"  select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre." and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc 

 ");
  $ordenes_entregadas2=mysqli_num_rows($consulta2);
   $conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2;
  


 
   


}
  else{
    include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."' and t4.marca LIKE '%".$_GET['buscar']."%'  order by t1.destino asc 
 ");



     $ordenes_entregadas=mysqli_num_rows($consulta);



include("connect2.php");
   $conexion2 = conexion2();

  $consulta2 = mysqli_query($conexion2,"  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO' and a1.marca LIKE '%".$_GET['buscar']."%'   order by a1.f_llegada asc

 ");
  
$ordenes_entregadas2=mysqli_num_rows($consulta2);
$conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2;

  
    
  }
?>
   



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
  <style type="text/css">
        body { font-family:Arial, Helvetica, Sans-Serif; font-size:1.1em;}
        #report { border-collapse:collapse;}
        #report h4 { margin:0px; padding:0px;}
        #report img { float:right;}
        #report ul { margin:10px 0 10px 40px; padding:0px;}
        #report th { background:#7CB8E2 url(header_bkg.png) repeat-x scroll center left; color:#fff; padding:7px 15px; text-align:left;}
        #report td { background:#C7DDEE none repeat-x scroll center left; color:#000; padding:7px 15px; }
        #report tr.odd td { background:#fff url(row_bkg.png) repeat-x scroll center left; cursor:pointer; }
        #report div.arrow { background:transparent url(arrows.png) no-repeat scroll 0px -16px; width:16px; height:16px; display:block;}
        #report div.up { background-position:0px 0px;}
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">  
        $(document).ready(function(){
            $("#report tr:odd").addClass("odd");
            $("#report tr:not(.odd)").hide();
            $("#report tr:first-child").show();
            
            $("#report tr.odd").click(function(){
            $(this).next("tr").toggle();
            $(this).find(".arrow").toggleClass("up");
            });
            //$("#report").jExpand();
        });
    </script>
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

   



  <script>
function myFunction(val) {
    var v =  val;
    window.open("pruebadoc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}

function myFunction2(val) {
    var v =  val;
    window.open("fotoprueba.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,top=1,left=2000,width=2000,height=2000");
}
function myFunction4(val) {
    var v =  val;
    window.open("pruebadoc_nc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}

function myFunction5(val) {
    var v =  val;
    window.open("fotoprueba_nc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
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
function myFunction6(val) {
    var v =  val;
    window.open("registro_status_nc.php?id="+ v, "toolbar=yes,scrollbars=yes,resizable=yes,left=2000,width=2000,height=2000");
}


    
   </SCRIPT>

   <style type="text/css">
      #contenedor22 {
  width: 200%;
  max-width: 3000px;
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
              <span class="hidden-xs"><? echo $nombre;?></span>
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
    <!-- Content Header (Page header) -->
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


      <!-- Small boxes (Stat box) -->
       <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
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
       <td>ENVIOS TERMINADOS:<img height='30px' src="focus/ENTREGADO.png" /> </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;

               

            

            <br>
            <br>
            <form method="get" action="entregadas.php">
 <div class="field" id="searchform">
  <input type="text" name="buscar" placeholder="¿Que marca deseas buscar?" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;




     
    

           
            <button type="submit" class="btn btn-primary" name="btnbuscar">Buscar</button>
    
</div>

<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</form><br><br>

    <!-- Main content -->
  

    

   
        <table id="report" class="dropdown notifications-menu" >
                            <thead class="bg-primary" >
        <tr>
            					 <th width="70" align="center">#Orden</th>
            					 <th width="70" align="center">#COTIZACION</th>
                                 <th width="70" align="center">Estado</th>
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">F_salida</th>
                                 <th width="70" align="center">F_E_LL</th>  
                                 <th width="70" align="center">D_Paquete</th>
                                                              
                                 <th width="70" align="center"> &nbsp;&nbsp;&nbsp;Status</th>
                                 <th width="70" align="center">Documentacion</th>
                                   <th width="70" align="center"> &nbsp;&nbsp; Fotos</th>
                                   <th></th>
        </tr>
    </thead>




        
                           <tbody>

                          <td>
                            
                            

  <?
                    

     $consulta155 = mysqli_query($conexion,"select DISTINCT numorden_compra from logiticass");
while ($row25 = mysqli_fetch_array($consulta155))
                                   {   $num_compra=$row25[0];
                                       //$codigo=$row25[2];?>   
                                       <br>
                                    
                           <ul class="" data-widget="tree" id="select-beast">
       
          
        <li class="treeview">
          <a href="index_fotos.php">
            <i class="fas fa-print"></i><b> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?echo $num_compra;?></span></b>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a><?$consulta78 = mysqli_query($conexion,"select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logiticass t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1 and t1.numorden_compra='".$num_compra."' ");?>

              
<ul class="treeview-menu">
<table class="dropdown notifications-menu">
                            <thead class="bg-primary" >
                              <tr>

                                   <th width="70" align="center">#Orden</th>
                                   <th width="70" align="center">Estado</th>
                                 <th width="70" align="center">Marca</th>
                                  <th width="70" align="center">Origen</th>
                                 <th width="70" align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th width="70" align="center">F_salida</th>
                                 <th width="70" align="center">F_E_LL</th>  
                                 <th width="70" align="center">D_Paquete</th>
                                                              
                                 <th width="70" align="center"> &nbsp;&nbsp;&nbsp;Status</th>
                                 <th width="70" align="center">Documentacion</th>
                                   <th width="70" align="center"> &nbsp;&nbsp;&nbsp;&nbsp; Fotos</th>
                              


                                

                               </tr>
                            </thead>
   <?while ($row27 = mysqli_fetch_array($consulta78))
                                   {   $id_orden=$row27[0];
                                       //$codigo=$row25[2];
                                    $status=$row27['status'];


                                    $ext=".png";?> 
             <li> 
                            <tbody>                            
                             

                             
                                 
                              <tr>
                               
                                 <td align='center'><a href='pruebadoc.php?id=<?echo $row27['id_orden'];?>' role='button' ><i class='far fa-file'></i></a></td>
                                 <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td align="center" >  <?php echo $row27[   'marca'  ];   ?>  </td>
                                 <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row27[   'origen'   ];  ?>  </td>
                                <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row27[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?php //  echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td >  <?php echo $row27[   'f_salida'      ];  ?>  </td>
                                <td >  <?php echo $row27[   'f_llegada'];  ?>  </td>
                                
                                <td >  <?php echo $row27[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction3(".$row27['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-shipping-fast'></i></a></td>"

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?php //  echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction(".$row27['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-folder-open'></i></a></td>"


                                
                               ?>

                               <?
                                  echo" <td > &nbsp;&nbsp;&nbsp;&nbsp; <a onclick=\"myFunction2(".$row27['id_orden'].")\" href='#' role='button'  data-toggle='modal'><i class='fas fa-file-image'></i></a></td>"

                                 
                                
                               ?>
                                   
                               


                                  
                            </tr>
                               
  <?}?>
                           

                          </tbody>
                          </table></li>
                  
          </ul>
        </li>

</ul>
               
                 
          
                    

               

               <?}?>
                          </td>











                          </tbody>
                          </table>





      

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
