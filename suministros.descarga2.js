

//*************************************************************************************************
jQuery("#tinta").click(function () {
    jQuery("#tinta").prop("disabled", true);
    var codigo = jQuery("#codigo").val();
    var empresa_tinta = jQuery('.rad_tinta:checked').val();

    var bandera = 1;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'codigo=' + codigo + '&empresa_tinta=' + empresa_tinta + '&bandera=' + bandera;

    if (codigo == '') {
        jQuery('#vacio').click();
        jQuery("#tinta").prop("disabled", false);
    }
    else {
        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 1) {
                    jQuery('#code').html(codigo);
                    jQuery('#exito').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta").prop("disabled", false);

                }
                else if (result == 0) {
                    jQuery('#code2').html(codigo);
                    jQuery('#error').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta").prop("disabled", false);
                }
                else if (result == 2) {
                    jQuery('#code45').html(codigo);
                    jQuery('#exis').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta").prop("disabled", false);
                }
            }

        });
    }
    return false;
});
//**************************************************************************************************



//*************************************************************************************************
jQuery("#materiales").click(function () {


    jQuery("#materiales").prop("disabled", true);
    var material = jQuery("#material").val();
    var cantidad = jQuery("#cantidad").val();
    var orden = jQuery("#orden").val();
    var comprobante = jQuery("#comprobante").val();
    var entrega = jQuery("#entrega").val();
    var nota = jQuery("#nota").val();
    var base = jQuery('[name="base"]').val();
    //var empresa = jQuery('form2 input[type=radio]:checked').val();
    var empresa = jQuery('.rad:checked').val();

    if (jQuery('#pop').is(":checked")) {
        var pop = 1;
    } else {
        var pop = 0;
    }


    if (jQuery('#op').is(":checked")) {
        var op = 1;
    } else {
        var op = 0;
    }


    var bandera = 2;



    //*********************************************************
    var fileName = jQuery("#arte").val();
    if (fileName == '') {

        var arte = '';
    } else {

        var fileExtension = fileName.substring(fileName.lastIndexOf('.') + 1);
        var num = Math.floor((Math.random() * 100) + 1);
        var arte = "SALIDA_" + orden + "_" + num + "." + fileExtension;
    }
    //*************************************************************


    var dataString = 'material=' + material + '&cantidad=' + cantidad + '&orden=' + orden + '&comprobante=' + comprobante + '&entrega=' + entrega + '&nota=' + nota + '&empresa=' + empresa + '&pop=' + pop + '&op=' + op + '&bandera=' + bandera + '&arte=' + arte + '&base=' + base;


    if (cantidad == '' || orden == '' || comprobante == '' || entrega == '') {
        jQuery('#vacio_material').click();
        jQuery("#materiales").prop("disabled", false);
    }
    else {

        if (arte != '') {

            //*************************************************************
            var inputFileImage = document.getElementById("arte");
            var file = inputFileImage.files[0];
            var data = new FormData();
            data.append('archivo', file);
            data.append('nombre', arte);

            jQuery.ajax({
                type: "POST",
                url: "suministros.descarga2.php",
                data: data,
                cache: false,
                contentType: false,
                processData: false,

                success: function (result2) {

                }
            });
            //***********************************************************  
        }





        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descarga2.php",
            data: dataString,
            cache: false,
            success: function (result) {

                //console.log(result);

                if (result == 0) {
                    jQuery('#fallo').click();
                    jQuery("#materiales").prop("disabled", false);

                }
                else if (result == 1) {


                    jQuery('#exito2').click();
                    jQuery('#cantidad').val('');
                    jQuery('#orden').val('');
                    jQuery('#comprobante').val('');
                    jQuery('#entrega').val('');
                    jQuery('#nota').val('');
                    jQuery("#arte").val('');
                    jQuery("#ok").hide();
                    jQuery("#materiales").prop("disabled", false);

                }

            }
        });
    }
    return false;
});
//**************************************************************************************************



