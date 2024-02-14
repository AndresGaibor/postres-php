<?php


$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
$cantidad_carrito = count($carrito);

// si el carrito esta vacio
if (empty($carrito)) {
    return;
}
// cantidad de productos en el carrito
$cantidad_carrito = count($carrito);
// Calcular el subtotal
$subtotal = 0;
foreach ($carrito as $producto) {
    $subtotal += $producto['precio'] * $producto['cantidad']; // Asegúrate de que 'precio' y 'cantidad' son números
}
?>

<div class="container border rounded-2">
    <h3 class="center">Mi pedido</h3>
    <!-- una linea separadora -->
    <hr>
    <?php foreach ($carrito as $producto) : ?>
        <div class="row">
            <div class="col">
                <p><strong><?php echo $producto['cantidad']; ?>x</strong> <?php echo $producto['nombre']; ?></p>
            </div>
            <div class="col">
                <p>$<?php echo number_format($producto['precio'], 2, ',', ''); ?></p>
            </div>
        </div>
    <?php endforeach; ?>
    <div class="row">
        <div class="col">
            <strong>Subtotal</strong>
        </div>
        <div class="col">
            <p>$<?php echo number_format($subtotal, 2, ',', ''); ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success mx-auto" onclick="location.href='checkout.php'">Comprar</button>
        </div>
    </div>
</div>