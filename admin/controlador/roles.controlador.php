<?php


class ctrRoles
{



    static public function ctrEliminarRoles($valor)
    {

        $tabla = "rol";

        $respuesta = mdlroles::mdlEliminarRoles($tabla, $valor);


        return $respuesta;



    }
    static public function ctrVerRoles($item, $valor)
    {


        $tabla = "rol";



        $respuesta = mdlroles::mdlVerRoles($tabla, $item, $valor);


        return $respuesta;

    }
    static public function ctrEditarRol()
    {
        if (isset($_POST["nom_rolE"])) {

            // Sanitizar el nombre del rol (quitar espacios innecesarios)
            $nomRolE = trim($_POST["nom_rolE"]);
            $nomRolE = preg_replace('/\s+/', ' ', $nomRolE); // múltiples espacios => uno

            $idrol = $_POST["id_rolE"];
            $tabla = "rol";

            $respuesta = mdlroles::mdlEditarRoles($tabla, $nomRolE, $idrol);

            if ($respuesta == "ok") {
                echo '<script>
                swal({
                    type:"success",
                    title: "¡CORRECTO!",
                    text: "El rol ha sido actualizado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){   
                        history.back();
                    } 
                });
            </script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'> Fallida</div>";
            }
        }
    }


    public static function ctrGuardarRol()
    {
        if (isset($_POST["nom_rol"])) {

            // Sanitizar: quitar espacios de inicio/fin y reducir múltiples espacios a uno solo
            $nomRol = trim($_POST["nom_rol"]);
            $nomRol = preg_replace('/\s+/', ' ', $nomRol); // múltiples espacios => uno solo

            $tabla = "rol";
            $respuesta = mdlroles::mdlGuardarRoles($tabla, $nomRol);

            if ($respuesta == "ok") {
                echo '<script>
                swal({
                    type:"success",
                    title: "¡CORRECTO!",
                    text: "El rol ha sido guardado correctamente",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){   
                        history.back();
                    } 
                });
            </script>';
            } else {
                echo "<div class='alert alert-danger mt-3 small'> Fallida</div>";
            }
        }
    }

    public static function ctrMostrarRoles($item, $valor)
    {

        $tabla = "rol";

        $respuesta = mdlRoles::mdlMostrarRoles($tabla, $item, $valor);

        return $respuesta;

    }

    static public function ctrMostrarRoles2()
    {



        $tabla = "rol";


        $respuesta = mdlroles::mdlMostrarRoles2($tabla);

        return $respuesta;





    }
}