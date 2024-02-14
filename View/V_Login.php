
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <main>
        <section class="info">
            <h2>Sistema que gestiona venta de Pasteles</h2>
            <hr>
            <form action="./Model/Mvali.php" method = "post">
                <h2>Login</h2>
                <ion-icon name="person"></ion-icon><input type="email" name = "email" placeholder="Email..." required> <br><br>
                <ion-icon name="key"></ion-icon><input type="password" name = "password" placeholder="Contraseña..." required><br><br>
                <br>
                <input type="submit" value = "Iniciar">
            </form>
            
            <a class='ewk_banner_link' href='index.php?pagina=crearcuenta'>Registrarte</a>
        </section>
    </main>
    <script>
        const backgrounds = ['images/1.jpg', 'images/2.jpg', 'images/3.jpg']; 
let currentIndex = 0;

    function changeBackground() {
      document.body.style.backgroundImage = `url(${backgrounds[currentIndex]})`;
      currentIndex = (currentIndex + 1) % backgrounds.length;
    }

setInterval(changeBackground, 5000);
    </script>
