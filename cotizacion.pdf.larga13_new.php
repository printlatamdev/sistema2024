<?php
session_start();
$base = $_SESSION['base'];
$anio = $_SESSION['anio'];
$bd = $base . $anio;
$value_iva = $_REQUEST['iva'];
$currency = $_REQUEST['currency'];
?>
<html>

<head>
    <title>.:: SISTEMA DE COTIZACIONES ::.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    /* General Styles */
* {
    font-family: "Calibri", sans-serif !important;
}

html, body {
    margin: 0;
    padding: 0;
}

body {
    margin: 10mm 8mm 5mm 8mm;
}

/* Page Break */
.pagebreak {
    page-break-after: always;
}

/* Footer */
footer {
    position: fixed;
    bottom: 7mm;
    left: 8mm;
    right: 8mm;
    height: 9mm;
}

/* Links */
a {
    margin-top: -15px !important;
}

/* Centered Content with a Border */
.center {
    border-left: 1px solid #0f547f !important;
    color: #000;
}

/* Table Styles */
table {
    font-size: 8pt;
    width: 100%;
    border-collapse: collapse;
}

thead {
    background: #0f547f;
    text-align: center;
}

.table>thead>tr>th {
    vertical-align: bottom;
    border-bottom: 1pt solid #000;
    padding: 0;
    text-align: center;
    font-weight: bold;
}

/* Specific Table Styles */
.table-color {
    border-bottom: 1px solid #0f547f !important;
    text-align: center;
}

.info {
    font-size: 9pt !important;
    text-align: left;
    color: #555;
}

/* Header Styles */
h6 {
    margin-top: 5px;
    margin-bottom: 5px;
}

/* Special Container for Styling Specific Sections */
.lines-content {
    border: 5px solid #ff0033;
}

/* Specific Styling for COT Data */
#cot_data_stl {
    background: #0f547f;
    color: #fff !important;
    padding: 2mm 3mm;
    width: 40mm;
    font-size: 9pt !important;
    float: right;
    font-weight: bold;
    margin-left: 18mm;
    text-align: center;
    margin-top: -2%;
}

.total-cost-table {
    page-break-inside: avoid;
}


    </style>
</head>

