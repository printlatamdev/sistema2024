<?php

echo 'Edit Script';
// session_start();

// Retrieve session variables
$base = $_SESSION['base'] ?? '';
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

// Query to fetch details
$id_orden = $_GET['id_orden'] ?? '';
if ($id_orden) {
    $query = "SELECT * FROM orden_detalle WHERE id_orden = ?";
    $stmt = $mysqli->prepare($query);
    if ($stmt) {
        $stmt->bind_param('s', $id_orden);
        $stmt->execute();
        $result = $stmt->get_result();
    } else {
        die("Error en la preparación de la consulta: " . $mysqli->error);
    }
} else {
    die("ID de orden no proporcionado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos de empleados</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

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
    <div class="container content">
        <div class="table-responsive">
            <table class="table table-bordered letragrande">
                <thead class="bg-primary text-white">
                    <tr>
                        <th width="50px">Item</th>
                        <th width="50px">Orden</th>
                        <th width="200px" class="text-center">Mueble</th>
                        <th width="50px">Editar</th>
                        <th width="50px">Borrar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo '
                        <tr>
                            <td>' . $no . '</td>
                            <td>' . htmlspecialchars($row['id_orden']) . '</td>
                            <td>' . htmlspecialchars($row['trabajo']) . '</td>
                            <td class="text-center">
                                <a href="../../sistema2024/formop3.php?id_detalle_orden=' . urlencode($row['id_detalle_orden']) . '" title="Editar datos" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </a>
                            </td>
                            <td class="text-center">
                                <a href="../../sistema2024/form/nueva_pop/delete_item_pop.php?id=' . urlencode($row['id_detalle_orden']) . '" title="Eliminar" onclick="return confirm(\'¿Está seguro de borrar los datos?\')" class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                </a>
                            </td>
                        </tr>';
                        $no++;
                    }
                    $stmt->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

<?php
// Close the connection
$mysqli->close();
?>
