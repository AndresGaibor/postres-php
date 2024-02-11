<?php
include("../config/config.php");
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['cantidad'];
$img=$_POST['imagen'];
$sql="INSERT INTO producto(nombre_producto,precio,stock,img_url)VALUES('$nombre',$precio,$stock,'$img')";
mysqli_query($conexion,$sql);
?>