//*************************************************************************************************
jQuery("#tinta_imp").click(function () {
    jQuery("#tinta_imp").prop("disabled", true);
    var codigo = jQuery("#codigo").val();
    //var empresa_tinta = jQuery('.rad_tinta:checked').val();
    var nom_equipo = jQuery("#equipo option:selected").text();


    var bandera = 3;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'codigo=' + codigo + '&nom_equipo=' + nom_equipo + '&bandera=' + bandera;

    if (codigo == '') {
        jQuery('#vacio').click();
        jQuery("#tinta_imp").prop("disabled", false);
    }
    else {
        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 1) {
                    jQuery('#code').html(codigo);
                    jQuery('#exito').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta_imp").prop("disabled", false);

                }
                else if (result == 0) {
                    jQuery('#code2').html(codigo);
                    jQuery('#error').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta_imp").prop("disabled", false);
                }


            }
        });
    }
    return false;
});
//**************************************************************************************************




//*************************************************************************************************
jQuery("#tinta_desp").click(function () {
    jQuery("#tinta_desp").prop("disabled", true);
    var cantidad_des = jQuery("#cantidad_des").val();
    //var empresa_tinta = jQuery('.rad_tinta:checked').val();
    var tipo_tinta = jQuery("#tipo_tinta option:selected").text();


    var bandera = 10;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'cantidad_des=' + cantidad_des + '&tipo_tinta=' + tipo_tinta + '&bandera=' + bandera;

    if (cantidad_des == '') {
        jQuery('#vacio2').click();
        jQuery("#tinta_desp").prop("disabled", false);
    }
    else {
        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 1) {
                    //jQuery('#code').html(cantidad_des);
                    jQuery('#exito2').click();
                    jQuery('#cantidad_des').val('');
                    jQuery("#tinta_desp").prop("disabled", false);

                }
                else if (result == 0) {
                    //jQuery('#code2').html(cantidad_des);
                    jQuery('#error').click();
                    jQuery('#cantidad_des').val('');
                    jQuery("#tinta_desp").prop("disabled", false);
                }


            }
        });
    }
    return false;
});
//**************************************************************************************************






//*************************************************************************************************
jQuery("#tinta_imp_admin").click(function () {
    jQuery("#tinta_imp_admin").prop("disabled", true);
    var codigo = jQuery("#codigo").val();
    var fecha = jQuery("#fecha").val();
    //var empresa_tinta = jQuery('.rad_tinta:checked').val();
    var nom_equipo = jQuery("#equipo option:selected").text();




    var bandera = 6;
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'codigo=' + codigo + '&fecha=' + fecha + '&nom_equipo=' + nom_equipo + '&bandera=' + bandera;

    if (codigo == '') {
        jQuery('#vacio').click();
        jQuery("#tinta_imp_admin").prop("disabled", false);
    }
    else {
        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 1) {
                    jQuery('#code').html(codigo);
                    jQuery('#exito').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta_imp_admin").prop("disabled", false);


                }
                else if (result == 0) {
                    jQuery('#code2').html(codigo);
                    jQuery('#error').click();
                    jQuery('#codigo').val('');
                    jQuery("#tinta_imp_admin").prop("disabled", false);

                }


            }
        });
    }
    return false;
});
//**************************************************************************************************










//*************************************************************************************************
jQuery("#ingreso_materiales").click(function () {

    jQuery("#ingreso_materiales").prop("disabled", true);
    var material = jQuery("#material").val();
    var cantidad = jQuery("#cantidad").val();
    var bandera = 4;
    // Returns successful data submission message when the entered information is stored in database.

    var dataString = 'material=' + material + '&cantidad=' + cantidad + '&bandera=' + bandera;


    if (cantidad == '') {
        jQuery('#vacio_material').click();
        jQuery("#ingreso_materiales").prop("disabled", false);
    }
    else {

        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 0) {
                    jQuery('#fallo').click();
                    jQuery("#ingreso_materiales").prop("disabled", false);

                }
                else if (result == 1) {

                    jQuery('#exito2').click();
                    jQuery('#cantidad').val('');
                    jQuery("#ingreso_materiales").prop("disabled", false);

                }

            }
        });
    }
    return false;
});
//**************************************************************************************************






