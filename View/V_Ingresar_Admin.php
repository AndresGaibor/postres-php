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
                <!-- <div class="modal-body">
                    <form action="./Model/M_Ingresar_Admin.php" method="post">
                        <label for="">Ingrese el nombre del postre:</label>
                        <br>
                        <input type="text" name="nombre" required pattern="[a-zA-Z ]+" maxlength="50">
                        <br>
                        <label for="">Ingrese el precio:</label>
                        <br>
                        <input type="number" name="precio" min="1.00" required step="0.01" max="50.00">
                        <br>
                        <label for="">Ingrese la cantidad:</label>
                        <br>
                        <input type="number" name="cantidad" required min="1" max="100">
                        <br>
                        <label for="">Ingrese el url de la imagen:</label>
                        <br>
                        <input type="url" name="imagen" required pattern="https://.+">
                        <br>
                        <select name="categoria">
                            <option value="1">Tortas</option>
                            <option value="2">Helado</option>
                            <option value="3">Galleta</option>
                        </select>
                        <br>
                        <input type="submit" value="Agregar">
                    </form>
                </div> -->
                <form action="./Model/M_Ingresar_Admin.php" method="post">
                <div class="modal-body">
                        <label for="">Ingrese el nombre del postre:</label>
                        <br>
                        <input  class="form-control"  type="text" name="nombre" required pattern="[a-zA-Z ]+" maxlength="50">
                        <br>
                        <label for="">Ingrese el precio:</label>
                        <br>
                        <input class="form-control" type="number" name="precio" min="1.00" required step="0.01" max="50.00">
                        <br>
                        <label for="">Ingrese la cantidad:</label>
                        <br>
                        <input  class="form-control"  type="number" name="cantidad" required min="1" max="100">
                        <br>
                        <label for="">Ingrese el url de la imagen:</label>
                        <br>
                        <input class="form-control" type="url" name="imagen" required pattern="https?://.+(\.jpg|\.jpeg|\.png|\.gif)">
                        <br>
                        <label for="">Seleccione la categoria:</label>
                        <select  class="form-control"  name="categoria">
                            <option value="1">Tortas</option>
                            <option value="2">Helado</option>
                            <option value="3">Galleta</option>
                        </select>
                        <br>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="Agregar">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>