
<?php

include('dbconect.php');
require_once('vendor/php-excel-reader/excel_reader2.php');
require_once('vendor/SpreadsheetReader.php');

if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  

  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'subidas/'.$_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new SpreadsheetReader($targetPath);
        
        $sheetCount = count($Reader->sheets());

        for($i=0;$i<$sheetCount;$i++)
        {
          
            
            $Reader->ChangeSheet($i);
            
            foreach ($Reader as $Row)
            {
          
                $nombres = "";
                if(isset($Row[0])) {
                    $id_empleado = mysqli_real_escape_string($con,$Row[0]);
                      
                }
                
                $cargo = "";
                if(isset($Row[1])) {
                    $cedula = mysqli_real_escape_string($con,$Row[1]);
                }
        
                $celular = "";
                if(isset($Row[2])) {
                    $nombre = mysqli_real_escape_string($con,$Row[2]);
                }
        
               /** $descripcion = "";
                if(isset($Row[3])) {
                    $descripcion = mysqli_real_escape_string($con,$Row[3]);
                }**/

                $fecha = "";
                if(isset($Row[3])) {
                    $fecha = mysqli_real_escape_string($con,$Row[3]);
                }
                    $anio = date('Y',strtotime($fecha));
                    $mes = date('d',strtotime($fecha));
                    $dia = date('m',strtotime($fecha));
                    $hora = date('H',strtotime($fecha));
                    $minutos = date('i',strtotime($fecha));
                    $segundos = date('s',strtotime($fecha)); 
                    $valor = date('a',strtotime($fecha));

                    $nombredia=$anio.'-'.$mes.'-'.$dia;
                    $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
                    $dexacto = $dias[date('N', strtotime($nombredia))]; 


                    if ($hora==8 && $valor=="am" && $id_empleado!="15" && $id_empleado!="284") {
                        $tardemanana=$minutos;
                        $tardemediodia=0;
                        $tarde=$valor;
                    }else{
                        $tardemanana=0;
                        $tardemediodia=0;

                    }
                    /**if ($hora) {
                        # code...
                    }if (condition) {
                        # code...
                    }if (condition) {
                        # code...
                    }**/

                    //$x=1;
                    //$nombref="saber_dia".$x;
                    //$nombref(' '.$anio.'-'.$mes.'-'.$dia.' ');

                    /** function saber_dia($nombredia) {
                        $dias = array('Domingo','Lunes','Martes','Miercoles','Jueves','Viernes','Sabado');
                        $fechaa = $dias[date('N', strtotime($nombredia))];
                        
                    }**/
                    //$x++;

                   // saber_dia(' '.$anio.'-'.$mes.'-'.$dia.' ');
                    //'.$anio.'-'.$mes.'-'.$dia.'
                

                $sqlVal = "SELECT * FROM marcacion where nombre='".$nombre."' and fecha='".$fecha."'";
                $resultado = mysqli_query($con, $sqlVal);

                if (mysqli_num_rows($resultado) == 0){
                  if (!empty($id_empleado) || !empty($cedula) || !empty($nombre)) {
                        $query = "insert into marcacion(id_empleado, cedula, nombre, fecha, dia, mes, anio, hora, minutos, horario, tardemanana, tardemediodia, diaexacto) values('".$id_empleado."','".$cedula."','".$nombre."','".$fecha."', '".$dia."', '".$mes."', '".$anio."', '".$hora."', '".$minutos."', '".$valor."', '".$tardemanana."', '".$tardemediodia."', '".$dexacto."')";
                        $resultados = mysqli_query($con, $query);

                        $tardemanana=0;
                        $tardemediodia=0;
                    
                        if (! empty($resultados)) {
                            $type = "success";
                            $message = "Excel importado correctamente";
                        } else {
                            $type = "error";
                            $message = "Hubo un problema al importar registros";
                        }
                    }

                }
              

                
             }
        
         }
         //$_FILES['file']['tmp_name']=0;
         header("Location: index2.php");
  }
  else
  { 
        $type = "error";
        $message = "El archivo enviado es invalido. Por favor vuelva a intentarlo";
  }
}
$import="";
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="favicon.ico">
<title>Importar archivo de Excel a MySQL usando PHP - BaulPHP</title>

<!-- Bootstrap core CSS -->
<link href="dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="assets/style.css" rel="stylesheet">

</head>

<body>
<header> 
  <!-- Fixed navbar -->
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> <a class="navbar-brand" href="#">BaulPHP</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active"> <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a> </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0">
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
      </form>
    </div>
  </nav>
</header>

<!-- Begin page content -->