//*************************************************************************************************
jQuery("#ingreso_tinta").click(function () {

    jQuery("#ingreso_tinta").prop("disabled", true);
    var tipo_tinta = jQuery("#tipo_tinta").val();
    var color_tinta = jQuery("#color_tinta").val();
    var cantidad_tinta = jQuery("#cantidad_tinta").val();
    var bandera = 5;
    // Returns successful data submission message when the entered information is stored in database.

    var dataString = 'tipo_tinta=' + tipo_tinta + '&color_tinta=' + color_tinta + '&cantidad_tinta=' + cantidad_tinta + '&bandera=' + bandera;


    if (cantidad_tinta == '') {
        jQuery('#vacio_material').click();
        jQuery("#ingreso_tinta").prop("disabled", false);
    }
    else {

        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 0) {
                    jQuery('#fallo').click();
                    jQuery("#ingreso_tinta").prop("disabled", false);

                }
                else if (result == 1) {

                    jQuery('#exito3').click();
                    jQuery('#cantidad_tinta').val('');
                    jQuery("#ingreso_tinta").prop("disabled", false);

                }

            }
        });
    }
    return false;
});
//**************************************************************************************************











//*************************************************************************************************
jQuery("#bodega").click(function () {

    jQuery("#bodega").prop("disabled", true);
    var material = jQuery("#material").val();
    var cantidad = jQuery("#cantidad").val();
    var compra = jQuery("#compra").val();
    var proveedor = jQuery("#proveedor").val();
    var bandera = 9;
    // Returns successful data submission message when the entered information is stored in database.

    var dataString = 'material=' + material + '&cantidad=' + cantidad + '&compra=' + compra + '&proveedor=' + proveedor + '&bandera=' + bandera;


    if (cantidad == '') {
        jQuery('#vacio_material').click();
        jQuery("#bodega").prop("disabled", false);
    }
    else {

        // AJAX Code To Submit Form. 
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 0) {
                    jQuery('#fallo').click();
                    jQuery("#bodega").prop("disabled", false);

                }
                else if (result == 1) {

                    jQuery('#exito2').click();
                    jQuery('#cantidad').val('');
                    jQuery("#bodega").prop("disabled", true);

                }

            }
        });
    }
    return false;
});
//**************************************************************************************************








//*************************************************************************************************
jQuery("#ingreso_materiales_nuevo").click(function () {

    jQuery("#ingreso_materiales_nuevo").prop("disabled", true);
    var material_tipo = jQuery("#material_tipo").val();
    var material_cat = jQuery("#material_cat").val();
    var nom_material = jQuery("#nom_material").val();
    var bandera = 7;
    // Returns successful data submission message when the entered information is stored in database.

    var dataString = 'material_tipo=' + material_tipo + '&material_cat=' + material_cat + '&nom_material=' + nom_material + '&bandera=' + bandera;


    if (nom_material == '') {
        jQuery('#vacio_material').click();
        jQuery("#ingreso_materiales_nuevo").prop("disabled", false);
    }
    else {

        // AJAX Code To Submit Form.
        jQuery.ajax({
            type: "POST",
            url: "suministros.descargas.php",
            data: dataString,
            cache: false,
            success: function (result) {

                if (result == 0) {
                    jQuery('#error').click();
                    jQuery("#ingreso_materiales_nuevo").prop("disabled", false);

                }
                else if (result == 1) {

                    jQuery('#exito2').click();
                    jQuery('#nom_material').val('');
                    jQuery("#ingreso_materiales_nuevo").prop("disabled", false);

                }

            }
        });
    }
    return false;
});
//**************************************************************************************************