<?php
// include('../config/config.php');
// carrito que esta compuesto de id, nombre, precio, cantidad
$inputJSON = file_get_contents('php://input');
$input = json_decode($inputJSON, true); // Convertir a un array asociativo


// id
if(!isset($input['id'])){
    echo "no hay id";
    return;
}
if(!isset($input['nombre'])){
    echo "no hay nombre";
    return;
}
if(!isset($input['precio'])){
    echo "no hay precio";
    return;
}
if(!isset($input['cantidad'])){
    echo "no hay cantidad";
    return;
}
if(!isset($input['stock'])){
    echo "no hay stock";
    return;
}

$id = $input['id'];
$nombre = $input['nombre'];
$precio = $input['precio'];
$cantidad = $input['cantidad'];
$stock = $input['stock'];

session_start();

if(isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
} else {
    $carrito = array();
    $_SESSION['carrito'] = $carrito;
}

$producto = array(
    'id' => $id,
    'nombre' => $nombre,
    'precio' => $precio,
    'cantidad' => $cantidad,
    'stock' => $stock
);

array_push($carrito, $producto);

$_SESSION['carrito'] = $carrito;

echo json_encode($carrito);