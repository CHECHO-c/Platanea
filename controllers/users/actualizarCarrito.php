<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = $_POST['accion'] ?? '';
    $indice = $_POST['indice'] ?? null;
    $cantidad = $_POST['cantidad'] ?? null;

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    switch ($accion) {
        case 'actualizar':
            if ($indice !== null && $cantidad !== null) {
                if ($cantidad <= 0) {
                    // Si la cantidad es 0 o menor, eliminar el producto
                    unset($_SESSION['carrito'][$indice]);
                    $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
                } else {
                    $_SESSION['carrito'][$indice]['cantidad'] = (int)$cantidad;
                }
            }
            break;
        
        case 'eliminar':
            if ($indice !== null) {
                unset($_SESSION['carrito'][$indice]);
                $_SESSION['carrito'] = array_values($_SESSION['carrito']); // Reindexar array
            }
            break;
    }

    // Calcular totales
    $total = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
        $_SESSION["totalEpico"] = $total;
    }

    // Responder con JSON
    header('Content-Type: application/json');
    echo json_encode([
        'success' => true,
        'total' => $total,
        'carrito' => $_SESSION['carrito']
    ]);
    exit;
}

// Si no es POST, redirigir
header('Location: /views/users/carrito.php');
exit; 