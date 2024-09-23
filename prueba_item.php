 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>



<link href="css/font.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
 

</head>

<body>

<?php


                                                        
                        include("connect.php");


                         $orden=$_REQUEST['idorden'];


                         $sql="SELECT  * FROM pop WHERE estado='1' AND id_orden='".$orden."'";
                         $rs=$mysqli->query($sql);


                        while ($fila = $rs->fetch_row()) 
                            { 
                                $orden=$fila[0];
                                $empresa=$fila[2];
                                $entrega=date('d-m-Y', strtotime($fila[6]));
                                
                                          
                                        echo '    <div id="tab_'.$orden.'" class="tab-pane">
                                                  <div id="accordion'.$orden.'" class="panel-group">';
                            
                                                            $flg=0;
                                                            $type=0;
                                                            $rs2=$mysqli->query("SELECT *  FROM `pop_detalle` WHERE id_orden='$orden' AND estado!='ANULADA' ORDER BY id_detalle_orden ASC");

                                                          
                                           
                                                            while ($fila2 = $rs2->fetch_assoc()) 
                                                                { 

                                                               
                                                                    
                                                                    $flg=$flg + 1;
                                                                    $id_det=$fila2['id_detalle_orden'];
                                                                    $cantidad=$fila2['cantidad'];
                                                                    $fondo=$fila2['fondo'];
                                                                    $altura=$fila2['altura'];
                                                                    $base=$fila2['base'];
                                                                    $coti=$fila2['cot'];
                                                                    $trabajo=$fila2['trabajo'];
                                                                    $nom_material=$fila2['material'];
                                                                    $nom_rigido=$fila2['rigido'];
                                                                    $nom_laminado=$fila2['laminado'];
                                                                    $nom_equipo=$fila2['equipo'];
                                                                    $impresion=$fila2['tiro'];
                                                                    $nota=$fila2['detalle'];
                                                                    $arte=$fila2['arte'];
                                                                    $cot=$fila2['cot'];
                                                                    $acabado=$fila2['acabado'];
                                                                    $completo=$fila2['completo'];

                                                                     //$findet="<font color='white'><a class='' data-toggle='modal' href='#findet".$fila2['id_detalle_orden']."'><i class='fa fa-wrench'></i></i></a></font>";
                                                                      $findet='';

                                                                        if ($arte=="") {
                                                                            $arte="images/noiamge.png";
                                                                        }else{
                                                                            $arte="artes_".$_SESSION['base'].$_SESSION['year']."/".$fila2['arte'];
                                                                        } 


                                                                

                                                                          $complete="<a class='' data-toggle='modal' href='#static".$id_det."'><span class='label label-sm label-success'><b>Completo</b></span></a>";


                                                                               /*
                                                                                 <font color="white"><i class="fa  fa-caret-right"></i> Cliente:</font> '.$empresa.' &nbsp;&nbsp;&nbsp;&nbsp; 
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> F. Entrega:</font> '.$entrega.' &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> Cot:</font> '.$cot.' &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            <a href="javascript:$(\'#myCollapse\').click();"></a>
                                                                                            */

                                                                            echo'
                                                                                 <!-- BEGIN UNORDERED LISTS PORTLET-->
                                                                                <div class="portlet box blue" >

                                                                                
                                                                                    <div class="portlet-title">
                                                                                        <div class="caption" onClick="javascript:$(\'#myCollapse'.$flg.'\').click();">
                                                                                        
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i>Item</font> '.$flg.' &nbsp;&nbsp;&nbsp;&nbsp;  
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> OP:</font> #'.$orden.' &nbsp;&nbsp;&nbsp;&nbsp;  
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> Mueble:</font> '.$trabajo.' &nbsp;&nbsp;&nbsp;&nbsp;  
                                                                                            <font color="white"><i class="fa  fa-caret-right"></i> Cot:</font> '.$cot.' &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                            
                                                                                            '.$findet.'
                                                                                            
                                                                                        </div>
                                                                                        
                                                                                        <div class="tools"><a id="myCollapse'.$flg.'" href="javascript:;" class="expand"></a></div>


                                                                                    </div>


                                                                            

                                                                                    <div class="portlet-body collapse">






                                                                                      <div class="row">

                                                                                                  <div id="fms0" class="col-md-12">

                                                                                                          <div id="fms" class="col-md-6">

                                                                                                                        <div id="fmsd1" class="col-md-12">

                                                                                                                                  <label class="control-label"><strong>Mueble&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$trabajo.'

                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$cantidad.'  &nbsp;&nbsp; 

                                                                                                                                        '.$complete.': <label id="cpt'.$id_det.'" class="cpt'.$id_det.'" >'.$completo.'</label>


                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                                    <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$base.' (base) X '.$altura.' (altura) X '.$fondo.' (fondo) Metros.
   
                                                                                                                                    

                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                        </div>

                                                                                                                       
                                                                                                                        <div id="fmsd3" class="col-md-12">

                                                                                                                         <label class="control-label "><strong>Nota:</strong></label>
                                                                                                                         '.$nota.' 
                                                                                                                                        

                                                                                                                        </div>

                                                                                                                       
                                                                                                                          
                                                                                                                      
                                                                                                          </div>  


                                                                                                          <div id="fms3" class="col-md-6">   

                                                                                                          <center>
                                                                                                          <a href="'.$arte.'" target="_blank"><img width="210px"   src="'.$arte.'"></a>
                                                                                                          </center> 

                                                                                                          </div>




                                                                                                  </div>
                                                                                                </div> <br>';
                                                                                                $arte="";



//******************************************************************************************************************************************************


                                                      $rs3=$mysqli->query("SELECT *  FROM `pop_pliego` WHERE id_orden='$orden' AND id_detalle='$id_det' AND estado!='ANULADA' ORDER BY id_detalle_pliego ASC");

                                                          
                                           
                                                            while ($fila3 = $rs3->fetch_assoc()) 
                                                                { 

                                                               
                                                                    
                                                                    $flg3=$flg3 + 1;
                                                                    //$id=$fila2[0];
                                                                    $pliego=$fila3['pliego'];
                                                                    $cantidad=$fila3['cantidad'];
                                                                    $altura=$fila3['altura'];
                                                                    $base=$fila3['base'];
                                                                    $coti=$fila3['cot'];
                                                                    $trabajo=$fila3['trabajo'];
                                                                    $nom_material=$fila3['material'];
                                                                    $nom_rigido=$fila3['rigido'];
                                                                    $nom_laminado=$fila3['laminado'];
                                                                    $nom_equipo=$fila3['equipo'];
                                                                    $impresion=$fila3['tiro'];
                                                                    $nota=$fila3['detalle'];
                                                                    $arte2=$fila3['arte'];
                                                                    $cot=$fila3['cot']; 
                                                                    $acabado=$fila3['acabado'];
                                                                    $tiro=$fila3['tiro'];

                                                                    $c_corte=$fila3['completo_corte'];
                                                                    $c_imp=$fila3['completo_imp'];

                                                                     //$findet="<font color='white'><a class='' data-toggle='modal' href='#findet".$fila2['id_detalle_orden']."'><i class='fa fa-wrench'></i></i></a></font>";
                                                                      $findet='';

                                                                        if ($arte2=="") {
                                                                             $arte2="images/noiamge.png";
                                                                        }else{
                                                                            $arte2="artes_".$_SESSION['base'].$_SESSION['year']."/".$fila3['arte'];
                                                                        } 


                                                                     if ($pliego=="COMBINADO") {
                                                                        $color_pliego="red";
                                                                    } else {
                                                                        $color_pliego="green";
                                                                    }



                                                                        echo'
                                                                                <div style="margin-bottom: 0px"  class="portlet box '.$color_pliego.'"><br></div>
                                                                                <div class="row">
                                                                                               
                                                                                                  <div id="fms0" class="col-md-12">

                                                                                                          <div id="fms" class="col-md-6">

                                                                                                                        <div id="fmsd1" class="col-md-12">

                                                                                                                                  <label class="control-label"><strong>Pliego&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                     '.$pliego.'

                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Cantidad&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$cantidad.'  
                                                                                                                                    &nbsp;&nbsp;
                                                                                                                                     <strong><font color="green">Impresiones:</font></strong> '.$c_imp.' 
                                                                                                                                     &nbsp;&nbsp;
                                                                                                                                     <strong><font color="green">Corte:</font></strong> '.$c_corte.' 


                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                                    <label class="control-label "><strong>Tamaño&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$base.' (base) X '.$altura.' (altura) Metros.
   
                                                                                                                                    



                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Material&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$nom_material.'


                                                                                                                                    <div class="clearfix"></div>


                                                                                                                                    <label class="control-label"><strong>Equipo&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</strong></label>
                                                                                                                                    '.$nom_equipo.'


                                                                                                                                    <div class="clearfix"></div>

                                                                                                                                    <label class="control-label"><strong>Impresion&nbsp;:</strong></label>
                                                                                                                                    '.$tiro.'

                                                                                                                                    <div class="clearfix"></div>
                                                                                                                                

                                                                                                                        </div>

                                                                                                                       
                                                                                                                        <div id="fmsd3" class="col-md-12">

                                                                                                                         <label class="control-label "><strong>Nota:</strong></label>
                                                                                                                         '.$nota.' 
                                                                                                                                        

                                                                                                                        </div>

                                                                                                                       
                                                                                                                          
                                                                                                                      
                                                                                                          </div>  


                                                                                                          <div id="fms3" class="col-md-6">   

                                                                                                          <center>
                                                                                                          <a href="'.$arte2.'" target="_blank"><img width="210px"   src="'.$arte2.'"></a>
                                                                                                          </center> 

                                                                                                          </div>




                                                                                                  </div>
                                                                                                </div><br>';
                                                                                                $arte2="";




                                                                    } 






                                                                                                
                                                                                        
                                                                                       
//************************************************************************************************************************************************************************************************



                                                                                  echo  '</div>
                                                                                </div>
                                                                                <!-- END UNORDERED LISTS PORTLET-->';


                                                                                

                                                                                      
                                                                                         


                                                                                                   echo '
                                                                                                              <div id="findet'.$fila2['id_detalle_orden'].'" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                                                                                                    <div class="modal-dialog">
                                                                                                                        <div class="modal-content">
                                                                                                                            <div class="modal-header">
                                                                                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                                                                                                                <h3 class="modal-title">Confirmación</h3>
                                                                                                                            </div>
                                                                                                                            <div class="modal-body">
                                                                                                                                <p>
                                                                                                                                    <h4><b> Desea finalizar la orden #'.$fila2['id_detalle_orden'].'?</b> </h3>
                                                                                                                                </p>
                                                                                                                            </div>
                                                                                                                            <div class="modal-footer">
                                                                                                                                <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                                                                                                                <button id="dit'.$fila2['id_detalle_orden'].'" type="button" data-dismiss="modal" class="btn green">Si</button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                          ';

                                                                                            
 


                                                                                                                     
                                                                    
                                                                }


                                            echo'  </div><br><br><br><br></div>';



                                
                                
                            }

                        $mysqli->close();

                        
                    ?>
















                    <?


                          








    include("connect.php");
     $sql="SELECT  * FROM pop_detalle WHERE estado='PRODUCCION' AND id_orden='".$orden."' ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               echo '
                          <div id="static'.$row["id_detalle_orden"].'" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h3 class="modal-title">Actualización</h3>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                <h4> Ingrese cantidad de muebles completados:</h4>
                                                 <input  type="number" name="quantity'.$row["id_detalle_orden"].'" id="quantity'.$row["id_detalle_orden"].'" min="0" max="'.$row["cantidad"].'" onkeydown="return false">
                                                
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" data-dismiss="modal" class="btn default">Cancelar</button>
                                            <button id="close'.$row["id_detalle_orden"].'" type="button" data-dismiss="modal" class="btn green">Actualizar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                      ';




 }
 $mysqli->close();
