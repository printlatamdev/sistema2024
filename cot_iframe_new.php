<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


// Start the session if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Database connection parameters
$host = 'localhost';
$user = 'admin';
$password = 'AG784512';
$base = $_SESSION['base'];
$year = $_SESSION['year'];
$dbName = $base . $year;

// Connect to the database
$con = new mysqli($host, $user, $password, $dbName);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check user role and set company name
$nombre = $_SESSION['vsNombre'];
$id = $_SESSION['vsIdempresa'];

if ($nombre === 'admin') {
    $id = $_SESSION['vsIdtemporal'];
    $query = "SELECT nombre FROM empresa WHERE id_empresa='$id'";
    $result = $con->query($query);

    if ($result) {
        $row = $result->fetch_assoc();
        $nombre = $row['nombre'] === "COLGATE PALMOLIVE CA" ? "COLGATE PALMOLIVE CA INC" : $row['nombre'];
    } else {
        die("Query failed: " . $con->error);
    }
}

// Define query based on search criteria
$search = isset($_GET['buscar']) ? $con->real_escape_string($_GET['buscar']) : '';
$searchCondition = $search ? "AND t4.marca LIKE '%$search%'" : '';

$query = "
    SELECT DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista,
           t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t,
           t1.nota_envio_cd, t1.orden_compra, t1.nota_envio, t1.fo_entrega, t1.estado, t1.descripcion, t2.id_orden, t2.id_empresa,
           t2.empresa, t2.id_contacto, t2.vendedor, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot
    FROM logitica t1
    INNER JOIN pop_detalle t5 ON t1.id_orden = t5.id_orden
    INNER JOIN pop t2 ON t5.id_orden = t2.id_orden
    INNER JOIN contacto t3 ON t2.id_contacto = t3.id_contacto
    INNER JOIN pop_marca t4 ON t1.id_marca = t4.id_marca
    WHERE t1.estado = 1 AND t1.status = 'IMPRESION' AND t2.id_empresa = '$id' $searchCondition
    ORDER BY t5.cot DESC
";

$consulta = $con->query($query);
if (!$consulta) {
    die("Query failed: " . $con->error);
}
$ordenes_entregadas = $consulta->num_rows;

// Additional query setup
include("connect2.php");
$conexion2 = conexion2();
if ($conexion2->connect_error) {
    die("Connection to second database failed: " . $conexion2->connect_error);
}

$query2 = "
    SELECT DISTINCT a1.id_orden, a1.estado, a1.status, a1.marca, a1.origen, a1.destino, a1.f_salida, a1.f_llegada,
           a1.descripcion, a1.m_carga, a1.carta_p, a1.factura, a1.duca_t, a1.duca_f, a1.nota_envio_cd, a1.orden_compra,
           a1.nota_envio, a2.id_orden, a2.id_empresa, a2.empresa, a3.id_orden, a3.cot
    FROM logitica a1
    INNER JOIN pop a2 ON a1.id_orden = a2.id_orden
    INNER JOIN pop_detalle a3 ON a1.id_orden = a3.id_orden
    WHERE a2.empresa = 'PEP PROMOTIONS' AND a1.estado = 0 AND a1.status = 'ENTREGADO'
    ORDER BY a1.f_llegada ASC
";

$consulta2 = $conexion2->query($query2);
if (!$consulta2) {
    die("Query failed: " . $conexion2->error);
}
$ordenes_entregadas2 = $consulta2->num_rows;
$conteo_entregadas = $ordenes_entregadas + $ordenes_entregadas2;

$query1 = "
    SELECT DISTINCT a3.cot
    FROM logitica a1
    INNER JOIN pop a2 ON a1.id_orden = a2.id_orden
    INNER JOIN pop_detalle a3 ON a1.id_orden = a3.id_orden
    WHERE a2.empresa = '$nombre' AND a1.estado = 0 AND a1.status = 'ENTREGADO'
    ORDER BY a3.cot ASC
";

$consulta1 = $conexion2->query($query1);
if (!$consulta1) {
    die("Query failed: " . $conexion2->error);
}

// Pagination setup
include 'pagination.php';
$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
$per_page = isset($_REQUEST['per_page']) ? intval($_REQUEST['per_page']) : 10;
$adjacents = 4;
$offset = ($page - 1) * $per_page;

