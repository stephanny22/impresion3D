<?php
session_start();
$inn=500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:../LoginA.php");
     }
}
$_SESSION['timeout']=time();
if($_SESSION['administrador']){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <script type="text/javascript" language="Javascript" src="js/funciones.js"></script>

    <link rel="stylesheet" href="Style/estiloMenu.css">

    <link rel="icon" type="image/x-icon" href="img/logo propuesta.png">

    <title>Visualizar intentos</title>
</head>
<body>
<!--MENU DE NAVEGACIÓN-->
<title>Menu impresion 3D</title>
    <link rel="stylesheet" href="Style/estiloMenu.css">
  </head>
  <body class="inicio">
  <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="assets/dashboard.svg" class="list__img">
                    <a href="Administrador/menua.php" class="nav__link">Inicio</a>
                    
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Usuarios
                    </a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="Administrador/menuusu.php" class="nav__link nav__link--inside">Gestionar<br>usuario</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/menuad.php" class="nav__link nav__link--inside">Gestionar<br>administrador</a>
                    </li>
                </ul>
            </li>
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Contenido <br> tematico
                    </a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="Administrador/contenido_tematico/contenido_tematico.php" class="nav__link nav__link--inside">Contenido <br> tematico</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/videos/video.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/menumodactivi.php" class="nav__link nav__link--inside">Actividades</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Uso de<br>Impresoras
                    </a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="Administrador/menuimp.php" class="nav__link nav__link--inside">Impresoras</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/implementos.php" class="nav__link nav__link--inside">Implementos</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/visualizar_horarios/visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="Administrador/devoluciones/devolucion.php" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Prueba
                    </a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="Administrador/menumodencuesta.php" class="nav__link nav__link--inside">Encuesta</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Certificar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="assets//docs.svg" class="list__img">
                    <a href="visualizar_intentos.php" class="nav__link">Intentos inicio de sesión</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="assets/perfil.svg" class="list__img">
                    <a href="#" class="nav__link">Perfil</a>
                    <img src="assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="salir.php" class="nav__link nav__link--inside">Cerrar Sesion</a>
                    </li>
                </ul>

            </li>

        </ul>
    </nav>
    <script src="js/menu.js"></script>

<!-- <nav class="navbar navbar-expand-lg navbar-light bg-info barra_navegacion">
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
<section class="container"> -->
<!--TABLA-->
<div class="container mt-5" style="width: 73%;">
  <table class="table table-hover table-light table-sm">
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

                          <td class="col-sm">
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
</div>
</section>

</body>
</html>
<?php
}else{
    $_SESSION['usuario']=NULL;
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script type='text/javascript'>
     Swal.fire({
     icon : 'error',
    title : 'ERROR!!',
     text :  ' Debe iniciar Session en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='../LoginA.php';
        }
    }); </script>";
}?>