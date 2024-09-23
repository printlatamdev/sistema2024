<html>
<head>
<style type="text/css">
body {
  font-family: Arial, Helvetica, Verdana;
  font-size: 14px;
  background-color: #FFFFFF;
  margin: 35px -5px 0 0;
} 

#note, #details {
  font-family: Arial, Helvetica, Verdana;
}

#details {
  font-size: 16px;
  line-height: 25px;
}
</style>
</head>
<body>

<?php
include('../esa_db.php');

$sql = "SELECT DISTINCT o.id_orden, o.empresa, o.fecha_orden, o.fecha_entrega, o.contacto, o.destino 
        FROM pop AS o, pop_detalle AS do 
        WHERE o.id_orden = do.id_orden AND o.id_orden = $id 
        ORDER BY o.id_orden";

$rs = $mysqli->query($sql);

while ($row2 = $rs->fetch_assoc()) {
    $id_orden = $row2['id_orden'];
    $empresa = $row2['empresa'];
    $destino = $row2['destino'];
    $contacto = ucwords($row2['contacto']);

    // Convert destination code to full country name
    $countryMapping = [
        "SV" => "EL SALVADOR",
        "GT" => "GUATEMALA",
        "CR" => "COSTA RICA",
        "NI" => "NICARAGUA",
        "HN" => "HONDURAS",
        "PN" => "PANAMA",
        "RD" => "R. DOMINICANA",
        "TT" => "T. Y TOBAGO",
        "BH" => "BAHAMAS"
    ];

    $destino = $countryMapping[$destino] ?? $destino;
?>

    <table border="0" width="95%" align="center" cellpadding="0" cellspacing="0" style="font-family: cursive; margin-top: 23px;">
        <tr>
            <td width="70%"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $empresa ?></b></td>
            <td width="30%"><b><?= date("j /n /Y"); ?></b></td>
        </tr>
        <tr>
            <td width="70%"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $destino ?></b></td>
            <td><b><?= $contacto ?></b></td>
        </tr>
    </table>

    <?php
    $top = $numero < 3 ? 70 : 20;
    ?>
    <table id="details" border="0" width="85%" align="right" cellpadding="0" cellspacing="7" style="font-family: cursive; text-align: justify; margin-top: <?= $top ?>px;">
        <?php
        for ($i = 1; $i <= $numero; $i++) {
            $item = "item" . $i;
            $cant = "cant" . $i;
            $det = "det" . $i;

            if (isset($_GET[$item])) {
                $sql = "SELECT do.base, do.altura, do.fondo, do.trabajo 
                        FROM pop_detalle AS do 
                        WHERE do.id_detalle_orden = '{$_GET[$item]}'";

                $registro = $mysqli->query($sql);

                while ($dato = $registro->fetch_assoc()) {
                    ?>
                    <tr>
                        <td width="2%" align="right"><b><?= $_GET[$cant] ?></b></td>
                        <td width="5%"></td>
                        <td width="150%">
                            <b><?= $dato['trabajo'] ?></b>, <?= $_GET[$det] ?>, 
                            Medida: <?= $dato['base'] ?>&nbsp;(base)&nbsp;x&nbsp;<?= $dato['altura'] ?>&nbsp;(altura)&nbsp;x&nbsp;<?= $dato['fondo'] ?>&nbsp;(fondo)CM.
                        </td>
                    </tr>
                    <?php
                }
            }
        }
        $mysqli->close();
        ?>
        <tr style="line-height: 3px;">
            <td width="2%" align="right"></td>
            <td width="5%"></td>
            <td width="150%"><b><br># Orden : <?= $_GET['idorden'] ?></b></td>
        </tr>
    </table>

    <table id="note" width="85%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr><td colspan="3">&nbsp;&nbsp;&nbsp;</td></tr>
        <tr><td colspan="3">&nbsp;&nbsp;&nbsp;</td></tr>
    </table>

<?php
}
?>

</body>
</html>
