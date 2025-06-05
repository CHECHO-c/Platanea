<?php

require_once("../controlador/productos.controlador.php");
require_once("../modelo/productos.modelo.php");

class AjaxProductos
{
    public $idProducto;

    // Método para editar productos
    public function ajaxEditarProducto()
    {
        $item = "id_producto";  // Cambiar al campo id_producto
        $valor = $this->idProducto;

        $respuesta = ctrProductos::ctrMostrarProducto($item, $valor);

        echo json_encode($respuesta);
    }

    // Método para eliminar productos
    public $idEliminar;
    public $rutaFoto;
    public function ajaxEliminarProducto()
    {
        $respuesta = ctrProductos::ctrEliminarProductos($this->idEliminar, $this->rutaFoto);
        echo $respuesta;
    }
}

// Editar producto (POST)
if (isset($_POST["idProducto"])) {
    $editar = new AjaxProductos();
    $editar->idProducto = $_POST["idProducto"];
    $editar->ajaxEditarProducto();
}

// Eliminar producto (POST)
if (isset($_POST["idProductoE"])) {
    $eliminar = new AjaxProductos();
    $eliminar->idEliminar = $_POST["idProductoE"];
    $eliminar->rutaFoto = $_POST["rutaFoto"] ?? '';
    $eliminar->ajaxEliminarProducto();
}

?>