<?
  session_start();
  $id=$_SESSION['vsIdempresa'];
  $base=$_SESSION['base'];
  $anio=$_SESSION['year'];
  $bd=$base.$anio;
  $nombre=$_SESSION['vsNombre'];
 ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img  src="imagenes/persona.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><? echo $nombre;?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
   
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">¿QUE DESEAS VER?</li>
        <li class="active treeview">
             <li><a href="index.php"><i class="fas fa-door-open"></i> <span>INICIO</span></a></li>

             
       
        <?
               if (trim($_SESSION['vsIdtemporal']) == true) {
                echo'  <li class="active treeview">
             <li><a href="index_admin.php"><i class="fas fa-users"></i> <span>CLIENTES</span></a></li>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>';
               }else{}

        ?>

       <? $nivel=$_SESSION['nivel'];

     if ($nivel==1 || $nivel==2 || $nivel==4 || $nivel==3 || $nivel==5 || $nivel==7 || $nivel==9 || $nivel==11 || $nivel==15  ) {
       # code...
     ?>

     
          
        <li class="treeview">
          <a >
            <i class="fas fa-cogs"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROD. POP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="ajax3.php"><i class="fas fa-tasks"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   POP ACTIVAS</span></a></li>
        <li><a href="ajax3_fin.php"><i class="fas fa-check-double"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   POP FINALIZADAS</span></a></li>
       
          </ul>
        </li>

        <li class="treeview">
          <a >
            <i class="fas fa-cogs"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROD. PO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
        <li><a href="po.activas.php"><i class="fas fa-tasks"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO ACTIVAS</span></a></li>
        <li><a href="po.fin.php"><i class="fas fa-check-double"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO FINALIZADAS</span></a></li>
          </ul>
        </li>
           <? 
            $base=$_SESSION['base'];
           if ($base=="esa") {?>
            
        
          <li class="treeview">
          <a >
            <i class="fas fa-cogs"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PROD. CAMPOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             
        <li><a href="po.campos.activas.php"><i class="fas fa-tasks"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO CAMPOS ACTIVAS</span></a></li>
        <li><a href="po.campos.fin.php"><i class="fas fa-check-double"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PO CAMPOS FINALIZADAS</span></a></li>
          </ul>
        </li>  <? }?>

<?}

           if($nivel==1 || $nivel==17){?>


         <li class="treeview">
          <a >
            <i class="fas fa-dolly-flatbed"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;LOGISTICA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="logistica_sv.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   LOGISTICA SV</span></a></li>
             <li><a href="logistica_terminada_sv.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   LOG. TERMINADA SV</span></a></li>
             <li><a href="logistica_nc.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   LOGISTICA NI</span></a></li>
             <li><a href="logistica_nc_fin.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   LOG. TERMINADA NI</span></a></li>
       
          </ul>
        </li>
          <?}if ($nivel==1 || $nivel==2 || $nivel==4 ) {
            # code...
          ?>
         <li class="treeview">
          <a >
            <i class="fas fa-chalkboard"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDENES DISEÑO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="ordenes_diseno_activa.php"><i class="fas fa-tasks"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   OD ACTIVAS</span></a></li>
             <li><a href="ordenes_diseño_finalizadas.php"><i class="fas fa-check-double"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   OD TERMINADAS</span></a></li>
 
       
          </ul>
        </li>
      <?} if ($nivel==1 || $nivel==2 || $nivel==5 || $nivel==8 || $nivel==17) {
        # code...
      ?>
         <li class="treeview">
          <a >
            <i class="fas fa-cubes"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SUMINISTROS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <? if ($nivel==5) {?>
           <ul class="treeview-menu">
              <li><a href="suministros.descarga.tintas.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DESCARGAR TINTA</span></a></li>
             <li><a href="suministros.reporte.tintas.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CONSULTAR TINTA</span></a></li>
            
          </ul>
          <?}else{?>
          <ul class="treeview-menu">
              <li><a href="index_tintas.php"><i class="fab fa-codepen"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MATERIALES</span></a></li>
             <li><a href="index_ordenes.php"><i class="fas fa-copy"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDENES COMPRA</span></a></li>
             <li><a href="index_materiales.php"><i class="fas fa-cart-plus"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INGRESO MATERIALES</span></a></li>
          </ul>
          <?}?>
         
        </li>
<?} if ($nivel==1 || $nivel==2 || $nivel==3 || $nivel==7 || $nivel==10|| $nivel==17) {
  # code...
?>


        <li class="treeview">
          <a >
            <i class="far fa-file-pdf"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;COTIZACIONES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
            
         
          <ul class="treeview-menu">
             <li><a href="cotizaciones.php"><i class="fas fa-folder-plus"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   CREAR COTIZACION</span></a></li>
        
       
          </ul>
        </li>
<?} 
if ($nivel==1 || $nivel==2 || $nivel==6 || $nivel==18) {?>



        <li class="treeview">
          <a href="#">
            <i class="far fa-id-card"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EXPEDIENTES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             <li><a href="expedientes_lista.php"><i class="fas fa-id-card-alt"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   EXPED. ACTIVOS</span></a></li>
             <li><a href="expedientes_inactivos.php"><i class="fas fa-file-code"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   EXPED. INACTIVOS</span></a></li> 
             <li><a href="expediente_bitacora.php"><i class="fas fa-user-md"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   BITACORA</span></a></li>       
          </ul>
          
        </li>
<?}
if ($nivel==1 || $nivel==2 || $nivel==3 || $nivel==7) {?>
  <li class="treeview">
          <a href="directorio.php">
            <i class="fas fa-id-card"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DIRECTORIO</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="directorio.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   VER DIRECTORIO</span></a></li>  
          </ul>
          
        </
          
        </li>
         <li class="treeview">
          <a href="directorio.php">
            <i class="fas fa-id-card"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REPORTES</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="reporte.tintas.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   RENDIMIENTO TINTA</span></a></li> 
            <li><a href="reporte.metros.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   METROS IMPRESOS</span></a></li> 
             <li><a href="reportes.bitacora.compras.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   BITACORA COMPRAS</span></a></li> 
             <li><a href="reportes.bitacora.produccion.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   BITACORA PRODUCCION</span></a></li> 
              <li><a href="reportes.bitacora.pop.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   BITACORA PRODUCCION POP</span></a></li> 
               <li><a href="reportes.bitacora.cotizaciones.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   BITACORA COT.</span></a></li> 
                <li><a href="reporte.ventas.admin.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   REPORTE VEND.</span></a></li> 
                <li><a href="coti.buscar.ventas.admin.php"><i class="fas fa-id-card"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   COTIZACIONES VENDEDORES.</span></a></li> 
          </ul>
          
        </
          
        </li>
<?}

