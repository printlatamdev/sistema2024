<?php
// session_start();

$base = $_SESSION['base'];
$anio = 22;
$bd = $base . $anio;

$mysqli = new mysqli('localhost', 'root', '', $bd);
if ($mysqli->connect_errno) {
    die("No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error);
}

$id_orden = $_REQUEST['id'] ?? '';
$sql = $mysqli->query("SELECT * FROM pop_detalle WHERE id_orden = '$id_orden' AND estado = 1");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Datos de Detalle de Orden</title>
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
        <table class="letragrande" style="border:2px;">
            <thead class="bg-primary">
                <tr>
                    <th width="50px">Item</th>
                    <th width="50px">Orden</th>
                    <th width="200px"><b style="margin-left: 80px;">Mueble</b></th>
                    <th width="50px">Ver</th>
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
                                <a href="form4.php?id=' . urlencode($row['id_orden']) . '&id_detalle=' . urlencode($row['id_detalle_orden']) . '" title="Ver pliegos" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-log-out" aria-hidden="true"></span>
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
<?php $mysqli->close(); ?>
