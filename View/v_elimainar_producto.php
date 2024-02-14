<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Eliminar/editar</title>    
  <link rel="stylesheet" href="../css/holaaa.css">
  <!-- UIkit CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.16.22/dist/css/uikit.min.css" />

</head>
<body>
    <center><h1> Producto</h1> 
    <table border="1" >
    <th >Id</th>
    <th >Nombre</th>
    <th >Precio </th>
    <th >Cantidad </th>
    <th >Foto </th>
    <th >Modificar  </th>
    <th >Eliminar</th>
    <?php include("../Model/EditarMostrar.php")?>
  </tr>
</table>
    </center>
</body>

</html