$tables = "logitica t1
           INNER JOIN pop_detalle t5 ON t1.id_orden = t5.id_orden
           INNER JOIN pop t2 ON t5.id_orden = t2.id_orden
           INNER JOIN contacto t3 ON t2.id_contacto = t3.id_contacto
           INNER JOIN pop_marca t4 ON t1.id_marca = t4.id_marca";
$sWhere = "t1.estado = 1 AND t1.status = 'IMPRESION' AND t2.id_empresa = '$id' $searchCondition";

$count_query = "SELECT count(*) AS numrows FROM $tables WHERE $sWhere";
$count_query_result = $con->query($count_query);
if ($count_query_result) {
    $row = $count_query_result->fetch_assoc();
    $numrows = $row['numrows'];
} else {
    die("Count query failed: " . $con->error);
}
$total_pages = ceil($numrows / $per_page);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mi envio | Color Digital</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/css/components.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css" />
    <link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css" />
</head>

<body>
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
            <form name="crea" id="crea" action="./archivos_cot/cot.sql_new.php" class="horizontal-form" method="post">
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
                      <label class="control-label "><strong>Observaciones:</strong></label>
                      <textarea name="nota" id="nota" rows="3"  data-width="1000" class="form-control" maxlength='455'>Los Impuestos, seguros y operaciones están sujetos a cambios | Precio no incluye: custodio, cuadrilla de descarga, revisiones en frontera, almacenajes. | Estadías por retraso, error en dirección de entrega, y/o entregas adicionales serán facturadas al finalizar el servicio | Recargos por demoras del tramitador del cliente serán facturados al cliente.</textarea>
                      <div id='counter'></div>
                    </div>
                  </div>
                  <!--/span-->
                </div>
                <div class="row" style="display:none">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type='text' id='usuario' value='<?= $nombre?>'>
                    </div>
                  </div>
                  <!--/span-->
                </div>



                <label class="control-label"><strong>Término de comercio</strong></label>
                <br>
                <div class="btn-group" data-toggle="buttons" style="text-align:center;margin:25px;">
                    <label class="btn btn-primary"  data-toggle="tooltip" data-placement="bottom" title="Se limita a poner la mercancía a disposición del comprador en la puerta de su almacén o de la fábrica">
                      <input type="radio" name='incoterm' id='incoterm1' value="EXW" >
                      EXW
                    </label>
                    <label class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Debe cargar las mercancías en el barco escogido por el comprador">
                      <input type="radio"  name='incoterm' id='incoterm2' value="FOB" >
                      FOB
                    </label>
                    <label class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Debe despachar la mercancía en aduana para la exportación  (Coste, seguro y flete; puerto de destino convenido)">
                      <input type="radio" name='incoterm' id='incoterm3' value="CIF">
                      CIF
                    </label>
                    <label class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Debe cargar las mercancías en el barco escogido por el comprador">
                      <input type="radio" name='incoterm' id='incoterm4' value="DAP">
                      DAP
                    </label>
                    <label class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Asume la responsabilidad (gastos y riesgos) del transporte hasta que las mercancías son descargadas en el punto designado">
                      <input type="radio" name='incoterm' id='incoterm5' value="DDP">
                      DDP
                    </label>
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
  </div>

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
    <!-- Your HTML content goes here -->
    <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
    <script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
    <script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
    <script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
    <script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
    <script>
    jQuery(document).ready(function() {
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

        jQuery("#nueva_coti").click(function() {
            jQuery("#nueva_coti").prop("disabled", true);

            var empresa = jQuery("#empresa").val();
            var nom_empresa = jQuery("#empresa option:selected").text();
            var contacto = jQuery("#contacto").val();
            var nom_contacto = jQuery("#contacto option:selected").text();

            if (empresa == "" || contacto == "") {
                alert("Por favor, seleccione una empresa y un contacto.");
                jQuery("#nueva_coti").prop("disabled", false);
            } else {
                jQuery('#crea').append('<input type="hidden" name="nom_empresa" value="' + nom_empresa + '" /> ');
                jQuery('#crea').append('<input type="hidden" name="nom_contacto" value="' + nom_contacto + '" /> ');
                jQuery("#crea").submit();
            }
            return false;
        });
    });
    </script>
</body>

</html>
