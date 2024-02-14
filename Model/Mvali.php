<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


include('../config/config.php');
$email = $_POST['email'];
$clave = $_POST['password'];

if($email == "" || $clave == ""){
    echo "Por favor, ingrese su correo y contraseña.";
    return;
}
 $sql = "SELECT * FROM usuario WHERE correo = '$email' AND clave = '$clave'";
 $resultado = mysqli_query($conexion, $sql);
 session_start();
session_start();

if(!$resultado) {
    echo "Error en la consulta: " . mysqli_error($conexion);
    exit;
}

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

// header("Location: ../index.php?pagina=productos");

?>