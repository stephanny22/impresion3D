<?php
include  "../../class/class.php";
$day = $_POST["day"];
$hora_inicio = $_POST["hora_inicio"];
$hora_fin = $_POST["hora_fin"];

$sql=" INSERT INTO `bd_impresoras`.`horario`
(`dia`,
`hora_inicio`,
`hora_fin`)
VALUES
('$day',
'$hora_inicio',
'$hora_fin')";

$res=mysqli_query(Conectar::conec(),$sql);
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Horario agregado Correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='visualizar_horario.php';
    }
});
</script>";
?>