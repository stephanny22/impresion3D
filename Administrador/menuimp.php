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
include('../class/class.php');
if($_SESSION['administrador']){
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="../js/funciones.js"></script>

    <title>Menu impresion 3D</title>
    <link rel="stylesheet" href="../Style/estiloMenu.css">
  </head>
  <body>
<div class="principal">
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
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Videos</a>
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
                        <a href="menuimp.php" class="nav__link nav__link--inside">Gestionar<br>impresoras</a>
                    </li>
                    <li class="list__inside">
                        <a href="implementos.php" class="nav__link nav__link--inside">Implementos</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Horarios</a>
                    </li>
                    <li class="list__inside">
                        <a href="menuverpeli.php" class="nav__link nav__link--inside">Solicitud de<br>prestamo</a>
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
    <div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">GESTION DE IMPRESORAS</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="insertimp.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="nom">ID</label>
                                    <input type="number" name="id" class="form-control" placeholder="DIGITE EL ID" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="con">ESTADO</label>
                                    <input type="text" name="estado" class="form-control" placeholder="DIGITE EL ESTADO" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="con">HORARIO</label>
                                    <input type="number" name="id_horario" class="form-control" placeholder="DIGITE LA HORARIO" required="">
                                </div>
                                <div class="col-md-12">
                                    <br>
                                    <input type="button" class="btn btn-primary" value="REGISTRAR IMPRESORA" onclick="validarf()">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
                    <div class="containersupp"></div>
                    <?php
                    //crear el objeto de la clas Alumnos
                    $alu = new Usuario();
                    $reg=$alu->verimp();
                    ?>
                    <div class="table-responsive">
                        <table id="usu" class="table table-bordered table-striped">
                            <thead>
                                <tr align="center">
                                    <th>ID</th>
                                    <th>ESTADO</th>
                                    <th>HORARIO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                for($i=0;$i<count($reg);$i++){

                                echo "<tr>
                                    <td>".$reg[$i]['id']."</td>
                                    <td>".$reg[$i]['estado']."</td>
                                    <td>".$reg[$i]['id_horario']."</td>";
                                    ?>
                                    <td align='center'>
                                    <button class='btn btn-warning' onclick=window.location="menuimped.php?id=<?php echo $reg[$i]['id'];?>">
                                    <span class="material-symbols-outlined">edit_square</span>
                                    <button class='btn btn-primary' onclick="eliminar('eliminarimp.php?id=<?php echo $reg[$i]['id'];?>')">
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
  <script src="../js/menu.js"></script>
  <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>-->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../sw/dist/sweetalert2.min.js"></script>
    <script src="../js/jquery-3.6.1.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
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