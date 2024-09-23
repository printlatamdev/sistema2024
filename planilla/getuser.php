
<?php
include "html/conexion.php";
$q = $_REQUEST['q'];
$descuento= "select*from descuentos where id_empleado='".$q."'";
$descuentos = $con->query($descuento);

$empleado= "select*from empleados where id_empleado='".$q."'";
$empleados = $con->query($empleado);

while ($r2=$empleados->fetch_array()):


$codigo=$r2['codigo_marcacion'];
	endwhile;

$min= "select*from min_tarde where id_empleado='".$codigo."'";
$mins = $con->query($min);

while ($r3=$mins->fetch_array()):


  $min_manana=$r3['min_manana'];
   $min_medio_dia=$r3['min_medio_dia'];


	endwhile;







echo '
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Detalle</th>
      <th scope="col">Minutos tarde Entrada</th>
      <th scope="col">Minutos tarde Almuerzo</th>
      <th scope="col">Monto</th>
     
    </tr>
  </thead>
  <tbody>


  ';


while($row2 = mysqli_fetch_array($descuentos)) { 



if ($row2['id_tipo_descuento']==1) {
		echo '
    <tr>
      <th scope="row">'.$row2['detalle'].'</th>
        <th scope="row">'.$min_manana.'</th>
          <th scope="row">'.$min_medio_dia.'</th>
      <th scope="row">$'.number_format($row2['monto'],2).'</th>
    
    </tr>
   ';
}
else{
  echo '
  <tr>
    <th scope="row">' . $row2['detalle'] . '</th>
    <th scope="row"></th>
    <th scope="row"></th>
    <th scope="row">$' . number_format($row2['monto'], 2) . '</th>
  </tr>
';

}











}

?>











