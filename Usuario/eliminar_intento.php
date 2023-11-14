<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../class/class.php');

$id = $_GET["id"];
$mysqli = Conectar::conec();

$sentencia = $mysqli->prepare("DELETE FROM intento_inicio_de_sesion WHERE id = ?");
$sentencia->bind_param("i", $id);
$sentencia->execute();
header("Location: ../visualizar_intentos.php");
?>