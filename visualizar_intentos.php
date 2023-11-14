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

    <link rel="icon" type="image/x-icon" href="img/logo propuesta.png">

    <title>Visualizar intentos</title>
</head>
<body>
<!--BARRA DE NAVEGACION-->
<nav class="navbar navbar-expand-lg navbar-light bg-info barra_navegacion">
  <div class="container-fluid">
  <a class="navbar-brand" href="#">
      <img src="img/logo propuesta.png" alt="logo" height="30" class="d-inline-block align-text-top">
      IMPRESION 3D UD
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestionar impresoras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Gestionar usuarios</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Mi cuenta
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#">Mi perfil</a></li>
            <li><a class="dropdown-item" href="#">Configuración</a></li>
            <li><a class="dropdown-item" href="#">Cerrar sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<section class="container">
<!--TABLA-->
<table class="table table-hover table-light mt-5">
<thead class="table bg-info">
<th class="text-center" scope="col" colspan="6">Intentos de inicio de sesión fallidos</th>
  </thead>
<thead class="table bg-secondary">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Usuario</th>
      <th scope="col">direccion IP</th>
      <th scope="col">Exitoso</th>
      <th scope="col" colspan="2">Tiempo</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    include 'Usuario/visualizar_intentos_read.php';
    include 'modal_eliminar_intentos.php';
    foreach ($intentos_pagina as $intento) { ?>
                    <tr>
                        <td><?php echo $contador ?></td>
                        <td><?php echo $intento["nombre_usuario"] ?></td>
                        <td><?php echo $intento["direccion_ip"] ?></td>
                        <td><?php echo $intento["exitoso"] ?></td>
                        <td><?php echo $intento["tiempo"] ?></td>

                        <td>
                            <a data-bs-toggle="modal" data-bs-target="#intentoModal" class="btn btn-danger" data-id="<?php echo $intento["id"] ?>" href="modal_eliminar_intentos.php?id=<?php echo $intento["id"] ?>">Eliminar</a>
                        </td>
                                <?php    $contador++;} ?>
  </tbody>
</table>
<!--PAGINACION-->


    <nav aria-label="...">
  <ul class="pagination pagination-sm justify-content-center">

    <?php for ($i = 1; $i <= $total_paginas; $i++) {
            $pagina_actual = ($i == $pagina) ? "active" : "";
            ?>
        
    <?php echo "<li class='page-item " . $pagina_actual . "'>
        <a class='page-link' href='?pagina=" . $i . "'>" . $i . "</a>
    </li>";?>

    <?php
}
?>  

  </ul>
</nav>
</section>
</body>
</html>