<?php
session_start();
$inn=500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:../../LoginU.php");
     }
}
$_SESSION['timeout']=time();
include("calculos_estadisticas.php");
if($_SESSION['usuario']){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>

    <title>Solicitar prestamo</title>
    <link rel="stylesheet" href="../../Style/estiloMenu.css">
  </head>
  <body>
<div class="principal">
<nav class="nav">
        <ul class="list">

            <li class="list__item">
                <div class="list__button">
                    <img src="../../assets/dashboard.svg" class="list__img">
                    <a href="../menua.php" class="nav__link">Inicio</a>
                </div>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../../assets/docs.svg" class="list__img">
                    <a href="#" class="nav__link">Contenido <br> tematico
                    </a>
                    <img src="../../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../../Administrador/contenido_tematico/contenido_tematico.php" class="nav__link nav__link--inside">Contenido <br> temático</a>
                    </li>
                    <li class="list__inside">
                        <a href="../../Administrador/videos/video.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="../menuactivi.php" class="nav__link nav__link--inside">Actividades</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Uso de<br>Impresoras
                    </a>
                    <img src="../../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../visualizar_horario/visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Solicitar<br>prestamo</a>
                    </li>
                    <li class="list__inside">
                        <a href="../devoluciones/devolucion.php" class="nav__link nav__link--inside">Mis devoluciones</a>
                    </li>
                </ul>
            </li>
            <li class="list__item">
                <div class="list__button">
                    <img src="../../assets/graph-fill.svg" class="list__img">
                    <a href="#" class="nav__link">Estadísticas</a>
                </div>
            </li>
            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Prueba
                    </a>
                    <img src="../../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../menuencuesta.php" class="nav__link nav__link--inside">Encuesta</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Certificar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../../assets/perfil.svg" class="list__img">
                    <a href="#" class="nav__link">Perfil</a>
                    <img src="../../assets/arrow.svg" class="list__arrow">
                </div>

                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../../salir.php" class="nav__link nav__link--inside">Cerrar Sesion</a>
                    </li>
                </ul>

            </li>

        </ul>
    </nav>
  <script src="../../js/menu.js"></script>
<!-- FORMULARIO -->
<div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container">
            <div class="card w-50 mt-4">
              <div class="card-body">
                <h5 class="card-title">Barra de progreso</h5>
                <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: <?php echo ($porcentaje)?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo ($porcentaje)?>%</div>
                </div>
              </div>
            </div>
            
            <div class="card w-50 mt-4">
              <div class="card-body">
                <h5 class="card-title">Promedio</h5>
                <p class="card-text"><?php echo $promedio?></p>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>

<!-- -->
<script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../sw/dist/sweetalert2.min.js"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.10.2/dist/js/bootstrap.min.js"></script>  </body>
</html>
<?php
}else{
    $_SESSION['usuario']=NULL;
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "<script type='text/javascript'>
     Swal.fire({
     icon : 'error',
    title : 'ERROR!!',
     text :  ' Debe iniciar Sesion en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='../../LoginU.php';
        }
    }); </script>";
}
?>