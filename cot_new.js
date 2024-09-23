jQuery("#agregar_detalle").click(function () {
  jQuery("#agregar_detalle").prop("disabled", true);
  
  var orden = jQuery("#orden").val();
  var costo_total = jQuery("#costo_total").val();
  var cantidad = jQuery("#cantidad").val();
  var precio_unitario = jQuery("#precio_unitario").val();
  var iva = jQuery("#iva").val();
  var total_oferta = jQuery("#total_oferta").val();
  var detalle = jQuery("#detalle").val();
  var producto = jQuery("#product").val();
  var image = $('#image')[0].files[0];
  var bandera = 2;

  console.log('Archivo seleccionado:', image); // Verifica el archivo seleccionado

  if (!image) {
      alert("Por favor, seleccione una imagen.");
      jQuery("#agregar_detalle").prop("disabled", false);
      return false;
  }

  var validImageTypes = ["image/jpeg", "image/png", "image/gif"];
  if (!validImageTypes.includes(image.type)) {
      alert("Por favor, seleccione una imagen con formato válido (JPEG, PNG, GIF).");
      jQuery("#agregar_detalle").prop("disabled", false);
      return false;
  }

  var data = new FormData();
  data.append('file', image);
  data.append('orden', orden);
  data.append('producto', producto);
  data.append('costo_total', costo_total);
  data.append('cantidad', cantidad);
  data.append('precio_unitario', precio_unitario);
  data.append('iva', iva);
  data.append('total_oferta', total_oferta);
  data.append('detalle', detalle);
  data.append('bandera', bandera);

  console.log('Datos enviados:', data); // Verifica el contenido de FormData

  if (cantidad === "" || precio_unitario === "" || detalle === "") {
      jQuery("#vacio").click();
      jQuery("#agregar_detalle").prop("disabled", false);
  } else {
      jQuery.ajax({
          type: "POST",
          url: "cot.sql_new2.php",
          data: data,
          cache: false,
          processData: false,
          contentType: false,
          success: function (result) {
              if (result != "") {
                  jQuery("#exito_detalle3").click();
                  jQuery("#agregar_detalle").prop("disabled", false);
                  jQuery("#product").val("");
                  jQuery("#cantidad").val("");
                  jQuery("#precio_unitario").val("");
                  jQuery("#detalle").val("");
                  jQuery("#costo_total").val("");
                  jQuery("#total_oferta").val("");
                  jQuery("#iva").val("");
                  $('#image').val("");
              } else if (result == 0) {
                  alert("Error al agregar el detalle. Inténtelo de nuevo.");
                  jQuery("#agregar_detalle").prop("disabled", false);
              }
          },
          error: function (jqXHR, textStatus, errorThrown) {
              alert("Error en la solicitud: " + textStatus + " - " + errorThrown);
              jQuery("#agregar_detalle").prop("disabled", false);
          }
      });
  }

  return false;
});