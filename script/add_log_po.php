<?php

 include ('../connect3.php');
//$con = conexion();
 include("../session.php");
 /*

$id_orden = $_POST["id_orden"];
$id_marca = $_POST["id_marca"];
$nombre_cliente = $_POST["nom_cliente"];
$marca = $_POST["marca"];
//$empaque = $_POST["empaque"];
$placa = $_POST["placa"];
$motorista = $_POST["motorista"];
$destino = $_POST["destino"];
$status = $_POST["status"];
$f_salida = $_POST["f_salida"];
$f_llegada = $_POST["f_llegada"];
/*$manifiesto = $_POST["manifiesto"];
$carta = $_POST["carta"];
$factura = $_POST["factura"];
$duca_f = $_POST["duca_f"];
$duca_t = $_POST["duca_t"];
$nota_cd = $_POST["nota_cd"];
$orden_c = $_POST["orden_c"];
*/

/*
$foto=$_FILES['empaque']['name'];
$ruta=$_FILES['empaque']['tmp_name'];
$extension=$_FILES['empaque']['type'];
$destino="../foto_log/".$foto;

$foto_factura=$_FILES['factura']['name'];
$ruta_factura=$_FILES['factura']['tmp_name'];
$extension_factura=$_FILES['factura']['type'];
$destino_factura="../foto_log/".$foto_factura;

$foto_duca_f=$_FILES['duca_f']['name'];
$ruta_duca_f=$_FILES['duca_f']['tmp_name'];
$extension_duca_f=$_FILES['duca_f']['type'];
$destino_duca_f="../foto_log/".$foto_duca_f;

$foto_nota_cd=$_FILES['nota_cd']['name'];
$ruta_nota_cd=$_FILES['nota_cd']['tmp_name'];
$extension_nota_cd=$_FILES['nota_cd']['type'];
$destino_nota_cd="../foto_log/".$foto_nota_cd;

$foto_orde_c=$_FILES['orden_c']['name'];
$ruta_orde_c=$_FILES['orden_c']['tmp_name'];
$extension_orde_c=$_FILES['orden_c']['type'];
$destino_orde_c="../foto_log/".$foto_orde_c;

/*
$foto_manifiesto=$_FILES['manifiesto']['name'];
$ruta_manifiesto=$_FILES['manifiesto']['tmp_name'];
$extension_manifiesto=$_FILES['manifiesto']['type'];
$destino_manifiesto="../foto_log/".$foto_manifiesto;

$foto_carta=$_FILES['carta']['name'];
$ruta_carta=$_FILES['carta']['tmp_name'];
$extension_carta=$_FILES['carta']['type'];
$destino_carta="../foto_log/".$foto_carta;

$foto_factura=$_FILES['factura']['name'];
$ruta_factura=$_FILES['factura']['tmp_name'];
$extension_factura=$_FILES['factura']['type'];
$destino_factura="../foto_log/".$foto_factura;

$foto_duca_f=$_FILES['duca_f']['name'];
$ruta_duca_f=$_FILES['duca_f']['tmp_name'];
$extension_duca_f=$_FILES['duca_f']['type'];
$destino_duca_f="../foto_log/".$foto_duca_f;

$foto_duca_t=$_FILES['duca_t']['name'];
$ruta_duca_t=$_FILES['duca_t']['tmp_name'];
$extension_duca_t=$_FILES['duca_t']['type'];
$destino_duca_t="../foto_log/".$foto_duca_t;

$foto_nota_cd=$_FILES['nota_cd']['name'];
$ruta_nota_cd=$_FILES['nota_cd']['tmp_name'];
$extension_nota_cd=$_FILES['nota_cd']['type'];
$destino_nota_cd="../foto_log/".$foto_nota_cd;

$foto_orde_c=$_FILES['orden_c']['name'];
$ruta_orde_c=$_FILES['orden_c']['tmp_name'];
$extension_orde_c=$_FILES['orden_c']['type'];
$destino_orde_c="../foto_log/".$foto_orde_c;
*/



//copy($ruta, $destino);
//copy($ruta_manifiesto, $destino_manifiesto);
//copy($ruta_carta, $destino_carta);
//copy($ruta_factura, $destino_factura);
//copy($ruta_duca_f, $destino_duca_f);
//copy($ruta_duca_t, $destino_duca_t);
//copy($ruta_nota_cd, $destino_nota_cd);
//copy($ruta_orde_c, $destino_orde_c);

$id_orden = $_POST["id_orden"];

$status="PROCESO";
//$status = $_POST["status"];
//$f_salida = $_POST["f_salida"];
//$f_llegada = $_POST["f_llegada"];


//echo $id_marca;

//echo $id_marca;
//echo $id_orden, $nom_cliente, $marca, $empaque, $placa, $motorista, $destino, $status, $f_salida, $f_llegada, $manifiesto, $carta, $factura, $duca_f, $duca_t, $nota_cd, $orden_c;
/*
$rs=$mysqli->query("INSERT INTO logistica (id_orden,f_empaque,p_vehiculo,n_motorista,destino,status,f_salida,f_llegada,m_carga,carta_p,factura,duca_f,duca_t,nota_envio_cd,orden_compra,nota_envio,fo_entrega,estado) VALUES ( '$id_orden', '$foto', '$placa', '$motorista', '$destino', '$status', '$f_salida', '$f_llegada','$foto_manifiesto', '$foto_carta', '$foto_factura', '$foto_duca_f','$foto_duca_t','$foto_nota_cd','$foto_orde_c')");


			$order=$mysqli->insert_id;


*/
				 include ('../connect3.php');
$nuevo=$mysqli->query("select id_orden from bitacora_s where id_orden='$id_orden'");
$var=mysqli_num_rows($nuevo);
if($nuevo<0)
{

echo'<script type="text/javascript">
    alert("La logistica ya existe");
    window.location.href="../new_logistica.php";
    </script>';
}
// ------------ Si no esta registrado el usuario continua el script
else
{
$fecha =date('d/m/Y h:i:s a');
$res2 = $mysqli->query("INSERT INTO bitacora_status_po (id_orden,status,f_hora) VALUES ('".$id_orden."','".$status."','".$fecha."')");

$res = $mysqli->query("INSERT INTO logistica_po (id_orden,estado) VALUES ('".$id_orden."','1')");

if($res==true && $res2==true){
	echo'<script type="text/javascript">
    alert("Iniciando Proceso de envio");
    window.location.href="../editar_logistica_po.php";
    </script>';
		
		} else {
		echo 'Error 2'.$id_orden;
	}




}



?>