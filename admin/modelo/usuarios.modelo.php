<?php

require_once("conexion.php");
class mdlUsuarios
{

  public static function mdlEliminarUsuarios($tabla, $id)
  {

    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_usuario = :id");

    $stmt->bindParam(":id", $id, PDO::PARAM_INT);

    if ($stmt->execute()) {

      return "ok";
    } else {
      $errorInfo = $stmt->errorInfo();
      $stmt = null;
      echo "Error: " . $errorInfo[2];
    }

  }
  public static function mdlEditarUsuarios($tabla, $datos)
  {

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre = :nombreE,  contraseña = :passwordE, telefono = :telefonoE, correo =  :correoE, foto = :fotoE, id_rol = :rolesE WHERE id_usuario = :idE");

    $stmt->bindParam(":idE", $datos["idE"], PDO::PARAM_INT);
    $stmt->bindParam(":nombreE", $datos["nom_usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":passwordE", $datos["pass_user"], PDO::PARAM_STR);
    $stmt->bindParam(":telefonoE", $datos["telefono"], PDO::PARAM_STR);
    $stmt->bindParam(":correoE", $datos["correo"], PDO::PARAM_STR);
    $stmt->bindParam(":fotoE", $datos["foto"], PDO::PARAM_STR);
    $stmt->bindParam(":rolesE", $datos["rol"], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      echo "error";
    }

    $stmt = null;
  }

  public static function mdlMostrarUsuarios1($tabla, $item, $valor)
  {

    $consulta = "SELECT * FROM $tabla WHERE $item = :valor";


    $stmt = Conexion::conectar()->prepare($consulta);

    $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);


    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_ASSOC);
  }

  public static function mdlMostrarUsuarios($tabla)
  {

    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = null;

    return $resultado;
  }


  public static function mdlGuardarUsuarios($tabla, $datos)
  {
    try {

      $stmt = Conexion::conectar()->prepare("INSERT INTO `$tabla` 
                                          (`nombre`, `contraseña`, `telefono`, `correo`, `foto`, `id_rol`) 
                                          VALUES 
                                          (:nombre, :password, :telefono, :correo, :foto, :id_rol)");


      $stmt->bindParam(":nombre", $datos["nom_usuario"], PDO::PARAM_STR);
      $stmt->bindParam(":password", $datos["pass_user"], PDO::PARAM_STR);
      $stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
      $stmt->bindParam(":correo", $datos["correo"], PDO::PARAM_STR);
      $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
      $stmt->bindParam(":id_rol", $datos["rol"], PDO::PARAM_INT);

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