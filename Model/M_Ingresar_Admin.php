<?php
include("../config/config.php");
$nombre=$_POST['nombre'];
$precio=$_POST['precio'];
$stock=$_POST['cantidad'];
$img=$_POST['imagen'];
$idCat=$_POST['categoria'];
$sql = "INSERT INTO producto (nombre_producto, precio, stock, img_url) 
        VALUES ('$nombre', $precio, $stock, '$img');
        INSERT INTO ProductoCategoria (producto_id, categoria_id) 
        VALUES (LAST_INSERT_ID(), (SELECT id FROM Categoria WHERE id = $idCat));";
mysqli_query($conexion,$sql);
header('Location: ../index.php?pagina=productos');
?>