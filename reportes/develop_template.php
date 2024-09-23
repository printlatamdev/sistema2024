<?php
$base = $_SESSION['base'];
// Establece la zona horaria para Hora Central de América
date_default_timezone_set('America/Guatemala');
// Obtén la fecha y hora actuales
$fechaActual = date('d/m/Y'); // Formato: Día/Mes/Año
$horaActual = date('g:i a'); // Formato: Hora:Minuto AM/PM
?>

<!DOCTYPE html>
<html>

<head>
    <title>.:: SISTEMA DE COTIZACIONES ::.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        /* General Styles */
        * {
            font-family: "Calibri", sans-serif !important;
        }

        html,
        body {
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
            font-size: 8pt !important;
            padding: 0;
            margin: 0;
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

        /* Marca de Agua */
        .watermark {
            position: fixed;
            bottom: 10mm;
            /* Ajusta según sea necesario */
            left: 10mm;
            /* Ajusta según sea necesario */
            opacity: 0.4;
            /* Transparencia de la marca de agua */
            z-index: -1;
            /* Envía la imagen al fondo */
        }

        /* Note Line */
        .note-line {
            position: fixed;
            bottom: 15mm;
            left: 8mm;
            width: 85%;
            border-radius: 0 25px 25px 0;
            padding: 2mm;
            color: #747474;
            font-size: 7.5pt;
            opacity: 0.7;
            background: #ebebeb;
        }

        .contenedor-firmas {
            width: 100%;
            border-collapse: collapse;
            position: absolute;
            bottom: 13%;
            /* Ajusta según la ubicación deseada respecto al pie de página */
            left: 0;
        }

        .columna-firma {
            text-align: center;
            width: 20%;
            /* Ajusta el ancho de las columnas para que quepan 5 en una fila */
            font-size: 9pt;
            color: #333;
        }

        .linea-azul {
            border-top: 2px solid #0f547f;
            /* Línea azul */
            height: 2mm;
            /* Altura de la celda, incluyendo la línea */
            page-break-inside: avoid;
            /* Evita saltos de página dentro de la celda */
            margin-left: 2mm;
            /* Adjust for left alignment */
            margin-right: 2mm;
            /* Adjust for right alignment */
        }

        .contenedor-firmas tr {
            page-break-inside: avoid;
            /* Evita que la fila se divida entre páginas */
        }
    </style>
</head>

<body>

    <!-- <header> -->
    <table style="table-layout:fixed;width:100%;">
        <tr>
            <th style="width:33.3%;">
                <?php echo $base == 'esa' ? '<img style="width:45mm;margin-left: -17mm;" src="data:image/jpeg;base64,' . base64_encode(file_get_contents('../imgs/logocd.jpg')) . '" />' : '<img style="width:45mm;margin-left: 0mm;" src="data:image/jpeg;base64,' . base64_encode(file_get_contents('../images/logos/rim-logo.jpg')) . '" />' ?>
            </th>
            <th style="width:33.3%;text-align:center;padding:0;">
                <h5 style="color:#0f547f;font-weight:bold;font-size:9pt">
                    <?php echo $base == 'esa' ? 'COLOR DIGITAL S.A DE C.V' : 'RIM DE CENTRO AMERICA S.A' ?>
                </h5>

                <?php echo $base == 'esa' ? '
                    <p style="color:#555;font-weight: bold;font-size:8pt;">Carretera a San Marcos #1810<br>
                    San Salvador - El Salvador- Centroamérica<br>
                    Teléfono: (503) 2213-5501</p>' : '<p style="color:#555;font-weight: bold;font-size:6pt;">De la rotonda el gueguense, 2 cuadras abajo,1 1/4 cuadra al lago.<br>
                    Casa mano izquierda numero 124 - Managua Nicaragua.<br>
                    Tel: 505-8257-7660</p>' ?>

            </th>
            <th style="width:33.3%;text-align: rigth;">
                <div>
                    <?php echo '<img style="width:35mm;" src="data:image/jpeg;base64,' . base64_encode(file_get_contents('../images/nota_envio/logo_envio.png')) . '" />' ?>
                </div>
            </th>
        </tr>
    </table>

    <!--COTIZACIION BLUE BOX--->
    <table style="table-layout: fixed; width: 100%; margin-top: 25px;margin-bottom:20px">
        <tr style="font-size: 12pt !important">
            <th style="width: 40%;">
                <p class="info"><strong>Cliente:
                        <?php echo ' ' . $empresa ?>
                    </strong></p>
                <p class="info"><strong>Contacto:
                        <?php echo ' ' . $contacto ?>
                    </strong></p>
                <p class="info"><strong>Pais:
                        <?php echo ' ' . $pais ?>
                    </strong></p>
            </th>
            <th style="width: 40%;">
                <p class="info"><strong>Nota de envio No.:
                        <?php echo !empty($telefono) ? ' ' . $telefono : 'NA' ?>
                    </strong></p>
                <p class="info"><strong>No. de OC:
                        <?php echo !empty($ordenCompra) ? ' ' . $ordenCompra : 'NA' ?>
                    </strong></p>
                <p class="info"><strong>No. de OP:
                        <?php echo !empty($idOrden) ? ' ' . $idOrden : 'NA' ?>
                    </strong></p>
            </th>
            <th style="width: 20%;">
                <p class="info">Fecha:
                    <?php echo ' ' . $fechaActual; ?>
                </p>
                <p class="info">Hora:
                    <?php echo ' ' . $horaActual; ?>
                </p>
            </th>
        </tr>
    </table>


    <?php
    // Verifica si los datos están presentes y si el array de ítems no está vacío
    if (empty($data)) {
        echo "<p class='error'>Error: No se han recibido datos para mostrar.</p>";
    } else {
        echo "<table>";
        echo "<thead style='color:#ffff;font-size:10pt'>
        <tr>
            <th style='width: 10%; text-align: center; border-right: 1px solid #000;'>Cantidad</th>
            <th style='width: 66%; text-align: center; border-right: 1px solid #000;'>Detalles</th>
            <th style='width: 33%; text-align: center;'>Recibido</th>
        </tr>
      </thead>";

        echo "<tbody>";
        foreach ($items as $item) {
            if (isset($item['cantidad'], $item['detalle'])) {
                echo "<tr style='height: 94px; border-bottom: 1px solid #0f547f;font-size:10pt'>
                      <td style='width: 10%; text-align: center; vertical-align: middle; border-right: 1px solid #0f547f;'>" . htmlspecialchars($item['cantidad']) . "</td>
                      <td style='width: 66%; text-align: justify; vertical-align: middle; padding: 6px; border-right: 1px solid #0f547f;'>" . htmlspecialchars($item['detalle']) . "</td>
                      <td style='width: 33%; text-align: center; vertical-align: middle;'>
                        Si__ No__  Comentario:<br><br>
                      </td>
                    </tr>";
            } else {
                echo "<tr style='border-bottom: 1px solid #0f547f;'>
                      <td colspan='3' style='text-align: center; color: red;'>Error: Datos incompletos para un ítem.</td>
                    </tr>";
            }
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?>
    <!-- Marca de Agua -->
    <img width="675"
        src="data:image/jpeg;base64,<?php echo base64_encode(file_get_contents('../images/nota_envio/icono.jpg')); ?>"
        class="watermark" />



    <!-- Tabla de firmas -->
    <table class="contenedor-firmas">
        <tr>
            <td class="columna-firma">
                <div class="linea-azul"></div>
                Firma Despacho
            </td>
            <td class="columna-firma">
                <div class="linea-azul"></div>
                Firma Recibe
            </td>
            <td class="columna-firma">
                <div class="linea-azul"></div>
                Nombre Recibe
            </td>
            <td class="columna-firma">
                <div class="linea-azul"></div>
                Hora & Fecha
            </td>
            <td class="columna-firma">
                <div class="linea-azul"></div>
                Sello
            </td>
        </tr>
    </table>

    <!-- Note Line -->
    <div class="note-line">
        <strong>NOTA:</strong>
        <br>
        1.Al firmar esta nota de envío, da por aceptado de forma satisfactoria el producto.
        <br>
        2.La Negativa u omision a completar todos los campos de recepcion no es responsabilidad de Color Digital y se da
        por recibido todo como satisfactorio.
    </div>


</body>

</html>