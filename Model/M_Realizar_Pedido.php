<?php

include('../config/config.php');

session_start();

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : [];

if (!isset($_SESSION['id_usuario']) || $_SESSION['id_usuario'] == null) {
    $_SESSION['terminandocompra'] = true;
    header('Location: ../?pagina=login');
}

$id_usuario = $_SESSION['id_usuario'];

$cantidad_carrito = count($carrito);

if ($cantidad_carrito <= 0) {
    header('Location: ../?pagina=productos');
}

$subtotal = 0;
foreach ($carrito as $producto) {
    $subtotal += $producto['precio'] * $producto['cantidad'];
}


$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

$fechaactual = date('Y-m-d');

$sql_pedido = "INSERT INTO Pedido(usuario_id, fecha_pedido, total) VALUES($id_usuario, '$fechaactual', $subtotal);";
$resultado_pedido = mysqli_query($conexion, $sql_pedido);

include('../model/M_Correo_Pedido.php');

$id_pedido = mysqli_insert_id($conexion);

foreach ($carrito as $producto) {
    $id_producto = $producto['id'];
    $cantidad = $producto['cantidad'];
    $precio = $producto['precio'];

    $sql_detalle = "INSERT INTO DetallePedido(pedido_id, producto_id, cantidad, precio) VALUES($id_pedido, $id_producto, $cantidad, $precio);";
    $resultado_detalle = mysqli_query($conexion, $sql_detalle);

    $sql_actualizar = "UPDATE Producto SET stock = stock - $cantidad WHERE id = $id_producto;";
    $resultado_actualizar = mysqli_query($conexion, $sql_actualizar);
}

unset($_SESSION['carrito']);

header('Location: ../?pagina=productos');
