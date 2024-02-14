<?php
include('./config/config.php');

// CAMBIAR ESTE VALOR
$cantidad_productos_por_pagina = 2;

$limit = $cantidad_productos_por_pagina;

// categoria from get
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : null;

$sql1 = "SELECT COUNT(*) as total FROM Producto WHERE enabled = 1";
if ($categoria) {
    $sql1 = "SELECT COUNT(*) as total FROM Producto INNER JOIN ProductoCategoria ON Producto.id = ProductoCategoria.producto_id WHERE ProductoCategoria.categoria_id = $categoria AND Producto.enabled = 1";
}
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
$esAdmin = isset($_SESSION['esAdmin']) ? $_SESSION['esAdmin'] : false;

$offset = ($start - 1) * $limit;

// CREATE TABLE Producto(
//     id int AUTO_INCREMENT,
//     enabled BOOLEAN DEFAULT TRUE,
//     nombre_producto varchar(50),
//     precio DECIMAL(10,2),
//     stock int,
//     img_url varchar(500),
//     PRIMARY KEY (id)
// );
// CREATE TABLE ProductoCategoria(
//     id int AUTO_INCREMENT,
//     producto_id int,
//     categoria_id int,
//     PRIMARY KEY (id),
//     FOREIGN KEY (producto_id) REFERENCES Producto(id),
//     FOREIGN KEY (categoria_id) REFERENCES Categoria(id)
// );

$sql = "SELECT * FROM Producto where enabled = 1 ORDER BY id DESC LIMIT $limit OFFSET $offset";
if ($categoria) {
    $sql = "SELECT * FROM Producto INNER JOIN ProductoCategoria ON Producto.id = ProductoCategoria.producto_id WHERE ProductoCategoria.categoria_id = $categoria AND Producto.enabled = 1 ORDER BY Producto.id DESC LIMIT $limit OFFSET $offset";
}
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
                        <button type="button" id="cancel_btn_car" class="btn btn-secondary w-auto" data-bs-dismiss="modal">Cancelar</button>
                        <button id="confirm_btn_car" class="btn btn-primary w-auto" type="submit" >
                        <span id="confirm_btn_car_text">Agregar al carrito </span><i class="fa-solid fa-cart-shopping fa-sm"></i>
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

                        <a class="btn btn-info mb-1 <?php echo $esAdmin ? '' : 'd-none'; ?>
                        " href="./Model/editar.php?id=<?php echo $fila['id']; ?>">
                            <center>  Editar <i class="fas fa-pencil-alt"></i></center>
                        </a>
                        <a class="btn btn-danger mb-1 <?php echo $esAdmin ? '' : 'd-none'; ?>
                        " href="./Model/delete.php?id=<?php echo $fila['id']; ?>">
                             <center>Eliminar <i class="fas fa-trash-alt"></i></center>
                        </a>
                        <button href="#" id="producto-<?php echo $fila['id'] ?>" onclick="<?php echo existeEnCarrito($fila['id']) ? 'quitarDelCarrito(' . $fila['id'] . ')' : 'addToCart(' . $fila['id'] . ', \'' . $fila['nombre_producto'] . '\', ' . $fila['precio'] . ', '.$fila['stock'].');' ?>" class="btn w-auto btn-<?php echo existeEnCarrito($fila['id']) ? 'danger ' : 'warning '; echo $fila['stock'] == 0 ? 'disabled' : ''; ?>
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
            await quitarDelCarrito(producto_item.id);
            await sendAddToCart(producto_item.id, producto_item.nombre, producto_item.precio, +cantidad, producto_item.stock);
            const modalCantidad = new bootstrap.Modal('#modalCantidad');
            modalCantidad.hide();

            document.getElementById('input_cant').value = '';

            // setTimeout(() => location.reload(), 3000);
            location.reload();

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

        }

        async function addToCart(id, nombre, precio, stock) {
            
            producto_item = {
                id: id,
                nombre: nombre,
                precio: precio,
                stock
            };

            document.getElementById('nombre_p').innerText = nombre;

            document.getElementById('confirm_btn_car_text').innerText = 'Agregar al carrito ';
            document.getElementById('confirm_btn_car').classList.add('btn-primary');
            document.getElementById('cancel_btn_car').innerHTML = 'Cancelar';
            

            const input_cant = document.getElementById('input_cant');
            input_cant.max = stock;
            const modalCantidad = new bootstrap.Modal('#modalCantidad');


            await modalCantidad.show();
            setTimeout(() => {
                input_cant.focus();
            }, 500);
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

        }
    </script>