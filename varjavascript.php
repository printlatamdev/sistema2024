<html>
<head>
<script language='JavaScript'>
var myVal = 'Ahora si.. El problema esta resuelto..!!';
function getvariable(val) {
var variable = eval(val);
document.write(variable);
}
</script>
<?php
function obtenervarjavascript($js_var_name) {
$x = "<script language='JavaScript'> getvariable('" . $js_var_name . "'); </script>";
return $x;
}
?>
</head>
<body>
<form name="form1">
<?php
$var1 = obtenervarjavascript("document.forms[0].name");
$var2 = obtenervarjavascript("myVal");
?>
<center><?php print "El nombre del formulario: " . $var1; ?></center><br>
<center><?php print "JScript guardada: " . $var2; ?></center><br>
</form>
 </body>
</html>



<?
session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];
  
$nombre=$_SESSION['vsNombre'];



$pruebaget=$_REQUEST['id_orden']; //obtengo la variable id orden 

  include("connect.php");
   $conexion = conexion();

 if ($nombre=='admin') {



$id=$_SESSION['vsIdtemporal'];

 $obteniendo2 = mysqli_query($conexion,"select id_empresa, nombre from empresa where id_empresa='".$id."' ");
   while ($filas = mysqli_fetch_array($obteniendo2))
                                   {

                                      $nombre=$filas[1];
                                  
}
 if ($nombre=="COLGATE PALMOLIVE CA") {

       $nombre="COLGATE PALMOLIVE CA INC";
     }

}

