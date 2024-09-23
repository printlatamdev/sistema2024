<?
session_start();
    $base=$_SESSION['base'];
    $anio=22;
//$anio=$_SESSION['year'];
$bd=$base.$anio;

$con = mysqli_connect('localhost','admin','AG784512',''.$bd.'');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,''.$bd.'');
$id=$_REQUEST['id'];




$estado=0;
 $update = mysqli_query($con," update campos SET estado='".$estado."' where id_orden='".$id."'"); 






if ($update==true) {
 echo'<script type="text/javascript">
    alert("po terminada correctamente1!");
    window.location.href="../../lista_campos_nueva.php";
    </script>';
}
else
{

 echo'<script type="text/javascript">
    alert("Error");
     window.location.href="../../lista_campos_nueva.php";
    </script>';


}





/*
echo 'dato cargando :'.$f_cargando.'<br>';

echo 'dato entrega :'.$f_entrega.'<br>';

echo 'dato corte :'.$f_corte.'<br>';

echo 'dato impresion :'.$f_impresion.'<br>';

echo 'dato acabado :'.$f_acabado.'<br>';
 echo '--------------------------------------------';

echo 'dato cargando :'.$c_cargando.'<br>';

echo 'dato entrega :'.$c_entrega.'<br>';

echo 'dato corte :'.$c_corte.'<br>';

echo 'dato impresion :'.$c_impresion.'<br>';

echo 'dato acabado :'.$c_acabado.'<br>';

*/






?>