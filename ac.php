<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PRUEBA DESPEGABLE</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">

  <link rel="stylesheet" href="css/estilos.css">
  <link rel="stylesheet" href="https://necolas.github.io/normalize.css/3.0.2/normalize.css">
  <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

  
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">



  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(function() {
    $( "#accordion" ).accordion({
     collapsible: true,
     active: false
    });
    $("#h3").on( "click", function() {
        $("#h3").hide();
        return false;
    });
    $("#accordion").on("click", function(){
        $("#h3").show(); 
        return false;        
    });
  });
</script>
</head>
<body>
 <div class="table-responsive" align="center">

    
   
    



                         <table  class="table table-striped table-hover">
                            <thead class="bg-primary" >
                              <tr>

                                   <th  align="center">OC</th>
                                 
                                 <th  align="center">Marca</th>
                                  <th  align="center">Origen</th>
                                 <th  align="center">Destino</th>
                                 <!--<th>Producto</th>
                                <!-- <th>Motorista</th>
                                 <th>Placa</th> -->                               
                                 <th  align="center">ETD</th>
                                 <th  align="center">ETA</th>  
                                 <th  align="center">Items</th>
                                                              
                              
                                
                                    <th  align="center"> &nbsp;&nbsp;&nbsp;&nbsp; Accion</th>
                              


                                

                               </tr>
                            </thead></table>
                              
<div id="accordion"  >




<div class="table-responsive" align="center"> 


                         <table  class="table table-striped table-hover">
                            <thead class="bg-primary" >

 <tr>
      <td scope="col">#</td>
      <td scope="col">First</td>
      <td scope="col">Last</td>
      <td scope="col">Handle</td>
          <td scope="col">First</td>
      <td scope="col">Last</td>
      <td scope="col">Handle</td>
    </tr> </thead></table></div>
    
   <!-- DIV DE CONTENIDO A DESPLEGAR --> <div>
<table><!-- tabla que ordena las subtablas -->

  <tr><!-- TR QUE OCUPAN LAS SUB TABLAS PARA CREAR UNA SOLA LINEA -->

<!--  *********************************************************TABLA 1********************************************************************************-->    
    <td>
  <table border="2">


    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr><tbody><td>hola2222222222222</td><td>holaaaaaaaaaaaaaa</td><td>hola2222222222222</td><td>holaaaaaaaaaaaaaa</td></tbody></div></tr>

   </table></td>

<td>
<!--  ***************************************************************FIN TABLA 1**************************************************************************-->   

<!--  ***************************************************************TABLA 2******************************************************************************-->     
 <table border="2">


    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr><tbody><td>hola2222222222222</td><td>holaaaaaaaaaaaaaa</td><td>hola2222222222222</td><td>holaaaaaaaaaaaaaa</td></tbody></div></tr>

   </table>


</td>
<!--  *******************************************************************FIN TABLA 2**********************************************************************-->   











 </tr><!-- FIN DE TR PRINCIPAL -->

</table> <!-- FIN DE TABLA PRINCIPAL -->

 </div> <!-- FIN DE CONTENIDO -->






  
</div>
 <table class="table table-hover">
    <thead>
        <th></th><th></th><th></th>
    </thead>
    
    <tbody>
        <tr data-toggle="collapse" data-target="#accordion" class="clickable">
            <td>Some Stuff</td>
            <td>Some more stuff</td>
            <td>And some more</td>
        </tr>
        <tr>
            <td colspan="3">
                <div id="accordion" class="collapse">Hidden by default</div>
            </td>
        </tr>
    </tbody>
</table>
 
</body>
</html>