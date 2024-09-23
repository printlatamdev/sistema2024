
 //*************************************************************************************************
jQuery("#agregar_detalle").click(function(){
jQuery( "#agregar_detalle" ).prop( "disabled", true );    



var orden = jQuery("#orden").val();
var costo_total = jQuery("#costo_total").val();
var cantidad = jQuery("#cantidad").val();
var precio_unitario = jQuery("#precio_unitario").val();
var iva = jQuery("#iva").val();
var total_oferta = jQuery("#total_oferta").val();
var detalle = jQuery("#detalle").val();
var bandera = 2;

detalle = detalle.replace(new RegExp("'"), " \" ");
textarea_line = detalle.replace(new RegExp("\n","g"), "<br>");
 
     
    


// Returns successful data submission message when the entered information is stored in database.
var dataString = 'orden='+ orden +'&costo_total='+ costo_total +'&cantidad='+ cantidad +'&precio_unitario='+ precio_unitario + '&iva='+ iva + '&total_oferta='+ total_oferta + '&detalle='+ detalle + '&bandera='+ bandera;


if(cantidad=='' || precio_unitario=='' || detalle=='' )
{
  jQuery('#vacio').click();
  jQuery( "#agregar_detalle" ).prop( "disabled", false );
}
else
{
                
    
                // AJAX Code To Submit Form.
                jQuery.ajax({
                type: "POST",
                url: "cot.sql.php",
                data: dataString,
                cache: false,
                //contentType: false,
                //processData: false,
                           
                success: function(result){ 

                    if(result != '')
                    {                    

                        jQuery('#exito_detalle3').click();
                        jQuery( "#agregar_detalle" ).prop( "disabled", false );
                        jQuery('#cantidad').val('');
                        jQuery('#precio_unitario').val('');
                        jQuery('#detalle').val('');
                        jQuery('#costo_total').val('');
                        jQuery("#total_oferta").val('');
                        jQuery("#iva").val(''); 

                        //var txt='<div class="panel panel-default"><div id="pnn" class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_'+result+'"><b>Detalle</b> </a></h4></div><div id="collapse_'+result+'" class="panel-collapse collapse"><div class="panel-body" style="height:260px; overflow-y:auto;"><table><tr><td width=70%><p><b>Cotizacion:</b>&nbsp;&nbsp;<font color="blue">'+coti+'</font></p><p><b>Tipo de Trabajo:</b>&nbsp;&nbsp;<font color="blue">'+trabajo+'</font></p><p><b>Cantidad:</b>&nbsp;&nbsp;<font color="blue">'+cantidad+'</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Tamaño:</b>&nbsp;&nbsp;<font color="blue">'+base+'</font>(base) X <font color="blue">'+altura+'</font>(altura) Metros.</p><p><b>Material:</b>&nbsp;&nbsp;<font color="blue">'+nom_material+'</font></p><p><b>Laminado:</b>&nbsp;&nbsp;<font color="blue">'+nom_laminado+'</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Rigido:</b>&nbsp;&nbsp;<font color="blue">'+nom_rigido+'</font></p><p><b>Tiro:</b>&nbsp;&nbsp;<font color="blue">'+impresion+'</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Equipo:</b>&nbsp;&nbsp;<font color="blue">'+nom_equipo+'</font></p><p><b>Nota:</b>&nbsp;&nbsp;<font color="blue">'+nota+'</font></p></td><td width=30%><center><img id="im'+result+'" width="300px" border="10" src=""></center></td></tr></table></div></div></div>';
     

        var txt1='<div id="aq_'+result+'" class="panel panel-default"><div id="pnn_'+result+'" class="panel-heading"><h4 class="panel-title"><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#collapse_'+result+'"><b>Detalle</b> </a></h4></div><div id="collapse_'+result+'" class="panel-collapse collapse"><div class="panel-body"  overflow-y:auto;">';
        
       
        var txt2=' <div class="row"><div id="cnt2" class="col-xs-12 col-sm-12 col-md-12"><div class="row"><div id="sep" class="col-md-12"></div></div><div class="row"><div id="sep" class="col-md-12"></div></div>';

        var txt3='<div class="row"><div id="tab-container"  class="table-responsive"><table id="tab" class="table table-bordered table-condensed"><thead>';
        var txt4='<tr><td></td><td><strong>Detalle</strong></td><td align="center"><strong>Cantidad</strong></td><td align="center"><strong>Precio</strong></td><td align="center"><strong>Costo Total</strong></td></tr></thead><tbody>';
                
       var txt5='<tr><td><a class="delete" href="#" page="'+result+'"><img id="ex2" src="images/eli.png" alt="Eliminar Registro" /></a><br><br><br>'; 

       //var txt6='<a class="edit" href="#" page="coti.nueva.php?det='+result+'&orden='+orden+'"><img id="ex2" src="images/edit.png" alt="Editar Registro" /></a>';

       var txt6='<a target="_self" href="cot.detalle.php?det='+result+'&orden='+orden+'" ><img id="ex2" src="images/edit.png" alt="Editar Registro" /></a>';


         var txt7='</td><td><span>'+textarea_line+'</span></td><td align="center">'+cantidad+'</td><td align="center">$'+precio_unitario+'</td><td align="center">$'+costo_total+'</td></tr></tbody></table></div></div></div></div>  </div></div></div>';


       //var txt2=' <div class="row"><div id="qw0" class="col-md-12">DETALLE&nbsp;&nbsp;&nbsp;CANTIDAD&nbsp;&nbsp;&nbsp;PRECIO&nbsp;&nbsp;&nbsp;COSTO TOTAL&nbsp;&nbsp;&nbsp;IVA&nbsp;&nbsp;&nbsp;TOTAL OFERTA</div>';


        //var txt3=' <div class="row"><div id="qw0" class="col-md-12">'+textarea_line+'&nbsp;&nbsp;&nbsp;'+cantidad+'&nbsp;&nbsp;&nbsp;'+precio_unitario+'&nbsp;&nbsp;&nbsp;'+costo_total+'&nbsp;&nbsp;&nbsp;'+iva+'&nbsp;&nbsp;&nbsp;'+total_oferta+'</div>  </div></div></div>';


                
        var paraf= txt1 + txt2 + txt3 + txt4 + txt5 + txt6 + txt7;

                        jQuery('#accordion1').append(paraf);

                        
                        
                    }
                    else if (result == 0)
                    {

                        //jQuery('#error').click();     
                        //jQuery( "#color" ).prop( "disabled", false );
                    }

                }
                });



}
//*************************************************************************************************




return false;
});
//**************************************************************************************************




  

 