<div class="container">
  <h3 class="mt-5">Importar archivo de Excel a MySQL usando PHP</h3>
  <hr>
  <div class="row">
    <div class="col-12 col-md-12"> 
      <!-- Contenido -->
    
    <div class="outer-container">
        <form action="" method="post"
            name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Elija Archivo Excel</label> <input type="file" name="file"
                    id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Importar Registros</button>
        
            </div>
        
        </form>
        
    </div>
    <div id="response" class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>
    
         
<?php
    $sqlSelect = "SELECT * FROM marcacion";
    $result = mysqli_query($con, $sqlSelect);

if (mysqli_num_rows($result) > 0)
{
?>
        
    <table class='tutorial-table'>
        <thead>
            <tr>
                <th>id_marcacion</th>
                <th>id_empleado</th>
                <th>Cedula</th>
                <th>Nombre</th>
                
                <th>Fecha</th>
                <th>Dia</th>
                <th>Mes</th>
                <th>Anio</th>
                <th>Hora</th>
                <th>Minutos</th>
                <th>Horario</th>
                <th>Tarde Manana</th>
                <th>Tarde Medio Dia</th>
                <th>dia exacto</th>
                  

            </tr>
        </thead>
<?php
    while ($row = mysqli_fetch_array($result)) {
?>                  
        <tbody>
            <tr>
                <td><?php  echo $row['id_marcacion']; ?></td>
                <td><?php  echo $row['id_empleado']; ?></td>
                <td><?php  echo $row['cedula']; ?></td>
                <td><?php  echo $row['nombre']; ?></td>
                

                <td><?php  echo $row['fecha']; ?></td>
                <td><?php  echo $row['dia']; ?></td>
                <td><?php  echo $row['mes']; ?></td>
                <td><?php  echo $row['anio']; ?></td>
                <td><?php  echo $row['hora']; ?></td>
                <td><?php  echo $row['minutos']; ?></td>
                <td><?php  echo $row['horario']; ?></td>
                <td><?php  echo $row['tardemanana']; ?></td>
                <td><?php  echo $row['tardemediodia']; ?></td>
                <td><?php  echo $row['diaexacto']; ?></td>
                

            </tr>
<?php
    }
?>
        </tbody>
    </table>
<?php 
} 
?>

