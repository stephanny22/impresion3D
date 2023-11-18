<?php
include('../class/class.php');
$sql="select * from  implemento";
$res=mysqli_query(Conectar::conec(),$sql);
$implementos = $res->fetch_all(MYSQLI_ASSOC);
?>