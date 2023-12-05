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
include('read_devolucion.php');
include 'modal_eliminar_devolucion.php';

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
                    <img src="../../assets/docs.svg" class="list__img">
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
                        <a href="../prestamos/prestamo.php" class="nav__link nav__link--inside">Prestamos</a>
                    </li>
                    <li class="list__inside">
                        <a href="#" class="nav__link nav__link--inside">Devoluciones<br><br><br>administrar</a>
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

    <div>
        <div class="containersupp2"></div>
        <div class="containersupp"></div>
            <div class="container" >
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white text-center">GESTION DE DEVOLUCIONES</h3>
                    </div>
                    <div class="card-body">
                        <form name="formu" action="insertar_devolucion.php" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="con">ID DE PRESTAMO</label>
                                    <select name="id_prestamo" class="form-select" aria-label="Default select example" required="">
                                      <option selected>Selecciona el prestamo</option>
                                      <?php
                                        foreach ($prestamos as $prestamo) { ?>
                                            <option value="<?php  echo $prestamo['id']; ?>"><?php  echo $prestamo['id']; ?>-Usuario: <?php  echo $prestamo['id_usuario']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>                                
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="con">BUENAS CONDICIONES</label>
                                    <select name="buenas_condiciones" class="form-select" aria-label="Default select example" required="">
                                      <option>Selecciona un estado</option>
                                      <option value="true">Entregado en buenas condiciones</option>
                                      <option value="false">No entregado en buenas condiciones</option>
                                    </select>                                </div>
                                    <div class="col-md-6">
                                        <label for="con">DESCRIPCION</label>
                                        <input type="text" name="descripcion" class="form-control" placeholder="INGRESE SU DESCRIPCION">
                                    </div>
                                <div class="col-md-12">
                                    <br>
                                    <input type="submit" class="btn btn-primary" value="REGISTRAR DEVOLUCION">
                                </div>
                            </div>
                        </form>
                    </div> 
                </div>
                    <div class="containersupp"></div>
                    <?php

                    ?>
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
                                    <td><?php  echo $devolucion['id']; ?></td>
                                    <td><?php  echo $devolucion['id_prestamo']; ?></td>
                                    <td><?php  echo obtenerEstado($devolucion['buenas_condiciones']); ?></td>
                                    <td><?php echo $devolucion['descripcion']; ?></td>
                                    <?php  if ($devoluciones[0]['id'] !== 'No hay registros'){?>
                                        <td align='center'>
                                        <button class='btn btn-warning' onclick=window.location="form_modificar_devolucion.php?id=<?php echo $devolucion['id'];?>">
                                        <span class="material-symbols-outlined">edit_square</span>
                                        <a data-bs-toggle="modal" data-bs-target="#eliminardevolucionmodal" data-id="=<?php echo $devolucion['id']?>" href="modal_eliminar_devolucion.php?id=<?php echo $devolucion['id'] ?>">
                                        <button data-bs-toggle="modal" data-bs-target="#eliminardevolucionmodal" class='btn btn-primary' data-id="=<?php echo $devolucion['id']?>">    
                                        </a>
                                        <span class="material-symbols-outlined">delete_sweep</span>
                                        </td>
                                    <?php } ?>
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
         window.location='../../LoginA.php';
        }
    }); </script>";
}
?>