<?
include("session.php");
$orden=$_REQUEST['id_orden'];

?>
  
<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8"/>
<title>Sistema Color Digital</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>


<link href="css/font.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>

<link rel="shortcut icon" href="images/color.ico"/>


<script>
function myFunction(val) {
    var v =  val;
    window.open("remision.php?id="+ v, "_blank", "toolbar=yes,scrollbars=yes,resizable=yes,top=125,left=600,width=600,height=550");
}
</script>



</head>
<body  class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-container-bg-solid">




<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
    
    



    <!-- BEGIN CONTENT -->
    
        <div  class="page-content">
             <div id="page-content" >
          


<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->




  



      <!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-4">

          <!-- BEGIN EXAMPLE TABLE PORTLET-->
          <div class="portlet box blue">
            <div class="portlet-title">
              <div class="caption"><i class="fa fa-edit"></i> Ordenes Diseño Activas
              </div>
              <div class="tools"></div>
            </div>
            <div class="portlet-body"> 
              <table class="table table-striped table-bordered table-hover" id="sample_5">
              <thead>
              <tr>   
                <th>ID</th>
                <th>PROYECTO<? echo $orden;?></th>
                
                
              </tr>
              </thead>
              <tbody>
                <?                 
           include ('connect.php');

                   
            $sql="SELECT  * FROM pop_proyecto WHERE estado='1' ORDER BY id_proyecto DESC ";  

            $server=$_SERVER['SERVER_ADDR'];
                     
                     
                   
           $rs=$mysqli->query($sql);
           $p=0;
                     $i=0;
             while($row=$rs->fetch_assoc()){ 
                        
                  
                                    $p= $p + 1;  
                  
                                       
                  if($i==0){$class="default"; $i=1;}
                  else if($i==1){$class="dfs"; $i=0;}

                  

                  if ($_SESSION['nivel']==1 || $_SESSION['nivel']==2 || $_SESSION['nivel']==4 ) {
                    
                        $fin="<a id='close".$row["id_proyecto"]."' class='' data-toggle='modal' href='#'><strong>F</strong></a>";

                  } else {

                        $fin="";

                  }
                  

                 
                                    
                  /*

                                    if($row['computo']=='0' AND $row['impresion']=='0')
                                    
                                         { //$class="danger"; 

                                            $comp="<span class='label label-sm label-warning'>CO</span>";

                                            $imp="<span class='label label-sm label-info'>IMP</span>";
                                         }

                                    else if($row['computo']=='1' AND $row['impresion']=='1')

                                        { }

                                    else if($row['computo']=='0' AND $row['impresion']=='1')

                                        {   $comp="<span class='label label-sm label-warning'>CO</span>";
                                        }

                                    else if($row['computo']=='1' AND $row['impresion']=='0')

                                        {  
                                            $imp="<span class='label label-sm label-info'>IMP</span>"; 
                                        }

                                  */

                                      
                                  

                    /* echo "      
                        <tr class= '".$class."' id='".$row['id_orden']."'>
                        <td width='60px' align='center' ><b>".$row['id_orden']."</b><br></td>
                                                <td> <b><a data-toggle='tab' href='#tab_".$row['id_orden']."'><strong>".$row['empresa']." </strong> <br> <font size='-2'>".$row['contacto']." </font></a></b>
                                                 <br>".$fin."</td></tr> 

                                                 prueba.folder.iframe.php?idorden=".$row['id_prueba']."

                      "; */
                                                
                                                
                                               $nivel=$_SESSION['nivel'];

                                               $tipo="original";

                                              // $nivel=15;
                                            
                                                    $archive="http://".$server."/browser/elfinder6.php?year=2020".$_SESSION['year']."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;
                                        
                                                

                                       


                                          echo "           
                                          <tr class= '".$class."' id='".$row['id_proyecto']."'>

                                           <td  id='maintd'  width='60px' align='center' valign='center' ><b>".$row['id_proyecto']."</b></td>
                                           <td   style='padding:0px'>

                                                   

                                                  <div class='divTable'>
                                                  <div class='divTableBody'>
                                                  <div class='divTableRow'>
                                          <div class='divTableCell'><a class='item' style='color: #000;' data-src='".$archive."' ><strong>".$row['nombre']." </strong> <br><font size='-2'>".$row['empresa']." - ".$row['marca']."</font> </a></div>
                                                  <div align='center' valign='center' class='divTableCell2'>".$fin."</div>
                                                 
                                                  </div>
                                                  
                                                  </div>
                                                  </div>


                                         </td>
                                         </tr>
                                              
                                    "; 










                                          $comp=""; $imp="";

                                        /*
                                          <div align='center' valign='center' class='divTableCell2'><a id='r".$row['id_orden']."' href='#rem".$row['id_orden']."' role='button'  data-toggle='modal'><i class='fa fa-file-text-o'></i></a></div>
                                        */


                                          




                                                                            
              }
                $mysqli->close();
