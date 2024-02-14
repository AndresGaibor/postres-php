<?php
include('../config/config.php');
$email = $_POST['email'];
$clave = $_POST['password'];
$sql = "SELECT * FROM usuario WHERE correo = '$email' AND clave = '$clave'";
$resultado = mysqli_query($conexion, $sql);

if(mysqli_num_rows($resultado) > 0) {

    header("Location: ../index.php?pagina=productos");
    exit(); // Importante: detener la ejecución del script después de la redirección
} else {
    // Permanecer en la misma página si la validación es incorrecta
    echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
}


?>