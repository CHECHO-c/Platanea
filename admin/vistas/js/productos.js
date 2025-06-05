$("#tablaProductos").DataTable({
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_",
    sInfoEmpty: "Mostrando registros del 0 al 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

// Previsualización de la imagen de producto
$('input[name="subirImgProducto"]').change(function () {
  var imagen = this.files[0];

  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $('input[name="subirImgProducto"]').val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "!Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $('input[name="subirImgProducto"]').val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 2MB!",
      type: "error",
      confirmButtonText: "!Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagen);

    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;

      $(".previsualizarImgProducto").attr("src", rutaImagen);
    });
  }
});

// Trae info del producto al hacer clic en editar
$("#tablaProductos").on("click", ".btnEditarProducto", function () {
  var idProducto = $(this).attr("idProducto");

  var datos = new FormData();
  datos.append("idProducto", idProducto);

  $.ajax({
    url: "ajax/productos.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idProductoE").val(respuesta["id_producto"]);
      $("#nombre_productoE").val(respuesta["nombre"]);
      $("#descripcion_productoE").val(respuesta["descripcion"]);
      $("#precio_productoE").val(respuesta["precio"]);
      $(".previsualizarImgProducto").attr("src", respuesta["foto"]);
      $("#fotoActualE").val(respuesta["foto"]);
    },
    error: function (xhr, status, error) {
      console.error("Error en la petición Ajax:", error);
      console.log("Respuesta del servidor:", xhr.responseText);
    },
  });
});

// Eliminar producto
$(document).on("click", ".btnEliminarProducto", function () {
  var idProductoEl = $(this).attr("idProductoE");
  var rutaFoto = $(this).attr("rutaFoto");
  swal({
    title: "¿Está seguro de eliminar este producto?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar producto!",
  }).then(function (result) {
    if (result.value) {
      var datos = new FormData();
      datos.append("idProductoE", idProductoEl);
      datos.append("rutaFoto", rutaFoto); 

      
      $.ajax({
        url: "ajax/productos.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
          if (respuesta == "ok") {
            swal({
              type: "success",
              title: "¡CORRECTO!",
              text: "El producto ha sido borrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "productos";
              }
            });
          }
        },
        error: function (xhr, status, error) {
          console.error("Error en la eliminación del producto:", error);
          console.log("Respuesta del servidor:", xhr.responseText);
        },
      });
    }
  });
});
