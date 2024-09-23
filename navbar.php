<!-- Navbar -->
  
<nav class="main-header navbar navbar-expand navbar-cyan navbar-light">  
  <div class="col-md-12 col-lg-12 col-sm-12">
    <div class="col-md-10 col-lg-10 col-sm-1">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav">
        <a class="nav-link" data-toggle="modal" data-target="#modalExpedientes"  href="#">
          <strong></strong> 
        </a>
      </li>
      <?php if ($nivel==18 || $nivel==1 || $nivel==6 || $nivel==2): ?>
        <li class="nav">
        <a class="nav-link" data-toggle="modal" data-target="#modalExpedientes"  href="#">
          <i class="fas fa-book"></i><strong>  Expedientes</strong> 
        </a>
      </li>
      <?php endif ?>
      <?php if ($nivel==1 || $nivel==2 || $nivel==3 || $nivel==2 || $nivel==7 || $nivel==11): ?>
       <li class="nav">
        <a class="nav-link" data-toggle="modal" data-target="#modalDirectorio"  href="#" >
          <i class="fas fa-book"></i><strong>  Directorio</strong> 
        </a>
      </li> 
      <?php endif ?>
      <?php if ($nivel==1 || $nivel==2): ?>
        <li class="nav">
        <a class="nav-link" data-toggle="modal" data-target="#modalReportes"  href="#" >
          <i class="fas fa-book"></i><strong>  Reportes</strong> 
        </a>
      </li>
      <?php endif ?>
      <?php if ($nivel==1 || $nivel==2): ?>
        
      <?php endif ?>

       <?php if ($nivel==1 || $nivel==2|| $nivel==10): ?>
        <li class="nav">
        <a class="nav-link"   href="flete.php" >
          <i class="fas fa-book"></i><strong> Calculo de Flete</strong> 
        </a>
      </li>
      <?php endif ?>


       <?php if ($nivel==1 || $nivel==2 ): ?>
        <li class="nav">
        <a class="nav-link"   href="troquel.php" >
          <i class="fas fa-wrench"></i><strong> Troqueles</strong> 
        </a>
      </li>
      <?php endif ?>
      <?php if ($nivel==1 || $nivel==2 ): ?>
        <li class="nav">
        <a class="nav-link"   href="cuchillas.php">
          <i class="fas fa-fan"></i><strong>Cuchillas</strong> 
        </a>
      </li>
      <?php endif ?>



    </ul>
    </div>
    <div class="col-md-2" >
      
     <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: black;">
              <img src="imagenes/persona.png" class="user-image" alt="User Image">
              <span class="hidden-xs"> <? echo $nombre;?></span>
            </a>
            <ul class="dropdown-menu" style="background-color: #17a2b8;">
              <!-- User image -->
              <li class="user-header">
                <img src="imagenes/persona.png" class="img-circle" alt="User Image">

                <p>
                
                  <small>Uso exclusivo Color Digital 2023 <br> <? echo $nombre.$id;?></small>
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                 <!-- <? echo '
                  <a href="http://'.$_SERVER[HTTP_HOST].'/sistema2024/loug.php?usuario='.$usuario.'&&clave='.$clave.'&&site='.$site.'" class="btn btn-default btn-flat">SISTEMA 2021</a>';?> -->
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
      
    </div>
    </nav>
    

    <!-- SEARCH FORM -->


    <!-- Right navbar links -->
    
  
  </div>

  <!-- /.navbar -->
  <br><br>



  <!----------------------------------------MODALS----------------------------------------------------------->


<div class="modal fade" id="modalReportes" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">REPORTES</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-tint"></i></span>
            <a href="reporte.tintas2.php">
              <div class="info-box-content">
                <span class="info-box-text">RENDIMIENTO<br>DE TINTAS</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-ruler-combined"></i></span>
            <a href="reporte.metros2.php">
              <div class="info-box-content">
                <span class="info-box-text">METROS<br>IMPRESOS</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="far fa-money-bill-alt"></i></span>
            <a href="reportes.bitacora.compras2.php">
              <div class="info-box-content">
                <span class="info-box-text">BITACORA<br>DE COMPRAS</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
            <a href="reportes.bitacora.produccion2.php">
              <div class="info-box-content">
                <span class="info-box-text">BITACORA<br>PRODUCCION</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
            <a href="reportes.bitacora.pop2.php">
              <div class="info-box-content">
                <span class="info-box-text">BITACORA DE<br>PRODUCCION<br>POP</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>
            <a href="reportes.bitacora.cotizaciones2.php">
              <div class="info-box-content">
                <span class="info-box-text">BITACORA<br>COTIZACIONES</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>
            <a href="reporte.ventas.admin2.php">
              <div class="info-box-content">
                <span class="info-box-text">REPORTE<br>VENDEDORES</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-address-book"></i></span>
            <a href="coti.buscar.ventas.admin2.php">
              <div class="info-box-content">
                <span class="info-box-text">COTIZACIONES<br>VENDEDORES</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
        
      </div>
    </div>
  </div>
</div>


<!--MODAL DIRECTORIO-->
<!-- Modal -->
<div class="modal fade" id="modalDirectorio" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">DIRECTORIO</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-book-reader"></i></span>
            <a href="directorio2.php">
              <div class="info-box-content">
                <span class="info-box-text">DIRECTORIO</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
        
      </div>
    </div>
  </div>
</div>


<!--- MODAL EXPEDIENTES-->
<!-- Modal -->
<div class="modal fade" id="modalExpedientes" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="staticBackdropLabel">EXPEDIENTES</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        

         

          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-tie"></i></span>
            <a href="expedientes_lista2.php">
              <div class="info-box-content">
                <span class="info-box-text">EXPEDIENTES<br> ACTIVOS</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fab fa-readme"></i></span>
            <a href="expedientes_inactivos2.php">
              <div class="info-box-content">
                <span class="info-box-text">EXPEDIENTES<br> INACTIVOS</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
           <div class="col-md-6">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fab fa-readme"></i></span>
            <a href="expediente_bitacora2.php">
              <div class="info-box-content">
                <span class="info-box-text">BITACORA</span>
                <span class="info-box-number"></span>
              </div>
              <!-- /.info-box-content -->
            </div></a>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">CERRAR</button>
       
      </div>
    </div>
  </div>
</div>