<body>
    <footer style="text-align: center;">
        <hr>
    <?php
    $img_carta = 'imgs/carta.jpg'; // Your image path
    $base64_carta = getBase64Image($img_carta);

    $img_world = 'imgs/world.jpg'; // Your image path
    $base64_world = getBase64Image($img_world);
    ?>


   <a href="" style="text-decoration:none;font-size:8pt">
        <img src="<?php echo $base64_carta; ?>" width="15px" style="margin-top:3mm;">
         info@printlatam.com
    </a>
    <a href="" style="text-decoration:none;font-size:8pt">
        <img src="<?php echo $base64_world; ?>" width="15px" style="margin-top:3mm;">
        printlatam.com - <?php echo $_REQUEST['bss'] == 'esa' ? 'El Salvador' : 'Nicaragua'  ?>
    </a>


    </footer>

    <?php
    $host = "localhost";
    $database = $_REQUEST['bs'];
    $ano = $_REQUEST['ano'];
    $username = "root";
    $password = "";



    $mysqli = new mysqli($host, $username, $password, $database);
    if ($mysqli->connect_errno) {
        echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    }


    if (isset($_REQUEST['id'])) {
        $id = trim($_REQUEST['id']);
        $rs = $mysqli->query("SELECT * FROM cotizacion WHERE id_cotizacion='$id'");

        while ($row = $rs->fetch_assoc()) {
            $contacto = $row['contacto'];
            $id_contacto = $row['id_contacto'];
            $fecha = $row['fecha'];
            $nota = $row['nota'];
            $vendedor = $row['vendedor'];
            $cliente = $row['empresa'];
            $incoterm = !empty($row['incoterm']) ? $row['incoterm'] : 'N/A';
            $condiciones = !empty($row['condicion_de_pago']) ? $row['condicion_de_pago'] : 'N/A';
            $validez = !empty($row['validez_oferta']) ? $row['validez_oferta'] : 'N/A';
            $moneda_tipo = !empty($row['moneda']) ? $row['moneda'] : 'N/A';
        }


        $rs4 = $mysqli->query("SELECT * FROM contacto WHERE id_contacto='$id_contacto'");
        while ($row4 = $rs4->fetch_assoc()) {
            $celular = $row4['celular'];
            $telefono = $row4['telefono'];
            $email = $row4['email'];
            $ciudad = $row4['ciudad'];
        }
    }
    ?>

    <!-- <header> -->
    <table style="table-layout:fixed;width:100%;">
        <tr>
            <th style="width:33.3%;">
                <?php echo $_REQUEST['bss'] == 'esa' ? '<img style="width:45mm;margin-left: -17mm;" src="data:image/jpeg;base64,' . base64_encode(file_get_contents('imgs/logocd.jpg')) . '" />' : '<img style="width:45mm;margin-left: 0mm;" src="data:image/jpeg;base64,' . base64_encode(file_get_contents('images/logos/rim-logo.jpg')) . '" />'  ?>
            </th>
            <th style="width:33.3%;text-align:center;padding:0;">
                <h5 style="color:#0f547f;font-weight:bold;font-size:8pt">
                    <?php echo $_REQUEST['bss'] == 'esa' ? 'COLOR DIGITAL S.A DE C.V' : 'RIM DE CENTRO AMERICA S.A' ?>
                </h5>

                <?php echo $_REQUEST['bss'] == 'esa' ? '
                    <p style="color:#555;font-weight: bold;font-size:8pt;">Carretera a San Marcos #1810<br>
                    San Salvador - El Salvador- Centroamérica<br>
                    Teléfono: (503) 2213-5501</p>' : '<p style="color:#555;font-weight: bold;font-size:6pt;">De la rotonda el gueguense, 2 cuadras abajo,1 1/4 cuadra al lago.<br>
                    Casa mano izquierda numero 124 - Managua Nicaragua.<br>
                    Tel: 505-8257-7660</p>' ?>

            </th>
            <th style="width:33.3%;text-align: justify;">
                <div id="cot_data_stl" style="margin-top: 10pt;">
                    <h6  style="font-size: 8pt;">Cotización:
                        <?php echo ' ' . $id . '-' . date('y'); ?>
                    </h6>
                    <h6  style="font-size: 8pt;">Fecha:
                        <?php echo ' ' . date("Y-m-d"); ?>
                    </h6>
                </div>
            </th>
        </tr>
    </table>

    <!-- </header> -->
<!--COTIZACIION BLUE BOX--->
<table style="table-layout: fixed; width: 100%; margin-top: 25px;">
    <tr style="font-size: 12pt !important">
        <th style="width: 40%;">
            <p class="info"><strong>Cliente:<?php echo ' ' . $cliente ?></strong></p>
            <p class="info"><strong>Atención:<?php echo ' ' . $contacto ?></strong></p>
        </th>
        <th style="width: 40%;">
            <p class="info"><strong>Teléfono:<?php echo !empty($telefono) ? ' ' . $telefono : 'NA' ?></strong></p>
            <p class="info"><strong>Email:<?php echo !empty($email) ? ' ' . $email : 'NA' ?></strong></p>
        </th>
        <th style="width: 20%;">
            <p class="info">País:<?php echo ' ' . $ciudad; ?></p>
            <p class="info"><?php echo !empty($incoterm) ? 'Incoterm: ' . $incoterm : ' ' ?></p>
        </th>
    </tr>
