<?php
include("../config/config.php");
$clave = $_POST['id'];
$sql = "DELETE FROM categoria WHERE id = $clave";
$regre = mysqli_query($conn, $sql);

if ($regre && mysqli_affected_rows($conn) > 0) {
    header("Location:../View/v_eliminar_modificar_categoria.php");
    exit();
} else {
    echo "Error: El ID no existe.";
}

if($regre){
    header("location:../login.html");
}else {
    echo"no se  elimino";
}

?>