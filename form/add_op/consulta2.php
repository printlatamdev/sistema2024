<?php
// Retrieve session variables
$orderid = $_GET['id_orden'] ?? '';
$base = $_SESSION['base'] ?? '';
$anio = 22;

// Depuración: Mostrar valores de sesión y orderid
//var_dump($base, $anio, $orderid);

// $anio = 22;
$bd = $base . $anio;

// Database connection details
$host = "localhost";
$username = "root";
$password = "";

// Establecer conexión mysqli
$mysqli = new mysqli($host, $username, $password, $bd);
if ($mysqli->connect_errno) {
    die("No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

// Depuración: Mostrar la conexión exitosa
//echo "Conexión establecida con la base de datos: $bd <br>";

// Fetch latest order if no 'orderid' is provided
if (empty(trim($orderid))) {
    $result = $mysqli->query("SELECT id_orden FROM orden ORDER BY id_orden DESC LIMIT 1");
    if ($result) {
        $row1 = $result->fetch_assoc();
        $id_orden = $row1['id_orden'] ?? '';
    } else {
        echo "Error en la consulta para obtener el último ID de orden: " . $mysqli->error;
    }
} else {
    $id_orden = $orderid;
}

// Depuración: Mostrar el ID de orden que se está utilizando
//echo "ID de orden seleccionado: $id_orden <br>";

// Fetch order details
if ($id_orden) {
    $stmt = $mysqli->prepare("SELECT * FROM orden_detalle WHERE id_orden = ? ORDER BY id_detalle_orden ASC");
    if ($stmt) {
        $stmt->bind_param('s', $id_orden);
        
        // Depuración: Mostrar la consulta preparada
        $stmt = $mysqli->prepare("SELECT * FROM orden_detalle WHERE id_orden = '$id_orden' ORDER BY id_detalle_orden ASC");
        
        $stmt->execute();
        $sql = $stmt->get_result();
        
        // Depuración: Mostrar si la ejecución fue exitosa
        //echo "Ejecución de consulta exitosa <br>";
    } else {
        die("Error en la preparación de la consulta: " . $mysqli->error);
    }
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
    <!-- Bootstrap -->
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
                    // Depuración: Mostrar detalles de cada fila
                    var_dump($row);
                    
                    echo '
                    <tr>
                        <td>' . $no . '</td>
                        <td>' . htmlspecialchars($row['id_orden']) . '</td>
                        <td>' . htmlspecialchars($row['trabajo']) . '</td>
                        <td>
                            <a href="../../sistema2024/formop3.php?id_detalle_orden=' . urlencode($row['id_detalle_orden']) . '" title="Editar datos" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                            </a>
                        </td>
                        <td>
                            <a href="../../sistema2024/form/nueva_pop/delete_item.php?id=' . urlencode($row['id_detalle_orden']) . '" title="Eliminar" onclick="return confirm(\'¿Está seguro de borrar los datos?\')" class="btn btn-danger btn-sm">
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
// Cerrar la conexión
$mysqli->close();

// Depuración: Confirmación de cierre de conexión
//echo "Conexión cerrada correctamente <br>";
?>
