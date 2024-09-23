

<?
session_start();

//$var='<p id="resultado"></p>';
//$vars='<p id="resultado"></p>';
//$var2='<p id="resultado2"></p>';


$pruebaget=$_REQUEST['id_orden']; //obtengo la variable id orden 
//archivos de conexion
include("connect3.php");
$conexion = conexion();

include("connect2.php");
$conexion2 = conexion2();
  
?>
   



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mi envio| Color Digital</title>
  
  
 

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
   
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



    <link rel="stylesheet" href="assets/navigation-dark.css">
    <link rel="stylesheet" href="assets/slicknav/slicknav.min.css">



<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">


  <link href="produccion/css/bootstrap.min.css" rel="stylesheet">
  <link href="produccion/css/style_nav.css" rel="stylesheet">
   <link rel="stylesheet" href="style.css">
     <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="ajax2/ajax.js" type="text/javascript"></script>


  <style>
    .content {
      margin-top: 80px;
    }
  </style>


<style>

input[type="number"] {
   width:100px;
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


      <?
if (trim($pruebaget) == false) {?>


 
   <?  
}
else{?>
 <script type="text/javascript">
 $(function(){
  $("#anuncio").modal();
 });
</script>



<?}

  ?>

<script>
  
    $(function(){
    
      $(".fancyOther").fancybox({
        width   : '100%',
        height    : '100%',
        maxWidth  : 800,
        maxHeight : 600,
        fitToView : false,
        autoSize  : false,
        closeClick  : false,
        openEffect  : 'none',
        closeEffect : 'none'
      }); 
    });
    
  </script>












   
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index_unido.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>COLOR</b>DIGITAL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">BIENVENIDO</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
                  <!-- end message -->
                  
          <!-- Notifications: style can be found in dropdown.less -->
        
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"<? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="perfil/<?php echo $_SESSION['vsFoto']; ?>" class="img-circle" alt="User Image">

                <p>
                 <? echo $nombre;?>
                  <small>Uso exclusivo para clientes 2019<? echo $nombre;?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <? include('aside.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) 
    <section class="content-header">
      <h1>
        REGISTRO
        <small>ENVIOS COLOR DIGITAL SV</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fas fa-door-open"></i> PAGINA PRINCIPAL</a></li>
        <li class="active">REGISTRO</li>
      </ol>
    </section>


 
       <div class="row">
        <div class="col-lg-3 col-xs-6">
      
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?=$conteo_entregadas?></h3>

              <p>ORDENES TERMINADAS</p>
            </div>
            <div class="icon">
              <i class="ion-thumbsup"></i>
            </div>           
          </div>
        </div>
      </div>
    -->
        <!--div que me despliega en toda la pantalla la tabla corte  -->
       <div class="col-md-12">
         
    <!-- Main content -->
  <div class="table-responsive" align="center">
    
   
</form>
<br>
<!--<div id="txtHint"><b>Person info will be listed here.</b></div>-->

 <!-- IFRAME 
  <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="form2.php"><i class="far fa-edit"></i></a>-->
      

      <h4>ORDENES DE PRODUCCION </h4> 
      <div id="resultado2" class="card-body"></div>

        <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="formop2.php"> <input type=image src="icono/add.png"  width="60" height="60"></a>  Agregar Orden.
      <hr />
      

      <?php
      if(isset($_GET['aksi']) == 'delete'){
        // escaping, additionally removing everything that could be (html/javascript-) code
        $nik = mysqli_real_escape_string($con,(strip_tags($_GET["nik"],ENT_QUOTES)));
        $cek = mysqli_query($con, "SELECT * FROM empleados WHERE codigo='$nik'");
        if(mysqli_num_rows($cek) == 0){
          echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
        }else{
          $delete = mysqli_query($con, "DELETE FROM empleados WHERE codigo='$nik'");
          if($delete){
            echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
          }else{
            echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
          }
        }
      }
      ?>
       
      <form class="form-inline" method="get">

        <div class="form-group">

          <select name="filter" class="form-control" onchange="form.submit()">

            <option value="0">Filtro por estado de orden</option>
            <?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
            <option value="1" <?php if($filter == 'Tetap'){ echo 'selected'; } ?>>En espera</option>
            <option value="2" <?php if($filter == 'Kontrak'){ echo 'selected'; } ?>>Impresion</option>
                        <option value="3" <?php if($filter == 'Outsourcing'){ echo 'selected'; } ?>>Corte</option>
          </select>
        </div>
      </form>
      <br />
      <div class="table-responsive">

      <table class="table table-striped table-hover">
        <thead class="bg-primary" >
        <tr>

                    <th># OP</th>
                    <th>Cot</th>
                    <th>Cliente</th>
                    <th>Facturacion</th>
                    <th>Generar</th>
                    
                    
                    
                    <th>Estado</th>
                    <th>Info</th>
                    <th>Data</th>
                    <th>Acciones</th>

        </tr></thead>
        <?php
        $server=$_SERVER['SERVER_ADDR'];
        $year="19";
        $nivel="1";
        $tipo="original";

        if($filter){
          $sql = mysqli_query($con, "SELECT * FROM empleados WHERE estado='$filter' ORDER BY codigo ASC");
        }else{
          $sql = mysqli_query($conexion, "select distinct a.id_orden, a.id_empresa, a.empresa, a.id_contacto, a.contacto, a.fecha_orden, a.fecha_entrega, a.vendedor, a.estado, a.computo, a.impresion, b.id_orden, b.cot from orden a inner join orden_detalle b on a.id_orden=b.id_orden where a.estado='1' order by a.id_orden desc");
          /* select distinct t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado, t1.vendedor ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra from pop t1 INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 */
        }
        if(mysqli_num_rows($sql) == 0){
          echo '<tr><td colspan="8">No hay datos.</td></tr>';
        }else{
          $no = 1;
          while($row = mysqli_fetch_assoc($sql)){
                     $data='#'.$row['id_orden'];
                     $data2=$row['id_orden'];
                     $dataa='#1'.$row['id_orden'];
                     $dataa2='1'.$row['id_orden'];
                     $datab='#2'.$row['id_orden'];
                     $datab2='2'.$row['id_orden'];
                      $documentos='#2019'.$row['id_orden'];
                     $documentos2='2019'.$row['id_orden'];
                     $archive="http://".$server."/browser/elfinder6.php?year=20".$year."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>
              <td>'.$row['cot'].'</td>
              <td> '.$row['empresa'].' </td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target='.$documentos.' aria-expanded="false" aria-controls='.$documentos2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/remision_option.php?id=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-print"></i></a>
              <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="reportes/produccion.imprimir_op_color.php?idorden=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-file-pdf"></i></a></td>
              <?echo'
                         
              <td>';
              if($row['impresion'] == '0'){
                echo '<span class="label label-success">IMPRESION</span>';
              }
                             if ($row['computo'] == '0' ){
                echo '<span class="label label-info">COMPUTO</span>';
              }
                             if ($row['estado'] == 'PRODUCCION' ){
                echo '<span class="label label-warning">PRODUCCION</span>';
              }
              //PRIMER DESPLEGABLE 

            echo '

              </td>
              <td><a class="btn bg-success fas fa-arrow-alt-circle-down" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="<? echo $archive; ?>" class="btn bg-success"><i class="far fa-folder"></i></a></td>
              <td>
                  <a  data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="formop3.php?id_orden=<?echo $row['id_orden']; ?>" class="btn bg-primary"><i class="far fa-edit"></i></a>
                 
                <? echo '<a href="index.php?aksi=delete&nik='.$row['codigo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombres'].'?\')" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
              </td>
            </tr>
            <tr ><td colspan="14"  class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
      <div class="card card-body"><br>';

      include("consulta_item_op.php");?>
      
          


      </div>
    </div>
  </div>

    </td>
    </tr>
    <!-- SEGUNDO DESPLEGABLE -->

    <script>
      <?$n_funcion='s'.$row['id_orden'];?>
function <?echo $n_funcion;?>(str) {
  if (str=="") {
    document.getElementById("<?echo $n_funcion;?>").innerHTML="";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("<?echo $n_funcion;?>").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","getuser_op.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <tr >
              <td colspan="12">
                <div class="col-md-12" >
                   <div class="collapse multi-collapse" id="<? echo $documentos2;?>" style="width:100%" >
                      <div class="card card-body"><br>
                        <?include('form/admin_doc.php');?>
                      </div>
                    </div>
                </div>
              </td>
            </tr>
    <tr >
          <td colspan="14"  class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $dataa2; ?>" style="width:100%" >
              <div class="card card-body">
                <!--<? //include('consulta_mueble.php');?>-->
                <div id="<?echo $n_funcion;?>"><b>sin registro<? echo $n_funcion;?></b></div>


              </div>
            </div>
          </td>
        </tr>
    <!--TERCER DEPLEGABLE-->
        <tr >
          <td colspan="14"  class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $datab2; ?>" style="width:100%" >
              <div class="card card-body">
                <? include('consulta_pliego_op.php');?>
                <button><a class="fa fa-info-circle" data-toggle="collapse" data-target="<? echo $datab; ?>" aria-expanded="false" aria-controls="marcax">CERRAR</a> </button>
                
              </div>
            </div>
          </td>
        </tr>

        
    <!--FIN DE DESPLEGABLES--> 
          <?  
            $no++;
          }
        }
        ?>
      </table>
      </div>
    </div>
  </div><center>
  <p>&copy; Sistemas Color Digital 2020</p>
    </center>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

      
<script class="cssdeck" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
</form><br><br>

<!--fin del div col-md-12  -->
</div>





<form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nota5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
           </div>
           <div class="modal-body">
               <h5 class="modal-title" id="myModalLabel">Material2:</h5>

            <div class="form-group">
                  <input id="par"  type="text" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
        
               
               
                 
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Modificar Descripcion</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   

</form>












  <style type="text/css">
      
.zeroPadding {
  padding: 0 !important;
}
  </style>







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
<!-- SCRIPR DE AJAX PARA PASAR VARIABLES A LA MISMA PAGINA-->
<script type="text/javascript">
  function Hola(nombre,mensaje) {
     var parametros = {"Nombre":nombre,"Mensaje":mensaje};
        $.ajax({
            data:parametros,
            url:'ajax/procesoAjax.php',
            type: 'post',
            dataType: 'json',
            
            success: function (response) { 
                  
                $("#resultado").html(response);
                $("#resultado2").html(response);
            }

        });
        }
</script>
                         


 

<script src="js/seccion.js"></script>

     <script type="text/javascript">

    function pasarDatos2(id) {

    
      document.getElementById('id_orden').value= id;

       
        

        
        


       // document.getElementById('idPrecio').value=id;

          

    }

  </script>

<script type="text/javascript">
  function changeColor(newColor) {
   var elem = document.getElementById('para');
  
}
</script>


      

        <!-- ./col -->
       
      <!-- /.row -->
      <!-- Main row -->
    
<!-- ./wrapper -->

<!-- jQuery 3 -->




<script type="text/javascript">
  


  $(document).ready(function(){
      $("tr.Galleta_Grande").on('click', function()  { 
    $(this).next("tr.Galleta_Chica").toggle(); 
});
      $('tr.Galleta_Grande').click();
});


</script>


<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.js"></script>



  <script src="ajax2/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="ajax2/ajax.js" type="text/javascript"></script>




</body>
</html>
