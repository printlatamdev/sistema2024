
       <?   include("connect.php");
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






<link rel="stylesheet" href="add_pop/style2.css">


<style type="text/css">
  .image-upload > input
{
    display: none;
}
</style>

</head>
<body>


<form id="msform" name="nuevo_empleado" >

  <!-- fieldsets -->
  <fieldset><!--primer form-->
<? $var=$_GET['idorden'];?>
   
    <div class="row">
      <div class="alert alert-info" role="alert" style="margin-top: -40px; height: 15px;">Datos Orden<? echo $var;?></div>
   <table class="table" >
  <thead>
    <tr>
      <th width="30"></th>
      <th width="30"></th>  
           <th width="30" ></th> 
           <br><br><br><br><br>  <br><br>
    </tr>
  </thead>
  <tbody>
   
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