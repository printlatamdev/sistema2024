<?php
include("session.php");
include("connectin.php");

 
$bandera=$_REQUEST['bandera'];













if ($bandera==1) {
	
            
            $cantidad=number_format($_POST['cant'], 2, '.', '');
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
            $ms=$meses[date('n')-1];
            $fecha_ini=date("d-m-Y");


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
            $path = $_FILES['arte']['name'];
            $ext = pathinfo($path, PATHINFO_EXTENSION);
            $num=rand(0000,9999);
 
        
            if ($ext=='pdf' || $ext=='PDF' ) {
 
               $nombre="TRANFER_".$num.".pdf";
 
               $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/transfer/'. $nombre;
 
               move_uploaded_file($_FILES["arte"]["tmp_name"], $destination_img);
               
               

               $d_m = 'caja_esa18/transfer/'. $nombre;
               move_uploaded_file($_FILES["arte"]["tmp_name"], $d_m);
 
 
             } else {
 
          
             $nombre="TRANSFER_".$num.".".$ext."";
             $source_img = $_FILES['arte']['tmp_name'];
             
             $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/transfer/'. $nombre;
 
             $d = compress($source_img, $destination_img, 75);
             //------------------------------------Fin Para reducir foto
 
             }
     //****************************************************************************************************************************************************//



     //****************************************************************************************************************************************************//     
     $path2 = $_FILES['arte2']['name'];
     $ext2 = pathinfo($path2, PATHINFO_EXTENSION);
     $num2=rand(0000,9999);

 
     if ($ext2=='pdf' || $ext2=='PDF' ) {

        $nombre2="COMPROBANTE_".$num2.".pdf";

        $destination_img2 = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/comprobante/'. $nombre2;

        move_uploaded_file($_FILES["arte2"]["tmp_name"], $destination_img2); 

        $d_m2 = 'caja_esa18/comprobante/'. $nombre2;
        move_uploaded_file($_FILES["arte"]["tmp_name"], $d_m2);


      } else {

      
   
      $nombre2="COMPROBANTE_".$num2.".".$ext2."";
      $source_img2 = $_FILES['arte2']['tmp_name'];
      
      $destination_img2 = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/comprobante/'. $nombre2;

      $d2 = compress($source_img2, $destination_img2, 75);
      //------------------------------------Fin Para reducir foto

      }
//****************************************************************************************************************************************************//
     
     
    

    //******************************************************************************************************************************************** */
      $rs_saldo=$mysqli->query("SELECT `saldo_actual` FROM `caja_saldos` ORDER BY `id_saldo` DESC LIMIT 1");
      $count_saldo=mysqli_num_rows($rs_saldo);

      if ($count_saldo<=0) {
          $saldo_transferido="0.00";
          $saldo_actual=number_format($cantidad, 2, '.', '');
      } else {
        
        while ($fila_saldo = $rs_saldo->fetch_row()) {  $saldo_transferido=$fila_saldo[0];  }

        $total=$saldo_transferido + $cantidad;
        $saldo_actual=number_format($total, 2, '.', '');
    
    
     }
           
   //******************************************************************************************************************************************** */

    $rs=$mysqli->query("INSERT INTO `caja_saldos` ( `mes`, `fecha_ini`, `saldo_transferido`, `saldo_inicial`, `saldo_actual`, `trans`, `retiro`, `estado` ) VALUES ( '$ms', '$fecha_ini', '$saldo_transferido', '$cantidad', '$saldo_actual', '$nombre',  '$nombre2', '2' )");
    
	$caja=$mysqli->insert_id;
			//echo $order;

                      //****Bitacora del Sistema*******
            
                           $ip=$_SERVER["REMOTE_ADDR"]; 
                          
                            $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                            $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";

                            $detalle='<br><font color="blue">'.$_SESSION['vsNombre'].'</font> ha ingresado saldo a Caja Chica .</br>Detalles:<br> Saldo Transferido : <b>C$ '.$saldo_transferido.'</b><br> Saldo Nuevo: <b>C$ '.$cantidad.'</b><br> Saldo Total: <b>C$ '.$saldo_actual.'</b></br>Transferencia Bancaria: <a href="caja_'.$_SESSION['base'].$_SESSION['year'].'/transfer/'.$nombre.'" target="_blank"><img width="50px"   src="caja_'.$_SESSION['base'].$_SESSION['year'].'/transfer/'.$nombre.'"></a></br>Retiro de Dinero: <a href="caja_'.$_SESSION['base'].$_SESSION['year'].'/comprobante/'.$nombre2.'" target="_blank"><img width="50px"   src="caja_'.$_SESSION['base'].$_SESSION['year'].'/comprobante/'.$nombre2.'"></a> </br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';
        

                             $rs=$mysqli->query("INSERT INTO log_caja( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");
                       
                     //************************************

              header("Location: caja.ingreso.php"); 


			


} elseif($bandera==2) {

            

    $id=$_REQUEST['id'];

     //******************************************************************************************************************************************** */
     $rs_saldo=$mysqli->query("SELECT `saldo_actual` FROM `caja_saldos` WHERE id_saldo='$id'");
     $count_saldo=mysqli_num_rows($rs_saldo);

       while ($fila_saldo = $rs_saldo->fetch_row()) {  $saldo_sobrante=number_format($fila_saldo[0], 2, '.', '');  }
  //******************************************************************************************************************************************** */

    $fecha_fin=date("d-m-Y");
    $rs=$mysqli->query("UPDATE `caja_saldos` SET `fecha_fin`='$fecha_fin', `estado`='0'  WHERE id_saldo='$id'");

     //****Bitacora del Sistema*******
            
     $ip=$_SERVER["REMOTE_ADDR"]; 
                          
     $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
     $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";

     $detalle='<br><font color="blue">'.$_SESSION['vsNombre'].'</font> ha finalizado Caja Chica .</br>Detalles:<br> Saldo Sobrante : <b>C$ '.$saldo_sobrante.'</b>.</br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';


      $rs=$mysqli->query("INSERT INTO log_caja( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");

//************************************

    header("Location: caja.ingreso.php"); 



		

	
} elseif($bandera==3) {

            
    $concepto=$_POST['concepto'];
    $monto=$_POST['monto'];
    $solicitante=$_POST['solicitante'];
    $fecha=$_POST['fecha'];
    


//******************************************************************************************************************************************** */
$rs_saldo=$mysqli->query("SELECT `id_saldo`, `saldo_actual` FROM `caja_saldos` WHERE estado='1' ORDER BY `id_saldo` DESC LIMIT 1");
$count_saldo=mysqli_num_rows($rs_saldo);

if ($count_saldo<=0) { } 
else {

while ($fila_saldo = $rs_saldo->fetch_row()) {  $id_saldo=$fila_saldo[0]; $saldo_actual=$fila_saldo[1];  }

}

$saldo_actualizar= $saldo_actual - $monto;
$saldo_actualizar=number_format($saldo_actualizar, 2, '.', '');

$rs=$mysqli->query("UPDATE `caja_saldos` SET `saldo_actual`='$saldo_actualizar' WHERE id_saldo='$id_saldo'");
   
//******************************************************************************************************************************************** */

$rs=$mysqli->query("INSERT INTO `caja_gastos` ( `id_saldo`, `concepto`, `monto`, `solicitante`, `fecha`, `disponible` ) VALUES ( '$id_saldo', '$concepto', '$monto', '$solicitante', '$fecha', '$saldo_actualizar' )");


              //****Bitacora del Sistema*******

                   $ip=$_SERVER["REMOTE_ADDR"]; 
                  
                    $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
                    $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
                    $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";

                    $detalle='<br><font color="blue">'.$_SESSION['vsNombre'].'</font> ha ingresado un gasto a caja chica.</br>Detalles:<br> Concepto: <b>'.$concepto.'</b>, <br>Monto: <b>C$ '.$monto.'</b>, <br>Solicitante: <b>'.$solicitante.'</b>, <br>Fecha: <b>'.$fecha.'</b>, <br>Saldo en Caja Chica: <b> C$ '.$saldo_actualizar.'</b>.</br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';


                     $rs=$mysqli->query("INSERT INTO log_caja( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");
                
             //************************************

      header("Location: caja.descarga.php"); 


	
}elseif($bandera==4) {

    $id_gasto=$_REQUEST['id_gasto'];


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

       $nombre="RECIBO_".$num."_".$id_gasto.".pdf";

       $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'. $nombre;

       move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 


     } else {

  
     $nombre="RECIBO_".$num."_".$id_gasto.".".$ext."";
     $source_img = $_FILES['Filedata']['tmp_name'];
     
     $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'. $nombre;

     $d = compress($source_img, $destination_img, 75);
     

     }
