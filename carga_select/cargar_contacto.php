<?php
// Mostrar todos los errores (útil para depuración)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Asegúrate de que la sesión esté iniciada
session_start();

// Verifica si las variables de sesión 'base' y 'year' están definidas
if (!isset($_SESSION['base']) || !isset($_SESSION['year'])) {
    die('Las variables de sesión "base" o "year" no están definidas.');
}

// Obtén la base de datos y el año de la sesión
$base = $_SESSION['base'];
$anio = $_SESSION['year'];

// Define la función getConn con un parámetro para la base de datos
function getConn($base, $anio) {
    // Define la conexión a la base de datos dependiendo del valor de $base
    $dbName = ($base === 'esa') ? 'esa22' : 'nica22';

    // Conecta a la base de datos
    $mysqli = mysqli_connect('localhost', 'admin', 'AG784512', $dbName);

    // Verifica si la conexión fue exitosa
    if (!$mysqli) {
        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
    }

    // Configura el conjunto de caracteres
    $mysqli->set_charset('utf8');

    return $mysqli;
}

// Utiliza la función getConn con los parámetros de la sesión
$mysqli = getConn($base, $anio);

// Verifica si se ha enviado el ID
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST['id'])) {
    $id = intval($_REQUEST['id']);

    // Verificar conexión
    if ($mysqli->connect_error) {
        die('Error de conexión (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
    }

    // Consulta para obtener contactos basados en el id_empresa
    $query = 'SELECT id_contacto, nombre FROM contacto WHERE id_empresa = ?';
    if ($stmt = $mysqli->prepare($query)) {
        // Vincular parámetros y ejecutar
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        // Verificar resultados de la consulta
        if ($result) {
            $options = '<option value="">SELECCIONE EL CONTACTO</option>';
            while ($row = $result->fetch_assoc()) {
                $id_contacto = htmlspecialchars($row['id_contacto'], ENT_QUOTES, 'UTF-8');
                $nombre_contacto = htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8');
                $options .= "<option value='{$id_contacto}'>{$nombre_contacto}</option>";
            }            
        } else {
            $options = '<option value="">No se encontraron contactos</option>';
        }

        // Cerrar declaración
        $stmt->close();
    } else {
        $options = '<option value="">Error al preparar la consulta</option>';
    }

    // Cerrar conexión
    $mysqli->close();

    // Enviar respuesta
    echo $options;
} else {
    echo '<option value="">SELECCIONE EL CONTACTO - No se recibió ID</option>';
}
?>
