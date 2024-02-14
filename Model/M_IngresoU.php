<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../config/config.php');

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$clave = sha1($_POST['clave']);
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];


// Consulta SQL para verificar si el correo ya está en uso
$sql_verificar = "SELECT * FROM usuario WHERE correo = '$email'";
$resultado_verificar = mysqli_query($conexion, $sql_verificar);

// Verificar si ya existe un usuario con ese correo
if(mysqli_num_rows($resultado_verificar) > 0) {
    // Mostrar un mensaje indicando que el correo ya está en uso
    echo 'El correo electrónico ya está en uso. Por favor, elige otro.';
} else {
    // Si el correo no está en uso, proceder con la inserción
    $sql = "INSERT INTO usuario (nombre, apellido, direccion_id, correo, clave, rol ,telefono) VALUES ('$nombre', '$apellido', '$direccion', '$email', '$clave', ' ', '$telefono')";
    $ejecutar = mysqli_query($conexion, $sql);
    
    if($ejecutar) {
        header("Location: ../index.php?pagina=productos");
    } else {
        echo 'No se agregó';
    }
}
?>