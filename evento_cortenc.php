<?

$id=$_GET['id'];

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

//$id=$_SESSION['vsIdempresa'];



  include("connect2.php");

   $id       =base64_decode($_GET["id"]); 
   // $evento     = $_GET["v"];
    $evento="corte";



     $conexion = conexion2();

     $consulta = mysqli_query($conexion,"select*from foto_log where id_orden='".$id."' and evento='".$evento."'");
       $consulta2 = mysqli_query($conexion,"select count(id_foto) from foto_log where id_orden='".$id."' and evento='".$evento."' group by id_foto");
       
       while ($row = mysqli_fetch_array($consulta2))
                                   {
                           $existencia=$row[0];
                                   }


     if ($existencia==null) {

            
            $foto="null.jpg";
           

           }

           else{


            $foto="si";


           }







?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
   <link rel="stylesheet" href="assets/demo.css">
    <link rel="stylesheet" href="assets/navigation-dark.css">
    <link rel="stylesheet" href="assets/slicknav/slicknav.min.css">

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <style type="text/css">
    
    body {
  background-color:#1d1d1d !important;
  font-family: "Asap", sans-serif;
  color:#989898;
  margin:10px;
  font-size:16px;
}

#demo {
  height:100%;
  position:relative;
  overflow:hidden;
}


.green{
  background-color:#6fb936;
}
        .thumb{
            margin-bottom: 30px;
        }
        
        .page-top{
            margin-top:85px;
        }

   
img.zoom {
    width: 100%;
    height: 200px;
    border-radius:5px;
    object-fit:cover;
    -webkit-transition: all .3s ease-in-out;
    -moz-transition: all .3s ease-in-out;
    -o-transition: all .3s ease-in-out;
    -ms-transition: all .3s ease-in-out;
}
        
 
.transition {
    -webkit-transform: scale(1.2); 
    -moz-transform: scale(1.2);
    -o-transform: scale(1.2);
    transform: scale(1.2);
}
    .modal-header {
   
     border-bottom: none;
}
    .modal-title {
        color:#000;
    }
    .modal-footer{
      display:none;  
    }

  </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

  <nav class="menu-navigation-dark">
     <a href="evento_impresionnc.php?id=<?php echo $id; ?>"><i class="fa fa-camera-retro"></i><span>Impresion</span></a>
    <a href="evento_cortenc.php?id=<?php echo base64_encode($id); ?>"><i class="fa fa-camera-retro"></i><span>Corte</span></a>
    <a href="evento_acabadonc.php?id=<?php echo base64_encode($id); ?>"> <i class="fa fa-camera-retro"></i><span>Acabados</span></a>

</nav>

<script>

    $(function(){

        var menu = $('.menu-navigation-dark');

        menu.slicknav();

        // Mark the clicked item as selected

        menu.on('click', 'a', function(){
            var a = $(this);

            a.siblings().removeClass('selected');
            a.addClass('selected');
        });
    });

</script>
<script src="assets/slicknav/jquery.slicknav.min.js"></script>

  
<div class="container page-top">



        <div class="row">

          <?if($foto=="null.jpg"){?>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $foto; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/<?php echo $foto; ?>" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>

            <?}else{?>



         

           
           <?php 
                                while ($row = mysqli_fetch_array($consulta))
                                   {

                                   ?>


            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $row['foto']; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/<?php echo $row['foto']; ?>" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
                 <?php
                                 }}
                               ?>

           
           
       </div>

     
      

    </div>

    <script type="text/javascript">
      
      $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        closeEffect: "none"
    });
    
    $(".zoom").hover(function(){
    
    $(this).addClass('transition');
  }, function(){
        
    $(this).removeClass('transition');
  });
});


    $(".rotate").fancybox({   
    width  : 70,
    height : 90,
    type   :''
});
    
    </script>

</body>
</html>
