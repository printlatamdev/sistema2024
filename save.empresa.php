<?php

$pais = $_REQUEST['pais'];
include($pais . "_db.php");

$nombre = trim($_POST['nombre']);
$nombre = str_replace([".", ",", "-"], "", $nombre);
$upername = strtoupper($nombre);

// Use prepared statements to prevent SQL injection
$stmt = $mysqli->prepare("SELECT * FROM empresa WHERE nombre = ?");
$stmt->bind_param("s", $upername);
$stmt->execute();
$result = $stmt->get_result();
$rowcount = $result->num_rows;

if ($rowcount == 0) {
    $stmt = $mysqli->prepare("INSERT INTO empresa (nombre) VALUES (?)");
    $stmt->bind_param("s", $upername);
    $stmt->execute();

    if ($stmt->affected_rows == 1) {
        // Uncomment and adapt this section to log actions if needed
        /*
        $userid = $_COOKIE['userid'];
        $username = $_COOKIE['username'];
        $ip = $_SERVER["REMOTE_ADDR"];
        $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
        $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
        $detalle = "El usuario " . $username . " ha ingresado al sistema la empresa " . $upername . " el día " . $date_log . " a las " . date('h:i:s a') . ".";
        $id_sesion = $_COOKIE['session'];
        $stmt_log = $mysqli->prepare("INSERT INTO log (id_usuario, nombre_usuario, ip, hora, detalle, id_sesion) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt_log->bind_param("ssssss", $userid, $username, $ip, date("Y-m-d h:i:s"), $detalle, $id_sesion);
        $stmt_log->execute();
        */
        $stmt->close();
        $mysqli->close();
        ?>
        <script>
            window.parent.location = 'directorio2.php';
        </script>
        <?php
    } else {
        // Uncomment and adapt this section to log actions if needed
        /*
        $detalle = "Error - El usuario " . $username . " ha intentado ingresar la empresa " . $upername . " y ha fallado, el día " . $date_log . " a las " . date('h:i:s a') . ".";
        $stmt_log->bind_param("ssssss", $userid, $username, $ip, date("Y-m-d h:i:s"), $detalle, $id_sesion);
        $stmt_log->execute();
        */
        $stmt->close();
        $mysqli->close();
        ?>
        <script>
            window.parent.location = 'directorio2.php?error=<?= base64_encode("Ha fallado el ingreso de la empresa. Inténtelo de nuevo.") ?>';
        </script>
        <?php
    }
} else {
    $stmt->close();
    $mysqli->close();
    ?>
    <script>
        window.parent.location = 'directorio2.php?error=<?= base64_encode("La empresa ya existe.") ?>';
    </script>
    <?php
}
?>