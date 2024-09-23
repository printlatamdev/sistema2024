<?php
// Start session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

// Obtain session variables
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$id = $_SESSION['vsIdempresa'];
$nombre = $_SESSION['vsNombre'];

$orden = $_REQUEST['orden'];
$bd = $base . $anio;
$con = new mysqli('localhost', 'root', '', $bd);

// Check connection
if ($con->connect_error) {
  die('Connection failed: ' . $con->connect_error);
}

// Sanitize and obtain the variable id_orden
$id_orden = isset($_REQUEST['id_orden']) ? $con->real_escape_string($_REQUEST['id_orden']) : '';

// Determine if user is admin and adjust data if necessary
if ($nombre == 'root') {
  $id_temporal = $_SESSION['vsIdtemporal'];
  $query = "SELECT nombre FROM empresa WHERE id_empresa = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param('s', $id_temporal);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($row = $result->fetch_assoc()) {
    $nombre = $row['nombre'];
  }

  // Adjust the company name if needed
  if ($nombre == "COLGATE PALMOLIVE CA") {
    $nombre = "COLGATE PALMOLIVE CA INC";
  }
}

// Query for orders if no search term is provided
if (!isset($_GET['buscar']) || empty($_GET['buscar'])) {
  $query = "SELECT DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, 
              t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, 
              t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, 
              t1.orden_compra, t1.nota_envio, t1.fo_entrega, t1.estado, t1.descripcion, t2.id_orden, 
              t2.id_empresa, t2.empresa, t2.id_contacto, t2.vendedor, t2.contacto, t3.nombre, 
              t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot 
              FROM logitica t1 
              INNER JOIN pop_detalle t5 ON t1.id_orden = t5.id_orden 
              INNER JOIN pop t2 ON t5.id_orden = t2.id_orden 
              INNER JOIN contacto t3 ON t2.id_contacto = t3.id_contacto 
              INNER JOIN pop_marca t4 ON t1.id_marca = t4.id_marca 
              WHERE t1.estado = 1 AND t1.status = 'IMPRESION' AND t2.id_empresa = ? 
              ORDER BY t5.cot DESC";
  $stmt = $con->prepare($query);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result) {
    $ordenes_entregadas = $result->num_rows;
  } else {
    echo "Error fetching orders: " . $con->error;
  }

  // Connect to second database
  // $conexion2 = conexion2(); // Assuming this uses mysqli as well

  $query2 = "SELECT DISTINCT a3.cot 
               FROM logitica a1 
               INNER JOIN pop a2 ON a1.id_orden = a2.id_orden 
               INNER JOIN pop_detalle a3 ON a1.id_orden = a3.id_orden 
               WHERE a2.empresa = ? AND a1.estado = 0 AND a1.status = 'ENTREGADO' 
               ORDER BY a3.cot ASC";
  $stmt2 = $con->prepare($query2);
  $stmt2->bind_param('s', $nombre);
  $stmt2->execute();
  $result2 = $stmt2->get_result();

  if ($result2) {
    $ordenes_entregadas2 = $result2->num_rows;
  } else {
    echo "Error fetching delivered orders: " . $conexion2->error;
  }

  $conteo_entregadas = $ordenes_entregadas + $ordenes_entregadas2;
}
?>




