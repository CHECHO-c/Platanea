<?php
session_start();

// Validar que los datos vengan por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // if (!isset($_SESSION['id'])) {
        
    //     $_SESSION['error'] = $error["noLogueado"]="Debes iniciar sesión para agregar productos al carrito";
    //     header('Location: ../../index.php');
    //     exit();
        
    // }

    $nombre = $_POST['nombre'] ?? '';
    $precio = $_POST['precio'] ?? '';
    $imagen = $_POST['imagen'] ?? '';

    if ($nombre && $precio && $imagen) {
        // NO modificar la ruta de la imagen, debe guardarse tal cual

        // Inicializar el carrito si no existe
        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = [];
        }

        // Buscar si el producto ya está en el carrito
        $encontrado = false;
        foreach ($_SESSION['carrito'] as &$producto) {
            if ($producto['nombre'] === $nombre) {
                $producto['cantidad'] += 1;
                $encontrado = true;
                break;
            }
        }
        unset($producto); // Romper la referencia

        // Si no está, agregarlo
        if (!$encontrado) {
            $_SESSION['carrito'][] = [
                'nombre' => $nombre,
                'precio' => $precio,
                'imagen' => $imagen, // Guardar la ruta tal cual
                'cantidad' => 1
            ];
        }
    }
    // Si es AJAX, responder JSON
    if (isset($_POST['ajax']) && $_POST['ajax'] == '1') {
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}
// Redirigir al carrito si no es AJAX
header('Location: /views/users/carrito.php');
exit; 