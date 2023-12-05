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
include('../../class/class.php');
include('read_modificar_devolucion.php');

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
                        <a href="../../menuverpeli.php" class="nav__link nav__link--inside">Videos</a>
                    </li>
                    <li class="list__inside">
                        <a href="../../menuverpeli.php" class="nav__link nav__link--inside">Actividades</a>
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
                        <a href="../prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="devolucion.php" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
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
    <script src="../../js/menu.js"></script>

    <div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">GESTION DE DEVOLUCIONES</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="modificar_devolucion.php" method="post">
                        <?php
                                foreach ($devoluciones as $devolucion) { ?>
                                <input type="hidden" value="<?php  echo $devolucion['id']; ?>" name="id">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="con">ID DE PRESTAMO</label>
                                    <select name="id_prestamo" class="form-select" aria-label="Default select example" required="">
                                      <?php
                                        foreach ($prestamos as $prestamo) { ?>
                                            <option value="<?php  echo $prestamo['id'];?>" <?php echo ($prestamo['id'] == $devolucion['id_prestamo']) ? 'selected' : '';?>><?php  echo $prestamo['id']; ?>-Usuario: <?php  echo $prestamo['id_usuario']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>                                
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="con">BUENAS CONDICIONES</label>
                                    <select name="buenas_condiciones" class="form-select" aria-label="Default select example" required="">
                                      <option>Selecciona un estado</option>
                                      <option value="true" <?php echo ($devolucion['buenas_condiciones'] == 1) ? 'selected' : ''; ?>>Entregado en buenas condiciones</option>
                                      <option value="false" <?php echo ($devolucion['buenas_condiciones'] == 0) ? 'selected' : ''; ?>>No entregado en buenas condiciones</option>
                                    </select>                                </div>
                                    <div class="col-md-6">
                                        <label for="con">DESCRIPCION</label>
                                        <input value="<?php echo $devolucion['descripcion']?>" type="text" name="descripcion" class="form-control" placeholder="INGRESE SU DESCRIPCION">
                                    </div>
                                <div class="col-md-12">
                                    <br>
                                <div class="col-md-12">
                                    <br>
                                    <input type="button" class="btn btn-info" value="VOLVER" onclick="window.location='visualizar_horario.php'">
                                    <input type="submit" class="btn btn-primary" value="EDITAR">
                                </div>                                </div>
                            </div>
                            <?php }?>
                        </form>
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
         window.location='../../LoginA.php';
        }
    }); </script>";
}
?>