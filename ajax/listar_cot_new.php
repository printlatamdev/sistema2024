<?php
// // Enable error reporting
// error_reporting(E_ALL); // Report all types of errors
// ini_set('display_errors', '1'); // Display errors on the screen
session_start();
require_once("../conexion_ajax.php");
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;


$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ajax') {
	$query = mysqli_real_escape_string($con, (strip_tags($_REQUEST['query'], ENT_QUOTES)));

	$tables = "cotizacion";
	$campos = "*";
	$sWhere = " cotizacion.id_cotizacion LIKE '%" . $query . "%'  or cotizacion.empresa LIKE '%" . $query . "%'  ";
	$sWhere .= " order by cotizacion.id_cotizacion desc ";


	include 'pagination.php'; //include pagination file
	//pagination variables
	$page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
	$per_page = intval($_REQUEST['per_page']); //how much records you want to show
	$adjacents  = 4; //gap between pages after number of adjacents
	$offset = ($page - 1) * $per_page;
	//Count the total number of row in your table*/
	$count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $tables where $sWhere");
	if ($row = mysqli_fetch_array($count_query)) {
		$numrows = $row['numrows'];
	} else {
		echo mysqli_error($con);
	}


	$total_pages = ceil($numrows / $per_page);
	//main query to fetch the data
	$query = mysqli_query($con, "SELECT $campos  FROM  $tables where $sWhere LIMIT $offset,$per_page");
	//loop through fetched data
	if ($numrows > 0) {

?>
		<div class="table-responsive">
		<table class="display table table-bordered">
    <thead class="bg-primary">
        <tr>
            <th class='text-center' width="150">N°</th>
            <th class='text-center' width="300">Cliente</th>
            <th class='text-center'>Contacto</th>
            <th class='text-center'>Usuario</th>
            <th class='text-center'>Fecha</th>
            <th class='text-center'>Documento</th>
            <th class='text-center'>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $finales = 0;
        while ($row = mysqli_fetch_array($query)) {
            $id_proyecto = htmlspecialchars(isset($row['id_cotizacion']) ? $row['id_cotizacion'] : '');
            $nombre = strtoupper(htmlspecialchars(isset($row['empresa']) ? $row['empresa'] : ''));
            $contacto = strtoupper(htmlspecialchars(isset($row['contacto']) ? $row['contacto'] : ''));
            $usuario = strtoupper(htmlspecialchars(isset($row['id_usuario']) ? $row['id_usuario'] : ''));
            $fecha = strtoupper(htmlspecialchars(isset($row['fecha']) ? $row['fecha'] : ''));
            $archivo = htmlspecialchars(isset($row['archivo']) ? $row['archivo'] : '');
            
            $finales++;
        ?>
            <tr class="<?php echo htmlspecialchars($text_class); ?>">
                <td class='text-left' width="150"><?php echo $id_proyecto; ?></td>
                <td class='text-left' width="300"><?php echo $nombre; ?></td>
                <td class='text-left'><?php echo $contacto; ?></td>
                <td class='text-left'><?php echo $usuario; ?></td>
                <td class='text-left'><?php echo $fecha; ?></td>
                <td class='text-left'>
                    <a href="<?php echo 'cotizaciones_' . htmlspecialchars($bd) . '/' . $archivo; ?>" data-fancybox="preview">
                        <img src="imagenes/pdf.png" class="img-thumbnail" width="40" alt="PDF">
                    </a>
                </td>
                <td>
                    <a class="edit" data-fancybox data-options='{"type": "iframe", "iframe": {"preload": false}}' href="cot_detalle_new.php?orden=<?php echo urlencode($id_proyecto); ?>">
                        <i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i>
                    </a>
                    <a href="#deleteProductModal2" class="delete" data-toggle="modal" data-id="<?php echo urlencode($id_proyecto); ?>">
                        <i class="material-icons" data-toggle="tooltip" title="Eliminar">&#xE872;</i>
                    </a>
                </td>
            </tr>
        <?php } ?>
        <tr>
            <td colspan='7'>
                <?php
                $inicios = $offset + 1;
                $finales += $inicios - 1;
                echo "Mostrando $inicios al $finales de $numrows registros";
                echo paginate($page, $total_pages, $adjacents);
                ?>
            </td>
        </tr>
    </tbody>
</table>
</div>
<?php
	}
}
?>