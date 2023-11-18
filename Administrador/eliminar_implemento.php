<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../class/class.php');

$id = $_GET["id"];
$mysqli = Conectar::conec();

$sentencia = $mysqli->prepare("DELETE FROM implemento WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
if(Conectar::conec("DELETE FROM intento_inicio_de_sesion WHERE id = ?")==TRUE){
    echo "<script>
    alert('El implemento fue eliminado correctamente');
    window.history.back();
    </script>";
}

?>