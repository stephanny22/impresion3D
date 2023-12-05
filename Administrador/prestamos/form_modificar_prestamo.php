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
include 'read_modificar_prestamo.php';
if($_SESSION['administrador']){
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
<nav class="nav" style="margin-top: -20px;">
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
                        <a href="../contenido_tematico/contenido_tematico.php" class="nav__link nav__link--inside">Contenido <br> tematico</a>
                    </li>
                    <li class="list__inside">
                        <a href="../videos/video.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="../menumodactivi.php" class="nav__link nav__link--inside">Actividades</a>
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
                        <a href="../visualizar_horarios/visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="prestamo.php" class="nav__link nav__link--inside">Prestamo</a>
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
                        <a href="../menumodencuesta.php" class="nav__link nav__link--inside">Encuesta</a>
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

  <script src="../../js/menu.js"></script>
<!-- FORMULARIO -->
<div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container">
                <h3 class="text-white text-center">SOLICITUDES DE PRESTAMO</h3>

                    <div class="table-responsive">
                        <form action="modificar_prestamo.php" method="post">
                        <table id="usu" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>NOMBRE USUARIO</th>
                                    <th>FECHA DE PRESTAMO</th>
                                    <th>HORA INICIO</th>
                                    <th>HORA DEVOLUCION</th>
                                    <th>PRESTADO</th>
                                    <th>IMPRESORA</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($prestamos as $prestamo) { ?>
                                    <tr>
                                    <input type="hidden" value="<?php  echo $prestamo['id']; ?>" name="id">
                                    <td><?php  echo $prestamo['nombre']; ?></td>
                                    <td><input value="<?php echo $prestamo['fecha_prestamo'];?>" type="date" name="fecha_prestamo" class="form-control"></td>
                                    <td><input value="<?php echo $prestamo['hora_inicio'];?>" type="time" name="hora_inicio" class="form-control"></td>
                                    <td><input value="<?php echo $prestamo['hora_devolucion'];?>" type="time" name="hora_devolucion" class="form-control"></td>
                                    <td>
                                    <select name="prestado" class="form-select" aria-label="Default select example">
                                      <option value="true" <?php echo ($prestamo['prestado'] == 1) ? 'selected' : ''; ?>>Prestada</option>
                                      <option value="false" <?php echo ($prestamo['prestado'] == 0) ? 'selected' : ''; ?>>No Prestada</option>
                                      <option value="null" <?php echo ($prestamo['prestado'] === null) ? 'selected' : ''; ?>>En espera</option>
                                    </select>
                                    <td><select name="id_impresora" class="form-select" aria-label="Default select example">
                                      <?php
                                        foreach ($impresoras as $impresora) { ?>
                                            <option value="<?php  echo $impresora['id']; ?>" <?php  echo ($impresora['id']===$prestamo['id_impresora'])? 'selected' : ''; ?>><?php  echo $impresora['id']; ?>-<?php  echo $impresora['nombre']; ?></option>
                                        <?php
                                        }
                                        ?>
                                        </select>
                                    </td>
                                    <td><button type="button" class="btn btn-secondary" onclick="window.location='prestamo.php'">Volver</button></td>
                                    <td><button type="submit" class="btn btn-primary">Editar</button></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        </form>
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
     text :  ' Debe iniciar Session en el Sistema'
    }).then((result) => {
         if(result.isConfirmed){
         window.location='../../LoginU.php';
        }
    }); </script>";
}
?>