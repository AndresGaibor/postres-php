<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../config/config.php");
$id = $_GET['id'];
$sql = "SELECT * from categoria where id='$id'";
$resultado = mysqli_query($conexion, $sql);
$mostrar = mysqli_fetch_array($resultado);

if (isset($_GET['success'])) {
    echo "<script>alert('Datos actualizados correctamente');</script>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 1</title>    
  <link rel="stylesheet" href="../css/holaaa.css">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css" />
  <!-- UIkit JS -->
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/js/uikit-icons.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
  <script src="js_ejercicios.js"></script>
</head>
<body>
  <br><br><br><br>
  <div class="uk-card uk-card-hover" id="contenedorForm" >
    <div class="formulario" >
      <form class="ui form" action="../Model/editar_categoria_v.php" method="post" >
        <fieldset class="uk-fieldset">
          <legend class="uk-legend">Datos del producto</legend>
          <br><br>
          <label class="uk-form-label" for="nombre">ID: </label>
          <input class="uk-input" type="text" id="nombre" aria-label="" required  name="id" value="<?php echo $mostrar['id']; ?>" readonly> 
          <br><br>
          <label class="uk-form-label" for="nombre">Nombre: </label>
          <input class="uk-input" type="text" id="nombre_categoria" aria-label="Duración del vuelo" required  name="nombre_categoria" value="<?php echo $mostrar['nombre_categoria']; ?>"> 
         
          <div class="uk-margin">
            <input id="buton" type="submit" class="ui primary button" value="Modificar">
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>