<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// Iniciar sesión
session_start();

// Conectar a la base de datos
require_once ("conexion_ajax.php");

$action = isset($_REQUEST['action']) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
  $query2 = isset($_REQUEST['query']) ? mysqli_real_escape_string($con, strip_tags($_REQUEST['query'], ENT_QUOTES)) : '';

  $sWhere = "pop_proyecto.nombre LIKE '%" . $query2 . "%' AND estado = 1";
  $sWhere .= " ORDER BY pop_proyecto.id_proyecto DESC";

  include 'pagination.php';

  $page = isset($_REQUEST['page']) ? (int) $_REQUEST['page'] : 1;
  $per_page = 10;
  $adjacents = 4;
  $offset = ($page - 1) * $per_page;

  // Contar el total de filas
  $count_query = mysqli_query($con, "SELECT COUNT(DISTINCT a.id_orden) AS numrows FROM logitica b 
  INNER JOIN pop a ON b.id_orden = a.id_orden 
  INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto 
  WHERE a.estado = 1");


  if ($row = mysqli_fetch_array($count_query)) {
    $numrows = $row['numrows'];
  } else {
    die("Error al realizar la consulta: " . mysqli_error($con));
  }

  $ttottal = $numrows;
  $total_pages = ceil($numrows / $per_page);

  // Lógica para filtrar según el nivel del usuario
  $nivel = $_SESSION['nivel'];

  switch ($nivel) {
    case 5:
      $query_base .= "AND a.impresion = '1' ";
      break;
    case 15:
      $query_base .= "AND (a.corte = '1' OR a.nombre_proyecto LIKE '%" . $query2 . "%') ";
      break;
    case 4:
      $query_base .= "AND (a.computo = '1' OR a.nombre_proyecto LIKE '%" . $query2 . "%') ";
      break;
    default:
      $query_base .= "AND a.estado = '1' ";
      break;
  }

  $query_base .= "ORDER BY a.id_orden DESC LIMIT $offset, $per_page";

  $query = mysqli_query($con, $query_base);

  if (!$query) {
    die("Error al realizar la consulta: " . mysqli_error($con));
  }
  ?>

  <div class="table-responsive" style="margin-left: -20px; margin-top: 30px;">
    <table class="table table-striped table-hover">
      <thead class="bg-primary">
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
          <?php if (in_array($nivel, [1, 2, 3, 11, 17, 50])): ?>
            <th>Impresiones</th>
          <?php endif; ?>
          <th width="100">Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php if ($numrows > 0): ?>
          <?php if (mysqli_num_rows($query) == 0): ?>
            <tr>
              <td colspan="14">No hay datos.</td>
            </tr>
          <?php else: ?>
            <?php $no = 1; ?>
            <?php while ($row = mysqli_fetch_assoc($query)): ?>
              <?php
              $data = '#' . $row['id_orden'];
              $data2 = 'ab' . $row['id_orden'];
              $archive = "../sistema2024/browser/elfinder6x67.php?year=2023&empresa={$row['empresa']}&marca={$row['marca']}&proyecto={$row['nombre']}&nivel={$nivel}&tipo=original&base={$base}&orderid={$row['id_orden']}";
              ?>
              <tr style="font-size:85%;">
                <td><?php echo htmlspecialchars($row['id_orden'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['fecha_orden'], ENT_QUOTES, 'UTF-8'); ?></td>

                <?php if (in_array($nivel, [1, 2, 3, 9, 20, 7, 50])): ?>
                  <td>
                    <?php
                    $cot_query = mysqli_query($con, "SELECT DISTINCT cot FROM pop_detalle WHERE id_orden='" . htmlspecialchars($row['id_orden'], ENT_QUOTES, 'UTF-8') . "'");
                    while ($cot_row = mysqli_fetch_assoc($cot_query)) {
                      $cot = htmlspecialchars($cot_row['cot'], ENT_QUOTES, 'UTF-8');
                      $cot_parts = explode("-", $cot);
                      $cot_type = end($cot_parts);
                      $cot_base = ($cot_type == 'NI') ? 'nica22' : 'esa22';
                      $cot_file = 'cotizaciones_' . $cot_base . '/' . htmlspecialchars($cot_row['archivo'], ENT_QUOTES, 'UTF-8');
                      $label_class = (strpos($cot, '-24') !== false || strpos($cot, '-NI') !== false || strpos($cot, '-SV') !== false) ? 'success' : 'info';
                      echo '<div class="col-md-12"><a href="' . $cot_file . '" data-fancybox="preview" style="font-size:15px;"><span class="label label-' . $label_class . '">' . $cot . '</span></a></div>';
                    }
                    ?>
                  </td>
                <?php else: ?>
                  <td><a data-toggle="modal" data-target="#no"><?php echo $cot; ?></a></td>
                <?php endif; ?>

                <td><?php echo htmlspecialchars($row['numorden_compra'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['empresa'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['nombre_proyecto'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['origen'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['destino'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['f_salida'], ENT_QUOTES, 'UTF-8'); ?></td>
                <td><?php echo htmlspecialchars($row['f_llegada'], ENT_QUOTES, 'UTF-8'); ?></td>

                <td>
                  <?php
                  $status_labels = [
                    'PROCESO' => 'success',
                    'PROGRAMADO' => 'info',
                    'REVISION' => 'warning',
                    'DESPACHADO' => 'info',
                    'INICIADO' => 'info',
                    'ALMACEN' => 'primary',
                    'ALMACENADO' => 'primary',
                    'CERRADO' => 'default',
                    'PARCIAL' => 'info',
                  ];
                  $label_class = isset($status_labels[$row['status']]) ? $status_labels[$row['status']] : 'danger';
                  ?>
                  <a style="color: #3e3c3c;"><span
                      class="label label-<?php echo $label_class; ?>"><?php echo htmlspecialchars($row['status'], ENT_QUOTES, 'UTF-8'); ?></span></a>
                </td>

                <td><a href="<?php echo $data2; ?>" data-fancybox data-type="iframe" class="btn btn-warning btn-xs"
                    style="font-size: 85%;">INFO</a></td>
                <td><a href="<?php echo $archive; ?>" data-fancybox data-type="iframe" class="btn btn-primary btn-xs"
                    style="font-size: 85%;">DATA</a></td>

                <?php if (in_array($nivel, [1, 2, 3, 11, 17, 50])): ?>
                  <td><a href="prod_impresion.php?id_orden=<?php echo htmlspecialchars($row['id_orden'], ENT_QUOTES, 'UTF-8'); ?>"
                      class="btn btn-success btn-xs" style="font-size: 85%;">Impresion</a></td>
                <?php endif; ?>

                <td>
                  <div class="btn-group btn-group-xs">
                    <?php if (in_array($nivel, [1, 2, 3, 4, 6, 7, 50])): ?>
                      <a href="pop_mod.php?id_orden=<?php echo htmlspecialchars($row['id_orden'], ENT_QUOTES, 'UTF-8'); ?>"
                        class="btn btn-xs btn-default" title="Editar"><i class="glyphicon glyphicon-edit"></i></a>
                      <a href="pop_delete.php?id_orden=<?php echo htmlspecialchars($row['id_orden'], ENT_QUOTES, 'UTF-8'); ?>"
                        class="btn btn-xs btn-danger" title="Eliminar"><i class="glyphicon glyphicon-trash"></i></a>
                    <?php endif; ?>
                  </div>
                </td>
              </tr>
              <?php $no++; ?>
            <?php endwhile; ?>
          <?php endif; ?>
        <?php endif; ?>
      </tbody>
    </table>

    <div class="box-footer clearfix">
      <?php
      echo paginate($page, $total_pages, $adjacents, $per_page);
      ?>
    </div>

  </div>

  <?php
}
?>

<script type="text/javascript">
  var Aatrox = document.getElementById("Aatrox");
  var Aatroxclicks = 0;

  function AatroxIcon() {
    Aatroxclicks = Aatroxclicks + 1;
    if (Aatroxclicks % 2 != 0) {
      Aatrox.setAttribute("src", "http://images.evisos.hn/2014/09/02/cachorros-husky-siberianos-urgente_d75de2f77_3.jpg");
    } else {
      Aatrox.setAttribute("src", "http://cotodelobos.com/blog/wp-content/uploads/2010/08/005-300x211.jpg");
    }
  }
</script>