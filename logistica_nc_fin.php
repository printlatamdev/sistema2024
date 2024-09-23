

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];

function conexion(){

  $server = 'localhost';
  $usuario = 'admin';
  $clave = 'AG784512';
  $bd = 'nica20';

    $con =mysqli_connect($server, $usuario, $clave, $bd);

     if (!$con){

      die('no conecta amigo ' . mysqli_error());

     }else{


     return($con);

    }

}

$conexion=conexion();

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

  <style type="text/css">
      
.zeroPadding {
  padding: 0 !important;
}
  </style>
 <style type="text/css">



  @import url("https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");


* {
  box-sizing: border-box;
}



table {
  width: 100%;
}
table th {
  text-align: left;
  border-bottom: 1px solid #ccc;
}
table th, table td {
  padding: .4em;
}

table.fold-table > tbody > tr.view td, table.fold-table > tbody > tr.view th {
  cursor: pointer;
}
table.fold-table > tbody > tr.view td:first-child,
table.fold-table > tbody > tr.view th:first-child {
  position: relative;
  padding-left: 20px;
}
table.fold-table > tbody > tr.view td:first-child:before,
table.fold-table > tbody > tr.view th:first-child:before {
  position: absolute;
  top: 50%;
  left: 5px;
  width: 9px;
  height: 16px;
  margin-top: -8px;
  font: 16px fontawesome;
  color: #999;
  content: "\f0d7";
  transition: all .30s ease;
}
table.fold-table > tbody > tr.view:nth-child(4n-1) {
  background: #fff ;
}
table.fold-table > tbody > tr.view:hover {
  background: #E5E7E9;
}
table.fold-table > tbody > tr.view.open {
  background: #AED6F1 ;
  color: #17202A ;
}
table.fold-table > tbody > tr.view.open td:first-child:before, table.fold-table > tbody > tr.view.open th:first-child:before {
  transform: rotate(-180deg);
  color: #17202A ;
}
table.fold-table > tbody > tr.fold {
  display: none;
}
table.fold-table > tbody > tr.fold.open {
  display: table-row;
}

.fold-content {
  padding: .5em;
}
.fold-content h3 {
  margin-top: 0;
}
.fold-content > table {
  border: 2px solid #ccc;
}
.fold-content > table > tbody tr:nth-child(even) {
  background: #eee;
}
</style>


<style type="text/css">

 

