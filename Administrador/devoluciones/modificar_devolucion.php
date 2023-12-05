<?php
include('../../class/class.php');
$mysqli = Conectar::conec();
$id = $_POST["id"];
$buenas_condiciones = $_POST["buenas_condiciones"];
$descripcion = $_POST["descripcion"];
$id_prestamo = $_POST["id_prestamo"];

// Manejo de valores booleanos y nulos con switch
switch ($buenas_condiciones) {
    case "true":
        $buenas_condiciones = 1; // Convertir a 1 para true
        break;
    case "false":
        $buenas_condiciones = 0; // Convertir a 0 para false
        break;
}
if (empty($descripcion)){
    $descripcion=null;
}

$sentencia = $mysqli->prepare("UPDATE `bd_impresoras`.`devolucion`
SET
`buenas_condiciones` = ?,
`descripcion` = ?,
`id_prestamo` = ?
WHERE `id` = ?");

$sentencia->bind_param("isii", $buenas_condiciones, $descripcion, $id_prestamo, $id);
$sentencia->execute();
echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
echo "
<script type='text/javascript'>
Swal.fire({
   icon : 'success',
   title : 'Operacion Exitosa!!',
   text :  'Devolucion editada correctamente'
}).then((result) => {
    if(result.isConfirmed){
        window.location='devolucion.php';
    }
});
</script>";
?>