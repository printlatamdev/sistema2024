

<?
session_start();
$id=$_SESSION['vsIdempresa'];
$base=$_SESSION['base'];
$anio=$_SESSION['year'];
$bd=$base.$anio;
$nombre=$_SESSION['vsNombre'];


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

<!-- ESTEEEEEEEEEEEEE ESSSSSSSSSSSSSSSSSSSSSSS -->
<!-- ESTEEE -->
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

  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->




  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>

<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="reportes/assets/global/plugins/select2/select2.css"/>


<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="reportes/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="reportes/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="reportes/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="reportes/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.css'>
<script src='https://cdn.jsdelivr.net/npm/@fancyapps/fancybox@3.5.6/dist/jquery.fancybox.min.js'></script>





<!------ Include the above in your HEAD tag ---------->

 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/3.2.1/jquery.fancybox.min.css" media="screen">

        <link rel="stylesheet" href="css/custom.css">


  

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">


     



   
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





     <div class="container">

<!--pegar codigo-->
<!-- BEGIN PAGE CONTENT-->
      <div class="row">
        <div class="col-md-3"><p><b><font size="4px" >TELA</font></b></p>
          <ul class="ver-inline-menu tabbable margin-bottom-10">

          <?php
                            
            include("reportes/connect.php");


            $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='tela'");
                        $flag=0;
              while ($fila = $rs->fetch_row()) 
                { 
                  $material=$fila[0];
                                $flag=$flag + 1;

                             
                                  
                           echo'<li style="height:40px;">
                           <a data-toggle="tab" href="#tab_'.$flag.'">
                           <img src="suministros/iconossuministros/tela.png" width="30px" height="30px"><strong>         '.$material.'</strong></a>
                             </li>';
                                
                                
                }

              $mysqli->close();

            
          ?>
            
          </ul>
        </div>


        <div class="col-md-8">
          <div class="tab-content">
            


                        <?php 
                        $nivel=$_SESSION['nivel'];   



                        include("reportes/connect.php");


                        $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='tela'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $material=$fila[0];
                                $flag=$flag + 1;

                                     if($nivel==4 or $nivel==8 or $nivel==1){
                                    echo'
                                  

                               <div id="tab_'.$flag.'" class="tab-pane">
                            <div id="accordion'.$flag.'" class="panel-group">
                                 
 



                                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fab fa-buffer"></i>Existencias '.$material.'
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_'.$flag.'">
                            <thead>
                            <tr>
                                   <th>
                                  Foto
                                </th>

                                
                                <th>
                                  Info
                                </th>
                                <th>
                                   Tipo
                                </th>
                                <th align="center">
                                   <center>  Cantidad (Unidades) </center>
                                </th >
                                <th align="center">
                                     <center>Bodega</center>
                                </th>
                                <th align="center">
                                     <center>Estante</center>
                                </th>
                                   
                            </tr>
                            </thead>
                            <tbody> ';

                                }

                                else{
                                  echo'
                                  

                               <div id="tab_'.$flag.'" class="tab-pane">
                            <div id="accordion'.$flag.'" class="panel-group">
                                 
 



                                <div class="col-md-12 col-sm-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet box yellow">
                        <div class="portlet-title">
                            <div class="caption">
                                <i class="fab fa-buffer"></i>Existencias '.$material.'
                            </div>
                            <div class="actions">
                             
                            </div>
                        </div>
                        <div class="portlet-body">
                            <table class="table table-striped table-bordered table-hover" id="sample_'.$flag.'">
                            <thead>
                            <tr>
                                   <th>
                                  Foto/Info.
                                </th>

                                
                               
                                <th>
                                   Tipo
                                </th>
                                <th align="center">
                                   <center>  Cantidad (Unidades) </center>
                                </th >
                                <th align="center">
                                     <center>Bodega</center>
                                </th>
                                <th align="center">
                                     <center>Estante</center>
                                </th>
                                   
                            </tr>
                            </thead>
                            <tbody> ';
                                }

                                
                              
                                  
                             $rs2=$mysqli->query("SELECT *  FROM `material` WHERE material='".$material."' AND estado='1'");
                             while ($fila2 = mysqli_fetch_array($rs2))
                                   {

                                   $foto=$fila2[9];


                                    $Tipo=$fila2[2];
                                    $Cantidad=$fila2[3];
                                     $Bodega=$fila2[4];
                                      $Estante=$fila2[5];
                                      $Bodega=$fila2[4];
                                      $des=$fila2[10];
                                       $med=$fila2[6];

                                        $pie=$des;
                                          if ($pie==null) {
                                            $pie="*No se ha ingresado descripcion para este material*";
                                          }
                                          else{}




                                $id=$fila2[0];
                                $no='asdas';
                                  //$des=$fila2['descripcion'];

                                  //echo $des;

                                if($nivel==4 or $nivel==8 or $nivel==1){


                                      if($des==null && $foto==null) {
                                       
                                       echo'

                            <tr class="odd gradeX">



                                <td>
                                <a  onclick=\'pasarDatos2('.$fila2[0].',"'.$foto.'")\' href="#"" role="button" data-target="#nota" data-toggle="modal"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
                                     
                                </td>
                          
                                <td align="center">
                                    <a  onclick=\'pasarDatos('.$id.',"'.$des.'","'.$Tipo.'")\' href="#"" role="button" data-target="#ModalAgregar"  data-toggle="modal" aria-label="..."><i class="fas fa-ban" ></i></a>
                                </td>
                                <td>
                                  <storng>'.$Tipo.'</storng> 
                                </td>
                                <td align="center">
                                   <b> '.$Cantidad.'</b>
                                </td>
                                <td align="center">
                                    '.$Bodega.'
                                </td>
                                <td align="center">
                                    '.$Estante.'
                                </td>
                             
                            </tr>';

                             }


                             elseif(isset($des) && $foto==null){
                                   echo'

                            <tr class="odd gradeX">


                               <td>
                                <a  onclick=\'pasarDatos2('.$fila2[0].',"'.$foto.'")\' href="#"" role="button" data-target="#nota" data-toggle="modal"><i class="far fa-arrow-alt-circle-up" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos('.$id.',"'.$des.'","'.$Tipo.'")\' href="#"" role="button"  data-target="#ModalModificar" data-toggle="modal" aria-label="..."><i class="fas fa-clipboard-check" ></i></a>
                                </td>
                                <td>
                                  <storng>'.$fila2[2].'</storng> 
                                </td>
                                <td align="center">
                                   <b> '.$fila2[3].'</b>
                                </td>
                                <td align="center">
                                    '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>
                          
                            </tr>';

                             }
                             elseif($des==null && isset($foto)){
                                   echo'

                            <tr class="odd gradeX">


                               <td>
                                <a  onclick=\'pasarDatos2('.$fila2[0].',"'.$foto.'")\' href="#"" role="button" data-target="#nota2" data-toggle="modal"><i class="fa fa-image" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos('.$id.',"'.$des.'","'.$Tipo.'")\' href="#"" role="button"  data-target="#ModalAgregar" data-toggle="modal" aria-label="..."><i class="fas fa-ban" ></i></a>
                                </td>
                                <td>
                                  <storng>'.$fila2[2].'</storng> 
                                </td>
                                <td align="center">
                                   <b> '.$fila2[3].'</b>
                                </td>
                                <td align="center">
                                    '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>
                              
                            </tr>';

                             }

                                  elseif($des!==null && $foto!==null){
                                   echo'

                            <tr class="odd gradeX">

                            
                               <td>
                                <a  onclick=\'pasarDatos2('.$fila2[0].',"'.$foto.'")\' href="#"" role="button" data-target="#nota2" data-toggle="modal"><i class="fa fa-image" aria-hidden="true"></i></a>
                                     
                                </td>
                            
                                <td align="center">
                                    <a  onclick=\'pasarDatos('.$id.',"'.$des.'","'.$Tipo.'")\' href="#"" role="button"  data-target="#ModalModificar" data-toggle="modal" aria-label="..."><i class="fas fa-clipboard-check" ></i></a>
                                </td>
                                <td>
                                  <storng>'.$fila2[2].'</storng> 
                                </td>
                                <td align="center">
                                   <b> '.$fila2[3].'</b>
                                </td>
                                <td align="center">
                                    '.$fila2[4].'
                                </td>
                                <td align="center">
                                    '.$fila2[5].'
                                </td>
                              
                            </tr>';

                             }



                                }


                                else{
                                  
                                    echo'

                            <tr class="odd gradeX">

                                 <td>
  <a href="../sistema/artes_esa17/'.$foto.'" data-fancybox="preview" data-width="1500" data-height="1000" data-fancybox data-caption="'.$pie.'">
    <img src="../sistema/artes_esa17/'.$foto.'" class="zoom img-fluid "  alt="" height="30px" />
  </a></td>

                               
                                <td>
                                  <storng>'.$Tipo.'</storng> 
                                </td>
                                <td align="center">
                                   <b> '.$Cantidad.'</b>
                                </td>
                                <td align="center">
                                    '.$Bodega.'
                                </td>
                                <td align="center">
                                    '.$Estante.'
                                </td>
                             
                            </tr>';




                                }






                            
                             }

                               
                                

                        

                            echo ' 
                            </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>










 
    
                            </div>
                        </div>

                        



                                ';

                                  
                                
                                
                            }

                        $mysqli->close();

                       ?>







                          













                










  </div>
        </div>
      </div>
