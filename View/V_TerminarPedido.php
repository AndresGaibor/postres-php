<?php

if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
  header('Location: ./?pagina=productos');
}

if(!isset($_SESSION['sesion_iniciada']) || $_SESSION['sesion_iniciada'] != "iniciado") {
  $_SESSION['terminandocompra'] = true;
  header('Location: ./?pagina=login');
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

?>
<div class="container-fluid bg-white">
  <h2>Realizando el pedido</h2>
  <p>Listo <span>
      <?php echo $nombre; ?>
  </span> terminando de realizar el pedido, confirma que todo este en orden.</p>

  <div class="row">
    <div class="col">
      <h3>Detalle de producto</h3>
      <table class="table">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($carrito as $producto) : ?>
            <tr>
              <td><?php echo $producto['nombre']; ?></td>
              <td>$<?php echo number_format($producto['precio'], 2, ',', ''); ?></td>
              <td><?php echo $producto['cantidad']; ?></td>
              <td>$<?php echo number_format($producto['precio'] * $producto['cantidad'], 2, ',', ''); ?></td>
            </tr>
          <?php endforeach; ?>
          <!-- agrega total  -->
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td colspan="3"><strong>Total</strong></td>
            <td><strong>$<?php echo number_format($subtotal, 2, ',', ''); ?></strong></td>
          </tr>
        </tbody>
      </table>
    </div>
          </div>
          <div class="col">
      
      <button type="button" class="btn w-100 btn-success" onclick="location.href='./model/M_Realizar_Pedido.php?'">Confirmar pedido</button>
    </div>
</div>