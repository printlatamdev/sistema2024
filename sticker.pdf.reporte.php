<?php
session_start();

// Include database connection
include('suministros/connect.sticker.esa.php');

// Get order and destination from database
$query = $mysqli->prepare("SELECT id_orden, destino FROM stickers");
$query->execute();
$query->bind_result($id_orden, $destino);
$query->fetch();
$query->close();

// Ensure we have an order
if (!$id_orden || !$destino) {
    die('No order information found.');
}

// Require Dompdf and initiate object
require_once("dompdf6/dompdf_config.inc.php");
$dompdf = new DOMPDF();

// Get current URI and build the file path
$serverName = $_SERVER['SERVER_NAME'];
$uri = $serverName . '/' . explode("/", $_SERVER['REQUEST_URI'])[1];
$fileContent = file_get_contents("http://$uri/sticker.formato.generico.reporte.php?id_orden=$id_orden&bs=" . $_SESSION['base'] . $_SESSION['year'], true);

if (!$fileContent) {
    die('Failed to load content for PDF.');
}

// Load content into Dompdf and render PDF
$dompdf->load_html($fileContent);
$dompdf->render();
$pdfOutput = $dompdf->output();

// Set folder path and create directory if it doesn't exist
$folderPath = 'stickers_' . $_SESSION['base'] . $_SESSION['year'] . '/';
if (!file_exists($folderPath)) {
    mkdir($folderPath, 0777, true);
}

// Save PDF to the directory
$pdfFilePath = $folderPath . "INFO_ORDEN_$id_orden.pdf";
file_put_contents($pdfFilePath, $pdfOutput);

// Include PHPMailer and send email
require("email/class.phpmailer.php");
require("email/class.smtp.php");

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSecure = "ssl";
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;

// Add email credentials (don't hardcode these in the script)
$mail->Username = "infocd.dontreply@gmail.com";
$mail->Password = getenv('MAIL_PASSWORD'); // Use environment variables or other secure method

// Prepare email content
$mail->From = "infocd.dontreply@gmail.com";
$mail->FromName = "Sistema de Logistica";
$mail->Subject = "NUEVA INFORMACION DE ENVIO COLOR DIGITAL";
$mail->MsgHTML("Buen Día, el Sistema de Logística de Color Digital le comparte la información correspondiente del envío a $destino de la orden POP #$id_orden. Favor revisar y confirmar que la información sea correcta. Gracias.<br><br>*****NOTA: ESTA INFORMACION ES CORRECTA SOLO SI EL ENCARGADO DE PRODUCCION VALIDA LA INFORMACION*****");

// Add attachments
$mail->AddAttachment($pdfFilePath);

// Add recipients
$mail->AddAddress("produccion@vyasal.com", "Sistemas");
//$mail->AddAddress("materialdigitalsv@gmail.com", "Luis Gonzalez");
// Additional recipients can be added here

// Set email format to HTML
$mail->IsHTML(true);

// Send email and handle errors
if (!$mail->Send()) {
    echo "Error sending email: " . $mail->ErrorInfo;
} else {
    echo "Email sent successfully.";
}

// Stream the PDF to the browser
$dompdf->stream("INFO_ORDEN_$id_orden.pdf");

// Close database connection
$mysqli->close();
?>