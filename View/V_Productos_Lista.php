<?php
include('./config/config.php');

// CAMBIAR ESTE VALOR
$cantidad_productos_por_pagina = 2;

$limit = $cantidad_productos_por_pagina;

$sql1 = "SELECT COUNT(*) as total FROM Producto";
$resultado1 = mysqli_query($conexion, $sql1);

$fila = mysqli_fetch_array($resultado1);

$cantidad_paginas = $fila['total'] / $limit;
$cantidad_paginas = ceil($cantidad_paginas);

if (isset($_GET['start'])) {
    $start = $_GET['start'];
} else {
    $start = 1;
}

// carrito que esta compuesto de id, nombre, precio, cantidad
if (isset($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
} else {
    $carrito = array();
    $_SESSION['carrito'] = $carrito;
}

function existeEnCarrito($id)
{
    global $carrito;
    foreach ($carrito as $producto) {
        if ($producto['id'] == $id) {
            return true;
        }
    }
    return false;
}

$offset = ($start - 1) * $limit;

$sql = "SELECT * FROM Producto ORDER BY id DESC LIMIT $limit OFFSET $offset";
$resultado = mysqli_query($conexion, $sql);

?>
<div class="container">
    <!-- Modal -->
    <div class="modal fade" id="modalCantidad" tabindex="-1" aria-labelledby="modalCantidadLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalCantidadLabel">Cantidad de <span id="nombre_p">AQUI NOMBRE</span></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="cantidadform" method="post">
                <div class="modal-body">
                        <label for="">Ingrese la cantidad que desea:</label>
                        <br>
                        <input id="input_cant" class="form-control" type="number" name="cantidad" required min="1" maxlength="50">
                        <br>
                        <!-- <input type="button" value="Cancelar"> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button class="btn btn-primary w-auto" type="submit" >
                        Agregar al carrito <i class="fa-solid fa-cart-shopping fa-sm"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <div class="row">
        <?php
        // de 2 en 2

        while ($fila = mysqli_fetch_array($resultado)) {
        ?>
            <div class="col-md-4 mt-2">
                <div class="card" style="width: 13rem; height: 100%;">
                    <img style="width: 100%; height: 150px; object-fit: cover;" src="<?php echo $fila['img_url'] ?>" class="card-img-top" alt="...">
                    <div class="card-body d-flex flex-column">
                        <h6 style="height: 3em; overflow: hidden;" class="card-title"><?php echo $fila['nombre_producto'] ?></h6>

                        <div class="col card-text">
                            <div class="row">
                                <strong class="col pt-2">
                                    $<?php echo $fila['precio'] ?>
                                </strong>
                                <p class="col w-full text-center">Disponible: 
                                    <!-- bage -->
                                    <span class="badge bg-primary <?php echo $fila['stock'] < 10 ? 'bg-danger' : ''; ?>
                                    ">
                                        <?php echo $fila['stock'] ?>
                                    </span>
                                </p>
                            </div>
                        </div>


                        <button href="#" id="producto-<?php echo $fila['id'] ?>" onclick="<?php echo existeEnCarrito($fila['id']) ? 'quitarDelCarrito(' . $fila['id'] . ')' : 'addToCart(' . $fila['id'] . ', \'' . $fila['nombre_producto'] . '\', ' . $fila['precio'] . ', '.$fila['stock'].');' ?>" class="btn w-auto btn-<?php echo existeEnCarrito($fila['id']) ? 'danger ' : 'warning '; echo $fila['stock'] == 9 ? 'disabled' : ''; ?>
                        "><?php echo existeEnCarrito($fila['id']) ? 'Quitar' : 'Agregar carrito'; ?>
                            <i class="fa-solid fa-cart-shopping fa-sm"></i></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>

    </div>
    <div class="container mt-3">
        <nav aria-label="mt-5 Page navigation example">
            <ul class="pagination">
                <li class="page-item <?php echo $start <= 1 ? 'disabled' : ''; ?>"><a class="page-link" href="./?pagina=productos&start=<?php echo $start - 1; ?>
                    ">Anterior</a></li>
                <?php
                for ($i = 1; $i <= $cantidad_paginas; $i++) {
                ?>
                    <li class="page-item <?php echo $start == $i ? 'active' : ''; ?>"><a class="page-link" href="./?pagina=productos&start=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                    <!-- // echo "<li class='page-item $start == $i ? 'active' : '''><a class='page-link' href='./?pagina=productos&start=$i'>$i</a></li>"; -->
                <?php
                }
                ?>
                <li class="page-item <?php echo $start >= $cantidad_paginas ? 'disabled' : ''; ?>"><a class="page-link" href="./?pagina=productos&start=<?php echo $start + 1; ?>
                    ">Siguiente</a></li>
            </ul>
        </nav>
    </div>

    <script>
        let producto_item = {};
        document.getElementById('cantidadform').addEventListener('submit', async function(e) {
            e.preventDefault();
            const cantidad = document.getElementById('input_cant').value;
            await sendAddToCart(producto_item.id, producto_item.nombre, producto_item.precio, +cantidad, producto_item.stock);
            const modalCantidad = new bootstrap.Modal('#modalCantidad');
            modalCantidad.hide();

            document.getElementById('input_cant').value = '';

        });

        async function sendAddToCart(id, nombre, precio, cantidad, stock) {
            await fetch('./Model/M_Agregar_Carrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Indicar que el cuerpo es JSON
                },
                body: JSON.stringify({
                    id: id,
                    nombre: nombre,
                    precio: precio,
                    cantidad: cantidad,
                    stock
                })
            });

            location.reload();
        }

        async function addToCart(id, nombre, precio, stock) {
            producto_item = {
                id: id,
                nombre: nombre,
                precio: precio,
                stock
            };

            document.getElementById('nombre_p').innerText = nombre;

            const input_cant = document.getElementById('input_cant');
            input_cant.max = stock;
            const modalCantidad = new bootstrap.Modal('#modalCantidad');


            await modalCantidad.show();
            input_cant.focus();
        }

        async function quitarDelCarrito(id) {
            await fetch('./Model/M_Quitar_Carrito.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json', // Indicar que el cuerpo es JSON
                },
                body: JSON.stringify({
                    id: id
                })
            });

            location.reload();
        }
    </script>