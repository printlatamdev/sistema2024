
<?

function saber_dia($nombredia) {
$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
$fecha = $dias[date('N', strtotime($nombredia))];
echo $fecha;
}

saber_dia('2020-01-04');

echo "<br><br>";
$arrayMeses = array('Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
   'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre');
 
   $arrayDias = array( 'Domingo', 'Lunes', 'Martes',
       'Miercoles', 'Jueves', 'Viernes', 'Sabado');
     
    echo $arrayDias[date('w')].", ".date('d')." de ".$arrayMeses[date('m')-1]." de ".date('Y');
/*
Resultado, (fecha actual 21/09/2012):
Viernes, 21 de Septiembre de 2012
*/	

function get_nombre_dia($fecha){
   $fechats = strtotime($fecha); //pasamos a timestamp

//el parametro w en la funcion date indica que queremos el dia de la semana
//lo devuelve en numero 0 domingo, 1 lunes,....
switch (date('w', $fechats)){
    case 0: return "Domingo"; break;
    case 1: return "Lunes"; break;
    case 2: return "Martes"; break;
    case 3: return "Miercoles"; break;
    case 4: return "Jueves"; break;
    case 5: return "Viernes"; break;
    case 6: return "Sabado"; break;
}
}


$fechaInicio=strtotime("2016-08-01");
$fechaFin=strtotime("2016-08-20");
//Recorro las fechas y con la función strotime obtengo los lunes
for($i=$fechaInicio; $i<=$fechaFin; $i+=86400){
    //Sacar el dia de la semana con el modificador N de la funcion date
    $dia = date('N', $i);
    if($dia==1){
        //echo "Lunes. ". date ("Y-m-d", $i)."<br>";
        //echo $fechaInicio;
    }
}
echo "<br><br>";

  
  	    $nombredia="2020-01-04";
		$dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
		$dexacto = $dias[date('N', strtotime($nombredia))];
		echo $dexacto;
	
	// ejecutamos la función pasándole la fecha que queremos
	   


?>