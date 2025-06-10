<?php
class ctrPedidos
{
    public static function ctrMostrarPedidos()
    {
        require_once __DIR__ . '/../modelo/pedidos.modelo.php';
        $tabla = "pedido"; // Cambia el nombre si tu tabla se llama diferente
        $respuesta = mdlPedidos::mdlMostrarPedidos($tabla);
        return $respuesta;
    }

    public static function ctrDescartarPedido($id_pedido)
    {
        require_once __DIR__ . '/../modelo/pedidos.modelo.php';
        $tabla = "pedido"; // Cambia el nombre si tu tabla se llama diferente
        $respuesta = mdlPedidos::mdlDescartarPedido($tabla, $id_pedido);
        return $respuesta;
    }
}
?> 