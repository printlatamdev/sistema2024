<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>.::IMPRESION | SISTEMA DE PRODUCCION - COLOR DIGITAL::.</title>
  <style type="text/css">
  
    body {
      background-color: #FFFFFF;
      margin-left: 0px;
      margin-top: 0px;
      margin-right: 0px;
      margin-bottom: 0px;
      font-size: 7pt
    }

  </style>
</head>

<body onload="window.print()">
  <table width="100%" height="425" align="center" cellpadding="0" cellspacing="0" style="border:solid #666666 1px">
    <tr>
      <td valign="top" height="24">
        <table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" style="border:solid #999999 1px">
          <?
          session_start();
          $base = $_SESSION['base'];

          include('../'.$base.'_db.php');

          $id = $_GET['idorden'];
          $sql = "SELECT * FROM pop WHERE id_orden='$id'";

          $rs = $mysqli->query($sql);


          while ($row2 = $rs->fetch_assoc()) {

            $id_orden = $row2['id_orden'];

            $empresa = $row2['empresa'];
          ?>

            <tr>
              <td align="left" bgcolor="#F4F4F4">&nbsp;</td>
              <td align="left" bgcolor="#F4F4F4"><strong>Nº de orden</strong></td>
              <td align="left" bgcolor="#F4F4F4"><strong>:</strong>&nbsp;<?= $row2['id_orden'] ?></td>
              <td align="left" bgcolor="#F4F4F4"><strong>Cliente</strong></td>
              <td align="left" bgcolor="#F4F4F4"><strong>:</strong>&nbsp;<?= utf8_decode($empresa) ?></td>
            </tr>

            <tr>
              <td width="1%" align="left" bgcolor="#F4F4F4">&nbsp;</td>
              <td width="18%" align="left" bgcolor="#F4F4F4"><strong>Fecha Orden</strong></td>
              <td width="32%" align="left" bgcolor="#F4F4F4"><strong>:</strong>&nbsp;<?= $row2['fecha_orden'] ?></td>
              <td width="17%" align="left" bgcolor="#F4F4F4"><strong>Fecha Entrega </strong></td>
              <td width="32%" align="left" bgcolor="#F4F4F4"><strong>:</strong>&nbsp;<?= $row2['fecha_entrega'] ?></td>
            </tr>
            <tr>
              <td align="left" bgcolor="#F4F4F4" style="border-bottom: solid 1px #999999">&nbsp;</td>
              <td align="left" bgcolor="#F4F4F4" style="border-bottom: solid 1px #999999"><strong>Entregar en</strong></td>
              <td align="left" bgcolor="#F4F4F4" style="border-bottom: solid 1px #999999"><strong>:</strong>&nbsp;</td>
              <td align="left" bgcolor="#F4F4F4" style="border-bottom: solid 1px #999999"><strong>Empresa</strong></td>
              <td align="left" bgcolor="#F4F4F4" style="border-bottom: solid 1px #999999"><strong>:</strong>&nbsp;
                <?= $empresa ?></td>
            </tr>
            <?


            $sql2 = "SELECT * from pop_detalle  WHERE estado!='ANULADA' AND id_orden='$id' order by id_orden";


            $rs2 = $mysqli->query($sql2);


            while ($row = $rs2->fetch_assoc()) {

            ?>

              <tr>
                <td>&nbsp;</td>
                <td><strong>Tipo de Trabajo
                  </strong>
                <td colspan="3"><strong>:</strong>&nbsp;<?= strtoupper(utf8_decode($row['trabajo'])) ?>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Cantidad</strong>
                <td><strong>:</strong>&nbsp;
                  <?= $row['cantidad'] ?>
                <td><strong>Tama&ntilde;o</strong></td>
                <td><strong>:</strong><?= $row['base'] ?>&nbsp;(base)&nbsp;x&nbsp;<?= $row['altura'] ?>&nbsp;(altura)&nbsp;x&nbsp;<?= $row['fondo'] ?>&nbsp;(fondo) Metros</td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Material</strong>
                <td><strong>:</strong>&nbsp;
                  <?= $row['material'] ?>
                <td><strong>Rigido</strong></td>
                <td><strong>:</strong>&nbsp;
                  <?= $row['rigido'] ?></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><strong>Laminado</strong>
                <td><strong>:</strong>&nbsp;
                  <?= $row['laminado'] ?>
                <td><strong>Equipo</strong></td>
                <td><strong>:</strong>&nbsp;
                  <?= $row['equipo'] ?></td>
              </tr>


              <tr>
                <td style="border-bottom: dashed 1px #999999">&nbsp;</td>
                <td colspan="4" style="border-bottom: dashed 1px #999999"><strong>Detalles: </strong>
                  <?= $row['detalle'] ?> - <strong>Otros: </strong>&nbsp;<?= utf8_decode($row['acabado']) ?>.
              </tr>



            <?
            } ?>

          <?
          }
          $mysqli->close();
          ?>
        </table>
      </td>
    </tr>
  </table>
  <table width="100%" align="center" cellpadding="0" cellspacing="0" style="border:solid #666666 1px">
    <tr>
      <td width="20%" height="24" style="border-left: dotted #999999 1px">&nbsp;</td>
      <td width="20%" style="border-left: dotted #999999 1px">&nbsp;</td>
      <td width="20%" style="border-left: dotted #999999 1px">&nbsp;</td>
      <td width="20%" style="border-left: dotted #999999 1px; border-right: dotted #999999 1px">&nbsp;</td>
      <td width="20%">&nbsp;</td>
    </tr>
    <!--<tr>
  <td>&nbsp;</td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>-->
    <tr>
      <td style="border-left: dotted #999999 1px; border-top: dotted #999999 1px">Recepcion</td>
      <td style="border-left: dotted #999999 1px; border-top: dotted #999999 1px">Bodega</td>
      <td style="border-left: dotted #999999 1px; border-top: dotted #999999 1px">Computo</td>
      <td style="border-left: dotted #999999 1px; border-top: dotted #999999 1px">Impresion</td>
      <td style="border-left: dotted #999999 1px; border-top: dotted #999999 1px">Acabados</td>
    </tr>
  </table>
</body>

</html>