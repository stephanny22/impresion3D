<?php
include('../class/class.php');
$alu= new Usuario();
if(isset($_POST['grabar']) && $_POST['grabar']=="si"){
     $alu->editaru($_POST['name'], $_POST['pass'], $_POST['emai']);
    exit();
}
$reg=$alu->get_idu($_GET['nombre']);
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

    <title>Menu cine</title>
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

            <li class="list__item list__item--click">
                <div class="list__button list__button--click">
                    <img src="../assets//docs.svg" class="list__img">
                    <a href="#" class="nav__link">Usuarios
                    </a>
                    <img src="../assets/arrow.svg" class="list__arrow">
                </div>
                <ul class="list__show">
                    <li class="list__inside">
                        <a href="menuusu.php" class="nav__link nav__link--inside">Gestionar usuario</a>
                    </li>
                </ul>
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
        <div class="container">
        <div class="card">
            <div class="card-header bg-info">
                <h3 class="text-white text-center">GESTION DE ALUMNOS</h3>
            </div>
            <div class="card-body">
                <form name="formü" action="menuusued.php" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="name">NOMBRE</label>
                            <input type="hidden" name="grabar" value="si">
                            <input type="text" name="name" class="form-control" value ="<?php echo $_GET['nombre'];?>">
                        </div>
                        <div class="col-md-6">
                            <label for="pass">CONTRASEÑA</label>
                            <input type="text" name="pass" class="form-control" value="<?php echo $reg[0]['contraseña'];?>">
                        </div>
                        <div class="col-md-6">
                            <label for="email">EMAIL</label>
                            <input type="email" name="emai" class="form-control" value="<?php echo $reg[0]['correo'];?>">
                        </div>
                        <div class="col-md-12">
                            <br>
                            <input type="button" class="btn btn-info" value="VOLVER" onclick="window.location='menuusu.php'">
                            <input type="submit" class="btn btn-primary" value="EDITAR">
                        </div>
                    </div>
                </form>
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