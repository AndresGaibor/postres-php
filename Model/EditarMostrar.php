<?php
include ("../config/config.php");
$sql ="SELECT * from producto";
$resultado = mysqli_query($conexion, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr> 
        <td><?php echo $mostrar['id']; ?> </td>
        <td><?php echo $mostrar['nombre_producto']; ?> </td>
        <td><?php echo $mostrar['precio']; ?> </td>
        <td><?php echo $mostrar['stock']; ?> </td>
        <td><?php echo $mostrar['img_url']; ?> </td>

            
        <td>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <a href="../Model/editar.php?id=<?php echo $mostrar['id']; ?>">
            <center>  <i class="fas fa-pencil-alt"></i></center>
            </a>
        </td>
        <td>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <a href="../Model/eliminar.php?<?php echo $mostrar['id']; ?>">
              <center> <i class="fas fa-trash-alt"></i></center>
            </a>
        </td>
    </tr>
    <?php
}
?>
