<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Login.css">
    <title>PASTELERIA | LOGIN </title>
</head>
<body>
    <header class="header">
        <a href="#" class="logo"><ion-icon name="home"></ion-icon>
            Pastelería</a>
        <nav class="nav">
            <a href="#">Usuario</a>
            <a href="#">Administrador</a>
            <a href="#">Contactos</a>
            <!-- Para que se centre el menú jaja  -->
            <a href="#"></a> 
            <a href="#"></a>
            <a href="#"></a>
        </nav>
    </header>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main>
        <section class="info">
            <h2>Sistema que gestiona venta de Pasteles</h2>
            <hr>
            <h2>Login</h2>
            <ion-icon name="person"></ion-icon><input type="email" placeholder="Email..." required> <br><br>
            <ion-icon name="key"></ion-icon><input type="password" placeholder="Contraseña..." required><br><br>
            <br>
            <button type="submit" onclick="Iniciar()">Iniciar sesión</button>
            <a class='ewk_banner_link' href='./index.php?pagina=crearcuenta'>Registrarte</a>
        </section>
    </main>
    <script src="Login.js"></script>
</body>
</html> 
