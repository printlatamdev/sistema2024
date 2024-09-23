<?php
session_start(); // Start session

$usr = $_REQUEST['user'];
$cla = $_REQUEST['pass'];
$dest = $_REQUEST['ni'];

if ($dest == "nica") {
    $dest = "NI";
}

include("connect.php");

$conn = ($dest == "NI") ? conexion2() : conexion();
$base = ($dest == "NI") ? "nica" : "esa";
$anio = 22;

$sql = "SELECT * FROM usuarios WHERE user = ? AND pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('ss', $usr, $cla);
$stmt->execute();
$result = $stmt->get_result();
$existe = $result->num_rows;

if ($existe == 0) {
    header("location: login22.php");
    exit();
} else {
    $_SESSION['dest'] = $dest;

    $fila = $result->fetch_assoc();
    $username = $fila['nombre'];

    // Store session variables
    $_SESSION['vsIdempresa'] = $fila['id_acceso'];
    $_SESSION['base'] = $base;
    $_SESSION['year'] = $anio;
    $_SESSION['vsClave'] = $fila['pass'];
    $_SESSION['vsNombre'] = $fila['nombre'];
    $_SESSION['vsUsu'] = $fila['user'];
    $_SESSION['username'] = $fila['nombre'];
    $_SESSION['nivel'] = $fila['nivel'];
    $_SESSION['id'] = $fila['id_usuario'];
    $_SESSION['loggedin'] = true;

    $ip = $_SERVER["REMOTE_ADDR"];
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
    $detalle = "El usuario " . $username . " ha iniciado sesión el día " . $date_log . " a las " . date('h:i:s a') . ".";
    $fechaa = date("Y-m-d");

    $log_sql = "INSERT INTO log (nombre, ip, hora, detalle) VALUES (?, ?, ?, ?)";
    $log_stmt = $conn->prepare($log_sql);
    $log_stmt->bind_param('ssss', $username, $ip, $fechaa, $detalle);

    if ($log_stmt->execute()) {
        header("location: index.php");
    } else {
        echo "Error: " . $conn->error;
    }
}
