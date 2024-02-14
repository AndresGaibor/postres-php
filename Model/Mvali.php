<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../config/config.php');
$email = $_POST['email'];
$clave = $_POST['password'];
$claveSha1 = sha1($clave);
// echo $claveSha1;
return;
$sql = "SELECT * FROM usuario WHERE correo = '$email' AND clave = '$claveSha1'";
$resultado = mysqli_query($conexion, $sql);
session_start();

if(mysqli_num_rows($resultado) > 0) {

    $_SESSION['sesion_iniciada'] = "iniciado";
    // nombre
    $fila = mysqli_fetch_assoc($resultado);
    $_SESSION['id_usuario'] = $fila['id'];
    $_SESSION['nombre'] = $fila['nombre'];
    $_SESSION['correo'] = $fila['correo'];
    $_SESSION['esAdmin'] = $fila['rol'] == "admin" ? true : false;

    if(isset($_SESSION['terminandocompra']) && $_SESSION['terminandocompra'] == true){
        $_SESSION['terminandocompra'] = false;
        header("Location: ../index.php?pagina=terminarpedido");
    } else {
        header("Location: ../index.php?pagina=productos");
    }
    // echo "hola";
    exit(); // Importante: detener la ejecución del script después de la redirección
} else {
    // Permanecer en la misma página si la validación es incorrecta
    echo "Credenciales incorrectas. Por favor, inténtalo de nuevo.";
}


?>