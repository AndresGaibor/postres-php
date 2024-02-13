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
$paginas[1] = "V_Visualizar_P_Usuario";
$paginas['productos'] = "V_Productos";

if(!array_key_exists($v1, $paginas))  {
    echo "No existe la pagina";
    return;
}

$paginaActual = $paginas[$v1];
include('./View/'.$paginaActual.'.php');

?>