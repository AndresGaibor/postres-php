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
            <form action="../Model/Mvali.php" method = "post">
                <h2>Login</h2>
                <ion-icon name="person"></ion-icon><input type="email" name = "email" placeholder="Email..." required> <br><br>
                <ion-icon name="key"></ion-icon><input type="password" name = "password" placeholder="Contraseña..." required><br><br>
                <br>
                <input type="submit" value = "Iniciar">
            </form>
            
            <a class='ewk_banner_link' href='controller/Controller.php?var1=2'>Registrarte</a>
        </section>
    </main>
    <script src="Login.js"></script>
</body>
</html> 