?>











<!--
<a href="#"  onclick="window.open(\'home.php\', \'newwindow\', \'top=100,left=600,width=400,height=400\'); return false;"><strong><font color="green">Completados:</font></strong></a>
-->
                    </body>
                    
<style>

input[type="number"] {
   width:100px;
}

hr { background-color: red; height: 1px; border: 0; }

#cld {
    border-style: ridge; border-width: 3px; 
}


/* unvisited link */
a:link {
    color: black;
}

/* visited link */
a:visited {
    color: black;
}

/* mouse over link */
a:hover {
    color: black;
}

/* selected link */
a:active {
    color: black;
}


/* DivTable.com */
.divTable{
    display: table;
    width: 100%;
}
.divTableRow {
    display: table-row;
}
.divTableHeading {
    background-color: #EEE;
    display: table-header-group;
}
.divTableCell, .divTableHead {
    /*border: 1px solid #999999;*/
    display: table-cell;
    padding: 3px 10px;
    border-bottom: 1px solid #000000;
    border-right: 1px solid #000000;
}

.divTableCell2 {
    /*border: 1px solid #999999;*/
    display: table-cell;
    padding: 3px 10px;
    border-bottom: 1px solid #000000;
    border-right: 1px solid #000000;
    width: 10%;
}

.divTableCell3 {
    /*border: 1px solid #999999;*/
    display: table-cell;
    padding: 3px 10px;
    border-bottom: 1px solid #000000;
    width: 10%;
}




