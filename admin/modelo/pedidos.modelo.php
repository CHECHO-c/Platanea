<?php
require_once("conexion.php");

class mdlPedidos
{
    public static function mdlMostrarPedidos($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id_pedido,usuario.nombre,fecha,total,estado FROM pedido
        JOIN usuario ON usuario.id_usuario=id_usuarioPedido");
        $stmt->execute();
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt = null;
        return $resultado;
    }

    public static function mdlDescartarPedido($tabla, $id_pedido)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET estado = 'finalizado' WHERE id_pedido = :id_pedido");
        $stmt->bindParam(":id_pedido", $id_pedido, PDO::PARAM_INT);
        $resultado = $stmt->execute();
        $stmt = null;
        return $resultado ? "ok" : "error";
    }
}
?> 