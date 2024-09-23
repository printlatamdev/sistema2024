<?php
// Start session if it's not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Debugging statement
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Ensure session variables are set
if (!isset($_SESSION['base']) || !isset($_SESSION['vsNombre']) || !isset($_SESSION['vsUsu'])) {
    die('Session variables are not set.');
}

$base = $_SESSION['base'];
$username = $_SESSION['vsNombre'];
$usuario = $_SESSION['vsUsu'];

// Include the database connection
include($base . "_db.php");

// Validate bandera value
$bandera = isset($_POST['bandera']) ? (int) $_POST['bandera'] : 0;
if ($bandera < 1 || $bandera > 12) {
    die('Invalid bandera value.');
}

// Switch case handling
switch ($bandera) {
    case 1:
        // Validate POST data
        if (!isset($_POST['empresa'], $_POST['nom_empresa'], $_POST['contacto'], $_POST['nom_contacto'], $_POST['fecha'], $_POST['vendedor'], $_POST['nom_vendedor'], $_POST['nota'], $_POST['incoterm'])) {
            die('Missing POST data for case 1.');
        }

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
        $stmt->bind_param('isssssssss', $contacto, $nom_contacto, $fecha, $nota, $incoterm, $vendedor, $nom_vendedor, $usuario, $empresa, $nom_empresa);
        $stmt->execute();
        $order = $stmt->insert_id;
        $stmt->close();

        // Bitacora del Sistema
        $ip = $_SERVER["REMOTE_ADDR"];
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');

        $detalle = '<br><font color="blue">' . $username . '</font> ha creado Cotizacion Numero: <font color="red"><b>' . $order . '</b></font>.</br>Detalles: Cliente: <b>' . $nom_empresa . '</b>, Contacto: <b>' . $nom_contacto . '</b>, Vendedor: <b>' . $nom_vendedor . '</b>.</br> El día ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';

        $stmt = $mysqli->prepare("INSERT INTO log_cotizacion (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $username, $ip, date("Y-m-d h:i:s"), $detalle);
        $stmt->execute();
        $stmt->close();

        header("Location: ../cot_detalle_new.php?orden=" . $order);
        break;

    case 2:
        $pais = $_REQUEST['pais'];
        include($pais."_db.php");

        if (isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            die('Error uploading file: ' . $_FILES['file']['error']);
        }

        // Validar los datos POST
        $orden = isset($_POST['orden']) ? $_POST['orden'] : null;
        $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : null;
        $precio_unitario = isset($_POST['precio_unitario']) ? $_POST['precio_unitario'] : null;
        $producto = isset($_POST['producto']) ? $_POST['producto'] : null;
        $iva = isset($_POST['iva']) ? $_POST['iva'] : null;
        $detalle = isset($_POST['detalle']) ? $_POST['detalle'] : null;
        $total_oferta = isset($_POST['total_oferta']) ? $_POST['total_oferta'] : null;

        $costo_total = $cantidad && $precio_unitario ? number_format($cantidad * $precio_unitario, 2, '.', '') : '0.00';
        $textarea = $detalle ? str_replace("\n", "<br>", $detalle) : '';

        // Manejar la subida de imágenes
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $ruta = $_FILES['file']['tmp_name'];
            $aleatorio = mt_rand(0, 99000);
            $item = "item_" . $orden . "_" . $aleatorio . ".jpg";
            $folder_cot_id = 'item_' . $orden . '_cot';
            $imagenes_cot_folder = './item_cot_images/' . $folder_cot_id . '/';

            if (!file_exists($imagenes_cot_folder)) {
                if (!mkdir($imagenes_cot_folder, 0777, true)) {
                    die('Failed to create directories...');
                }
            }

            $destino = $imagenes_cot_folder . $item;
            if (!file_exists($ruta)) {
                die('Archivo temporal no encontrado: ' . $ruta);
            }
            if (!move_uploaded_file($ruta, $destino)) {
                die('Failed to move uploaded file. Error: ' . error_get_last()['message']);
            } else {
                echo 'File uploaded successfully to ' . $destino;
            }
        } else {
            $item = null; // No image uploaded
        }

        // Preparar la declaración SQL
        $stmt = $mysqli->prepare("INSERT INTO cotizacion_detalle (id_cotizacion, producto, detalle, precio, cantidad, costo_total, iva, total_oferta, estado, image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param('isssidissi', $orden, $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $orden, $item);
        $stmt->execute();
        $det = $stmt->insert_id;
        $stmt->close();

        // Bitacora del Sistema
        $ip = $_SERVER["REMOTE_ADDR"];
        $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
        $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y');
        $hora_actual = date("Y-m-d h:i:s");

        $detalle_log = '<br><font color="blue">' . $username . '</font> ha <font color="blue"><b>ingresado</b></font> un nuevo detalle a la Cotizacion Numero: <font color="red"><b>' . $orden . '</b></font>.</br></br><b>Detalle:</b><br> ' . $textarea . '<br><br>  <b>Cantidad:</b> <font color="blue"><b>' . $cantidad . '</b></font>, <b>Precio:</b> <font color="blue"><b>' . $precio_unitario . '</b></font></br> El día ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.<br><br>';

        $stmt = $mysqli->prepare("INSERT INTO log_cotizacion (usuario, ip, hora, detalle) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('ssss', $username, $ip, $hora_actual, $detalle_log);
        $stmt->execute();
        $stmt->close();

        echo $det;
        break;

    case 3:
        $det = $_POST['det'];
        $stmt = $mysqli->prepare("DELETE FROM cotizacion_detalle WHERE id_detalle_cotizacion = ?");
        $stmt->bind_param('i', $det);
        $stmt->execute();
        $stmt->close();

        echo 1;
        break;

    case 4:
      // Conexión a la base de datos
        include ($base . "_db.php");

        $img_name = '';
        $ruta = '';

        // Verifica si se ha cargado un archivo
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $ruta = $_FILES['image']['tmp_name'];
            $img_name = $_FILES['image']['name'];
        }

        $orden = $_POST['orden'];
        $id_detalle = $_POST['id_detalle'];
        $cantidad = $_POST['cantidad'];
        $costo_total = $_POST['costo_total'];
        $precio_unitario = $_POST['precio_unitario'];
        $iva = $_POST['iva'];
        $detalle = $_POST['detalle'];
        $total_oferta = $_POST['total_oferta'];
        $producto = $_POST['product'];
        $textarea = str_replace("\n", "<br>", $detalle);

        if ($img_name) {
            $aleatorio = mt_rand(0, 99000);
            $item = "item_update_" . $orden . "_" . $aleatorio . ".jpg";
            $folder_cot_id = 'item_' . $orden . '_cot';
            $imagenes_cot_folder = './item_cot_images/' . $folder_cot_id . '/';
            
            // Crear el directorio si no existe
            if (!file_exists($imagenes_cot_folder)) {
                mkdir($imagenes_cot_folder, 0755, true);
            }

            $destino = $imagenes_cot_folder . $item;

            // Preparar y ejecutar la consulta SQL
            $stmt = $mysqli->prepare("UPDATE cotizacion_detalle SET producto = ?, detalle = ?, precio = ?, cantidad = ?, costo_total = ?, iva = ?, total_oferta = ?, image = ? WHERE id_detalle_cotizacion = ?");
            $stmt->bind_param('sssidissi', $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $item, $id_detalle);
            $stmt->execute();
            $stmt->close();

            // Mover el archivo al destino
            if (move_uploaded_file($ruta, $destino)) {
                echo 1; // Éxito
            } else {
                echo 0; // Error al mover el archivo
            }
        } else {
            // Actualizar sin imagen
            $stmt = $mysqli->prepare("UPDATE cotizacion_detalle SET producto = ?, detalle = ?, precio = ?, cantidad = ?, costo_total = ?, iva = ?, total_oferta = ? WHERE id_detalle_cotizacion = ?");
            $stmt->bind_param('sssidisi', $producto, $textarea, $precio_unitario, $cantidad, $costo_total, $iva, $total_oferta, $id_detalle);
            $stmt->execute();
            $stmt->close();
            
            echo 1; // Éxito
        }
        // header("Location: ../cot_detalle_new.php?orden=" . $order);
        // echo 1;
        break;

    case 5:
        $orden = $_POST['orden'];

        $stmt = $mysqli->prepare("SELECT * FROM cotizacion_detalle WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $orden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row['producto'] . "</td><td>" . $row['cantidad'] . "</td><td>" . $row['costo_total'] . "</td></tr>";
        }

        $stmt->close();
        break;

    case 6:
        $id = $_POST['orden'];

        $stmt = $mysqli->prepare("UPDATE cotizacion SET estado = 'Autorizado' WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        break;

    case 7:
        $id = $_POST['orden'];

        $stmt = $mysqli->prepare("UPDATE cotizacion SET estado = 'Rechazado' WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        break;

    case 8:
        $orden = $_POST['orden'];

        $stmt = $mysqli->prepare("SELECT id_empresa, empresa, id_contacto, contacto, fecha, incoterm, id_vendedor, vendedor, nota FROM cotizacion WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $orden);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        echo json_encode($row);

        $stmt->close();
        break;

    case 9:
        $orden = $_POST['orden'];
        $archivo = $_FILES['archivo']['tmp_name'];
        $nombre = $_FILES['archivo']['name'];
        $nueva_ruta = "./files_cot/" . $orden . "_" . $nombre;

        copy($archivo, $nueva_ruta);

        $stmt = $mysqli->prepare("INSERT INTO files_cot (nombre, ruta, id_cotizacion) VALUES (?, ?, ?)");
        $stmt->bind_param('ssi', $nombre, $nueva_ruta, $orden);
        $stmt->execute();
        $stmt->close();

        echo 1;
        break;

    case 10:
        $id = $_POST['id'];

        $stmt = $mysqli->prepare("DELETE FROM files_cot WHERE id_files_cot = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $stmt->close();

        echo 1;
        break;

    case 11:
        $orden = $_POST['orden'];

        $stmt = $mysqli->prepare("SELECT id_files_cot, nombre FROM files_cot WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $orden);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<tr><td><a target='_blank' href='" . $row['ruta'] . "'>" . $row['nombre'] . "</a></td><td><button onclick='eliminarArchivo(" . $row['id_files_cot'] . ")'>Eliminar</button></td></tr>";
        }

        $stmt->close();
        break;

    case 12:
        $orden = $_POST['orden'];

        $stmt = $mysqli->prepare("SELECT * FROM cotizacion WHERE id_cotizacion = ?");
        $stmt->bind_param('i', $orden);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        echo json_encode($row);

        $stmt->close();
        break;
}
?>
