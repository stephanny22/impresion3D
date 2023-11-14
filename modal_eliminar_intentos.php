<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <link rel="stylesheet" href="Style/estilo.css">

    <title>Modal</title>
</head>
<body>
    <!-- Modal -->
<div class="modal fade" id="intentoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Eliminar intento</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Esta seguro de que desea eliminar el registro?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <a href="#" id="enlaceEliminarIntento" type="button" class="btn btn-danger" href="#">Eliminar</a>
      </div>
    </div>
  </div>
</div>

<script>
  // Captura el evento cuando se muestra el modal
  $('#intentoModal').on('show.bs.modal', function (event) {
    // Extrae el ID de los datos del enlace que activó el modal
    var link = $(event.relatedTarget);
    var id = link.data('id');

    // Actualiza el contenido del modal con el ID
    $('#enlaceEliminarIntento').attr('href', 'Usuario/eliminar_intento.php?id=' + id);
  });
</script>
</body>
</html>
<?php
?>