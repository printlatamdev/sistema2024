<?php
// Incluir las librerías de PHPMailer
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';


// Usar los namespaces de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
// require 'vendor/autoload.php'; // Ensure you have PHPMailer installed via Composer
session_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$badera = $_REQUEST['bandera'] ?? '';
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
// $anio = 22;
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];

include($base . "_db.php");


$bandera = $_REQUEST['bandera'];
$carpeta1 = "bodega_" . $_SESSION['base'] . $_SESSION['year'] . "/";
if (!file_exists($carpeta1)) {
  mkdir($carpeta1, 0777, true);
}
$carpeta2 = "ordenes_compra_" . $_SESSION['base'] . $_SESSION['year'] . "/";
if (!file_exists($carpeta2)) {
  mkdir($carpeta2, 0777, true);
}
$carpeta3 = "orden_compra_docu_" . $_SESSION['base'] . $_SESSION['year'] . "/";
if (!file_exists($carpeta3)) {
  mkdir($carpeta3, 0777, true);
}
$carpeta4 = "ordenes_compra_fac_" . $_SESSION['base'] . $_SESSION['year'] . "/";
if (!file_exists($carpeta4)) {
  mkdir($carpeta4, 0777, true);
}

if ($bandera == 1) {


  $empresa = $_POST['empresa'];
  $nom_empresa = $_POST['nom_empresa'];
  $solicita = $_POST['solicita'];
  $nom_solicita = $_POST['nom_solicita'];
  $fecha = $_POST['fecha'];
  $username = $_SESSION['username'];
  $op = $_POST['op'];
  if (isset($_REQUEST['pop'])) {
    $pop = '1';
  } else {
    $pop = '0';
  }

  //  echo "INSERT INTO compra ( id_empresa, empresa, id_solicita, solicita, fecha,  usuario,  estado, ) VALUES ( '$empresa', '$nom_empresa', '$solicita', '$nom_solicita', '$fecha',  '$username',  '0')";            

  $rs = $mysqli->query("INSERT INTO compra ( id_empresa, empresa, id_solicita, solicita, fecha,  usuario,  estado,  op, pop) VALUES ( '$empresa', '$nom_empresa', '$solicita', '$nom_solicita', '$fecha',  '$username',  '0',  '$op',  '$pop')");

  $compra = $mysqli->insert_id;
  //echo $order;

  //****Bitacora del Sistema*******

  $ip = $_SERVER["REMOTE_ADDR"];

  $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
  $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

  $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha creado Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Proveedor: <b>' . $nom_empresa . '</b>, Solicita: <b>' . $nom_solicita . '</b>, OP: <b>' . $op . '</b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';


  $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

  //************************************

  header("Location: compra.detalle2.php?compra=" . $compra . "");
} elseif ($bandera == 2) {

  // var_dump($_POST);
  // Mostrar errores para la depuración
  // ini_set('display_errors', 1);
  // ini_set('display_startup_errors', 1);
  // error_reporting(E_ALL);

  // Recibir datos POST de manera segura
  $compra = $_POST['compra'];
  $empresa = $_POST['empresa'];
  $id_empresa = $_POST['id_empresa'];
  $cantidad = $_POST['cantidad'];
  $precio_unitario = $_POST['precio_unitario'];
  $stud_c = explode("_", $_POST['material']);
  $id_material = $stud_c[0];

  // Depuración: Mostrar variables iniciales
  echo "Compra ID: $compra<br>";
  echo "Empresa: $empresa<br>";
  echo "ID Empresa: $id_empresa<br>";
  echo "Cantidad: $cantidad<br>";
  echo "Precio Unitario: $precio_unitario<br>";
  echo "ID Material: $id_material<br>";

  // Verificar cuántas líneas tiene actualmente
  $dataAssoc = $mysqli->query("SELECT count(*) AS dataAssoc FROM esa22.compra_detalle WHERE id_compra = $compra");
  $countRow = 0;
  while ($dataAss = $dataAssoc->fetch_assoc()) {
    $countRow = $dataAss['dataAssoc'];
  }

  // Depuración: Mostrar el conteo de líneas actuales
  echo "Líneas actuales: $countRow<br>";

  // Línea permitida más la que viene, máximo de 9 líneas
  if (($countRow + 1) <= 9) {
    $rs2 = $mysqli->query("SELECT * FROM `material` WHERE `id` = '$id_material'");
    while ($fila = $rs2->fetch_assoc()) {
      $mat = $fila['material'];
      $tipo = $fila['tipo'];
      $ma = $mat . " - " . $tipo;
      $material = trim($ma);
    }

    // Depuración: Mostrar material y tipo
    echo "Material: $material<br>";

    $username = $_SESSION['username'];

    // Intentar insertar en `compra_detalle`
    $rs = $mysqli->query("INSERT INTO `compra_detalle`( `id_compra`, `id_empresa`, `empresa`, `id_material`, `material`, `cantidad`, `precio`, `estado`) VALUES ('$compra', '$id_empresa', '$empresa', '$id_material', '$material', '$cantidad', '$precio_unitario','1')");

    // Depuración: Verificar si la inserción fue exitosa
    if ($rs) {
      echo "Registro insertado en compra_detalle con éxito.<br>";
    } else {
      echo "Error al insertar en compra_detalle: " . $mysqli->error . "<br>";
    }

    // Bitácora del sistema
    $ip = $_SERVER["REMOTE_ADDR"];

    $dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
    $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
    $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha agregado el siguiente detalle a la Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Proveedor: <b>' . $empresa . '</b>, Material: <b>' . $material . '</b>, Cantidad: <b>' . $cantidad . '</b>, Precio Unitario: <b>' . $precio_unitario . '</b>.</br> El día ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';

    $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

    // Depuración: Verificar si la inserción en log_compras fue exitosa
    if ($rs) {
      header("Location: compra.detalle2.php?compra=" . $compra . "");
      // echo "Registro insertado en log_compras con éxito.<br>";
    } else {
      echo "Error al insertar en log_compras: " . $mysqli->error . "<br>";
    }

  } else {
    // Si supera el límite de 9 líneas
    echo "No se puede insertar más de 9 registros.<br>";
  }

  // Redirigir después de la operación
  // header("Location: compra.detalle2.php?compra=" . $compra);


} elseif ($bandera == 3) {


  $compra = $_REQUEST['compra'];
  $det = $_REQUEST['det'];



  $username = $_SESSION['username'];

  //****Bitacora del Sistema************************************************************************************************************
  $ip = $_SERVER["REMOTE_ADDR"];
  $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
  $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";


  $rs2 = $mysqli->query("SELECT * FROM `compra_detalle` WHERE `id_detalle_compra` = '$det' AND `id_compra` = '$compra' ");

  while ($fila = $rs2->fetch_assoc()) {

    $empresa = $fila['empresa'];
    $cantidad = $fila['cantidad'];
    $material = $fila['material'];
    $precio_unitario = $fila['precio'];
  }

  $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha eliminado el siguiente detalle a la Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Proveedor: <b>' . $empresa . '</b>, Material: <b>' . $material . '</b>, Cantidad: <b>' . $cantidad . '</b>, Precio Unitario: <b>' . $precio_unitario . '</b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';



  $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");
  //***********************************************************************************************************************************************************************




  $rs = $mysqli->query("DELETE FROM `compra_detalle` WHERE `id_detalle_compra` = '$det'");
  header("Location: compra.detalle2.php?compra=" . $compra . "");
} elseif ($bandera == 4) {





  $orden = $_REQUEST['ord'];
  $mensaje = $_REQUEST['mensaje'];
  $email1 = trim($_REQUEST['email1']);
  $email2 = trim($_REQUEST['email2']);
  $email3 = trim($_REQUEST['email3']);
  $path = $_FILES['file']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num = rand(0000, 9999);


  if ($ext == 'pdf' || $ext == 'PDF') {

    $nombre = "SCAN_" . $orden . "_" . $num . ".pdf";

    $destination_img = 'ordenes_compra_docu_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;

    move_uploaded_file($_FILES["file"]["tmp_name"], $destination_img);
  } else {



    //------------------------------Para reducir foto

    function compress($source, $destination, $quality)
    {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
      elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
      elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, quality: $quality);

      return $destination;
    }


    $nombre = "SCAN_" . $orden . "_" . $num . "." . $ext . "";
    $source_img = $_FILES['file']['tmp_name'];

    $destination_img = 'ordenes_compra_docu_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;

    $d = compress($source_img, $destination_img, 75);
    //------------------------------------Fin Para reducir foto

  }


  $rs = $mysqli->query("UPDATE `compra` SET `estado`='1', `auto`='" . $nombre . "' WHERE id_compra='" . $orden . "'");


  //*****************************************************************************

  include("email/class.phpmailer.php");
  include("email/class.smtp.php");

  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true;
  $mail->SMTPSecure = "ssl";

  $mail->Host = "smtp.gmail.com";
  $mail->Port = 465;
  $mail->Username = "infocd.dontreply@gmail.com";
  $mail->Password = "Inf@Color10";

  $mail->From = "infocd.dontreply@gmail.com";
  $mail->FromName = "Recepcion Color Digital";
  $mail->Subject = "ORDEN DE COMPRA No." . $orden;
  $mail->AltBody = "ORDEN DE COMPRA No." . $orden . " ha sido autorizada. ";
  $mail->MsgHTML($mensaje);

  // Adjuntar archivos
  // Podemos agregar mas de uno si queremos.
  //$mail->AddAttachment("ruta-del-archivo/archivo.zip");
  $mail->AddAttachment($destination_img);

  // if ($_SESSION['base'] == 'esa') {
  //   $mail->AddAddress("produccion@vyasal.com", "Sistemas");
  //   $mail->AddAddress("supervision.colordigital@gmail.com", "Carolina Bolaños");
  //   $mail->AddAddress("compras@colordigital.co", "Luis Gonzalez");
  //   // $mail->AddAddress("materialdigitalsv@gmail.com", "Luis Gonzalez");
  // } else {
  //   $mail->AddAddress("produccion@vyasal.com", "Sistemas");
  //   $mail->AddAddress("ltellez@colordigital.co", "Supervisor");
  //   $mail->AddAddress("csilva@colordigital.co", "Recepcion");
  // }

  if (isset($_REQUEST['email1'])) {
    if (!empty($email1)) {
      $mail->AddAddress($email1, "Encargado");
    }
  }
  if (isset($_REQUEST['email2'])) {
    if (!empty($email2)) {
      $mail->AddAddress($email2, "Encargado");
    }
  }
  if (isset($_REQUEST['email3'])) {
    if (!empty($email3)) {
      $mail->AddAddress($email3, "Encargado");
    }
  }


  $mail->IsHTML(true);

  if (!$mail->Send()) {
    echo "Error: " . $mail->ErrorInfo;
  } else {
    //echo "Mensaje enviado.";
  }


  //*****************************************************************************

  header("Location: compra.documentacion.php?flag=1");
} elseif ($bandera == 5) {
  # ESTA OPCION SIRVE PARA ENVIAR FACTURA A LA ORDEN ENTREGADA

  //****Bitacora del Sistema************************************************************************************************************
  $ip = $_SERVER["REMOTE_ADDR"];
  $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
  $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";


  $compra = $_REQUEST['compra'];
  $path = $_FILES['file']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num = rand(0000, 9999);

  //$carpeta_envio = "ORDENES_COMPRA_2020/ORDENES_FACT/";
  //if (!file_exists($carpeta_envio)) {
  //mkdir($carpeta_envio, 0777, true);} 


  if ($ext == 'pdf' || $ext == 'PDF') {

    $nombre = "FAC_" . $compra . "_" . $num . ".pdf";

    $destination_img = 'ordenes_compra_fac_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;

    move_uploaded_file($_FILES["file"]["tmp_name"], $destination_img);


    $rs = $mysqli->query("UPDATE `compra` SET `estado`='2', `factura`='" . $nombre . "'WHERE id_compra='" . $compra . "'");


    //***********************************************************************************************************************************************************************
    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha agregado una factura a la Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Factura: <b><a target="_blank" href="' . $destination_img . '">Ver</a></b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';
    $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");
    //***********************************************************************************************************************************************************************


    header("Location: compra.control.iframe.php?&base=" . $base . "&idorden=" . $compra . "");
  } else {

    $carpeta_envio = "ORDENES_COMPRA_2020/ORDENES_FACT/";
    if (!file_exists($carpeta_envio)) {
      mkdir($carpeta_envio, 0777, true);
    }

    //------------------------------Para reducir foto

    function compress($source, $destination, $quality)
    {
      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg')
        $image = imagecreatefromjpeg($source);
      elseif ($info['mime'] == 'image/gif')
        $image = imagecreatefromgif($source);
      elseif ($info['mime'] == 'image/png')
        $image = imagecreatefrompng($source);
      imagejpeg($image, $destination, $quality);

      return $destination;
    }


    $nombre = "FAC_" . $compra . "_" . $num . "." . $ext . "";
    $source_img = $_FILES['file']['tmp_name'];

    $destination_img = 'ordenes_compra_fac_' . $_SESSION['base'] . $_SESSION['year'] . '/' . $nombre;
    $d = compress($source_img, $destination_img, 75);
    //------------------------------------Fin Para reducir foto

    $rs = $mysqli->query("UPDATE `compra` SET `estado`='2', `factura`='" . $nombre . "' WHERE id_compra='" . $compra . "'");

    //***********************************************************************************************************************************************************************
    $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha agregado una factura a la Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Factura: <b><a target="_blank" href="' . $destination_img . '">Ver</a></b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';
    $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");
    //***********************************************************************************************************************************************************************

    header("Location: compra.control.iframe.php?idorden=" . $compra . "");
  }
} elseif ($bandera == 6) {

  error_reporting(E_ALL);
ini_set("display_errors", 1);

// Verificar que 'orden' está presente en la solicitud
if (!isset($_REQUEST['orden'])) {
    die("Missing 'orden' parameter.");
}

$orden = trim($_REQUEST['orden']);
$base = $_SESSION['base'];
$anio = $_SESSION['year'];

// Conexión a la base de datos
include('connectin.php');

// Recuperar el nombre del archivo asociado con el ID de orden proporcionado
$query = "SELECT archivo FROM `compra` WHERE `id_compra` = ?";
$stmt = $mysqli->prepare($query);
if ($stmt === false) {
    die("MySQL prepare failed: " . $mysqli->error);
}
$stmt->bind_param("s", $orden);
$stmt->execute();
$stmt->bind_result($nombre);
$stmt->fetch();
$stmt->close();

if (!$nombre) {
    die("No file name found for the given order ID.");
}

$destination_img = 'reportes' . "/" . 'ordenes_compra_' . $base . $anio . '/' . $nombre;

// Debug output to ensure paths are correct
echo "Destination image path: $destination_img<br>";

// // Incluir PHPMailer y clases SMTP
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP para Office 365
    // $mail->SMTPDebug = 2; // Enable verbose debug output
    $mail->isSMTP();
    $mail->Host = 'smtp.office365.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'it@printlatam.com'; // Tu correo de Office 365
    $mail->Password = 'Qov55132'; // Tu contraseña de Office 365
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo electrónico
    $mail->setFrom('it@printlatam.com', 'Bodega Color Digital');
    $mail->addAddress('compras@colordigital.co', 'rootistrador de Bodega');

    // Destinatarios condicionales
    if (isset($_REQUEST['arqui'])) {
        $mail->addAddress($_REQUEST['arqui'], 'Arq. Eduardo Campos');
    }
    if (isset($_REQUEST['senora'])) {
        $mail->addAddress($_REQUEST['senora'], 'Arq. Ana Maria de Campos');
    }
    if (isset($_REQUEST['guli'])) {
        $mail->addAddress($_REQUEST['guli'], 'Lic. Ana Maria Campos');
    }
    if (isset($_REQUEST['toto'])) {
        $mail->addAddress($_REQUEST['toto'], 'Lic. Eduardo Campos');
    }

    // Destinatarios opcionales adicionales
    if (isset($_REQUEST['email1']) && !empty($_REQUEST['email1'])) {
        $mail->addAddress($_REQUEST['email1'], 'Encargado');
    }
    if (isset($_REQUEST['email2']) && !empty($_REQUEST['email2'])) {
        $mail->addAddress($_REQUEST['email2'], 'Encargado');
    }
    if (isset($_REQUEST['email3']) && !empty($_REQUEST['email3'])) {
        $mail->addAddress($_REQUEST['email3'], 'Encargado');
    }

    // Contenido del correo electrónico
    $mail->isHTML(true);
    $mail->Subject = 'ORDEN DE COMPRA No.' . $orden;
    $mail->Body = $_REQUEST['mensaje'];

    // Adjuntar el archivo
    $mail->addAttachment($destination_img);

    // Intentar enviar el correo
    $mail->send();
    echo 'Email sent successfully.';
} catch (Exception $e) {
    echo "Error: {$mail->ErrorInfo}";
}

