<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(!isset($_GET['pagina'])) {
    echo "No existe la pagina";
    return;
}
$v1 = $_GET['pagina'];
$v2 =$_GET['v'];
if($v2==1){
    include("/Model/M_Reporte_Pedido.php");
}
$paginas = array();

// Aqui ingresamos las paginas que vamos a utilizar
$paginas[1] = "V_Visualizar_P_Usuario";
$paginas['productos'] = "V_Productos";
$paginas['ingresar_admin'] = "V_Ingresar_Admin";

if(!array_key_exists($v1, $paginas))  {
    echo "No existe la pagina";
    return;
}

$paginaActual = $paginas[$v1];
include('./View/'.$paginaActual.'.php');

?>