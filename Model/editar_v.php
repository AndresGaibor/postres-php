<?php
include("../config/config.php");
$Id = $_POST['id'];
$Nombre = $_POST['nombre_producto'];
$Precio = $_POST['precio'];
$Stock = $_POST['stock'];
$Img = $_POST['img_url'];
$sql = "UPDATE producto SET nombre_producto='$Nombre', precio='$Precio', stock='$Stock' , img_url='$Img'  WHERE id='$Id'";
$regre = mysqli_query($conn, $sql);

if ($regre && mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Datos actualizados correctamente'); window.location.href = '../View/v_eliminar_producto';</script>";
    exit();
} else {
    echo "<script>alert('Error: El ID no existe.'); window.location.href = '../View/v_eliminar_producto';</script>";
    exit();
}
?>