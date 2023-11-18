<?php
include('../class/class.php');
$mysqli = Conectar::conec();
$id = $_POST["id"];
$nombre = $_POST["name"];
$descripcion = $_POST["description"];
$cantidad = $_POST["amount"];


$sentencia = $mysqli->prepare("UPDATE `bd_impresoras`.`implemento`
SET
`nombre` = ?,
`descripcion` = ?,
`cantidad` = ?
WHERE `id` = ?");
$sentencia->bind_param("ssii", $nombre, $descripcion,$cantidad ,$id);
$sentencia->execute();
header("Location: implementos.php");
?>