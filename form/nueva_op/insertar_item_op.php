<?php 
session_start(); 

// Database configuration
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$host = "localhost";
$username = "root";
$password = "";
$database = $bd;

// Establish connection
$mysqli = new mysqli($host, $username, $password, $database);
if ($mysqli->connect_error) {
    die('Connection failed: ' . $mysqli->connect_error);
}

// Determine country folder based on session base
$carpeta_pais = ($_SESSION['base'] == "esa") ? "EL_SALVADOR" : "NICARAGUA";

// Fetch order ID
$orderid = $_REQUEST["id_orden"] ?? null;
$id_orden = null;

if (empty($orderid)) {
    $result = $mysqli->query("SELECT id_orden FROM orden ORDER BY id_orden DESC LIMIT 1");
    $row = $result->fetch_assoc();
    $id_orden = $row['id_orden'];
} else {
    $stmt = $mysqli->prepare("SELECT id_orden FROM orden WHERE id_orden = ?");
    $stmt->bind_param('i', $orderid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $id_orden = $row['id_orden'];
}

// Fetch order details
$stmt = $mysqli->prepare("SELECT id_empresa, empresa FROM orden WHERE id_orden = ?");
$stmt->bind_param('i', $id_orden);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$id_empresa = $row['id_empresa'];
$empresa = $row['empresa'];

// Fetch other data
$aleatorio = rand(1, 1000);
$trabajo = $_POST['trabajo'];
$id_equipo = $_POST['equipo'];
$tiro = $_POST['impresion'];
$id_material = $_POST['material'];
$id_laminado = $_POST['laminado'];
$id_rigido = $_POST['rigido'];
$cantidad = $_POST['cantidad'];
$base = $_POST['base'];
$altura = $_POST['altura'];
$cotizacion = $_POST['cotizacion'];
$nota = $_POST['nota'];
$acabados = $_POST['acabados'];

// Fetch equipo
$stmt = $mysqli->prepare("SELECT nombre FROM equipo WHERE id_equipo = ?");
$stmt->bind_param('i', $id_equipo);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$equipo = $row['nombre'];

// Fetch material, laminado, and rigido
$material = ($id_material == 0) ? "Ninguno" : fetchMaterialType($mysqli, $id_material);
$rigido = ($id_rigido == 0) ? "Ninguno" : fetchMaterialType($mysqli, $id_rigido);
$laminado = ($id_laminado == 0) ? "Ninguno" : fetchMaterialType($mysqli, $id_laminado);

// Save the uploaded file
$arte = "arteop_" . $id_orden . "_" . $aleatorio . ".jpg";
$ruta = $_FILES['artes']['tmp_name'];
$destino = "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/ARTES/" . $arte;

createDirectories($carpeta_pais, $id_orden);
move_uploaded_file($ruta, $destino);

// Insert into orden_detalle
$stmt = $mysqli->prepare("INSERT INTO orden_detalle (id_orden, id_empresa, empresa, cantidad, base, altura, trabajo, cot, id_equipo, equipo, id_material, material, id_rigido, rigido, id_laminado, laminado, tiro, detalle, arte, computo, impresion, estado, acabado)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param('iisssssssssssissssss', $id_orden, $id_empresa, $empresa, $cantidad, $base, $altura, $trabajo, $cotizacion, $id_equipo, $equipo, $id_material, $material, $id_rigido, $rigido, $id_laminado, $laminado, $tiro, $nota, $arte, $computo_estado = 1, $impresion_estado = 1, $estado = 1, $acabados);
if ($stmt->execute()) {
    // Insert into log_produccion
    $username = $_SESSION['vsNombre'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $date_log = date('d') . ' de ' . date('F') . ' del ' . date('Y');
    $detalle = generateDetailHtml($username, $id_orden, $trabajo, $cantidad, $base, $altura, $cotizacion, $equipo, $material, $laminado, $rigido, $impresion, $acabados, $nota, $arte, $carpeta_pais);
    
    $stmt_log = $mysqli->prepare("INSERT INTO log_produccion (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
    $stmt_log->bind_param('ssss', $username, $ip, $hora = date("Y-m-d H:i:s"), $detalle);
    $stmt_log->execute();
    
    // Redireccionar con JavaScript
    echo '<script type="text/javascript">
        window.location.href = "../../formop3.php?id_orden=' . urlencode($orderid) . '";
    </script>';

} else {
    echo "Error: " . $stmt->error;
}

// Function to fetch material type
function fetchMaterialType($mysqli, $id_material) {
    $stmt = $mysqli->prepare("SELECT tipo FROM material WHERE id = ?");
    $stmt->bind_param('i', $id_material);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row['tipo'];
}

// Function to create necessary directories
function createDirectories($carpeta_pais, $id_orden) {
    $directories = [
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/",
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/EDITABLE",
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/IMPRESION",
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/DOC",
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/ARTES",
        "../../ORDENES_OP/COLOR/" . $carpeta_pais . "/" . $id_orden . "/FOTOS"
    ];
    
    foreach ($directories as $directory) {
        if (!file_exists($directory)) {
            mkdir($directory, 0777, true);
        }
    }
}

// Function to generate HTML details
function generateDetailHtml($username, $id_orden, $trabajo, $cantidad, $base, $altura, $cotizacion, $equipo, $material, $laminado, $rigido, $impresion, $acabados, $nota, $arte, $carpeta_pais) {
    return '<font color="blue">' . $username . '</font> ha ingresado nuevo Item a la Orden: <font color="red">' . $id_orden . '</font>, el dia ' . date('d') . ' de ' . date('F') . ' del ' . date('Y') . ' a las ' . date('h:i:s a') . ' desde la IP ' . $_SERVER["REMOTE_ADDR"] . '.</br></br>' .
           '<div class="row">
                <div id="fms0" class="col-md-12">
                    <div id="fms" class="col-md-6">
                        <div id="fmsd1" class="col-md-12">
                            <label class="control-label"><strong>Detalles:</strong></label><br>
                            <label class="control-label"><strong>Tipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $trabajo . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>' . $cantidad . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $base . ' (base) X ' . $altura . ' (altura) CM.<div class="clearfix"></div>
                            <label class="control-label"><strong>Cotizacion&nbsp;&nbsp;&nbsp;:</strong></label>' . $cotizacion . '
                        </div>
                        <div id="fmsd2" class="col-md-12">
                            <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $equipo . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $material . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Laminado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $laminado . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Rigido&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $rigido . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Impresion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $impresion . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Acabado&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $acabados . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Nota&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>' . $nota . '<div class="clearfix"></div>
                            <label class="control-label"><strong>Arte&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label><a href="../../ORDENES_OP/COLOR/' . $carpeta_pais . '/' . $id_orden . '/ARTES/' . $arte . '" target="_blank">Ver archivo</a>
                        </div>
                    </div>
                </div>
            </div>';
}

// Close connection
$mysqli->close();
?>
