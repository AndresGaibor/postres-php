<?php
$keyword = '';
$resul = null;
$mensaje = '';
include("../config/config.php");
$user_id = 1; //$_SESSION['usuario']['id']
$pedido_id = 0;
$query = "SELECT * FROM pedido WHERE usuario_id = '$user_id'";
$result = mysqli_query($conexion, $query);
if (mysqli_num_rows($result) > 0) {
    $pedido = mysqli_fetch_array($result);
    $pedido_id  = $pedido['id'];
}
if ($_POST) {

    if (isset($_POST['producto_id'])) {
        $producto_id = $_POST['producto_id'];
        $precio = $_POST['precio'];
        if ($pedido_id == 0) {

            $queryInsertPedido = "INSERT INTO Pedido (usuario_id, fecha_pedido, subtotal, iva, total)
            VALUES ($user_id, date(), 0, 0, 0)";
            $insertPedido = mysqli_query($conexion, $queryInsertPedido);
            $pedido_id = mysqli_insert_id($conexion);
        }

        $queryInsertDP = "INSERT INTO DetallePedido (pedido_id, producto_id, cantidad, precio, iva)
            VALUES ($pedido_id, $producto_id, 1, $precio, 0)";
        mysqli_query($conexion, $queryInsertDP);

        $updatePedido = "UPDATE Producto
        SET stock = stock-1
        WHERE id = $producto_id";
        mysqli_query($conexion, $updatePedido);
        $mensaje = 'Producto agregado al carrito';
    }

    $keyword = $_POST['keyword'];

    $sql = "SELECT
        p.nombre_producto,
        p.id,
        p.precio,
        p.img_url,
        p.stock,
        GROUP_CONCAT(i.nombre_ingrediente SEPARATOR ', ') AS ingredientes
        FROM tienda_postres.Producto p
        INNER JOIN tienda_postres.ProductoIngrediente pi ON p.id = pi.producto_id
        INNER JOIN tienda_postres.Ingrediente i ON pi.ingrediente_id = i.id
        WHERE p.nombre_producto like  '%$keyword%'
        GROUP BY p.id";
    $resul = mysqli_query($conexion, $sql);
}

// Select que consulta en detalleProducto que cuente todos los productos que tenga el usuario

$selectCountProductosComprados = "SELECT COUNT(*) FROM DetallePedido WHERE pedido_id = $pedido_id";
$resultado = mysqli_query($conexion, $selectCountProductosComprados);
$cantidad = mysqli_fetch_array($resultado);
$numeroCarrito  = $cantidad[0];

?>


<div class="container justify-content-center">

    <?php
    if ($mensaje != '') {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong><?php echo ($mensaje) ?>
        </div>
    <?php
    }
    ?>



    <div class="row">


        <div class="col-md-8">
            <form class="d-flex" method="post">
                <div class="input-group mb-3">

                    <input type="text" class="form-control input-text" placeholder="Buscar Producto" name="keyword" value="<?php echo ($keyword) ?>">
                    <div class="input-group-append">
                        <button class="btn btn-outline-warning btn-lg" type="submit"><i class="fa fa-search"></i></button>
                    </div>

                </div>
            </form>
        </div>
        <div class="col-md-4 text-right">
            <div class="cart">
                <i class="fa fa-shopping-cart"></i>
                <span id="cart_menu_num" data-action="cart-can" class="badge rounded-circle"><?php echo ($numeroCarrito) ?></span>
            </div>



        </div>
    </div>


</div>

<?php

if ($resul) {
    while ($mostrar = mysqli_fetch_array($resul)) {
?>
        <div class="container d-flex justify-content-center mt-50 mb-50">

            <div class="row w-100">
                <div class="col-md-10">

                    <div class="card card-body">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0">

                                <img src="<?php echo $mostrar['img_url'] ?>" width="150" height="150" alt="">

                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold">
                                    <a href="#" data-abc="true"><?php echo $mostrar['nombre_producto'] ?></a>
                                </h6>

                                <p class="mb-3"><?php echo $mostrar['ingredientes'] ?></p>

                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item">Stock: <?php echo  $mostrar['stock'] ?></li>

                                </ul>


                            </div>

                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold">$ <?php echo $mostrar['precio'] ?></h3>

                                <form action="" method="post">
                                    <button type="submit" class="btn btn-warning mt-4 text-white" <?php if ($mostrar['stock'] == 0) :  echo ("disabled");
                                                                                                    endif; ?>> Añadir al Carrito <i class="fa fa-shopping-cart" aria-hidden="true"></i></button>


                                    <input type="hidden" name="keyword" value="<?php echo ($keyword) ?>" id="">
                                    <input type="hidden" name="producto_id" value="<?php echo ($mostrar['id']) ?>" id="">
                                    <input type="hidden" name="precio" value="<?php echo ($mostrar['precio']) ?>" id="">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php
    }
}

?>