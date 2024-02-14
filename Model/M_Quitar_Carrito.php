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

$id = $input['id'];

session_start();

if(isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
} else {
    $carrito = array();
    $_SESSION['carrito'] = $carrito;
}

// quita
$nuevoCarrito = array();
foreach($carrito as $producto){
    if($producto['id'] != $id){
        array_push($nuevoCarrito, $producto);
    }
}

$_SESSION['carrito'] = $nuevoCarrito;