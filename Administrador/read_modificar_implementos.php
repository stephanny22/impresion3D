<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../class/class.php');
$id=$_GET["id"];
$sql="select * from  implemento where id=" . $id;
$res=mysqli_query(Conectar::conec(),$sql);
$implementos = $res->fetch_all(MYSQLI_ASSOC);
?>