if (!isset($_GET['buscar']) or empty($_GET['buscar'])){
  /**CONSULTA ANTIGUA
  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica
 t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
  **/

   /** CONSULTA NUEVA CON LA COTIZACION INCLUIDA REEMPLAZAR DESPUES 
   select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
 t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa=4595 order by t1.f_llegada desc**/


  $consulta = mysqli_query($conexion,"  select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
 t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1 and status='IMPRESION'   and t2.id_empresa='".$id."' order by t5.cot desc
 "); $ordenes_entregadas=mysqli_num_rows($consulta);





include("connect2.php");
   $conexion2 = conexion2();
   /**
  CONSULTA ANTIGUA 
  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica
 a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc**/
/**
  CONSULTA NUEVA
  select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='PEP PROMOTIONS' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc 
  **/
/*
  $consulta2 = mysqli_query($conexion2,"select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc   

 ");*/
  $ordenes_entregadas2=mysqli_num_rows($consulta2);
   $conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2;





  //MOSTRANDO NUMERO DECOTIZACION SIN REPETIR 
   $consulta1 = mysqli_query($conexion2,"select DISTINCT  a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc
  ");


 
   


}
  else{
    include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.numorden_compra t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica
 t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."' and t4.marca LIKE '%".$_GET['buscar']."%'  order by t1.destino asc 
 ");



     $ordenes_entregadas=mysqli_num_rows($consulta);



include("connect2.php");
   $conexion2 = conexion2();
 
  $consulta2 = mysqli_query($conexion2,"select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica
 a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO' and a1.marca LIKE '%".$_GET['buscar']."%'   order by a1.f_llegada asc ");
  
$ordenes_entregadas2=mysqli_num_rows($consulta2);
$conteo_entregadas=$ordenes_entregadas+$ordenes_entregadas2; 



  
   

  
    
  }?>
   



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

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>

<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">


  <link href="produccion/css/bootstrap.min.css" rel="stylesheet">
  <link href="produccion/css/style_nav.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css">

  <style>
    .content {
      margin-top: 80px;
    }
  </style>




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
.fancybox-slide--iframe .fancybox-content {
  width  : 1700px;
  height : 1700px;
  max-width  : 66%;
  max-height : 80%;
  margin: 0;
  background: #191919;
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

<script>
  
    $(function(){
    
      $(".fancyOther").fancybox({
        width   : '100%',
        height    : '100%',
        maxWidth  : 800,
        maxHeight : 600,
        fitToView : false,
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
      }); 
    });
    
  </script>












   
</head>
<body class="hold-transition skin-blue sidebar-mini">
  
<!--MODAL FACTURA-->
      

      <form method="post" action="SISTEMABOOTSTRAP/SCRIPT/facturacion.sql.pop.php" enctype="multipart/form-data">
    <div class="modal fade" id="factura" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   <input id="id_orden" type="text" class="form-control" name="orden">
                   <input id="empresa" type="hidden" class="form-control" name="empresa">
                   <input id="marca" type="hidden" class="form-control" name="marca">
                   <input id="destino" type="hidden" class="form-control" name="destino">
                   <input id="proyecto" type="hidden" class="form-control" name="proyecto">
                   <input type="hidden" class="form-control" name="item" value="FACTURA">
                   <input type="hidden" class="form-control" name="carpeta" value="ADMINISTRACION">
                   <input type="hidden" class="form-control" name="item" value="FACTURA">
                   <input type="hidden" class="form-control" name="bandera" value="1">
                 </div>
                 <div align="center">
                 <h6>*ACTUALMENTE YA HAS SUBIDO UNA FOTO, PERO PUEDES ACTUALIZARLA*</h6></div>
                 <br>
                 <br>    
                         <div class="row">
                          
                             <?  $imagenes = mysqli_query($conexion, "select  documento from prueba_pop_documentos where orden='".$idoorden."'");
                               
                                  while($row = mysqli_fetch_assoc($imagenes)){ ?>
                                         <div class="col-xs-1" > 
                                            <a href="<? echo $row['documento']; ?>" data-fancybox="images" data-caption="My caption">
                                              <img src="<? echo $row['documento']; ?>" alt="" style="max-width: 120px;" />
                                            </a> 
                                        </div> 
                                  <?  }  ?>
                         </div>
               
               <!--<? //echo "id php: <script>document.write(resul);</script>";?>-->
                         
                           
                 <!--
             <div align="center">
               ver imagen <a href="#" onclick="top.window.location.href='../sistema/artes_esa17/'+document.getElementById('imagen').value ; return !1"  class="fancybox" rel="ligthbox">
              </div>-->

                 <div align="center"> <a   id="img" onclick="myFunction6(document.getElementById('img').value)" href='#' role='button'  class="rotate" ><i  ></i> Click para ver   <img align="center" src="../sistema/artes_esa17/IMGPDF/ver3.png" height="80px" class="zoom img-fluid "  alt=""> </a></div>
                  <div class="form-group">
                      <input name="origen" type="hidden"  value="<?echo $_SESSION['base'];?>" class="form-control" aria-label="...">
                  </div>
                  <div class="form-group">
                     <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="metros">
                       
                  </div>
                  <div style="overflow:hidden">
                                                                                                                                    

             <br>

            <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
              <input size="60" class="form-control" id="Filedata" name="Filedata" type="file" aria-label="..."  /> 
            </div>
    
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>

    </div>
    
</form>

<!--MODAL COMPROBANTE DE PAGO-->
<!--MODAL REMISION-->
<!--MODAL NOTA DE ENVIO-->



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
                  <small>Uso exclusivo para clientes 2019<? echo $nombre;?></small>
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
  <? include('aside.php');?>

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
    -->
        <!--div que me despliega en toda la pantalla la tabla corte  -->
       <div class="col-md-12">
       

       

               

           
   


 <?$consulta78 = mysqli_query($conexion,"select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
 t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t1.numorden_compra='".$num_compra."'  ");?>

     
  


           
  




  
    <!-- Main content -->
  <div class="table-responsive" align="center">


   
    




      <h4>ORDENES DE PRODUCCION </h4>
        <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false}}' href="form.php"> <input type=image src="icono/add.png"  width="60" height="60"></a>  Agregar Orden. 
      <hr />

      <?php
      if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM empleados WHERE codigo='$nik'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>

      <form class="form-inline" method="get">

        <div class="form-group">

          <select name="filter" class="form-control" onchange="form.submit()">

            <option value="0">Filtro por estado de orden</option>
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
            <option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>En espera</option>
            <option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Impresion</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Corte</option>
          </select>
        </div>
      </form>
      <br />
      <div class="table-responsive">

      <table class="table table-striped table-hover">
        <thead class="bg-primary" >
          <tr>

            <th># OP</th>
            <th>Cot</th>
            <th>OC</th>
            <th>Cliente</th>
            <th>Campaña</th>

            <th>Info</th>

            <th>Origen</th>
            <th>Destino</th>
            <th>ETD</th>
            <th>ETA</th>
            
            <th>Info</th>

            <th>Data</th>
          </tr>
      </thead>
        <?php
        if($filter){
          $sql = mysqli_query($con, "SELECT * FROM empleados WHERE estado='$filter' ORDER BY codigo ASC");
        }else{
          $sql = mysqli_query($conexion, "select t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra, t2.cot, t1.destino, t4.marca from pop_proyecto t4 inner join pop t1 on t4.id_proyecto=t1.id_proyecto INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 ");
        }
        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){
                     $data='#1'.$row['id_orden'];
                     $data2='1'.$row['id_orden'];
                     $datalog='#2'.$row['id_orden'];
                     $data2log="2".$row['id_orden'];
                     $numcoti=$row['cot'];
                     include('SISTEMABOOTSTRAP/consultadocs.php');
                     
                     $cot_contacto = mysqli_query($conexion,"select contacto, vendedor from cotizacion where id_cotizacion='".$numcoti."' ");
                     while ($cot = mysqli_fetch_array($cot_contacto))
                                   {

                                      $solicita=$cot[0];
                                      $vendedor=$cot[1];
                                  
                                   }

                                   echo "prueba destino";
                                   echo $destino;

                    

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>
              <td>'.$row['cot'].'</td>
              <td><a href="profile.php?nik='.$row['numorden_compra'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombres'].'</a></td>
                            <td>'.$row['empresa'].'</td>
                            <td>'.$row['nombre_proyecto'].'</td>
                            <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target='.$datalog.' aria-expanded="false" aria-controls='.$data2log.'></a> </td>
              <td>'.$row['origen'].'</td>
                            <td>'.$row['destino'].'</td>
                              <td>'.$row['f_salida'].'</td>
                            <td>'.$row['f_llegada'].'</td>
              
              <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.'></a> </td>
              <td><a   class="fa fa-folder-open" aria-hidden="true" href=""> </a>  </td>
              
            </tr>
            <tr ><td colspan="14" >
                    <div class="col-md-12">
                      <div class="collapse multi-collapse" id='.$data2log.' style="width:100%" >
                        <div class="card card-body"><br>';?>
                             <div class="row">
                                <div class="col-md-6">
                                  <span>Solicita: </span><? echo $solicita; ?><br>
                                  <span>Ejecutivo: </span><? echo $vendedor; ?>
                                </div>
                                <div class="col-md-6">
                                  
                                </div>
                              </div>
                              <div class="row"><br><br><br></div>
                            <!-- fin div class row -->

                             
                         <?echo '<div class="row">
                         
                                      
                                        <div class="col-md-1">
                                          <img src="imagenes/view.png"   class="img-thumbnail" href="SISTEMABOOTSTRAP/produccion.php">
                                          <span>Cotizacion</span>
                                        </div>
                                        
                                      
                                        <div class="col-md-1">
                                          <img src="imagenes/view.png" data-toggle="modal" data-target="#factura" onclick=\'pasarDatos2("'.$row['id_orden'].'","'.$row['empresa'].'","'.$row['destino'].'","'.$row['marca'].'","'.$row['nombre_proyecto'].'")\' class="img-thumbnail">
                                          <span>Factura</span>
                                        </div>
                                        
                                      
                                        <div class="col-md-1">
                                          <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                          <span>Envio</span>
                                        </div>
                                        
                                      
                                        <div class="col-md-1">
                                          <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                          <span>Nota Remision</span>
                                        </div>
                                        
                                      
                                        <div class="col-md-1">
                                          <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                          <span>Comprobante de Pago</span> 
                                        </div>
                                        
                                      


                                  </div>'; ?>
                <?echo '</div>
                      </div>
                    </div>
                  
                    <div class="col-md-12">
                      <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
                        <div class="card card-body"><br>';?>

                        

                        <!---- COMIENZA INSTRUCCION PARA DOCUMENTOS ---------------------------------------------->
                        <div class="row">
                                <div class="col-md-6">
                                  <span>Solicita: </span><? echo $solicita; ?><br>
                                  <span>Ejecutivo: </span><? echo $vendedor; ?>
                                </div>
                                <div class="col-md-6">
                                  
                                </div>
                              </div>
                            <!-- fin div class row -->
                            <div class="row">
                                <div class="col-md-4">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div>

                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div> 
                                </div>
                                <div class="col-md-4">
                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div><div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div><div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                   <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                      <img src="imagenes/view.png" alt="..." class="img-thumbnail">
                                    </div>
                                    
                                  </div>
                                </div>
                              </div>
                              <!-- TERMINA INSTRUCCION PARA MOSTRAR DOCUMENTOS-------------------------------------->
                </div>
                      </div>
                    </div>
                  </td>
            </tr>

          <?  
            $no++;
          }
        }
        ?>
      </table>
      </div>
    </div>
  </div><center>
  <p>&copy; Sistemas Color Digital 2020</p>
    </center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

      
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</form><br><br>

<!--fin del div col-md-12  -->
</div>





<form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nota5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
           </div>
           <div class="modal-body">
               <h5 class="modal-title" id="myModalLabel">Material2:</h5>

            <div class="form-group">
                  <input id="par"  type="text" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
        
               
               
                 
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar Descripcion</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   

</form>

















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
                         


 

<script src="js/seccion.js"></script>

    <script type="text/javascript">

    function pasarDatos2(id,empresa,destino,marca,proyecto) {
         
         document.getElementById('id_orden').value= id;

         /*var resul = document.getElementById('id').value= id;*/

         document.getElementById('empresa').value= empresa;
         document.getElementById('destino').value= destino;
         document.getElementById('marca').value= marca;
         document.getElementById('proyecto').value= proyecto;

         
      }

  </script>

  <?php

  //convertir variables javascript a php
function obtenervarjavascript($js_var_name) {
$x = "<script language='JavaScript'> getvariable('" . $js_var_name . "'); </script>";
return $x;
}
//fin convertir variables javascript a php

?>

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








</body>
</html>
















<?php
include("session.php");
include("../../../sistema/connect.php");

 
$bandera=$_POST['bandera'];


if ($bandera==1) {


    $orden=$_POST['orden'];
    $empresa=$_POST['empresa'];
    $marca=$_POST['marca'];
    $proyecto=$_POST['proyecto'];
    $destino="PPP";
    $item=$_POST['item'];
    $carpeta=$_POST['carpeta'];
    $path = $_FILES['Filedata']['name'];
    echo $bandera;
    echo $orden;
    echo $empresa;
    echo $marca;
    echo $proyecto;
    echo $destino;
    echo $item;
    echo $carpeta;
    echo $path;


     //------------------------------Para reducir foto

     function compress($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg') 
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif') 
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png') 
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

        return $destination;
    }
    
     //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
    $year=date("Y");
    
    $ext = pathinfo($path, PATHINFO_EXTENSION);
    $num=rand(0000,9999);


    if ($ext=='pdf' || $ext=='PDF' ) {

       $nombre=$item."_".$num."_".$orden.".pdf";

       $archive='../../../artes/'.$year.'/DISPLAYS/'.$empresa.'/'.$marca.'/'.$proyecto.'/'.$carpeta.'/'.$destino;
       if (!file_exists($archive)) {   mkdir($archive, 0777, true);    } 

       $destination_img = '../../../artes/'.$year.'/DISPLAYS/'.$empresa.'/'.$marca.'/'.$proyecto.'/'.$carpeta.'/'.$destino.'/'.$nombre;

       move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 


     } else {

  
     $nombre=$item."_".$num."_".$orden.".".$ext."";
     $source_img = $_FILES['Filedata']['tmp_name'];

     $archive='../../../artes/'.$year.'/DISPLAYS/'.$empresa.'/'.$marca.'/'.$proyecto.'/'.$carpeta.'/'.$destino;
     if (!file_exists($archive)) {   mkdir($archive, 0777, true);    } 
         
     $destination_img = '../../../artes/'.$year.'/DISPLAYS/'.$empresa.'/'.$marca.'/'.$proyecto.'/'.$carpeta.'/'.$destino.'/'.$nombre;

     $d = compress($source_img, $destination_img, 75);
     

     }
//****************************************************************************************************************************************************//
     echo $destination_img;

    $rs=$mysqli->query("INSERT INTO prueba_pop_documentos ( orden, tipo, documento) VALUES ('$orden', '$item', '$destination_img')");
  if ($rs==true) {
    echo "<a href='../../../sistema/documentos.pop.ver.php?tipo=".$item."&orden=".$orden."' target='_blank'><span class='label label-sm label-success'>Ver Documentos</span></a>";
  }
  else {
    echo "no inserta";
  }
    
	
            


			


}
else{

              //Forma antigua de guardar documentos
				      
			  $ext=$_POST['fileExtension'];
              $carpeta=$_POST['carpeta'];
              $orden=$_POST['orden'];
              
     
              if($carpeta=='ccfiscal')
              {
              $tabla='facturacion_ccf_pop';
              $criterio="ccfiscal";
              $cual='ccf';
              
              }
              if($carpeta=='cpago')
              {
              $tabla='facturacion_cpago_pop';
              $criterio="cpago";
              $cual='cp';
              
              }
              if($carpeta=='centrega')
              {
              $tabla='facturacion_centrega_pop';
              $criterio="centrega";
              $cual='ce';
              
              }


            if ($ext=='pdf' || $ext=='PDF' ) {

              $nombre=$_POST['nombre'];

              $destination_img = "documentos/".$carpeta.'/'.$nombre;

              move_uploaded_file($_FILES["file"]["tmp_name"], $destination_img); 

              $rs=$mysqli->query("INSERT INTO ".$tabla."( id_orden, ".$criterio.") VALUES ('$orden', '$destination_img')");


              
          


            } else {


             
                 //------------------------------Para reducir foto

            function compress($source, $destination, $quality) {

                $info = getimagesize($source);

                if ($info['mime'] == 'image/jpeg') 
                    $image = imagecreatefromjpeg($source);

                elseif ($info['mime'] == 'image/gif') 
                    $image = imagecreatefromgif($source);

                elseif ($info['mime'] == 'image/png') 
                    $image = imagecreatefrompng($source);

                imagejpeg($image, $destination, $quality);

                return $destination;
            }
            
         
            $nombre=$_POST['nombre'];
            $source_img = $_FILES['file']['tmp_name'];
            
            $destination_img = "documentos/".$carpeta.'/'.$nombre;
            $d = compress($source_img, $destination_img, 75);
            //------------------------------------Fin Para reducir foto



             $rs=$mysqli->query("INSERT INTO ".$tabla."( id_orden, ".$criterio.") VALUES ('$orden', '$destination_img')");






            }
            


               


        
              
            
            echo $orden;
  

}



$mysqli->close();

?>