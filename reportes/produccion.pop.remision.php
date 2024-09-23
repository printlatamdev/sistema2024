<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

// Incluye el autoloader de Dompdf
require '../vendor/autoload.php';

// Referencia el espacio de nombres Dompdf
use Dompdf\Dompdf;
use Dompdf\Options;

// Configura la conexión a la base de datos
include '../iiodev_connect.php';

// Verifica la conexión
if (!$conexion) {
    die("La conexión falló: " . mysqli_connect_error());
}

// Captura todos los datos enviados en la solicitud
$data = $_GET; // Usa $_GET si los datos se envían con el método GET

// Inicializa el HTML de los ítems
$items = [];

// Recorre los ítems y genera el HTML
$i = 1;
while (isset($data["item$i"]) && isset($data["cant$i"]) && isset($data["det$i"])) {
    $item = $data["item$i"];
    $cantidad = htmlspecialchars($data["cant$i"]);
    $detalle = htmlspecialchars($data["det$i"]);

    // Consulta para obtener el campo 'trabajo' de la tabla 'pop_detalle'
    $sql = "SELECT trabajo FROM pop_detalle WHERE id_detalle_orden = ?";
    if ($stmt = mysqli_prepare($conexion, $sql)) {
        mysqli_stmt_bind_param($stmt, "i", $item);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $trabajo);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $trabajo = 'No disponible';
    }

    // Añade los datos de los ítems al array
    $items[] = [
        'trabajo' => $trabajo,
        'cantidad' => $cantidad,
        'detalle' => $detalle,
    ];

    $i++;
}

// Consultas adicionales para obtener datos de la tabla pop
$empresa = '';
$contacto = '';
$pais = '';
$ordenCompra = '';
$idOrden = '';

// Consulta para obtener los datos de la tabla pop
$sqlPop = "SELECT empresa, contacto, destino, orden_compra, id_orden FROM pop WHERE id_orden = ?";
if ($stmt = mysqli_prepare($conexion, $sqlPop)) {
    mysqli_stmt_bind_param($stmt, "i", $data['idorden']); // Suponiendo que id_orden está en los datos GET
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $empresa, $contacto, $pais, $ordenCompra, $idOrden);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);
} else {
    // Manejar el caso de error si la consulta falla
    $empresa = 'No disponible';
    $contacto = 'No disponible';
    $pais = 'No disponible';
    $ordenCompra = 'No disponible';
    $idOrden = 'No disponible';
}

// Pasar los datos a la plantilla
$data['items'] = $items;
$data['empresa'] = $empresa;
$data['contacto'] = $contacto;
$data['pais'] = $pais;
$data['ordenCompra'] = $ordenCompra;
$data['idOrden'] = $idOrden;

// Función para obtener el contenido HTML de una plantilla
function getHtmlFromTemplate($templatePath, $data) {
    ob_start();
    extract($data); // Extrae los datos del array como variables
    include $templatePath;
    return ob_get_clean();
}

// Obtener el HTML de la plantilla
$html = getHtmlFromTemplate('develop_template.php', $data);

// Inicializa Dompdf
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isPhpEnabled', true); // Habilita PHP dentro del HTML
$dompdf = new Dompdf($options);

// Carga el contenido HTML en Dompdf
$dompdf->loadHtml($html);

// Establece el tamaño y la orientación del papel
$dompdf->setPaper('Letter', 'portrait');

// Renderiza el PDF
$dompdf->render();

// Envía el PDF al navegador
$dompdf->stream("documento.pdf", array("Attachment" => 0));

// Cierra la conexión a la base de datos
mysqli_close($conexion);
?>
