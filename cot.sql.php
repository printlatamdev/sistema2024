<?php
session_start();
//include("session.php");
//exit();

$base = $_SESSION['base'];

(!isset($base) ? $base = $_POST['base'] : '');

include($base."_db.php");

//include("suministros/connect.php");


$bandera = $_POST['bandera'];


if ($bandera == 1) {


    $empresa = $_POST['empresa'];
    $nom_empresa = $_POST['nom_empresa'];
    $contacto = $_POST['contacto'];
    $nom_contacto = $_POST['nom_contacto'];
    $fecha = $_POST['fecha'];
    $vendedor = $_POST['vendedor'];
    $nom_vendedor = $_POST['nom_vendedor'];
    $nota = $_POST['nota'];
    $username = $_SESSION['username'];




    $rs = $mysqli->query("INSERT INTO cotizacion (id_contacto, contacto, fecha, nota, id_vendedor, vendedor, id_usuario, id_empresa, empresa, estado) VALUES ( '$contacto', '$nom_contacto', '$fecha', '$nota', '$vendedor', '$nom_vendedor', '$username', '$empresa', '$nom_empresa', 'Pendiente')");

    $order = $mysqli->insert_id;
    //echo $order;

    //****Bitacora del Sistema*******

    $ip = $_SERVER["REMOTE_ADDR"];

    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha creado Cotizacion Numero: <font color="red"><b>' . $order . '</b></font>.</br>Detalles: Cliente: <b>' . $nom_empresa . '</b>, Contacto: <b>' . $nom_contacto . '</b>, Vendedor: <b>' . $nom_vendedor . '</b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';


    $rs = $mysqli->query("INSERT INTO log_cotizacion( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

    //************************************

    header("Location: cot_detalle.php?orden=" . $order . "");
} elseif ($bandera == 2) {




    $orden = $_POST['orden'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];


    //$costo_total=$_POST['costo_total'];
    $costo_t = $cantidad * $precio_unitario;
    $costo_total = number_format($costo_t, 2, '.', '');

    $iva = $_POST['iva'];
    $detalle = $_POST['detalle'];
    $total_oferta = $_POST['total_oferta'];

    $textarea = str_replace("\n", "<br>", $detalle);


    $username = $_SESSION['username'];



    $rs = $mysqli->query("INSERT INTO `cotizacion_detalle`( `id_cotizacion`, `detalle`, `precio`, `cantidad`, `costo_total`, `iva`, `total_oferta`, `estado`) VALUES ('$orden','$textarea','$precio_unitario','$cantidad','$costo_total','$iva','$total_oferta','orden' )");
    $det = $mysqli->insert_id;
    //	$detalle= "El usuario ".$_SESSION['username']." a agregado un detalle a la Orden #<font color=red>".$orden."</font>  a las ".date('h:i:s a').".";

    //****Bitacora del Sistema*******

    $ip = $_SERVER["REMOTE_ADDR"];

    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha <font color="blue"><b>ingresado</b></font> un nuevo detalle a la Cotizacion Numero: <font color="red"><b>' . $orden . '</b></font>.</br></br><b>Detalle:</b><br> ' . $textarea . '<br><br>  <b>Cantidad:</b> <font color="blue"><b>' . $cantidad . '</b></font>, <b>Precio:</b> <font color="blue"><b>' . $precio_unitario . '</b></font></br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.<br><br>';


    $rs = $mysqli->query("INSERT INTO log_cotizacion( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

    //************************************





    //************************************
    echo $det;
} elseif ($bandera == 3) {



    $det = $_POST['det'];



    $rs = $mysqli->query("DELETE FROM `cotizacion_detalle` WHERE `id_detalle_cotizacion` = '$det'");





    echo 1;
} elseif ($bandera == 4) {


    $orden = $_POST['orden'];
    $id_detalle = $_POST['id_detalle'];
    $cantidad = $_POST['cantidad'];
    $costo_total = $_POST['costo_total'];
    $precio_unitario = $_POST['precio_unitario'];
    $iva = $_POST['iva'];
    $detalle = $_POST['detalle'];
    $total_oferta = $_POST['total_oferta'];
    $textarea = str_replace("\n", "<br>", $detalle);


    $rs = $mysqli->query("UPDATE `cotizacion_detalle` SET   `detalle`='$textarea', `precio`='$precio_unitario', `cantidad`='$cantidad', `costo_total`='$costo_total', `iva`='$iva', `total_oferta`='$total_oferta' WHERE id_detalle_cotizacion='$id_detalle'");


    // echo $id_detalle;

    //****Bitacora del Sistema*******

    $ip = $_SERVER["REMOTE_ADDR"];

    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha <font color="red"><b>modificado</b></font> un nuevo detalle de la Cotizacion Numero: <font color="red"><b>' . $orden . '</b></font>.</br></br><b>Detalle:</b><br> ' . $textarea . '<br><br>  <b>Cantidad:</b> <font color="blue"><b>' . $cantidad . '</b></font>, <b>Precio:</b> <font color="blue"><b>' . $precio_unitario . '</b></font></br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.<br><br>';


    $rs = $mysqli->query("INSERT INTO log_cotizacion( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

    //************************************

    header("Location: cot_detalle.php?orden=" . $orden . "");
} elseif ($bandera == 5) {

    $cot = $_POST['cot'];
    $empresa = $_POST['empresa'];
    $nom_empresa = $_POST['nom_empresa'];
    $contacto = $_POST['contacto'];
    $nom_contacto = $_POST['nom_contacto'];
    $fecha = $_POST['fecha'];
    $vendedor = $_POST['vendedor'];
    $nom_vendedor = $_POST['nom_vendedor'];
    $nota = $_POST['nota'];
    $username = $_SESSION['username'];

    $rs = $mysqli->query("UPDATE `cotizacion` SET `id_contacto`='" . $contacto . "', `contacto`='" . $nom_contacto . "', `fecha`='" . $fecha . "', `nota`='" . $nota . "',  `id_vendedor`='" . $vendedor . "', `vendedor`='" . $nom_vendedor . "', `id_usuario`='" . $username . "', `id_empresa`='" . $empresa . "', `empresa`='" . $nom_empresa . "', `estado`='Pendiente'  WHERE id_cotizacion='" . $cot . "'");


    //****Bitacora del Sistema*******

    $ip = $_SERVER["REMOTE_ADDR"];

    $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha editado la Cotizacion Numero: <font color="red"><b>' . $cot . '</b></font>.
                </br>Detalles:
                <br> Empresa: <b>' . $nom_empresa . '</b>, Contacto: <b>' . $nom_contacto . '</b>.
                <br> Fecha: <b>' . $fecha . '</b>, Vendedor: <b>' . $nom_vendedor . '</b>.
                <br> Nota: <b>' . $nota . '</b>.
                
                </br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';


    $rs = $mysqli->query("INSERT INTO log_cotizacion( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

    //************************************

    header("Location: cot_detalle.php?orden=" . $cot . "");
} elseif ($bandera == 6) {
} elseif ($bandera == 7) {
} elseif ($bandera == 8) {
} elseif ($bandera == 9) {
} elseif ($bandera == 10) {
} elseif ($bandera == 11) {
} elseif ($bandera == 12) {
} else {
}



$mysqli->close();