.divTableHeading {
    background-color: #EEE;
    display: table-header-group;
    font-weight: bold;
}
.divTableFoot {
    background-color: #EEE;
    display: table-footer-group;
    font-weight: bold;
}
.divTableBody {
    display: table-row-group;
}




/*---------------------------------*/

#sample_5 { 
        border-style: solid;
        border-width: 1px;
        border-color: black;
     }


#maintd { 

         border-bottom: 1px solid #000000;
         border-right: 1px solid #000000;
     }

#maintd2 { border-top: 1px solid #000000;}


#maintd3 { border-bottom: 1px solid #000000;}

#maintd4 { border-left: 1px solid #000000;} 

#maintd5 { border-left: 1px solid #000000; border-bottom: 1px solid #000000;}   

#maintd6 { border-top: 1px solid #000000; border-left: 1px solid #000000;}      

.dfs { background-color: #d3d3d3 !important;  } 

/* Let's get this party started */
::-webkit-scrollbar {
    width: 12px;
}
 
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: rgba(​192,192,192,0.3); 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
    background: rgba(​192,192,192,0.3); 
}



/*------------------------------------------*/





#fms {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}

#fmsd1 {

   /* height: 110px;*/
    border-bottom: thin solid #000000;   
}

#fmsd2 {

    /*height: 170px;*/
    border-bottom: thin solid #000000;   
}

