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

if(isset($_GET['start'])){
    $start = $_GET['start'];
} else {
    $start = 1;
}

// carrito que esta compuesto de id, nombre, precio, cantidad
if(isset($_SESSION['carrito'])){
    $carrito = $_SESSION['carrito'];
} else {
    $carrito = array();
    $_SESSION['carrito'] = $carrito;
}

function existeEnCarrito($id){
    global $carrito;
    foreach($carrito as $producto){
        if($producto['id'] == $id){
            return true;
        }
    }
    return false;
}

$offset = ($start - 1) * $limit;

$sql = "SELECT * FROM Producto LIMIT $limit OFFSET $offset";
$resultado = mysqli_query($conexion, $sql);

?>
<div class="container">
    <button type="button" onclick="limpiarCarrito()"
    class="btn btn-danger w-full">Borrar carrito</button>
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
                        <strong class="card-text">$<?php echo $fila['precio'] ?></strong>
                        <button href="#" 

                        id="producto-<?php echo $fila['id'] ?>" 
                        onclick="<?php echo existeEnCarrito($fila['id']) ? 'quitarDelCarrito(' . $fila['id'] . ')' : 'addToCart(' . $fila['id'] . ', \'' . $fila['nombre_producto'] . '\', ' . $fila['precio'] . ', 1)' ?>"
                        class="btn w-auto btn-<?php echo existeEnCarrito($fila['id']) ? 'danger' : 'warning'; ?>
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
                    for($i=1; $i<=$cantidad_paginas; $i++){
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
    // usando fetch
    async function addToCart(id, nombre, precio, cantidad){
        await fetch('./Model/M_Agregar_Carrito.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json', // Indicar que el cuerpo es JSON
        },
            body: JSON.stringify({
                id: id,
                nombre: nombre,
                precio: precio,
                cantidad: cantidad
            })
        });

        location.reload();
    }

    async function quitarDelCarrito(id){
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