<form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ModalModificar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
           </div>
           <div class="modal-body">
               <h5 class="modal-title" id="myModalLabel">Material:</h5>

            <div class="form-group">
                  <input id="id_modificar"  type="hidden" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
            <div class="form-group">
                  <input id="tipo2"  type="text" class="form-control" name="tipo2" readonly="readonly" aria-label="..."  required>
            </div>
             <br>
            
          
                <div class="form-group">
                  Descripcion  <textarea id="nombre"  type="text" class="form-control" name="descripcion" aria-label="..."  required></textarea>
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


<form method="post" action="script/Ingresar_des_material.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ModalAgregar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
           <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                 <h4 class="modal-title" id="myModalLabel">Descripcion</h4>
           </div>
           <div class="modal-body">
               <h5 class="modal-title" id="myModalLabel">Material:</h5>
            <div class="form-group">
                  <input id="id_agregar"  type="hidden" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
       <div class="form-group">
                  <input id="tipo"  type="text" class="form-control" name="tipo" readonly="readonly" aria-label="..."  required>
            </div>
            <br>

             <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="tela">
                   
                 </div>
          
                <div class="form-group">
                  Descripcion  <textarea id="nombre"  type="text" class="form-control" name="descripcion" aria-label="..."  placeholder="Ingrese una descripcion de este material"  required></textarea>
                </div>
                
               
               
                 
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Ingresar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
   

