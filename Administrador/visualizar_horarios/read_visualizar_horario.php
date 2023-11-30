<?php
include('../../class/class.php');
$sql="select * from horario";
$res=mysqli_query(Conectar::conec(),$sql);
$horarios = $res->fetch_all(MYSQLI_ASSOC);
?>