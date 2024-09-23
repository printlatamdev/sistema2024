<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');

// session_start();
// $base = $_SESSION['base'];
// $username = $_SESSION['vsNombre'];
// $usuario = $_SESSION['username'];

// include($base . "_db.php");

// // Fetch bandera from POST request
// $bandera = $_POST['bandera'] ?? null;

// if ($bandera == 1) {
//     // Handling bandera 1: Create new cotizacion
//     $empresa = $_POST['empresa'];
//     $nom_empresa = $_POST['nom_empresa'];
//     $contacto = $_POST['contacto'];
//     $nom_contacto = $_POST['nom_contacto'];
//     $fecha = $_POST['fecha'];
//     $vendedor = $_POST['vendedor'];
//     $nom_vendedor = $_POST['nom_vendedor'];
//     $nota = $_POST['nota'];
//     $incoterm = $_POST['incoterm'];

//     $stmt = $mysqli->prepare("INSERT INTO cotizacion (id_contacto, contacto, fecha, nota, incoterm, id_vendedor, vendedor, id_usuario, id_empresa, empresa, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pendiente')");
//     $stmt->bind_param("ssssiiisss", $contacto, $nom_contacto, $fecha, $nota, $incoterm, $vendedor, $nom_vendedor, $usuario, $empresa, $nom_empresa);

//     if (!$stmt->execute()) {
//         die("Error: " . $stmt->error);
//     }

//     $order = $mysqli->insert_id;

//     // Log to system
//     $ip = $_SERVER["REMOTE_ADDR"];
//     $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
//     $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
//     $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
//     $detalle = "<br><font color='blue'>{$username}</font> ha creado Cotización Número: <font color='red'><b>{$order}</b></font>.</br>Detalles: Cliente: <b>{$nom_empresa}</b>, Contacto: <b>{$nom_contacto}</b>, Vendedor: <b>{$nom_vendedor}</b>.</br> El día {$date_log} a las " . date('h:i:s a') . " desde la IP {$ip}.";

//     $stmt = $mysqli->prepare("INSERT INTO log_cotizacion (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
//     $stmt->bind_param("ssss", $username, $ip, date("Y-m-d h:i:s"), $detalle);
//     $stmt->execute();

//     header("Location: ./cot_detalle_new2.php?orden=" . $order);
//     exit();
// }

// // Handle other cases (2, 3, 4, etc.) similarly...

// $mysqli->close();
?>
