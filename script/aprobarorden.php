<?php

 include ('../connect.php');
//$con = conexion();
 include("../session.php");


$id_prueba= $_GET["id"];
/*
$capacidad= $_POST["capacidad"];
$id= $_POST["id"];
$origen=  $_POST["origen"];

*/

//echo $carta, $manifiesto, $duca_t, $id;


//echo $status, $nombre_cliente, $destino;

//$telrefe=$_FILES['txtFoto']['name'];
//$ruta=$_FILES['txtFoto']['tmp_name'];
//$extension=$_FILES['txtFoto']['type'];
//$destino="../fotos/".$foto;
//copy($ruta, $destino);

//echo "$nombre, $usuario, $contraseña";

 $consulta =$mysqli->query("  select id_prueba, id_empresa, id_marca, nombre,fecha,empresa,marca,estado from pop_prueba_proyecto where id_prueba='".$id_prueba."'
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {


                                   	$id_prueba=$row[0];
                                   	$id_empresa=$row[1];
                                   	$id_marca=$row[2];
                                   	$nombre=$row[3];
                                   	//$fecha=$row[4];
                                   	$empresa=$row[5];
                                   	$marca=$row[6];

                                   	//$estado=$row[7];
                                   	


                                   }


                                   $year=date("Y");

                                     $proyecto=$nombre;
                
                $proyecto=str_replace("á", "a", $proyecto);
        
                $proyecto=str_replace("é", "e", $proyecto);
        
                $proyecto=str_replace("í", "i", $proyecto);
                
                $proyecto=str_replace("ó", "o", $proyecto);
        
                $proyecto=str_replace("ú", "u", $proyecto);
        
                $proyecto=str_replace("Á", "A", $proyecto);
        
                $proyecto=str_replace("É", "E", $proyecto);
        
                $proyecto=str_replace("Í", "I", $proyecto);
        
                $proyecto=str_replace("Ó", "O", $proyecto);
        
                $proyecto=str_replace("Ú", "U", $proyecto);
        
                $proyecto=str_replace(".", "", $proyecto);
        
                $proyecto=str_replace(",", "", $proyecto);
        
                $proyecto=str_replace("-", "", $proyecto);
        
                $upername=strtoupper($proyecto); 
        

               


                               //$year =date("Y");

                                    $old = umask(0); 
                            $proyect = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername ; 
                            mkdir($proyect, 0777, true);



                            //****************************************************************************************************************************** */

                            $administracion = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/ADMINISTRACION" ; 
                            mkdir($administracion, 0777, true);

                            //****************************************************************************************************************************** */

                            $logistica = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/LOGISTICA" ;
                            mkdir($logistica, 0777, true);
                           

                            //****************************************************************************************************************************** */

                            $reporte1 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Armado_Empacado" ;
                            mkdir($reporte1, 0777, true);

                            $reporte2 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Despacho" ;
                            mkdir($reporte2, 0777, true);

                            $reporte3 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Impresion" ;
                            mkdir($reporte3, 0777, true);

                            $reporte4 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Instalacion" ;
                            mkdir($reporte4, 0777, true);

                            $reporte5 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Render_Final" ;
                            mkdir($reporte5, 0777, true);

                            $reporte6 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/REPORTE/Troquelado" ;
                            mkdir($reporte6, 0777, true);
                            

                            //****************************************************************************************************************************** */

                            $diseno1 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Instructivo" ;
                            mkdir($diseno1, 0777, true);

                            $diseno2 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Impresion" ;
                            mkdir($diseno2, 0777, true);

                            $diseno3 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Artes_Originales" ;
                            mkdir($diseno3, 0777, true);

                            $diseno4 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Planos_Mecanicos" ;
                            mkdir($diseno4, 0777, true);

                            $diseno5 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Renders_Aprobados" ;
                            mkdir($diseno5, 0777, true);

                            $diseno6 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Corte" ;
                            mkdir($diseno6, 0777, true);

                            $diseno7 = "../artes/".$year."/DISPLAYS/".$empresa."/".$marca."/".$upername."/DISENO/Editable" ;
                            mkdir($diseno7, 0777, true);

                            //****************************************************************************************************************************** */

                         

                            umask($old);


	//include ('../connect.php');
     $estado=1;
               $fecha =date('Y-m-d ');
$res2 = $mysqli->query("INSERT INTO pop_proyecto(nombre,fecha,id_empresa,empresa,id_marca,marca,estado) VALUES ('".$nombre."','".$fecha."','".$id_empresa."','".$empresa."','".$id_marca."','".$marca."','".$estado."')");

if($res2==true){

  
    

echo'<script type="text/javascript">
    alert("LA POD AHORA ES OD ACTIVA");
    window.location.href="../display.folder.php";
    </script>';

		
		
	


}

else{
	echo "ha ocurrido un error".$fecha;
}






?>