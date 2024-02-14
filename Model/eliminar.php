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
    
  <div class="uk-card uk-card-hover" id="contenedorForm" >
    <div class="formulario" >
      <form class="ui form" action="../Model/Delete.php" method="post" >
        <fieldset class="uk-fieldset">
          <legend class="uk-legend">Eliminar un dato por id</legend>
          <div class="uk-margin">
            <label class="uk-form-label" for="clave">ID: </label>
            <br><br>
            <input class="uk-input" type="text" id="id" aria-label="Duración del vuelo" required  name="id">
          </div>
          <div class="uk-margin" >
            <input id="buton" type="submit" class="ui primary button" value="Eliminar">
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</body>
</html>

