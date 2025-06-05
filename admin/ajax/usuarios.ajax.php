<?php

require_once("../controlador/usuarios.controlador.php");
require_once("../modelo/usuarios.modelo.php");

class AjaxUsuarios
{

    public $idUsuario;

    public function ajaxEditarUsuarios()
    {
        $item = "id_usuario";
        $valor = $this->idUsuario;

        $respuesta = ctrUsuarios::ctrMostrarUsuarios1($item, $valor);

        echo json_encode($respuesta);
    }

    //Eliminar
    public $idEliminar;
    public $rutaFoto;
    public function ajaxEliminarUsuarios()
    {
        $respuesta = ctrUsuarios::ctrEliminarUsuarios($this->idEliminar, $this->rutaFoto);
        echo $respuesta;
    }
}


//Editar usuarios POST

if (isset($_POST["idUsuario"])) {
    $editar = new AjaxUsuarios();
    $editar->idUsuario = $_POST["idUsuario"];
    $editar->ajaxEditarUsuarios();
}

//Eliminar usuarios POST

if (isset($_POST["idUsuarioE"])) {
    $eliminar = new AjaxUsuarios();
    $eliminar->idEliminar = $_POST["idUsuarioE"];
    $eliminar->rutaFoto = $_POST["rutaFoto"];
    $eliminar->ajaxEliminarUsuarios();
}

?>