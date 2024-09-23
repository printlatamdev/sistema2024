<?php

 include ("../connect.php");
//$con = conexion();
 include("../session.php");

$id       = $_POST["id"];
$descripcion = $_POST["descripcion"];
$tipo=$_POST["tipo"];




 
if ($tipo=='tela') {
	include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.tela.php";
    </script>';
}

else{

echo $descripcion.$id;
}



}


elseif ($tipo=='accesorios') {
include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.accesorios.php";
    </script>';
}

else{

echo $descripcion.$id;
}


}


elseif ($tipo=='metros') {
include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.metros.php";
    </script>';
}

else{

echo $descripcion.$id;
}


}
elseif ($tipo=='rigido') {
include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.rigido.php";
    </script>';
}

else{

echo $descripcion.$id;
}


}
elseif ($tipo=='display') {
include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.display.php";
    </script>';
}

else{

echo $descripcion.$id;
}


}


elseif ($tipo=='repuestos') {
include ("../connect.php");

$res = $mysqli->query("update material SET descripcion='".$descripcion."' where id='".$id."'");






if($res==true)
{

echo'<script type="text/javascript">
    alert("Descripcion Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.repuestos.php";
    </script>';
}

else{

echo $descripcion.$id;
}


}


else{

}













?>