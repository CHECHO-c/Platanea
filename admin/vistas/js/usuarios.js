$("#tablaUsuarios").DataTable({
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

$('input[name="subirImgUsuarios"]').change(function () {
  var imagen = this.files[0];

  /*=============================================
    VALIDAMOS EL FORMATO DE LA IMAGEN SEA JPG O PNG
    =============================================*/
  if (imagen["type"] != "image/jpeg" && imagen["type"] != "image/png") {
    $('input[name="subirImgUsuarios"]').val("");

    swal({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      type: "error",
      confirmButtonText: "!Cerrar!",
    });
  } else if (imagen["size"] > 2000000) {
    $('input[name="subirImgUsuarios"]').val("");

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

      $(".previsualizarImgusuarios").attr("src", rutaImagen);
    });
  }
});

// Trae info del usuario al hacer clic en editar
$("#tablaUsuarios").on("click", ".btnEditarUsuario", function () {


  var idUsuario = $(this).attr("idUsuario");

  var datos = new FormData();

  datos.append("idUsuario", idUsuario);


  $.ajax({
    url: "ajax/usuarios.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      $("#idPerfilE").val(respuesta["id_usuario"]);
      $("#nom_usuariosE").val(respuesta["nombre"]);
      $("#pass_userE").val(respuesta["contraseña"]);
      $("#telefonoE").val(respuesta["telefono"]);
      $("#correoE").val(respuesta["correo"]);
      $(".previsualizarImgusuarios").attr("src", respuesta["foto"]);
      $("#fotoActualE").val(respuesta["foto"]);
      $("#pass_userActualE").val(respuesta["password"]);


    },
    error: function (xhr, status, error) {
      console.error("Error en la petición Ajax:", error);
      console.log("Respuesta del servidor:", xhr.responseText);
    }
  });
});

/**ELIMINAR USUARIO */

$(document).on("click", ".btnEliminarUsuario", function () {
  var idUsuario = $(this).attr("idUsuarioE");
  var rutaFoto = $(this).attr("rutaFoto");

  swal({
    title: "¿Está seguro de eliminar este usuario?",
    text: "¡Si no lo está puede cancelar la acción!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Si, eliminar usuario!",
  }).then(function (result) {
    if (result.value) {
      var datos = new FormData();
      datos.append("idUsuarioE", idUsuario);
      datos.append("rutaFoto", rutaFoto);

      $.ajax({
        url: "ajax/usuarios.ajax.php",
        method: "POST",
        data: datos,
        cache: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
          if (respuesta == "ok") {
            // todo OK
            swal({
              type: "success",
              title: "¡CORRECTO!",
              text: "El usuario ha sido borrado correctamente",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            }).then(function (result) {
              if (result.value) {
                window.location = "usuarios";
              }
            });
          } else if (respuesta == "error_no_puede_eliminarse") {
            swal({
              type: "error",
              title: "Error",
              text: "No puedes eliminar tu propio usuario.",
              showConfirmButton: true,
              confirmButtonText: "Cerrar",
            });
          } else {
            // otro error genérico
            console.error("Respuesta inesperada:", respuesta);
          }
        },
        error: function (xhr, status, error) {
          console.error("Error en la eliminación del usuario:", error);
          console.log("Respuesta del servidor:", xhr.responseText);
        },
      });
    }
  });
});


