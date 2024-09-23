<?php

  $cliente = $_POST["cliente"];
$tipo_servicio = $_POST["tipo_servicio"];
$pais_origen = $_POST["pais_origen"];
$pais_destino = $_POST["pais_destino"];
$tipo_camion = $_POST["tipo_camion"];
$fob = $_POST["fob"];




/*
echo $categoria."<br>";
echo $tipo_servicio."<br>";
echo $pais_origen."<br>";
echo $pais_destino."<br>";
echo $tipo_camion."<br>";
echo $fob."<br>";
*/
include('costos.php');


/*$flete='$'.$pais_destino.'_'.$tipo_camion;


$flete2=$flete;*/

//echo $flete.$pais_destino;

$papeleo=30;
$scanner=18;
$seguro=$fob*0.0125;

if ($pais_destino=='gt' || $pais_destino=='hn'|| $pais_destino=='ni' ) {
    $tramite=130;
}elseif ($pais_destino=='cr') {
    $tramite=200;
}
elseif ($pais_destino=='pn') {
     $tramite=250;
}
/*
echo $flete.'<br>';
echo $papeleo.'<br>';
echo $scanner.'<br>';
echo $seguro.'<br>';
echo $tramite.'<br>';
*/

if ($cliente==2 || $tipo_servicio==1) {
   $total=$flete+$papeleo+$scanner+$seguro;
$ddp=$total*1.25; 
}else{
   $total=$flete+$papeleo+$scanner+$seguro+$tramite;
$ddp=$total*1.25;  
}


$ddp2=round($ddp);



echo "<H1>VALOR DEL FLETE : <img src='ajax/salario.png' width=45px;> $".$ddp2."</H1>";












?>			