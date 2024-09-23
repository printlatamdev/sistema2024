<?php

include ('../connect3.php');
//$con = conexion();
 include("../session.php");


$id= $_POST["id_orden"];
$opcion= $_POST["origen"];
$tipo= $_POST["tipo"];


if ($opcion=='esa' && $tipo=='accesorios' ) {


	$foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.accesorios.php?id='.$id.'";
    </script>';
}
}
elseif ($opcion=='esa' && $tipo=='metros' ) {


    $foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.metros.php?id='.$id.'";
    </script>';
}
}
elseif ($opcion=='esa' && $tipo=='rigido' ) {


    $foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.rigido.php?id='.$id.'";
    </script>';
}}

elseif ($opcion=='esa' && $tipo=='tela' ) {


    $foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.tela.php?id='.$id.'";
    </script>';
}








}
elseif ($opcion=='esa' && $tipo=='display' ) {


    $foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.display.php?id='.$id.'";
    </script>';
}








}

elseif ($opcion=='esa' && $tipo=='repuestos' ) {


    $foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.repuestos.php?id='.$id.'";
    </script>';
}








}
else{
	include ('../connect2.php');
	$foto=$_FILES['imagen']['name'];
$ruta=$_FILES['imagen']['tmp_name'];
$extension=$_FILES['imagen']['type'];
$destino="../artes_esa17/".$foto;
$res = $mysqli->query("update material SET imagen='".$foto."' where id='".$id."'");

copy($ruta, $destino);

if($res==true)
{

echo'<script type="text/javascript">
    alert("Imagen Ingresada Correctamente");
    window.location.href="../suministros.reporte.materiales.accesorios.php?id='.$id.'";
    </script>';
}
}
	

?>