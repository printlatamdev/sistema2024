<?php
session_start();

// Recupera la base de datos y el año de la sesión
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

$carpeta_pais = $base === "esa" ? "EL_SALVADOR" : "NICARAGUA";
$origen = $base === "esa" ? "SV" : "NI";

// Conexión a la base de datos
$conexion = new mysqli('localhost', 'admin', 'AG784512', $bd);
if ($conexion->connect_error) {
    die('Error de conexión: ' . $conexion->connect_error);
}

// Recogida de datos del formulario
$id_detalle_orden = $_REQUEST['id_detalle_orden'];
$mueble = $_POST['mueble'];
$cantidad = $_POST['cantidad'];
$base = $_POST['base'];
$altura = $_POST['altura'];
$fondo = $_POST['fondo'];
$cotizacion = $_POST['cotizacion'];
$nota = $_POST['nota'];

// Obtener la última orden
$query = "SELECT id_orden FROM pop ORDER BY id_orden DESC LIMIT 1";
$result = $conexion->query($query);
$id_orden = $result->fetch_assoc()['id_orden'];

// Obtener datos de la empresa
$query = "SELECT id_empresa, empresa FROM pop WHERE id_orden = '$id_orden'";
$result = $conexion->query($query);
$row = $result->fetch_assoc();
$id_empresa = $row['id_empresa'];
$empresa = $row['empresa'];

// Obtener datos del detalle de la orden
$query = "SELECT * FROM pop_detalle WHERE id_detalle_orden = '$id_detalle_orden' LIMIT 1";
$result = $conexion->query($query);
$id_orden_si = $result->fetch_assoc()['id_orden'];

// Procesamiento de la imagen
$aleatorio = rand(1, 1000);
$carpeta = "ARTES_" . $id_orden_si;
$artes = "mueble_update_" . $id_orden_si . "_" . $aleatorio . ".jpg";
$ruta = $_FILES['artes']['tmp_name'];
$extension = $_FILES['artes']['type'];
$destino = "../../ORDENES_POP/" . $carpeta_pais . "/" . "ID_POP_" . $id_orden_si . "/ARTES/" . $artes;

// Verifica si la imagen ha sido cargada
if ($_FILES['artes']['error'] !== UPLOAD_ERR_OK) {
    die('Error en la carga del archivo: ' . $_FILES['artes']['error']);
}

// Verifica el tipo de archivo
$allowed_types = ['image/jpeg', 'image/png']; // Añadir más tipos si es necesario
if (!in_array($extension, $allowed_types)) {
    die('Tipo de archivo no permitido');
}

// Verifica si la carpeta existe, si no, crearla
if (!file_exists(dirname($destino))) {
    if (!mkdir(dirname($destino), 0777, true)) {
        die('Error al crear el directorio');
    }
}

// Intenta mover el archivo
if (!move_uploaded_file($ruta, $destino)) {
    die('Error al mover el archivo');
}

// Actualización de la tabla pop_detalle
$stmt = $conexion->prepare("UPDATE pop_detalle SET cantidad = ?, base = ?, altura = ?, trabajo = ?, cot = ?, detalle = ?, arte = ?, fondo = ? WHERE id_detalle_orden = ?");
$stmt->bind_param("ssssssssi", $cantidad, $base, $altura, $mueble, $cotizacion, $nota, $artes, $fondo, $id_detalle_orden);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    // Registro en log_pop
    $ip = $_SERVER["REMOTE_ADDR"]; 
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";
    $detalle = '<font color="blue">' . $_SESSION['vsNombre'] . '</font> ha modificado un mueble de la Orden: <font color="red">' . $id_orden . '</font>, el día ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';

    $detalle .= '<br><br><div class="row"><div id="fms0" class="col-md-12"><div id="fms" class="col-md-6"><div id="fmsd1" class="col-md-12">';
    $detalle .= '<label class="control-label"><strong>Detalles:</strong></label><br>';
    $detalle .= '<label class="control-label"><strong>Tipo:</strong></label> ' . $mueble . '<br>';
    $detalle .= '<label class="control-label"><strong>Cantidad:</strong></label> ' . $cantidad . '<br>';
    $detalle .= '<label class="control-label"><strong>Tamaño:</strong></label> ' . $base . ' (base) X ' . $altura . ' (altura) X ' . $fondo . ' (fondo) Metros.<br>';
    $detalle .= '<label class="control-label"><strong>Cotización:</strong></label> ' . $cotizacion . '<br>';
    $detalle .= '</div><div id="fmsd3" class="col-md-12">';
    $detalle .= '<label class="control-label"><strong>Nota:</strong></label> ' . $nota . '<br>';
    $detalle .= '</div></div><div id="fms3" class="col-md-6">';
    $detalle .= '<center><a href="ORDENES_POP/' . $carpeta_pais .'/'. 'ID_POP_' . $id_orden . '/' . 'ARTES/' . $artes . '" target="_blank"><img width="210px" src="ORDENES_POP/' . $carpeta_pais .'/'. 'ID_POP_' . $id_orden . '/ARTES/' . $artes . '"></a></center></div></div></div><br>';

    $stmt = $conexion->prepare("INSERT INTO log_pop (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $ip, date("Y-m-d h:i:s"), $detalle);
    $stmt->execute();

    echo '<script type="text/javascript">window.location.href="../../form3.php?modificado=01&&id_orden=' . $id_orden_si . '";</script>';
} else {
    echo '<script type="text/javascript">window.location.href="../../form3.php";</script>';
}

$conexion->close();
?>
