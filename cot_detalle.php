<?
session_start();

$var = '<p id="resultado"></p>';
//$vars='<p id="resultado"></p>';
//$var2='<p id="resultado2"></p>';

$esa = 'esa';
$id_tres = $var;
$id = $_SESSION['vsIdempresa'];
$nombre = $_SESSION['vsNombre'];
$pruebaget = $_REQUEST['id_orden']; //obtengo la variable id orden 


$base = $_SESSION['base'];
// $anio = '22';
$anio=$_SESSION['year'];
$bd = $base . $anio;

$con = mysqli_connect('localhost', 'admin', 'AG784512', '' . $bd . '');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, '' . $bd . '');

if ($nombre == 'admin') {
  $id = $_SESSION['vsIdtemporal'];

  $obteniendo2 = mysqli_query($conexion, "select id_empresa, nombre from empresa where id_empresa='" . $id . "' ");
  while ($filas = mysqli_fetch_array($obteniendo2)) {

    $nombre = $filas[1];
  }
  if ($nombre == "COLGATE PALMOLIVE CA") {

    $nombre = "COLGATE PALMOLIVE CA INC";
  }
}

if (!isset($_GET['buscar']) or empty($_GET['buscar'])) {
  /**CONSULTA ANTIGUA
select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica
t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='".$id."'    order by t1.f_llegada desc
   **/

  /* CONSULTA NUEVA CON LA COTIZACION INCLUIDA REEMPLAZAR DESPUES
  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa=4595 order by t1.f_llegada desc*/


  $consulta = mysqli_query($conexion, "  select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.vendedor, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
 t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=1 and status='IMPRESION'   and t2.id_empresa='" . $id . "' order by t5.cot desc
 ");
  $ordenes_entregadas = mysqli_num_rows($consulta);





  include("connect2.php");
  $conexion2 = conexion2();
  /**CONSULTA ANTIGUA 
  select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica
 a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc**/
  /**CONSULTA NUEVA
  select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='PEP PROMOTIONS' and a1.estado=0 and a1.status='ENTREGADO'  order by a1.f_llegada asc 
   **/
  /*
  $consulta2 = mysqli_query($conexion2,"select DISTINCT  a1.id_orden, a1.estado,a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion,a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio,a2.id_orden,a2.id_empresa,a2.empresa,a3.id_orden,a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='".$nombre."' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc   

 ");*/
  $ordenes_entregadas2 = mysqli_num_rows($consulta2);
  $conteo_entregadas = $ordenes_entregadas + $ordenes_entregadas2;





  //MOSTRANDO NUMERO DECOTIZACION SIN REPETIR 
  $consulta1 = mysqli_query($conexion2, "select DISTINCT  a3.cot from logitica
 a1 INNER JOIN pop a2 on a1.id_orden=a2.id_orden INNER JOIN pop_detalle a3 on a1.id_orden=a3.id_orden  WHERE a2.empresa='" . $nombre . "' and a1.estado=0 and a1.status='ENTREGADO'  order by a3.cot asc
  ");
} else {
  include("connect.php");
  $conexion = conexion();

  $consulta = mysqli_query($conexion, "  select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.numorden_compra t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica
 t1 inner join pop t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa='" . $id . "' and t4.marca LIKE '%" . $_GET['buscar'] . "%'  order by t1.destino asc 
 ");



  $ordenes_entregadas = mysqli_num_rows($consulta);



  include("connect2.php");
  $conexion2 = conexion2();

  $consulta2 = mysqli_query($conexion2, "select a1.id_orden, a1.estado,a2.id_orden, a2.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada, a1.descripcion, a1.status ,a1.m_carga,
a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra, a1.nota_envio FROM logitica
 a1 inner join pop a2 on a1.id_orden=a2.id_orden inner join empresa a3 on a2.id_empresa=a3.id_empresa WHERE a2.empresa='" . $nombre . "' and a1.estado=0 and a1.status='ENTREGADO' and a1.marca LIKE '%" . $_GET['buscar'] . "%'   order by a1.f_llegada asc ");

  $ordenes_entregadas2 = mysqli_num_rows($consulta2);
  $conteo_entregadas = $ordenes_entregadas + $ordenes_entregadas2;
}


include 'pagination.php'; //include pagination file
//pagination variables
$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
$per_page = intval($_REQUEST['per_page']); //how much records you want to show
$adjacents  = 4; //gap between pages after number of adjacents
$offset = ($page - 1) * $per_page;
//Count the total number of row in your table*/
$count_query   = mysqli_query($conexion, "SELECT count(*) AS numrows FROM $tables where $sWhere ");
if ($row = mysqli_fetch_array($count_query)) {
  $numrows = $row['numrows'];
} else {
  echo mysqli_error($con);
}
$total_pages = ceil($numrows / $per_page);


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

  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

  <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
  <!-- END GLOBAL MANDATORY STYLES -->
  <!-- BEGIN PAGE LEVEL STYLES -->
  <link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css" />


  <!-- END PAGE LEVEL STYLES -->
  <!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
  <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL PLUGIN STYLES -->
  <!-- BEGIN PAGE STYLES -->
  <link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
  <!-- END PAGE STYLES -->
  <!-- BEGIN THEME STYLES -->
  <link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
  <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
  <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />


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


    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <div class="page-content">
        <div id="page-content">


          <!-- BEGIN PAGE HEADER

      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Dashboard</a>
          </li>
        </ul>
        
      </div>

    
      <h3 class="page-title">
      Dashboard <small>reports & statistics</small>
      </h3>
     END PAGE HEADER-->


          <!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->




          <div class="row">




            <div class="col-md-8">









            </div>

          </div>












          <!-- *************************************************************************************************************************************** -->

          <?
          // *********************************************************************************************************************************** //

          if (isset($_REQUEST["orden"])) {

            include($base . "_db.php");

            $orden = $_REQUEST["orden"];

            $rs_en = $mysqli->query("SELECT * FROM cotizacion WHERE id_cotizacion='" . $orden . "'");
            while ($fila_en = $rs_en->fetch_assoc()) {
              $empresa = $fila_en["empresa"];
              $contacto = $fila_en["contacto"];
              $vendedor = $fila_en["vendedor"];
              $fecha = $fila_en["fecha"];
              $id_vendedor = $fila_en["id_vendedor"];
              $id_contacto = $fila_en["id_contacto"];
              $id_empresa = $fila_en["id_empresa"];
            }

            $mysqli->close();
          }
          // *********************************************************************************************************************************** //
          ?>
          <div class="col-md-12" style="margin-left: -50px;">

            <div id="contenedor3" class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  <i class=" icon-book-open font-green-sunglo"></i> Cotizacion # <label id="orden_color"><?= $orden ?></label>
                  &nbsp;&nbsp;&nbsp;
                  <a data-toggle="modal" data-target="#ModalSubir">
                    <font color="white">Editar Cabecera</font>
                  </a>
                </div>

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
                            <label class="control-label"><strong>Cliente:</strong></label>&nbsp;&nbsp; <label class="label1" id="cliente_color"><?= $empresa ?></label>




                          </div>


                          <div class="col-md-5">
                            <label class="control-label"><strong>Vendedor:</strong></label>&nbsp;&nbsp;<label class="label1" id="vendedor_color"><?= $vendedor ?></label>


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
                            <label class="control-label"><strong>Contacto:</strong></label>&nbsp;&nbsp;<label class="label1" id="contacto_color"><?= $contacto ?></label>

                          </div>


                          <div class="col-md-5">
                            <label class="control-label "><strong>Fecha:</strong></label>&nbsp;&nbsp;<label class="label1" id="fecha_color"><?= $fecha ?></label>


                          </div>



                        </div>

                      </div>
                    </div>

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

            include($base . "_db.php");

            $orden = $_REQUEST["orden"];
            $id_detalle = $_REQUEST["det"];

            $rs_m = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_detalle_cotizacion='" . $id_detalle . "' AND id_cotizacion='" . $orden . "'");

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




          <div class="col-md-12" style="margin-left: -50px;">

            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div id="contenedor2" class="portlet light bordered">
              <div class="portlet-title">
                <div class="caption font-green-sunglo">
                  <i class="   icon-note font-green-sunglo"></i>

                </div>

                <div class="actions">
                  <form id="form1" action="archivos_cot/cot.sql.php" method="post" role="form">
                    <input type="hidden" name="bandera" value="4">

                    <input type="hidden" name="costo_total" id="costo_total" value="<?= $costo_total ?>" />
                    <input type="hidden" name="iva" id="iva" value="<?= $iva ?>" />
                    <input type="hidden" name="orden" id="orden" value="<?= $orden ?>" />
                    <input type="hidden" name="id_detalle" id="id_detalle" value="<?= $id_detalle ?>" />
                    <input type="hidden" name="base" value="<?= $base ?>">

                    <!--<strong>IVA:</strong>&nbsp;
              <select name="porcentaje" id="porcentaje" ><option value="0.13"  selected="selected">0.13%</option><option value="0.15" >0.15%</option><option value="0">0%</option></select>-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input value="<?= $cantidad ?>" required size="2" type="number" name="cantidad" id="cantidad" step="any" min="0" placeholder="Cantidad">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input value="<?= $precio_unitario ?>" required size="2" type="number" name="precio_unitario" id="precio_unitario" step="any" min="0" placeholder="Precios">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <?

                    if (isset($_REQUEST["det"])) {
                      echo '<button id="actualizar_detalle" type="button" class="btn blue">Actualizar</button>';
                    } else {
                      echo '<button id="agregar_detalle" type="button" class="btn blue">Agregar</button>';
                    }


                    // echo '<button id="agregar_detalle" type="button" class="btn green">Agregar</button>';
                    ?>
                </div>


                <!--
              <div class="actions">
                <div class="btn-group">
                  <a class="btn btn-sm green dropdown-toggle" href="javascript:;" data-toggle="dropdown">
                  Actions <i class="fa fa-angle-down"></i>
                  </a>
                  <ul class="dropdown-menu pull-right">
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-pencil"></i> Edit </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-trash-o"></i> Delete </a>
                    </li>
                    <li>
                      <a href="javascript:;">
                      <i class="fa fa-ban"></i> Ban </a>
                    </li>
                    <li class="divider">
                    </li>
                    <li>
                      <a href="javascript:;">
                      <i class="i"></i> Make admin </a>
                    </li>
                  </ul>
                </div>
              </div>
-->

              </div>
              <div class="portlet-body form" style="margin-top: -40px;">

                <div class="form-body">


                  <div class="form-group form-md-line-input">
                    <textarea name="detalle" id="detalle" class="form-control" rows="3" placeholder="Ingrese el detalle"><?= $textarea ?></textarea>
                    <label for="form_control_1">Descripcion</label>
                  </div>



                </div>
                <div class="form-actions noborder" style="margin-top: -60px; height: 20px;">

                  <p align="right"> <strong>TOTAL OFERTA:</strong>&nbsp;&nbsp;&nbsp;<input type="number" name="total_oferta" id="total_oferta" size="4" readonly value="<?= $total_oferta ?>" /> </p>

                </div>
                </form>
              </div>
            </div>
            <!-- END SAMPLE FORM PORTLET-->




          </div>













          <a href="javascript: void(0);" onclick="parent.window.location='cotizaciones2.php?exito=1'"><input type="submit" name="next" class="btn red" value="FINALIZAR COTIZACION" style="width: 200px;" /></a>


          <div class="col-md-12" style="margin-left: -50px;">
            <!-- BEGIN ACCORDION PORTLET-->
            <div id="details" class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  <i class="fa fa-list-ul"></i>Detalles



                </div>





                <div class="tools">

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c13" />
                    <input type="hidden" name="size" value="n" />
                    <button type="submit" class="btn btn-danger btn-sm"> 13% IVA V1 N</button>
                  </form>

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c13" />
                    <input type="hidden" name="size" value="l" />
                    <button type="submit" class="btn btn-danger btn-sm"> 13% IVA V2 LL</button>
                  </form>

                </div>




                <div class="tools">



                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c15" />
                    <input type="hidden" name="size" value="n" />
                    <button type="submit" class="btn btn-info btn-sm"> 15% IVA V1 N</button>
                  </form>

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c15" />
                    <input type="hidden" name="size" value="l" />
                    <button type="submit" class="btn btn-info btn-sm"> 15% IVA V2 L</button>
                  </form>

                </div>


                <? if ($_SESSION['base'] == 'esa') {  ?>

                  <div class="tools">

                    <form class="generar" name="form6" target="_blank" action="pdf2.php" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="c12" />
                      <input type="hidden" name="size" value="n" />
                      <button type="submit" class="btn btn-success btn-sm"> 12% IVA V1 N</button>
                    </form>

                    <form class="generar" name="form6" target="_blank" action="pdf2.php" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="c12" />
                      <input type="hidden" name="size" value="l" />
                      <button type="submit" class="btn btn-success btn-sm"> 12% IVA V2 L</button>
                    </form>

                  </div>



                  <div class="tools">

                    <form class="generar" name="form6" target="_blank" action="pdf3.php" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="c12q" />
                      <input type="hidden" name="size" value="n" />
                      <button type="submit" class="btn btn-info btn-sm"> 12% IVA V1 Q$ N</button>
                    </form>

                    <form class="generar" name="form6" target="_blank" action="pdf3.php" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="c12q" />
                      <input type="hidden" name="size" value="l" />
                      <button type="submit" class="btn btn-info btn-sm"> 12% IVA V2 Q$ L</button>
                    </form>

                  </div>



                <?  } ?>


                <div class="tools">



                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c0" />
                    <input type="hidden" name="size" value="n" />
                    <button type="submit" class="btn btn-warning btn-sm"> 0% IVA V1 N</button>
                  </form>

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c0" />
                    <input type="hidden" name="size" value="l" />
                    <button type="submit" class="btn btn-warning btn-sm"> 0% IVA V2 L</button>
                  </form>

                </div>


                <?

                if ($_SESSION['base'] == 'nica') {

                ?>

                  <div class="tools">

                    <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="cs15" />
                      <input type="hidden" name="size" value="n" />
                      <button type="submit" class="btn btn-danger btn-sm"> 15% IVA V1 C$ N</button>
                    </form>

                    <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                      <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                      <input type="hidden" name="tipo" value="cs15" />
                      <input type="hidden" name="size" value="l" />
                      <button type="submit" class="btn btn-danger btn-sm"> 15% IVA V2 C$ L</button>
                    </form>



                  </div>




                <?

                }


                ?>



                <div class="tools">

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c7" />
                    <input type="hidden" name="size" value="n" />
                    <button type="submit" class="btn btn-warning btn-sm"> 7% IVA V1 $ N</button>
                  </form>

                  <form class="generar" name="form6" action="pdf2.php" target="_blank" method="post">
                    <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                    <input type="hidden" name="tipo" value="c7" />
                    <input type="hidden" name="size" value="l" />
                    <button type="submit" class="btn btn-warning btn-sm"> 7% IVA V2 $ L</button>
                  </form>

                </div>




              </div>


              <div class="portlet-body">
                <div class="panel-group accordion" id="accordion1">

                  <?
                  // *********************************************************************************************************************************** //

                  if (isset($_REQUEST["orden"])) {

                    include($base . "_db.php");

                    $orden = $_REQUEST["orden"];

                    $rs_as = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='" . $orden . "' order by id_detalle_cotizacion asc");

                    $pi = 0;

                    while ($fila_as =  $rs_as->fetch_assoc()) {

                      $pi = $pi + 1;
                      $id_detalle = $fila_as["id_detalle_cotizacion"];
                      $detalle = $fila_as["detalle"];
                      $textarea = str_replace("\n", "<br>", $detalle);
                      $precio_unitario = $fila_as["precio"];
                      $cantidad = $fila_as["cantidad"];
                      $costo_total = $fila_as["costo_total"];
                      $iva = $fila_as["iva"];
                      $total_oferta = $fila_as["total_oferta"];


                      echo '<div id="aq_' . $id_detalle . '" class="panel panel-default"><div id="pnn_' . $id_detalle . '" class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_' . $id_detalle . '"><b>Detalle ' . $pi . '</b> </a></h4></div><div id="collapse_' . $id_detalle . '" class="panel-collapse collapse"><div class="panel-body"  overflow-y:auto;">
       
                         <div class="row"><div id="cnt2" class="col-xs-12 col-sm-12 col-md-12"><div class="row"><div id="sep" class="col-md-12"></div></div><div class="row"><div id="sep" class="col-md-12"></div></div>

                        <div class="row"><div id="tab-container"  class="table-responsive"><table id="tab" class="table table-bordered table-condensed"><thead>
                        <tr><td></td><td><strong>Detalle</strong></td><td align="center"><strong>Cantidad</strong></td><td align="center"><strong>Precio</strong></td><td align="center"><strong>Costo Total</strong></td></tr></thead><tbody>
                                
                       <tr><td><a class="delete" href="#" page="' . $id_detalle . '"><img id="ex2" src="images/eli.png" alt="Eliminar Registro" /></a><br><br><br>

                    <a target="_self" href="cot_detalle.php?det=' . $id_detalle . '&orden=' . $orden . '" ><img id="ex2" src="images/edit.png" alt="Editar Registro" /></a>

                        
                         </td><td><span>' . $textarea . '</span></td><td align="center">' . $cantidad . '</td><td align="center">$' . $precio_unitario . '</td><td align="center">$' . $costo_total . '</td></tr></tbody></table></div></div></div></div>  </div></div></div>';
                    }

                    $mysqli->close();
                  }


                  // *********************************************************************************************************************************** //

                  ?>




                  <?
                  // *********************************************************************************************************************************** //
                  /*
              if (isset($_REQUEST["orden"])) {

                 include("connect.php");

                 $orden=$_REQUEST["orden"];

                 $rs_m=$mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='".$orden."'");

                 $pi=0;
                   
                   while ($fila_m = $rs_m->fetch_assoc()) {

                    $pi=$pi + 1;
                    $id_detalle = $fila_m["id_detalle_cotizacion"];
                    $detalle = $fila_m["detalle"]; 
                    $textarea = str_replace("\n", "<br>", $detalle);
                    $precio_unitario = $fila_m["precio"]; 
                    $cantidad = $fila_m["cantidad"]; 
                    $costo_total = $fila_m["costo_total"];
                    $iva = $fila_m["iva"];
                    $total_oferta = $fila_m["total_oferta"];


                       echo '<div id="aq_'.$id_detalle.'" class="panel panel-default"><div id="pnn_'.$id_detalle.'" class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_'.$id_detalle.'"><b>Detalle '.$pi.'</b> </a></h4></div><div id="collapse_'.$id_detalle.'" class="panel-collapse collapse"><div class="panel-body"  overflow-y:auto;">
       
                         <div class="row"><div id="cnt2" class="col-xs-12 col-sm-12 col-md-12"><div class="row"><div id="sep" class="col-md-12"></div></div><div class="row"><div id="sep" class="col-md-12"></div></div>

                        <div class="row"><div id="tab-container"  class="table-responsive"><table id="tab" class="table table-bordered table-condensed"><thead>
                        <tr><td></td><td><strong>Detalle</strong></td><td align="center"><strong>Cantidad</strong></td><td align="center"><strong>Precio</strong></td><td align="center"><strong>Costo Total</strong></td><td align="center"><strong>Iva</strong></td><td align="center"><strong>Total Oferta</strong></td></tr></thead><tbody>
                                
                       <tr><td><a class="delete" href="#" page="'.$id_detalle.'"><img id="ex2" src="images/eli.png" alt="Eliminar Registro" /></a><br><br><br>

                    <a target="_self" href="cot.detalle.php?det='.$id_detalle.'&orden='.$orden.'" ><img id="ex2" src="images/edit.png" alt="Editar Registro" /></a>

                        
                         </td><td><span>'.$textarea.'</span></td><td align="center">'.$cantidad.'</td><td align="center">$'.$precio_unitario.'</td><td align="center">$'.$costo_total.'</td><td align="center" >$'.$iva.'</td><td align="center">$'.$total_oferta.'</td></tr></tbody></table></div></div></div></div>  </div></div></div>';

                   }

                 $mysqli->close();
              }
              */

                  // *********************************************************************************************************************************** //

                  ?>





                </div>
              </div>
            </div>
          </div>






















        </div>


        <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->





        <!----------------- ----------------------------------------------------------------------------------------------------------- -->




        <!-- SECCION DE ALERTAS -->

        <!-- ******************************************************************************************************************* -->

        <a id="vacio" href="#modal1" role="button" data-toggle="modal"></a>


        <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-danger"> <i class="fa fa-warning"></i> <strong>Alerta!</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>Por favor llene todos los campos del formulario.</strong></h4>
                  </center>
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

        <a id="exito" href="#modal2" role="button" data-toggle="modal"></a>


        <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>Se ha creado la cotizacion exitosamente.<strong></h4>
                  </center>
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

        <a id="exito_detalle" href="#modal3" role="button" data-toggle="modal"></a>


        <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>Se ha eliminado el detalle exitosamente.<strong></h4>
                  </center>
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

        <a id="exito_detalle2" href="#modal4" role="button" data-toggle="modal"></a>


        <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>El detalle se ha actualizado exitosamente.<strong></h4>
                  </center>
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

        <a id="exito_detalle3" href="#modal5" role="button" data-toggle="modal"></a>


        <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="alert alert-success"><i class="fa fa-check-square"></i> <strong>Notificacion</strong></h4>
              </div>
              <div class="modal-body">
                <p>
                  <center>
                    <h4><strong>Se ha agregado el detalle exitosamente.<strong></h4>
                  </center>
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
            height: 275px;

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


          #detalle_color {


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


          #ex2 {
            width: 25px;
            height: 25px;
          }

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


      </div>
    </div>
  </div>
  <!-- END CONTENT -->


  </div>
  <!-- END CONTAINER -->



  <form method="post" action="archivos_cot/update.cot.php" enctype="multipart/form-data">
    <div class="modal fade" id="ModalSubir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Datos de Cotizacion</h4>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <input id="id_orden3" type="hidden" class="form-control" name="id" aria-label="..." value="<? echo $orden; ?>" required>
            </div>

            <div class="form-group">
              <label class="control-label"><strong>Cliente:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa   fa-briefcase"></i>
                </span>
                <select id="empresa" name="empresa" class="select2_category form-control" tabindex="1" required>
                  <option value="<? echo $id_empresa; ?>"><? echo $empresa; ?></option>
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM empresa");
                  while ($fila = $rs->fetch_row()) {
                    echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>
            <div class="form-group">

              <label class="control-label"><strong>Contacto:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa  fa-users"></i>
                </span>
                <select id="contacto" name="contacto" class="select2_category form-control" tabindex="1" required>
                  <!-- <option value="<? echo $id_contacto; ?>"><? echo $contacto; ?></option> -->
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM contacto WHERE id_empresa='$id_empresa'");
                  while ($fila = $rs->fetch_row()) {
                    echo '<option value="' . $fila[0] . '">' . $fila[2] . '</option>';
                  } 
                  $mysqli->close();
                  ?>
                </select>
              </div>

            </div>
            <div class="form-group">
              <label class="control-label"><strong>Vendedor:</strong></label>

              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa  fa-user-md"></i>
                </span>
                <select id="vendedor" name="vendedor" class="select2_category form-control" tabindex="1">
                  <option value="<? echo $id_vendedor; ?>"><? echo $vendedor; ?></option>
                  <?php
                  include($base . "_db.php");

                  $rs = $mysqli->query("SELECT * FROM vendedores WHERE estado='1' and nombre!='" . $vendedor . "'");
                  while ($fila = $rs->fetch_row()) {
                    echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>



            <div class="modal-footer">
              <br>
              <br><br>
              <br>
              <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-success">Modificar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    </div>

  </form>







  <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
  <!-- BEGIN CORE PLUGINS -->
  <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

-->





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





  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/clockface/js/clockface.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

  <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>


  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>


  <script type="text/javascript">
    jQuery(document).ready(function() {




      //*****************************************************
      // AQUI SE REALIZA EL CHAGEN PARA EL CAMBIO DE CONTACTO AL SELECCIONAR OTRA EMPRESA
      jQuery('#empresa').change(function() {

        jQuery('#contacto').fadeOut();
        jQuery.post("archivos_cot/produccion.contactos.php", {
            base: "<?php echo $base ?>",
            emp: jQuery('#empresa').val(),
          },

          function(response) {
            jQuery('#contacto').html(response);
            jQuery('#contacto').fadeIn();
          });
        return false;
      });
      //*******************************************************


      //*************************************************************************************************

      //**************************************************************************************************
    });
  </script>
  <script src="cot.js"></script>

  <!-- END PAGE LEVEL SCRIPTS -->




  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();
      //-----------------------------------------------------------------

      jQuery("#contenedor1").hide();

      //-----------------------------------------------------------------
      //-----------------------------------------------------------------

      jQuery('#cantidad,#precio_unitario').keyup(function() {
        var c = jQuery('#cantidad').val();
        var pu = jQuery('#precio_unitario').val();
        // var porcentaje= jQuery( "#porcentaje option:selected").val();
        var porcentaje = 0;
        var cp;

        if (c == "") {
          c = 0;
        }
        if (pu == "") {
          pu = 0;
        }

        if (porcentaje == 0.13) {
          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.13
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0.15) {
          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.15
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0) {
          tf = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(tf.toFixed(2));
          //jQuery( '#iva' ).val( 0.00 );
          jQuery('#total_oferta').val(tf.toFixed(2));
        }

      }).keyup();


      jQuery("#porcentaje").change(function() {
        var c = jQuery('#cantidad').val();
        var pu = jQuery('#precio_unitario').val();
        var porcentaje = jQuery("#porcentaje option:selected").val();
        var cp;

        if (c == "") {
          c = 0;
        }
        if (pu == "") {
          pu = 0;
        }

        if (porcentaje == 0.13) {
          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.13
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0.15) {

          cp = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.15
          jQuery('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          jQuery('#total_oferta').val(tf.toFixed(2));
        } else if (porcentaje == 0) {

          tf = parseFloat(c) * parseFloat(pu);
          jQuery('#costo_total').val(tf.toFixed(2));
          jQuery('#iva').val(0.00);
          jQuery('#total_oferta').val(tf.toFixed(2));

        }



      });


      //----------------------------------------------------------





      //----------------------------------------------------------

      jQuery(document).on('click', '.delete', function() {

        //jQuery("#page-content").hide(); 
        var ff = jQuery(this).attr("page");
        var bandera = 3;


        // AJAX Code To Submit Form.
        var dataString = 'det=' + ff + '&bandera=' + bandera;

        jQuery.ajax({
          type: "POST",
          url: "archivos_cot/cot.sql.php",
          data: dataString,
          cache: false,
          //contentType: false,
          //processData: false,

          success: function(result) {

            if (result != '') {


              jQuery("#collapse_" + ff).hide();
              jQuery("#pnn_" + ff).hide();
              jQuery("#aq_" + ff).hide();
              jQuery('#exito_detalle').click();
            }


          }

        });

        //jQuery('#page-content').fadeIn(1000);
        // return false;

      });

      //----------------------------------------------------------


      //*************************************************************************************************
      jQuery("#actualizar_detalle").click(function() {
      jQuery("#actualizar_detalle").prop("disabled", true);

        var orden = jQuery("#orden").val();
        var id_detalle = jQuery("#id_detalle").val();
        var costo_total = jQuery("#costo_total").val();
        var cantidad = jQuery("#cantidad").val();
        var precio_unitario = jQuery("#precio_unitario").val();
        var iva = jQuery("#iva").val();
        var total_oferta = jQuery("#total_oferta").val();
        var detalle = jQuery("#detalle").val();
        var bandera = 4;

        textarea_line = detalle.replace(new RegExp("\n", "g"), "<br>");



        if (cantidad == '' || precio_unitario == '' || detalle == '') {
          jQuery('#vacio').click();
          jQuery("#actualizar_detalle").prop("disabled", false);
        } else {
          jQuery("#form1").submit();
        }
        //*************************************************************************************************

        return false;
      });
      //**************************************************************************************************







    });
  </script>




  <!-- END JAVASCRIPTS -->
  </div> <!-- DIV HDIE -->



</body>

</html>