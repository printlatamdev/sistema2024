<?


$id=$_REQUEST['id'];


$fotos=$_FILES['factura']['name'];
$foto=$id.'_'.$fotos;
$ruta=$_FILES['factura']['tmp_name'];
$extension=$_FILES['factura']['type'];



echo 'ID ORDEN:'.$id;
echo '<br>';
echo 'NOMBRE ARCHIVO:'.$fotos;


?>