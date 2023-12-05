<?php
session_start();
$inn=500;
if(isset($_SESSION['timeout'])){
    $_session_life = time() - $_SESSION['timeout'];
     if($_session_life > $inn){
        session_destroy();
        header("location:../../LoginA.php");
     }
}
$_SESSION['timeout']=time();

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
    <script type="text/javascript" language="Javascript" src="../../js/funciones.js"></script>

    <title>Visualizar horarios</title>
    <link rel="stylesheet" href="../../Style/estiloMenu.css">
  </head>
  <body>
  <div class="principal">

  <!-- menu de navegacion -->
  <nav class="nav" style="margin-left: -120px;">
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
                        <a href="visualizar_horario.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="../prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="../devoluciones/devolucion.php" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
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

    <div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">GESTION DE HORARIOS</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="insertar_horario.php" method="post">
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
                                    <label for="nom">HORA DE INICIO</label>
                                    <input type="time" name="hora_inicio" class="form-control" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="con">HORA DE FIN</label>
                                    <input type="time" name="hora_fin" class="form-control"required="">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="REGISTRAR HORARIO">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
                    <div class="containersupp"></div>
                    <?php
                    include 'read_visualizar_horario.php';
                    include 'modal_eliminar_horario.php';
                    ?>
                    <div class="table-responsive">
                        <table id="usu" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>DIA</th>
                                    <th>HORA DE INICIO</th>
                                    <th>HORA DE FIN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($horarios as $horario) { ?>


                                <tr>
                                    <td><?php  echo $horario['id']; ?></td>
                                    <td><?php  echo $horario['dia']; ?></td>
                                    <td><?php echo $horario['hora_inicio']; ?></td>
                                    <td><?php echo $horario['hora_fin']; ?></td>
                                    <td align='center'>
                                    <button class='btn btn-warning' onclick=window.location="form_modificar_horario.php?id=<?php echo $horario['id'];?>">
                                    <span class="material-symbols-outlined">edit_square</span>
                                    <a data-bs-toggle="modal" data-bs-target="#eliminarhorariomodal" data-id="=<?php echo $horario['id']?>" href="modal_eliminar_horario.php?id=<?php echo $horario['id'] ?>">
                                    <button data-bs-toggle="modal" data-bs-target="#eliminarhorariomodal" class='btn btn-primary' data-id="=<?php echo $horario['id']?>">    
                                </a>
                                    <span class="material-symbols-outlined">delete_sweep</span>
                                    </td>
                                    
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
  <script type="text/javascript" src="../js/funciones.js"></script>
  <script src="../../js/menu.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="../../sw/dist/sweetalert2.min.js"></script>
    <script src="../../js/jquery-3.6.1.min.js"></script>
            
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
         window.location='../../LoginA.php';
        }
    }); </script>";
}
?>