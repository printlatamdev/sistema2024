<?php
session_start();

$usuario = $_SESSION['vsNombre'];
$base = $_SESSION['base'];
$anio = 22;  // Año fijo, reemplaza si es necesario
$bd = $base . $anio;

// Conexión a la base de datos usando MySQLi
$mysqli = new mysqli('localhost', 'root', '', $bd);
if ($mysqli->connect_error) {
    die('Error de conexión MySQLi: ' . $mysqli->connect_error);
}

// Datos recibidos desde el formulario
$id_empresa = $_POST['cliente'];
$id_contacto = $_POST['contacto'];
$fecha = $_POST['fecha'];
$vendedor = $_POST['vendedor'];

// Variables adicionales
$status_inicial = "1";
$estado = "1";
$computo = "1";
$impresion = "1";

// Obtener nombre de la empresa
$empresa_query = "SELECT nombre FROM empresa WHERE id_empresa = ?";
$empresa_stmt = $mysqli->prepare($empresa_query);
$empresa_stmt->bind_param("i", $id_empresa);
$empresa_stmt->execute();
$empresa_result = $empresa_stmt->get_result();
$n_empresa = $empresa_result->fetch_assoc()['nombre'];
$empresa_stmt->close();

// Obtener nombre del contacto
$contacto_query = "SELECT nombre FROM contacto WHERE id_contacto = ?";
$contacto_stmt = $mysqli->prepare($contacto_query);
$contacto_stmt->bind_param("i", $id_contacto);
$contacto_stmt->execute();
$contacto_result = $contacto_stmt->get_result();
$n_contacto = $contacto_result->fetch_assoc()['nombre'];
$contacto_stmt->close();

// Insertar orden en la base de datos
$insert_query = "INSERT INTO orden (id_empresa, empresa, id_contacto, contacto, fecha_orden, fecha_entrega, vendedor, usuario, estado, computo, impresion)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$insert_stmt = $mysqli->prepare($insert_query);
$insert_stmt->bind_param("issssssssss", $id_empresa, $n_empresa, $id_contacto, $n_contacto, $fecha, $fecha, $vendedor, $usuario, $estado, $computo, $impresion);

if ($insert_stmt->execute()) {
    // Obtener el ID de la última orden insertada
    $id_orden_query = "SELECT id_orden FROM orden ORDER BY id_orden DESC LIMIT 1";
    $id_orden_result = $mysqli->query($id_orden_query);
    $id_orden = $id_orden_result->fetch_assoc()['id_orden'];

    // Registro en el log de producción
    $username = $_SESSION['vsNombre'];
    $ip = $_SERVER["REMOTE_ADDR"];
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');

    // Crear el array para JSON
    $log_data = [
        'usuario' => $username,
        'orden_numero' => $id_orden,
        'cliente' => $n_empresa,
        'contacto' => $n_contacto,
        'vendedor' => $vendedor,
        'fecha_orden' => $fecha,
        'fecha_entrega' => $fecha,
        'fecha_log' => $date_log,
        'hora_log' => date('h:i:s a'),
        'ip' => $ip
    ];

    // Convertir a JSON
    $detalle = json_encode($log_data);

    // Insertar en log_producción
    $log_query = "INSERT INTO log_produccion (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)";
    $log_stmt = $mysqli->prepare($log_query);
    $hora = date("Y-m-d H:i:s");
    $log_stmt->bind_param("ssss", $username, $ip, $hora, $detalle);

    if ($log_stmt->execute()) {
        // Creación de carpeta para artes de la orden
        $carpeta_artes_orden = "../../ORDENES_OP/COLOR/ID_OP_" . $id_orden . '/';
        if (!file_exists($carpeta_artes_orden)) {
            mkdir($carpeta_artes_orden, 0777, true);
        }

        // Redireccionar después de la operación exitosa
        echo '<script type="text/javascript">window.location.href="../../formop3.php";</script>';
    } else {
        echo 'Error al insertar en log_produccion: ' . $log_stmt->error;
    }

    $log_stmt->close();
} else {
    echo 'Error al insertar la orden: ' . $insert_stmt->error;
}

$insert_stmt->close();
$mysqli->close();
?>