<?php
session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'];

function conexion()
{

  $server = 'localhost';
  $usuario = 'root';
  $clave = '';
  $bd = 'esa22';

  $con = mysqli_connect($server, $usuario, $clave, $bd);

  if (!$con) {

    die('no conecta amigo ' . mysqli_error());
  } else {


    return ($con);
  }
}

$conexion = conexion();

?>



<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Color Digital | 2023</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
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

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

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







  <!------ Include the above in your HEAD tag ---------->

  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">





  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">



  <?php
  if (trim($pruebaget) == false) { ?>

  <?php
  } else { ?>
    <script type="text/javascript">
      $(function () {
        $("#anuncio").modal();
      });
    </script>



  <?php }

  ?>

  <script>
    $(function () {

      $(".fancyOther").fancybox({
        width: '100%',
        height: '100%',
        maxWidth: 800,
        maxHeight: 600,
        fitToView: false,
        autoSize: false,
        closeClick: false,
        openEffect: 'none',
        closeEffect: 'none'
      });
    });
  </script>

  <style>
    .content {
      margin-top: 80px;
    }
  </style>



  <style type="text/css">
    .zeroPadding {
      padding: 0 !important;
    }
  </style>


  <style>
    input[type="number"] {
      width: 100px;
    }

    .divTableHeading {
      background-color: #EEE;
      display: table-header-group;
      font-weight: bold;
    }

    .divTableFoot {
      background-color: #EEE;
      display: table-footer-group;
      font-weight: bold;
    }

    .divTableBody {
      display: table-row-group;
    }




    /*---------------------------------*/

    #sample_5 {
      border-style: solid;
      border-width: 1px;
      border-color: black;
    }


    #maintd {

      border-bottom: 1px solid #000000;
      border-right: 1px solid #000000;
    }

    #maintd2 {
      border-top: 1px solid #000000;
    }

    #maintd3 {
      border-bottom: 1px solid #000000;
    }

    #maintd4 {
      border-left: 1px solid #000000;
    }

    #maintd5 {
      border-left: 1px solid #000000;
      border-bottom: 1px solid #000000;
    }

    #maintd6 {
      border-top: 1px solid #000000;
      border-left: 1px solid #000000;
    }

    .dfs {
      background-color: #d3d3d3 !important;
    }

    /* Let's get this party started */
    ::-webkit-scrollbar {
      width: 12px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
      -webkit-border-radius: 10px;
      border-radius: 10px;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
      -webkit-border-radius: 10px;
      border-radius: 10px;
      background: rgba(​192, 192, 192, 0.3);
      -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.5);
    }

    ::-webkit-scrollbar-thumb:window-inactive {
      background: rgba(​192, 192, 192, 0.3);
    }

    /*------------------------------------------*/

    #fms {
      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fmsd1 {

      /* height: 110px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd2 {

      /*height: 170px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd3 {

      /*height: 60px;*/
      /* border-bottom: thin solid #000000;  */
    }



    #fms3 {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fms0 {

      display: flex;

    }


    .dataTables_filter input {
      width: 100px !important
    }



    body {


      background-color: "#ffffff" !important;

    }












    /*------------------------------------------*/





    #fmsp {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fmsd1p {

      /* height: 110px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd2p {

      /*height: 170px;*/
      border-bottom: thin solid #000000;
    }

    #fmsd3p {

      /*height: 60px;*/
      /* border-bottom: thin solid #000000;  */
    }



    #fms3p {


      border-style: solid;
      border-width: 1px;
      padding: 20px;

      padding: 0px;
      margin-right: -1px;
      margin-bottom: -1px;
      margin-top: -1px;

    }

    #fms0p {

      display: flex;

    }

    /*------------------------------------------*/
  </style>


  <style type="text/css" media="screen">
    a:link {
      color: #000000;
      text-decoration: none;
    }

    a:visited {
      color: #000000;
      text-decoration: none;
    }

    a:hover {
      color: #000000;
      text-decoration: none;
    }

    a:active {
      color: #000000;
      text-decoration: underline;
    }
  </style>





