<div class="container">
        <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary w-auto" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Postre
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Ingresar un nuevo postre</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="./Model/M_Ingresar_Admin.php" method="post">
                <label for="">Ingrese el nombre del postre:</label>
                <br>
                <input type="text" name="nombre">
                <br>
                <label for="">Ingrese el precio:</label>
                <br>
                <input type="number" name="precio" min="0.00">
                <br>
                <label for="">Ingrese la cantidad:</label>
                <br>
                <input type="number" name="cantidad">
                <br>
                <label for="">Ingrese el url de la imagen:</label>
                <br>
                <input type="text" name="imagen">
                <br>
                <input type="submit" value="Agregar">
            </form>
        </div>
        </div>
    </div>
    </div>
</div>