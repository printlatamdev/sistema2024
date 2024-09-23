<?php
error_reporting(-1);
require_once("config.inc.php");

function fecha ($valor)
{
	$timer = explode(" ",$valor);
	$fecha = explode("-",$timer[0]);
	$fechex = $fecha[2]."/".$fecha[1]."/".$fecha[0];
	return $fechex;
}

function buscar_en_array($fecha,$array)
{
	$total_eventos=count($array);
	for($e=0;$e<$total_eventos;$e++)
	{
		if ($array[$e]["fecha"]==$fecha) return true;
	}
}

switch ($_GET["accion"])
{
	case "guardar_evento":
	{
		$insertar="insert into tcalendario (fecha,evento,id_orden) values ('".$_GET["fecha"]."','".strip_tags($_GET["evento"])."','".$_GET["orden"]."')";
		$insertando = $con->query($insertar);
		if ($insertando== true) echo "<p class='ok'>Evento guardado correctamente.</p>";
		else echo "<p class='error'>Se ha producido un error guardando el evento.</p>".$_GET["orden"];
		break;
	}
	case "borrar_evento":
	{
		$query3="delete from tcalendario where id='".$_GET["id"]."' limit 1";
	$query5 = $con->query($query3);
		if ($query5==true) echo "<p class='ok'>Evento eliminado correctamente.</p>";
		else echo "<p class='error'>Se ha producido un error eliminando el evento.</p>";
		break;
	}
	case "generar_calendario":
	{
		$fecha_calendario=array();
		if ($_GET["mes"]=="" || $_GET["anio"]=="") 
		{
			$fecha_calendario[1]=intval(date("m"));
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			$fecha_calendario[0]=date("Y");
		} 
		else 
		{
			$fecha_calendario[1]=intval($_GET["mes"]);
			if ($fecha_calendario[1]<10) $fecha_calendario[1]="0".$fecha_calendario[1];
			else $fecha_calendario[1]=$fecha_calendario[1];
			$fecha_calendario[0]=$_GET["anio"];
		}
		$fecha_calendario[2]="01";
		
		/* obtenemos el dia de la semana del 1 del mes actual */
		$primeromes=date("N",mktime(0,0,0,$fecha_calendario[1],1,$fecha_calendario[0]));
			
		/* comprobamos si el a�o es bisiesto y creamos array de d�as */
		if (($fecha_calendario[0] % 4 == 0) && (($fecha_calendario[0] % 100 != 0) || ($fecha_calendario[0] % 400 == 0))) $dias=array("","31","29","31","30","31","30","31","31","30","31","30","31");
		else $dias=array("","31","28","31","30","31","30","31","31","30","31","30","31");
		
		$eventos=array();
		
		$cnsulta="select * from tcalendario where month(fecha)='".$fecha_calendario[1]."' and year(fecha)='".$fecha_calendario[0]."'";
		$consulta2 = $con->query($cnsulta);
		//$resultadoa=mysqli_query($query56);
		if ($fila=mysqli_fetch_array($consulta2))
		{
			$posicion=0;
			do
			{
				$eventos[$posicion]["id"]=$fila["id"];
				$eventos[$posicion]["fecha"]=$fila["fecha"];
				$eventos[$posicion]["evento"]=$fila["evento"];
				$eventos[$posicion]["id_orden"]=$fila["id_orden"];
				$posicion+=1;
			}
			while($fila=mysqli_fetch_array($consulta2));
		}
		$meses=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
		
		/* calculamos los d�as de la semana anterior al d�a 1 del mes en curso */
		$diasantes=$primeromes-1;
			
		/* los d�as totales de la tabla siempre ser�n m�ximo 42 (7 d�as x 6 filas m�ximo) */
		$diasdespues=42;
			
		/* calculamos las filas de la tabla */
		$tope=$dias[intval($fecha_calendario[1])]+$diasantes;
		if ($tope%7!=0) $totalfilas=intval(($tope/7)+1);
		else $totalfilas=intval(($tope/7));
			
		/* empezamos a pintar la tabla */
		echo "<h2>Calendario de Eventos para: ".$meses[intval($fecha_calendario[1])]." de ".$fecha_calendario[0]."</h2>";
		if (isset($mostrar)) echo $mostrar;
			
		echo "<table class='calendario' cellspacing='0' cellpadding='0'>";
			echo "<tr><th>Lunes</th><th>Martes</th><th>Mi&eacute;rcoles</th><th>Jueves</th><th>Viernes</th><th>S&aacute;bado</th><th>Domingo</th></tr><tr>";
			
			/* inicializamos filas de la tabla */
			$tr=0;
			$dia=1;
			
			for ($i=1;$i<=$diasdespues;$i++)
			{
				if ($tr<$totalfilas)
				{
					if ($i>=$primeromes && $i<=$tope) 
					{
						echo "<td class='";
						/* creamos fecha completa */
						if ($dia<10) $dia_actual="0".$dia; else $dia_actual=$dia;
						$fecha_completa=$fecha_calendario[0]."-".$fecha_calendario[1]."-".$dia_actual;
						
						if (count($eventos)>0 && buscar_en_array($fecha_completa,$eventos)==true) echo "evento";
						
						/* si es hoy coloreamos la celda */
						if (date("Y-m-d")==$fecha_completa) echo " hoy";
						
						echo "'>";
						
						/* recorremos el array de eventos para mostrar los eventos del d�a de hoy */
						$total_eventos=count($eventos);
						$eventos_del_dia="";
						for($e=0;$e<$total_eventos;$e++)
						{
							if ($eventos[$e]["fecha"]==$fecha_completa) 
							{
								$eventos_del_dia.="<p><FONT SIZE=3>".$eventos[$e]["evento"]." &nbsp;&nbsp;&nbsp;&nbsp;orden#".$eventos[$e]["id_orden"]."<a href='#' class='eliminar_evento' rel='".$eventos[$e]["id"]."' title='Eliminar este Evento del ".fecha($fecha_completa)."'><img src='images/delete.png' /></a></p>";
							}
						}
						if ($eventos_del_dia!="")
						{
							echo "<a href='#' data-evento='#evento".$dia_actual."' class='modal' rel='".$fecha_completa."'>".$dia."</a><div class='window' id='evento".$dia_actual."'>";
								echo "<h2>Eventos del ".fecha($fecha_completa)."</h2><a href='#' class='close' rel='".$fecha_completa."'>Cerrar</a><div class='respuesta'></div>";
								echo $eventos_del_dia;
							echo "</div>";
						}
						else echo "$dia";
						/* agregamos enlace a nuevo evento si la fecha no ha pasado */
						if (date("Y-m-d")<=$fecha_completa) echo "<a href='#' data-evento='#nuevo_evento' title='Agregar un Evento el ".fecha($fecha_completa)."' class='modal agregar_evento' rel='".$fecha_completa."'><img src='images/add.png' /></a>";
						
						echo "</td>";
						$dia+=1;
					}
					else echo "<td class='desactivada'>&nbsp;</td>";
					if ($i==7 || $i==14 || $i==21 || $i==28 || $i==35 || $i==42) {echo "<tr>";$tr+=1;}
				}
			}
			echo "</table>";
			
			echo "<div id='nuevo_evento' class='window'>";
				echo "<h2>Agregar un evento el <span id='que_dia'></span></h2><a href='#' class='close' rel='".$fecha_completa."'>Cerrar</a><div id='respuesta_form'></div>";
	$orden="select*from orden where estado=1";
		$ordenes = $con->query($orden);
	



				echo "<form>";



echo "<select name='evento_orden' id='evento_orden' ><option value=''>Seleccione OP</option>";
		while($fila=mysqli_fetch_array($ordenes)){
					echo "<option value='".$fila[0]."'>$fila[0]</option>";

}
echo "</select>";

				echo"<input type='text' name='evento_titulo' id='evento_titulo'><input type='button' name='Enviar' value='Guardar' class='enviar'><input type='hidden' name='evento_fecha' id='evento_fecha'></form>";
			echo "</div>";
			
			$mesanterior=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]-1,01,$fecha_calendario[0]));
			$messiguiente=date("Y-m-d",mktime(0,0,0,$fecha_calendario[1]+1,01,$fecha_calendario[0]));
			echo "<p>&laquo; <a href='#' rel='$mesanterior' class='anterior'>Mes Anterior</a> - <a href='#' class='siguiente' rel='$messiguiente'>Mes Siguiente</a> &raquo;</p>";
		break;
	}
}
?>