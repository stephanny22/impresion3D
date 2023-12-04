<?php
session_start();
include  "../../class/class.php";
$fecha_prestamo = $_POST["fecha_prestamo"];
$hora_inicio = $_POST["hora_inicio"];
$hora_devolucion = $_POST["hora_devolucion"];
$id_impresora = $_POST["id_impresora"];
$nombre_usuario=$_SESSION['usuario'];

$usuario = new Usuario();
$id_usuario = $usuario->get_idusuario($nombre_usuario);

$sql=" INSERT INTO `prestamo`
(`fecha_prestamo`,
`hora_inicio`,
`hora_devolucion`,
`prestado`,
`id_usuario`,
`id_impresora`) 
VALUES 
(
'$fecha_prestamo',
'$hora_inicio',
'$hora_devolucion',
null,
'$id_usuario',
'$id_impresora')";

$res=mysqli_query(Conectar::conec(),$sql);
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Solicitud enviada correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='solicitar_prestamo.php';
    }
});
</script>";
?>