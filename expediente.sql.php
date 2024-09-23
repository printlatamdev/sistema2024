<?php
//error_reporting(E_ALL); 
//ini_set("display_errors", 1);


//******************************************* */
//solo se utiliza para bandera=2
require_once 'reportes/dompdf/autoload.inc.php';
require_once 'reportes/dompdf/lib/html5lib/Parser.php';
require_once 'reportes/dompdf/lib/php-font-lib/src/FontLib/Autoloader.php';
require_once 'reportes/dompdf/lib/php-svg-lib/src/autoload.php';
require_once 'reportes/dompdf/src/Autoloader.php';

Dompdf\Autoloader::register();
use Dompdf\Dompdf;
//*********************************************** */
 

include("session.php");
include("suministros/connect.php");
$bandera=$_REQUEST['bandera'];


if ($bandera==1) {
	
            
            
            $nombres=strtoupper(trim($_REQUEST['nombres']));
            $apellidos=strtoupper(trim($_REQUEST['apellidos']));
            $inicio=$_REQUEST['inicio'];
            $prueba=$_REQUEST['prueba'];

            $nombres1=str_replace(" ","_",$nombres);
            $apellidos1=str_replace(" ","_",$apellidos);
            $file_name=$nombres1."_".$apellidos1;
            
            
            $username = $_SESSION['username'];
       
			$rs=$mysqli->query("INSERT INTO expedientes (nombres, apellidos, contratacion, inicio, prueba, carpeta) VALUES ( '$nombres', '$apellidos', 'EVENTUAL', '$inicio', '$prueba', '$file_name')");

			$id_expediente=$mysqli->insert_id;



                                        //Se Crean carpetas para expedientes**********************************************
                                          $year=date("Y");
                                          
                                          $carpeta_empleado = 'expedientes_'.$_SESSION['base'].'/'. $file_name;

                                          if (!file_exists($carpeta_empleado)) {
                                             
                                                 mkdir($carpeta_empleado, 0777, true);
                                              
                                                } 
                                                 
                                          
                                        //***************************************************************************


			              //****Bitacora del Sistema*******
			
				            $ip=$_SERVER["REMOTE_ADDR"]; 
				            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
				            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
				            $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";
                    $detalle='<font color="blue">'.$_SESSION['username'].'</font> ha creado un nuevo expediente.</br>Detalles:</br> Nombre: <b>'.$nombres.' '.$apellidos.'</b> </br> Fecha Ingreso: <b>'.$inicio.'</b> </br> Vencimineto de periodo de prueba: <b>'.$prueba.'</b>.</br></br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP <font color="red">'.$ip.'</font>.';
                    $rs=$mysqli->query("INSERT INTO log_expediente( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");
			              
						    	 //************************************

			     header("Location: expediente_perfil2.php?id_expediente=".$id_expediente.""); 

			


} elseif($bandera==2) {

            $foto=trim($_POST['foto']);
            $carpeta=trim($_POST['carpeta']);
            $id_expediente=$_POST['id_expediente'];
            $nombres=strtoupper(trim($_POST['nombres']));
            $apellidos=strtoupper(trim($_POST['apellidos']));
            $codigo=strtoupper(trim($_POST['codigo']));
            $empresa=trim($_POST['empresa']);
            $dui=trim($_POST['dui']);
            $nit=trim($_POST['nit']);
            $afp=trim($_POST['afp']);
            $seguro=trim($_POST['seguro']);
            $telefono=trim($_POST['telefono']);
            $licencia=trim($_POST['licencia']);
            $email=trim($_POST['email']);
            $emergencia=trim($_POST['emergencia']);
            $departamento=strtoupper(trim($_POST['departamento']));
            $area=strtoupper(trim($_POST['area']));
            $contratacion=strtoupper(trim($_POST['contratacion']));
            $salario=trim($_POST['salario']);
            $cuenta=trim($_POST['cuenta']);
            $inicio=trim($_POST['inicio']);
            $prueba=trim($_POST['prueba']);
            
            $username = $_SESSION['username'];

            $rs=$mysqli->query("UPDATE `expedientes` SET `nombres`='$nombres', `apellidos`='$apellidos', `codigo`='$codigo', `dui`='$dui', `nit`='$nit', `afp`='$afp', `seguro`='$seguro', `telefono`='$telefono', `licencia`='$licencia', `email`='$email', `emergencia`='$emergencia', `departamento`='$departamento', `area`='$area' ,`contratacion`='$contratacion' ,`salario`='$salario' ,`cuenta`='$cuenta', `inicio`='$inicio', `prueba`='$prueba', `empresa`='$empresa' WHERE id_expediente='$id_expediente' ");
       
           
           
            //********************************************************************************** */
           //Codigo para generar ficha empleado
           
            $pdf_name="FICHA_".$nombres."_".$apellidos.".pdf";

            unlink(dirname(__FILE__) . 'expedientes_'.$_SESSION['base'].'/'. $carpeta.'/'.$pdf_name);

            ob_start();
           
            ?>
                                                   <center>
                                                   <h1>FICHA DE EMPLEADO</h1><br>
                                                   <h1><? echo $nombres." ".$apellidos ?></h1><br><br>
                                                   </center>
                                                   <table align="center" border="1" >
													
                                                    <tr>
                                                        
                                                        <th width="30%" rowspan="16">
                                                        <img width="250px" src="<?=$foto?>" class="img-responsive" alt=""/>
                                                        </th>
                                                        <th width="30%" height="35px">&nbsp;
                                                            <i class="fa  fa-toggle-down"></i> Detalle
                                                        </th>
                                                        <th width="40%">&nbsp;
                                                            <i class="fa  fa-toggle-down"></i> Descripción
                                                        </th>
                                                        
                                                    </tr>
                                                    
                                                    

                                                    <tr>
                                                        <td height="25px" >&nbsp;<b>Codigo:</b></td>
                                                        <td >&nbsp;<?=$codigo;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px" >&nbsp;<b>Empresa:</b></td>
                                                        <td >&nbsp;<?=$empresa;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Departamento:</b></td>
                                                        <td >&nbsp;<?=$departamento;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Area:</b></td>
                                                        <td >&nbsp;<?=$area;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Fecha Inicio:</b></td>
                                                        <td >&nbsp;<?=$inicio;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Contratación:</b></td>
                                                        <td >&nbsp;<?=$contratacion;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Salario:</b></td>
                                                        <td >&nbsp;$<?=$salario;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Cuenta:</b></td>
                                                        <td >&nbsp;<?=$cuenta;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>DUI:</b></td>
                                                        <td >&nbsp;<?=$dui;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>NIT:</b></td>
                                                        <td >&nbsp;<?=$nit;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>AFP:</b></td>
                                                        <td >&nbsp;<?=$afp;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>ISSS:</b></td>
                                                        <td >&nbsp;<?=$seguro;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Licencia:</b></td>
                                                        <td >&nbsp;<?=$licencia;?></td>
                                                    </tr>
                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Email:</b></td>
                                                        <td >&nbsp;<?=$email;?></td>
                                                    </tr>

                                                    <tr>
                                                        <td height="25px">&nbsp;<b>Telefono:</b></td>
                                                        <td >&nbsp;<?=$telefono;?></td>
                                                    </tr>

                                                
                                                    </table>
            <?

            $html = ob_get_clean();
            $dompdf = new Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('letter', 'portrait');
            $dompdf->render();

            $pdf_gen = $dompdf->output();

            file_put_contents('expedientes_'.$_SESSION['base'].'/'. $carpeta.'/'.$pdf_name, $pdf_gen);
           //*************************************************************************************** */
            


           
            header("Location: expediente_perfil2.php?id_expediente=".$id_expediente.""); 
			


	
} elseif($bandera==3) {

             $id_expediente=$_POST['id_expediente'];
             $carpeta=$_POST['carpeta'];
           



            //------------------------------Para reducir foto

            function compress($source, $destination, $quality) {

                $info = getimagesize($source);

                if ($info['mime'] == 'image/jpeg') 
                    $image = imagecreatefromjpeg($source);

                elseif ($info['mime'] == 'image/gif') 
                    $image = imagecreatefromgif($source);

                elseif ($info['mime'] == 'image/png') 
                    $image = imagecreatefrompng($source);

                imagejpeg($image, $destination, $quality);

                return $destination;
            }
            
         
             
                      $source_img = $_FILES['arte']['tmp_name'];
              


                      $num=rand(0000,9999);
                      $nombre=$carpeta.'_'.$num.'.jpg';
                      $destination_img = 'expedientes_'.$_SESSION['base'].'/'. $carpeta.'/'.$nombre;
                      $d = compress($source_img, $destination_img, 25);
                      
            
            
            
            
              $rs=$mysqli->query("UPDATE `expedientes` SET `foto`='$nombre' WHERE id_expediente='$id_expediente' ");
       
            header("Location: expediente_perfil2.php?id_expediente=".$id_expediente.""); 
  
            




        


	
}elseif($bandera==4) {


	      
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="CONTRATO_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `contrato`='$nombre' WHERE id_expediente='$id_expediente'");


     echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver Contrato</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";

