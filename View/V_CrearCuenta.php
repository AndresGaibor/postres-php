<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Estilos/Registro.css">
    <title>Registro | Usuario</title>
</head>
<body>
    <form action="../Model/M_IngresoU.php" method="post">

        <label for="nombre">Nombre*</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="apellido">Apellido*</label>
        <input type="text" id="apellido" name="apellido" required>
        <br>
        <label for="direccion">Dirección*</label>
        <input type="text" id="direccion" name="direccion" required>
        <br>
        <label for="email">Email*</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="clave">Clave*</label>
        <input type="password" id="clave" name="clave" required>
        <br>
        <label for="telefono">Teléfono*</label>
        <input type="tel" id="telefono" name="telefono" required>
        <br>
        <input type="submit" name = "emviar" value = "Enviar">
    </form>
</body>
</html>