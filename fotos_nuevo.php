<?php 
  include("session.php");
include("connect.php");
include("connect2.php");

session_start();
if(!isset($_SESSION['vsClave']))
{
  header("location:login.php");
}

$id=$_GET['id_orden'];
$evento=$_GET['x'];
$pais=$_GET['p'];
if ($pais=="NI") {
	$conexion2 = conexion2();

if ($evento=="cargando") {
	$consulta = mysqli_query($conexion2,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='cargando' group by id_foto
 ");
} else if($evento=="entrega"){
	$consulta= mysqli_query($conexion2,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='entrega' group by id_foto
 ");
} else{
   $consulta = mysqli_query($conexion2,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='evento' group by id_foto
 ");
}
} else {
	$conexion = conexion();

if ($evento=="cargando") {
	$consulta = mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='cargando' group by id_foto
 ");
} else if($evento=="entrega"){
	$consulta= mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='entrega' group by id_foto
 ");
} else{
   $consulta = mysqli_query($conexion,"  select count(id_foto), id_orden, foto, estado, evento from foto_log where id_orden='".$id."' and evento='evento' group by id_foto
 ");
}
}

  


    
	




 ?>
<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	<title>Fotos</title>

	<link rel="stylesheet" href="css/estilos.css">
	<!-- Add jQuery library -->
	<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
	
	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
	
	<!-- Add fancyBox -->
	<link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
	
	<!-- Optionally add helpers - button, thumbnail and/or media -->
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>
	
	<link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
	<script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
	
	
	<style>
	
		h2{
			clear:both;
		}
	
		.single-image img{
			width:300px;
			height:260px;
		}
		
		.gallery-image img{
			width:256px;
			height:260px;
			float:left;
			margin-right:10px;
			border-top: 10px solid black;
		  border-right: 10px solid black;
		  border-bottom: 10px solid black;
		  border-left: 10px solid black;
		}
		
		.fancyOther2{
			cursor:pointer;
		}
		
		
	
	</style>
	
	<script>
	
		$(function(){
		
			$(".single-image").fancybox({
				openEffect : 'elastic',   //'fade', 'elastic'
		    	closeEffect	: 'elastic',
		    	openSpeed:'normal', //ms, slow, normal, fast (default 250ms)
		    	closeSpeed:'normal',
		    	helpers : {
		    		title : {
		    			type : 'inside' //'float', 'inside', 'outside' or 'over'
		    		},
		    		overlay : {
		    			closeClick : true  // if true, se cierra al hacer click fuera de la imagen
       			    }
		    	},
		    	padding:11
		    	
			});
			
			$(".gallery-image").fancybox({
				openEffect : 'fade', 
		    	closeEffect	: 'fade',
		    	closeBtn: false,
		    	helpers : {
		    		title : {
		    			type : 'over' //'float', 'inside', 'outside' or 'over'
		    		},
		    		thumbs : {
			            width: 50
			        },
			        buttons	: {},
			        overlay : {
			            css : {
			                'background' : 'rgba(1,1,1,0.85)'
			            }
        			}
					
		    	}
		    			    	
			});
			
			
			$(".fancyOther").fancybox({
				width		: '100%',
				height		: '100%',
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			
			
			$(".fancyOther2").click(function(){
				$.fancybox( '<div><h1>Lorem Lipsum</h1><p>Lorem lipsum</p></div>', {
   					 title : 'Custom Title',
   					 width		: '70%',
					height		: '70%',
					maxWidth	: 800,
					maxHeight	: 600,
					fitToView	: false,
					autoSize	: false,
					closeClick	: false	 
				});
			});
			
			
			$(".fancyMedia").fancybox({	
				helpers : {
					media : {}
				}
			});
			
			$(".fancyMediaMapa").fancybox({	
				helpers : {
					media : {}
				},
				 width		: '100%',
				height		: '100%'
				
			});

			
			
		
			
		});
		
	</script>

</head>

<body>
	<div align="center"><h2>Fotos <?php echo $evento; ?></h2></div>
    

	<?php 

	$consultax = mysqli_query($conexion,"  select a.id_orden, a.id_proyecto,b.id_proyecto,b.marca from pop a inner join pop_proyecto b on a.id_proyecto=b.id_proyecto where a.id_orden='".$id."'");
	while ($rowx = mysqli_fetch_array($consultax))
                                   {
                                     $marca=$rowx[3];
                                   }
       while ($row = mysqli_fetch_array($consulta))
                                   {

                                    $id_foto=$row[0];
                                    $id_orden=$row[1];
                                    $foto=$row[2];
                                    $estado=$row[3];
                                    $evento=$row[4];?>
                                    <?$cont=$foto;?>
                                    


<div class="container page-top" align="center">

        					  <div class="row" >	
        						<div class="borde-imagen">
        	                       <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                                    	<a class="gallery-image" rel="gallery" href="../sistema/artes_esa17/<?php echo $foto; ?>" title="<?echo $marca; ?>"><img src="../sistema/artes_esa17/<?php echo $foto; ?>" alt=""/></a>
                                    </div>
        						</div>
                               </div>

     
                                  
	 <? }?>
	 <?php if ($foto==null): ?>
                                     <?php $foto="null.jpg"; ?>
                                    <?php endif ?>
                                    
                                    <div class="row" >	
        						<div class="col-lg-3 col-md-4 col-xs-6 thumb">
					                <a href="../sistema/artes_esa17/<?php echo $foto; ?>" class="gallery-image" rel="ligthbox" >

					                     <img  src="../sistema/artes_esa17/<?php echo $foto; ?>" class="zoom img-fluid "  alt=""> 
					                 
					                   
					                </a>
					            </div>
                              </div>
    </div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	

</body>

</html>
