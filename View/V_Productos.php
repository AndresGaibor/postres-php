<div class="container-fluid bg-light pt-1">
    <div class="row">
        <!-- <div class="p-2 col-2 bg-warning">Categorias</div> -->
        <div class="container col-6">
            <?php
            if (isset($_SESSION['esAdmin']) && $_SESSION['esAdmin'])
                include('./View/V_Ingresar_Admin.php');
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