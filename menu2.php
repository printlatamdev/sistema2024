<!-- BEGIN SIDEBAR -->
<div id="menu_order" class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
      <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="false" data-slide-speed="200">
        <li class="sidebar-toggler-wrapper">
          <div class="sidebar-toggler">
          </div>    
        </li>
        <li class="sidebar-search-wrapper">   
        </li><li class="heading">
          <h3 class="uppercase">Menu - SISTEMA <?=$_SESSION['year']?></h3> 
        </li>
        <?
 $nivel=$_SESSION['nivel'];
 $sunivel="nivel".$nivel;
    $consulta =$mysqli->query(" select a1.id_menu_p, a1.menu, a2.nivel,a2.id_menu_p,a2.OP_Color_Activas,a2.OP_Color_Finalizadas,a2.Busqueda_OP,a2.Busqueda_OP_Clientes,a2.OP_Campos_Activas,a2.OP_Campos_Finalizadas,a2.Busquedas_Campos,a2.POP_Ordenes_Activas,a2.POP_Ordenes_Finalizadas,a2.Busquedas_POP,a2.Nueva_Orden,a2.Editar_Orden,a2.Editar_Orden_POP,a2.Documentacion_OC,a2.Buscar_OC,a2.Reportes_Excel from menu_principal a1 INNER JOIN produccion_sub a2 on a1.id_menu_p=a2.id_menu_p where a2.nivel='".$nivel."'");
     $consulta2 =$mysqli->query(" select menu, {$sunivel} from menu_principal");
       $consulta2 =$mysqli->query(" select menu, {$sunivel} from menu_principal");
    //$consulta3 =$mysqli->query(" SHOW COLUMNS FROM produccion_sub 
// ");    
?>   <?php while ($row = mysqli_fetch_array($consulta2)){

                                       $prueba=$row['menu'];
                                       $nivelsesion=$row[1];
                                        //$sunivel="nivel".$nivel;
                                     $prueba=str_replace(" ", "_", $prueba);
                                     $menumin = strtolower($prueba);
                                    // $sub="produccion_sub";
                                       $consulta3 =$mysqli->query("select sub_menu, {$sunivel} from {$menumin}_sub");
                                           $consulta4 =$mysqli->query(" select menu, {$sunivel} from {$menumin}_sub");
                                   ?>
                                   <?if ($nivelsesion==0) {
                                     # code...
                                   } else{?>                             

 <li >                <a href="javascript:;">
                      <i class="icon-home"></i>
                      <span class="title"><?php echo $row['menu'];  ?> </span>
                      <span class="arrow "></span>
                      </a>
                      <ul class="sub-menu">                                  

   <?php  while ($row2 = mysqli_fetch_array($consulta3)){
                                          //$Field="Field";
                                $carpeta=$row2[0];
                                $estado=$row2[1];
                      //$carpeta=str_replace("_", " ", $carpeta);                           
                        //$carpeta=strtoupper($carpeta);
                                   ?><?if($carpeta=='id' or $carpeta=='nivel' or $carpeta=='id menu p' or $estado==0 or $estado==null){?>  


                            <?}else{?><li><a  href="http://<?=$_SERVER[HTTP_HOST]?>/sistema/produccion.ordenes.color.php" ><i class="icon-tag"></i><?php echo $carpeta;  ?></a></li><?}?>                 
                                  <!--<li><a class="buttons" href="#" page="produccion.ordenes.color2.php"><i class="icon-tag"></i>PRUEBAS</a></li>-->
                                            <!--<li><a class="buttons" href="#" page=""><i class="icon-note"></i>Editar Orden</a></li>--> <?}?></ul></li>
                                    <?}?>                             
                                    
                                    <?}?>
  <!-- END SIDEBAR MENU -->
</div>