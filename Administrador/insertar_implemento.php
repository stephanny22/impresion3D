<?php
include  "../class/class.php";
$nombre = $_POST["name"];
$descripcion = $_POST["description"];
$cantidad = $_POST["amount"];

$sql=" INSERT INTO `bd_impresoras`.`implemento`
(`nombre`,
`descripcion`,
`cantidad`)
VALUES
('$nombre',
'$descripcion',
$cantidad)";

$res=mysqli_query(Conectar::conec(),$sql);
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Implemento agregado Correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='implementos.php';
    }
});
</script>";
?>