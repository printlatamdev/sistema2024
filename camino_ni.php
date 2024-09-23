<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];

$nombre=$_SESSION['vsNombre'];

   include("connect2.php");
   $conexion2 = conexion2();

  $consulta = mysqli_query($conexion2," select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=1 and a1.status='TRANSITO' OR a1.status='ADUANA DE SALIDA' OR a1.status='ADUANA DE DESTINO' OR a1.status='PROBLEMA' order by a1.f_llegada asc

 ");

    $ordenesni=mysqli_num_rows($consulta);



 include("connect.php");
   $conexion = conexion();

  $consulta2 = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1 and t2.id_empresa='".$id."' and t1.status!='PROCESO' and t1.status!='CARGANDO' and t1.status!='DESPACHO' order by t1.f_llegada asc
 ");

    $ordenessv=mysqli_num_rows($consulta2);


$ordenes_transito=$ordenesni+$ordenessv;


   

   


   

   
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



  <script>
function myFunction(val) {
    var v =  val;
    window.open("documentos_nc.php?id="+  v, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=600,width=650,height=550");
}

function myFunction2(val) {
    var v =  val;
    window.open("fotoprueba_nc.php?id="+ v, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=600,width=650,height=550");
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
    window.open("registro_status_nc.php?id="+ v, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=800,width=400,height=250");
}


    
   </SCRIPT>

   <style type="text/css">
      #contenedor22 {
  width: 10%;
  max-width: 1200px;
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
             <li><a href="index.php"><i class="fas fa-door-open"></i> <span>INICIO</span></a></li>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
        </li>
       <li><a href="proceso.php"><i class="fas fa-dolly"></i> <span>ORDENES EN PROCESO</span></a></li>
        <li><a href="camino.php"><i class="fas fa-paper-plane"></i> <span>ORDENES EN CAMINO</span></a></li>
        <li><a href="entregadas.php"><i class="fas fa-clipboard-check"></i> <span>ORDENES ENTREGADAS</span></a></li>
        
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        REGISTRO
        <small>ENVIOS RIM DE CENTRO AMERICA (COLOR DIGITAL)</small>
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
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?=$ordenes_transito?></h3>

              <p>ORDENES EN TRANSITO</p>
            </div>
            <div class="icon">
              <i class="ion-ios-speedometer"></i>
            </div>
           
          </div>
        </div>
      </div>


        

       
         <td>ENVIO EN TRANSITO:<img height='30px' src="focus/TRANSITO.png" /> </td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;

            <td>PROBLEMA EN EL ENVIO:<img height='30px' src="focus/PROBLEMA.png" /> </td>
            EL SALVADOR COLOR DIGITAL   &nbsp;&nbsp;&nbsp;&nbsp; <a title="ORIGEN EL SALVADOR" href="camino.php"><img src="sv.jpg" alt="Los Tejos" height="50"  /></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  &nbsp;&nbsp;&nbsp;&nbsp;

               RIM DE C.A (COLOR DIGITAL)  &nbsp;&nbsp;&nbsp;&nbsp;<a title="ORIGEN NICARAGUA" href="camino_ni.php"><img src="nc.png" alt="Los Tejos" height="50"  /></a>

            <br>
            <br>


    <!-- Main content -->
  

    

   
        <table class="dropdown notifications-menu">
                            <thead class="bg-primary" >
                              <tr>

                                
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
                            <tbody>
                              <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                     $status=$row['status'];


                                    $ext=".png";

                                   ?>
                                 
                              <tr>
                               
                           
                                <td>  <img height='30px' src="focus/<?php echo $status.$ext; ?>" /> </td>
                                <td align="center" >  <?php echo $row[   'marca'  ];   ?>  </td>
                                             <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'origen'   ];  ?>  </td>
                                <td  > 
                  &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $row[   'destino'   ];  ?>  </td>
                                 <!--<td><a href="pop.orden.activa.iframe.php?idorden=<?php //echo $row['id_orden']; ?>"> Ver Productos</a>  </td>
                                <!--<td>  <?// echo $row[   'n_motorista'     ];  ?>  </td>                                 
                                <td>  <?php //echo $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <td >  <?php echo $row[   'f_salida'      ];  ?>  </td>
                                <td >  <?php echo $row[   'f_llegada'];  ?>  </td>
                                
                                <td >  <?php echo $row[   'descripcion'];  ?>  </td>
                                <!--<td>  <?php //cho $row[   'p_vehiculo'      ];  ?>  </td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction3(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-shipping-fast'></i></a></td>"

                                
                               ?>
                                <!--<td> <img height='30px' src="foto_log/<?php //echo $row['f_empaque']; ?>" /> </td>-->
                               <!-- <td><a href="imprimir_doc.php?id=<?// echo $row['id_logistica']; ?>"> Ver documentos</a></td>-->
                                <?
                                  echo" <td align='center'><a onclick=\"myFunction(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-folder-open'></i></a></td>"


                                
                               ?>

                               <?
                                  echo" <td > &nbsp;&nbsp;&nbsp;&nbsp; <a onclick=\"myFunction2(".$row['id_orden'].")\" href='' role='button'  data-toggle='modal'><i class='fas fa-file-image'></i></a></td>"

                                 
                                
                               ?>
                                   
                               


                                  
                            <tr>
                               

                             <?php
                                 }
                               ?>



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
