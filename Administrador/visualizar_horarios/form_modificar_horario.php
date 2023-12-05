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
include "read_modificar_horario.php";
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

    <title>Implementos</title>
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
                    <a href="#" class="nav__link">Usuarios
                    </a>
                    <img src="../../assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="../menuusu.php" class="nav__link nav__link--inside">Gestionar<br>usuario</a>
                    </li>
                    <li class="list__inside">
                        <a href="../menuad.php" class="nav__link nav__link--inside">Gestionar<br>administrador</a>
                    </li>
                </ul>
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
                        <a href="../videos/video.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Actividades</a>
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
                        <a href="../menuimp.php" class="nav__link nav__link--inside">Impresoras</a>
                    </li>
                    <li class="list__inside">
                        <a href="../implementos.php" class="nav__link nav__link--inside">Implementos</a>
                    </li>
                    <li class="list__inside">
                        <a href="visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="../prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="devoluciones/devolucion.php" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
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
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Encuesta</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Certificar</a>
                    </li>
                </ul>
            </li>

            <li class="list__item">
                <div class="list__button">
                    <img src="../../assets//docs.svg" class="list__img">
                    <a href="../../visualizar_intentos.php" class="nav__link">Intentos inicio de sesión</a>
                </div>
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
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">GESTION DE HORARIOS</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="modificar_horario.php" method="post">
                            <div class="row">

                                <?php
                                foreach ($horarios as $horario) { ?>
                                <input type="hidden" value="<?php echo $horario['id'];?>" name="id">
                                
                                <div class="col-md-6">
                                    <label for="nom">DIA</label>
                                    <select name="day" class="form-select" aria-label="Default select example">
                                      <option selected>Selecciona el día</option>
                                      <option value="lunes" <?php echo ($horario['dia'] === 'lunes') ? 'selected' : ''; ?>>Lunes</option>
                                      <option value="martes" <?php echo ($horario['dia'] === 'martes') ? 'selected' : ''; ?>>Martes</option>
                                      <option value="miercoles" <?php echo ($horario['dia'] === 'miercoles') ? 'selected' : ''; ?>>Miércoles</option>
                                      <option value="jueves" <?php echo ($horario['dia'] === 'jueves') ? 'selected' : ''; ?>>Jueves</option>
                                      <option value="viernes" <?php echo ($horario['dia'] === 'viernes') ? 'selected' : ''; ?>>Viernes</option>
                                      <option value="sabado" <?php echo ($horario['dia'] === 'sabado') ? 'selected' : ''; ?>>Sábado</option>
                                      <option value="domingo" <?php echo ($horario['dia'] === 'domingo') ? 'selected' : ''; ?>>Domingo</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="nom">HORA DE INICIO</label>
                                    <input value="<?php echo $horario['hora_inicio'];?>" type="time" name="hora_inicio" class="form-control" placeholder="DIGITE LA DESCRIPCION" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="con">HORA DE FIN</label>
                                    <input value="<?php echo $horario['hora_fin'];?>" type="time" name="hora_fin" class="form-control" placeholder="DIGITE LA CANTIDAD" required="">
                                </div>
                                <?php
                                }
                                ?>
                                <div class="col-md-12">
                                    <br>
                                    <input type="button" class="btn btn-info" value="VOLVER" onclick="window.location='visualizar_horario.php'">
                                    <input type="submit" class="btn btn-primary" value="EDITAR">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
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
}
?>