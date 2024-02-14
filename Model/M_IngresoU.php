<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('../config/config.php');

// Obtener valores del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$clave = sha1($_POST['clave']);
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$calle = $_POST['calle'];
$calle2 = $_POST['calle2'];

// Consulta SQL para verificar si el correo ya está en uso
$sql_verificar = "SELECT * FROM usuario WHERE correo = '$email'";
$resultado_verificar = mysqli_query($conexion, $sql_verificar);

// Verificar si ya existe un usuario con ese correo
if(mysqli_num_rows($resultado_verificar) > 0) {
    // Mostrar un mensaje indicando que el correo ya está en uso
    echo 'El correo electrónico ya está en uso. Por favor, elige otro.';
} else {
    // Si el correo no está en uso, proceder con la inserción

    // Insertar provincia y obtener su ID
    $sql_insert_calle = "INSERT INTO direccion (calle_principal, calle_secundaria, ciudad_id) VALUES ('$calle', '$calle2', '$ciudad')";
    mysqli_query($conexion, $sql_insert_calle);
    $id_direccion = mysqli_insert_id($conexion);

    // Insertar usuario con el ID de dirección obtenido
    $sql_insert_usuario = "INSERT INTO usuario (nombre, apellido, direccion_id, correo, clave, rol, telefono) VALUES ('$nombre', '$apellido', '$id_direccion', '$email', '$clave', null, '$telefono')";
    $ejecutar = mysqli_query($conexion, $sql_insert_usuario);
    
    if($ejecutar) {
        session_start();

        $_SESSION['sesion_iniciada'] = "iniciado";
        // nombre
        $fila = mysqli_fetch_assoc($ejecutar);
        $_SESSION['nombre'] = $fila['nombre'];
        $_SESSION['esAdmin'] = $fila['rol'] == "admin" ? true : false;
        header("Location: ../index.php?pagina=productos");
    } else {
        echo 'No se agregó';
    }
}

?>