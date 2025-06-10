<?php
session_start();
require_once '../../models/MySql.php';

if (!isset($_SESSION['id'])) {
    echo json_encode(['status' => 'error', 'msg' => 'No autenticado']);
    exit;
}

$id_usuario = $_POST['id_usuario']??'';
$total = $_POST['total'] ?? 0;

try {
    $mysql = new MySQL();
    $mysql->conectar();
    
    $consulta = "INSERT INTO pedido (id_usuarioPedido, total, fecha, estado) VALUES ('$id_usuario', '$total', NOW(), 'Pendiente')";
    $resultado = $mysql->ejecutarConsulta($consulta);
    
    header("Location: ../../index.php");
   
    
    $mysql->desconectar();
    exit();
} catch (Exception $e) {
    header("Location: ../../index.php");
    
}
?> 