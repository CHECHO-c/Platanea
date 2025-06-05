<?php
class ctrUsuarios
{
    static public function ctrIngresoUsuarios()
    {
        if (isset($_POST["log_email"])) {

            try {
                $encriptarPass = crypt($_POST["log_pass"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

                $tabla = "usuario";
                $item = "correo";
                $valor = $_POST["log_email"];

                $respuesta = mdlUsuarios::mdlMostrarUsuarios1($tabla, $item, $valor);


                if (
                    $respuesta &&
                    isset($respuesta["correo"]) &&
                    isset($respuesta["contraseña"]) &&
                    $respuesta["correo"] == $_POST["log_email"] &&
                    $respuesta["contraseña"] == $encriptarPass
                ) {

                    $_SESSION["validarSession"] = "ok";
                    $_SESSION["idBackend"] = $respuesta["id_usuario"];

                    echo '<script>
                    window.location = "usuarios";
                </script>';

                } else {

                    echo "<div class='alert alert-danger mt-4 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
                }

            } catch (Exception $e) {

                echo "<div class='alert alert-danger mt-4 small'>ERROR: Usuario y/o contraseña incorrectos</div>";
            }
        }
    }

    public static function ctrMostrarUsuarios()
    {
        $tabla = "usuario";

        $respuesta = mdlUsuarios::mdlMostrarUsuarios($tabla);

        return $respuesta;
    }


    public static function ctrMostrarUsuarios1($item, $valor)
    {
        $tabla = "usuario";

        $respuesta = mdlUsuarios::mdlMostrarUsuarios1($tabla, $item, $valor);

        return $respuesta;
    }

    public static function ctrGuardarUsuarios()
    {
        if (isset($_POST["nom_usuarios"])) {

            $ruta = ""; // Valor predeterminado si no hay imagen

            // Sanitizar entradas

            $nombre = self::limpiarCampo($_POST["nom_usuarios"]);
            $telefono = self::limpiarCampo($_POST["telefono"]);
            $correo = self::limpiarCampo($_POST["correo"]);
            $rol = self::limpiarCampo($_POST["rol_usuario"]);
            $passNueva = self::limpiarCampo($_POST["pass_user"]);

            // Validar que no estén vacíos o inválidos
            if (empty($nombre) || empty($telefono) || empty($correo) || empty($rol)) {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡ERROR!",
                    text: "¡Todos los campos obligatorios deben estar correctamente llenos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                });
            </script>';
                return;
            }

            // Verificar si se ha seleccionado una imagen
            if (isset($_FILES["subirImgUsuarios"]) && $_FILES["subirImgUsuarios"]["error"] === UPLOAD_ERR_OK) {
                $permitidos = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
                $tipo = mime_content_type($_FILES["subirImgUsuarios"]["tmp_name"]);

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

                $directorio = "vistas/imagenes/usuarios";

                // Verificar si existe el directorio, sino crearlo
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0755, true);
                }

                $ext = $permitidos[$tipo];
                $aleatorio = mt_rand(100, 999);
                $nombreUnico = 'usuario_' . date('Ymd_His') . '_' . $aleatorio . $ext;
                $ruta = $directorio . "/" . $nombreUnico;
                $rutaAbsoluta = __DIR__ . '/../' . $ruta;

                if (move_uploaded_file($_FILES["subirImgUsuarios"]["tmp_name"], $rutaAbsoluta)) {
                    // Imagen cargada exitosamente

                } else {
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

            // Encriptar contraseña
            $encriptarPassword = crypt($passNueva, '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

            // Arreglo con datos del formulario
            $datos = array(
                "nom_usuario" => $_POST["nom_usuarios"],
                "pass_user" => $encriptarPassword,
                "telefono" => $_POST["telefono"],
                "correo" => $_POST["correo"],
                "foto" => $ruta,
                "rol" => $_POST["rol_usuario"]
            );

            $usuarios = self::ctrMostrarUsuarios();
            foreach ($usuarios as $usuario) {
                if ($usuario["correo"] === $correo) {
                    echo '<script>
        swal({
            type: "error",
            title: "¡ERROR!",
            text: "¡El correo ya está registrado!",
            showConfirmButton: true,
            confirmButtonText: "Cerrar"
        });
        </script>';
                    return;
                }
            }

            $tabla = "usuario";

            $respuesta = mdlUsuarios::mdlGuardarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
    swal({
        type: "success",
        title: "¡CORRECTO!",
        text: "¡El usuario ha sido creado!",
        showConfirmButton: true,
        confirmButtonText: "Cerrar"
    }).then(function(result){
        if(result.value){
            window.location = "usuarios";
        }
    });
    </script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'>Registro fallido: " . $respuesta . "</div>";
            }
        }
    }


    public static function ctrEditarUsuarios()
    {

        if (isset($_POST["idPerfilE"])) {

            $ruta = ""; // Valor predeterminado si no hay imagen

            // Sanitizar entradas
            $id = self::limpiarCampo($_POST["idPerfilE"]);
            $nombre = self::limpiarCampo($_POST["nom_usuariosE"]);
            $telefono = self::limpiarCampo($_POST["telefonoE"]);
            $correo = self::limpiarCampo($_POST["correoE"]);
            $rol = self::limpiarCampo($_POST["rol_usuarioE"]);
            $passNueva = self::limpiarCampo($_POST["pass_userE"]);

            // Validar que no estén vacíos o inválidos
            if (empty($nombre) || empty($telefono) || empty($correo) || empty($rol)) {
                echo '<script>
                swal({
                    type: "error",
                    title: "¡ERROR!",
                    text: "¡Todos los campos obligatorios deben estar correctamente llenos!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                });
            </script>';
                return;
            }
            // Verificar si se ha seleccionado una imagen
            if (isset($_FILES["subirImgUsuarios"]) && $_FILES["subirImgUsuarios"]["error"] === UPLOAD_ERR_OK) {
                $permitidos = ['image/jpeg' => '.jpg', 'image/png' => '.png'];
                $tipo = mime_content_type($_FILES["subirImgUsuarios"]["tmp_name"]);

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

                $directorio = "vistas/imagenes/usuarios";

                // Verificar si existe el directorio, sino crearlo
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
                $nombreUnico = 'usuario_' . date('Ymd_His') . '_' . $aleatorio . $ext;
                $ruta = $directorio . "/" . $nombreUnico;
                $rutaAbsoluta = __DIR__ . '/../' . $ruta;

                if (move_uploaded_file($_FILES["subirImgUsuarios"]["tmp_name"], $rutaAbsoluta)) {
                    // Imagen cargada exitosamente
                } else {
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

            // Si hay ruta nueva, la usamos. Si no, dejamos la anterior.
            $r = (!empty($ruta)) ? $ruta : $_POST["fotoActualE"];

            if ($_POST["pass_userE"] != "") {
                $password = crypt($_POST["pass_userE"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
            } else {
                $password = $_POST['pass_userActual'];
            }

            $datos = array(
                "idE" => $_POST["idPerfilE"],
                "nom_usuario" => $_POST["nom_usuariosE"],
                "pass_user" => $password,
                "telefono" => $_POST["telefonoE"],
                "correo" => $_POST["correoE"],
                "foto" => $r,
                "rol" => $_POST["rol_usuarioE"]
            );

            $tabla = "usuario";

            $respuesta = mdlUsuarios::mdlEditarUsuarios($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
            swal({
                type: "success",
                title: "¡CORRECTO!",
                text: "¡El usuario ha sido editado!",
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

    public static function ctrEliminarUsuarios($id, $rutaFoto)
    {

        session_start();

        if ($id == $_SESSION["idBackend"]) {

            return "error_no_puede_eliminarse";
        }


        unlink("../" . $rutaFoto);
        $tabla = "usuario";

        $respuesta = mdlUsuarios::mdlEliminarUsuarios($tabla, $id);

        return $respuesta;
    }

    public static function limpiarCampo($campo)
    {
        $campo = trim($campo);
        $campo = strip_tags($campo);
        $campo = htmlspecialchars($campo, ENT_QUOTES, 'UTF-8');
        $campo = preg_replace('/^[\s\.\,\']+$/', '', $campo);
        return $campo;
    }

}
?>