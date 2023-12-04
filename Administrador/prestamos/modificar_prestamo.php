<?php
include('../../class/class.php');
$mysqli = Conectar::conec();
$id = $_POST["id"];
$fecha_prestamo = $_POST["fecha_prestamo"];
$hora_inicio = $_POST["hora_inicio"];
$hora_devolucion = $_POST["hora_devolucion"];
$id_impresora = $_POST["id_impresora"];
$prestado = $_POST["prestado"];

// Manejo de valores booleanos y nulos con switch
switch ($prestado) {
    case "true":
        $prestado = 1; // Convertir a 1 para true
        break;
    case "false":
        $prestado = 0; // Convertir a 0 para false
        break;
    case "null":
        $prestado = null; // Dejar como null
        break;
    // Otros casos si es necesario
}

$sentencia = $mysqli->prepare("UPDATE `bd_impresoras`.`prestamo`
SET
`fecha_prestamo` = ?,
`hora_inicio` = ?,
`hora_devolucion` = ?,
`prestado` = ?,
`id_impresora` = ?
WHERE `id` = ?");

$sentencia->bind_param("sssiii", $fecha_prestamo, $hora_inicio, $hora_devolucion, $prestado, $id_impresora, $id);
$sentencia->execute();
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Prestamo editado correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='prestamo.php';
    }
});
</script>";
?>