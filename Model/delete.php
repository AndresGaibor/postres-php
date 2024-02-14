<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include("../Config/config.php");
$clave = $_GET['id'];
// update enabled to false
$sql = "UPDATE producto SET enabled = 0 WHERE id = $clave";
// $sql = "DELETE FROM producto WHERE id = $clave";
$regre = mysqli_query($conexion, $sql);

if ($regre && mysqli_affected_rows($conexion) > 0) {
    header("Location: ../index.php?pagina=productos");
    exit();
} else {
    echo "Error: El ID no existe.";
}

if($regre){
    header("location:../index.php?pagina=productos");
}else {
    echo"no se  elimino";
}

?>