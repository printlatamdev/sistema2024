<?php
session_start();
$imagePath = '../imgs/logocd.jpg';
$imageData = base64_encode(file_get_contents($imagePath));
$src = 'data:image/jpeg;base64,' . $imageData;
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: SISTEMA DE SUMINISTROS ::.</title>
    <style>
        body {
            margin: 0;
            font-family: Verdana, sans-serif;
            font-size: 10px;
            color: #000;
            table-layout: fixed;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #000;
            padding: 5px;
            text-align: center;
        }

        .header-img {
            width: 350px;
        }

        .font-small {
            font-size: 7pt;
        }

        .font-medium {
            font-size: 8pt;
        }

        .font-large {
            font-size: 10pt;
        }

        .bold {
            font-weight: bold;
        }

        td {
            padding: 0;
        }
    </style>
</head>

<body>
    <?php
    $host = "localhost";
    $database = "esa22";
    $username = "admin";
    $password = "AG784512";

    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        die("No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
    }

    if (isset($_REQUEST['id'])) {
        $id = trim($_REQUEST['id']);
        $ano = date("y"); // Year for the quotation
    
        // Fetching order details
        $rs = $mysqli->query("SELECT * FROM compra WHERE id_compra='$id'");
        if (!$rs) {
            die("Error en la consulta: " . $mysqli->error);
        }

        $order = $rs->fetch_assoc();
        if ($order) {
            $id_empresa = $order['id_empresa'];
            $empresa = $order['empresa'];
            $solicita = $order['solicita'];
            $fecha = $order['fecha'];
            $op = $order['op'];
        } else {
            die("No se encontró la orden con ID: $id");
        }

        // Fetching credit type
        $rs_credito = $mysqli->query("SELECT credito FROM proveedor WHERE id_proveedor='$id_empresa'");
        if (!$rs_credito) {
            die("Error en la consulta de proveedor: " . $mysqli->error);
        }

        $credito = $rs_credito->fetch_assoc()['credito'];
    }
    ?>

    <table>
        <tr>
            <td width="65%" height="50" align="center">
                <img src="<?php echo $src; ?>" class="header-img" alt="Logo" style="width: 100px;">
            </td>
            <td width="20%" align="center">
                <span class="font-medium bold">ORDEN No.</span>
            </td>
            <td width="15%" align="center">
                <span class="font-large bold"><?= htmlspecialchars($id) ?></span>
            </td>
        </tr>
    </table>

    <br>

    <table>
        <tr>
            <td width="10%" height="15" align="center">
                <span class="font-small bold">FECHA</span>
            </td>
            <td width="35%" align="center">
                <span class="font-small bold">PROVEEDOR</span>
            </td>
            <td width="40%" align="center">
                <span class="font-small bold">SOLICITADO POR</span>
            </td>
            <td width="15%" align="center">
                <span class="font-small bold">OP</span>
            </td>
        </tr>
        <tr>
            <td align="center"><?= htmlspecialchars($fecha) ?></td>
            <td align="center"><?= htmlspecialchars($empresa) ?></td>
            <td align="center"><?= htmlspecialchars($solicita) ?></td>
            <td align="center"><?= htmlspecialchars($op) ?></td>
        </tr>
    </table>

    <br>

    <table>
        <tr style="padding: 0;">
            <td width="55%" height="30" align="center">
                <span class="font-small bold">ESPECIFICACION DE MATERIAL</span>
            </td>
            <td width="15%" align="center">
                <span class="font-small bold">CANTIDAD</span>
            </td>
            <td width="15%" align="center">
                <span class="font-small bold">P. UNIT</span>
            </td>
            <td width="15%" align="center">
                <span class="font-small bold">C. TOTAL</span>
            </td>
        </tr>

        <?php
        $total = 0;
        $lineas = 0;
        $sub_total = 0;

        $rs = $mysqli->query("SELECT * FROM compra_detalle WHERE id_compra='$id' ORDER BY id_detalle_compra");
        if (!$rs) {
            die("Error en la consulta de detalles: " . $mysqli->error);
        }

        while ($row = $rs->fetch_assoc()) {
            $cantidad = $row['cantidad'];
            $precio = $row['precio'];
            $material = str_replace("Varios -", "", $row['material']);

            $sub = $cantidad * $precio;
            $sub_total += $sub;

            $material_font_size = strlen($material) >= 57 ? 'font-small' : 'font-medium';
            // Encontrar la posición del primer guion
            $posicionGuion = strpos($material, '-');

            // Si se encuentra un guion, cortar la cadena desde esa posición hasta el final
            if ($posicionGuion !== false) {
                $material = substr($material, $posicionGuion + 1); // +1 para omitir el guion mismo
            }

            // Eliminar posibles espacios en blanco al principio y al final
            $material = trim($material);



            echo "<tr>
                    <td height='15' width='55%'><span class='{$material_font_size}'>" . htmlspecialchars($material) . "</span></td>
                    <td align='center' width='15%'><span class='font-medium'>" . number_format($cantidad, 0, '', ',') . "</span></td>
                    <td align='center' width='15%'><span class='font-medium'>$" . number_format($precio, 2, '.', ',') . "</span></td>
                    <td align='center' width='15%'><span class='font-medium bold'>$" . number_format($sub, 2, '.', ',') . "</span></td>
                </tr>";

            $lineas++;
        }

        // Add empty rows if there are fewer lines than required
        $lineas_faltan = max(0, 9 - $lineas);
        for ($i = 0; $i < $lineas_faltan; $i++) {
            echo "<tr>
                    <td height='15' width='55%'></td>
                    <td align='center' width='15%'></td>
                    <td align='center' width='15%'></td>
                    <td align='center' width='15%'></td>
                </tr>";
        }

        $iva = ($_REQUEST['iva'] == 0) ? 0.0 : 0.13 * $sub_total;
        $total_oferta = number_format($sub_total + $iva, 2, '.', ',');

        echo "<tr>
        
                <td valign='top' colspan='2' rowspan='3' height='12' style='text-align:left:margin-left:5%;'>
                    <span class='font-small bold'>Nota:</span> La orden de compra solo es válida con firma y sello.<br>
                    <span class='font-small bold'>Forma de pago:</span> " . htmlspecialchars($credito) . "
                </td>
                <td align='center'><span class='font-medium bold'>Subtotal</span></td>
                <td align='center'><span class='font-medium bold'>$" . number_format($sub_total, 2, '.', ',') . "</span></td>
              </tr>
              ";

        echo "<tr>
                <td align='center'>IVA</td>
                <td align='center'>$" . number_format($iva, 2, '.', ',') . "</td>
              </tr>";

        echo "<tr>
                <td align='center'>Total</td>
                <td align='center'>$" . $total_oferta . "</td>
              </tr>";

        $mysqli->close();
        ?>
    </table>
</body>

</html>