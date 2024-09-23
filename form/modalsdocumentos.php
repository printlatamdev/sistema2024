<!--MODAL DE DE DOCUMENTOS PARA EL SALVADOR-->
<!--DOCUMENTOS DE ADMINISTRACION-->
<!--ORDEN DE CONMPRA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ocomprasv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR ORDEN DE COMPRA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58" value="" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
                   <? echo $row['id_orden'];?>
            </div>
            <?echo $row['id_orden']; ?>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ocompra" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                <div class="col-md-12">
                   
                </div>
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ocompra" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>

<!--FACTURA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="facturasv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR FACTURA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden1" value="" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="factura" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                <div class="col-md-12">
                   <!--CONSULTA PARA FACTURAS-->
                   <?
                      $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='".$row['id_orden']."'");
                      while ($rowfac = mysqli_fetch_assoc($facturac)) {?>
                        <div class="col-xs-2 col-md-3 col-lg-3">
                            <a href="ORDENES_POP/288/ARTES_288/mueble_288_100.jpg" class="fancybox">
                               <img src="imagenes/pdf.png" class="img-thumbnail">
                            </a>
                        </div>
                     <? }
                    ?>
                </div>
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="factura" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--COMPROBANTE DE PAGO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="cpagosv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR COMPROBANTE DE PAGO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58" value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="cpago" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="cpago" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--NOTA DE ENVIO-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nenviosv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR NOTA DE ENVIO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="nenvio" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="nenvio" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!-- NOTA REMISION-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nremisionsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR NOTA DE REMISION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="nremision" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="nremision" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>

<!--DOCUMENTOS DE LOGISTICA -->
<!--PACKING LIST -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="packsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR PACKING LIST</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pack" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pack" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--DUCA T -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ducatsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR DUCA T</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ducat" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ducat" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--FAUCA O DUCAF -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ducafsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR FAUCA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ducaf" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ducaf" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--MANIFIESTO DE CARGA-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="mcargasv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR MANIFIESTO DE CARGA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="mcarga" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="mcarga" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--PAGO IMPUESTO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="pimpuestosv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR PAGO DE IMPUESTO/h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pimpuesto" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pimpuesto" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--CARTA PORTE -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="cportesv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR CARTA PORTE</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="cporte" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="cporte" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--GUIA AEREA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="gareasv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR GUIA AEREA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="garea" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="garea" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--POLIZA DE EXPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="pexportacionsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR POLIZA DE EXPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pexportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pexportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SOLICITUD DE DESPACHO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="sdespachosv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SOLICITUD DE DESPACHO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="sdespacho" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="sdespacho" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO TRANSPORTE -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="stransportesv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE TRANSPORTE</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="stransporte" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="stransporte" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO EXPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="sexportacionsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE EXPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="sexportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="sexportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO IMPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="simportacionsv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE IMPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="simportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="simportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--POLIZA DE SEGURO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="polizasv" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR POLIZA DE SEGURO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="poliza" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="sv" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="poliza" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!-- FIN  DE DOCUMENTOS DE EL SALVADOR-->


<!------------------------------------------------------------------------------------------------------------------------>
<!--MODAL DE DE DOCUMENTOS PARA NICARAGUA-->
<!--DOCUMENTOS DE ADMINISTRACION-->
<!--ORDEN DE CONMPRA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ocompranc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR ORDEN DE COMPRA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58" value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ocompra" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                <div class="col-md-12">
                   
                </div>
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ocompra" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--FACTURA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="facturanc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR FACTURA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="factura" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                <div class="col-md-12">
                   <!--CONSULTA PARA FACTURAS-->
                   <?
                      $facturac = mysqli_query($conexion,"select * from pop_documentos where orden='".$row['id_orden']."'");
                      while ($rowfac = mysqli_fetch_assoc($facturac)) {?>
                        <div class="col-xs-2 col-md-3 col-lg-3">
                            <a href="ORDENES_POP/288/ARTES_288/mueble_288_100.jpg" class="fancybox">
                               <img src="imagenes/pdf.png" class="img-thumbnail">
                            </a>
                        </div>
                     <? }
                    ?>
                </div>
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="factura" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--COMPROBANTE DE PAGO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="cpagonc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR COMPROBANTE DE PAGO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58" value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="cpago" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="cpago" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--NOTA DE ENVIO-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nenvionc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR NOTA DE ENVIO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="nenvio" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="nenvio" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!-- NOTA REMISION-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="nremisionnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR NOTA DE REMISION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="nremision" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="nremision" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>

<!--DOCUMENTOS DE LOGISTICA -->
<!--PACKING LIST -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="packnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR PACKING LIST</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pack" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pack" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--DUCA T -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ducatnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR DUCA T</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ducat" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ducat" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--FAUCA O DUCAF -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="ducafnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR FAUCA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="ducaf" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="ducaf" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--MANIFIESTO DE CARGA-->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="mcarganc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR MANIFIESTO DE CARGA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="mcarga" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="mcarga" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--PAGO IMPUESTO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="pimpuestonc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR PAGO DE IMPUESTO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pimpuesto" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pimpuesto" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--CARTA PORTE -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="cportenc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR CARTA PORTE</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="cporte" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="cporte" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--GUIA AEREA -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="gareanc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR GUIA AEREA</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="garea" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="garea" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--POLIZA DE EXPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="pexportacionnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR POLIZA DE EXPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="pexportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="pexportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SOLICITUD DE DESPACHO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="sdespachonc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SOLICITUD DE DESPACHO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="sdespacho" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="sdespacho" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO TRANSPORTE -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="stransporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE TRANSPORTE</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="stransporte" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="stransporte" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO EXPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="sexportacionnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE EXPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="sexportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="sexportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--SERVICIO IMPORTACION -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="simportacionnc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR SERVICIO DE IMPORTACION</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="simportacion" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="simportacion" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!--POLIZA DE SEGURO -->
<form method="post" action="script/subirDocumentos.php" enctype="multipart/form-data" >
    <div class="modal fade" id="polizanc" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static" class="close">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">INGRESAR POLIZA DE SEGURO</h4>
             </div>
            <div class="modal-body">
             <div class="form-group">
                   ORDEN POP #<input id="id_orden58"  value="<?echo $row['id_orden']; ?>" type="text" class="form-control" name="id" aria-label="..." readonly="readonly" required>
            </div>

            <div class="form-group">
                  <input name="option" type="hidden"  value="poliza" class="form-control" aria-label="...">
            </div>
            <div class="form-group">
                  <input name="origen" type="hidden"  value="nc" class="form-control" aria-label="...">
            </div>
                
                <div class="form-group">
                  <!--<label class="col-md-4 control-label" >Factura</label>-->
                  <div class="col-md-4 inputGroupContainer">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                      <input  class="form-control" name="poliza" type="file" aria-label="..."  /> 
                    </div>
                  </div>
            <a href="produccion_doc.php"> <button type="button" class="btn btn-default" >Cancelar</button></a>
            <button type="submit" class="btn btn-primary">Enviar</button>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>
  </div>
</div>
</form>
<!-- FIN  DE DOCUMENTOS DE EL SALVADOR-->


