<?php

session_start();

// Mostrar todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar que las variables de sesión estén definidas
if (!isset($_SESSION['base']) || !isset($_SESSION['vsNombre'])) {
    die('Las variables de sesión necesarias no están definidas.');
}

$usuario = $_SESSION['vsNombre'];
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Determinar el nombre de la carpeta del país
$carpeta_pais = ($base === "esa") ? "EL_SALVADOR" : "NICARAGUA";

// Configuración de conexión a la base de datos
$host = "localhost";
$username = "root";
$password = "";
$database = $bd;

// Crear una conexión
$mysqli = new mysqli($host, $username, $password, $database);

// Verificar la conexión
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Obtener los datos del formulario
$id_empresa = $_POST['cliente'];
$id_contacto = $_POST['contacto'];
$fecha = $_POST['fecha'];
$vendedor = $_POST['vendedor'];
$pais = $_POST['pais'];
$id_proyecto = $_POST['proyecto'];
$orden_compra = $_POST['orden_compra'];

// Obtener el estado del usuario
$stmt_user = $mysqli->prepare("SELECT id_usuario FROM usuarios WHERE nombre = ?");
$stmt_user->bind_param('s', $usuario);
$stmt_user->execute();
$stmt_user->bind_result($user_id);
$stmt_user->fetch();
$stmt_user->close();

$estado = ($user_id == 115) ? 2 : 1;

// Consultas preparadas para obtener datos
$stmt_empresa = $mysqli->prepare("SELECT nombre FROM empresa WHERE id_empresa = ?");
$stmt_empresa->bind_param('i', $id_empresa);
$stmt_empresa->execute();
$stmt_empresa->bind_result($n_empresa);
$stmt_empresa->fetch();
$stmt_empresa->close();

$stmt_contacto = $mysqli->prepare("SELECT nombre FROM contacto WHERE id_contacto = ?");
$stmt_contacto->bind_param('i', $id_contacto);
$stmt_contacto->execute();
$stmt_contacto->bind_result($n_contacto);
$stmt_contacto->fetch();
$stmt_contacto->close();

$stmt_proyecto = $mysqli->prepare("SELECT nombre, id_marca FROM pop_proyecto WHERE id_proyecto = ?");
$stmt_proyecto->bind_param('i', $id_proyecto);
$stmt_proyecto->execute();
$stmt_proyecto->bind_result($n_proyecto, $id_marca);
$stmt_proyecto->fetch();
$stmt_proyecto->close();

$stmt_insert = $mysqli->prepare("INSERT INTO pop (id_empresa, empresa, id_contacto, contacto, fecha_orden, fecha_entrega, vendedor, destino, usuario, estado, id_proyecto, nombre_proyecto, orden_compra) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
if ($stmt_insert === false) {
    die('Error al preparar la consulta: ' . $mysqli->error);
}

// Asegúrate de que las variables están definidas
$id_empresa = intval($id_empresa);
$id_contacto = intval($id_contacto);
$fecha = mysqli_real_escape_string($mysqli, $fecha);
$vendedor = mysqli_real_escape_string($mysqli, $vendedor);
// $pais = mysqli_real_escape_string($mysqli, $pais);
$id_proyecto = intval($id_proyecto);

$stmt_insert->bind_param('isissssssiiss', $id_empresa, $n_empresa, $id_contacto, $n_contacto, $fecha, $fecha_entrega, $vendedor, $pais, $usuario, $estado, $id_proyecto, $n_proyecto, $orden_compra);
$res = $stmt_insert->execute();
$stmt_insert->close();

if ($res) {
    // Obtener el ID de la última orden insertada
    $id_orden = $mysqli->insert_id;

    // Registrar el log
    $ip = $_SERVER["REMOTE_ADDR"];
    $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    $detalle = '<font color="blue">' . $usuario . '</font> ha creado Orden Número: <font color="red">' . $id_orden . '</font>.</br>Detalles: Cliente: <b>' . $n_empresa . '</b>, Contacto: <b>' . $n_contacto . '</b>, Vendedor: <b>' . $vendedor . '</b>, Fecha de Orden: <b>' . $fecha . '</b>, Fecha de Entrega: <b>' . $fecha . '</b>.</br> El día ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';
    $detalle23 = $_SESSION['vsNombre'] . ' ha creado Nueva POP a las ' . date('h:i:s a') . ' ';

    // Variables para bind_param
    $titulo = 'as';
    $comentario = $detalle23;
    $fecha_comentario = date("Y-m-d H:i:s");

    $stmt_log = $mysqli->prepare("INSERT INTO log_pop (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
    $stmt_log->bind_param('ssss', $usuario, $ip, date("Y-m-d H:i:s"), $detalle);
    $stmt_log->execute();
    $stmt_log->close();

    // $stmt_comentario = $mysqli->prepare("INSERT INTO tbcomentario (titulo, comentario, fecha) VALUES (?, ?, ?)");
    // $stmt_comentario->bind_param('sss', $titulo, $comentario, $fecha_comentario);
    // $stmt_comentario->execute();
    // $stmt_comentario->close();

    // Crear carpeta para artes de orden si no existe
    $carpeta_artes_orden = "../../ORDENES_OP/artes_op_esa20/";
    if (!file_exists($carpeta_artes_orden)) {
        if (mkdir($carpeta_artes_orden, 0777, true)) {
            echo "Carpeta creada exitosamente.<br>";
        } else {
            echo "Error al crear la carpeta.<br>";
        }
    } else {
        echo "La carpeta ya existe.<br>";
    }

    // Redireccionar
    echo '<script type="text/javascript">window.location.href="../../form3.php";</script>';
} else {
    echo 'Error al insertar la orden. Código de error: ' . $mysqli->error . '<br>';
}

// Cerrar la conexión
$mysqli->close();
?>
