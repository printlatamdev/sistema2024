<?php
session_start();

// Recupera la base de datos y el año de la sesión
$base = $_SESSION['base'];
$anio = '22';
$bd = $base . $anio;

// Establece la conexión a la base de datos
$con = mysqli_connect('localhost', 'admin', 'AG784512', $bd);

// Verifica la conexión
if (!$con) {
    die('Could not connect: ' . mysqli_connect_error());
}

// Obtiene el ID de la solicitud
$id = isset($_REQUEST['id']) ? $_REQUEST['id'] : '';

if ($id) {
    $status = "ENTREGADO";
    $estado = 0;

    // Prepara las consultas para actualizar el estado en las tablas
    $updatePopQuery = "UPDATE pop SET estado = ? WHERE id_orden = ?";
    $updateLogisticaQuery = "UPDATE logitica SET status = ? WHERE id_orden = ?";

    // Usa sentencias preparadas para evitar inyecciones SQL
    $stmtPop = mysqli_prepare($con, $updatePopQuery);
    mysqli_stmt_bind_param($stmtPop, 'ii', $estado, $id);
    $resultPop = mysqli_stmt_execute($stmtPop);

    $stmtLogistica = mysqli_prepare($con, $updateLogisticaQuery);
    mysqli_stmt_bind_param($stmtLogistica, 'si', $status, $id);
    $resultLogistica = mysqli_stmt_execute($stmtLogistica);

    // Verifica el resultado y redirige
    if ($resultPop && $resultLogistica) {
        echo '<script type="text/javascript">
            alert("POP terminada correctamente!");
            window.location.href = "../../lista_pop_nueva.php";
        </script>';
    } else {
        echo '<script type="text/javascript">
            alert("Error al actualizar los datos.");
            window.location.href = "../../lista_pop_nueva.php";
        </script>';
    }

    // Cierra las declaraciones
    mysqli_stmt_close($stmtPop);
    mysqli_stmt_close($stmtLogistica);
}

// Cierra la conexión a la base de datos
mysqli_close($con);
?>