?>

            
              </tbody>   
              </table>
            </div>
          </div>
          <!-- END EXAMPLE TABLE PORTLET-->



          
        </div>

                


                <div class="col-md-7">
                    <div class="tab-content">       




                    
                      <div id='itemcontent' >
                        <iframe class="itemcontent" frameBorder="0" ></iframe>
                    </div>








                    </div>
               </div>








      </div>
      <!-- END PAGE CONTENT-->


        <!-- ******************************************************************************************************************* -->

<a id="exito_fin" href="#modal2" role="button"  data-toggle="modal"></a>


    <div id="modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4  class="alert alert-success"><i class="fa fa-check-square"></i>   <strong>Notificacion</strong></h4>
                </div>
                <div class="modal-body">
                    <p>
                         <center><h4><strong>Se ha finalizado la orden exitosamente.<strong></h4></center>
                    </p>
                </div>
                <div class="modal-footer">
                
                 <button data-dismiss="modal" class="btn green">OK</button> 

               </div>
            </div>
        </div>
    </div>










<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


<style>

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


   #itemcontent{ overflow:hidden !important; height: 790px; }
  .itemcontent{ width: 100% !important; height: 100% !important; }


</style> 


<style type="text/css" media="screen">
a:link { color:#000000; text-decoration: none; }
a:visited { color:#000000; text-decoration: none; }
a:hover { color:#000000; text-decoration: none; }
a:active { color:#000000; text-decoration: underline; }
</style>

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</div>
</div>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->

<?php include("suminstros/footer.php"); ?>

<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/global/plugins/select2/select2.min.js"></script>
<script src="assets/admin/pages/scripts/form-samples.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script>

jQuery(document).ready(function() { 


    jQuery(document).keyup(function(e) {
     if(e.keyCode==13){
         if(!jQuery(e.target).closest('.modal fade in').length) {
             jQuery('.modal').each(function(){
                jQuery('.modal').modal('hide');
            });
         }
     }
});




var TableManaged = function () {



    var initTable5 = function () {



        var table = $('#sample_5');



        /* Fixed header extension: http://datatables.net/extensions/scroller/ */

        var oTable = table.dataTable({
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>", // datatable layout without  horizobtal scroll
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "",
                "lengthMenu": "Mostrando _MENU_ ",
                "search": "<i class='fa fa-search'></i>",
                "zeroRecords": ""
            },

            "scrollY": "600",
            "deferRender": true,
            "order": [
                [0, 'desc']
            ],
            "paging": false           
        });


        var tableWrapper = $('#sample_5_wrapper'); // datatable creates the table wrapper by adding with id {your_table_jd}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }





    var initTable1 = function () {

        var table = $('#sample_1');

        // begin: third table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "",
                "lengthMenu": "Mostrando _MENU_ ",
                "search": "",
                "zeroRecords": ""
            },
            
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 10,
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0, 1]
            }]
             // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_1_wrapper');

        table.find('.group-checkable').change(function () {
            var set = jQuery(this).attr("data-set");
            var checked = jQuery(this).is(":checked");
            jQuery(set).each(function () {
                if (checked) {
                    $(this).attr("checked", true);
                } else {
                    $(this).attr("checked", false);
                }
            });
            jQuery.uniform.update(set);
        });

        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }



    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

            

             initTable5();
             //initTable1();

                                
        }

    };

}();


//*************************************************************************************************************************************



<?

    include("connect.php");
     $sql="SELECT  * FROM pop_proyecto WHERE estado='1' ORDER BY id_proyecto DESC ";  
                      
     $rs=$mysqli->query($sql);

         while($row=$rs->fetch_assoc()){ 


               echo '


                    jQuery("#close'.$row["id_proyecto"].'").click(function(){
                   //jQuery("#static'.$row["id_proyecto"].'").modal("hide");

                    var orden = "'.$row["id_proyecto"].'";
                    var bandera = "21";

                    
                     var dataString = "orden="+ orden + "&bandera="+ bandera;


            jQuery.ajax({
            type: "POST",
            url: "pop.sql.php",
            data: dataString,
            cache: false,
            success: function(result){

                if(result == 1)
                {                    

                    jQuery("#exito_fin").click();
                   
                   
                    jQuery( "#'.$row["id_proyecto"].'" ).hide();
                   // jQuery( "#tab_'.$row["id_proyecto"].'" ).hide();
                    

                }
                else if (result == 0)
                {

                  alert("NOOOOOOOOOOOOOOOO");
                }

             }

            });

                return false;
                });




                    ';




 }
 $mysqli->close();
?>


   TableManaged.init();
   FormSamples.init();
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   
      

           jQuery('a.item').on('click', function(e) {
              var src = jQuery(this).attr('data-src');
              //var height = jQuery(this).attr('data-height') || 300;
              //var width = jQuery(this).attr('data-width') || 400;
              //jQuery("#itemcontent iframe").attr({'src':src,'height': height,'width': width});
              jQuery("#itemcontent iframe").attr({'src':src});

            });
  


});
</script>


</body>
<!-- END BODY -->
</html> 