</form>

<form method="post" action="script/ingresarfotomaterial.php" enctype="multipart/form-data">
    <div class="modal fade" id="nota" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   Id Material<input id="id_sub" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" required>
                 </div>
               <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="tela">
                   
                 </div>

                <div class="form-group">
                  <input name="origen" type="hidden"  value="<?echo $_SESSION['base'];?>" class="form-control" aria-label="...">
                </div>

                 <div class="form-group">
  

    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input  class="form-control" name="imagen" type="file" aria-label="..."  /> 
    </div>

               
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>

 <script type="text/javascript">
      
      $(document).ready(function(){
  $(".fancybox").fancybox({
        openEffect: "none",
        modal: "false",
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

    $('[data-fancybox="preview"]').fancybox({
  thumbs : {
    autoStart : true
  }
});



    

</script>
<form method="post" action="script/ingresarfotomaterial.php" enctype="multipart/form-data">
    <div class="modal fade" id="nota2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Subir Foto</h4>
             </div>
            <div class="modal-body">
            <div class="form-group">
                   <input id="id_m" type="text" class="form-control" name="id_orden" aria-label="..." readonly="readonly" required>
                 </div>
                 <div align="center">
                 <h6>*ACTUALMENTE YA HAS SUBIDO UNA FOTO, PERO PUEDE SUBIR OTRA NUEVAMENTE*</h6></div>
                 <br>
                 <br>


                 <!--
             <div align="center">
               ver imagen <a href="#" onclick="top.window.location.href='../sistema/artes_esa17/'+document.getElementById('imagen').value ; return !1"  class="fancybox" rel="ligthbox">
              </div>-->

             <div align="center"> <a   id="img" onclick="myFunction6(document.getElementById('img').value)" href='#' role='button'   ><i  ></i> Click para ver   <img align="center" src="../sistema/artes_esa17/IMGPDF/ver3.png" height="80px" class="zoom img-fluid "  alt="" class="fancybox" rel="ligthbox"> </a></div>
    <div class="form-group">
                  <input name="origen" type="hidden"  value="<?echo $_SESSION['base'];?>" class="form-control" aria-label="...">
                </div>
                  <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="tela">
                   
                 </div>

             <br>

    <div class="input-group">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
      <input size="60" class="form-control" id="imagen2" name="imagen" type="file" aria-label="..."  /> 
    </div>
    
                  
          <div class="modal-footer">
            <button type="submit" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Subir</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
    
</form>

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->








<?
include("footer.php");
?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

-->






 







<script>
jQuery(document).ready(function() {  

var TableManaged = function () {


<?php 



                        include("reportes/connect.php");


                        $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='tela'");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $material=$fila[0];
                                $flag=$flag + 1;

                                
                              ?>



    var initTable<?=$flag?> = function () {

        var table = $('#sample_<?=$flag?>');

        // begin: third table
        table.dataTable({

            // Internationalisation. For more info refer to http://datatables.net/manual/i18n
            "language": {
                "aria": {
                    "sortAscending": ": activate to sort column ascending",
                    "sortDescending": ": activate to sort column descending"
                },
                "emptyTable": "No hay informacion disponible.",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "No se encontraron registros.",
                "infoFiltered": "(filtered1 from _MAX_ total registros)",
                "lengthMenu": "Mostrando _MENU_ registros",
                "search": "Busqueda:",
                "zeroRecords": "No se encontraron registros."
            },

             dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'pdfHtml5',
                    messageTop: 'Lista de Existencias del Material : <?=$material?>',
                    exportOptions: {
                                    columns: '2, 3',
                                    }
                },
                {
                    extend: 'excelHtml5',
                    messageTop: 'Lista de Existencias del Material : <?=$material?>',
                    exportOptions: {
                                    columns: '2, 3',
                                    }
                
                }
            ],
            
            // Uncomment below line("dom" parameter) to fix the dropdown overflow issue in the datatable cells. The default datatable layout
            // setup uses scrollable div(table-scrollable) with overflow:auto to enable vertical scroll(see: ../reportes/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js). 
            // So when dropdowns used the scrollable div should be removed. 
            //"dom": "<'row'<'col-md-6 col-sm-12'l><'col-md-6 col-sm-12'f>r>t<'row'<'col-md-5 col-sm-12'i><'col-md-7 col-sm-12'p>>",

            "bStateSave": false, // save datatable state(pagination, sort, etc) in cookie.
            
            "lengthMenu": [
                [5, 15, 20, -1],
                [5, 15, 20, "Todos"] // change per page values here
            ],
            // set the initial value
            "pageLength": 20,
            "columnDefs": [{  // set default column settings
                'orderable': false,
                'targets': [0]
            }, {
                "searchable": true,
                "targets": [0]
            }],
            "order": [
                [1, "asc"]
            ] // set first column as a default sort by asc
        });

        var tableWrapper = jQuery('#sample_<?=$flag?>_wrapper');

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

<?
 }
 $mysqli->close();                            
?>

    return {

        //main function to initiate the module
        init: function () {
            if (!jQuery().dataTable) {
                return;
            }

             <?php 
                        include("reportes/connect.php");
                        $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE 1");
                        $flag=0;
                        while ($fila = $rs->fetch_row()) 
                            { 
                                $material=$fila[0];
                                $flag=$flag + 1;
                                ?>

                                    initTable<?=$flag?>();

                                <?
                             }
                        $mysqli->close();                            
                        ?>
            
        }

    };

}();


//*************************************************************************************************************************************


   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   QuickSidebar.init(); // init quick sidebar
      TableManaged.init();

   
        jQuery(".buttons").on("click", function(){ 
            jQuery("#page-content").hide(); 
            jQuery("#page-content").load(jQuery(this).attr("page"));
            jQuery('#page-content').fadeIn(1000);
            return false;
        });

});
</script>


     <script type="text/javascript">

    function pasarDatos(id,med,tip) {
        


              
        



        document.getElementById('id_modificar').value= id;
        document.getElementById('nombre').value= med;
         document.getElementById('tipo2').value= tip;
      
         
        document.getElementById('tipo').value= tip;

         document.getElementById('id_agregar').value= id;
         document.getElementById('nombre2').value= med;     
        

        
        


       // document.getElementById('idPrecio').value=id;

          

    }

  </script>
             <script type="text/javascript">

    function pasarDatos2(id,img) {
               document.getElementById('img').value= img;





         

         document.getElementById('id_sub').value= id;


         

         document.getElementById('id_m').value= id;      
       
            
         
    }






  </script>

  <script type="text/javascript">
      // Enable keyboard navigation
  keyboard: true,

  // Should allow caption to overlap the content
  preventCaptionOverlap: true,

  // Should display navigation arrows at the screen edges
  arrows: true,

  // Should display counter at the top left corner
  infobar: true,

  // Should display close button (using `btnTpl.smallBtn` template) over the content
  // Can be true, false, "auto"
  // If "auto" - will be automatically enabled for "html", "inline" or "ajax" items
  smallBtn: "auto",

  // Should display toolbar (buttons at the top)
  // Can be true, false, "auto"
  // If "auto" - will be automatically hidden if "smallBtn" is enabled
  toolbar: "auto",

  // What buttons should appear in the top right corner.
  // Buttons will be created using templates from `btnTpl` option
  // and they will be placed into toolbar (class="fancybox-toolbar"` element)
  buttons: [
    "zoom",
    //"share",
    "slideShow",
    //"fullScreen",
    //"download",
    "thumbs",
    "close"
  ],

  // Detect "idle" time in seconds
  idleTime: 3,

  // Disable right-click and use simple image protection for images
  protect: false,

  // Shortcut to make content "modal" - disable keyboard navigtion, hide buttons, etc
  modal: false,

  image: {
    // Wait for images to load before displaying
    //   true  - wait for image to load and then display;
    //   false - display thumbnail and load the full-sized image over top,
    //           requires predefined image dimensions (`data-width` and `data-height` attributes)
    preload: false
  },

  ajax: {
    // Object containing settings for ajax request
    settings: {
      // This helps to indicate that request comes from the modal
      // Feel free to change naming
      data: {
        fancybox: true
      }
    }
  },

  iframe: {
    // Iframe template
    tpl:
      '<iframe id="fancybox-frame{rnd}" name="fancybox-frame{rnd}" class="fancybox-iframe" allowfullscreen allow="autoplay; fullscreen" src=""></iframe>',

    // Preload iframe before displaying it
    // This allows to calculate iframe content width and height
    // (note: Due to "Same Origin Policy", you can't get cross domain data).
    preload: true,

    // Custom CSS styling for iframe wrapping element
    // You can use this to set custom iframe dimensions
    css: {},

    // Iframe tag attributes
    attr: {
      scrolling: "auto"
    }
  },

  // For HTML5 video only
  video: {
    tpl:
      '<video class="fancybox-video" controls controlsList="nodownload" poster="{{poster}}">' +
      '<source src="{{src}}" type="{{format}}" />' +
      'Sorry, your browser doesn\'t support embedded videos, <a href="{{src}}">download</a> and watch with your favorite video player!' +
      "</video>",
    format: "", // custom video format
    autoStart: true
  },

  // Default content type if cannot be detected automatically
  defaultType: "image",

  // Open/close animation type
  // Possible values:
  //   false            - disable
  //   "zoom"           - zoom images from/to thumbnail
  //   "fade"
  //   "zoom-in-out"
  //
  animationEffect: "zoom",

  // Duration in ms for open/close animation
  animationDuration: 366,

  // Should image change opacity while zooming
  // If opacity is "auto", then opacity will be changed if image and thumbnail have different aspect ratios
  zoomOpacity: "auto",

  // Transition effect between slides
  //
  // Possible values:
  //   false            - disable
  //   "fade'
  //   "slide'
  //   "circular'
  //   "tube'
  //   "zoom-in-out'
  //   "rotate'
  //
  transitionEffect: "fade",

  // Duration in ms for transition animation
  transitionDuration: 366,

  // Custom CSS class for slide element
  slideClass: "",

  // Custom CSS class for layout
  baseClass: "",

  // Base template for layout
  baseTpl:
    '<div class="fancybox-container" role="dialog" tabindex="-1">' +
    '<div class="fancybox-bg"></div>' +
    '<div class="fancybox-inner">' +
    '<div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div>' +
    '<div class="fancybox-toolbar">{{buttons}}</div>' +
    '<div class="fancybox-navigation">{{arrows}}</div>' +
    '<div class="fancybox-stage"></div>' +
    '<div class="fancybox-caption"></div>' +
    "</div>" +
    "</div>",

  // Loading indicator template
  spinnerTpl: '<div class="fancybox-loading"></div>',

  // Error message template
  errorTpl: '<div class="fancybox-error"><p>{{ERROR}}</p></div>',

  btnTpl: {
    download:
      '<a download data-fancybox-download class="fancybox-button fancybox-button--download" title="{{DOWNLOAD}}" href="javascript:;">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.62 17.09V19H5.38v-1.91zm-2.97-6.96L17 11.45l-5 4.87-5-4.87 1.36-1.32 2.68 2.64V5h1.92v7.77z"/></svg>' +
      "</a>",

    zoom:
      '<button data-fancybox-zoom class="fancybox-button fancybox-button--zoom" title="{{ZOOM}}">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M18.7 17.3l-3-3a5.9 5.9 0 0 0-.6-7.6 5.9 5.9 0 0 0-8.4 0 5.9 5.9 0 0 0 0 8.4 5.9 5.9 0 0 0 7.7.7l3 3a1 1 0 0 0 1.3 0c.4-.5.4-1 0-1.5zM8.1 13.8a4 4 0 0 1 0-5.7 4 4 0 0 1 5.7 0 4 4 0 0 1 0 5.7 4 4 0 0 1-5.7 0z"/></svg>' +
      "</button>",

    close:
      '<button data-fancybox-close class="fancybox-button fancybox-button--close" title="{{CLOSE}}">' +
      '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z"/></svg>' +
      "</button>",

    // Arrows
    arrowLeft:
      '<button data-fancybox-prev class="fancybox-button fancybox-button--arrow_left" title="{{PREV}}">' +
      '<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M11.28 15.7l-1.34 1.37L5 12l4.94-5.07 1.34 1.38-2.68 2.72H19v1.94H8.6z"/></svg></div>' +
      "</button>",

    arrowRight:
      '<button data-fancybox-next class="fancybox-button fancybox-button--arrow_right" title="{{NEXT}}">' +
      '<div><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M15.4 12.97l-2.68 2.72 1.34 1.38L19 12l-4.94-5.07-1.34 1.38 2.68 2.72H5v1.94z"/></svg></div>' +
      "</button>",

    // This small close button will be appended to your html/inline/ajax content by default,
    // if "smallBtn" option is not set to false
    smallBtn:
      '<button type="button" data-fancybox-close class="fancybox-button fancybox-close-small" title="{{CLOSE}}">' +
      '<svg xmlns="http://www.w3.org/2000/svg" version="1" viewBox="0 0 24 24"><path d="M13 12l5-5-1-1-5 5-5-5-1 1 5 5-5 5 1 1 5-5 5 5 1-1z"/></svg>' +
      "</button>"
  },

  // Container is injected into this element
  parentEl: "body",

  // Hide browser vertical scrollbars; use at your own risk
  hideScrollbar: true,

  // Focus handling
  // ==============

  // Try to focus on the first focusable element after opening
  autoFocus: true,

  // Put focus back to active element after closing
  backFocus: true,

  // Do not let user to focus on element outside modal content
  trapFocus: true,

  // Module specific options
  // =======================

  fullScreen: {
    autoStart: false
  },

  // Set `touch: false` to disable panning/swiping
  touch: {
    vertical: true, // Allow to drag content vertically
    momentum: true // Continue movement after releasing mouse/touch when panning
  },

  // Hash value when initializing manually,
  // set `false` to disable hash change
  hash: null,

  // Customize or add new media types
  // Example:
  /*
    media : {
      youtube : {
        params : {
          autoplay : 0
        }
      }
    }
  */
  media: {},

  slideShow: {
    autoStart: false,
    speed: 3000
  },

  thumbs: {
    autoStart: false, // Display thumbnails on opening
    hideOnClose: true, // Hide thumbnail grid when closing animation starts
    parentEl: ".fancybox-container", // Container is injected into this element
    axis: "y" // Vertical (y) or horizontal (x) scrolling
  },

  // Use mousewheel to navigate gallery
  // If 'auto' - enabled for images only
  wheel: "auto",

  // Callbacks
  //==========

  // See Documentation/API/Events for more information
  // Example:
  /*
    afterShow: function( instance, current ) {
      console.info( 'Clicked element:' );
      console.info( current.opts.$orig );
    }
  */

  onInit: $.noop, // When instance has been initialized

  beforeLoad: $.noop, // Before the content of a slide is being loaded
  afterLoad: $.noop, // When the content of a slide is done loading

  beforeShow: $.noop, // Before open animation starts
  afterShow: $.noop, // When content is done loading and animating

  beforeClose: $.noop, // Before the instance attempts to close. Return false to cancel the close.
  afterClose: $.noop, // After instance has been closed

  onActivate: $.noop, // When instance is brought to front
  onDeactivate: $.noop, // When other instance has been activated

  // Interaction
  // ===========

  // Use options below to customize taken action when user clicks or double clicks on the fancyBox area,
  // each option can be string or method that returns value.
  //
  // Possible values:
  //   "close"           - close instance
  //   "next"            - move to next gallery item
  //   "nextOrClose"     - move to next gallery item or close if gallery has only one item
  //   "toggleControls"  - show/hide controls
  //   "zoom"            - zoom image (if loaded)
  //   false             - do nothing

  // Clicked on the content
  clickContent: function(current, event) {
    return current.type === "image" ? "zoom" : false;
  },

  // Clicked on the slide
  clickSlide: "close",

  // Clicked on the background (backdrop) element;
  // if you have not changed the layout, then most likely you need to use `clickSlide` option
  clickOutside: "close",

  // Same as previous two, but for double click
  dblclickContent: false,
  dblclickSlide: false,
  dblclickOutside: false,

  // Custom options when mobile device is detected
  // =============================================

  mobile: {
    preventCaptionOverlap: false,
    idleTime: false,
    clickContent: function(current, event) {
      return current.type === "image" ? "toggleControls" : false;
    },
    clickSlide: function(current, event) {
      return current.type === "image" ? "toggleControls" : "close";
    },
    dblclickContent: function(current, event) {
      return current.type === "image" ? "zoom" : false;
    },
    dblclickSlide: function(current, event) {
      return current.type === "image" ? "zoom" : false;
    }
  },

  // Internationalization
  // ====================

  lang: "en",
  i18n: {
    en: {
      CLOSE: "Close",
      NEXT: "Next",
      PREV: "Previous",
      ERROR: "The requested content cannot be loaded. <br/> Please try again later.",
      PLAY_START: "Start slideshow",
      PLAY_STOP: "Pause slideshow",
      FULL_SCREEN: "Full screen",
      THUMBS: "Thumbnails",
      DOWNLOAD: "Download",
      SHARE: "Share",
      ZOOM: "Zoom"
    },
    de: {
      CLOSE: "Schliessen",
      NEXT: "Weiter",
      PREV: "Zurück",
      ERROR: "Die angeforderten Daten konnten nicht geladen werden. <br/> Bitte versuchen Sie es später nochmal.",
      PLAY_START: "Diaschau starten",
      PLAY_STOP: "Diaschau beenden",
      FULL_SCREEN: "Vollbild",
      THUMBS: "Vorschaubilder",
      DOWNLOAD: "Herunterladen",
      SHARE: "Teilen",
      ZOOM: "Maßstab"
    }
  }
};
  </script>
      </div></div></span></a></li></ul></div></nav></header></div>
            

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



  <?php include("html/modal_add.php");?>
  <!-- Edit Modal HTML -->
  <?php include("html/modal_edit.php");?>
  <!-- Delete Modal HTML -->
  <?php include("html/modal_delete.php");?>
  <script src="script.js"></script>

<script src="reportes/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="reportes/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="reportes/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="reportes/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="reportes/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="reportes/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="reportes/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="reportes/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="reportes/assets/global/plugins/select2/select2.min.js"></script>
<script src="reportes/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="reportes/assets/global/plugins/select2/select2.min.js"></script>




<script src="reportes/assets/admin/pages/scripts/components-pickers.js"></script>



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>












</body>
</html>
