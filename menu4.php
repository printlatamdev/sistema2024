<?php
// session_start();
$id = $_SESSION['vsIdempresa'];
$base = $_SESSION['base'];
$anio = $_SESSION['year'];
$bd = $base . $anio;
$nombre = $_SESSION['vsNombre'];
$nivel = $_SESSION['nivel'];
?>

<li class="nav-item has-treeview">
  <a href="index.php" class="nav-link">
    <i class="nav-icon fas fa-copy"></i>
    <p>
      INICIO
      <i class="fas fa-angle-left right"></i>
      <span class="badge badge-info right"></span>
    </p>
  </a>
</li>

<?php if (in_array($nivel, [1, 2, 23, 3, 7, 11, 9, 10, 17, 50])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-copy"></i>
      <p>
        Cotizaciones
        <i class="fas fa-angle-left right"></i>
        <span class="badge badge-info right"><?= $cotissv ?? ''?></span>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="cotizaciones2_new.php" class="nav-link">
          <i class="fas fa-address-book nav-icon"></i>
          <p>Crear Cotizacion</p>
        </a>
      </li>
    </ul>
  </li>
<?php endif; ?>

<?php if (in_array($nivel, [1, 2, 23, 4, 3, 5, 7, 9, 11, 15, 8, 20, 17, 50, 21, 22])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tools"></i>
      <p>
        Produccion POP
        <i class="fas fa-angle-left right"></i>
        <span class="badge badge-info right"><?= $ordenes_activas_pop ?? ''?></span>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="lista_pop_nueva.php" class="nav-link">
          <i class="fas fa-check-circle nav-icon"></i>
          <p>POP Activas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="lista_pop_nueva_fin.php" class="nav-link">
          <i class="fas fa-check-double nav-icon"></i>
          <p>POP Finalizadas</p>
        </a>
      </li>
      <?php if (in_array($nombre, ['Color Digital IT', 'Eduardo Campos', 'David Contreras'])): ?>
        <li class="nav-item">
          <a href="lista_aprobacion_pop.php" class="nav-link">
            <i class="fas fa-check-double nav-icon"></i>
            <p>Pendientes de aprobacion</p>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </li>
<?php endif; ?>

<?php if (in_array($nivel, [1, 2, 23, 4, 3, 5, 7, 9, 10, 11, 15, 8, 20, 17, 50, 21, 22])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-tools"></i>
      <p>
        Produccion PO
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <?php if ($nivel == 10): ?>
        <li class="nav-item">
          <a href="lista_po_vendedores.php" class="nav-link">
            <i class="fas fa-check-circle nav-icon"></i>
            <p>Reporte Fotos</p>
          </a>
        </li>
      <?php endif; ?>
    </ul>
  </li>
<?php endif; ?>

<?php if (in_array($nivel, [1, 2, 23, 4, 3, 5, 7, 9, 11, 15, 8, 20, 17, 50, 21, 22])): ?>
  <li class="nav-item">
    <a href="lista_po_nueva.php" class="nav-link">
      <i class="fas fa-check-circle nav-icon"></i>
      <p>PO Activas</p>
    </a>
  </li>
  <li class="nav-item">
    <a href="lista_po_nueva_fin.php" class="nav-link">
      <i class="fas fa-check-double nav-icon"></i>
      <p>PO Finalizadas</p>
    </a>
  </li>
<?php endif; ?>


    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tools"></i>
        <p>
          Produccion Campos
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="lista_campos_nueva.php" class="nav-link">
            <i class="fas fa-check-circle nav-icon"></i>
            <p>Campos Activas</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="lista_campos_nueva_fin.php" class="nav-link">
            <i class="fas fa-check-double nav-icon"></i>
            <p>Campos Finalizadas</p>
          </a>
        </li>
      </ul>
    </li>


<?php if (in_array($nivel, [1, 17, 9])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="fas fa-shipping-fast"></i>
      <p>
        Logistica
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="logistica_sv2.php" class="nav-link">
          <i class="fas fa-dolly"></i>
          <p>Logistica SV</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="logistica_terminada_sv2.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>Logistica SV terminadas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="logistica_nc2.php" class="nav-link">
          <i class="fas fa-dolly"></i>
          <p>Logistica NI</p>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a href="logistica_nc_fin2.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>Logistica NI Terminadas</p>
        </a>
      </li> -->
      <li class="nav-item">
        <a href="sticker2.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>Stickers</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="solicitud_despacho.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>Solicitud Despacho Normal</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="solinueva.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>Solicitud Despacho New</p>
        </a>
      </li>
    </ul>
  </li>
<?php endif; ?>

<!-- <?php if (in_array($nivel, [1, 2, 23, 4, 3, 5, 7, 9, 11, 15, 8, 20, 17, 50, 21, 22])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="nav-icon fas fa-list-alt"></i>
      <p>
        Reportes
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="reportepop.php" class="nav-link">
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Reporte POP</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="reportepo.php" class="nav-link">
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Reporte PO</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="reporte_campos.php" class="nav-link">
          <i class="fas fa-clipboard-list nav-icon"></i>
          <p>Reporte Campos</p>
        </a>
      </li>
    </ul>
  </li>
<?php endif; ?> -->

<?php
if (in_array($nivel, [1, 2, 23, 4, 3, 17, 8, 50])): ?>
  <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
      <i class="fas fa-chalkboard-teacher"></i>
      <p>
        Ordenes de Diseño
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview">
      <li class="nav-item">
        <a href="ordenes_diseno_activa2.php" class="nav-link">
          <i class="fas fa-clipboard-check"></i>
          <p>OD Activas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="ordenes_diseño_finalizadas2.php" class="nav-link">
          <i class="fas fa-clipboard-list"></i>
          <p>OD Terminadas</p>
        </a>
      </li>
    </ul>
  </li>
<?php endif; ?>

<?php

if (in_array($nivel, [1, 2, 23, 5, 8, 17, 11, 3, 6, 21, 22])) {
?>

<li class="nav-item has-treeview">
  <a href="#" class="nav-link">
    <i class="fas fa-dolly"></i>
    <p>
      Suministros
      <i class="fas fa-angle-left right"></i>
    </p>
  </a>
  <ul class="nav nav-treeview">
    <?php if ($nivel == 11) { ?>
      <li class="nav-item">
        <a href="index_ordenes2.php" class="nav-link">
          <i class="fas fa-file"></i>
          <p>Ver Ordenes de Compra</p>
        </a>
      </li>
    <?php } ?>

    <?php if (in_array($nivel, [5, 21, 22])) { ?>
      <li class="nav-item">
        <a href="suministros.reporte.tintas2.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Consultar Tintas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="suministros.descarga.tintas2.php" class="nav-link">
          <i class="far fa-circle nav-icon"></i>
          <p>Descargar Tintas</p>
        </a>
      </li>
    <?php } elseif ($nivel != 11) { ?>
      <?php if ($base == "esa" && in_array($nivel, [1, 2])) { ?>
        <li class="nav-item">
          <a href="datatable_inventario.php" class="nav-link">
            <i class="fas fa-dolly-flatbed"></i>
            <p>Inventario Informatica CD</p>
          </a>
        </li>
      <?php } ?>
      <li class="nav-item">
        <a href="index_tintas2.php" class="nav-link">
          <i class="fas fa-dolly-flatbed"></i>
          <p>Ver Materiales</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="index_ordenes2.php" class="nav-link">
          <i class="fas fa-file"></i>
          <p>Ver Ordenes de Compra</p>
        </a>
      </li>
      <?php if ($nivel == 6) { ?>
        <li class="nav-item">
          <a href="suministros.descargas.bitacora2.php" class="nav-link">
            <i class="fas fa-arrow-alt-circle-up"></i>
            <p>Ingreso de Materiales</p>
          </a>
        </li>
      <?php } else { ?>
        <li class="nav-item">
          <a href="index_materiales2.php" class="nav-link">
            <i class="fas fa-arrow-alt-circle-up"></i>
            <p>Ingreso de Materiales</p>
          </a>
        </li>
      <?php } ?>
    <?php } ?>
  </ul>
</li>

<?php
}
?>
