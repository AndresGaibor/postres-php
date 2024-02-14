<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['pagina'])) {
    echo "No existe la pagina";
    return;
}
$v1 = $_GET['pagina'];

$paginas = array();

// Aqui ingresamos las paginas que vamos a utilizar
$paginas[1] = "../Model/M_Reporte_Pedido";
$paginas['productos'] = "V_Productos";
$paginas['ingresar_admin'] = "V_Ingresar_Admin";
$paginas['crearcuenta'] = "V_CrearCuenta";
$paginas['login'] = "../Login";
$paginas['reportes'] = "V_ALL_Reportes.php";

if(!array_key_exists($v1, $paginas))  {
    echo "No existe la pagina";
    return;
}

$paginaActual = $paginas[$v1];
include('./View/'.$paginaActual.'.php');

?>