<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../../class/class.php');
$id=$_GET["id"];
$sql="select * from horario where id=" . $id;
$res=mysqli_query(Conectar::conec(),$sql);
$horarios = $res->fetch_all(MYSQLI_ASSOC);
?>