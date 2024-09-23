<?php
//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

session_start();

/*Connect To Database*/
require_once("conexion_ajax.php");

$numrows = 0;

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
  $query2 = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

  $tables = "pop_proyecto";
  $campos = "*";
  $sWhere = " pop_proyecto.nombre LIKE '%" . $query2 . "%' and estado=0";
  $sWhere .= " order by pop_proyecto.id_proyecto desc";

  include 'pagination.php'; //include pagination file

  //pagination variables
  $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
  $per_page = 8;
  $adjacents = 4; //gap between pages after number of adjacents
  $offset = ($page - 1) * $per_page;

  // Determine the user's level and set the area filter
  $nivel = $_SESSION['nivel'] ?? '';
  if ($nivel == 5) {
    $area = "a.impresion = '1'";
  } else if ($nivel == 4) {
    $area = "a.computo = '1'";
  } else {
    $area = "a.estado = '1'";
  }

  // Count the total number of rows in your table
  $count_query = mysqli_query($con, "SELECT DISTINCT a.*, b.cot FROM orden a INNER JOIN orden_detalle b ON a.id_orden=b.id_orden WHERE $area ORDER BY a.id_orden DESC");
  if (!$count_query) {
    die('SQL Error: ' . mysqli_error($con));
  }

  $numrows = mysqli_num_rows($count_query);
  $total_pages = ceil($numrows / $per_page);

  // Update the estado field based on the related data in orden_detalle
  $querycon = mysqli_query($con, "SELECT * FROM orden_detalle");
  if ($querycon) {
    while ($rowac = mysqli_fetch_assoc($querycon)) {
      $idordenac = $rowac['id_orden'];
      $computoac = $rowac['computo'];
      $impreac = $rowac['impresion'];

      if ($computoac == 1) {
        mysqli_query($con, "UPDATE orden SET computo='1', estado='1' WHERE id_orden='$idordenac'");
      }
      if ($impreac == 1) {
        mysqli_query($con, "UPDATE orden SET impresion='1', estado='1' WHERE id_orden='$idordenac'");
      }
    }
  } else {
    die('SQL Error: ' . mysqli_error($con));
  }

  // Automatically finalize orders
  $queryorden = mysqli_query($con, "SELECT * FROM orden");
  if ($queryorden) {
    while ($rowor = mysqli_fetch_assoc($queryorden)) {
      $idorder = $rowor['id_orden'];
      $computovar = $rowor['computo'];
      $imprevar = $rowor['impresion'];

      if ($computovar == 0 && $imprevar == 0) {
        mysqli_query($con, "UPDATE orden SET estado='0' WHERE id_orden='$idorder'");
      }
    }
  } else {
    die('SQL Error: ' . mysqli_error($con));
  }

  // Fetching the main data
  if (!empty($query2)) {
    $query = mysqli_query($con, "SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion 
                                     FROM orden a 
                                     INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
                                     WHERE a.empresa LIKE '%$query2%' 
                                     ORDER BY a.id_orden DESC 
                                     LIMIT $offset, $per_page");
  } else {
    $query = mysqli_query($con, "SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion 
                                     FROM orden a 
                                     INNER JOIN orden_detalle b ON a.id_orden=b.id_orden 
                                     WHERE $area 
                                     ORDER BY a.id_orden DESC 
                                     LIMIT $offset, $per_page");
  }
  if (!$query) {
    die('SQL Error: ' . mysqli_error($con));
  }
  ?>

  <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
    <table class="table table-striped table-hover">
      <thead class="bg-primary">
        <tr>
          <th># OP</th>
          <th>Fecha</th>
          <th>Cot</th>
          <th>Cliente</th>
          <th>Facturacion</th>
          <th>Generar</th>
          <th>Estado</th>
          <th>Info</th>
          <?php if ($nivel != 50) { ?>
            <th>Data</th><?php } ?>
          <th>Acciones</th>

        </tr>
      </thead>
      <?php

      if (!$query) {
        die('Query failed: ' . mysqli_error($con));
      }

      if (mysqli_num_rows($query) == 0) {
        echo '<tr><td colspan="14">No hay datos.</td></tr>';
      } else {
        $no = 1;
        while ($row = mysqli_fetch_assoc($query)) {
          $data = '#' . $row['id_orden'];
          $data2 = $row['id_orden'];
          $dataa = '#ab' . $row['id_orden'];
          $dataa2 = 'ab' . $row['id_orden'];
          $datab = '#cd' . $row['id_orden'];
          $datab2 = 'cd' . $row['id_orden'];
          $documentos = '#2024' . $row['id_orden'];
          $documentos2 = '2024' . $row['id_orden'];
          $archive = 'browser/elfinder12.php?campo=' . $row['id_orden'] . '&tipo=campos2&nivel=' . $nivel . '&base=' . $base;

          echo '
              <tr style="font-size:85%;">
                  <td>' . htmlspecialchars($row['id_orden']) . '</td>
                  <td>' . htmlspecialchars($row['fecha_orden']) . '</td>';

          // Define $nivel and $base
          $nivel = $_SESSION['nivel'] ?? '';
          $base = $_SESSION['base'] ?? '';

          if ($base == "esa" || $base == "nica") {
            if (in_array($nivel, [1, 2, 3, 9, 20, 7, 11])) {
              echo '<td>';
              $query240 = mysqli_query($con, "SELECT DISTINCT id_orden, cot FROM orden_detalle WHERE id_orden='" . $row['id_orden'] . "'");
              while ($rowcot = mysqli_fetch_assoc($query240)) {
                $cot = $rowcot['cot'];
                $cadena_buscada = '-22';
                $posicion_coincidencia = strpos($cot, $cadena_buscada);
                $encontrado = ($posicion_coincidencia !== false) ? 1 : 0;

                if ($encontrado == 0) {
                  $query233 = mysqli_query($con, "SELECT * FROM cotizacion WHERE id_cotizacion='" . $cot . "'");
                  while ($row9 = mysqli_fetch_assoc($query233)) {
                    $cot_d = $row9['archivo'];
                    echo '<div class="col-md-12"><b><h5><a href="cotizaciones_' . $base . '22/' . $cot_d . '" data-fancybox="preview"><span class="label label-info">' . htmlspecialchars($cot) . '</span></a></h5></div>';
                  }
                } else {
                  $con22 = mysqli_connect('localhost', 'admin', 'AG784512', 'esa22');
                  if (!$con22) {
                    die('Could not connect: ' . mysqli_error($con));
                  }
                  $sql = "SELECT * FROM cotizacion WHERE id_cotizacion='" . $cot . "'";
                  $result = mysqli_query($con22, $sql);
                  while ($row92 = mysqli_fetch_assoc($result)) {
                    $cot_d2 = $row92['archivo'];
                    echo '<div class="col-md-12"><b><h5><a href="cotizaciones_' . $base . '22/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . htmlspecialchars($cot) . '</span></a></h5></div>';
                  }
                }
              }
              echo '</td>';
            } else {
              echo '<td><a data-toggle="modal" data-target="#no">' . htmlspecialchars($row['cot']) . '</a></td>';
            }
          }

          if ($base == "esa" || $base == "nica") {
            if (in_array($nivel, [1, 2, 3, 9, 17, 11])) {
              echo '<td>' . htmlspecialchars($row['empresa']) . '</td>
                          <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target="' . htmlspecialchars($documentos) . '" aria-expanded="false" aria-controls="' . htmlspecialchars($documentos2) . '"></a></td>
                          <td><a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }\' href="reportes/remision_option.php?base=' . htmlspecialchars($base) . '&id=' . htmlspecialchars($row['id_orden']) . '" class="btn bg-success"><i class="fas fa-print"></i></a>
                              <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }\' href="reportes/produccion.imprimir_op_color.php?idorden=' . htmlspecialchars($row['id_orden']) . '" class="btn bg-success"><i class="fas fa-file-pdf"></i></a>
                          </td>';
            } else {
              echo '<td>' . htmlspecialchars($row['empresa']) . '</td>
                          <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="modal" data-target="#no"></a></td>
                          <td><a data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-print"></i></a>
                              <a data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-file-pdf"></i></a>
                          </td>';
            }
          }

          echo '<td>';
          if ($nivel == 9) {
            $facce = mysqli_query($con, "SELECT * FROM facturacion_centrega WHERE id_orden='" . $row['id_orden'] . "'");
            $varfac = $varce = $varcp = '';

            while ($rowce = mysqli_fetch_assoc($facce)) {
              $varfac2 = $rowce['centrega'];
            }

            if (empty($varfac)) {
              echo '<span class="label label-danger">CCF/FAC</span>&nbsp';
            } else {
              echo '<span class="label label-success">CCF/FAC</span>&nbsp';
              $varfac = 0;
            }

            $facce = mysqli_query($con, "SELECT * FROM facturacion_centrega WHERE id_orden='" . $row['id_orden'] . "'");
            while ($rowce = mysqli_fetch_assoc($facce)) {
              $varce = $rowce['centrega'];
            }

            if (empty($varce)) {
              echo '<span class="label label-danger">CE</span>&nbsp';
            } else {
              echo '<span class="label label-success">CE</span>&nbsp';
              $varce = 0;
            }

            $faccp = mysqli_query($con, "SELECT * FROM facturacion_cpago WHERE id_orden='" . $row['id_orden'] . "'");
            while ($rowcp = mysqli_fetch_assoc($faccp)) {
              $varcp = $rowcp['cpago'];
            }

            if (empty($varcp)) {
              echo '<span class="label label-danger">CP</span>&nbsp';
            } else {
              echo '<span class="label label-success">CP</span>&nbsp';
              $varcp = 0;
            }
          } else {
            if ($row['impresion'] == '0') {
              echo '<span class="label label-success">IMPRESION</span>';
            }
            if ($row['computo'] == '0') {
              echo '<span class="label label-info">COMPUTO</span>';
            }
            if ($row['estado'] == 'PRODUCCION') {
              echo '<span class="label label-warning">PRODUCCION</span>';
            }
          }

          echo '</td>
                  <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target="' . htmlspecialchars($data) . '" aria-expanded="false" aria-controls="' . htmlspecialchars($data2) . '"></a></td>';

          if ($nivel != 50) {
            echo '<td><a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }\' href="' . htmlspecialchars($archive) . '" class="btn bg-success"><i class="far fa-folder"></i></a></td>';
          }

          if (in_array($nivel, [1, 2, 3, 17])) {
            echo '<td>
                      <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }\' href="formop3.php?id_orden=' . htmlspecialchars($row['id_orden']) . '" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                      <a data-toggle="modal" data-target="#confirmaEliminar" onclick="setId(' . htmlspecialchars($row['id_orden']) . ')" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                  </td>';
          } else {
            echo '<td>
                      <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }\' href="formop3.php?id_orden=' . htmlspecialchars($row['id_orden']) . '" class="edit"><i class="material-icons" data-toggle="tooltip" title="Ver">&#xE254;</i></a>
                  </td>';
          }

          echo '</tr>';
          $no++;
        }
      }

      ?>
    </table>
    <td colspan='6'>
      <?php
      $inicios = $offset + 1;
      $finales = $offset + $numrows;
      echo "Mostrando $inicios al $finales de $ttottal registros";
      echo paginate($page, $total_pages, $adjacents);
      ?>
    </td>
  </div>
  <?php
}
?>