// Cerrar la conexión a la base de datos
$mysqli->close();

  // header("Location: compra.detalle2.php?compra=" . $_REQUEST['orden'] . "&flag=1");
} elseif ($bandera == 7) {

  $compra = $_POST['compra'];
  $empresa = $_POST['empresa'];
  $nom_empresa = $_POST['nom_empresa'];
  $solicita = $_POST['solicita'];
  $nom_solicita = $_POST['nom_solicita'];
  //$fecha=$_POST['fecha'];
  $username = $_SESSION['username'];
  $op = $_POST['op'];
  if (isset($_REQUEST['pop'])) {
    $pop = '1';
  } else {
    $pop = '0';
  }


  $rs = $mysqli->query("UPDATE `compra` SET `id_empresa`='" . $empresa . "', `empresa`='" . $nom_empresa . "', `id_solicita`='" . $solicita . "', `solicita`='" . $nom_solicita . "',  `usuario`='" . $username . "', `op`='" . $op . "', `pop`='" . $pop . "'  WHERE id_compra='" . $compra . "'");


  //****Bitacora del Sistema*******

  $ip = $_SERVER["REMOTE_ADDR"];

  $dias = array("Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado");
  $meses = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
  $date_log = $dias[date('w')] . " " . date('d') . " de " . $meses[date('n') - 1] . " del " . date('Y') . "";

  $detalle = '<br><font color="blue">' . $_SESSION['username'] . '</font> ha editado Orden de Compra Numero: <font color="red"><b>' . $compra . '</b></font>.</br>Detalles:<br> Proveedor: <b>' . $nom_empresa . '</b>, Solicita: <b>' . $nom_solicita . '</b>, OP: <b>' . $op . '</b>.</br> El dia ' . $date_log . ' a las ' . date('h:i:s a') . ' desde la IP ' . $ip . '.';


  $rs = $mysqli->query("INSERT INTO log_compras( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '" . date("Y-m-d h:i:s") . "', '$detalle')");

  //************************************

  header("Location: compra.detalle2.php?compra=" . $compra . "");
} else {
}

// $mysqli->close();
