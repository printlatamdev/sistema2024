
<?php
include('marca/dbconect.php');
require_once('marca/vendor/php-excel-reader/excel_reader2.php');
require_once('marca/vendor/SpreadsheetReader.php');
if (isset($_POST["import"]))
{
    
$allowedFileType = ['application/vnd.ms-excel','text/xls','text/xlsx','application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
  
  if(in_array($_FILES["file"]["type"],$allowedFileType)){

        $targetPath = 'marca/subidas/'.$_FILES['file']['name'];
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

                   //separando la fecha parte por parte
                    $obj_fecha = date_create_from_format('d/m/Y H:i a', $fecha);
                    $fechaComoEntero = date_format($obj_fecha,"d/m/Y/H/i/a");

                    list($dia, $mes, $anio,$hora,$minutos,$valor) = explode("/", $fechaComoEntero);
                    //==========================================================================
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









<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | E-commerce</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- FooTable -->
    <link href="css/plugins/footable/footable.core.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/datapicker/datepicker3.css" rel="stylesheet">

        <script src="js/jquery.min.js"></script>

<!-- Custom styles for this template -->
<link href="marca/assets/sticky-footer-navbar.css" rel="stylesheet">
<link href="marca/assets/style.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">
     <?include("menu.php");?>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            <form role="search" class="navbar-form-custom" action="search_results.html">
                <div class="form-group">
                    <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                </div>
            </form>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Bienvenido al sistema de planilla</span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="float-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a class="dropdown-item float-left" href="profile.html">
                                    <img alt="image" class="rounded-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="float-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html" class="dropdown-item">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="profile.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="float-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <a href="grid_options.html" class="dropdown-item">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="float-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html" class="dropdown-item">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Log out
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>AREAS</h2>
                  
                </div>
                <div class="col-lg-2">

                </div>
            </div>

        <div class="wrapper wrapper-content animated fadeInRight ecommerce">


         

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">

                      




<div class="container">
  <h3 class="mt-5">Subir archivo Excel de Marcaciones Sin "ALTERACIONES"</h3>
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

                    $septimo = 1;
                    

            }
            elseif ($septimo == 1 && $rowminut['diaexacto']=="Lunes"){
                       
                    $acumulasabado=$acumulasabado + 8;
                    
                    $septimo=0;
                    $septimo=3;

            }

                 $aa="vacio";

                 //$marcaentrada="no";


               

            



           

        
            


    

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
        //=========================actualizando horas trabajadas=========================================
        $horastra = "SELECT * FROM min_tarde where id_empleado='".$rowmin['id_empleado']."'";

        //$sqlminu = "SELECT SUM(tardemanana) AS tarde FROM marcacion where num='".$rowmin['id_empleado']."'";
        $resulth = mysqli_query($con, $horastra);
        

       
      
        while ($trab = mysqli_fetch_array($resulth)) {
            $minmanana = $trab['min_manana'];
            $minmediodia = $trab['min_medio_dia'];
            if ($minmanana > 15 || $minmediodia > 10) {
                //$horastotales = ((($acuhorastrab + $acumulasabado) * 60) - ($minmanana + $minmediodia))/60;
                $horastotales = $acuhorastrab + $acumulasabado;
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


        if ($resultadosMed==true) {
  
print "<script>window.location='html/asignar_descuentos_tarde.php';</script>";
}


   }//=======================CIERRE DE WHILE DE LISTA DE EMPLEADOS SIN REPETIRSE=================================


?>
      <!-- Fin Contenido --> 
    </div>
  </div>
  <!-- Fin row --> 

  
</div>























                </div>
            </div>


        </div>
        <div class="footer">
            <div class="float-right">
               
            </div>
            <div>
                <strong>Copyright</strong> Sistema Planilla Color Digital
            </div>
        </div>

        </div>
        </div>



  
<script src="marca/assets/jquery-1.12.4-jquery.min.js"></script> 

<!-- Bootstrap core JavaScript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="marca/dist/js/bootstrap.min.js"></script>


    <!-- Mainly scripts -->
 
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Data picker -->
    <script src="js/plugins/datapicker/bootstrap-datepicker.js"></script>

    <!-- FooTable -->
    <script src="js/plugins/footable/footable.all.min.js"></script>

    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function() {

            $('.footable').footable();

            $('#date_added').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

            $('#date_modified').datepicker({
                todayBtn: "linked",
                keyboardNavigation: false,
                forceParse: false,
                calendarWeeks: true,
                autoclose: true
            });

        });

    </script>

</body>

</html>
