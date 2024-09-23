<?php

$pais = htmlspecialchars($_REQUEST['pais'], ENT_QUOTES, 'UTF-8');
include($pais . "_db.php");

// Check if an 'id' is set to perform a delete operation
if (isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);
    
    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("DELETE FROM contacto WHERE id_contacto = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

    // Redirect to the directory page after deletion
    echo '<script>
        window.parent.location = "directorio2.php";
    </script>';

} else {
    // Retrieve and sanitize POST data
    $empresa = trim($_POST['empresa']);
    $nombre = trim($_POST['contacto']);
    $tel = trim($_POST['tel']);
    $cel = trim($_POST['cel']);
    $email = trim($_POST['email']);

    // Use prepared statements to prevent SQL injection
    $stmt = $mysqli->prepare("INSERT INTO contacto (id_empresa, nombre, telefono, celular, email) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $empresa, $nombre, $tel, $cel, $email);
    $stmt->execute();

    if ($stmt->affected_rows === 1) {
        // Log the success operation (if logging is enabled)
        /*
        $userid = $_COOKIE['userid'];
        $username = $_COOKIE['username'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
        $detalle = "El usuario $username ha ingresado el contacto $nombre que pertenece a la empresa $empresa el día $date_log a las " . date('h:i:s a') . ".";
        $id_sesion = $_COOKIE['session'];
        $stmt_log = $mysqli->prepare("INSERT INTO log (id_usuario, nombre_usuario, ip, hora, detalle, id_sesion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_log->bind_param("ssssss", $userid, $username, $ip, date("Y-m-d h:i:s"), $detalle, $id_sesion);
        $stmt_log->execute();
        $stmt_log->close();
        */

        // Redirect to the directory page with a success message
        echo '<script>
            window.parent.location = "directorio2.php?contacto=' . base64_encode($nombre) . '";
        </script>';
    } else {
        // Log the error operation (if logging is enabled)
        /*
        $userid = $_COOKIE['userid'];
        $username = $_COOKIE['username'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
        $detalle = "Error - El usuario $username ha intentado ingresar el contacto $nombre a la empresa $empresa y ha fallado, el día $date_log a las " . date('h:i:s a') . ".";
        $id_sesion = $_COOKIE['session'];
        $stmt_log = $mysqli->prepare("INSERT INTO log (id_usuario, nombre_usuario, ip, hora, detalle, id_sesion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_log->bind_param("ssssss", $userid, $username, $ip, date("Y-m-d h:i:s"), $detalle, $id_sesion);
        $stmt_log->execute();
        $stmt_log->close();
        */

        // Redirect to the directory page with an error message
        echo '<script>
            window.parent.location = "directorio2.php?error=' . base64_encode("Ha fallado el ingreso del contacto. Intentelo de nuevo.") . '";
        </script>';
    }

    $stmt->close();
}

// Close the database connection
$mysqli->close();
?>