.fancybox-slide--iframe .fancybox-content {
  width  : 1700px;
  height : 1700px;
  max-width  : 66%;
  max-height : 80%;
  margin: 0;
  background: #191919;
}

 
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
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>C</b>D</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>COLOR</b>DIGITAL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">BIENVENIDO </span>
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
              <img src="imagenes/persona.png" class="user-image" alt="User Image">
              <span class="hidden-xs"> <? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="imagenes/persona.png" class="img-circle" alt="User Image">

                <p>
                
                  <small>Uso exclusivo Color Digital 20<?echo $anio;?> <br> <? echo $nombre.$id;?></small>
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
  <? include ('aside.php');?>
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
       

       

               

           
   


 <?$consulta78 = mysqli_query($conexion,"select DISTINCT t1.id_logistica, t1.id_orden, t1.origen, t1.numorden_compra, t1.f_empaque, t1.p_vehiculo, t1.n_motorista, t1.destino, t1.status, t1.f_salida, t1.f_llegada, t1.m_carga, t1.carta_p, t1.factura, t1.duca_f, t1.duca_t, t1.nota_envio_cd, t1.orden_compra,t1.nota_envio, t1.fo_entrega, t1.estado,t1.descripcion,t2.id_orden, t2.id_empresa, t2.empresa, t2.id_contacto, t2.vendedor, t2.contacto, t3.nombre, t3.celular, t3.email, t4.id_marca, t4.marca, t5.cot from logitica
 t1 inner join pop_detalle t5 on t1.id_orden=t5.id_orden inner join pop t2 on t5.id_orden=t2.id_orden inner join contacto t3 on t2.id_contacto=t3.id_contacto inner JOIN pop_marca t4 on t1.id_marca=t4.id_marca where t1.estado=0 and t1.numorden_compra='".$num_compra."'  ");?>

     
  


           
  




  
    <!-- Main content -->
  <div class="table-responsive" align="center">
    
   
</form>
<br>
<!--<div id="txtHint"><b>Person info will be listed here.</b></div>-->

 <!-- IFRAME 
  <a  data-fancybox data-options='{"type" : "iframe", "iframe" : {"preload" : false }}' href="form2.php"><i class="far fa-edit"></i></a>-->
 <div align="Left">     
 <h1 class="page-header">
                           
                         REGISTRO DE LOGISTICA NICARAGUA&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <img src="imagenes/aereo.png" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/aereoo.png" width="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagenes/ubicacion.png" width="40">
                        </h1>
      
       </div>
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
        <thead class="bg-red" >
        <tr>

                  <th># OP</th>
                  <th>Cot</th>
                  <th>OC</th>
                  <th>Cliente</th>
                  <th>Campaña</th>
                    
                  <th>Origen</th>
                  <th>Destino</th>
                  <th>ETD</th>
                  <th>ETA</th>
                  <th>Doc</th>
                  <th>Estado</th>
                  <th>Info</th>
                  <th>Fotos</th>
                  <th>Acciones</th>
                   

        </tr></thead>
        <?php
        $server=$_SERVER['SERVER_ADDR'];
        $year="19";
        $nivel="1";
        $tipo="original";

  
          $sql = mysqli_query($conexion, "select distinct a.id_orden, a.id_empresa, a.empresa, a.contacto, a.fecha_orden, a.vendedor, a.destino, a.id_proyecto, a.nombre_proyecto, a.estado, a.computo, a.impresion, a.corte, b.id_orden, b.origen, b.f_salida, b.f_llegada,b.estado,b.estado,b.numorden_compra,b.status, c.id_proyecto, c.marca, c.nombre from logitica b inner join pop a on b.id_orden = a.id_orden inner join pop_proyecto c on a.id_proyecto=c.id_proyecto where b.estado=0 order by a.id_orden desc  ");
          /* select distinct t1.id_orden, t1.id_empresa, t1.empresa, t1.nombre_proyecto,t1.estado, t1.vendedor ,t2.id_orden, t2.cot, t2.estado as 'produccion', t3.id_orden, t3.origen, t3.destino, t3.f_salida, t3.f_llegada,t3.numorden_compra from pop t1 INNER join pop_detalle t2 on t1.id_orden=t2.id_orden inner join logitica t3 on t1.id_orden=t3.id_orden where  t1.estado=1 */
        
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


                       $datalog='#2i'.$row['id_orden'];
                     $data2log="2i".$row['id_orden'];
                     $archive="http://".$server."/browser/elfinder6.php?year=20".$year."&empresa=".$row['empresa']."&marca=".$row['marca']."&proyecto=".$row['nombre']."&nivel=".$nivel."&tipo=".$tipo;

            echo '
            <tr style="font-size:85%;" >
              <td>'.$row['id_orden'].'</td>
              <td>'.$row['cot'].'</td>
               <td>'.$row['numorden_compra'].'</td>
                            <td>'.$row['empresa'].'</td>
                            <td>'.$row['nombre_proyecto'].'</td>
                           
              <td>'.$row['origen'].'</td>
                            <td>'.$row['destino'].'</td>
                              <td>'.$row['f_salida'].'</td>
                            <td>'.$row['f_llegada'].'</td>  <td> <a class="fa fa-info-circle" data-toggle="collapse" data-target='.$datalog.' aria-expanded="false" aria-controls='.$data2log.'></a> </td>

              <td> ';
              if($row['status'] == 'PROCESO'){
                echo '<span class="label label-success">Proceso. </span>';
              }
                            else if ($row['status'] == 'IMPRESION' ){
                echo '<span class="label label-info">Impresion</span>';
              }
                            else if ($row['status'] == 'CORTE' ){
                echo '<span class="label label-warning">Corte </span>';
              }

                      else if ($row['status'] == 'ACABADO' ){
                echo '<span class="label label-warning"> Acabado</span>';
              }

                      else if ($row['status'] == 'DESPACHO' ){
                echo '<span class="label label-warning">Despacho </span>';
              }

                      else if ($row['status'] == 'TRANSITO' ){
                echo '<span class="label label-warning">Transito </span>';
              }
                      else if ($row['status'] == 'ADUANA DE SALIDA' ){
                echo '<span class="label label-warning">Aduana de Salida </span>';
              }
                      else if ($row['status'] == 'TRAMITE' ){
                echo '<span class="label label-warning">Tramite</span>';
              }
              //PRIMER DESPLEGABLE 
            echo '

              </td>
              <td><a class="fa fa-info-circle" data-toggle="collapse" data-target='.$data.' aria-expanded="false" aria-controls='.$data2.' ></a></td>';?>
              <td><a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="logistica/edit_fotos.php?id=<?echo $row['id_orden']; ?>" class="btn bg-success"><i class="fas fa-camera-retro"></i></a></td>
              <td>
                  <a data-fancybox data-options='{"data-backdrop":"static", "type" : "iframe", "iframe" : {"preload" : false } }' href="logistica/edit.php?id=<?echo $row['id_orden']; ?>" class="btn bg-primary"><i class="far fa-edit"></i></a>
                 
                <? echo '<a href="logistica/terminar_log.php?id='.$row['id_orden'].'" title="FINALIZAR LOGISTICA" onclick="return confirm(\'Terminar Logistica?\')" class="btn btn-danger btn-sm"><span class="fas fa-sign-out-alt" aria-hidden="true"></span></a>
              </td>
            </tr>
            <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
    <div class="collapse multi-collapse" id='.$data2.' style="width:100%" >
      <div class="card card-body"><br>';

      include("consulta_item.php");?>
      
          


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
  xmlhttp.open("GET","getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>
    <tr>
          <td colspan="15" class="zeroPadding" >
            <div class="col" >
            <div class="collapse multi-collapse" id="<? echo $dataa2; ?>" style="width:100%" >
              <div class="card card-body">
                <!--<? //include('consulta_mueble.php');?>-->
                <div id="<?echo $n_funcion;?>"><b>sin registro<? echo $n_funcion;?></b></div>


              </div>
            </div>
          </td></tr>
       
    <!--TERCER DEPLEGABLE-->
    
         <tr ><td colspan="14" class="zeroPadding" >
        <div class="col" >
                   <div class="collapse multi-collapse" id="<? echo $data2log;?>" style="width:100%" >
                      <div class="card card-body"><br>
                      <? $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='288'"); ?>
                        <?include('logistica/documentos_nica.php');?>
                      </div>
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
