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
include('../classa/class.php');
if($_SESSION['administrador']){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>

    <title>Menu administrador</title>
    <link rel="stylesheet" href="../Style/estiloMenu.css">
  </head>
  <body class="inicio">
  <nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="../assets/dashboard.svg" class="list__img">
                    <a href="menua.php" class="nav__link">Inicio</a>
                    
                </div>
            </li>

            <!--
            <li class="list__item list__item--click">
              <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Peliculas
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="menumodpeli.php" class="nav__link nav__link--inside">Modificar pelicula</a>
                    </li>
                    <li class="list__inside">
                        <a href="menumodhor.php" class="nav__link nav__link--inside">Modificar horario</a>
                    </li>
                    <li class="list__inside">
                        <a href="menumodcine.php" class="nav__link nav__link--inside">Modificar cine</a>
                    </li>
                </ul>
            </li> 
            -->

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Usuarios
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="menuusu.php" class="nav__link nav__link--inside">Gestionar<br>usuario</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuad.php" class="nav__link nav__link--inside">Gestionar<br>administrador</a>
                    </li>
                </ul>
            </li>
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Contenido <br> tematico
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                <li class="list__inside">
                        <a href="contenido_tematico/contenido_tematico.php" class="nav__link nav__link--inside">Contenido <br> tematico</a>
                    </li>
                    <li class="list__inside">
                        <a href="videos/video.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Actividades</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Uso de<br>Impresoras
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                <li class="list__inside">
                        <a href="menuimp.php" class="nav__link nav__link--inside">Impresoras</a>
                    </li>
                    <li class="list__inside">
                        <a href="implementos.php" class="nav__link nav__link--inside">Implementos</a>
                    </li>
                    <li class="list__inside">
                        <a href="visualizar_horarios/visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="devoluciones/devolucion.php" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Prueba
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Encuesta</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Certificar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="../visualizar_intentos.php" class="nav__link">Intentos inicio de sesión</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets/perfil.svg" class="list__img">
                    <a href="#" class="nav__link">Perfil</a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../salir.php" class="nav__link nav__link--inside">Cerrar Sesion</a>
                    </li>
                </ul>

            </li>

        </ul>
    </nav>
  <script src="../js/menu.js"></script>
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
         window.location='./LoginA.php';
        }
    }); </script>";
}
?>