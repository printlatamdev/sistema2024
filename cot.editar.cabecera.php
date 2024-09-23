
<?
include("session.php");


   
?>

<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Sistema Color Digital</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>



<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>


<link rel="shortcut icon" href="images/color.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-sidebar-fixed page-container-bg-solid">


<?
include("header.php");
?>

<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
  
  
<?
include("menu.php");
//<!-- menu.php contains SIDEBAR -->
?>



  <!-- BEGIN CONTENT -->
  <div class="page-content-wrapper">
    <div  class="page-content">
         <div id="page-content" >
      

      <!-- BEGIN PAGE HEADER

      <div class="page-bar">
        <ul class="page-breadcrumb">
          <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
          </li>
          <li>
            <a href="#">Dashboard</a>
          </li>
        </ul>
        
      </div>

    
      <h3 class="page-title">
      Dashboard <small>reports & statistics</small>
      </h3>
     END PAGE HEADER-->


<!-- ------------CONTENIDO-----------------------------------------------------------------------------------------------  -->




<?
// *********************************************************************************************************************************** //

if (isset($_REQUEST["cot"])) {
   $cot=$_REQUEST["cot"];
}

// *********************************************************************************************************************************** //
?>




<div class="row">




            <div class="col-md-8">


                <div id="contenedor1" class="portlet box blue">
                  <div class="portlet-title">
                    <div class="caption">
                      <i class=" icon-book-open font-green-sunglo"></i> Editar Cotizacion - #<?=$cot?>
                    </div>
                   
                  </div>




                  <div class="portlet-body form">
                    <!-- BEGIN FORM-->
                    <form id="crea" action="cot.sql.php" class="horizontal-form" method="post">
                    <input type="hidden" name="bandera" value="5">
                    <input type="hidden" name="cot" value="<?=$cot?>">

                      <div class="form-body">
                        <h3 class="form-section">Informacion</h3>
                        

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">

                                 <label class="control-label"><strong>Cliente:</strong></label>
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa   fa-briefcase"></i>
                                  </span>
                                  <select id="empresa" name="empresa" class="select2_category form-control"  tabindex="1" required>
                                  <option value="0">Seleccione Empresa</option>
                                      <?php
                                          include("connect.php");
                                          $rs=$mysqli->query("SELECT * FROM empresa");
                                             while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';  }
                                          $mysqli->close();
                                       ?>    
                                    </select>
                                    </div>


                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="form-group">

                                <label class="control-label"><strong>Vendedor:</strong></label>

                                      <div class="input-group">
                                      <span class="input-group-addon input-circle-left">
                                      <i class="fa  fa-user-md"></i>
                                      </span>
                                          <select id="vendedor" name="vendedor" class="select2_category form-control"  tabindex="1">
                                              <?php
                                                  include("connect.php");
                                              
                                                  $rs=$mysqli->query("SELECT * FROM vendedores WHERE estado='1'");
                                                     while ($fila = $rs->fetch_row()) { echo '<option value="'.$fila[0].'">'.$fila[1].'</option>';  }
                                                  $mysqli->close();
                                               ?>    
                                            </select>
                                        </div>
                             

                            </div>
                          </div>
                          <!--/span-->
                        </div>







                           <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">

                                      <label class="control-label"><strong>Contacto:</strong></label>
                                  <div class="input-group">
                                  <span class="input-group-addon input-circle-left">
                                  <i class="fa  fa-users"></i>
                                  </span>
                                  <select id="contacto" name="contacto" class="select2_category form-control"  tabindex="1" required>
                                  <option value="0">Seleccione Contacto</option>        
                                  </select>
                                    </div>

                            </div>
                          </div>
                          <!--/span-->
                          <div class="col-md-6">
                            <div class="form-group">

                                    <label class="control-label "><strong>Fecha:</strong></label>
                                    <input id="fecha" name="fecha" type="text" class="form-control" readonly value="<?=date("d-m-Y");?>">

                            </div>
                          </div>
                          <!--/span-->
                        </div>




                           <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">


                                 <label class="control-label "><strong>Nota:</strong></label>

                             <textarea name="nota" id="nota"  rows="3" data-width="1000" class="form-control">No incluye garantia en caso de accidentes ocasionados por desastres naturales o vandalicos. Si necesita sus Cds de regreso notificarlo a su ejecutvo. Estos son desechados cada 15 dias.</textarea>


                                    

                            </div>
                          </div>
                          <!--/span-->
                         
                          
                        </div>



                      <div class="form-actions left">
                        <button id="nueva_coti" type="button" class="btn blue">Editar Cotizacion</button>
                      </div>
                    </form>
                    <!-- END FORM-->
                  </div>
                </div>






