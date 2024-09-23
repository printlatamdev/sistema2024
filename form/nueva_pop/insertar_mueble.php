<?php 
session_start();

// Retrieve session and request variables
$base = $_SESSION['base'] ?? '';
$anio = '22';
$bd = $base . $anio;
$orderid = $_REQUEST['id_orden'] ?? '';
$idfolder = '';

// Set folder paths based on country
$carpeta_pais = ($base === "esa") ? "EL_SALVADOR" : "NICARAGUA";
$origen = ($base === "esa") ? "SV" : "NI";

// Database connection
$mysqli = new mysqli('localhost', 'admin', 'AG784512', $bd);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Fetch order details
if (empty($orderid)) {
    $result = $mysqli->query("SELECT id_orden, destino, id_proyecto FROM pop ORDER BY id_orden DESC LIMIT 1");
} else {
    $stmt = $mysqli->prepare("SELECT id_orden, destino, id_proyecto FROM pop WHERE id_orden = ?");
    $stmt->bind_param('s', $orderid);
    $stmt->execute();
    $result = $stmt->get_result();
}

$order = $result->fetch_assoc();
$id_orden = $order['id_orden'] ?? '';
$dest = $order['destino'] ?? '';
$proyecto = $order['id_proyecto'] ?? '';

// Validate id_orden
if (empty($id_orden) || !is_numeric($id_orden)) {
    die('Invalid order ID.');
}

// Fetch company details
$stmt = $mysqli->prepare("SELECT id_empresa, empresa FROM pop WHERE id_orden = ?");
$stmt->bind_param('s', $id_orden);
$stmt->execute();
$company = $stmt->get_result()->fetch_assoc();
$id_empresa = $company['id_empresa'] ?? '';
$empresa = $company['empresa'] ?? '';

// Generate a random number
$aleatorio = mt_rand(0, 99000);

// Get POST data
$mueble = $_POST['mueble'] ?? '';
$cantidad = $_POST['cantidad'] ?? '';
$base = $_POST['base'] ?? '';
$altura = $_POST['altura'] ?? '';
$fondo = $_POST['fondo'] ?? '';
$cotizacion = $_POST['cotizacion'] ?? '';
$nota = $_POST['nota'] ?? '';
$status = "PROCESO";

// Handle file upload
$arte = "mueble_{$id_orden}_{$aleatorio}.jpg";
$ruta = $_FILES['artes']['tmp_name'] ?? '';
$carpeta_artes = "../../ORDENES_POP/{$carpeta_pais}/ID_POP_{$id_orden}/";
$folders = [
    "EDITABLE",
    "IMPRESION",
    "DOC",
    "ARTES",
    "FOTOS"
];

// Create folders
foreach ($folders as $folder) {
    $path = $carpeta_artes . $folder;
    if (!file_exists($path)) {
        mkdir($path, 0777, true);
    }
}

// Destination path for the file
$destino = $carpeta_artes . "ARTES/{$arte}";

// Copy the uploaded file
if (is_uploaded_file($ruta)) {
    if (!copy($ruta, $destino)) {
        die('Failed to copy file.');
    }
}

// Insert new record
$estado = 1; // Assign value to estado

// Prepare the SQL statement
$stmt = $mysqli->prepare("INSERT INTO pop_detalle (id_orden, id_empresa, empresa, cantidad, base, altura, trabajo, cot, detalle, arte, estado, fondo)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

// Bind parameters
$stmt->bind_param('sssssssssssi', $id_orden, $id_empresa, $empresa, $cantidad, $base, $altura, $mueble, $cotizacion, $nota, $arte, $estado, $fondo);

// Execute the statement
$result = $stmt->execute();

// Check if logistics record needs to be created
$result = $mysqli->query("SELECT id_orden FROM logitica WHERE id_orden = '$id_orden'");
if ($result->num_rows === 0) {
    $stmt = $mysqli->prepare("INSERT INTO logitica (id_orden, id_marca, origen, destino, status, estado)
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssi', $id_orden, $proyecto, $origen, $dest, $status, $estado);
    $stmt->execute();
}

// Log the action
if ($result) {
    $ip = $_SERVER["REMOTE_ADDR"];
    $dias = ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    $detalle = '<font color="blue">' . $_SESSION['vsNombre'] . '</font> ha ingresado un nuevo mueble a la Orden: <font color="red">' . $id_orden . '</font>, el dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';
    $detalle .= '<div class="row">
        <div id="fms0" class="col-md-12">
            <div id="fms" class="col-md-6">
                <div id="fmsd1" class="col-md-12">
                    <label class="control-label"><strong>Detalles:</strong></label><br>
                    <label class="control-label"><strong>Tipo:</strong></label> ' . htmlspecialchars($mueble) . '
                    <div class="clearfix"></div>
                    <label class="control-label"><strong>Cantidad:</strong></label> ' . htmlspecialchars($cantidad) . '
                    <div class="clearfix"></div>
                    <label class="control-label"><strong>Tamaño:</strong></label> ' . htmlspecialchars($base) . ' (base) X ' . htmlspecialchars($altura) . ' (altura) X ' . htmlspecialchars($fondo) . ' (fondo) Metros.
                    <div class="clearfix"></div>
                    <label class="control-label"><strong>Cotizacion:</strong></label> ' . htmlspecialchars($cotizacion) . '
                </div>
                <div id="fmsd3" class="col-md-12">
                    <label class="control-label"><strong>Nota:</strong></label> ' . htmlspecialchars($nota) . '
                </div>
            </div>
            <div id="fms3" class="col-md-6">
                <center>
                    <a href="ORDENES_POP/' . $carpeta_pais . '/' . $idfolder . '/ARTES/' . $arte . '" target="_blank">
                        <img width="210px" src="ORDENES_POP/' . $carpeta_pais . '/' . $idfolder . '/ARTES/' . $arte . '">
                    </a>
                </center>
            </div>
        </div>
    </div><br>';

    $date = date("Y-m-d h:i:s");
    $stmt = $mysqli->prepare("INSERT INTO log_pop (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
    $stmt->bind_param('ssss', $_SESSION['vsNombre'], $ip, $date, $detalle);
    $stmt->execute();

    echo '<script type="text/javascript">
        console.log("something happened...");
        window.location.href="../../form3.php?modificado=01&&id_orden=' . urlencode($orderid) . '";
    </script>';
} else {
    echo '<script type="text/javascript">
        window.location.href="../../form3.php?modificado=01&&id_orden=' . urlencode($orderid) . '";
    </script>';
}

$mysqli->close();
