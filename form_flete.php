<form name="add_product" id="add_product">

   <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Seleccione Cliente</label>
        <select class="form-control" name="cliente" id="cliente" required="required">
            <option value="">SELECCIONE CLIENTE</option>
            <option value="0">HH GLOBAL EL SALVADOR</option>
            <option value="1">PEP PROMOTIONS</option>
            <option value="2">COLGATE PALMOLIVE</option>
            <option value="3">INNERWORKIN</option>
       

        </select>                    
    </div>
    <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Tipo de Servicio</label>
        <select class="form-control" name="tipo_servicio" id="tipo_servicio" required="required">
            <option value="">TIPO DE TRANSPORTE</option>
            <option value="0">DDP</option>
            <option value="1">TRANSPORTE</option>
            
       

        </select>                    
    </div>

      <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Pais de origen de origen</label>
        <select class="form-control" name="pais_origen" id="pais_origen" required="required">
            <option value="">SELECCIONE PAIS ORIGEN</option>
            <option value="SV">SV</option>
            <option value="NI">NI</option>        
        </select>

    </div>

      <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Pais de origen de destino</label>
        <select class="form-control" name="pais_destino" id="pais_destino" required="required">
            <option value="">SELECCIONE PAIS DESTINO</option>
            <option value="cr">CR</option>
            <option value="hn">HN</option>
             <option value="gt">GT</option>
            <option value="nica">NI</option>
             <option value="pn">PN</option>
            
       

        </select>                    
    </div>

      <div class="form-group"> <!-- State Button -->
        <label for="state_id" class="control-label">Tipo de camion</label>
        <select class="form-control" name="tipo_camion" id="tipo_camion" required="required">
            <option value="">SELECCIONE TIPO DE CAMION</option>
            <option value="15">1.5 TON</option>
            <option value="25">2.5 TON</option>
            <option value="3">3 TON</option>
             <option value="5">5 TON</option>
            <option value="4">4 TON</option>
             <option value="8">8 TON</option>
            <option value="12">12 TON</option>
             <option value="21">21 TON</option>          
            </select>                    
    </div>


    <div class="form-group"> <!-- Street 1 -->
        <label for="" class="control-label">Valor FOB</label>
        <input type="text" class="form-control" id="fob" name="fob" placeholder="Ingrese el valor FOB" required="required">
    </div> 

     

    
    <div class="modal-footer">
                        <input type="button" class="btn btn-default" onclick="javascript:window.location.reload();" data-dismiss="modal" value="LIMPIAR">
                        <input type="submit" class="btn btn-success" value="CALCULAR">
                    </div>   
    
</form>