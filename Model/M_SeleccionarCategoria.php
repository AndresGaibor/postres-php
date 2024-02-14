<?php
include("../config/config.php");

$sql = "SELECT *FROM categoria";
$resultado = mysqli_query($conexion, $sql);
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Seleccionar categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="card w-50 " >
        <div class="card-body">
            <form action="../Model/M_Reporte_ListaProductos.php" method="POST">

                <select class="form-select form-select-lg mb-3" aria-label="Large select example" name="idcategoria">
                    <option selected>Seleccione una categoria</option>

                    <?php
                    while ($mostrar = mysqli_fetch_array($resultado)) {
                    ?>
                        <option value="<?php echo $mostrar['id']; ?>"><?php echo $mostrar['nombre_categoria']; ?></option>
                    <?php
                    }
                    ?>
                </select>

                <input type="submit" value="Generar reporte">
            </form>
        </div>
    </div>

</body>

</html>