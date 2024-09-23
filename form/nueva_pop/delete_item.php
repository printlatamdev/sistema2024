<?php

    include("../../connectin.php");
    $sql = "DELETE FROM orden_detalle WHERE id_detalle_orden='".$_GET["id"]."'";
    $mysqli->query($sql);

    echo'<script type="text/javascript">
        window.location.href="../../lista_po_nuevo.php";
        alert("datos eliminados exitosamente");
    </script>';   

?>