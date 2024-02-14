<?php
include ("../config/config.php");

$sql ="SELECT * from categoria";
$resultado = mysqli_query($conn, $sql);
while ($mostrar = mysqli_fetch_array($resultado)) {
    ?>
    <tr> 
        <td><?php echo $mostrar['id']; ?> </td>
        <td><?php echo $mostrar['nombre_categoria']; ?> </td>


            
        <td>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <a href="../Model/editar_categoria.php?id=<?php echo $mostrar['id']; ?>">
               <center>  <i class="fas fa-pencil-alt"></i></center>
            </a>
        </td>
        <td>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

            <a href="../Model/eliminar_categoria.php?<?php echo $mostrar['id']; ?>">
               <center> <i class="fas fa-trash-alt"></i></center>
            </a>
        </td>
    </tr>
    <?php
}
?>