/*
   $nombre="CONTRATO_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      









}elseif($bandera==5) {

         
    
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="SOLICITUD_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `solicitud`='$nombre' WHERE id_expediente='$id_expediente'");


    echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver Solicitud</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
 /*
   $nombre="SOLICITUD_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      







}elseif($bandera==6) {





    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="SOLVENCIA_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 
     
     $rs=$mysqli->query("UPDATE `expedientes` SET `solvencia`='$nombre' WHERE id_expediente='$id_expediente'");

     echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver Solvencia</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="SOLVENCIA_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      



	      


}elseif($bandera==7) {


    
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="ANTECEDENTES_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `antecedentes`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver Antecendentes</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="ANTECEDENTES_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      



	     




}elseif($bandera==8) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="DUI_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `dui_scan`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver DUI</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
    /*

   $nombre="DUI_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto

   */
   }
//****************************************************************************************************************************************************//
                      







}elseif($bandera==9) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="AFP_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `afp_scan`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver AFP</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="AFP_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      



}elseif($bandera==10) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="NIT_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `nit_scan`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver NIT</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="NIT_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      



}elseif($bandera==11) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="ISSS_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 

     $rs=$mysqli->query("UPDATE `expedientes` SET `seguro_scan`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver ISSS</a>';



   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="ISSS_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      






}elseif($bandera==12) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];


    //------------------------------Para reducir foto

    function compress($source, $destination, $quality) {

      $info = getimagesize($source);

      if ($info['mime'] == 'image/jpeg') 
          $image = imagecreatefromjpeg($source);

      elseif ($info['mime'] == 'image/gif') 
          $image = imagecreatefromgif($source);

      elseif ($info['mime'] == 'image/png') 
          $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

      return $destination;
  }
  
   //------------------------------Para reducir foto