</table>


    <table class="table table-sm table-color" style="margin-top: 5mm; margin-bottom: 2mm; border-collapse: collapse;">
        <thead style="color: #fff !important; font-weight: bold !important;">
            <tr>
                <th scope="col" style="width: 15%; text-align: center; border-right: 1px solid #0f547f;">
                    <h6>PRODUCTO</h6>
                </th>
                <th scope="col" style="width: 55%; text-align: center; border-right: 1px solid #0f547f;">
                    <h6>DESCRIPCIÓN</h6>
                </th>
                <th scope="col" style="width: 10%; text-align: center; border-right: 1px solid #0f547f;">
                    <h6>CANTIDAD</h6>
                </th>
                <th scope="col" style="width: 10%; text-align: center; border-right: 1px solid #0f547f;">
                    <h6>UNITARIO</h6>
                </th>
                <th scope="col" style="width: 10%; text-align: center;">
                    <h6>TOTAL</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total = 0;
            $rs = $mysqli->query("SELECT * FROM cotizacion_detalle WHERE id_cotizacion='$id' ORDER BY id_detalle_cotizacion ASC");
            $items_number = $rs->num_rows;

            while ($row = $rs->fetch_assoc()) {
                $cantidad = $row['cantidad'];
                $precio = $row['precio'];
                $producto = $row['producto'];

                // Imagen de Producto desde DB
                $img_product = $row['image'];
                $image_folder = 'item_' . $id . '_cot';
                $image_path = "./item_cot_images/$image_folder/$img_product";
                $src_image ='';
                // Verifica si el archivo existe
                if (file_exists($image_path)) {
                    $src_image = $image_path;
                } else {
                    // Si el archivo no existe, usa la imagen por defecto
                    $src_image = "./imgs/na.jpg";
                }

                $precio_formateado = number_format($precio, 2, '.', ',');



                // Asegúrate de que $src_image contiene la ruta de la imagen que deseas convertir a base64
                $base64_image = getBase64Image($src_image);

                $costo_t = $cantidad * $precio;
                $costo_total = number_format($costo_t, 2, '.',  ',');
                $total += $costo_t;

                $subject = $row['detalle'];
                $desc_length = strlen($row['detalle']);
                $search = array('<div>', '</div>', '<span>', '</span>');
                $replace = array('', '', '', '');
                $detalle = str_replace($search, $replace, $subject);


                echo "<tr style='height: 94px; border-bottom: 1px solid #0f547f;'>
                        <td style='width: 15%; text-align: center; vertical-align: middle; border-right: 1px solid #0f547f;'>
                            <img src='$base64_image' width='63' height='63'/>
                            <p style='font-size: 5pt; margin: 0;'>$producto</p>
                        </td>
                        <td style='width: 55%; text-align: justify; vertical-align: middle; padding: 6px; border-right: 1px solid #0f547f;'>$detalle</td>
                        <td style='width: 10%; text-align: center; vertical-align: middle; border-right: 1px solid #0f547f;'>$cantidad</td>
                        <td style='width: 10%; text-align: right; vertical-align: middle; border-right: 1px solid #0f547f; padding-right: 2mm;'> $currency $precio_formateado</td>
                        <td style='width: 10%; text-align: right; vertical-align: middle; padding-right: 2mm;'> $currency $costo_total</td>


                    </tr>";
            }

            // Calculate subtotal, IVA, and total offer
            if (!isset($total) || !is_numeric($total)) {
                $total = 0;
            }
            if (!isset($value_iva) || !is_numeric($value_iva)) {
                $value_iva = 0;
            }

            $sub_total = number_format($total, 2, '.',  ',');
            $iv = $value_iva * $total;
            $iva = number_format($iv, 2, '.',  ',');
            $tf = $total + $iv;
            $total_oferta = number_format($tf, 2, '.',  ',');
            $percent = $value_iva * 100;

            // Initialize flete and dai if they are used later
            $flete = isset($flete) ? $flete : ''; // Ensure $flete is defined
            $dai = isset($dai) ? $dai : ''; // Ensure $dai is defined

            // Close database connection
            $mysqli->close();
            ?>
        </tbody>
    </table>




        <div>
            <style>
                .font {
                    font-size: 8pt;
                    margin: 3px;
                    text-align: justify;
                }

                hr {
                    border-top: 1px solid #0f547f;
                }
            </style>
            <!-- <p class="font"><strong>Aceptacion:</strong>
                Se da por entendido que al autorizar la presente cotizaci&oacute;n, el cliente esta de acuerdo con los
                Costos detallados, siendo el documento legal para su correspondiente cobro.
            </p> -->
            <p class="font"><strong>Precios:</strong>
                <?php
                switch ($incoterm) {
                    case 'EXW':
                        echo '<strong>_<u>X</u>_ EXW ____ FOB ____ CIF ____ DAP ____ DDP</strong>';
                        break;
                    case 'FOB':
                        echo '<strong>___ EXW _<u>X</u>_ FOB ____ CIF ____ DAP ____ DDP</strong>';
                        break;
                    case 'CIF':
                        echo '<strong>___ EXW ____ FOB _<u>X</u>_ CIF ____ DAP ____ DDP</strong>';
                        break;
                    case 'DAP':
                        echo '<strong>___ EXW ____ FOB ____ CIF _<u>X</u>_ DAP ____ DDP</strong>';
                        break;
                    case 'DDP':
                        echo '<strong>___ EXW ____ FOB ____ CIF ____ DAP _<u>X</u>_ DDP</strong>';
                        break;
                    default:
                        echo '<strong>___ EXW ____ FOB ____ CIF ____ DAP ___ DDP</strong>';
                        break;
                }
                ?>
            </p>
        </div>
        <?php 
        $should_break = ($items_number == 5 && $desc_length >= 270) || 
                        ($items_number == 6) || 
                        ($items_number == 12 && $desc_length >= 270) || 
                        ($items_number == 15 && $desc_length >= 270) || 
                        $items_number == 18  || 
                        $items_number == 24 || 
                        $items_number == 30;

        echo $should_break ? '<div style="page-break-before:always;"></div>' : '';
        ?>