//****************************************************************************************************************************************************//
                        
$rs=$mysqli->query("UPDATE `caja_gastos` SET `comprobante`='$nombre' WHERE id_gasto='$id_gasto'");


echo '<a href="caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'.$nombre.'" target="_blank">Ver</a>';
           


}elseif($bandera==5) {


         
    $id_gasto=$_REQUEST['id_gasto'];


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

     $nombre="RECIBO_".$num."_".$id_gasto.".pdf";

     $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'. $nombre;

     move_uploaded_file($_FILES["Filedata"]["tmp_name"], $destination_img); 


   } else {


   $nombre="RECIBO_".$num."_".$id_gasto.".".$ext."";
   $source_img = $_FILES['Filedata']['tmp_name'];
   
   $destination_img = 'caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'. $nombre;

   $d = compress($source_img, $destination_img, 75);
   //------------------------------------Fin Para reducir foto

   }
//****************************************************************************************************************************************************//
                      
$rs=$mysqli->query("UPDATE `caja_gastos` SET `recibo`='$nombre' WHERE id_gasto='$id_gasto'");


echo '<a href="caja_'.$_SESSION['base'].$_SESSION['year'].'/recibos/'.$nombre.'" target="_blank">Ver</a>';
            




}elseif($bandera==6) {

  
    
    $id=$_REQUEST['id'];


   // $fecha_fin=date("d-m-Y");
    $rs=$mysqli->query("UPDATE `caja_saldos` SET  `estado`='1'  WHERE id_saldo='$id'");

     //****Bitacora del Sistema*******
            
     $ip=$_SERVER["REMOTE_ADDR"]; 
                          
     $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
     $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
     $date_log=$dias[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ."";

     $detalle='<br><font color="blue">'.$_SESSION['vsNombre'].'</font> ha autorizado Caja Chica .</br> El dia '.$date_log.' a las '.date('h:i:s a').' desde la IP '.$ip.'.';


      $rs=$mysqli->query("INSERT INTO log_caja( usuario, ip, hora, detalle) VALUES ('$username', '$ip', '".date("Y-m-d h:i:s")."', '$detalle')");

//************************************

    header("Location: caja.ingreso.php"); 

     


}elseif($bandera==7) {

  
    
   
    
     


}else{




         
                       

}



$mysqli->close();

?>