//****************************************************************************************************************************************************//     
  $path = $_FILES['Filedata']['name'];
  $ext = pathinfo($path, PATHINFO_EXTENSION);
  $num=rand(0000,9999);


  if ($ext=='pdf' || $ext=='PDF' ) {

     $nombre="LICENCIA_".$carpeta.".pdf";

     $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img);
     
     $rs=$mysqli->query("UPDATE `expedientes` SET `licencia_scan`='$nombre' WHERE id_expediente='$id_expediente'");


echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nombre.'" target="_blank">Ver Licencia</a>';


   } else {

    echo "Archivo no permitido subir solo PDF.";
/*
   $nombre="LICENCIA_".$carpeta.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto
*/
   }
//****************************************************************************************************************************************************//
                      



}elseif($bandera==13) {

    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];

    $cd=$mysqli->query("SELECT * FROM expedientes WHERE id_expediente='$id_expediente'");
			  
							
    while ($fila = $cd->fetch_assoc()) {  
       
        $nombres=$fila['nombres'];
        $apellidos=$fila['apellidos'];
        $contrato=$fila['contrato'];
        $solicitud=$fila['solicitud'];
        $solvencia=$fila['solvencia'];
        $antecedentes=$fila['antecedentes'];
        $dui_scan=$fila['dui_scan'];
        $nit_scan=$fila['nit_scan'];
        $afp_scan=$fila['afp_scan'];
        $seguro_scan=$fila['seguro_scan'];
        $licencia_scan=$fila['licencia_scan'];
        $foto=$fila['foto'];

       
   }


    
    $flag=0;
   
   include ('merger/PDFMerger.php');

   $pdf = new PDF;
   
   //****************************************************** */
   $pdf_name="FICHA_".$nombres."_".$apellidos.".pdf";
   if (file_exists('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$pdf_name))
   {
     $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$pdf_name, 'all');

   }
  //******************************************************* */

   if ($contrato!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$contrato, 'all'); $flag=1; }
   if ($solicitud!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solicitud, 'all'); $flag=1;  }
   if ($solvencia!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$solvencia, 'all'); $flag=1; }
   if ($antecedentes!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$antecedentes, 'all'); $flag=1;  }
   if ($dui_scan!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$dui_scan, 'all'); $flag=1; }
   if ($nit_scan!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$nit_scan, 'all'); $flag=1; }
   if ($afp_scan!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$afp_scan, 'all'); $flag=1; }
   if ($seguro_scan!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$seguro_scan, 'all'); $flag=1; }
   if ($licencia_scan!="") {  $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$licencia_scan, 'all'); $flag=1; }

  

  
   if ($flag==0) {


    header("Location: expediente_perfil2.php?id_expediente=".$id_expediente."&alert=1"); 

   } else {

    $ex2=$mysqli->query("SELECT * FROM expedientes_extra WHERE id_expediente='$id_expediente'");
    while ($filaex = $ex2->fetch_assoc()) {  
        
        $documento=$filaex['documento'];
        $pdf->addPDF('expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$documento, 'all');	   
    }
    
    $pdf->merge('download', $carpeta.'.pdf');

   }
   




}elseif($bandera==14) {


          
    $id_expediente=$_REQUEST['id_expediente'];
    $carpeta=$_REQUEST['carpeta'];
    $nombres=$_REQUEST['nombres'];
    $apellidos=$_REQUEST['apellidos'];


//****************************************************************************************************************************************************//     
$path = $_FILES['Filedata']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
$num=rand(0000,9999);


if ($ext=='pdf' || $ext=='PDF' ) {

        $documento=$_FILES["Filedata"]["name"];

        $destination_img = 'expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'. $documento;

        move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img);

        $rs=$mysqli->query("INSERT INTO expedientes_extra (id_expediente, nombres, apellidos, carpeta, documento) VALUES ( '$id_expediente', '$nombres', '$apellidos', '$carpeta', '$documento')");


        $ex2=$mysqli->query("SELECT * FROM expedientes_extra WHERE id_expediente='$id_expediente'");
            while ($fila = $ex2->fetch_assoc()) {  
                
                $documento=$fila['documento'];
                echo '<a href="expedientes_'.$_SESSION['base'].'/'.$carpeta.'/'.$documento.'" target="_blank">Ver '.$documento.'</a><br>';	   
            }
            
} else {

    echo "Archivo no permitido subir solo PDF.";

    }
    
//****************************************************************************************************************************************************//
                      



}elseif($bandera==15) {

     

    $id_expediente=$_REQUEST['id_expediente'];

    $rs=$mysqli->query("UPDATE `expedientes` SET `estado`='0'  WHERE id_expediente='$id_expediente' ");

   


    header("Location: expedientes_lista2.php"); 


}else{
                  
}



$mysqli->close();

?>