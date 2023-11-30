<?php
include('../../class/class.php');
$mysqli = Conectar::conec();
$id = $_POST["id"];
$day = $_POST["day"];
$hora_inicio = $_POST["hora_inicio"];
$hora_fin = $_POST["hora_fin"];


$sentencia = $mysqli->prepare("UPDATE `bd_impresoras`.`horario`
SET
`dia` = ?,
`hora_inicio` = ?,
`hora_fin` = ?
WHERE `id` = ?");
$sentencia->bind_param("sssi", $day, $hora_inicio,$hora_fin ,$id);
$sentencia->execute();
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Horario editado correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='visualizar_horario.php';
    }
});
</script>";
?>