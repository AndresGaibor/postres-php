<?php

// se obtiene la pagina actual desde la url para saber que pagina activar
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 0;
}

// se obtiene la cantidad de productos en el carrito

if (isset($_SESSION['cantidad_carrito'])) {
    $cantidad_carrito = $_SESSION['cantidad_carrito'];
} else {
    $cantidad_carrito = 0;
}

if (isset($_SESSION['sesion_iniciada'])) {
    $session_iniciada = $_SESSION['session_iniciada'];
} else {
    $session_iniciada = false;
}

if($session_iniciada) {
    $texto_login = "Cuenta";
} else {
    $texto_login = "Iniciar en sesion";
}


?>
<nav class="navbar navbar-expand-sm bg-body-tertiary mb-2">
    <div class="container-fluid">
        <a href="./" class="navbar-brand">Kattyta <small>panaderia</small></a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mt-0 mb-lg-0">
                <li class="nav-item mt-1">
                    <a href="./?pagina=0" class="nav-link <?php echo $pagina == 0 ? 'active' : ''; ?>" aria-current="page">Inicio</a>
                </li>
                <li class="nav-item mt-1">
                    <a href="./?pagina=productos" class="nav-link <?php echo $pagina == 'productos' ? 'active' : ''; ?>" aria-current="page">Productos</a>
                </li>
                <li class="nav-item mt-1">
                    <a href="./?pagina=ingresar_admin" class="nav-link <?php echo $pagina == 'ingresar_admin' ? 'active' : ''; ?>" aria-current="page">Ingresar admin</a>
                </li>
                <li class="nav-item mt-1">
                    <a href="./?pagina=3" class="nav-link <?php echo $pagina == 3 ? 'active' : ''; ?>" aria-current="page"><?php echo $texto_login; ?></a>
                </li>
                <li class="nav-item">
                    <a href="./?pagina=4" class="nav-link" aria-current="page">
                        <button type="button" class="d-flex btn w-auto btn-primary position-relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-warning">
                                <?php echo $cantidad_carrito; ?>
                                <span class="visually-hidden"></span>
                            </span>
                        </button>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</nav>
<!-- <header class="header">
        <a href="#" class="logo"><ion-icon name="home"></ion-icon>
            Pastelería</a>
        <nav class="nav">
            <a href="#">Usuario</a>
            <a href="#">Administrador</a>
            <a href="#">Contactos</a>
            <a href="#"></a> 
            <a href="#"></a>
            <a href="#"></a>
        </nav>
    </header> -->