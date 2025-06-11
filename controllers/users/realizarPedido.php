<?php
session_start();
require_once '../../models/MySql.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['status' => 'error', 'msg' => 'No autenticado']);
    exit;
}
$input = file_get_contents("php://input");
$datos = json_decode($input,true);

$id_usuario = $datos["idUsuario"]??'';
$total = $datos['totalCompra'] ?? 0;
$nombre = $datos["nombreUsuario"]??"";
$lista = $datos["listaCompra"]??"";

try {
    $mysql = new MySQL();
    $mysql->conectar();
    
    $consulta = "INSERT INTO pedido (id_usuarioPedido, total, fecha,lista, estado) VALUES ('$id_usuario', '$total', NOW(),'$lista', 'Pendiente')";
    $resultado = $mysql->ejecutarConsulta($consulta);
    
    header("Location: ../../index.php");
   
    
    $mysql->desconectar();
    exit();
} catch (Exception $e) {
    header("Location: ../../index.php");
    
}
?> 