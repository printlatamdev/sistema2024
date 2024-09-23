

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
<link href="suministros/assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="suministros/assets/global/plugins/select2/select2.css"/>


<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="suministros/assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<link href="suministros/assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="suministros/assets/admin/layout/css/themes/darkblue.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="suministros/assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>


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
        <div class="col-md-3"><p><b><font size="4px" >REPUESTOS</font></b></p>
          <ul class="ver-inline-menu tabbable margin-bottom-10">

          <?php
                            
            include("suministros/connect.php");


            $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='repuestos'");
                        $flag=0;
              while ($fila = $rs->fetch_row()) 
                { 
                  $material=$fila[0];
                                $flag=$flag + 1;

                             
                                  
                            echo'<li style="height:45px;">
                           <a data-toggle="tab" href="#tab_'.$flag.'">
                           <img src="suministros/iconossuministros/neumatico.png" width="30px" height="30px"><strong>         '.$material.'</strong></a>
                             </li>';
                                
                                
                }

              $mysqli->close();

            
          ?>
            
          </ul>
        </div>
                <style>
                /* unvisited link */
                a:link {
                color: black;
                }

                /* visited link */
                a:visited {
                color: black;
                }

                /* mouse over link */
                a:hover {
                color: black;
                }

                /* selected link */
                a:active {
                color: black;
                }
                
                </style>
        <div class="col-md-9">
          <div class="tab-content">
            


                        <?php 



                        include("suministros/connect.php");


                        $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE medicion='repuestos'");
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
                              while ($fila2 = $rs2->fetch_row()) 
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
      <!-- END PAGE CONTENT-->

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
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="repuestos">
                   
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

             <div align="center"> <a   id="img" onclick="myFunction6(document.getElementById('img').value)" href='#' role='button'  class="rotate" ><i  ></i> Click para ver   <img align="center" src="../sistema/artes_esa17/IMGPDF/ver3.png" height="80px" class="zoom img-fluid "  alt=""> </a></div>
    <div class="form-group">
                  <input name="origen" type="hidden"  value="<?echo $_SESSION['base'];?>" class="form-control" aria-label="...">
                </div>
                  <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="repuestos">
                   
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
                  <input id="id_modificar"  type="text" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
            <div class="form-group">
                  <input id="tipo2"  type="text" class="form-control" name="tipo2" readonly="readonly" aria-label="..."  required>
            </div>
             <br>
            
          
                <div class="form-group">
                  Descripcion  <textarea id="nombre"  type="text" class="form-control" name="descripcion" aria-label="..."  required></textarea>
                </div>
                  <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="repuestos">
                   
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
                  <input id="id_agregar"  type="text" class="form-control" name="id" readonly="readonly" aria-label="..."  required>
            </div>
       <div class="form-group">
                  <input id="tipo"  type="text" class="form-control" name="tipo" readonly="readonly" aria-label="..."  required>
            </div>
            <br>


          
                <div class="form-group">
                  Descripcion  <textarea id="nombre"  type="text" class="form-control" name="descripcion" aria-label="..."  placeholder="Ingrese una descripcion de este material"  required></textarea>
                </div>
                  <div class="form-group">
                 <input  type="hidden" class="form-control" name="tipo" aria-label="..." value="repuestos">
                   
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

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->

<!-- ------------FIN DE CONTENIDO-----------------------------------------------------------------------------------------------  -->



</div>
<!-- END CONTENT -->


</div>
<!-- END CONTAINER -->








<?php include("suminstros/footer.php"); ?>
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 

-->






 







<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {  

var TableManaged = function () {


<?php 



                        include("suministros/connect.php");


                        $rs=$mysqli->query("SELECT DISTINCT material  FROM `material` WHERE 1");
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
            "pageLength": -1,
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
                        include("suministros/connect.php");
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
<!-- END JAVASCRIPTS -->
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

<script src="suministros/assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="suministros/assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="suministros/assets/global/plugins/jqvmap/jqvmap/jquery.vmap.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/flot/jquery.flot.categories.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.pulsate.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<!-- IMPORTANT! fullcalendar depends on jquery-ui.min.js for drag & drop support -->
<script src="suministros/assets/global/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery-easypiechart/jquery.easypiechart.min.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="suministros/assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="suministros/assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/index.js" type="text/javascript"></script>
<script src="suministros/assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<script src="suministros/assets/global/plugins/select2/select2.min.js"></script>
<script src="suministros/assets/admin/pages/scripts/form-samples.js"></script>


<script type="text/javascript" src="suministros/assets/global/plugins/select2/select2.min.js"></script>




<script src="suministros/assets/admin/pages/scripts/components-pickers.js"></script>



 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.css"/>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.18/b-1.5.4/b-colvis-1.5.4/b-flash-1.5.4/b-html5-1.5.4/b-print-1.5.4/datatables.min.js"></script>












</body>
</html>
