<?php
include ("../config/config.php");
$sql ="SELECT * from producto";
$resultado = mysqli_query($conn, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr> 
        <td><?php echo $mostrar['id']; ?> </td>
        <td><?php echo $mostrar['nombre_producto']; ?> </td>
        <td><?php echo $mostrar['precio']; ?> </td>
        <td><?php echo $mostrar['stock']; ?> </td>
        <td><?php echo $mostrar['img_url']; ?> </td>

            
        <td>
            <a href="../Model/editar.php?id=<?php echo $mostrar['id']; ?>">
               <center> <img src="../img/lapiz.png" alt="Editar" width="20" height="20"></center>
            </a>
        </td>
        <td>
            <a href="../Model/eliminar.php?<?php echo $mostrar['id']; ?>">
               <center> <img src="../img/eliminar.png" alt="Eliminar" width="20" height="20"></center>
            </a>
        </td>
    </tr>
    <?php
}
?>