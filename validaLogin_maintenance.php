<?php
session_start(); //Esta linea activa el uso de sesiones

$usr=$_REQUEST['user'];
$cla=$_REQUEST['pass'];
$dest=$_REQUEST['ni'];
//include ("connect.php");

if ($dest=="nica") {
	$dest="NI";
}
else{}




if ($dest=="NI") {
include ("connect2.php");
$conn = conexion2();

$base="nica";
$anio=22;

$sql="select*from usuarios WHERE user='$usr' and pass='$cla'";
$sql2=mysqli_query($conn,$sql);
$existe=mysqli_num_rows($sql2);








}


else{
include ("connect.php");
$conn = conexion();

$base="esa";
$anio=22;

$sql="select*from usuarios WHERE user='$usr' and pass='$cla'";
$sql2=mysqli_query($conn,$sql);
$existe=mysqli_num_rows($sql2);






}


//Crear sentencia SQL
if ($existe==0) {
		header("location: login_maintenance.php");

}

else
{ 

    $_SESSION['dest']=$dest;



	$sql4="select*from usuarios where user='".$usr."' and pass='".$cla."'";

    $registro=mysqli_query($conn,$sql4);
	$fila=mysqli_fetch_array($registro);
	$username=$fila['nombre'];
	/*echo "Usuario y clave validos...<br>";
	echo "Bienvenido al sistema...<br>";
	echo "Usuario: ".$fila['nombre']."<br>";
	echo "Tipo: ".$fila['tipo']."<br>";*/
	//Guardar valores en variables de sesion
        $ip=$_SERVER["REMOTE_ADDR"]; 
		//$_SESSION['vsId']=$fila['id'];
		$_SESSION['vsIdempresa']=$fila['id_acceso'];

		$_SESSION['base']=$base;
		$_SESSION['year']=$anio;
		$_SESSION['vsClave']=$fila['pass'];
		$_SESSION['vsNombre']=$fila['nombre'];
		$_SESSION['vsUsu']=$fila['user'];
			$_SESSION['nivel']=$fila['nivel'];
			$_SESSION['id']=$fila['id_usuario'];


							$_SESSION['loggedin'] = true;
		
		
	    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
				$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				$date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
				$detalle= "El usuario ".$username." a iniciado sesion el dia ".$date_log." a las ".date('h:i:s a').".";
				$fechaa=date("Y-m-d ");
							
							 $rs= mysqli_query($conn,"INSERT INTO log(nombre, ip, hora, detalle) VALUES('".$username."', '".$ip."', '".$fechaa."', '".$detalle."')");
							//************************************ 
                            //$mysqli->close();

                            if($rs==true){
                             	header("location: dashboard_maintenance.php");
                            }

                            else{

                            	echo "error";
                            }
						
}


                            		

?>