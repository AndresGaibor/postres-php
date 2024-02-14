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

    $sql = "INSERT INTO Usuario (nombre, apellido, direccion_id, correo, clave, telefono) VALUES ('$nombre', '$apellido', '$direccion', '$email', '$clave', '$telefono')";
    $ejecutar = mysqli_query($conexion, $sql);
    if($ejecutar)
    header('location:../Login.html');
    else
    echo 'No se agregó'
?>