$base=$_SESSION['base'];

if ($base=="nica") {
 

if ($nivel==1 || $nivel==2|| $nivel==3) {

?>

        <li class="treeview">
          <a >
            <i class="fas fa-shipping-fast"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CAJA CHICA</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             

          <li><a href="caja.ingreso.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INGRESAR SALDO</span></a></li>
             <li><a href="caja.descarga.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INGRESAR SALDO</span></a></li>
             <li><a href="caja.detalle.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REPORTES</span></a></li>
             <li><a href="reportes.bitacora.caja.php"><i class="fas fa-shipping-fast"></i> <span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BITACORA CAJA</span></a></li>
                               
       
          </ul>
        </li>

        <li class="treeview">
          <a href="index_fotos.php">
            <i class="fas fa-shipping-fast"></i> <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAGOS</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
             

          <?php echo '<li><a href="ci/index.php/trigger/index/'.$_SESSION['loggedin'].'/'.$_SESSION['vsNombre'].'/'. $_SESSION['nivel'].'/'.$_SESSION['id'].'/'. $_SESSION['base'].'/'. $_SESSION['year'].'/pagos/registrarServicio"><i class="glyphicon glyphicon-book"></i>&nbsp;Registrar Pago</a></li>'; ?>
          <?php echo '<li><a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/ci/index.php/trigger/index/'.$_SESSION['loggedin'].'/'.$_SESSION['username'].'/'. $_SESSION['nivel'].'/'.$_SESSION['id_user'].'/'. $_SESSION['base'].'/'. $_SESSION['year'].'/pagos/modificarServicio"><i class="fa fa-edit"></i>&nbsp;Modificar Pago</a></li>'; ?>
          <?php echo '<li><a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/ci/index.php/trigger/index/'.$_SESSION['loggedin'].'/'.$_SESSION['username'].'/'. $_SESSION['nivel'].'/'.$_SESSION['id_user'].'/'. $_SESSION['base'].'/'. $_SESSION['year'].'/pagos/buscarServicios"><i class="glyphicon glyphicon-search"></i>&nbsp;Buscar Pagos</a></li>'; ?>
          <?php echo '<li><a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/ci/index.php/trigger/index/'.$_SESSION['loggedin'].'/'.$_SESSION['username'].'/'. $_SESSION['nivel'].'/'.$_SESSION['id_user'].'/'. $_SESSION['base'].'/'. $_SESSION['year'].'/pagos/buscarPendientes"><i class="glyphicon glyphicon-search"></i>&nbsp;Buscar Pendientes</a></li>'; ?>
                               
       
          </ul>
        </li><?}}?>
    </section>
    <!-- /.sidebar -->
  </aside>

</li></ul></section></aside>