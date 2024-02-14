    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="container-deregistro mx-auto">
        <h2>Registro de Usuario</h2>
        <form action="./Model/M_IngresoU.php" method="post">
            <label for="nombre">Nombre*</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="apellido">Apellido*</label>
            <input type="text" id="apellido" name="apellido" required>
            <br>
            <label for="Provincia">Provincia*</label>
            <select id="provincia" name="provincia">
                <option value="Escoja una">Escoja una</option>
                <!-- Otras opciones de provincias -->
            </select>
            <br>

            <label for="Ciudad">Ciudad*</label>
            <select id="ciudad" name="ciudad">
                <option value="Escoja una">Escoja una</option>
            </select>
            <br>

            <label for="Calle">Calle Principal*</label>
            <select id="calle" name="calle">
                <option value="Escoja una">Escoja una</option>
            </select>

            <br>
            <label for="email">Email*</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="clave">Clave*</label>
            <input type="password" id="clave" name="clave" required>
            <br>
            <label for="telefono">Teléfono*</label>
            <input type="tel" id="telefono" name="telefono" required>
            <br>
            <input type="submit" name="enviar" value="Registrar">

        </form>
    </div>
