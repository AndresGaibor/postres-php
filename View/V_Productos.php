<div class="container-fluid bg-light pt-1">
    <div class="row">
        <div class="container col-2">
            <?php
            include('./config/config.php');

            $sqlcat = "SELECT * FROM categoria";
            $resultado = mysqli_query($conexion, $sqlcat);

            ?>
                <h3>Categorias</h3>
                <div class="container">
                    <?php while ($mostrar = mysqli_fetch_array($resultado)) : ?>
                        <div class="list-group list-group-item">
                            <a href="./?pagina=productos&categoria=<?php echo $mostrar['id']; ?>">
                                <?php echo $mostrar['nombre_categoria']; ?>
                            </a>
                    </div>
                        <div class="list-group list-group-item">
                            <a class="active" href="./?pagina=productos">
                                Todos
                            </a>
                    </div>
                    <?php endwhile; ?>
                    </div>
        </div>
        <div class="container col-6">
            <?php
            if (isset($_SESSION['esAdmin']) && $_SESSION['esAdmin'])
                include('./View/V_Ingresar_Admin.php');
                // include('./View/V_Btn_Eli_Edi.php');
            ?>

            <?php include('./View/V_Productos_Lista.php'); ?>
        </div>
    </div>
    <div class="p-2 col-3">
        <?php
        include('./View/V_Productos_Carrito.php');
        ?>
    </div>
</div>
</div>