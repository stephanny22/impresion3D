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

    <title>Horarios</title>
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
                    <img src="../../assets//docs.svg" class="list__img">
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
                        <a href="#" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="../solicitar_prestamo/solicitar_prestamo.php" class="nav__link nav__link--inside">Solicitar<br>prestamo</a>
                    </li>
                    <li class="list__inside">
                        <a href="../devoluciones/devolucion.php" class="nav__link nav__link--inside">Mis devoluciones</a>
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
<div>
  <script src="../../js/menu.js"></script>
<!-- BUSCADOR -->
<div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
  <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">BUSCADOR DE HORARIOS</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="" method="post">
                            <div class="row">

                                <div class="col-md-6">
                                    <label for="nom">DIA</label>
                                    <select name="day" class="form-select" aria-label="Default select example">
                                      <option selected>Selecciona el día</option>
                                      <option value="lunes">Lunes</option>
                                      <option value="martes">Martes</option>
                                      <option value="miercoles">Miércoles</option>
                                      <option value="jueves">Jueves</option>
                                      <option value="viernes">Viernes</option>
                                      <option value="sabado">Sábado</option>
                                      <option value="domingo">Domingo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="nom">IMPRESORA</label>
                                    <input type="number" name="impresora" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="BUSCAR">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>

                <div class="containersupp"></div>
                    <?php
                    include 'buscar_horario.php';
                    ?>
                    <div class="table-responsive mt-5">
                        <table id="usu" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>DIA</th>
                                    <th>ID IMPRESORA</th>
                                    <th>NOMBRE IMPRESORA</th>
                                    <th>HORA DE INICIO</th>
                                    <th>HORA DE FIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($horarios as $horario) { ?>


                                <tr>                                    
                                    <td><?php  echo $horario['dia']; ?></td>
                                    <td><?php  echo $horario['id']; ?></td>
                                    <td><?php  echo $horario['nombre']; ?></td>
                                    <td><?php echo $horario['hora_inicio']; ?></td>
                                    <td><?php echo $horario['hora_fin']; ?></td>
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
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
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
         window.location='../../LoginU.php';
        }
    }); </script>";
}
?>