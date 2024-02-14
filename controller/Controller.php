<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['pagina'])) {
    // echo "No existe la pagina";
    $v1 = 0;
} else {
    $v1 = $_GET['pagina'];
}
// $v1 = $_GET['pagina'];

$paginas = array();

// Aqui ingresamos las paginas que vamos a utilizar
$paginas[0] = "V_Inicio";
$paginas[1] = "../Model/M_Reporte_Pedido";
$paginas['productos'] = "V_Productos";
$paginas['ingresar_admin'] = "V_Ingresar_Admin";
$paginas['crearcuenta'] = "V_CrearCuenta";
$paginas['login'] = "V_Login";
$paginas['terminarpedido'] = "V_TerminarPedido";
$paginas['reportes'] = "V_ALL_Reportes";
$paginas['ayuda'] = "V_Ayuda";
$paginas['emcategoria'] = "v_eliminar_modificar_categoria";
// $paginas['reportes'] = "V_reporte_producto_cantidad";


if(!array_key_exists($v1, $paginas))  {
    echo "No existe la pagina";
    return;
}

$paginaActual = $paginas[$v1];
include('./View/'.$paginaActual.'.php');

?>