<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi Envio | Color Digital</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

  <!-- Google Fonts -->
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>

  <!-- AdminLTE -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- Fancybox -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css">
  <script src="https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js"></script>
  <!---Select 2---->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />


  <!-- Normalize.css -->
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">

  <!-- Custom Styles -->
  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="css/custom.css">

  <!-- HTML5 Shim and Respond.js for IE8 support -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <style>
    .button-container {
      display: flex;
      flex-wrap: wrap;
      /* Allows wrapping if necessary */
      gap: 10px;
      /* Adjust the spacing between buttons */
      justify-content: flex-end;
    }


    .tools form {
      margin: 0;
      /* Remove any default margin from forms */
    }

    #s2id_product {
      display: none;
    }

    #contenedor3 {
      margin: 10px;
      padding: 15px;
    }
  </style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper" style="padding-left: 5%;margin: 0;">


    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
      <div class="page-content">
        <div id="page-content">
          <!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->
          <div class="row">
            <div class="col-md-8">
            </div>
          </div>
          <!-- *************************************************************************************************************************************** -->

          <?php
          // *********************************************************************************************************************************** //
          
          if (isset($orden)) {

            include($base . "_db.php");

            $stmt = $mysqli->prepare("SELECT * FROM cotizacion WHERE id_cotizacion=?");
            if ($stmt) {
              $stmt->bind_param("s", $orden);
              $stmt->execute();
              $result = $stmt->get_result();

              if ($result->num_rows > 0) {
                while ($fila_en = $result->fetch_assoc()) {
                  $empresa = $fila_en["empresa"];
                  $contacto = $fila_en["contacto"];
                  $vendedor = $fila_en["vendedor"];
                  $fecha = $fila_en["fecha"];
                  $id_vendedor = $fila_en["id_vendedor"];
                  $id_contacto = $fila_en["id_contacto"];
                  $id_empresa = $fila_en["id_empresa"];
                  $observaciones = $fila_en["nota"];
                  $validez = $fila_en["validez_oferta"];
                  $condicion = $fila_en["condicion_de_pago"];
                  $moneda = $fila_en["moneda"];
                }
              } else {
                // Handle case where no results are found
                echo "No results found.";
              }

              $stmt->close();
            } else {
              // Handle error in preparing the statement
              echo "Error preparing statement: " . $mysqli->error;
            }

            $mysqli->close();
          }

          // *********************************************************************************************************************************** //
          ?>



          <div class="col-md-12" style="margin-left: -50px;">
            <div id="contenedor3" class="portlet box blue">
              <div class="portlet-title">
                <div class="caption">
                  <br>
                  <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalSubir">
                    Editar Cabecera
                  </a>
                  <a class="btn btn-primary btn-sm ml-2" data-toggle="modal" data-target="#datos_de_oferta">
                    Condiciones | Validez | Moneda
                  </a>
                  <br>
                  <br>
                  <i class=" icon-book-open font-green-sunglo"></i> Cotizacion # <label id="orden_color"
                    class="text-primary">
                    <?= $orden ?>
                  </label>
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
                            <label class="control-label"><strong>Cliente:</strong></label>&nbsp;&nbsp;
                            <label class="label1 text-info" id="cliente_color">
                              <?= $empresa ?>
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label class="control-label"><strong>Vendedor:</strong></label>&nbsp;&nbsp;
                            <label class="label1 text-success" id="vendedor_color">
                              <?= $vendedor ?>
                            </label>
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
                            <label class="control-label"><strong>Contacto:</strong></label>&nbsp;&nbsp;
                            <label class="label1 text-warning" id="contacto_color">
                              <?= $contacto ?>
                            </label>
                          </div>
                          <div class="col-md-5">
                            <label class="control-label "><strong>Fecha:</strong></label>&nbsp;&nbsp;
                            <label class="label1 text-muted" id="fecha_color">
                              <?= $fecha ?>
                            </label>
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
          <?php
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
              $producto = $fila_m["producto"];
              $imagen = $fila_m["image"];
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
                  <i class="icon-note font-green-sunglo"></i>
                </div>
                <div class="actions">
                  <form id="form1" action="" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="bandera" value="4">
                    <input type="hidden" name="costo_total" id="costo_total" value="<?= $costo_total ?>" />
                    <input type="hidden" name="iva" id="iva" value="<?= $iva ?>" />
                    <input type="hidden" name="orden" id="orden" value="<?= $orden ?>" />
                    <input type="hidden" name="id_detalle" id="id_detalle" value="<?= $id_detalle ?>" />
                    <input type="hidden" name="base" value="<?= $base ?>">
                    <!-- Calcular Incoterm-->
                    <? if ($nombre == 'Color Digital IT') { ?>
                      <a class="btn btn-success" style="margin:10px;border-radius:25px !important;" data-fancybox
                        data-options='{"type" : "iframe", "iframe" : {"preload" : false }}'
                        href="./modals/calc_flete.php">Calcular Flete</a>
                    <? } ?>

                    <!-- Selector de productos -->
                    <!-- Selector de productos -->
                    <select id="product" name="product"
                      style="margin-right:15px !important;width: 250px;border: 1px solid #000;">
                      <option value=' '>Seleccione un Producto</option>

                      <?php
                      // Include the database connection
                      include($base . "_db.php");

                      // Execute query to fetch products
                      $productos_result = $mysqli->query("SELECT nombre_producto FROM productos");

                      // Loop through the fetched products and populate the select options
                      while ($item = $productos_result->fetch_assoc()) {
                        $nombre_producto = htmlspecialchars($item['nombre_producto'], ENT_QUOTES, 'UTF-8');
                        echo "<option value='$nombre_producto'>$nombre_producto</option>";
                      }

                      // Close the database connection
                      $mysqli->close();
                      ?>
                    </select>


                    <input value="<?= $cantidad ?>" required size="2" type="text" name="cantidad" id="cantidad"
                      step="any" min="0" placeholder="Cantidad" style="width: 7%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <input value="<?= $precio_unitario ?>" required size="2" type="text" name="precio_unitario"
                      id="precio_unitario" step="any" min="0" placeholder="Precio" style="width: 7%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    if (isset($_REQUEST["det"])) {
                      echo '<button id="actualizar_detalle" type="button" class="btn btn-primary">Actualizar</button>';
                    } else {
                      echo '<button id="agregar_detalle" type="button" class="btn btn-primary">Agregar</button>';
                    }
                    ?>
                </div>
              </div>
              <div class="portlet-body">
                <!-- Card for Descripción -->
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="detalle">Descripción</label>
                      <textarea name="detalle" id="detalle" class="form-control" rows="3"
                        placeholder="Ingrese el detalle"><?= $textarea ?></textarea>
                    </div>
                  </div>
                </div>

                <!-- Card for TOTAL OFERTA -->
                <div class="card mb-3">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="total_oferta" class="font-weight-bold">TOTAL OFERTA:</label>
                      <input type="number" name="total_oferta" id="total_oferta" class="form-control d-inline-block"
                        style="width: auto;" readonly value="<?= $total_oferta ?>" />
                    </div>
                  </div>
                </div>

                <!-- Card for Upload Image -->
                <div class="card mb-3">
                  <div class="card-body text-center">
                    <h4><strong>Cargar imagen de producto</strong></h4>
                    <div class="container-element">
                      <div class="element1 mb-2">
                        <label for="image">
                          <img width='75px' src="./imgs/photo.png" />
                        </label>
                        <input type="file" name="image" id="image" style="display:none">
                      </div>
                      <div class="element2 mb-2">
                        <?php
                        if (isset($_REQUEST['det'])) {
                          echo '<img src="./item_cot_images/item_' . $orden . '_cot/' . $imagen . '" id="load_det_img" width="63" height="63"/>';
                        }
                        ?>
                        <div id="preview"></div>
                      </div>
                      <div class="element2">
                        <button type="button" class="btn btn-danger" id="clear">Borrar Imagen</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="actions">
                <!--    <form class="form-inline" style="text-align:center;margin:25px;">
              <style>
                .inpt{
                  border: 1px solid #000000;
                }
              </style>
                <div class="form-group">
                  <label class="sr-only" for="volumen">Volumen:</label>
                  <input type="number" class="form-control inpt" id="volumen" placeholder="Metros Cubicos">
                </div>
                <div class="form-group">
                  <label class="sr-only" for="peso">Peso:</label>
                  <input type="number" class="form-control inpt" id="peso" placeholder="Tonelada Metrica">
                </div>
                <button type="submit" class="btn blue">Calcular Flete</button>
              </form> -->
                <hr>
              </div>
            </div>
            <a href="javascript: void(0);" onclick="parent.window.location='cotizaciones2_new.php?exito=1'">
              <input type="submit" name="next" class="btn btn-danger" value="FINALIZAR COTIZACION"
                style="width: 200px;border-radius: 15px !important;margin:-19px 8px 2px 15px;" />
            </a>

            <div class="col-md-12">
              <!-- BEGIN ACCORDION PORTLET-->
              <div id="details" class="portlet box blue">
                <div class="portlet-title">
                  <div class="caption">
                    <i class="fa fa-list-ul"></i>Detalles
                  </div>
                  <div class="button-container">
                    <div class="tools" style="display: none;">
                      <form class="generar" id="form15" action="pdf2_new.php" target="_blank" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                        <input type="hidden" name="tipo" value="c15" />
                        <input type="hidden" name="currency" value="$" />
                        <button type="submit" class="btn btn-info btn-sm"> JUST PATCHING !</button>
                      </form>
                    </div>

                    <script>
                      document.addEventListener('DOMContentLoaded', function () {
                        // Seleccionar todos los formularios con la clase 'generar'
                        var forms = document.querySelectorAll('.generar');

                        // Agregar un evento 'submit' a cada formulario
                        forms.forEach(function (form) {
                          form.addEventListener('submit', function (event) {
                            // Verificar si hay detalles en la tabla
                            var detalles = document.querySelectorAll('#accordion1 .panel');
                            if (detalles.length === 0) {
                              // Si no hay detalles, mostrar la alerta y prevenir el envío del formulario
                              alert('Por favor, Presiona agregar para guardar los detalles de la fila. Vamos, no lo hagas más difícil de lo que es.');
                              event.preventDefault();
                            }
                          });
                        });
                      });
                    </script>

                    <div class="tools">
                      <form class="generar" id="form13" action="pdf2_new.php" target="_blank" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                        <input type="hidden" name="tipo" value="c13" />
                        <input type="hidden" name="currency" value="$" />
                        <button type="submit" class="btn btn-success btn-sm"> 13% IVA</button>
                      </form>
                    </div>
                    <div class="tools">
                      <form class="generar" id="form15" action="pdf2_new.php" target="_blank" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                        <input type="hidden" name="tipo" value="c15" />
                        <input type="hidden" name="currency" value="$" />
                        <button type="submit" class="btn btn-info btn-sm"> 15% IVA V2</button>
                      </form>
                    </div>

                    <?php if ($_SESSION['base'] == 'esa') { ?>
                      <div class="tools">
                        <form class="generar" id="form12" target="_blank" action="pdf2_new.php" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                          <input type="hidden" name="tipo" value="c12" />
                          <input type="hidden" name="currency" value="$" />
                          <button type="submit" class="btn btn-success btn-sm"> 12% IVA V2</button>
                        </form>
                      </div>
                      <div class="tools">
                        <form class="generar" id="form12q" target="_blank" action="pdf2_new.php" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                          <input type="hidden" name="tipo" value="c12q" />
                          <input type="hidden" name="currency" value="Q$" />
                          <button type="submit" class="btn btn-info btn-sm"> 12% IVA V2 Q$</button>
                        </form>
                      </div>
                    <?php } ?>

                    <div class="tools">
                      <form class="generar" id="form0" action="pdf2_new.php" target="_blank" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                        <input type="hidden" name="tipo" value="c0" />
                        <input type="hidden" name="currency" value="$" />
                        <button type="submit" class="btn btn-warning btn-sm"> 0% IVA V2</button>
                      </form>
                    </div>

                    <?php if ($_SESSION['base'] == 'nica') { ?>
                      <div class="tools">
                        <form class="generar" id="form15nica" action="pdf2_new.php" target="_blank" method="post">
                          <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                          <input type="hidden" name="tipo" value="c15" />
                          <input type="hidden" name="currency" value="C$" />
                          <button type="submit" class="btn btn-danger btn-sm"> 15% IVA V2 C$ L</button>
                        </form>
                      </div>
                    <?php } ?>

                    <div class="tools">
                      <form class="generar" id="form7" action="pdf2_new.php" target="_blank" method="post">
                        <input type="hidden" id="id" name="id" value="<?= $orden ?>" />
                        <input type="hidden" name="tipo" value="c7" />
                        <input type="hidden" name="currency" value="$" />
                        <button type="submit" class="btn btn-warning btn-sm"> 7% IVA V2 $</button>
                      </form>
                    </div>
                  </div>

                </div>



              </div>


              <div class="portlet-body">
                <div class="panel-group accordion" id="accordion1">

                  <?php
                  if (isset($_REQUEST["orden"])) {
                    include($base . "_db.php");

                    $orden = $_REQUEST["orden"];

                    // Query to get the details of the quotation
                    $query = "SELECT * FROM cotizacion_detalle WHERE id_cotizacion = ? ORDER BY id_detalle_cotizacion ASC";
                    $stmt = $mysqli->prepare($query);
                    $stmt->bind_param("s", $orden);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    $pi = 0;

                    while ($fila_as = $result->fetch_assoc()) {
                      $pi++;
                      $id_detalle = $fila_as["id_detalle_cotizacion"];
                      $detalle = $fila_as["detalle"];
                      $textarea = str_replace("\n", "<br>", $detalle);
                      $precio_unitario = $fila_as["precio"];
                      $cantidad = $fila_as["cantidad"];
                      $costo_total = $fila_as["costo_total"];
                      $iva = $fila_as["iva"];
                      $total_oferta = $fila_as["total_oferta"];
                      $producto = $fila_as["producto"];
                      $imagen = $fila_as["image"];
                      // $path_image = $image_route; 
                      // This seems to be unused
                  
                      // Render the HTML for each detail
                      echo '
        <div id="aq_' . htmlspecialchars($id_detalle) . '" class="panel panel-default">
            <div id="pnn_' . htmlspecialchars($id_detalle) . '" class="panel-heading">
                <h4 class="panel-title">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_' . htmlspecialchars($id_detalle) . '">
                        <b>Detalle ' . htmlspecialchars($pi) . '</b>
                    </a>
                </h4>
            </div>
            <div id="collapse_' . htmlspecialchars($id_detalle) . '" class="panel-collapse collapse">
                <div class="panel-body" style="overflow-y:auto;">
                    <div class="row">
                        <div id="cnt2" class="col-xs-12 col-sm-12 col-md-12">
                            <div class="row">
                                <div id="sep" class="col-md-12"></div>
                            </div>
                            <div class="row">
                                <div id="sep" class="col-md-12"></div>
                            </div>
                            <div class="row">
                                <div id="tab-container" class="table-responsive">
                                    <table id="tab" class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <td></td>
                                                <td><strong>Producto</strong></td>
                                                <td><strong>Detalle</strong></td>
                                                <td align="center"><strong>Cantidad</strong></td>
                                                <td align="center"><strong>Precio</strong></td>
                                                <td align="center"><strong>Costo Total</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a class="delete" href="#" page="' . htmlspecialchars($id_detalle) . '">
                                                        <img id="ex2" src="images/eli.png" alt="Eliminar Registro" />
                                                    </a>
                                                    <br><br><br>
                                                    <a href="cot_detalle_new.php?det=' . htmlspecialchars($id_detalle) . '&orden=' . htmlspecialchars($orden) . '">
                                                        <img id="ex2" src="images/edit.png" alt="Editar Registro" />
                                                    </a>
                                                </td>
                                                <td><span>' . htmlspecialchars($producto) . '</span></td>
                                                <td><span>' . htmlspecialchars($textarea) . '</span></td>
                                                <td align="center">' . htmlspecialchars($cantidad) . '</td>
                                                <td align="center">$' . htmlspecialchars($precio_unitario) . '</td>
                                                <td align="center">$' . htmlspecialchars($costo_total) . '</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
                    }

                    $stmt->close();
                    $mysqli->close();
                  }
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
        <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
          aria-hidden="true">
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
        <a id="exito" href="#modal2" role="button" data-toggle="modal"></a>
        <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
          aria-hidden="true">
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
        <a id="exito_detalle" href="#modal3" role="button" data-toggle="modal"></a>
        <div id="modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
          aria-hidden="true">
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
        <div id="modal4" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
          aria-hidden="true">
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
        <div id="modal5" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2"
          aria-hidden="true">
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
                <button data-dismiss="modal" class="btn green" id="addedOk">OK</button>
              </div>
            </div>
          </div>
        </div>

        <!-- ******************************************************************************************************************* -->

        <style>
          /* input[type="file"] {
              display: none;
            } */
          .btn-sm {
            padding: 4px 10px 5px 10px;
            font-size: 9pt;
            line-height: 1.5;
            margin-bottom: 5px;
            font-weight: bold;
            border-radius: 10px !important;
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
            border-bottom: thin solid #000000;
          }

          #qwd2 {
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

          .select2-dropdown {
            top: 22px !important;
            left: 8px !important;
          }

          .container-element {
            /* border: 2px solid #555; */
            display: flex;
            align-items: flex-end;
            text-align: center;
          }

          .element1 {
            width: 50%;
            height: auto;
          }

          .element2 {
            width: 50%;
            height: auto;
          }
        </style>
        <!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->
      </div>
    </div>
    <!-- END CONTENT -->
  </div>
  <!-- END CONTAINER -->

  <div class="modal fade" id="ModalSubir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <form method="post" action="archivos_cot/update.cot_new.php" enctype="multipart/form-data">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modificar Datos de Cotización</h4>
          </div>
          <div class="modal-body">

            <!-- Hidden Field -->
            <input id="id_orden3" type="hidden" class="form-control" name="id"
              value="<?php echo htmlspecialchars($orden); ?>" required>

            <!-- Cliente -->
            <div class="form-group">
              <label class="control-label"><strong>Cliente:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa fa-briefcase"></i>
                </span>
                <select id="empresa" name="empresa" class="select2_category form-control" required>
                  <option value="<?php echo htmlspecialchars($id_empresa); ?>"><?php echo htmlspecialchars($empresa); ?>
                  </option>
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM empresa");
                  while ($fila = $rs->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['id']) . '">' . htmlspecialchars($fila['nombre']) . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>

            <!-- Contacto -->
            <div class="form-group">
              <label class="control-label"><strong>Contacto:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa fa-users"></i>
                </span>
                <select id="contacto" name="contacto" class="select2_category form-control" required>
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM contacto WHERE id_empresa='" . htmlspecialchars($id_empresa) . "'");
                  while ($fila = $rs->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['id']) . '">' . htmlspecialchars($fila['nombre']) . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>

            <!-- Vendedor -->
            <div class="form-group">
              <label class="control-label"><strong>Vendedor:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa fa-user-md"></i>
                </span>
                <?php
                include($base . "_db.php");

                // Ejecutar la consulta
                $vendedor_escapado = $mysqli->real_escape_string($vendedor);
                $query = "SELECT * FROM vendedores WHERE estado='1' AND nombre != '$vendedor_escapado'";
                $rs = $mysqli->query($query);

                if ($rs === false) {
                  die("Error en la consulta: " . $mysqli->error);
                }

                $mysqli->close();
                ?>

                <select id="vendedor" name="vendedor" class="select2_category form-control">
                  <option value="<?php echo htmlspecialchars($id_vendedor); ?>">
                    <?php echo htmlspecialchars($vendedor); ?></option>
                  <?php
                  while ($fila = $rs->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['id']) . '">' . htmlspecialchars($fila['nombre']) . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

            <!-- Observaciones -->
            <div class="form-group">
              <label class="control-label"><strong>Observaciones:</strong></label>
              <textarea name="observaciones"
                style="width:100%;height:125px"><?php echo htmlspecialchars($observaciones); ?></textarea>
            </div>
          </div>

          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Modificar</button>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!--Oher terms Modal--->
  <div class="modal fade" id="datos_de_oferta" tabindex="-1" role="dialog" aria-labelledby="myModalCdvm">
    <form method="post" action="archivos_cot/term_condiciones.php" enctype="multipart/form-data">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalCdvm">Condiciones | Validez | Moneda</h4>
          </div>
          <div class="modal-body">

            <!-- Hidden Field -->
            <input id="id_orden3" type="hidden" class="form-control" name="id"
              value="<?php echo htmlspecialchars($orden); ?>" required>

            <!-- Condiciones de Pago -->
            <div class="form-group">
              <label class="control-label"><strong>Condiciones de Pago:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa fa-money"></i>
                </span>
                <select id="condiciones" name="condiciones" class="select2_category form-control" required>
                  <option value="<?php echo htmlspecialchars($condicion ?? ''); ?>">
                    <?php echo htmlspecialchars($condicion ?? 'Seleccione Condición'); ?></option>
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM condiciones_de_pago");
                  while ($fila = $rs->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['condicion']) . '">' . htmlspecialchars($fila['condicion']) . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>

            <!-- Validez de la Oferta -->
            <div class="form-group">
              <label class="control-label"><strong>Validez de la Oferta:</strong></label>
              <div class="input-group">
                <span class="input-group-addon input-circle-left">
                  <i class="fa fa-gift"></i>
                </span>
                <select id="validez" name="validez" class="select2_category form-control" required>
                  <option value="<?php echo htmlspecialchars($validez ?? ''); ?>">
                    <?php echo htmlspecialchars($validez ?? 'Seleccione Validez'); ?></option>
                  <?php
                  include($base . "_db.php");
                  $rs = $mysqli->query("SELECT * FROM validez_oferta");
                  while ($fila = $rs->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['validez']) . '">' . htmlspecialchars($fila['validez']) . '</option>';
                  }
                  $mysqli->close();
                  ?>
                </select>
              </div>
            </div>

            <!-- Moneda -->
            <div class="form-group">
              <label class="control-label"><strong>Precio en:</strong></label>
              <input type="text" name="moneda_tipo" class="form-control" placeholder="Moneda"
                value="<?php echo htmlspecialchars($moneda ?? 'dolares(USD)'); ?>">
            </div>

          </div>

          <!-- Modal Footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Agregar</button>
          </div>
        </div>
      </div>
    </form>
  </div>


  <script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
  <!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
  <script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js"
    type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
  <script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js"
    type="text/javascript"></script>





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





  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script type="text/javascript" src="suministros/assets/global/plugins/clockface/js/clockface.js"></script>
  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js"></script>
  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
  <script type="text/javascript"
    src="suministros/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js"></script>

  <script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>


  <link rel="stylesheet" type="text/css"
    href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css" />
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
  <script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>



  <script type="text/javascript">
    jQuery(document).ready(function () {
      //*****************************************************
      // AQUI SE REALIZA EL CHAGEN PARA EL CAMBIO DE CONTACTO AL SELECCIONAR OTRA EMPRESA
      jQuery('#empresa').change(function () {

        jQuery('#contacto').fadeOut();
        jQuery.post("archivos_cot/produccion.contactos.php", {
          base: "<?php echo $base ?>",
          emp: jQuery('#empresa').val(),
        },

          function (response) {
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
  <script src="cot_new.js"></script>

  <!-- END PAGE LEVEL SCRIPTS -->
  <script>
    $('#cantidad,#precio_unitario').keyup(function () {
      var c = $('#cantidad').val();
      var pu = $('#precio_unitario').val();
      // var porcentaje= $( "#porcentaje option:selected").val();
      var porcentaje = 0;
      var cp;
      var tf;

      if (c == "") {
        c = 0;
      }
      if (pu == "") {
        pu = 0;
      }

      if (porcentaje == 0.13) {
        cp = parseFloat(c) * parseFloat(pu);
        $('#costo_total').val(cp.toFixed(2));
        civa = parseFloat(cp) * 0.13
        $('#iva').val(civa.toFixed(2));
        tf = parseFloat(cp) + parseFloat(civa)
        $('#total_oferta').val(tf.toFixed(2));

      } else if (porcentaje == 0.15) {
        cp = parseFloat(c) * parseFloat(pu);
        $('#costo_total').val(cp.toFixed(2));
        civa = parseFloat(cp) * 0.15
        $('#iva').val(civa.toFixed(2));
        tf = parseFloat(cp) + parseFloat(civa)
        $('#total_oferta').val(tf.toFixed(2));

      } else if (porcentaje == 0) {
        tf = parseFloat(c) * parseFloat(pu);
        $('#costo_total').val(tf.toFixed(2));
        //$( '#iva' ).val( 0.00 );
        $('#total_oferta').val(tf.toFixed(2));
      }

    });
  </script>
  <!-- <script src="./comprimir_img/comprimir.js"></script> -->

  <script>
    $(document).ready(function () {
      Metronic.init(); // init metronic core componets
      Layout.init(); // init layout
      QuickSidebar.init(); // init quick sidebar
      FormSamples.init();
      ComponentsPickers.init();
      //-----------------------------------------------------------------
      $("#contenedor1").hide();
      //-----------------------------------------------------------------
      //-----------------------------------------------------------------

      $("#porcentaje").change(function () {
        var c = $('#cantidad').val();
        var pu = $('#precio_unitario').val();
        var porcentaje = $("#porcentaje option:selected").val();
        var cp;

        if (c == "") {
          c = 0;
        }
        if (pu == "") {
          pu = 0;
        }
        if (porcentaje == 0.13) {
          cp = parseFloat(c) * parseFloat(pu);
          $('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.13
          $('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          $('#total_oferta').val(tf.toFixed(2));

        } else if (porcentaje == 0.15) {

          cp = parseFloat(c) * parseFloat(pu);
          $('#costo_total').val(cp.toFixed(2));
          civa = parseFloat(cp) * 0.15
          $('#iva').val(civa.toFixed(2));
          tf = parseFloat(cp) + parseFloat(civa)
          $('#total_oferta').val(tf.toFixed(2));
        } else if (porcentaje == 0) {

          tf = parseFloat(c) * parseFloat(pu);
          $('#costo_total').val(tf.toFixed(2));
          $('#iva').val(0.00);
          $('#total_oferta').val(tf.toFixed(2));

        }
      });
    });
    //*************************************************************************************************
    $("#actualizar_detalle").click(function () {
      $("#actualizar_detalle").prop("disabled", true);

      var orden = $("#orden").val();
      var id_detalle = $("#id_detalle").val();
      var costo_total = $("#costo_total").val();
      var cantidad = $("#cantidad").val();
      var precio_unitario = $("#precio_unitario").val();
      var iva = $("#iva").val();
      var total_oferta = $("#total_oferta").val();
      var detalle = $("#detalle").val();
      var producto = $("#product").val();
      var image = $('#image')[0].files[0];

      var bandera = 4;
      textarea_line = detalle.replace(new RegExp("\n", "g"), "<br>");

      if (cantidad === '' || precio_unitario === '' || detalle === '') {
        $('#vacio').click();
        $("#actualizar_detalle").prop("disabled", false);
      } else {
        var formData = new FormData($("#form1")[0]);
        formData.append('bandera', bandera);
        formData.append('det', id_detalle);

        $.ajax({
          type: "POST",
          url: "cot.sql_new2.php",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            $("#actualizar_detalle").prop("disabled", false);
            if (response == 1) {
              // Refresh the iframe or parent page
              if (window.parent) {
                window.location.href = 'cot_detalle_new.php?orden=' + encodeURIComponent(orden);
              }

              // Clear the form fields except 'orden'
              $("#cantidad").val('');
              $("#precio_unitario").val('');
              $("#iva").val('');
              $("#total_oferta").val('');
              $("#detalle").val('');
              $("#product").val('');
              $('#image').val(''); // Clear the file input
            } else {
              // Handle the error
              alert("Error al actualizar el detalle.");
            }
          },
          error: function () {
            $("#actualizar_detalle").prop("disabled", false);
            alert("Error en la solicitud.");
          }
        });
      }

      return false;
    });

    // function refreshIframe() {
    //     var iframe = document.getElementById('myIframe');
    //     iframe.src = iframe.src; // Esta línea recarga el iframe
    // }     
    //**************************************************************************************************
    $(document).on('click', '.delete', function () {
      //$("#page-content").hide();
      var ff = $(this).attr("page");
      var bandera = 3;


      // AJAX Code To Submit Form.
      var dataString = 'det=' + ff + '&bandera=' + bandera;

      $.ajax({
        type: "POST",
        url: "cot.sql_new2.php",
        data: dataString,
        cache: false,
        //contentType: false,
        //processData: false,
        success: function (result) {
          if (result != '') {
            $("#collapse_" + ff).hide();
            $("#pnn_" + ff).hide();
            $("#aq_" + ff).hide();
            $('#exito_detalle').click();
          }
        }

      });

      //$('#page-content').fadeIn(1000);
      // return false;

    });
  </script>
  <script>
    $(document).ready(function () {
      $('#product').select2({
        allowClear: true,
        placeholder: 'Select a product', // Opcional: añade un placeholder
        width: '100%' // Opcional: ajusta el ancho del select
      });
    });
  </script>

  <!--IMAGE COMPRESS-->
  <script>
    const compressImage = async (file, { quality = 1, type = file.type }) => {
      const imageBitmap = await createImageBitmap(file);

      const canvas = document.createElement('canvas');
      canvas.width = imageBitmap.width;
      canvas.height = imageBitmap.height;
      const ctx = canvas.getContext('2d');
      ctx.fillStyle = '#ffff';
      ctx.fillRect(0, 0, canvas.width, canvas.height);
      ctx.drawImage(imageBitmap, 0, 0);

      const blob = await new Promise((resolve) =>
        canvas.toBlob(resolve, type, quality)
      );

      return new File([blob], file.name, {
        type: blob.type,
      });
    };

    const input = document.querySelector('#image');
    input.addEventListener('change', async (e) => {
      const { files } = e.target;

      if (!files.length) return;

      const dataTransfer = new DataTransfer();

      for (const file of files) {
        if (!file.type.startsWith('image')) {
          dataTransfer.items.add(file);
          continue;
        }

        const compressedFile = await compressImage(file, {
          quality: 0.6,
          type: 'image/jpeg',
        });

        dataTransfer.items.add(compressedFile);
      }

      e.target.files = dataTransfer.files;
    });
  </script>
  <script>
    /*  $('#volumen,#peso').keyup(function() {
          var volumen = $('#volumen').val();
          var peso = $('#peso').val();
    
        }); */
    function imagePreview(fileInput) {
      if (fileInput.files && fileInput.files[0]) {
        var fileReader = new FileReader();
        fileReader.onload = function (event) {
          $('#preview').html('<img src="' + event.target.result + '" width="63" height="63"/>');
        };
        fileReader.readAsDataURL(fileInput.files[0]);
      }
    }
    $("#image").change(function () {
      imagePreview(this);
      $('#load_det_img').hide();
    });
    //Clear Function
    $("#clear").click(function () {
      $('#image').val(null);
      var image = event.target.result;
      image = '';
      $('#preview').html('<img src="./imgs/na.jpeg" width="63" height="63">');
    });
    $('#addedOk').click(
      function () {
        location.reload();
      });
  </script>
<script>
document.getElementById('cantidad').addEventListener('input', function() {
    var cantidad = this.value;
    if (cantidad.includes('.') && !Number.isInteger(parseFloat(cantidad))) {
        var fraction = decimalToFraction(cantidad);
        alert("¿En serio? ¿Vas a vender la " + fraction + " parte de un producto? Creo que ese dato debería ir en el precio, no en la cantidad.");
    }
});

function decimalToFraction(decimal) {
    var tolerance = 1.0E-6; // Tolerancia para encontrar la fracción
    var h1 = 1, h2 = 0, k1 = 0, k2 = 1, b = decimal;
    do {
        var a = Math.floor(b);
        var aux = h1;
        h1 = a * h1 + h2;
        h2 = aux;
        aux = k1;
        k1 = a * k1 + k2;
        k2 = aux;
        b = 1 / (b - a);
    } while (Math.abs(decimal - h1 / k1) > decimal * tolerance);

    return h1 + "/" + k1;
}
</script>
</body>

</html>