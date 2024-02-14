<?php
include("../config/config.php");
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['cantidad'];
$img=$_POST['imagen'];
$idCat=$_POST['categoria'];
$sql1 = "INSERT INTO producto (nombre_producto, precio, stock, img_url) VALUES ('$nombre', $precio, $stock, '$img')"

mysqli_query($conexion,$sql1);
$idp= mysqli_insert_Id($conexion)
$sql2= "INSERT INTO ProductoCategoria (producto_id, categoria_id) 
VALUES ($idp, $idCat);"
mysqli_query($conexion,$sql2);
header('Location: ../index.php?pagina=productos');
?>