<div style="margin-top:5mm;margin-bottom: 2mm;" id='table-to-img'>
    <table class="table table-color total-cost-table">
        <thead style="color: #fff !important;font-weight: bold !important;height: fit-content;">
            <tr>
                <th scope="col">
                    <h6>AUTORIZADO</h6>
                </th>
                <th scope="col">
                    <h6>TOTALIZACIÓN DE COSTOS</h6>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td style="text-align: left;color:#555 !important;font-size:11pt;">
                    <h6>Atención al Cliente:</h6>
                    <br><br>
                    <h6>
                        Vendedor: <?php echo ' ' . $vendedor ?>
                        <div style="text-align:right;margin-top:-27px;padding:0">
                            <hr style="text-align:center;width:44%;margin:0;float:right !important;margin-left:55%;margin-bottom:-25px !important;display:none;" size='3'>
                            <br>
                            <p>Firma y nombre autorizado cliente.</p>
                        </div>
                    </h6>
                </td>
                <td class="center">
                    <div style="text-align:right !important;color:#555 !important;">
                        <h6 style="font-size:9pt !important;">SUB TOTAL <?php echo !empty($sub_total) ? ' ' . $currency . ' ' . $sub_total : '-' ?></h6>
                        <h6><?php echo !!$flete ? 'FLETE'.' ' . $currency . ' ' . $flete : '' ?></h6>
                        <h6 style="font-size:9pt !important;">IVA (<?php echo $percent . '%' ?>) <?php echo  ' ' . $currency . ' ' . $iva ?></h6>
                        <h6><?php echo !!$dai ? 'IMPUESTOS (DAI)'.' ' . $currency . ' ' . $dai : '' ?></h6>
                        <br>
                        <h6 style="font-size:10pt">
                            <strong>TOTAL <?php echo isset($total) ? ' ' . $currency . ' ' .  $total_oferta : '-' ?></strong>
                        </h6>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <br>
    <p class="font">
        <?php echo !empty($nota) ? '<strong>Observaciones:</strong>' . $nota : '--' ?>
    </p>
    <p class="font">
        <?php echo !empty($condiciones) ? '<strong>Condiciones de Pago:</strong>' . $condiciones . '|' : '' ?>
        <?php echo !empty($validez) ? '<strong>Validez de Oferta:</strong> ' . $validez .'|' : '' ?>
        <?php echo !empty($moneda_tipo) ? '<strong>Precios en:</strong>' . $moneda_tipo : '' ?>
    </p>
</div>

    </main>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    // Page height in px
    const pageHeight = 1000;
    let thisPageTotal = 0;

    document.querySelectorAll('.coupon').forEach(function(el) {
        // Calculate the height of the element
        const layout = el.getBoundingClientRect();
        const elementHeight = layout.height;

        thisPageTotal += elementHeight;

        if (thisPageTotal > pageHeight) {
            thisPageTotal = elementHeight; // Reset for new page
            const pageBreak = document.createElement('div');
            pageBreak.classList.add('pagebreak');
            el.parentNode.insertBefore(pageBreak, el);
        }

        // Debugging output
        console.log(`Element height: ${elementHeight}px`);
        console.log(`Total height on this page: ${thisPageTotal}px`);
    });
});

<?php
function getBase64Image($path) {
    $type = pathinfo($path, PATHINFO_EXTENSION);
    $data = file_get_contents($path);
    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
    return $base64;
}
?>

</script>
</body>
</html>
