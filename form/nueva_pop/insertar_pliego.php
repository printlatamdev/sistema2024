<?php
// // Muestra todos los errores de PHP (solo para desarrollo, no para producción)
// error_reporting(E_ALL);
// ini_set('display_errors', 1);



session_start();

$host = "localhost";
// $base = $_SESSION['base'];
$database = $_SESSION['base'] . $_SESSION['year'];
$username = "admin";
$password = "AG784512";


// Data from the form
// Obtener los datos del formulario
$id_detalle = $_POST['id_detalle'];
$tipo_pliego = $_POST['tipo_pliego'];
$id_material = $_POST['material'];
$id_equipo = $_POST['equipo'];
$impresion = $_POST['impresion'];
$cantidad = $_POST['cantidad'];
$base = $_POST['base'];
$altura = $_POST['altura'];
$nota = $_POST['nota'];
$id_orden = $_POST['orden'];
// Obtener el nombre del archivo original
$pliego = $_FILES['pliego']['name'];

// Generar un nombre de archivo aleatorio
$n_arte = uniqid('arte_', true) . '.' . pathinfo($pliego, PATHINFO_EXTENSION);

// Definir la ruta del archivo temporal y el destino final
$rutaTemporal = $_FILES['pliego']['tmp_name'];
$folder = $_SESSION['base'] == 'esa' ? 'EL_SALVADOR' : 'NICARAGUA';
$destinoDir = "../../ORDENES_POP/" . $folder . '/ID_POP_' . $id_orden . '/ARTES/';
$destino = $destinoDir . $n_arte;

// Crear el directorio de destino si no existe
if (!file_exists($destinoDir)) {
    mkdir($destinoDir, 0777, true);
}

// Mover el archivo desde la ruta temporal al destino
move_uploaded_file($rutaTemporal, $destino);
// if (move_uploaded_file($rutaTemporal, $destino)) {
//     echo "Archivo guardado correctamente en: " . $destino;
//     echo '<br>';
//     echo $id_material;
//     echo '<br>';

//     echo $id_equipo;
// } else {
//     echo "Error al guardar el archivo.";
// }



// Initialize MySQLi connection
$mysqli = new mysqli($host, $username, $password, $database);

if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Get empresa and other details
$pop_query = $mysqli->prepare("SELECT id_empresa, empresa FROM pop WHERE id_orden = ?");
$pop_query->bind_param("s", $id_orden);
$pop_query->execute();
$pop_result = $pop_query->get_result();
$pop_data = $pop_result->fetch_assoc();

$id_empresa = $pop_data['id_empresa'] ?? '';
$empresa = $pop_data['empresa'] ?? '';

// Get equipo name
$equipo_query = $mysqli->prepare("SELECT nombre FROM equipo WHERE id_equipo = ?");
$equipo_query->bind_param("s", $id_equipo);
$equipo_query->execute();
$equipo_result = $equipo_query->get_result();
$equipo_data = $equipo_result->fetch_assoc();

$n_equipo = $equipo_data['nombre'] ?? '';

// Get material type
$material_query = $mysqli->prepare("SELECT tipo FROM material WHERE id = ?");
$material_query->bind_param("s", $id_material);
$material_query->execute();
$material_result = $material_query->get_result();
$material_data = $material_result->fetch_assoc();

$n_material = $material_data['tipo'] ?? '';

// Prepara la consulta SQL con las columnas correctas
$insert_query = $mysqli->prepare("INSERT INTO pop_pliego 
    (id_orden, id_detalle, id_empresa, empresa, cantidad, base, altura, id_equipo, equipo, id_material, material, detalle, arte , tiro , estado , pliego)
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? , ? , ?)");

$estado = 1; // Si necesitas utilizar estado, asegúrate de agregarlo en la base de datos y en la consulta

// Asigna los valores a los parámetros de la consulta
$insert_query->bind_param("ssssssssssssssss", $id_orden, $id_detalle, $id_empresa, $empresa, $cantidad, $base, $altura, $id_equipo, $n_equipo, $id_material, $n_material, $nota, $n_arte , $impresion ,$estado , $tipo_pliego);

if ($insert_query->execute()) {
    echo '<script type="text/javascript">
        window.location.href = "../../form4.php?id='.$id_orden.'";
    </script>';
} else {
    // Error handling
    echo "Error: " . $mysqli->error;
}

// Close connections
$insert_query->close();
$pop_query->close();
$equipo_query->close();
$material_query->close();
$mysqli->close();
?>