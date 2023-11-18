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
include "read_modificar_implementos.php";
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

    <title>Implementos</title>
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
                        <h3 class="text-white text-center">GESTION DE IMPLEMENTOS</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="modificar_implemento.php" method="post">
                            <div class="row">
                            <!-- <div class="col-md-6">
                                    <label for="nom">ID</label>
                                    <input type="text" name="id_implemento" class="form-control" placeholder="DIGITE EL ID" required="">
                                </div> -->
                                <?php
                                foreach ($implementos as $implemento) { ?>
                                <input type="hidden" value="<?php echo $implemento['id'];?>" name="id">
                                
                                <div class="col-md-6">
                                    <label for="nom">NOMBRE</label>
                                    <input value="<?php echo $implemento['nombre'];?>" type="text" name="name" class="form-control" placeholder="DIGITE EL NOMBRE" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="nom">DESCRIPCION</label>
                                    <input value="<?php echo $implemento['descripcion'];?>" type="text" name="description" class="form-control" placeholder="DIGITE LA DESCRIPCION" required="">
                                </div>
                                <div class="col-md-6">
                                    <label for="con">CANTIDAD</label>
                                    <input value="<?php echo $implemento['cantidad'];?>" type="text" name="amount" class="form-control" placeholder="DIGITE LA CANTIDAD" required="">
                                </div>
                                <?php
                                }
                                ?>
                                <div class="col-md-12">
                                    <br>
                                    <input type="button" class="btn btn-info" value="VOLVER" onclick="window.location='implementos.php'">
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