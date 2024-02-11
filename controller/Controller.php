<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    $v1 = $_GET['var1'];

    if($v1 == 1){
        include('../View/Vingreso.php');
    }
    elseif($v1 == 2){
        include('../View/VConsulta.php');
    } elseif($v1 == 3) {
        include('../View/VBuscar.php');
    }
    else "ninguna opción seleccionada";

?>