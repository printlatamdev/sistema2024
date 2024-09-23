<?php
//Desarrollado por Jesus Li��n
//ribosomatic.com
//Puedes hacer lo que quieras con el c�digo
//pero visita la web cuando te acuerdes

//Configuracion de la conexion a base de datos
    session_start(); 


    $base=$_SESSION['base'];
 //$anio=$_SESSION['year'];
    $anio=22;
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
	$host="localhost";

	$database=$bd;

	$username="admin";  

	$password="AG784512";

	$mysqli = new mysqli($host, $username, $password, $database);
	if ($mysqli->connect_errno) {
	    echo "No se puede conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
	}
	$mysqli = new mysqli($host, $username, $password, $database);

	 $pop =$mysqli->query("  SELECT  id_orden from pop order by id_orden desc LIMIT 1 ");
                        while ($row1 = mysqli_fetch_array($pop))
                                   {   
                                       $id_orden=$row1[0];
                                 
                                    }

 $sql=$mysqli->query("select*from pop_detalle where id_orden='".$id_orden."'");

//consulta todos los empleados

//$sql=mysqli_query("SELECT * FROM empleados",$con);

//muestra los datos consultados
//haremos uso de tabla para tabular los resultados
?>
<table style="border:0px solid #FF0000; color:#000099;width:400px;">
<tr style="background:#99CCCC;">
	<td>Orden</td>
	<td>Item</td>

</tr>

<?php
while($row = mysqli_fetch_array($sql)){
	echo "	<tr>";
	echo " 		<td>".$row['id_orden']."</td>";
	echo " 		<td>".$row['trabajo']."</td>";

	echo "	</tr>";
}
?>
</table>