<?php
session_start();

// include('../suministros/connect.php');

if (empty($_POST['proyecto'])) {
    $errors[] = "Ingresa el nombre del proyecto.";
} else {
    require_once("../conexion_ajax.php"); // Contiene función que conecta a la base de datos
    
    // Escapando entradas para prevenir inyección de SQL
    $cliente = mysqli_real_escape_string($con, strip_tags($_POST["cliente"], ENT_QUOTES));
    $marca = mysqli_real_escape_string($con, strip_tags($_POST["marca"], ENT_QUOTES));
    $proyecto = mysqli_real_escape_string($con, strip_tags($_POST["proyecto"], ENT_QUOTES));

    // Obtención de nombres del cliente y la marca
    $query_cliente = mysqli_query($con, "SELECT nombre FROM empresa WHERE id_empresa = '$cliente'");
    $n_cliente = mysqli_fetch_assoc($query_cliente)['nombre'];

    $query_marca = mysqli_query($con, "SELECT marca FROM pop_marca WHERE id_marca = '$marca'");
    $n_marca = mysqli_fetch_assoc($query_marca)['marca'];

    $estado = 1;
    $fecha = date('Y-m-d');
    $year = 2023;

    // Preparar la consulta para la base de datos
    $sql = "INSERT INTO pop_proyecto(nombre, fecha, id_empresa, empresa, id_marca, marca, estado) 
            VALUES ('$proyecto', '$fecha', '$cliente', '$n_cliente', '$marca', '$n_marca', '$estado')";
    
    // Ejecutar la consulta para la base de datos principal
    $query = mysqli_query($con, $sql);

    // // Ejecutar la consulta para la base de datos de Nicaragua
    // include("connect_nica.php");
    // $rsnica = $mysqli->query($sql);

    // Verificar si se insertó correctamente
    if ($query) {
        $old = umask(0);
        $base_path = "../Artes/$year/DISPLAYS/$n_cliente/$n_marca/$proyecto";

        // Crear directorios si no existen
        $directories = [
            $base_path,
            "$base_path/DISENO/INSTRUCTIVOS",
            "$base_path/DISENO/CORTE/GT",
            "$base_path/DISENO/IMPRESION/GT",
            "$base_path/DISENO/ARMADO/GT",
            "$base_path/DISENO/CORTE/CR",
            "$base_path/DISENO/IMPRESION/CR",
            "$base_path/DISENO/ARMADO/CR",
            "$base_path/DISENO/CORTE/HN",
            "$base_path/DISENO/IMPRESION/HN",
            "$base_path/DISENO/ARMADO/HN",
            "$base_path/DISENO/CORTE/SV",
            "$base_path/DISENO/IMPRESION/SV",
            "$base_path/DISENO/ARMADO/SV",
            "$base_path/DISENO/IMPRESION/PN",
            "$base_path/DISENO/ARMADO/PN",
            "$base_path/DISENO/CORTE/PN",
            "$base_path/DISENO/SCREENSHOT"
        ];

        foreach ($directories as $directory) {
            if (!file_exists($directory)) {
                mkdir($directory, 0777, true);
            }
        }

        umask($old);

        $messages[] = "El producto ha sido guardado con éxito.";
    } else {
        $errors[] = "Error al guardar el proyecto. Verifique los datos e intente nuevamente.";
    }
}

if (isset($errors)) {
    ?>
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Error!</strong>
        <?php foreach ($errors as $error) echo $error; ?>
    </div>
    <?php
}

if (isset($messages)) {
    ?>
    <div class="alert alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>¡Bien hecho!</strong>
        <?php foreach ($messages as $message) echo $message; ?>
    </div>
    <?php
}
?>
