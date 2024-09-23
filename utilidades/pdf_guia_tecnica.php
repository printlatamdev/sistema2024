<?php

use chillerlan\QRCode\QRCode;

include '../vendor/autoload.php';

session_start();
$base = $_SESSION['base'];
$anio = $_SESSION['anio'];
$bd = $base . $anio;

if (isset($_REQUEST['impresion']) && !empty($_REQUEST['impresion'])) {
    $imps = (new QRCode())->render($_REQUEST['impresion']);
}
if (isset($_REQUEST['corte']) && !empty($_REQUEST['corte'])) {
    $corte = (new QRCode())->render($_REQUEST['corte']);
}
$cantidad = $_REQUEST['cantidad'];
$pais = $_REQUEST['pais'];
$material = $_REQUEST['material'];
$maquina = $_REQUEST['maquina'];
$accesorios = $_REQUEST['accesorios'];
$cierre = $_REQUEST['cierre'];
$frente = $_REQUEST['frente'];
$profundidad = $_REQUEST['profundidad'];
$altura = $_REQUEST['altura'];
$accesorios = $_REQUEST['accesorios'];
?>
<html>

<head>
    <title>.:: Guia Tecnica de Impresion ::.</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <style>
        .table>tbody>tr>td {
            padding: 2px;
            text-align: center;
            font-size: 8pt;
        }

        th,
        td {
            width: 100px;
            word-wrap: break-word;
        }

        * {
            font-family: "Calibri", sans-serif;
            margin: 0;
            padding: 2mm;
        }

        .end-position {
            position: fixed;
            bottom: 50mm !important;
            left: 2mm;
            right: 2mm;
            height: 8mm;
        }

        a {
            margin-top: -15px !important;
        }

        thead {
            background: #0f547f;
        }

        table {
            font-size: 8pt;
        }

        .table>thead>tr>th {
            vertical-align: bottom;
            border-bottom: 0px;
            padding: 0px;
            text-align: center;
            font-weight: bold;
        }

        .info {
            font-size: 10pt !important;
            color: #555;
        }

        h6 {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        html {
            margin: 0;
        }

        body {
            margin: 8mm 8mm 8mm 8mm;
        }

        /**************************** */
        .sign>tbody>tr>td {
            height: 50px !important;
        }

        #inferior {
            position: fixed;
            left: 2mm;
            right: 2mm;
            bottom: 3mm;
            height: 50mm;
        }

        .box-imgs{
            display: inline-block;
            padding: 2px;
            box-sizing: border-box;
            width: 200mm;
            height: 124mm !important;
            margin-bottom: 5mm;
            text-align: center;
        }
        .box-imgs2{
            display: inline-block;
            padding: 2px;
            box-sizing: border-box;
            width: 200mm;
            height: 124mm !important;
            margin-bottom: 5mm;
            /* text-align: center; */
        }
        .box-imgs #img1 {
            position: static;
            transform: none;
            -o-object-fit: cover;
            object-fit: cover;
            /* text-align: center; */
            height: 100%;
        }
        .box-imgs #img2 {
            position: static;
            transform: none;
            -o-object-fit: cover;
            object-fit: cover;
            width: 50%;
            height: 100%;
        }
        .box-imgs #img3 {
            position: static;
            transform: none;
            -o-object-fit: cover;
            object-fit: fill;
            width: 33.3%;
            height: 100%;
        }
        .box-imgs #img4 {
            position: static;
            transform: none;
            -o-object-fit: cover;
            object-fit: cover;
            width: 24.5%;
            height: 100%;
        }
    </style>
</head>

<body>
    <!-- <footer style="text-align: center;"> -->
    <!-- </footer> -->
    <header style="text-align: center;">
        <h4 style="color:black;font-weight:bold;margin: 0mm;"><?= urldecode($_REQUEST['cliente']) ?></h4>
    </header>

    <main>
        <table class="table table-bordered" style="text-align:center;margin:0 0 -2mm 0 !important">
            <thead style="color:#fff">
                <tr>
                    <th>CANTIDAD</th>
                    <th>PAIS</th>
                    <th>MATERIAL</th>
                    <th>MAQUINA</th>
                    <th>ACCESORIOS</th>
                    <th>CIERRES</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $cantidad ?></td>
                    <td><?= $pais ?></td>
                    <td><?= $material ?></td>
                    <td><?= $maquina ?></td>
                    <td><?= $accesorios ?></td>
                    <td><?= $cierre ?></td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered" style="text-align:center">
            <thead style="color:#fff">
                <tr>
                    <th>FRENTE</th>
                    <th>ALTURA</th>
                    <th>PROFUNDIDAD</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $frente ?> cm</td>
                    <td><?= $altura ?> cm</td>
                    <td><?= $profundidad ?> cm</td>
                </tr>
            </tbody>
        </table>
        <!-----IMAGES ---->
        <div class="box-imgs">
            <?php
            $data = json_decode($_REQUEST['imagenes']);
            if(count($data)  == 1){
                foreach ($data as $key) {
                    echo "<img src='./guia_images/$key' style='margin:0;padding:1mm;' id='img1'>";
                    echo getimagesize('./guia_images/'.$key);
                }
            }else if(count($data) == 2){
                foreach ($data as $key) {
                    echo "<img src='./guia_images/$key' style='margin:0;padding:1mm;' id='img2'>";
                }
            }else if(count($data) == 3){
                foreach ($data as $key) {
                    echo "<img src='./guia_images/$key' style='margin:0;padding:1mm;' id='img3'>";
                }
            }else if(count($data) == 4){
                foreach ($data as $key) {
                    echo "<img src='./guia_images/$key' style='margin:0;padding:1mm;' id='img4'>";
                }
            }
            ?>
        </div>



        <!----QR---->
        <table class="table" style="text-align:center;margin: 0;">
            <thead style="color:#fff">
                <tr>
                    <th>RUTA DE IMPRESION</th>
                    <th>RUTA DE CORTE</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="padding:0">
                        <?php if (isset($imps) && !empty($imps)) : ?>
                            <img src="<?= $imps ?>" style='margin:0;padding: 0;' />
                        <?php endif; ?>
                    </td>
                    <td style="padding:0">
                        <?php if (isset($corte) && !empty($corte)) : ?>
                            <img src="<?= $corte ?>" style='margin:0;padding: 0;' />
                        <?php endif; ?>
                    </td>
                </tr>
            </tbody>
        </table>

        <!-- FIRMAS--->
        <div id='inferior'>
            <table class="table table-bordered sign" style="text-align:center;margin:0 0 -2mm 0 !important">
                <thead style="color:#fff">
                    <tr>
                        <th>VENTAS</th>
                        <th>SERVICIO AL CLIENTE</th>
                        <th>FACTURACION</th>
                        <th>JEFE PRODUCCION</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered sign" style="text-align:center;margin-bottom:-35px !important">
                <thead style="color:#fff">
                    <tr>
                        <th>DISEÑO</th>
                        <th>IMPRESION</th>
                        <th>CORTE</th>
                        <th>EMPAQUE</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <p style="font-size: 8pt;text-align:center;margin: -5mm 0 0;padding-left:2mm;padding-right:2mm;font-weight: bold;">*Al firmar, usted válida totalmente la información de esta ficha técnica, cualquier cambio que se genere luego de ser firmada. Es responsabilidad de quien ejecuto dicho cambio.*</p>
        </div>
    </main>

    <!-- <div style="page-break-after:always;"></div> -->
</body>

</html>