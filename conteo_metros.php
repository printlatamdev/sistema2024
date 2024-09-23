<?php
include("connectin.php");

$nivel = $_SESSION['nivel'];
$base = $_SESSION['base'];

$ordenes_campos = $ordenes_activas = $ordenes_finalizadas = $cotissv = 0;
$ordenes_activas_pop = $ordenes_finalizadas_pop = $totals = $totals_pop = 0;

if ($nivel == 1 || $nivel == 2 || $nivel == 3 || $nivel == 20) {
    if ($base == 'esa') {
        // Ordenes activas en 'campos'
        $rs7 = $mysqli->query("SELECT id_orden FROM campos WHERE estado='1'");
        $ordenes_campos = mysqli_num_rows($rs7);

        // Ordenes activas en 'orden'
        $rs1 = $mysqli->query("SELECT DISTINCT a.id_orden
                               FROM orden a
                               INNER JOIN orden_detalle b ON a.id_orden = b.id_orden
                               WHERE a.estado = '1'");
        $ordenes_activas = mysqli_num_rows($rs1);

        // Ordenes finalizadas en 'orden'
        $rs2 = $mysqli->query("SELECT DISTINCT a.id_orden
                               FROM orden a
                               INNER JOIN orden_detalle b ON a.id_orden = b.id_orden
                               WHERE a.estado = '0'");
        $ordenes_finalizadas = mysqli_num_rows($rs2);

        // Cotizaciones
        $rs3 = $mysqli->query("SELECT id_cotizacion FROM cotizacion ORDER BY id_cotizacion");
        $cotissv = mysqli_num_rows($rs3);
        if ($row3 = $rs3->fetch_assoc()) {
            $cotis = $row3['id_cotizacion'];
        }

        // Ordenes activas en 'pop'
        $rs5 = $mysqli->query("SELECT DISTINCT a.id_orden
                               FROM logitica b
                               INNER JOIN pop a ON b.id_orden = a.id_orden
                               INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto
                               WHERE a.estado = '1'");
        $ordenes_activas_pop = mysqli_num_rows($rs5);

        // Ordenes finalizadas en 'pop'
        $rs6 = $mysqli->query("SELECT DISTINCT a.id_orden
                               FROM logitica b
                               INNER JOIN pop a ON b.id_orden = a.id_orden
                               INNER JOIN pop_proyecto c ON a.id_proyecto = c.id_proyecto
                               WHERE a.estado = '0'");
        $ordenes_finalizadas_pop = mysqli_num_rows($rs6);

        // Cotizaciones en 'vyasal_cotizacion'
        $rs7 = $mysqli->query("SELECT id_cotizacion FROM vyasal_cotizacion ORDER BY id_cotizacion DESC LIMIT 1");
        if ($row7 = $rs7->fetch_assoc()) {
            $cotiv = $row7['id_cotizacion'];
        }

        // Total en 'orden_detalle'
        $sql = "SELECT * FROM orden_detalle
                WHERE estado <> 'ANULADA' AND trabajo <> 'CORTE DE POLIESTIRENO'
                AND trabajo <> 'TOLDO' AND trabajo <> 'CORTE'";
        $rs4 = $mysqli->query($sql);
        while ($row4 = $rs4->fetch_assoc()) {
            $base = isset($row4['base']) ? floatval($row4['base']) : 0;
            $altura = isset($row4['altura']) ? floatval($row4['altura']) : 0;
            $tt1 = $base * $altura;
            $tt2 = isset($row4['cantidad']) ? floatval($row4['cantidad']) * $tt1 : 0;

            if ($row4['tiro'] != 'Tiro') {
                $tt2 *= 2;
            }
            $totals += $tt2;
        }

        // Total en 'pop_pliego'
        $sql5 = "SELECT * FROM pop_pliego
                 WHERE estado <> 'ANULADA' AND pliego <> 'CORTE' AND equipo <> 'ESKO'";
        $rs5 = $mysqli->query($sql5);
        while ($row5 = $rs5->fetch_assoc()) {
            $base = isset($row5['base']) ? floatval($row5['base']) : 0;
            $altura = isset($row5['altura']) ? floatval($row5['altura']) : 0;
            $ttp1 = $base * $altura;
            $ttp2 = isset($row5['cantidad']) ? floatval($row5['cantidad']) * $ttp1 : 0;

            if ($row5['tiro'] != 'Tiro') {
                $ttp2 *= 2;
            }
            $totals_pop += $ttp2;
        }
    } else {
        // Ordenes activas en 'orden'
        $rs1 = $mysqli->query("SELECT id_orden FROM orden WHERE estado = '1'");
        $ordenes_activas = mysqli_num_rows($rs1);

        // Ordenes finalizadas en 'orden'
        $rs2 = $mysqli->query("SELECT id_orden FROM orden WHERE estado = '0'");
        $ordenes_finalizadas = mysqli_num_rows($rs2);

        // Cotizaciones
        $rs3 = $mysqli->query("SELECT id_cotizacion FROM cotizacion ORDER BY id_cotizacion");
        $cotissv = mysqli_num_rows($rs3);
        if ($row3 = $rs3->fetch_assoc()) {
            $cotis = $row3['id_cotizacion'];
        }

        // Ordenes activas en 'pop'
        $rs5 = $mysqli->query("SELECT id_orden FROM pop WHERE estado = '1'");
        $ordenes_activas_pop = mysqli_num_rows($rs5);

        // Ordenes finalizadas en 'pop'
        $rs6 = $mysqli->query("SELECT id_orden FROM pop WHERE estado = '0'");
        $ordenes_finalizadas_pop = mysqli_num_rows($rs6);

        // Ordenes activas en 'campos'
        $rs7 = $mysqli->query("SELECT id_orden FROM campos WHERE estado = '1'");
        $ordenes_campos = mysqli_num_rows($rs7);

        // Total en 'orden_detalle'
        $sql = "SELECT * FROM orden_detalle
                WHERE estado <> 'ANULADA' AND trabajo <> 'CORTE DE POLIESTIRENO'
                AND trabajo <> 'TOLDO' AND trabajo <> 'CORTE'";
        $rs4 = $mysqli->query($sql);
        while ($row4 = $rs4->fetch_assoc()) {
            $base = isset($row4['base']) ? floatval($row4['base']) : 0;
            $altura = isset($row4['altura']) ? floatval($row4['altura']) : 0;
            $tt1 = $base * $altura;
            $tt2 = isset($row4['cantidad']) ? floatval($row4['cantidad']) * $tt1 : 0;

            if ($row4['tiro'] != 'Tiro') {
                $tt2 *= 2;
            }
            $totals += $tt2;
        }

        // Total en 'pop_pliego'
        $sql5 = "SELECT (cantidad * ((base / 100) * (altura / 100))) as total_pop
                 FROM pop_pliego
                 WHERE estado <> 'ANULADA' AND pliego <> 'CORTE' AND equipo <> 'ESKO'";
        $rs5 = $mysqli->query($sql5);
        while ($row5 = $rs5->fetch_assoc()) {
            $totals_pop += isset($row5['total_pop']) ? floatval($row5['total_pop']) : 0;
        }
    }
}
?>
