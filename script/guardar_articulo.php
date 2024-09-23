<?

 include ("../suministros/connect.php");
 //$con = conexion();
 include("../session.php");


  $articulo = $_REQUEST['articulo'];
  $categoria = $_REQUEST['categoria'];
  $cantidad = $_REQUEST['cantidad'];
  $disponibilidad = $_REQUEST['disponibilidad'];
  $descripcion = $_REQUEST['descripcion'];
  $area = $_REQUEST['area'];
  $estado = 1;
  //$ = $_REQUEST[''];


  //echo $articulo."<br>";
  //echo $categoria."<br>";
  //echo $cantidad."<br>";
  //echo $disponibilidad."<br>";
  //echo $descripcion."<br>";

//$fecha =date('d/m/Y h:i:s a');
//$res2 = $mysqli->query("INSERT INTO bitacora_s (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");
//$produccion=0;

  $res = $mysqli->query("INSERT INTO articulos_inventario(articulo,disponibilidad_articulo,area,cantidad,descripcion,estado) VALUES ('".$articulo."','".$disponibilidad."','".$area."','".$cantidad."','".$descripcion."','".$estado."')");


if($res==true){

    echo '<script type="text/javascript">
          alert("Articulo Ingresado Correctamente");
          window.location.href="../datatable_inventario.php";
          </script>';
    }else{
    	echo 'error contactar al administrador';
    }

?>