<?php

// se obtiene la pagina actual desde la url para saber que pagina activar
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 0;
}

// se obtiene la cantidad de productos en el carrito

if (isset($_SESSION['sesion_iniciada'])) {
    $session_iniciada = $_SESSION['sesion_iniciada'];
} else {
    $session_iniciada = false;
}


if($session_iniciada == "iniciado") {
    $texto_login = "Cerrar sesion";
} else {
    $texto_login = "Iniciar en sesion";
}

$esAdmin = isset($_SESSION['esAdmin']) ? $_SESSION['esAdmin'] : false;

$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
$cantidad_carrito = count($carrito);

?>
<nav class="navbar navbar-expand-sm bg-body-tertiary mb-2">
    <div class="container-fluid">
        <a href="./?pagina=0" class="navbar-brand">Kattyta <small>panaderia</small></a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto mb-2 mt-0 mb-lg-0">
                <li class="nav-item mt-1">
                    <a href="./?pagina=0" class="nav-link <?php echo $pagina == 0 ? 'active' : ''; ?>" aria-current="page">Inicio</a>
                </li>
                <li class="nav-item mt-1">
                    <a href="./?pagina=productos" class="nav-link <?php echo $pagina == 'productos' ? 'active' : ''; ?>" aria-current="page">Productos</a>
                </li>
                <li class="nav-item mt-1">
                    <a href="<?php echo $session_iniciada == "iniciado" ? "./Model/M_Salir.php" : "./?pagina=login" ?>"
                    class="nav-link <?php echo $pagina == 'login' ? 'active' : ''; ?>" aria-current="page"><?php echo $texto_login; ?></a>
                </li>
                <li class="nav-item mt-1 <?php echo $esAdmin ? '' : 'd-none'; ?>">
                    <a href="./?pagina=reportes" class="nav-link <?php echo $pagina == 'reportes' ? 'active' : ''; ?>" aria-current="page">Reportes</a>
                </li>
                <li class="nav-item mt-1 <?php echo $esAdmin ? '' : 'd-none'; ?>">
                    <a href="./?pagina=emcategoria" class="nav-link <?php echo $pagina == 'emcategoria' ? 'active' : ''; ?>" aria-current="page">Categorias</a>
                </li>
                
                <li class="nav-item">
                    <a href="./?pagina=terminarpedido" class="nav-link" aria-current="page">
                        <button type="button" class="d-flex btn w-auto btn-primary position-relative">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill text-bg-warning">
                                <?php echo $cantidad_carrito; ?>
                                <span class="visually-hidden"></span>
                            </span>
                        </button>
                    </a>
                </li>
                <li class="nav-item mt-1">
                    <a href="./?pagina=ayuda" class="nav-link <?php echo $pagina == 'ayuda' ? 'active' : ''; ?>" aria-current="page">Ayuda</a>
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