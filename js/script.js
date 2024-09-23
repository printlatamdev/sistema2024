$(document).ready(function() {
    // Llama a la función load cuando se carga la página por primera vez
    load(1);
});

function load(page) {
    var query = $("#q").val();
    var per_page = 5;
    var parametros = {"action": "ajax", "page": page, "query": query, "per_page": per_page};

    console.log('Sending request with parameters:', parametros);

    $("#loader").fadeIn('slow');

    $.ajax({
        url: 'listar_pop.php',
        data: parametros,
        type: 'GET',
        beforeSend: function() {
            $("#loader").html("Cargando...");
        },
        success: function(data) {
            // console.log('Response received:', data);
            $("#outer_div").html(data).fadeIn('slow');
            $("#loader").html("");
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.error('Error occurred:', textStatus, errorThrown);
            console.error('Status code:', jqXHR.status);
            console.error('Response text:', jqXHR.responseText);
            $("#loader").html("Error al cargar los datos.");
        }
    });
}

// /var/www/html/sistema2024/listar_pop_new.php

// $('#editProductModal').on('show.bs.modal', function(event) {
//     var button = $(event.relatedTarget);
//     $('#edit_code').val(button.data('code'));
//     $('#edit_name').val(button.data('name'));
//     $('#edit_category').val(button.data('category'));
//     $('#edit_stock').val(button.data('stock'));
//     $('#edit_price').val(button.data('price'));
//     $('#edit_id').val(button.data('id'));
// });

// $('#deleteProductModal').on('show.bs.modal', function(event) {
//     var button = $(event.relatedTarget);
//     $('#delete_id').val(button.data('id'));
// });

// function handleFormSubmit(form, url, modalId) {
//     var parametros = $(form).serialize();
    
//     $.ajax({
//         type: "POST",
//         url: url,
//         data: parametros,
//         beforeSend: function() {
//             $("#resultados").html("Enviando...");
//         },
//         success: function(datos) {
//             $("#resultados").html(datos);
//             load(1);
//             $(modalId).modal('hide');
//         },
//         error: function() {
//             $("#resultados").html("Error al enviar los datos.");
//         }
//     });
// }

// $("#edit_product").submit(function(event) {
//     event.preventDefault();
//     handleFormSubmit(this, "ajax/editar_producto.php", '#editProductModal');
// });

// $("#add_product").submit(function(event) {
//     event.preventDefault();
//     handleFormSubmit(this, "ajax/guardar_producto.php", '#addProductModal');
// });

// $("#delete_product").submit(function(event) {
//     event.preventDefault();
//     handleFormSubmit(this, "ajax/eliminar_producto.php", '#deleteProductModal');
// });
