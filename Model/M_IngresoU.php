<?php
// Obtener valores del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$clave = sha1($_POST['clave']);
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$provincia = $_POST['provincia'];
$ciudad = $_POST['ciudad'];
$calle = $_POST['calle'];

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
    $sql_insert_provincia = "INSERT INTO provincia (nombre_provincia) VALUES ('$provincia')";
    mysqli_query($conexion, $sql_insert_provincia);
    $id_provincia = mysqli_insert_id($conexion);

    // Insertar ciudad y obtener su ID
    $sql_insert_ciudad = "INSERT INTO ciudad (nombre_ciudad, provincia_id) VALUES ('$ciudad', '$id_provincia')";
    mysqli_query($conexion, $sql_insert_ciudad);
    $id_ciudad = mysqli_insert_id($conexion);

    // Insertar calle y obtener su ID
    $sql_insert_calle = "INSERT INTO direccion (calle_principal, ciudad_id) VALUES ('$calle', '$id_ciudad')";
    mysqli_query($conexion, $sql_insert_calle);
    $id_direccion = mysqli_insert_id($conexion);

    // Insertar usuario con el ID de dirección obtenido
    $sql_insert_usuario = "INSERT INTO usuario (nombre, apellido, direccion_id, correo, clave, rol, telefono) VALUES ('$nombre', '$apellido', '$id_direccion', '$email', '$clave', '', '$telefono')";
    $ejecutar = mysqli_query($conexion, $sql_insert_usuario);
    
    if($ejecutar) {
        header("Location: ../index.php?pagina=productos");
    } else {
        echo 'No se agregó';
    }
}

?>