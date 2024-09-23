
       <?   session_start();

    $base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;

$conexion = mysqli_connect('localhost','root','',''.$bd.'');
if (!$conexion) {
    die('Could not connect: ' . mysqli_error($conexion));
}

mysqli_select_db($conexion,''.$bd.'');
                $conexion = conexion();
                $proyecto = mysqli_query($conexion,"select*from pop_proyecto ");
                $cliente= mysqli_query($conexion,"select*from empresa ");
                 $pais= mysqli_query($conexion,"select*from pais ");
                   $vendedores= mysqli_query($conexion,"select*from vendedores where estado=1 ");
                    $mueble= mysqli_query($conexion,"SELECT * FROM tipo_mueble WHERE estado='1'");


                   
               



                ?>


<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>s</title>
  <script src="assets/admin/pages/scripts/form-samples.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
  <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="form/css/index.css">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>

<link href="assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="assets/global/plugins/select2/select2.css"/>






<link rel="stylesheet" href="add_pop/style.css">


<style type="text/css">
  .image-upload > input
{
    display: none;
}
</style>

</head>
<body>


<form id="msform" name="nuevo_empleado" >

  <ul id="progressbar" style="margin-top: -50px;">
    <li class="active">Datos Orden</li>
    <li>Mueble</li>
    <li>Pliegos</li>

  </ul>
  <!-- fieldsets -->
  <fieldset><!--primer form-->
<? $var=$_GET['idorden'];?>
   
    <div class="row">
      <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Datos Orden<? echo $var;?></div>
   <table class="table">
  <thead>
    <tr>
      <th width="30"></th>
      <th width="30"></th>  
      <th width="30"></th>  
    </tr>
  </thead>
  <tbody>
    <tr>
      <th align="left" width="20"><div class="col-md-2">
          <p align="left">PROYECTO
     


          <select  class="select2_category form-control" style="width: 200px; margin-left: -50px;" name="proyecto" >

            <option>Seleccione P.</option>
            <? while ($filas = mysqli_fetch_array($proyecto))
                                   {
                                           ?>
                          <option value="<? echo $filas[1];?>"> <? echo $filas[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
        </p>

      </div></th>
      <th align="left" width="20"><div class="col-md-2">
          <p align="left">CLIENTE
          <select class="select2_category form-control"  style="width: 200px; margin-left: -10px;" name="cliente">
            <option>Seleccione C.</option>
              <? while ($filasc = mysqli_fetch_array($cliente))
                                   {
                                           ?>
                          <option value="<? echo $filasc[1];?>"> <? echo $filasc[1];?></option>
                                  
                                         

                                          <?}?>
          </select>
        </p>

      </div></th>
      <td align="left" width="20">  <div class="col-md-2">
        <p>VENDEDOR
        <select  class="form-control" style="width: 200px; margin-left: -20px;" name="vendedor">
          <option>Seleccione Vendedor</option>
              <? while ($filasv = mysqli_fetch_array($vendedores))
                                   {
                                           ?>
                          <option value="<? echo $filasv[1];?>"> <? echo $filasv[1];?></option>
                                  
                                         

                                          <?}?>
        </select>
      </p>
      </div>
</td>
     
    </tr>   

      <tr style="height: -10px;"></tr>
     <tr>
      <th align="left" width="20"><div class="col-md-2">
          <p align="left">CONTACTO
          <select  class="form-control" style="width: 200px; margin-left: -50px;" name="contacto">
            <option></option>
          </select>
        </p>

      </div></th>
      <th align="left" width="20"><div class="col-md-2">
          <p align="left">PAIS
          <select  class="form-control" style="width: 200px; margin-left: -10px;" name="pais">
            <option>Seleccione Pais</option>
             <? while ($filasp = mysqli_fetch_array($pais))
                                   {
                                           ?>
                          <option value="<? echo $filasp[3];?>"> <? echo $filasp[3];?></option>
                                  
                                         

                                          <?}?>
          </select>
        </p>

      </div></th>
     <? $fecha =date('Y-m-d');?>
      <td align="left" width="20" >Fecha entrega<input type="date" 
       value="<? echo $fecha;?>"
       min="2019-10-01" max="2020-12-31" name="fecha">
</td>
     
    </tr>   
     </tbody></table></div>
      
      <button onclick="enviarinfo()">enviar</button>
      <div id="resultadosz"><?php include('form/add_pop/consulta.php');?></div>
    <input type="button" name="next" class="next action-button" value="Siguiente"  />
  </fieldset><!--fin primer form-->


  <!-- ********************************************************************MUEBLE**************************************************************************-->
  <fieldset>

    <div class="row">
       <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Mueble</div>
   <table class="table" >
  <thead>
    <tr>
      <th ></th>
      <th ></th>  
      <th ></th> 
      <th ></th>  
      <th ></th>   
    </tr>
  </thead>
  <tbody>
    <tr>
      <th align="left" >
          <p align="left">
     


          <select  class="select2_category form-control"  >

            <option>Seleccione Mueble.</option>
            <? while ($filam = mysqli_fetch_array($mueble))
                                   {
                                           ?>
                          <option value="<? echo $filas[0];?>"> <? echo $filam[1];?></option>
                                  
                                         

                                          <?}?>

          </select>
        </p>

      </th>
      <th align="left" >
          <p align="left">
          <input type="text" name=""  placeholder="CANTIDAD" style="height: 20px;">
         
        </p>

      </th>
      <td> <input type="text" name="" placeholder="BASE" style="height: 20px;"></td>
      <td align="left" >  
     <p align="left">
          <input type="text" name=""  placeholder="ALTURA" style="height: 20px;">
          
        </p>

          
        
</td>
<td><input type="text" name="" placeholder="FONDO" style="height: 20px;"></td>
     
    </tr>   

      <tr style="height: -10px;"></tr>
     <tr>
      
       <th align="left" >
        
          <input type="text" name=""  placeholder="COTIZACION" style="height: 20px;">
    

     </th>

      <td align="left" colspan="3" >  

    <input type="text" name=""  placeholder="Ingrese Nota para la orden."  style="height: 20px;">   </td>
    <td>
    <div class="image-upload">
        <label for="file-input">
           <img src="iconos/upload.png" alt ="Click aquí para subir arte" title ="Click aquí para subir arte" width="80 px" 
           > 
        </label>
            <input id="file-input" name="foto" type="file" />
    </div>

    <img id="imgSalida" width="70px" height="70px" src="iconos/cargando.png"  />

</td>
     
    </tr>   
     </tbody></table></div>
        
    <input type="button" name="previous" class="previous action-button" value="Atras" />
    <input type="button" name="next" class="next action-button" value="Siguiente" />


  </fieldset>
   <!-- ******************************************************************** FIN MUEBLE ********************************************************************-->
  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <h3 class="fs-subtitle">We will never sell it</h3>
    <input type="text" name="fname" placeholder="First Name" />
    <input type="text" name="lname" placeholder="Last Name" />
    <input type="text" name="phone" placeholder="Phone" />
    <textarea name="address" placeholder="Address"></textarea>
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>
</form>
<script language="JavaScript" type="text/javascript" src="form/add_pop/ajax.js"></script>

<script src="assets/admin/pages/scripts/form-samples.js"></script>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script><script  src="form/script.js"></script>

<script type="text/javascript">
  $(window).load(function(){

 $(function() {
  $('#file-input').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $('#imgSalida').attr("src",result);
     }
    });
  });

</script>

<script language="JavaScript" type="text/javascript" src="form/add_pop/ajax.js"></script>
</body>
</html>