<?php
// session_start();

// Retrieve session variables
$base = $_SESSION['base'];
$anio = 22;
$bd = $base . $anio;

// Database connection details
$host = "localhost";
$username = "admin";
$password = "AG784512";

// Establish mysqli connection
$mysqli = new mysqli($host, $username, $password, $bd);
if ($mysqli->connect_errno) {
    die("No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Check if 'orderid' is set
$orderid = $_GET['id_orden'] ?? '';

// Fetch the latest order if no 'orderid' is provided
if (empty(trim($orderid))) {
    $stmt = $mysqli->prepare("SELECT id_orden FROM pop ORDER BY id_orden DESC LIMIT 1");
    $stmt->execute();
    $result = $stmt->get_result();
    $row1 = $result->fetch_assoc();
    $id_orden = $row1['id_orden'] ?? '';
} else {
    $id_orden = $orderid;
}

// Fetch order details
if ($id_orden) {
    $stmt = $mysqli->prepare("SELECT * FROM pop_detalle WHERE id_orden = ? AND estado = 1 ORDER BY id_detalle_orden ASC");
    $stmt->bind_param('s', $id_orden);
    $stmt->execute();
    $sql = $stmt->get_result();
} else {
    die("No se encontró el ID de orden.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos de empleados</title>
    <style>
        .content {
            margin-top: 80px;
        }
        .letragrande {
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="table-responsive">
        <table class="letragrande" style="border: 2px;">
            <thead class="bg-primary">
                <tr>
                    <th width="50px">Item</th>
                    <th width="50px">Orden</th>
                    <th width="200px"><b style="margin-left: 80px;">Mueble</b></th>
                    <th width="50px">Editar</th>
                    <th width="50px">Borrar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = $sql->fetch_assoc()) {
                    echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . htmlspecialchars($row['id_orden']) . '</td>
                        <td>' . htmlspecialchars($row['trabajo']) . '</td>
                        <td>
                            <a href="../../sistema2024/form3.php?id_detalle_orden=' . urlencode($row['id_detalle_orden']) . '" title="Editar datos" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                        </td>
                        <td>
                            <a href="../../sistema2024/form/nueva_pop/delete_mueble.php?id=' . urlencode($row['id_detalle_orden']) . '" title="Eliminar" onclick="return confirm(\'¿Está seguro de borrar los datos?\')" class="btn btn-danger btn-sm">
                                <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            </a>
                        </td>
                    </tr>';
                    $no++;
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

<?php
// Close the connection
$mysqli->close();
?>
