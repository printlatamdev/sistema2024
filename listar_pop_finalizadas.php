<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

session_start();
require_once ("conexion_ajax.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
$query = isset($_REQUEST['query']) ? mysqli_real_escape_string($con, strip_tags($_REQUEST['query'], ENT_QUOTES)) : '';
$page = isset($_REQUEST['page']) ? intval($_REQUEST['page']) : 1;
$per_page = 8; // Number of items per page
$offset = ($page - 1) * $per_page;
$nivel = $_SESSION['nivel'];
$base = $_SESSION['base'];
$year = $_SESSION['year'];
$cotrut = $base . $year;

if ($action == 'ajax') {
  $base_query = "SELECT DISTINCT a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.status, b.numorden_compra, c.id_proyecto, c.marca, c.nombre 
                    FROM logitica b 
                    INNER JOIN pop a ON b.id_orden = a.id_orden 
                    INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto 
                    WHERE a.estado = 0 AND (a.id_orden LIKE '%$query%' OR a.nombre_proyecto LIKE '%$query%')";

  switch ($nivel) {
    case 5:
      $base_query .= " AND a.impresion = 0";
      break;
    case 15:
      $base_query .= " AND a.corte = 0";
      break;
    case 4:
      $base_query .= " AND a.computo = 0";
      break;
    default:
      break;
  }

  $base_query .= " ORDER BY a.id_orden DESC LIMIT $offset, $per_page";

  $count_query = "SELECT COUNT(DISTINCT a.id_orden) 
                    FROM logitica b 
                    INNER JOIN pop a ON b.id_orden = a.id_orden 
                    INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto 
                    WHERE a.estado = 0 AND (a.id_orden LIKE '%$query%' OR a.nombre_proyecto LIKE '%$query%')";

  $result_count = mysqli_query($con, $count_query);
  if (!$result_count) {
    die('Error in count query: ' . mysqli_error($con));
  }
  $numrows = mysqli_fetch_array($result_count)[0];
  $total_pages = ceil($numrows / $per_page);

  $result_query = mysqli_query($con, $base_query);
  if (!$result_query) {
    die('Error in base query: ' . mysqli_error($con));
  }
  ?>

  <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
    <table class="table table-striped table-hover">
      <thead class="bg-danger">
        <tr>

          <th># OP</th>
          <th>Fecha</th>
          <th>Cot</th>
          <th>OC</th>
          <th>Cliente</th>
          <th>Campaña</th>
          <th>Origen</th>
          <th>Destino</th>
          <th>ETD</th>
          <th>ETA</th>
          <th>Estado</th>
          <th>Info</th>
          <th>Data</th>
          <?php if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 11 || $nivel == 17 || $nivel == 50): ?>
            <th>Impresiones</th>
          <?php endif ?>
          <th width="100">Acciones</th>
        </tr>
      </thead>
      <?php
      if ($numrows > 0) {
        if (mysqli_num_rows($result_query) == 0) {
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        } else {
          $no = 1;
          $finales = 0;
          $nivel = $_SESSION['nivel'];

          $tipo = "original";
          while ($row = mysqli_fetch_assoc($result_query)) {

            $finales++;

            if ($facturas != null) {
              $facturas = $row['factura'];
              //$segunda_tabla=0;
            } else {
            }

            $data = '#' . $row['id_orden'];
            $data2 = $row['id_orden'];
            $dataa = '#ab' . $row['id_orden'];
            $dataa2 = 'ab' . $row['id_orden'];
            $datab = '#cd' . $row['id_orden'];
            $datab2 = 'cd' . $row['id_orden'];
            $datalog = '#2i' . $row['id_orden'];
            $data2log = "2i" . $row['id_orden'];
            $server = $_SERVER['SERVER_ADDR'];



            $archive = "../browser/elfinder6x.php?year=20" . $_SESSION['year'] . "&empresa=" . $row['empresa'] . "&marca=" . $row['marca'] . "&proyecto=" . $row['nombre'] . "&nivel=" . $nivel . "&tipo=" . $tipo . "&base=" . $base;
            //$archive="browser/elfinder6.php?year=20".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;
    
            echo '
            <tr style="font-size:85%;" >
              <td>' . $row['id_orden'] . '</td>
              <td>' . $row['fecha_orden'] . '</td>';

            $nivel = $_SESSION['nivel'];
            $base = $_SESSION['base'];

            if ($base == "esa" || $base == "nica") {


              if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 9 || $nivel == 20 || $nivel == 7 || $nivel == 50) {

                //nuevo para cotizaciones
                echo '<td>';
                $sql58 = mysqli_query($con, "select DISTINCT id_orden, cot from pop_detalle where id_orden='" . $row['id_orden'] . "'");
                while ($row52 = mysqli_fetch_assoc($sql58)) {
                  $cot = $row52['cot'];
                  // echo $cot;//***************************BORRAR ESTA PARTE************************//
                  $cadena_de_texto = $cot;
                  $cadena_buscada = '-20';
                  $posicion_coincidencia = strpos($cadena_de_texto, $cadena_buscada);
                  $cadena_de_texto2 = $cot;
                  $cadena_buscada2 = '-NI';
                  $posicion_coincidencia2 = strpos($cadena_de_texto2, $cadena_buscada2);
                  $cadena_buscada3 = '-SV';
                  $posicion_coincidencia3 = strpos($cadena_de_texto2, $cadena_buscada3);

                  if ($posicion_coincidencia === false) {
                    $encontrado = 0;
                    $datos = $cot;
                    list($id_c, $anio) = explode("-", $datos);
                  } else {
                    $encontrado = 1;
                    $datos = $cot;
                    list($id_c, $anio) = explode("-", $datos);
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
                  }
                  /***************************************************************/
                  if ($posicion_coincidencia3 === false) {
                    $encontrado3 = 0;
                    //echo $cadena_buscada3."1";
                    $datos3 = $cot;
                    list($id_c3, $anio3) = explode("-", $datos3);
                  } else {
                    $encontrado3 = 1;
                    $datos3 = $cot;
                    list($id_c3, $anio3) = explode("-", $datos3);
                  }
                  /****************************************************************/


                  if ($encontrado == 0 && $encontrado2 == 0) {
                    $query233 = mysqli_query($con, "select*from cotizacion where id_cotizacion='" . $cot . "'");
                    while ($row9 = mysqli_fetch_assoc($query233)) {
                      $cot_d = $row9['archivo'];
                      echo '<div class="col-md-12"><a href="cotizaciones_' . $cotrut . '/' . $cot_d . '" data-fancybox="preview" style="font-size:15px;"><span class="label label-info">' . $cot . '</span></a></div>';
                    }
                  } elseif ($encontrado == 1 && $encontrado2 == 0) {
                    $con22 = mysqli_connect('localhost', 'admin', 'AG784512', 'esa20');
                    if (!$con22) {
                      die('Could not connect: ' . mysqli_error($con));
                    }
                    mysqli_select_db($con22, 'esa20');
                    $sql = "select*from cotizacion where id_cotizacion='" . $cot . "' ";
                    $result = mysqli_query($con22, $sql);
                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];
                      echo '<div class="col-md-12"><b><h5><a href="cotizaciones_' . $base . '20/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div>';
                    }
                  } elseif ($encontrado == 0 && $encontrado2 == 1) {
                    $con22 = mysqli_connect('localhost', 'admin', 'AG784512', 'nica20');
                    if (!$con22) {
                      die('Could not connect: ' . mysqli_error($con));
                    }

                    mysqli_select_db($con22, 'nica20');
                    $sql = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $result = mysqli_query($con22, $sql);

                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<div class="col-md-12"><b><h5><a href="cotizaciones_nica21/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div>';
                    }
                  } elseif ($encontrado == 1 && $encontrado2 == 1) {

                    $con22 = mysqli_connect('localhost', 'admin', 'AG784512', 'nica20');
                    if (!$con22) {
                      die('Could not connect: ' . mysqli_error($con));
                    }

                    mysqli_select_db($con22, 'nica20');
                    $sql = "select*from cotizacion where id_cotizacion='" . $cot . "' ";


                    $result = mysqli_query($con22, $sql);

                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $cot . '</span></a></div>';
                    }
                  } elseif ($encontrado3 == 1) {

                    $con22 = mysqli_connect('localhost', 'admin', 'AG784512', 'esa20');
                    if (!$con22) {
                      die('Could not connect: ' . mysqli_error($con));
                    }

                    mysqli_select_db($con22, 'esa20');
                    $sql = "select*from cotizacion where id_cotizacion='" . $datos3 . "' ";


                    $result = mysqli_query($con22, $sql);

                    $ordenes_activas = mysqli_num_rows($result);
                    while ($row92 = mysqli_fetch_assoc($result)) {
                      $cot_d2 = $row92['archivo'];

                      echo '<div class="col-md-12"><b><h5><a href="../sistema/cotizaciones_nica19/' . $cot_d2 . '" data-fancybox="preview"><span class="label label-info">' . $datos3 . '</span></a></div>';
                    }
                  }
                }
                echo '</td>';
                //termina nuevo para cotizaciones
    
              } else {
                echo '<td> <a data-toggle="modal" data-target="#no">' . $cot . '</a></td>';
              }
            }
            echo '<td>' . $row['numorden_compra'] . '</td>
                            <td>' . $row['empresa'] . '</td>
                            <td>' . $row['nombre_proyecto'] . '</td>
                            <td>' . $row['origen'] . '</td>
                            <td>' . $row['destino'] . '</td>
                            <td>' . $row['f_salida'] . '</td>
                            <td>' . $row['f_llegada'] . '</td>';

            $nivel = $_SESSION['nivel'];
            $base = $_SESSION['base'];


            echo ' <td> ';
            if ($nivel == 9) {

              $facccf = mysqli_query($con, "select * from pop_documentos where orden='" . $row['id_orden'] . "' and tipo='FACTURA'");
              while ($rowccf = mysqli_fetch_assoc($facccf)) {
                $varfac = $rowccf['documento'];
                //echo $varccf;
              }


              if (empty($varfac)) {
                echo '<span class="label label-danger">CCF/FAC</span>&nbsp';
              } else {
                echo '<span class="label label-success">CCF/FAC</span>&nbsp';
                $varfac = 0;
              }


              $facce = mysqli_query($con, "select * from pop_documentos where orden='" . $row['id_orden'] . "' and tipo='NOTA ENVIO'");
              while ($rowce = mysqli_fetch_assoc($facce)) {
                $varce = $rowce['documento'];
                //echo $varce;
              }

              if (empty($varce)) {
                echo '<span class="label label-danger">CE</span>&nbsp';
              } else {
                echo '<span class="label label-success">CE</span>&nbsp';
                $varce = 0;
              }

              $faccp = mysqli_query($con, "select * from pop_documentos where orden='" . $row['id_orden'] . "' and tipo='COMPROBANTE PAGO'");
              while ($rowcp = mysqli_fetch_assoc($faccp)) {
                $varcp = $rowcp['documento'];
                //echo $varcp;
              }

              if (empty($varcp)) {
                echo '<span class="label label-danger">CP</span>&nbsp';
              } else {
                echo '<span class="label label-success">CP</span>&nbsp';
                $varcp = 0;
              }
            } else {
              if ($row['status'] == 'PROCESO') {
                echo '<span class="label label-success">COLA </span>';
              } else if ($row['status'] == 'IMPRESION') {
                echo '<span class="label label-info">IMPRESION</span>';
              } else if ($row['status'] == 'CORTE') {
                echo '<span class="label label-warning">CORTE </span>';
              } else if ($row['status'] == 'ACABADO') {
                echo '<span class="label label-warning"> ACABADO</span>';
              } else if ($row['status'] == 'TRAMITE') {
                echo '<span class="label label-warning"> DESPACHADO</span>';
              }
            }

            echo '
           </td>
            <td>
            <a data-toggle="collapse" data-target=' . $data . ' aria-expanded="false" aria-controls=' . $data2 . '><img src="imagenes/info.png" width="15"/>
            </a>
           </td>';
            ?>

            <td>
              <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                href="<?php echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a>
            </td>

            <?php if ($nivel == 17 || $nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 11 || $nivel == 9 || $nivel == 50): ?>
              <td>
                <div class="col-xs-6">
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                    href="reportes/remision_pop_option.php?base=<?= $base; ?>&id=<?php echo $row['id_orden']; ?>"
                    class="btn bg-warning" title="Imprimir Nota de Envio"><i class="fas fa-print"></i></a>
                </div>
                <div class="col-xs-6">
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                    href="reportes/produccion.imprimir.pop.php?idorden=<?php echo $row['id_orden']; ?>" class="btn bg-success"
                    title="Imprimir Reporte"><i class="fas fa-file-pdf"></i></a>
                </div>
              </td>
            <?php endif ?>


            <?php
            $nivel = $_SESSION['nivel'];
            $base = $_SESSION['base'];

            if ($base == "esa" || $base == "nica") {


              if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 17 || $nivel == 50) { ?>

                <td>
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }'
                    href="form3.php?id_orden=<?php echo $row['id_orden']; ?>" class="edit"><i class="material-icons"
                      data-toggle="tooltip" title="Editar">&#xE254;</i></a>

                  <?php echo '<a href="form/nueva_pop/fin_pop.php?id=' . $row['id_orden'] . '" title="Finalizar" onclick="return confirm(\'Desea terminar esta orden?\')"class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
              </td>';
              } else { ?>

                <td>
                  <a data-toggle="modal" data-target="#no" class="edit"><i class="material-icons" data-toggle="tooltip"
                      title="Editar">&#xE254;</i></a>

                  <?php echo '<a  data-toggle="modal" data-target="#no" class="delete"><i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i></a>
              </td>';
              }
            } ?>
              <?php echo '
            </tr>
            <tr>
              <td colspan="16" class="zeroPadding" >
                <div class="col" >
                  <div class="collapse multi-collapse" id=' . $data2 . ' style="width:100%" >
                    <div class="card card-body"><br>';
              include ("consulta_item.php"); ?>
        </div>
        </div>
        </div>
        </td>
        </tr>
        <!-- SEGUNDO DESPLEGABLE -->
        <div id="no" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <form name="delete_product" id="delete_product">
                <div class="modal-header">
                  <h2 class="modal-title"> ACCIÓN NO PERMITIDA! </h2>
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                  <H4>
                    <p>Lo sentimos, esta opcion no esta habilitada por motivos de seguridad.</p>
                  </H4>
                  <p class="text-warning"><small>Gracias.</small></p>
                  <input type="hidden" name="delete_id" id="delete_id">
                </div>
                <div class="modal-footer">
                  <input type="button" class="btn btn-default" data-dismiss="modal" value="Salir">

                </div>
              </form>
            </div>
          </div>
        </div>
        
        <script>
          // Genera el nombre de la función basado en el id_orden
          <?php $n_funcion = 's' . $row['id_orden']; ?>

          function <?php echo $n_funcion; ?>(str) {
            if (str === "") {
              document.getElementById("<?php echo $n_funcion; ?>").innerHTML = "";
              return;
            }

            const xmlhttp = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject("Microsoft.XMLHTTP");

            xmlhttp.onreadystatechange = function () {
              if (this.readyState === 4 && this.status === 200) {
                document.getElementById("<?php echo $n_funcion; ?>").innerHTML = this.responseText;
              }
            };

            xmlhttp.open("GET", "getuser.php?q=" + encodeURIComponent(str), true);
            xmlhttp.send();
          }
        </script>


        <tr>
          <td colspan="16" class="zeroPadding">
            <div class="col">
              <div class="collapse multi-collapse" id="<?php echo $dataa2; ?>" style="width:100%">
                <div class="card card-body">
                  <div id="<?php echo $n_funcion; ?>"><b></b></div>
                </div>
              </div>
          </td>
        </tr>
        <!--DOCUMENTOS-->
        <tr>
          <td colspan="16" class="zeroPadding">
            <div class="col">
              <div class="collapse multi-collapse" id="<?php echo $data2log; ?>" style="width:100%">
                <div class="card card-body"><br>

                </div>
              </div>
            </div>
          </td>
        </tr>

        <?php
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
      } else {
        echo '<tr><td colspan="8">No hay datos.</td></tr>';
      }
}
?>