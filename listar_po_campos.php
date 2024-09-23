<?php
require("db/session_ajax.php");

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
  $query2 = mysqli_real_escape_string($con, strip_tags($_REQUEST['query'], ENT_QUOTES));

  // Pagination variables
  $tables = "pop_proyecto";
  $campos = "*";
  $sWhere = "pop_proyecto.nombre WHERE estado=0";
  $sWhere .= " ORDER BY pop_proyecto.id_proyecto DESC";

  include 'pagination.php'; // Include pagination file

  $page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
  $per_page = 6;
  $adjacents = 4;
  $offset = ($page - 1) * $per_page;

  // Determine user level and area filter
  $nivel = $_SESSION['nivel'];
  $area = $nivel == 4 ? "a.computo='1'" : "a.estado='1'";

  // Count total rows
  $count_query = mysqli_query($con, "SELECT DISTINCT a.id_orden FROM campos a INNER JOIN campos_detalle b ON a.id_orden=b.id_orden WHERE a.estado=1");
  $numrows = mysqli_num_rows($count_query);

  $total_pages = ceil($numrows / $per_page);

  // Update fields based on conditions
  $querycon = mysqli_query($con, "SELECT * FROM campos_detalle");
  while ($rowac = mysqli_fetch_assoc($querycon)) {
    $idordenac = $rowac['id_orden'];
    $computoac = $rowac['computo'];
    $impreac = $rowac['impresion'];

    if ($computoac == 1) {
      mysqli_query($con, "UPDATE campos SET computo='1', estado='1' WHERE id_orden='$idordenac'");
    }
    if ($impreac == 1) {
      mysqli_query($con, "UPDATE campos SET impresion='1', estado='1' WHERE id_orden='$idordenac'");
    }
  }

  $querycam = mysqli_query($con, "SELECT * FROM campos");
  while ($rowcam = mysqli_fetch_assoc($querycam)) {
    $idorder = $rowcam['id_orden'];
    $computocam = $rowcam['computo'];
    $imprecam = $rowcam['impresion'];

    if ($computocam == 0 && $imprecam == 0) {
      mysqli_query($con, "UPDATE campos SET estado='0' WHERE id_orden='$idorder'");
    }
  }

  // Fetch data
  $query = mysqli_query($con, "SELECT DISTINCT a.*, b.id_orden FROM campos a INNER JOIN campos_detalle b ON a.id_orden=b.id_orden WHERE $area AND a.id_orden LIKE '%$query2%' ORDER BY a.id_orden DESC LIMIT $offset, $per_page");

  if (mysqli_num_rows($query) > 0) {
    echo '<div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
              <table class="table table-striped table-hover">
                  <thead class="bg-primary">
                      <tr>
                          <th># OP</th>
                          <th>Fecha</th>
                          <th>Cliente</th>
                          <th>Generar</th>
                          <th>Estado</th>
                          <th>Scan</th>
                          <th>Info</th>
                          <th>Data</th>
                          <th>Acciones</th>
                      </tr>
                  </thead>';
    if (mysqli_num_rows($query) == 0) {
      echo '<tr><td colspan="9">No hay datos.</td></tr>';
    } else {
      $no = 1;
      $nivel = $_SESSION['nivel'];
      $base = $_SESSION['base'];

      while ($row = mysqli_fetch_assoc($query)) {
        $data = '#' . $row['id_orden'];
        $data2 = $row['id_orden'];
        $dataa = '#ab' . $row['id_orden'];
        $dataa2 = 'ab' . $row['id_orden'];
        $datab = '#cd' . $row['id_orden'];
        $datab2 = 'cd' . $row['id_orden'];
        $archive = 'browser/elfinder8.php?campo=' . $row['id_orden'] . '&&tipo=campos2&&nivel=' . $nivel;

        echo '<tr style="font-size:85%;">
                      <td>' . $row['id_orden'] . '</td>
                      <td>' . $row['fecha_orden'] . '</td>
                      <td>' . $row['cliente'] . '</td>';

        if ($base == "esa" || $base == "nica") {
          if (in_array($nivel, [1, 2, 3, 9])) {
            echo '<td>
                              <a id="r' . $row['id_orden'] . '" href="#rem' . $row['id_orden'] . '" role="button" data-toggle="modal" class="btn bg-success"><i class="fas fa-print"></i></a>
                              <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false }}\' href="reportes/produccion.imprimir.campos.php?idorden=' . $row['id_orden'] . '" class="btn bg-success"><i class="fas fa-file-pdf"></i></a>
                          </td>';
          } else {
            echo '<td>
                              <a data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-print"></i></a>
                              <a data-toggle="modal" data-target="#no" class="btn bg-success"><i class="fas fa-file-pdf"></i></a>
                          </td>';
          }
        }

          echo '<td>';
        if ($row['impresion'] == 0)
          echo '<span class="label label-success">IMPRESION</span>';
        if ($row['computo'] == 0)
          echo '<span class="label label-info">COMPUTO</span>';
        if ($row['estado'] == 0)
          echo '<span class="label label-warning">PRODUCCION</span>';

        echo '</td>';
        
        echo '<td>
                      <a class="btn bg-success" href="ORDENES_OP/CAMPOS/' . $row['id_orden'] . '/DOCUMENTOS/' . $row['scan'] . '" data-fancybox="preview"><i class="fas fa-file-alt"></i></a>
                  </td>';

        echo '<td>
                      <a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target="' . $data . '" aria-expanded="false" aria-controls="' . $data2 . '"></a>
                  </td>';

        echo '<td>
                      <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false }}\' href="' . $archive . '" class="btn bg-success"><i class="far fa-folder"></i></a>
                  </td>';

        if ($base == "esa" || $base == "nica") {
          if (in_array($nivel, [1, 2, 3, 17])) {
            echo '<td>
                              <a data-fancybox data-options=\'{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false }}\' href="formop3_campos.php?id_orden=' . $row['id_orden'] . '" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                              <a href="form/nueva_op/fin_po_campos.php?id=' . $row['id_orden'] . '" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                          </td>';
          } else {
            echo '<td>
                              <a data-toggle="modal" data-target="#no" class="edit"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                              <a data-toggle="modal" data-target="#no" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
                          </td>';
          }
        }

        echo '</tr>';
          // Start your PHP block
        echo '<tr>
        <td colspan="14" class="zeroPadding">
            <div class="col">
                <div class="collapse multi-collapse" id="' . htmlspecialchars($data2) . '" style="width:100%">
                    <div class="card card-body">
                        <br>';
        include("consulta_item_op_campos.php"); // Ensure this file returns expected content
        echo '      </div>
                </div>
            </div>
        </td>
        </tr>';
              
        // Second Collapse with AJAX function
        $n_funcion = 's' . htmlspecialchars($data2);
        echo '<script>
          function ' . $n_funcion . '(str) {
              console.log("Function called with:", str);
              if (str === "") {
                  document.getElementById("' . $n_funcion . '").innerHTML = "";
                  return;
              }
              let xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                  if (this.readyState === 4) {
                      if (this.status === 200) {
                          console.log("Response received:", this.responseText);
                          document.getElementById("' . $n_funcion . '").innerHTML = this.responseText;
                      } else {
                          console.error("Error: " + this.status);
                      }
                  }
              };
              xmlhttp.open("GET", "getuser_op_campos.php?q=" + encodeURIComponent(str), true);
              xmlhttp.send();
          }
        </script>';
              }
            }
          
            echo '</table>';
            echo '<div class="table-pagination">';
            echo paginate($page, $total_pages, $adjacents);
            echo '</div>';
          } else {
            echo '<div class="alert alert-danger">No hay registros</div>';
          }
        }
        