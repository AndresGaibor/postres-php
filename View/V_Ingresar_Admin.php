<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Postre</title>
    <link rel="stylesheet" href="Login.css">
</head>
<body>
    <form action="../Model/M_Ingresar_Admin.php" method="post">
        <label for="">Ingrese el nombre del prostre:</label>
        <br>
        <input type="text" name="nombre">
        <br>
        <label for="">Ingrese el precio:</label>
        <br>
        <input type="number" name="precio" min="0.00">
        <br>
        <label for="">Ingrese la cantidad:</label>
        <br>
        <input type="number" name="cantidad">
        <br>
        <label for="">Ingrese el url de la imagen:</label>
        <br>
        <input type="text" name="imagen">
        <br>
        <input type="submit" value="Agregar">
    </form>
</body>
</html>