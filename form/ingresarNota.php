f<?


$id_item = $_POST["id_item"];
$origen = $_POST["origen"];
$nota = $_POST["nota"];
$opcion = $_POST["opcion"];

$fecha=date('d-m-Y');
$usuario = $_SESSION['vsUsu'];


session_start();
$base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
if ($opcion=="impresion") {
	$res   = mysqli_query($con,"update pop_detalle SET mensaje='".$nota."'  where id_detalle_orden='".$id_item."'");

	if (!empty($nota)) {
	   $res1   = mysqli_query($con,"INSERT INTO bit_notas_corte_impresion (id_orden,nota,usuario,fecha,area)values('".$id_item."','".$nota."','".$usuario."','".$fecha."','".$opcion."')");
	}
	else{
		$nota="vacio";
		$opcion="vacio_impresion";
		$res1   = mysqli_query($con,"INSERT INTO bit_notas_corte_impresion (id_orden,nota,usuario,fecha,area)values('".$id_item."','".$nota."','".$usuario."','".$fecha."','".$opcion."')");
	}
	

if($res==true){

	echo'<script type="text/javascript">
		     alert("Nota Ingresada Correctamente");
		     window.location.href="../lista_pop_nueva.php";
         </script>';
		
		} else {
		   echo 'Error 1'.$id_item.$origen.$nota;
	    }
}
if ($opcion=="corte") {
	$res   = mysqli_query($con,"update pop_detalle SET nota_corte='".$nota."'  where id_detalle_orden='".$id_item."'");
	if (!empty($nota)) {
	   $res1   = mysqli_query($con,"INSERT INTO bit_notas_corte_impresion (id_orden,nota,usuario,fecha,area)values('".$id_item."','".$nota."','".$usuario."','".$fecha."','".$opcion."')");
	}
	else{
		$nota="vacio";
		$opcion="vacio_corte";
		$res1   = mysqli_query($con,"INSERT INTO bit_notas_corte_impresion (id_orden,nota,usuario,fecha,area)values('".$id_item."','".$nota."','".$usuario."','".$fecha."','".$opcion."')");
	}
if($res==true){

	echo'<script type="text/javascript">
		     alert("Nota Ingresada Correctamente");
		     window.location.href="../lista_pop_nueva.php";
         </script>';
		
		} else {
		   echo 'Error 1'.$id_item.$origen.$nota;
	    }
}











?>