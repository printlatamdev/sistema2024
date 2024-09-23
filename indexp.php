
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
$nivel=$_SESSION['nivel'];

   

//$foto=$_SESSION['vsFoto'];
        include("connectin.php");


if ($nivel==5) {

  $cargo="IMPRESION";

  $pop_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.impresion='1' order by a.id_orden desc");
$pop_imp_on=mysqli_num_rows($pop_impresion_activa);

  $pop_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.impresion='0' order by a.id_orden desc");
$pop_imp_of=mysqli_num_rows($pop_impresion_terminada);

  $po_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.impresion='1' order by a.id_orden desc");
$po_imp_on=mysqli_num_rows($po_impresion_activa);

  $po_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.impresion='0' order by a.id_orden desc");
$po_imp_of=mysqli_num_rows($po_impresion_terminada);


  $po_campos_impresion_activa=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.impresion='1' order by a.id_orden desc 
");
$po_campos_imp_on=mysqli_num_rows($po_campos_impresion_activa);

 $po_campos_impresion_terminada=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.impresion='0' order by a.id_orden desc 
");
$po_campos_imp_of=mysqli_num_rows($po_campos_impresion_terminada);


}

elseif($nivel==15){

  $cargo="CORTE";
  $pop_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.corte='1' order by a.id_orden desc");
$pop_imp_on=mysqli_num_rows($pop_impresion_activa);

  $pop_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.corte='0' order by a.id_orden desc");
$pop_imp_of=mysqli_num_rows($pop_impresion_terminada);

  $po_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.estado='1' order by a.id_orden desc");
$po_imp_on=mysqli_num_rows($po_impresion_activa);

  $po_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.estado='0' order by a.id_orden desc");
$po_imp_of=mysqli_num_rows($pop_impresion_terminada);


  $po_campos_impresion_activa=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.estado='1' order by a.id_orden desc 
");
$po_campos_imp_on=mysqli_num_rows($po_campos_impresion_activa);

 $po_campos_impresion_terminada=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.estado='0' order by a.id_orden desc 
");
$po_campos_imp_of=mysqli_num_rows($po_campos_impresion_terminada);



}



elseif($nivel==4){

  $cargo="COMPUTO";
  $pop_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.computo='1' order by a.id_orden desc");
$pop_imp_on=mysqli_num_rows($pop_impresion_activa);

  $pop_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.status,b.numorden_compra, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where a.computo='0' order by a.id_orden desc");
$pop_imp_of=mysqli_num_rows($pop_impresion_terminada);

  $po_impresion_activa=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.computo='1' order by a.id_orden desc");
$po_imp_on=mysqli_num_rows($po_impresion_activa);

  $po_impresion_terminada=$mysqli->query("select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.computo='0' order by a.id_orden desc");
$po_imp_of=mysqli_num_rows($po_impresion_terminada);


  $po_campos_impresion_activa=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.computo='1' order by a.id_orden desc 
");
$po_campos_imp_on=mysqli_num_rows($po_campos_impresion_activa);

 $po_campos_impresion_terminada=$mysqli->query("select distinct a.scan, a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.usuario, a.estado, a.computo, a.impresion, a.id_cliente, a.cliente, a.scan, b.id_orden, b.cot from campos a inner join campos_detalle b on a.id_orden=b.id_orden where a.computo='0' order by a.id_orden desc 
");
$po_campos_imp_of=mysqli_num_rows($po_campos_impresion_terminada);



}
 
   
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>COLOR DIGITAL</title>
  <!-- Tell the browser to be responsive to screen width -->
  <link rel="stylesheet" href="indes/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="indes/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="indes/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="indes/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="indes/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="indes/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="indes/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="indes/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

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

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->



  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>




  <link rel="stylesheet" href="t/css/animate.css" type="text/css" />
  <link rel="stylesheet" href="t/css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="t/css/font.css" type="text/css" />

  <link rel="stylesheet" href="t/css/app.css" type="text/css" />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style>
        #alert_popover {
            display: block;
            position: absolute;
            bottom: 50px;
            left: 50px;
        }

        .wrapper {
            display: table-cell;
            vertical-align: bottom;
            height: auto;
            width: 200px;
        }

        .alert_default {
            color: #333333;
            background-color: #f2f2f2;
            border-color: #cccccc;
        }
    </style>



