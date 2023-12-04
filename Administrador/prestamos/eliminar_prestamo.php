<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../../class/class.php');

$id = $_GET["id"];
$mysqli = Conectar::conec();

$sentencia = $mysqli->prepare("DELETE FROM prestamo WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
if(Conectar::conec("DELETE FROM intento_inicio_de_sesion WHERE id = ?")==TRUE){
    echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
    echo "
    <script type='text/javascript'>
    Swal.fire({
       icon : 'success',
       title : 'Operacion Exitosa!!',
       text :  'Prestamo eliminado Correctamente'
    }).then((result) => {
        if(result.isConfirmed){
            window.location='prestamo.php';
        }
    });
    </script>";
}

?>