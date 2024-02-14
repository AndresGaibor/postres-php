<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$provincia = isset($_GET['provincia']) ? $_GET['provincia'] : '';

include('./config/config.php');


$sql = "SELECT * FROM provincia";
$resultado = mysqli_query($conexion, $sql);

if ($provincia != '') {
    $sql2 = "SELECT * FROM Ciudad WHERE provincia_id = $provincia";
    $resultado2 = mysqli_query($conexion, $sql2);
} else {
    echo 'No hay provincia seleccionada';
}
?>
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
        <select id="provincia" name="provincia"
         required>
            <option value="">Escoja una</option>
            <?php while ($fila = mysqli_fetch_array($resultado)) { ?>
                <option <?php echo $fila['id'] == $provincia ? 'selected' : '' 
                     ?> value="<?php echo $fila['id']; ?>"><?php echo $fila['nombre_provincia']; ?></option>
            <?php } ?>
            <!-- Otras opciones de provincias -->
        </select>
        <br>

        <label for="Ciudad">Ciudad*</label>
        <select id="ciudad" name="ciudad" required <?php echo $provincia == '' ? 'disabled' : '';?> >
            <option value="">Escoja una</option>
            <?php if($provincia != '') { while ($fila2 = mysqli_fetch_array($resultado2)) { ?>
                <option value="<?php echo $fila2['id']; ?>"><?php echo $fila2['nombre_ciudad']; ?></option>
            <?php }} ?>
        </select>
        <br>

        <label for="Calle">Calle Principal*</label>
        <input id="calle" type="text" name="calle" required />
        <label for="Calle">Calle Secundaria</label>
        <input id="calle" type="text" name="calle2" />

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
<script>
document.getElementById('provincia').addEventListener('change', async function() {
    var provincia = this.value;
    
    // fetch(`./?pagina=crearcuenta&provincia=${provincia}`)
    location.href = `./?pagina=crearcuenta&provincia=${provincia}`;
});
</script>