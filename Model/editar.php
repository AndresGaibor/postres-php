<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("../config/config.php");
$id = $_GET['id'];
$sql = "SELECT * from producto where id='$id'";
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
  <link rel="stylesheet" href="../Estilos/holaaa.css">
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
  <div class="uk-card uk-card-hover" id="contenedorForm" style="padding: 2rem;" >
    <div class="formulario" >
      <form class="ui form" action="../Model/editar_v.php" method="post" >
        <fieldset class="uk-fieldset">
          <legend class="uk-legend">Datos del producto</legend>
          <br><br>
          <label class="uk-form-label" for="nombre">ID: </label>
<<<<<<< HEAD
          <input class="uk-input" type="text" id="id" aria-label="" required  name="idp" value="<?php echo $mostrar['id']; ?>" readonly> 
=======
          <input class="uk-input" type="text" id="nombre" aria-label="" required  name="id" value="<?php echo $mostrar['id']; ?>" readonly disabled> 
>>>>>>> dd00853b4e40361db1666a55476577aab37b0456
          <br><br>
          <label class="uk-form-label" for="nombre">Nombre: </label>
          <input class="uk-input" type="text" id="nombre_producto" aria-label="Duración del vuelo" required  name="nombre_producto" value="<?php echo $mostrar['nombre_producto']; ?>"> 
          <br><br>
          <label class="uk-form-label" for="nombre">Precio: </label>
          <input class="uk-input" min="0" type="text" id="precio" aria-label="" required  name="precio" value="<?php echo $mostrar['precio']; ?>"> 
          <br><br>
          <label class="uk-form-label" for="nombre">Stock: </label>
          <input class="uk-input" min="0" type="text" id="stock" aria-label="" required  name="stock" value="<?php echo $mostrar['stock']; ?>"> 
          <br><br>
         
          <label class="uk-form-label" for="nombre">Ingrese el url de la imagen </label>
          <input type="text" class="uk-input" name="img_url" value="<?php echo $mostrar['img_url']; ?>" required>
          <br><br>
          <div class="uk-margin">
<<<<<<< HEAD
            <input id="buton" type="submit" class="ui primary button btn" value="Modificar">
=======
            <input id="buton" type="submit" class="ui primary button" value="Modificar">
>>>>>>> dd00853b4e40361db1666a55476577aab37b0456
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>
