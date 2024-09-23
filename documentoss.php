<?
//include("session.php");
//include("connect.php");

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_SESSION['vsIdempresa'];

$id       = $_GET["id"];

   include("connect.php");
   $conexion = conexion();

  $consulta = mysqli_query($conexion,"select t1.id_logistica, t1.id_orden, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada,
   t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.p_vehiculo, t1.comprobante_entrega, t1.guia_aerea, t1.fo_entrega, t1.estado,      t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca from logitica t1 inner join orden t2 on t1.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.id_orden='".$id."'
 ");


                                while ($row = mysqli_fetch_array($consulta))
                                   {
                                    $destino=$row[5];
                                    $manifiesto=$row[9];
                                    $carta_porte=$row[10];
                                    $factura=$row[11];
                                    $duca_f=$row[12];
                                    $duca_t=$row[13];  
                                    $nota_envio=$row[16];
                                    $orden_compra=$row[15];
                                    $p_vehiculo=$row[17];
                                    $comprobante_entrega=$row[18];
                                    $guia_aerea=$row[19];
                                    
                                    
                                                              


                                   }




                                   if ($factura==null) {

                                    $mensaje1="Sin subir";
                                     # code...
                                   }
                                   else{

                                    $mensaje1="Ver Factura";
                                   }

                                 


                                 if ($duca_f==null) {

                                  $mensaje2="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje2="Ver Duca_f";

                                  }

                                   if ($nota_envio==null) {

                                  $mensaje3="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje3="Ver nota_envio";

                                  }


                                   if ($orden_compra==null) {

                                  $mensaje4="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje4="Ver orden_compra";

                                  }
                               



                               if ($carta_porte==null) {

                                  $mensaje5="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje5="Ver Carta_porte";

                                  }

                                   if ($manifiesto==null) {

                                  $mensaje6="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje6="Ver Manifiesto";

                                  }


                                   if ($duca_t==null) {

                                  $mensaje7="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje7="Ver Duca_t";

                                  }
                                  if ($guia_aerea==null) {

                                  $mensaje8="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje8="Guia Aerea";

                                  }
                                  if ($comprobante_entrega==null) {

                                  $mensaje9="Sin subir";
                                   # code...
                                 }
                                  else{

                                            $mensaje9="Ver comprobante_entrega";

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
  background-color:#f2eded !important;
  font-family: "Asap", sans-serif;
  color: #1d1d1d;
  margin:10px;
  font-size:16px;
}
.row{
  color:#1d1d1d;
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
    height: 250px;
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
          <?php if ($p_vehiculo=="Aereo"||$p_vehiculo=="aereo"): ?>
            <!-- FACTURA -->
             <?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/VERFAC.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>
             <!-- guia aerea-->
             <?php if ($guia_aerea!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $guia_aerea; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/VERGUIA.jpg" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
             <?php endif ?>

             <!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/VEROC.jpg" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
             <?php endif ?>

             <!--comprobante de entrega-->
              <?php if ($comprobante_entrega!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $comprobante_entrega; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/VERCE.jpg" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
             <?php endif ?>

            <!-- pdf vacios FACTURA -->
             <?php if ($factura==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFACT.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
               
              
             
             <?php endif ?>
             <!-- GUIA AEREA -->
             <?php if ($guia_aerea==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOGUIA.jpg" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             <?php endif ?>
             <!-- ORDEN DE COMPRA -->
             <?php if ($orden_compra==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOOC.jpg" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             <?php endif ?>
             <!-- comprobante de entrega -->
             <?php if ($comprobante_entrega==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOCE.jpg" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             <?php endif ?>

            
          <?php else: ?>
            <?php if ($destino=="GT"||$destino=="HN"): ?>
            <!--PDF LLENOS -->

            <!-- MANIFIESTO DE CARGA -->
             <?php if ($manifiesto!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERMC.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

             <!-- CARTA PORTE-->
             <?php if ($carta_porte!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERCP.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

              <!-- FACTURA -->
             <?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/VERFAC.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

              <!-- DUCA F-->
             <?php if ($duca_f!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERDF.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
               
             <?php endif ?>

              <!-- NOTA DE ENVIO-->
             <?php if ($nota_envio!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="rotate" >
                         <img  src="../sistema/artes_esa17/IMGPDF/VERNE.jpg" class="zoom img-fluid "  alt="">  
                    </a>
                </div>
             <?php endif ?>

              <!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/VEROC.jpg" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
             <?php endif ?>



            <!--PDF VACIOS-->

             <!-- MANIFIESTO DE CARGA -->
             <?php if ($manifiesto==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOMC.jpg " class="zoom img-fluid "  alt=""> 
              </div>
             <?php endif ?>

              <!-- CARTA PORTE -->
             <?php if ($carta_porte==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOCP.jpg" class="zoom img-fluid "  alt=""> 
          
            </div>
               
             <?php endif ?>

              <!-- FACTURA -->
             <?php if ($factura==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFACT.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
               
              
             
             <?php endif ?>

              <!-- DUCA F-->
             <?php if ($duca_f==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NODF.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
             <?php endif ?>

              
              <!-- NOTA DE ENVIO-->
             <?php if ($nota_envio==null): ?>

               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NONE.jpg" class="zoom img-fluid "  alt=""> 
                </div> 
                
             <?php endif ?>

              <!-- ORDEN DE COMPRA -->
             <?php if ($orden_compra==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOOC.jpg" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             <?php endif ?>
          <?php else: ?>
            <!--PDF LLENOS -->

            <!-- MANIFIESTO DE CARGA -->
             <?php if ($manifiesto!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $manifiesto; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERMC.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

             <!-- CARTA PORTE-->
             <?php if ($carta_porte!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $carta_porte; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERCP.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

              <!-- FACTURA -->
             <?php if ($factura!=null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $factura; ?>" class="fancybox" rel="ligthbox">

                     <img  src="../sistema/artes_esa17/IMGPDF/VERFAC.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
             <?php endif ?>

              <!-- DUCA F-->
             <?php if ($duca_f!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_f; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERDF.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
               
             <?php endif ?>

              <!-- DUCA T -->
             <?php if ($duca_t!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="../sistema/artes_esa17/<?php echo $duca_t; ?>" class="rotate" >

                     <img  src="../sistema/artes_esa17/IMGPDF/VERDT.jpg" class="zoom img-fluid "  alt=""> 
                 
                   
                </a>
            </div>
               
             <?php endif ?>

              <!-- NOTA DE ENVIO-->
             <?php if ($nota_envio!=null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                    <a href="../sistema/artes_esa17/<?php echo $nota_envio; ?>" class="rotate" >
                         <img  src="../sistema/artes_esa17/IMGPDF/VERNE.jpg" class="zoom img-fluid "  alt="">  
                    </a>
                </div>
             <?php endif ?>

              <!-- ORDEN DE COMPRA  -->
             <?php if ($orden_compra!=null): ?>
                 <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                  <a href="../sistema/artes_esa17/<?php echo $orden_compra; ?>" class="rotate" >
                    <img  src="../sistema/artes_esa17/IMGPDF/VEROC.jpg" class="zoom img-fluid "  alt=""> 
                  </a>
                </div>
             <?php endif ?>



            <!--PDF VACIOS-->

             <!-- MANIFIESTO DE CARGA -->
             <?php if ($manifiesto==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOMC.jpg " class="zoom img-fluid "  alt=""> 
              </div>
             <?php endif ?>

              <!-- CARTA PORTE -->
             <?php if ($carta_porte==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOCP.jpg" class="zoom img-fluid "  alt=""> 
          
            </div>
               
             <?php endif ?>

              <!-- FACTURA -->
             <?php if ($factura==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NOFACT.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
               
              
             
             <?php endif ?>

              <!-- DUCA F-->
             <?php if ($duca_f==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NODF.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
             <?php endif ?>

              <!-- DUCA T-->
             <?php if ($duca_t==null): ?>
               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
  
                     <img  src="../sistema/artes_esa17/IMGPDF/NODT.jpg" class="zoom img-fluid "  alt=""> 
          
            </div> 
               
             <?php endif ?>

              <!-- NOTA DE ENVIO-->
             <?php if ($nota_envio==null): ?>

               <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NONE.jpg" class="zoom img-fluid "  alt=""> 
                </div> 
                
             <?php endif ?>

              <!-- ORDEN DE COMPRA -->
             <?php if ($orden_compra==null): ?>
                <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                     <img  src="../sistema/artes_esa17/IMGPDF/NOOC.jpg" class="zoom img-fluid "  alt=""> 
                </div>
                
               
             <?php endif ?>
            
          <?php endif ?>

            
          <?php endif ?>
            

          
            


           
           
            
              
           
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
    width  : 600,
    height : 300,
    type   :'iframe'
});



    

</script>
</body>
</html>
