<?php

include("connect.php");
include("session.php");

$validacion = $_POST["leer"];
$fechaleido = date('d/m/Y h:i:s a');
$imbox = $_POST["inbox"];

$res = $mysqli->query("UPDATE anuncio SET estado='$validacion', fecha_leido='$fechaleido' WHERE anuncio='$imbox'");

if ($res) {
    echo '<script type="text/javascript">
        alert("Gracias por confirmar que lo leíste.");
        window.location.href="../index.php";
    </script>';
} else {
    echo '<script type="text/javascript">
        alert("Hubo un problema al actualizar el anuncio. Inténtalo de nuevo.");
        window.location.href="../index.php";
    </script>';
}

?>
