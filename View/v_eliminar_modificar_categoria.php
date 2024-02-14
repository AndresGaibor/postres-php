
    <div class="container mt-5">
        <h1 class="text-center">Categoria</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php include("./Model/editar_mostrar_categoria.php"); ?>
            </tbody>
        </table>
    </div>

    <!-- Modal Modificar -->
    <div class="modal fade" id="modalModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modificar Categoría</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="modalModificarBody">
                    <!-- Aquí se mostrará el formulario de modificación -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <!-- Aquí podrías tener un botón de "Guardar Cambios" -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- Script personalizado -->
    <script>
        // Función para cargar los datos de la categoría en la ventana modal de modificación
        function cargarDatosModificar(id) {
            // Aquí puedes hacer una solicitud AJAX para obtener los datos de la categoría con el ID especificado
            // y luego cargar los datos en el cuerpo de la ventana modal
            // Por simplicidad, supondré que ya tienes los datos y solo los mostraré en un formulario de ejemplo
            var datosCategoria = {
                id: id, // Aquí podrías pasar el ID de la categoría para cargar los datos correspondientes
                nombre: "Nombre de la categoría", // Ejemplo de nombre de categoría
                descripcion: "Descripción de la categoría" // Ejemplo de descripción de categoría
            };

            // Construir el formulario de modificación con los datos obtenidos
            var formularioModificar = `
                <form>
                    <div class="form-group">
                        <label for="nombreCategoria">Nombre</label>
                        <input type="text" class="form-control" id="nombreCategoria" value="${datosCategoria.nombre}">
                    </div>
                    <div class="form-group">
                        <label for="descripcionCategoria">Descripción</label>
                        <textarea class="form-control" id="descripcionCategoria" rows="3">${datosCategoria.descripcion}</textarea>
                    </div>
                    <!-- Puedes agregar más campos del formulario si es necesario -->
                </form>
            `;

            // Insertar el formulario en el cuerpo de la ventana modal
            document.getElementById("modalModificarBody").innerHTML = formularioModificar;
        }
    </script>
