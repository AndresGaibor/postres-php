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

<div class="container border rounded-2 p-2">
    <h3 class="center">Mi pedido</h3>
    <!-- una linea separadora -->
    <hr>
    <?php foreach ($carrito as $producto) : ?>
        <div class="row">
            <div class="col">
                <p><a href="#" onclick="addToCart2(<?php echo $producto['id']; ?>, '<?php echo $producto['nombre']; ?>', <?php echo $producto['precio']; ?>, <?php echo $producto['stock']; ?>, <?php echo $producto['cantidad']; ?>);"
                ><i class="fa-solid fa-pencil text-warning enable-button-pointers"></i></a><strong><?php echo $producto['cantidad']; ?>x</strong> <?php echo $producto['nombre']; ?></p>
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
            <strong>$<?php echo number_format($subtotal, 2, ',', ''); ?></strong>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-success mx-auto" onclick="location.href='./?pagina=terminarpedido'">Comprar</button>
        </div>
    </div>
</div>
<script>
        document.getElementById('cancel_btn_car').addEventListener('click', async function() {
            await quitarDelCarrito(producto_item.id);
            const modalCantidad = new bootstrap.Modal('#modalCantidad');
            modalCantidad.hide();
            location.reload();
        });
        
        async function addToCart2(id, nombre, precio, stock, cantidad) {
            producto_item = {
                id: id,
                nombre: nombre,
                precio: precio,
                stock,
                cantidad
            };

            document.getElementById('nombre_p').innerText = nombre;

            document.getElementById('confirm_btn_car_text').innerText = 'Guardar cambio';
            document.getElementById('confirm_btn_car').classList.add('btn-primary');
            document.getElementById('cancel_btn_car').innerHTML = 'Eliminar del carrito';
            document.getElementById('cancel_btn_car').classList.add('btn-danger');

            const input_cant = document.getElementById('input_cant');
            input_cant.value = cantidad;
            input_cant.max = stock;
            const modalCantidad = new bootstrap.Modal('#modalCantidad');


            await modalCantidad.show();
            setTimeout(() => {
                input_cant.focus();
            }, 600);
        }

    </script>