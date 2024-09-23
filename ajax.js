// Archivo javascript que manipulará Ajax con jQuery
$(function(){
    $("#enviar").click(function(evt){
        evt.preventDefault();
        var xcosa = $("#xcosa").val();


        $.ajax({
            url: "datos.php",
            method: "POST",
            data: { nom: xcosa },
            success: function(dataresponse, statustext, response){
       
                //if(dataresponse=="ok") mensaje = "Gracias por sus datos.";
                mensaje = dataresponse;//envio variables
                $("#respuesta").html("<p><strong>" + mensaje + "</strong></p>");
            },
           
        });
    });
});