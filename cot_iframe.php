<?php
session_start();

$var = '<p id="resultado"></p>';
//$vars='<p id="resultado"></p>';
//$var2='<p id="resultado2"></p>';

$id_tres = $var;
$id = $_SESSION['vsIdempresa'];

$nombre = $_SESSION['vsNombre'];



$pruebaget = $_REQUEST['id_orden']; //obtengo la variable id orden 
// session_start();

$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base.$anio;


$con = mysqli_connect('localhost', 'root', '', '' . $bd . '');
if (!$con) {
  die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con, '' . $bd . '');

if ($nombre == 'root') {



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

  /** CONSULTA NUEVA CON LA COTIZACION INCLUIDA REEMPLAZAR DESPUES select t1.id_logistica, t1.id_orden, t1.origen, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t2.id_empresa=4595 order by t1.f_llegada desc*/


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
  /* CONSULTA NUEVA
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

    <header class="main-header">
      <!-- Logo -->


    </header>
    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="col-xs-12 col-md-12 col-lg-12 col-xl-12" align="center" style="margin-top: 40px;">




      <div class="col-md-12">


        <div id="contenedor1" class="portlet box blue">
          <div class="portlet-title">
            <div class="caption">
              <i class=" icon-book-open font-green-sunglo"></i> Nueva Cotizacion
            </div>

          </div>




          <div class="portlet-body form">
            <!-- BEGIN FORM-->
            <form id="crea" action="archivos_cot/cot.sql.php" class="horizontal-form" method="post">
              <input type="hidden" name="bandera" value="1">
              <div class="form-body">
                <h3 class="form-section">Informacion</h3>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">

                      <label class="control-label"><strong>Cliente:</strong></label>
                      <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                          <i class="fa   fa-briefcase"></i>
                        </span>
                        <select id="empresa" name="empresa" class="select2_category form-control" tabindex="1" required>
                          <option value="0">Seleccione Empresa</option>
                          <?php
                          include($base."_db.php");
                          $rs = $mysqli->query("SELECT * FROM empresa");
                          while ($fila = $rs->fetch_row()) {
                            echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                          }
                          $mysqli->close();
                          ?>
                        </select>
                      </div>


                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">

                      <label class="control-label"><strong>Vendedor:</strong></label>

                      <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                          <i class="fa  fa-user-md"></i>
                        </span>
                        <select id="vendedor" name="vendedor" class="select2_category form-control" tabindex="1">
                          <?php
                          include($base."_db.php");

                          $rs = $mysqli->query("SELECT * FROM vendedores WHERE estado='1'");
                          while ($fila = $rs->fetch_row()) {
                            echo '<option value="' . $fila[0] . '">' . $fila[1] . '</option>';
                          }
                          $mysqli->close();
                          ?>
                        </select>
                      </div>


                    </div>
                  </div>
                  <!--/span-->
                </div>







                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">

                      <label class="control-label"><strong>Contacto:</strong></label>
                      <div class="input-group">
                        <span class="input-group-addon input-circle-left">
                          <i class="fa  fa-users"></i>
                        </span>
                        <select id="contacto" name="contacto" class="select2_category form-control" tabindex="1" required>
                          <option value="0">Seleccione Contacto</option>
                        </select>
                      </div>

                    </div>
                  </div>
                  <!--/span-->
                  <div class="col-md-6">
                    <div class="form-group">

                      <label class="control-label "><strong>Fecha:</strong></label>
                      <input id="fecha" name="fecha" type="text" class="form-control" readonly value="<?= date("d-m-Y"); ?>">

                    </div>
                  </div>
                  <!--/span-->
                </div>




                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">


                      <label class="control-label "><strong>Nota:</strong></label>

                      <textarea name="nota" id="nota" rows="3" data-width="1000" class="form-control">No incluye garantia en caso de accidentes ocasionados por desastres naturales o vandalicos. Si necesita sus Cds de regreso notificarlo a su ejecutvo. Estos son desechados cada 15 dias.</textarea>




                    </div>
                  </div>
                  <!--/span-->


                </div>



                <div class="form-actions left">
                  <button id="nueva_coti" type="button" class="btn blue">Crear Cotizacion</button>
                </div>
            </form>
            <!-- END FORM-->
          </div>
        </div>






      </div>

    </div>


  </div>


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
  </style>













  <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


  </div>
  </div>
  </div>
  <!-- END CONTENT -->


  </div>
  </div>
  </div>





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



  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>



  <script>
    jQuery(document).ready(function() {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();





      //*****************************************************         
      jQuery('#empresa').change(function() {

        jQuery('#contacto').fadeOut();
        jQuery.post("archivos_cot/produccion.contactos.php", {
            emp: jQuery('#empresa').val(),
            base: '<?=$base?>'
          },

          function(response) {
            jQuery('#contacto').html(response);
            jQuery('#contacto').fadeIn();
          });
        return false;
      });
      //*******************************************************


      //*************************************************************************************************
      jQuery("#nueva_coti").click(function() {
        jQuery("#nueva_coti").prop("disabled", true);

        var empresa = jQuery("#empresa").val();
        var nom_empresa = jQuery("#empresa option:selected").text();
        var vendedor = jQuery("#vendedor").val();
        var nom_vendedor = jQuery("#vendedor option:selected").text();
        var fecha = jQuery("#fecha").val();
        var contacto = jQuery("#contacto").val();
        var nota = jQuery("#nota").val();
        var nom_contacto = jQuery("#contacto option:selected").text();

        if (empresa == 0 || contacto == 0) {
          jQuery('#vacio').click();
          jQuery("#nueva_coti").prop("disabled", false);
        } else {


          jQuery('#crea').submit(function() {
            jQuery('#crea').append('<input type="hidden" name="nom_empresa" value="' + nom_empresa + '" /> ');
            jQuery('#crea').append('<input type="hidden" name="nom_vendedor" value="' + nom_vendedor + '" /> ');
            jQuery('#crea').append('<input type="hidden" name="nom_contacto" value="' + nom_contacto + '" /> ');
            return true;
          });

          jQuery("#crea").submit();


        }
        return false;
      });
      //**************************************************************************************************











    });
  </script>





</body>

</html>