<!------ Include the above in your HEAD tag ---------->


  
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->


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




  <style type="text/css">
      
.zeroPadding {
  padding: 0 !important;
}
  </style>


<style>






/*---------------------------------*/







/*------------------------------------------*/



  /*------------------------------------------*/


</style> 



</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
   <? include ('navbar.php');?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="images/logo_color.png" alt="COLOR DIGITAL" 
           style="opacity: .8;margin-left:10%" width="150">
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
       <? if ($base=="esa") { ?>
          <div class="image">
             <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <? }if($base=="nica"){ ?>
          <div class="image">
             <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
          </div>
        <? }?>
        <div class="info">
          <a href="#" class="d-block"><?echo $nombre;?></a><a  class="d-block"> online <i class="fas fa-signal" style="color: #2EFE2E"></i></a>
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <? include("menu4.php");?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  
    <!-- /.content-header -->
<?include("conteo_metros.php");
$nivel=$_SESSION['nivel'];
?>
        <!-- /.row -->
        <!-- Main row -->
         <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> INICIO</a></li>
                <li class="active">INICIO</li>
              </ul>
              <div class="m-b-md">
                <h3 class="m-b-none">BIENVENIDO</h3>
                <small>Sistema Produccion CD</small>
              </div>
              <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-info"></i>
                      <i class="fa fa-male fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>52,000</strong></span>
                      <small class="text-muted text-uc">New robots</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-warning"></i>
                      <i class="fa fa-bug fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#fff" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="2000" data-target="#bugs" data-update="3000"></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="bugs">468</strong></span>
                      <small class="text-muted text-uc">Bugs intruded</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">                     
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x text-danger"></i>
                      <i class="fa fa-fire-extinguisher fa-stack-1x text-white"></i>
                      <span class="easypiechart pos-abt" data-percent="100" data-line-width="4" data-track-Color="#f5f5f5" data-scale-Color="false" data-size="50" data-line-cap='butt' data-animate="3000" data-target="#firers" data-update="5000"></span>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong id="firers">359</strong></span>
                      <small class="text-muted text-uc">Extinguishers ready</small>
                    </a>
                  </div>
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                    <span class="fa-stack fa-2x pull-left m-r-sm">
                      <i class="fa fa-circle fa-stack-2x icon-muted"></i>
                      <i class="fa fa-clock-o fa-stack-1x text-white"></i>
                    </span>
                    <a class="clear" href="#">
                      <span class="h3 block m-t-xs"><strong>31:50</strong></span>
                      <small class="text-muted text-uc">Left to exit</small>
                    </a>
                  </div>
                </div>
              </section>
        <div class="row">
          <!-- Left col -->
       
            <!-- Custom tabs (Charts with tabs)-->
            <br/><br/>
<div class="container">
    <br/>
    <h2 align="center">Notificaciones </h2>
    <br/>
  


    <div id="alert_popover" style="margin-left: 850px;">
        <div class="wrapper" >
            <div class="content" >
            </div>
        </div>
    </div>
</div>
             
            <!-- /.card -->

            <!-- DIRECT CHAT -->
            
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                 
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
              
              <!-- /.card-body -->
             
              <!-- /.card-body-->
           
                
            <!-- /.card -->

            <!-- solid sales graph -->
           
            <!-- /.card -->

            <!-- Calendar -->
            <div class="card bg-gradient-success">
           
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?include("pie.php");?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->




<!-- ChartJS -->
<script src="indes/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="indes/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="indes/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="indes/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="indes/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="indes/plugins/moment/moment.min.js"></script>
<script src="indes/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="indes/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="indes/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="indes/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="indes/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="indes/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="indes/dist/js/demo.js"></script>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script>
$(document).ready(function () {
 setInterval(function () {
     cargar();
 },5000);

$('#form').on('submit',function (e) {
        e.preventDefault();
        if($('#titulo').val() !='' && $('#comentario').val() !=''){

            var form_data=$(this).serialize();
            $.ajax({
                url:'insert.php',
                type:'POST',
                data:form_data,
                success:function (data) {
                    $('#form')[0].reset();//limpiar formulario
                }
            });

        }else{
            alert("Debe Completar los Campos!!");
        }

    });

});
function cargar () {
    $.ajax({
        url:'noti/comentario.php',
        type:'POST',
        success:function (data) {
            $('.content').html(data);
        }
    });

}
</script>
</body>
</html>