<? 

 $cont=0;
 $acumulamin=0;
 $ydia=0;
  //hasta aqui llega lo borrad0

 //======================================LISTA DE EMPLEADOS SIN REPETIRSE========================================
   $sqlmin = "SELECT DISTINCT id_empleado,nombre from marcacion";
   $result = mysqli_query($con, $sqlmin);

   while ($rowmin = mysqli_fetch_array($result)) {
         
        

        $sqlminu = "SELECT hora, minutos, COUNT(tardemanana) as cant, SUM(tardemanana) as tarde
        FROM marcacion where id_empleado='".$rowmin['id_empleado']."'";

        //$sqlminu = "SELECT SUM(tardemanana) AS tarde FROM marcacion where num='".$rowmin['id_empleado']."'";
        $result1 = mysqli_query($con, $sqlminu);

        while ($rowminu = mysqli_fetch_array($result1)) {
            if ($rowmin['id_empleado']=="15") {
                //$rowminu['tarde']=0;
            }
            if ($rowmin['id_empleado']=="284") {
                //$rowminu['tarde']=0;
            }


            

            
            

            //-------------insertando minutos--------------------------------------paso 1 -----------------------

             $sqlMin = "SELECT * FROM min_tarde where id_empleado ='".$rowmin['id_empleado']."'";
                $resultadoMin = mysqli_query($con, $sqlMin);

                if (mysqli_num_rows($resultadoMin) == 0){
                     $insertminuts = "insert into min_tarde (id_empleado, min_manana, estado) values('".$rowmin['id_empleado']."','".$rowminu['tarde']."','1' )";
                     $resultminuts = mysqli_query($con, $insertminuts);

                }

           

            //---------------------------------------------------------------------------------------------------


        }
       
        $sqlminut = "SELECT * FROM marcacion where id_empleado='".$rowmin['id_empleado']."'";

        //$sqlminu = "SELECT SUM(tardemanana) AS tarde FROM marcacion where num='".$rowmin['id_empleado']."'";
        $result2 = mysqli_query($con, $sqlminut);
        

       
       $acumulamin=0;
       $conth=0;
       $septimo=0;
       $contdias=0;
       $marca1=0;
       $marca2=0;
       $privalorh=0;
       $privalorm=0;
       $conte=0;
       $horastotales=0;
       $diastrab=0;
       $acuhorastrab=0;
       $acumulasabado=0;

       //=======contando lo sabados 
       $consab=0;
       $hsegundo=0;
       $hprimera=0;
       //======================



        while ($rowminut = mysqli_fetch_array($result2)) {
            //$acumulamin=0;
            
 
            if($rowminut['hora'] > 11 && $rowminut['hora'] <= 15 ){
                
              
                //=======================SACANDO MINUTOS TARDE DEL MEDIO DIA POR MEDIO DE MARCACION 1 Y MARCACION 2 ENTRE UN LAPSO DE LAS 12 A LAS 3 PM
                if ($cont==0) {
                    $d = $rowminut['dia'];

                    $primhora=$rowminut['hora'];
                    $primminutos=$rowminut['minutos'];
                    

                }elseif($rowminut['dia']==$d){
                    $seghora=$rowminut['hora'];
                    $segminutos=$rowminut['minutos'];
                   

                    if(($seghora-$primhora)==1){
                        if ($segminutos>$primminutos) {
                            $minmediodia=$segminutos-$primminutos;
                            

                            $acumulamin=$acumulamin+$minmediodia;
                        }else{
                            $minmediodia=0;
                        }

                    }elseif(($seghora-$primhora)>1){
                     $hortarmediodia=(($seghora-$primhora)*60)-60;echo $hortarmediodia."<br>";
                     $minmediodia=$segminutos-$primminutos;echo $minmediodia."<br>";
                     $totalmin=$hortarmediodia + $minmediodia;
                     
                     $acumulamin=$acumulamin+$totalmin;
                     
                    }

                    $cont=0;
                }else{
                    $d = $rowminut['dia'];
                 
                    $primhora=$rowminut['hora'];
                    $primminutos=$rowminut['minutos'];
                    
                }



                $act=$acumulamin;
                $cont++;

                
               

            }



     //=================SACANDO HORAS TRABAJADAS=========================================================
            
            
            
            //$marcaentrada="";
            if ($rowminut['dia'] != $ydia) {
                $aa="distinto";
                
            }

            else{
                $aa="igual";
                
            }




            if ($rowminut['hora'] <= 8 && $aa=="distinto") {

                $hllegadadia=$rowminut['hora'];
                $minllegadadia=$rowminut['minutos'];
                $marcaentrada="si";
                $ydia=$rowminut['dia'];

            }
        //====================================marcacion nocturna============================================= 
            if ($rowminut['hora'] >= 17 && $aa=="distinto") {
                   
                    
                 $marcanoche="si";


            }else{

                 $marcanoche="no";
            }




            if ($rowminut['hora'] >= 1 && $rowminut['hora'] <= 3 && $marcanoche=="si" && $rowminut['horario']=="am" && $rowminut['diaexacto']!="Sabado" && $rowminut['diaexacto']!="Domingo") {
                   
                    $acuhorastrab = $acuhorastrab + 8;
                    $marcanoche="";

            }


            //nuevo para marcaciones sabado a cualquier hora para sacar las 4 horas  //

            if ($rowminut['diaexacto']=="Sabado" && $rowminut['hora'] != 8 ) {

                if ($rowminut['diaexacto']=="Sabado" && $rowminut['hora'] != 12) {
                    if ($hprimera != $rowminut['hora']  && $consab==0) {



                            $hprimera = $rowminut['hora'];
                            $minprimera = $rowminut['minutos'];
                            $consab=1;
                            //====================
                           
                    }
                    
                    if ($hprimera != $rowminut['hora'] && $consab=='1') {
                            $hsegundo=$rowminut['hora'];
                            $minsegundo = $rowminut['minutos'];
                            $consab=0;
                            
                    }                    

                    if (($hsegundo - $hprimera) >= 4 ) {
                        $acumulasabado = $acumulasabado + 8;
                        $rr = $hsegundo - $hprimera;
                        
                        $hsegundo = 0;
                        $hprimera = 0;
                        //$septimo = 1;


                    }
                }

               }
  

        
//==================================validacion Sabado Nocturno====================================
            /**if ($rowminut['diaexacto']=="Sabado" && $aa=="igual") {
                $comparacion = $rowminut['hora'];

                if ($marca1 != $rowminut['hora']) {

                     $marca1 = $rowminut['hora'];
                     $minuto1 = $rowminut['minutos'];

                     if ($marca1 != 8 || $marca1 != 12 ) {

                       
                        if ( $conte==0 ) {
                              $privalorh = $marca1;
                              $privalorm = $minuto1;
                              $marca2 = $rowminut['hora'];
                              $conte = 1;
                          }    
                            

                        else
                            {

                               if ($conte==1) {
                            
                                    $segvalorh = $marca1;
                                    $segvalorm = $minuto1;
                                    $marca2=0;
                                    $conte=0;
                                    $avance="completado";

                                    //$marca2 = $rowminut['hora'];

                                } 
                            }

                        

   
                        
                            
                    }

                }
                

                
            }
            if ($avance=="completado") {
                if (($segvalorh - $privalorh) >= 4 ) {

                    echo "<br><br>".$segvalorh."--".$privalorh."<br><br><br><br>";
                    //$acumulasabado = $acumulasabado + 8;
                        $septimo = 1;
                        $avance = "";
                }
                //$acumulasabado = $acumulasabado + 8;
                
            }**/


            
//===========================================fin validacion======================================
            

            //================================================================================================

            if ($rowminut['hora'] >= 17 && $marcaentrada=="si" && $rowminut['diaexacto']!="Sabado") {
                   
                    $acuhorastrab = $acuhorastrab + 8;
                    $marcaentrada="";



            }elseif ($rowminut['hora'] >= 12 && $marcaentrada=="si" && $rowminut['diaexacto']=="Sabado"){
                       
                    $acumulasabado=$acumulasabado + 8;
                    $marcaentrada = "";

                    //$septimo = 1;
                    

            }
            //lo cambie//
            elseif ($septimo == 1){
                       
                    $acumulasabado=$acumulasabado + 8;
                    
                    $septimo=0;
                    

            }

                 $aa="vacio";

                 //$marcaentrada="no";

            //nuevo codigo para septimo 
            $horastotales = $acuhorastrab + $acumulasabado;

            if (($horastotales / 8) == 6 || ($horastotales / 8) == 12) {
                $septimo=1; 
            }
            //=====================termina codigo nuevo=============================
               
   
   /** if ($rowminut['hora'] >= 17 ) {
        $hllegadanoche
    }
    if ($rowminut['hora'] >= 17 ) {
        $hsalidanoche=;
    }**/


//==================TEMINANDO SACAR HORAS TRABAJADAS=============================================




         /**if ($primhora > $seghora) {

                    $hora1=$primhora;
                    $minuto1=$primminutos;
                    # code...
                }elseif ($primhora < $seghora){
                    $hora2=$seghora;
                    $minuto2=$segminutos;
                }

                if ($primhora==$seghora) {
                    $hora1=$primhora;
                    $hora2=$seghora;
                    $minuto1=$primminutos;
                    $minuto2=$segminutos;
                }
                echo "Primera maracion".$hora1."--".$minuto1."<br>";
                echo "Segunda maracion".$hora2."--".$minuto2."<br>";**/
             
             
           
        }
        //=========================actualizando horas trabajadas==================================
        $horastra = "SELECT * FROM min_tarde where id_empleado='".$rowmin['id_empleado']."'";

        //$sqlminu = "SELECT SUM(tardemanana) AS tarde FROM marcacion where num='".$rowmin['id_empleado']."'";
        $resulth = mysqli_query($con, $horastra);
        

       
      
        while ($trab = mysqli_fetch_array($resulth)) {
            $minmanana = $trab['min_manana'];
            $minmediodia = $trab['min_medio_dia'];
            if ($minmanana > 15 || $minmediodia > 10) {
                $horastotales = ((($acuhorastrab + $acumulasabado) * 60) - ($minmanana + $minmediodia))/60;
            }
            else{
                $horastotales = $acuhorastrab + $acumulasabado;

            }
            
            
        }
        

        if ($rowminut['hora'] >= 1 && $rowminut['horario']=="am") {
            # code...
        }
        $turnocturno = "";

        //========================================================================================
        //=========================Actualizando Minutos===========================================
        
        

        //raulalberto carrillo portero
        if ($rowmin['id_empleado']==15) {
            $horastotales = "00";
            $diastrab = "00";

        }
        //irma adilia limpieza
        if ($rowmin['id_empleado']==218) {
             $horastotales = "00";
             $diastrab = "00";
        }
        //Juan francisco portero
        if ($rowmin['id_empleado']==284) {
             $horastotales = "00";
             $diastrab = "00";
        }
        //amilcar vendedor
        if ($rowmin['id_empleado']==108) {
             $horastotales = "00";
             $diastrab = "00";
        }
        /**otro vendedor
        if ($rowmin['id_empleado']==15) {
             $horastotales = "manual";
            $diastrab = "manual";.
        }**/


        // total de dias trabajados 
        $diastrab= $horastotales / 8 ;

        

        $tardemediodia = "UPDATE min_tarde set min_medio_dia='".$acumulamin."', min_tarde='a actualizar', horas_trab = '".$horastotales."', num_dias_trabajados = '".$diastrab."' where id_empleado='".$rowmin['id_empleado']."'";
        $resultadosMed = mysqli_query($con, $tardemediodia);
        
        
       
        $acuhorastrab = 0;
        $acumulasabado = 0;
//===============================================================================================================


        

   }//=======================CIERRE DE WHILE DE LISTA DE EMPLEADOS SIN REPETIRSE=================================


?>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>
<!-- Fin container -->

<script src="assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>