#fmsd3 {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
}



#fms3 {
   

 border-style: solid;
    border-width: 1px;
    padding: 20px;
   
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}
  
#fms0 { 

 display: flex;
      
  }


  .dataTables_filter input { width: 100px !important}



body{


    background-color: "#ffffff" !important;

}












/*------------------------------------------*/





#fmsp {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}

#fmsd1p {

   /* height: 110px;*/
    border-bottom: thin solid #000000;   
}

#fmsd2p {

    /*height: 170px;*/
    border-bottom: thin solid #000000;   
}

#fmsd3p {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
}



#fms3p {
   

 border-style: solid;
    border-width: 1px;
    padding: 20px;
   
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}
  
#fms0p { 

 display: flex;
      
  }

  /*------------------------------------------*/


</style> 


<style type="text/css" media="screen">
a:link { color:#000000; text-decoration: none; }
a:visited { color:#000000; text-decoration: none; }
a:hover { color:#000000; text-decoration: none; }
a:active { color:#000000; text-decoration: underline; }
</style>




<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>






<script src="assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-bootpag/jquery.bootpag.min.js" type="text/javascript"></script> 
<script src="assets/global/plugins/holder.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/ui-general.js" type="text/javascript"></script>




<script>
jQuery(document).ready(function() { 
   
    Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
Demo.init(); // init demo features
   UIGeneral.init();


</script>


</html> 