</div>

</div>


</div>


<!----------------- ----------------------------------------------------------------------------------------------------------- -->




<!-- SECCION DE ALERTAS -->

<!-- ******************************************************************************************************************* -->

  <a id="vacio" href="#modal1" role="button"  data-toggle="modal"></a>


  <div id="modal1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
          <h4 class="alert alert-danger"> <i class="fa fa-warning"></i>  <strong>Alerta!</strong></h4>
        </div>
        <div class="modal-body">
          <p>
             <center><h4><strong>Por favor llene todos los campos del formulario.</strong></h4></center>
          </p>
        </div>
        <div class="modal-footer">
          <button data-dismiss="modal" class="btn red">OK</button>
        </div>
      </div>
    </div>
  </div>


<!-- ******************************************************************************************************************* -->




<style>
  
input[type="file"] {
    display: none;
}


.custom-file-upload {
    border: 1px solid #ccc;
    display: inline-block;
    padding: 3px 6px;
    cursor: pointer;
}



 #orden_color {
    
font-size: 18px !important;
font-weight: bold;

}

 


#fms {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 275px;
     
    margin-right: -1px;
    margin-bottom: -1px;


    
}

#fms2 {

     
    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 225px;
    margin-right: -1px;
    margin-bottom: -1px;


     
}


#fms3 {

  
    border-style: solid;
    border-width: 1px;
    padding: 20px;
    height: 135px;
    margin-right: -1px;
    margin-bottom: -1px;
}


#detalle_color{


  width: 400px;
}








/* ********************************************** */

#qw {
   

    border-style: solid;
    border-width: 1px;
    padding: 20px;
    
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}

#qwd1 {

   /* height: 110px;*/
    border-bottom: thin solid #000000;   
}

#qwd2 {

    /*height: 170px;*/
    border-bottom: thin solid #000000;   
}

#qwd3 {

    /*height: 60px;*/
   /* border-bottom: thin solid #000000;  */ 
}



#qw3 {
   

 border-style: solid;
    border-width: 1px;
    padding: 20px;
   
    padding: 0px;
    margin-right: -1px;
    margin-bottom: -1px;
    margin-top: -1px;
        
}
  
#qw0 { 

 display: flex;
      
  }


/* ************************************* */


.label1 { 

 font-size: 16px !important;
 color: black !important;
      
  }


#ex2 { width: 25px; height: 25px;     }



</style>













<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->


</div>
</div>
</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->








<?
include("footer.php");
?>



<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="assets/global/plugins/select2/select2.min.js"></script>
<script src="assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>

<script src="assets/admin/pages/scripts/components-pickers.js"></script>


<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
   FormSamples.init();
   ComponentsPickers.init();   


  
    

  //*****************************************************         
          jQuery('#empresa').change(function(){
            
            jQuery('#contacto').fadeOut();
            jQuery.post("produccion.contactos.php", {emp: jQuery('#empresa').val()}, 
       
                function(response){   
          jQuery('#contacto').html(response);
          jQuery('#contacto').fadeIn();         
            });
              return false;
          });
 //*******************************************************


 //*************************************************************************************************
jQuery("#nueva_coti").click(function(){
jQuery( "#nueva_coti" ).prop( "disabled", true );  

var empresa = jQuery("#empresa").val();
var nom_empresa = jQuery("#empresa option:selected").text();
var vendedor = jQuery("#vendedor").val();
var nom_vendedor = jQuery("#vendedor option:selected").text();
var fecha = jQuery("#fecha").val();
var contacto = jQuery("#contacto").val();
var nota = jQuery("#nota").val();
var nom_contacto = jQuery("#contacto option:selected").text();

if( empresa==0 || contacto==0 )
{
  jQuery('#vacio').click();
  jQuery( "#nueva_coti" ).prop( "disabled", false );
}
else
{


   jQuery('#crea').submit(function() {
    jQuery('#crea').append('<input type="hidden" name="nom_empresa" value="'+nom_empresa+'" /> ');
    jQuery('#crea').append('<input type="hidden" name="nom_vendedor" value="'+nom_vendedor+'" /> ');
    jQuery('#crea').append('<input type="hidden" name="nom_contacto" value="'+nom_contacto+'" /> ');
    return true;
  });

  jQuery("#crea").submit();


}
return false;
});
//**************************************************************************************************



             







});
</script>




<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html> 