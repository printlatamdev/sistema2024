<?php
// // Enable error reporting
// error_reporting(E_ALL);
// ini_set('display_errors', '1');

session_start();
$base = $_SESSION['base'];
$usuario = $_SESSION['vsNombre'];
// Include database connection
require('../'.$base . "_db.php");

// Helper function to log actions
function log_action($mysqli, $username, $message) {
    $ip = $_SERVER["REMOTE_ADDR"];
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . " a las " . date('h:i:s a');

    $detalle = "<br><font color='blue'>$username</font> ha $message El día $date_log desde la IP $ip.</br>";
    $stmt = $mysqli->prepare("INSERT INTO log_cotizacion (usuario, ip, hora, detalle) VALUES (?, ?, NOW(), ?)");
    $stmt->bind_param("sss", $username, $ip, $detalle);
    $stmt->execute();
}

// Handle different cases
$bandera = isset($_POST['bandera']) ? $_POST['bandera'] : null;
$username = $_SESSION['username'];

if ($bandera == 1) {
    // Insert new quotation
    $empresa = $_POST['empresa'];
    $nom_empresa = $_POST['nom_empresa'];
    $contacto = $_POST['contacto'];
    $nom_contacto = $_POST['nom_contacto'];
    $fecha = $_POST['fecha'];
    $vendedor = $_POST['vendedor'];
    $nom_vendedor = $_POST['nom_vendedor'];
    $nota = $_POST['nota'];
    $incoterm = $_POST['incoterm'];

    $stmt = $mysqli->prepare("INSERT INTO cotizacion (id_contacto, contacto, fecha, nota, incoterm, id_vendedor, vendedor, id_usuario, id_empresa, empresa, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pendiente')");
    $stmt->bind_param("isssssssss", $contacto, $nom_contacto, $fecha, $nota, $incoterm, $vendedor, $nom_vendedor, $usuario , $empresa, $nom_empresa);
    if ($stmt->execute()) {
        $order = $mysqli->insert_id;
        log_action($mysqli, $username, "creado Cotización Número: <font color='red'><b>$order</b></font> Detalles: Cliente: <b>$nom_empresa</b>, Contacto: <b>$nom_contacto</b>, Vendedor: <b>$nom_vendedor</b>.");
        header("Location: ./../cot_detalle_new.php?orden=$order");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
} elseif ($bandera == 2) {
    // Insert new quotation detail
    $orden = $_POST['orden'];
    $cantidad = $_POST['cantidad'];
    $precio_unitario = $_POST['precio_unitario'];
    $producto = $_POST['producto'];
    $detalle = $_POST['detalle'];
    $iva = $_POST['iva'];
    $total_oferta = $_POST['total_oferta'];

    $costo_total = number_format($cantidad * $precio_unitario, 2, '.', '');
    $textarea = str_replace("\n", "<br>", $detalle);
    $item = "item_" . $orden . "_" . mt_rand(0, 99000) . ".jpg";
    $imagenes_cot_folder = './item_cot_images/item_' . $orden . '_cot/';

    if (!file_exists($imagenes_cot_folder)) {
        mkdir($imagenes_cot_folder, 0777, true);
    }

    $destino = $imagenes_cot_folder . $item;
    if (move_uploaded_file($_FILES['file']['tmp_name'], $destino)) {
        $stmt = $mysqli->prepare("INSERT INTO cotizacion_detalle (id_cotizacion, producto, detalle, precio, cantidad, costo_total, iva, total_oferta, estado, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("issddssss", $orden, $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $orden, $item);
        if ($stmt->execute()) {
            $det = $mysqli->insert_id;
            log_action($mysqli, $username, "ingresado un nuevo detalle a la Cotización Número: <font color='red'><b>$orden</b></font> Detalle: $textarea Cantidad: <font color='blue'><b>$cantidad</b></font>, Precio: <font color='blue'><b>$precio_unitario</b></font>.");
            echo $det;
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "Error al subir el archivo.";
    }
} elseif ($bandera == 3) {
    // Delete quotation detail
    $det = $_POST['det'];
    $stmt = $mysqli->prepare("DELETE FROM cotizacion_detalle WHERE id_detalle_cotizacion = ?");
    $stmt->bind_param("i", $det);
    if ($stmt->execute()) {
        echo 1;
    } else {
        echo "Error: " . $mysqli->error;
    }
} elseif ($bandera == 4) {
    // Update quotation detail
    $orden = $_POST['orden'];
    $id_detalle = $_POST['id_detalle'];
    $cantidad = $_POST['cantidad'];
    $costo_total = $_POST['costo_total'];
    $precio_unitario = $_POST['precio_unitario'];
    $iva = $_POST['iva'];
    $detalle = $_POST['detalle'];
    $total_oferta = $_POST['total_oferta'];
    $producto = $_POST['producto'];
    $textarea = str_replace("\n", "<br>", $detalle);

    if (!empty($_FILES['file']['name'])) {
        $item = "item_update_" . $orden . "_" . mt_rand(0, 99000) . ".jpg";
        $imagenes_cot_folder = './item_cot_images/item_' . $orden . '_cot/';
        $destino = $imagenes_cot_folder . $item;
        if (move_uploaded_file($_FILES['file']['tmp_name'], $destino)) {
            $stmt = $mysqli->prepare("UPDATE cotizacion_detalle SET producto = ?, detalle = ?, precio = ?, cantidad = ?, costo_total = ?, iva = ?, total_oferta = ?, image = ? WHERE id_detalle_cotizacion = ?");
            $stmt->bind_param("ssddssssi", $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $item, $id_detalle);
        } else {
            echo "Error al subir el archivo.";
            exit();
        }
    } else {
        $stmt = $mysqli->prepare("UPDATE cotizacion_detalle SET producto = ?, detalle = ?, precio = ?, cantidad = ?, costo_total = ?, iva = ?, total_oferta = ? WHERE id_detalle_cotizacion = ?");
        $stmt->bind_param("ssddssi", $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $id_detalle);
    }
    if ($stmt->execute()) {
        log_action($mysqli, $username, "modificado un detalle de la Cotización Número: <font color='red'><b>$orden</b></font> Detalle: $textarea Cantidad: <font color='blue'><b>$cantidad</b></font>, Precio: <font color='blue'><b>$precio_unitario</b></font>.");
        header("Location: cot_detalle_new.php?orden=$orden");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
} elseif ($bandera == 5) {
    // Update quotation
    $cot = $_POST['cot'];
    $empresa = $_POST['empresa'];
    $nom_empresa = $_POST['nom_empresa'];
    $contacto = $_POST['contacto'];
    $nom_contacto = $_POST['nom_contacto'];
    $fecha = $_POST['fecha'];
    $vendedor = $_POST['vendedor'];
    $nom_vendedor = $_POST['nom_vendedor'];
    $nota = $_POST['nota'];

    $stmt = $mysqli->prepare("UPDATE cotizacion SET id_contacto = ?, contacto = ?, fecha = ?, nota = ?, id_vendedor = ?, vendedor = ?, id_usuario = ?, id_empresa = ?, empresa = ?, estado = 'Pendiente' WHERE id_cotizacion = ?");
    $stmt->bind_param("issssssssi", $contacto, $nom_contacto, $fecha, $nota, $vendedor, $nom_vendedor, $_SESSION['username'], $empresa, $nom_empresa, $cot);
    if ($stmt->execute()) {
        log_action($mysqli, $username, "actualizado la Cotización Número: <font color='red'><b>$cot</b></font> Detalles: Cliente: <b>$nom_empresa</b>, Contacto: <b>$nom_contacto</b>, Vendedor: <b>$nom_vendedor</b>.");
        header("Location: ./cotizacion_detalle.php?cot=$cot");
        exit();
    } else {
        echo "Error: " . $mysqli->error;
    }
} else {
    echo "Invalid request.";
}