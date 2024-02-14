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

$offset = ($start - 1) * $limit;

$sql = "SELECT * FROM Producto LIMIT $limit OFFSET $offset";
$resultado = mysqli_query($conexion, $sql);
?>
<div class="container">
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
                        <a href="#" class="btn btn-warning">Agregar carrito <i class="fa-solid fa-cart-shopping fa-sm"></i></a>
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