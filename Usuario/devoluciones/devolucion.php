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
include('../../class/class.php');
include('read_devolucion.php');

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
    <script type="text/javascript" language="Javascript" src="../../js/funciones.js"></script>

    <title>DEVOLUCION</title>
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
                        <a href="../solicitar_prestamo/solicitar_prestamo.php" class="nav__link nav__link--inside">Solicitar<br>prestamo</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Mis devoluciones</a>
                    </li>
                </ul>
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

    <div>
        
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                    <div class="containersupp"></div>
                    <h3 class="text-white text-center">MIS DEVOLUCIONES</h3>

                    <div class="table-responsive">
                        <table id="usu" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>ID DE PRESTAMO</th>
                                    <th>BUENAS CONDICIONES</th>
                                    <th>DESCRIPCION</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($devoluciones as $devolucion) { ?>

                                    <tr>
                                    <td><?php  echo $devolucion['id_devolucion']; ?></td>
                                    <td><?php  echo $devolucion['id_prestamo']; ?></td>
                                    <td><?php  echo obtenerEstado($devolucion['buenas_condiciones']); ?></td>
                                    <td><?php echo $devolucion['descripcion']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.10.2/dist/js/bootstrap.min.js"></script>  
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
     text :  ' Debe iniciar Sesion en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='../../LoginU.php';
        }
    }); </script>";
}
?>