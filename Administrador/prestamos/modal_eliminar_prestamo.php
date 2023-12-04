
    <!-- Modal -->
<div class="modal fade" id="eliminarprestamomodal" tabindex="-1" aria-labelledby="examplModalLabel3" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplModalLabel3">Eliminar solicitud de prestamo</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro de que desea eliminar la solicitud de prestamo?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a href="#" id="enlaceEliminarprestamo" type="button" class="btn btn-danger">Eliminar</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Captura el evento cuando se muestra el modal
  document.getElementById('eliminarprestamomodal').addEventListener('show.bs.modal', function (event) {
            // Extrae el ID de los datos del enlace que activó el modal
            var link = event.relatedTarget;
            var id = link.dataset.id;

            // Actualiza el contenido del modal con el ID
            document.getElementById('enlaceEliminarprestamo').href = 'eliminar_prestamo.php?id' + id;
        });
</script>