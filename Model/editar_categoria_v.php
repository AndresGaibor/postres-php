<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("../config/config.php");
$Id = $_POST['id'];
$Nombre = $_POST['nombre_categoria'];

$sql = "UPDATE categoria SET nombre_categoria='$Nombre' WHERE id='$Id'";
$regre = mysqli_query($conexion, $sql);

if ($regre && mysqli_affected_rows($conexion) > 0) {
    echo "<script>alert('Datos actualizados correctamente'); window.location.href = '../View/v_eliminar_modificar_categoria.php';</script>";
    exit();
} else {
    echo "<script>alert('Error: El ID no existe.'); window.location.href = '../View/v_eliminar_modificar_categoria.php';</script>";
    exit();
}
?>