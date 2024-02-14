<?php

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
  header('Location: ./?pagina=productos');
}

$carrito = $_SESSION['carrito'];
$cantidad_carrito = count($carrito);
if ($cantidad_carrito > 0) {
  $subtotal = 0;
  foreach ($carrito as $producto) {
    $subtotal += $producto['precio'] * $producto['cantidad'];
  }
}

$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre'] : '';

echo $nombre;
?>
<div class="container-fluid bg-white">
  hola
</div>