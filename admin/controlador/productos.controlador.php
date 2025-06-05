<?php
class ctrProductos
{
    // Ingreso de productos (si hay login o alguna validación específica para productos)
    static public function ctrIngresoProductos()
    {
        // Similar a los usuarios, puedes añadir validación si es necesario
    }

    // Mostrar todos los productos
    public static function ctrMostrarProductos()
    {
        $tabla = "producto";
        $respuesta = mdlProductos::mdlMostrarProductos($tabla);
        return $respuesta;
    }

    // Mostrar un solo producto
    public static function ctrMostrarProducto($item, $valor)
    {
        $tabla = "producto";
        $respuesta = mdlProductos::mdlMostrarProducto($tabla, $item, $valor);
        return $respuesta;
    }

    // Guardar productos
    public static function ctrGuardarProductos()
    {
        if (isset($_POST["nombre_producto"])) {

            // Validar que el nombre no esté vacío
            if (trim($_POST["nombre_producto"]) === "") {
                echo '<script>
            swal({
                type: "error",
                title: "¡CORREGIR!",
                text: "¡El nombre del producto no puede estar vacío!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
                return;
            }

            // Validar que el precio no esté vacío, no sea negativo ni tenga letras
            if (!isset($_POST["precio_producto"]) || !is_numeric($_POST["precio_producto"]) || $_POST["precio_producto"] < 0) {
                echo '<script>
            swal({
                type: "error",
                title: "¡CORREGIR!",
                text: "¡El precio debe ser un número positivo!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
                return;
            }

            $ruta = ""; // Valor predeterminado si no hay imagen

            // Verificar si se ha seleccionado una imagen
            if (isset($_FILES["subirImgProducto"]) && $_FILES["subirImgProducto"]["error"] === UPLOAD_ERR_OK) {
                $permitidos = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
                $tipo = mime_content_type($_FILES["subirImgProducto"]["tmp_name"]);

                if (!array_key_exists($tipo, $permitidos)) {
                    echo '<script>
            swal({
                type: "error",
                title: "¡CORREGIR!",
                text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
                    return;
                }

                $directorio = "vistas/imagenes/productos";

                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755, true);
                }

                $ext = $permitidos[$tipo];
                $aleatorio = mt_rand(100, 999);
                $nombreUnico = 'producto_' . date('Ymd_His') . '_' . $aleatorio . $ext;
                $ruta = $directorio . "/" . $nombreUnico;
                $rutaAbsoluta = __DIR__ . '/../' . $ruta;

                if (!move_uploaded_file($_FILES["subirImgProducto"]["tmp_name"], $rutaAbsoluta)) {
                    echo '<script>
            swal({
                type: "error",
                title: "¡Error!",
                text: "Error al guardar la imagen en el servidor.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
                    return;
                }
            }

            $datos = array(
                "nombre_producto" => trim($_POST["nombre_producto"]),
                "descripcion_producto" => $_POST["descripcion_producto"],
                "precio_producto" => $_POST["precio_producto"],
                "foto_producto" => $ruta
            );

            $tabla = "producto";

            $respuesta = mdlProductos::mdlGuardarProducto($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
        swal({
            type: "success",
            title: "¡CORRECTO!",
            text: "¡El producto ha sido creado!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        }).then(function(result){
            if(result.value){
                window.location = "productos";
            }
        });
        </script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'>Registro fallido: " . $respuesta . "</div>";
            }
        }
    }


    // Editar productos
    public static function ctrEditarProductos()
{
    if (isset($_POST["idProductoE"])) {

     
        if (trim($_POST["nombre_productoE"]) === "") {
            echo '<script>
            swal({
                type: "error",
                title: "¡CORREGIR!",
                text: "¡El nombre del producto no puede estar vacío!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
            return;
        }

        // Validar que el precio no esté vacío, no sea negativo ni tenga letras
        if (!isset($_POST["precio_productoE"]) || !is_numeric($_POST["precio_productoE"]) || $_POST["precio_productoE"] < 0) {
            echo '<script>
            swal({
                type: "error",
                title: "¡CORREGIR!",
                text: "¡El precio debe ser un número positivo!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
            return;
        }

        $ruta = ""; // Valor predeterminado si no hay nueva imagen

        // Verificar si se ha seleccionado una imagen
        if (isset($_FILES["subirImgProducto"]) && $_FILES["subirImgProducto"]["error"] === UPLOAD_ERR_OK) {
            $permitidos = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
            $tipo = mime_content_type($_FILES["subirImgProducto"]["tmp_name"]);

            if (!array_key_exists($tipo, $permitidos)) {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡CORREGIR!",
                    text: "¡No se permiten formatos diferentes a JPG y/o PNG!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        history.back();
                    }
                });
                </script>';
                return;
            }

            $directorio = "vistas/imagenes/productos";

            if (!file_exists($directorio)) {
                mkdir($directorio, 0755, true);
            }

            if (!empty($_POST["fotoActualE"])) {
                $rutaAntigua = __DIR__ . '/../' . $_POST["fotoActualE"];
                if (file_exists($rutaAntigua)) {
                    unlink($rutaAntigua);
                }
            }

            $ext = $permitidos[$tipo];
            $aleatorio = mt_rand(100, 999);
            $nombreUnico = 'producto_' . date('Ymd_His') . '_' . $aleatorio . $ext;
            $ruta = $directorio . "/" . $nombreUnico;
            $rutaAbsoluta = __DIR__ . '/../' . $ruta;

            if (!move_uploaded_file($_FILES["subirImgProducto"]["tmp_name"], $rutaAbsoluta)) {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡Error!",
                    text: "Error al guardar la imagen en el servidor.",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        history.back();
                    }
                });
                </script>';
                return;
            }
        }

        // Usar nueva ruta si hay imagen, o mantener la actual
        $r = (!empty($ruta)) ? $ruta : $_POST["fotoActualE"];

        // Arreglo con datos actualizados del producto
        $datos = array(
            "idE" => $_POST["idProductoE"],
            "nombre_producto" => trim($_POST["nombre_productoE"]),
            "descripcion_producto" => $_POST["descripcion_productoE"],
            "precio_producto" => $_POST["precio_productoE"],
            "foto_producto" => $r
        );

        $tabla = "producto";

        $respuesta = mdlProductos::mdlEditarProducto($tabla, $datos);

        if ($respuesta == "ok") {
            echo '<script>
            swal({
                type: "success",
                title: "¡CORRECTO!",
                text: "¡El producto ha sido editado!",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            }).then(function(result){
                if(result.value){
                    history.back();
                }
            });
            </script>';
        } else {
            echo "<div class='alert alert-danger mt-3 small'>Registro fallido: " . $respuesta . "</div>";
        }
    }
}


    // Eliminar producto
    public static function ctrEliminarProductos($id, $rutaFoto)
{
   
    if (!empty($rutaFoto)) {
        $rutaAbsoluta = realpath(__DIR__ . '/../' . $rutaFoto);

       
        $directorioSeguro = realpath(__DIR__ . '/../vistas/imagenes/productos');

        if ($rutaAbsoluta && strpos($rutaAbsoluta, $directorioSeguro) === 0 && file_exists($rutaAbsoluta)) {
            unlink($rutaAbsoluta);
        }
    }

    // Eliminar producto de la base de datos
    $tabla = "producto";
    $respuesta = mdlProductos::mdlEliminarProducto($tabla, $id);

    return $respuesta;
}

}
?>