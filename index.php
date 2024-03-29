<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./Estilos/Inicio.css">
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="./Estilos/Registro.css">
    <link rel="stylesheet" href="./Estilos/Ayuda.css">
    <title>PASTELERIA | LOGIN </title>
    <!-- <link rel="stylesheet" href="ext/bootstrap/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/56e9800af8.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php include('./View/V_Header.php'); ?>
    <main style="height: 100vh; display: flex; flex-direction: column; min-height: 100vh;">
        <!-- <h1>asd</h1> -->
        <div style="flex: 1;">
            <?php include('./Controller/controller.php'); ?>
        </div>
        <?php include('./View/V_Footer.php'); ?>
    </main>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- <script src="ext/bootstrap/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <!-- <script src="Login.js"></script> -->
</body>
</html>