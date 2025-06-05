<?php

require_once("conexion.php");

class mdlProductos
{

    // Eliminar producto
    public static function mdlEliminarProducto($tabla, $id)
    {
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_producto = :id");

        $stmt->bindParam(":id", $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            $errorInfo = $stmt->errorInfo();
            $stmt = null;
            echo "Error: " . $errorInfo[2];
        }
    }

    // Editar producto
    public static function mdlEditarProducto($tabla, $datos)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombreE, descripcion = :descripcionE, precio = :precioE, foto = :fotoE WHERE id_producto = :idE");

        $stmt->bindParam(":idE", $datos["idE"], PDO::PARAM_INT);
        $stmt->bindParam(":nombreE", $datos["nombre_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":descripcionE", $datos["descripcion_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":precioE", $datos["precio_producto"], PDO::PARAM_STR);
        $stmt->bindParam(":fotoE", $datos["foto_producto"], PDO::PARAM_STR);

        if ($stmt->execute()) {
            return "ok";
        } else {
            echo "Error al editar el producto";
        }

        $stmt = null;
    }

    // Mostrar un producto por ID
    public static function mdlMostrarProducto($tabla, $item, $valor)
    {
        $consulta = "SELECT * FROM $tabla WHERE $item = :valor";

        $stmt = Conexion::conectar()->prepare($consulta);
        $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Mostrar todos los productos
    public static function mdlMostrarProductos($tabla)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $stmt = null;

        return $resultado;
    }

    // Guardar nuevo producto
    public static function mdlGuardarProducto($tabla, $datos)
    {
        try {
            $stmt = Conexion::conectar()->prepare("INSERT INTO `$tabla` 
                                          (`nombre`, `descripcion`, `precio`, `foto`) 
                                          VALUES 
                                          (:nombre, :descripcion, :precio, :foto)");

            $stmt->bindParam(":nombre", $datos["nombre_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":descripcion", $datos["descripcion_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":precio", $datos["precio_producto"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto_producto"], PDO::PARAM_STR);

            if ($stmt->execute()) {
                $stmt = null;
                return "ok";
            } else {
                $errorInfo = $stmt->errorInfo();
                $stmt = null;
                return "Error: " . $errorInfo[2];
            }
        } catch (PDOException $e) {
            return "Error: " . $e->getMessage();
        }
    }

}
?>