</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <?php require('navbar.php'); ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <?php if ($nivel != 50) { ?><img src="images/logo_color.png" alt="AdminLTE Logo"
            style="opacity: .8;margin-left:10%" width="150"><?php } ?>
        <span class="brand-text font-weight-light"></span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <?php if ($base == "esa") { ?>
            <div class="image">
              <img src="images/esa1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php }
          if ($base == "nica") { ?>
            <div class="image">
              <img src="images/nica1.png" class="img-circle elevation-2" alt="User Image">
            </div>
          <?php } ?>
          <div class="info">
            <a href="#" class="d-block"><?php echo $nombre; ?></a><a class="d-block"> online <i class="fas fa-signal"
                style="color: #2EFE2E"></i></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <?php require("menu4.php"); ?>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">

      <div class="container col-xs-12 col-md-12 col-lg-12 col-xl-12">


        <div class="table-responsive" align="center">


          </form>
          <br>
          <!--<div id="txtHint"><b>Person info will be listed here.</b></div>-->

          <!-- IFRAME 
          <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="form2.php"><i class="far fa-edit"></i></a>-->
          <div align="Left">
            <h3 class="page-header">

              REGISTRO DE LOGISTICA EL SALVADOR &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="imagenes/aereo.png"
                width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/aereoo.png"
                width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/ubicacion.png" width="40">
            </h3>

          </div>
          <form class="form-inline" method="get">

            <div class="form-group">

              <select name="filter" class="form-control" onchange="form.submit()">

                <option value="0">Filtro por estado de orden</option>
                <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL); ?>
                <option value="1" <?php if ($filter == 'Tetap') {
                  echo 'selected';
                } ?>>En espera</option>
                <option value="2" <?php if ($filter == 'Kontrak') {
                  echo 'selected';
                } ?>>Impresion</option>
                <option value="3" <?php if ($filter == 'Outsourcing') {
                  echo 'selected';
                } ?>>Corte</option>
              </select>
            </div>
          </form>
          <br />
          <div class="table-responsive">

            <table class="table table-striped table-hover" style="font-size: 10pt;">
              <thead class="bg-primary">
                <tr>
                  <th># OP</th>
                  <th>Cot</th>
                  <th>OC</th>
                  <th>Cliente</th>
                  <th>Campaña</th>
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>ETD</th>
                  <th>ETA</th>
                  <th>Doc</th>
                  <th>Estado</th>
                  <th>Info</th>
                  <th>Fotos</th>
                  <th>Acciones</th>


                </tr>
              </thead>
              <?php
              $server = $_SERVER['SERVER_ADDR'];
              $year = "19";
              $nivel = "1";
              $tipo = "original";


              $sql = mysqli_query($conexion, "select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre, b.direccion_entrega from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=1 order by a.id_orden desc ");
              /* select distinct t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado, t1.vendedor ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra from pop t1 INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 */

              if (mysqli_num_rows($sql) == 0) {
                echo '<tr><td colspan="8">No hay datos.</td></tr>';
              } else {
                $no = 1;
                while ($row = mysqli_fetch_assoc($sql)) {

                  $sql58 = mysqli_query($conexion, "select DISTINCT id_orden, cot from pop_detalle where id_orden='" . $row['id_orden'] . "'");
                  while ($row52 = mysqli_fetch_assoc($sql58)) {
                    $cot = $row52['cot'];
                  }

                  $cadena_de_texto = $cot;
                  $cadena_buscada = '-19';
                  $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                  $cadena_de_texto2 = $cot;
                  $cadena_buscada2 = '-NI';
                  $posicion_coincidencia2 = strpos($cadena_de_texto2, $cadena_buscada2);

                  //se puede hacer la comparacion con 'false' o 'true' y los comparadores '===' o '!=='
                  if ($posicion_coincidencia === false) {

                    $encontrado = 0;

                    $datos = $cot;
                    list($id_c, $anio) = explode("-", $datos);
                  } else {

                    $encontrado = 1;

                    $datos = $cot;
                    list($id_c, $anio) = explode("-", $datos);
                    //echo $id; // foo
                    //echo $anio; // 
              
                  }

                  /*************************************************************/
                  if ($posicion_coincidencia2 === false) {

                    $encontrado2 = 0;

                    $datos2 = $cot;
                    list($id_c2, $anio2) = explode("-", $datos2);
                  } else {

                    $encontrado2 = 1;

                    $dato2s = $cot;
                    list($id_c2, $anio2) = explode("-", $datos2);
                    //echo $id; // foo
                    //echo $anio; // 
              
                  }


                  $query233 = mysqli_query($conexion, "select*from cotizacion where id_cotizacion='" . $cot . "'");

                  $data = '#' . $row['id_orden'];
                  $data2 = $row['id_orden'];
                  $dataa = '#1' . $row['id_orden'];
                  $dataa2 = '1' . $row['id_orden'];
                  $datab = '#2' . $row['id_orden'];
                  $datab2 = '2' . $row['id_orden'];


                  $datalog = '#2i' . $row['id_orden'];
                  $data2log = "2i" . $row['id_orden'];
                  $archive = "http://" . $server . "/browser/elfinder6.php?year=20" . $year . "&empresa=" . $row['empresa'] . "&marca=" . $row['marca'] . "&proyecto=" . $row['nombre'] . "&nivel=" . $nivel . "&tipo=" . $tipo;

                  echo '
            <tr style="font-size:85%;" >
              <td>' . $row['id_orden'] . '</td>';

                  if ($encontrado == 0 && $encontrado2 == 0) {
                    $query233 = mysqli_query($conexion, "select*from cotizacion where id_cotizacion='" . $cot . "'");
                    while ($row9 = mysqli_fetch_assoc($query233)) {
                      $cot_d = $row9['archivo'];
                      echo '<td><div class="col-md-12"><a href="cotizaciones_esa20/' . $cot_d . '" data-fancybox="preview" style="font-size:15px;"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }
                  } elseif ($econtrado == 1 && $encontrado2 == 0) {

                    $con221 = mysqli_connect('localhost', 'root', '', 'esa19');
                    if (!$con221) {
                      die('Could not connect: ' . mysqli_error($con221));
                    }

                    mysqli_select_db($con221, 'esa19');
                    $sql = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $result = mysqli_query($con221, $sql);

                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<td><div class="col-md-12"><b><h5><a href="cotizaciones_esa19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }
                  } elseif ($encontrado == 0 && $encontrado2 == 1) {
                    $con2233 = mysqli_connect('localhost', 'root', '', 'nica20');
                    if (!$con2233) {
                      die('Could not connect: ' . mysqli_error($con2233));
                    }

                    mysqli_select_db($con2233, 'nica20');
                    $sql1 = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $resultww = mysqli_query($con2233, $sql1);

                    $ordenes_activas = mysqli_num_rows($resultww);
                    while ($row92 = mysqli_fetch_assoc($resultww)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<td><div class="col-md-12"><b><h5><a href="cotizaciones_nica20/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }
                  } elseif ($encontrado == 1 && $encontrado2 == 1) {

                    $con225 = mysqli_connect('localhost', 'root', '', 'nica19');
                    if (!$con225) {
                      die('Could not connect: ' . mysqli_error($con225));
                    }

                    mysqli_select_db($con225, 'nica19');
                    $sql25 = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $result2 = mysqli_query($con225, $sql25);

                    $ordenes_activas = mysqli_num_rows($result2);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<td><div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div></td>';
                    }
                  }

                  echo '<td>' . $row['numorden_compra'] . '</td>
                        <td>' . $row['empresa'] . '</td>
                        <td>' . $row['nombre_proyecto'] . '</td> 
                        <td>' . $row['origen'] . '</td>
                        <td>' . $row['destino'] . '</td>
                        <td>' . $row['f_salida'] . '</td>
                        <td>' . $row['f_llegada'] . '</td>  <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target=' . $datalog . ' aria-expanded="false" aria-controls=' . $data2log . '></a> 
                        </td>

              <td> ';
                  if ($row['status'] == 'PROCESO') {
                    echo '<span class="label label-success">Proceso. </span>';
                  } else if ($row['status'] == 'IMPRESION') {
                    echo '<span class="label label-info">Impresion</span>';
                  } else if ($row['status'] == 'CORTE') {
                    echo '<span class="label label-warning">Corte </span>';
                  } else if ($row['status'] == 'ACABADO') {
                    echo '<span class="label label-warning"> Acabado</span>';
                  } else if ($row['status'] == 'DESPACHO') {
                    echo '<span class="label label-warning">Despacho </span>';
                  } else if ($row['status'] == 'TRANSITO') {
                    echo '<span class="label label-warning">Transito </span>';
                  } else if ($row['status'] == 'ADUANA DE SALIDA') {
                    echo '<span class="label label-warning">Aduana de Salida </span>';
                  } else if ($row['status'] == 'TRAMITE') {
                    echo '<span class="label label-warning">Tramite</span>';
                  }

                  //PRIMER DESPLEGABLE 
                  echo '

              </td>
              <td><a class="fa fa-info-circle" data-toggle="collapse" data-target=' . $data . ' aria-expanded="false" aria-controls=' . $data2 . ' ></a></td>'; ?>
                  <td><a data-fancybox
                      data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                      href="logistica/edit_fotos.php?id=<?php echo $row['id_orden']; ?>" class="btn bg-success"><i
                        class="fas fa-camera-retro"></i></a></td>
                  <td>
                    <a data-fancybox
                      data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                      href="logistica/edit.php?id=<?php echo $row['id_orden']; ?>" class="edit"><i
                        class="far fa-edit"></i></a>

                    <?php echo '<a href="logistica/terminar_log.php?id=' . $row['id_orden'] . '" title="FINALIZAR LOGISTICA" onclick="return confirm(\'Terminar Logistica?\')" class="delete"><span class="fas fa-sign-out-alt" aria-hidden="true"></span></a>
              </td>
            </tr>
            <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id=' . $data2 . ' style="width:100%" >
      <div class="card card-body"><br>';

                    include("consulta_item_log.php"); ?>

              </div>
            </div>
          </div>

          </td>
          </tr>
          <!-- SEGUNDO DESPLEGABLE -->

          <script>
            <?php $n_funcion = 's' . $row['id_orden']; ?>

            function <?php echo $n_funcion; ?>(str) {
              if (str == "") {
                document.getElementById("<?php echo $n_funcion; ?>").innerHTML = "";
                return;
              }
              if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
              } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
              }
              xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                  document.getElementById("<?php echo $n_funcion; ?>").innerHTML = this.responseText;
                }
              }
              xmlhttp.open("GET", "getuser.php?q=" + str, true);
              xmlhttp.send();
            }
          </script>
          <tr>
            <td colspan="15" class="zeroPadding">
              <div class="col">
                <div class="collapse multi-collapse" id="<?php echo $dataa2; ?>" style="width:100%">
                  <div class="card card-body">
                    <!--<?php  //include('consulta_mueble.php');
                        ?>-->
                    <div id="<?php echo $n_funcion; ?>"><b>sin registro<?php echo $n_funcion; ?></b></div>
                  </div>
                </div>
            </td>
          </tr>
          <!--TERCER DEPLEGABLE-->
          <tr>
            <td colspan="14" class="zeroPadding">
              <div class="col">
                <div class="collapse multi-collapse" id="<?php echo $data2log; ?>" style="width:100%">
                  <div class="card card-body"><br>
                    <?php $facturac = mysqli_query($conexion, "select * from pop_documentos where orden='" . $row['id_orden'] . "'"); ?>
                    <?php include('logistica/documentos.php'); ?>
                  </div>
                </div>
              </div>
            </td>

          </tr>
          <!--FIN DE DESPLEGABLES-->
          <?php
          $no++;
                }
              }
              ?>
      </table>
    </div>
  </div>
  </div>
  <center>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>



    <script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    </form><br><br>

    <!--fin del div col-md-12  -->
    </div>










    </div>
    </div>

    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong><a href="#">Sistema Produccion</a>.</strong>
      Color Digital 2020
      <div class="float-right d-none d-sm-inline-block">
        <b>Version</b> 2.0.1
      </div>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->

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
    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
    <script src="ajax2/ajax.js" type="text/javascript"></script>

</body>

</html>