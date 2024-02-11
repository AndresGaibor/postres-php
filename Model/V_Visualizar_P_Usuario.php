<?php
include("../config/config.php");
$sql = "SELECT
    p.nombre_producto,
    p.id,
    p.precio,
    p.img_url,
    GROUP_CONCAT(i.nombre_ingrediente SEPARATOR ', ') AS ingredientes
    FROM tienda_postres.Producto p
    INNER JOIN tienda_postres.ProductoIngrediente pi ON p.id = pi.producto_id
    INNER JOIN tienda_postres.Ingrediente i ON pi.ingrediente_id = i.id
    GROUP BY p.id";
$resul = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resul)) {
?>
    <div class="card">
        <img src="<?php echo $mostrar['img_url'] ?>" alt="">
        <label for=""><?php echo $mostrar['p.nombre_producto'] ?></label>
        <label for=""><?php echo $mostrar['p.id'] ?></label>
        <label for=""><?php echo $mostrar['p.precio'] ?></label>
        <label for=""><?php echo $mostrar['ingredientes'] ?></label>
    </div>
<?php
}
?>