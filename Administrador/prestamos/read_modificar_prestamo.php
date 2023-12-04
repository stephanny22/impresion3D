<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
include('../../classa/class.php');
$id=$_GET["id"];
echo $id;
$sql="select * from prestamo 
inner join usuario 
on prestamo.id_usuario=usuario.codigo
where prestamo.id=$id";
$result=mysqli_query(Conectar::conec(),$sql);
$prestamos = $result->fetch_all(MYSQLI_ASSOC);
/*------------------------------CONSULTA IMPRESORAS-------------------------------------*/

$sql="select impresora.id, impresora.nombre from impresora";
$res=mysqli_query(Conectar::conec(),$sql);
$impresoras = $res->fetch_all(MYSQLI_ASSOC);

// Función para obtener el estado "prestada" o "no prestada"
function obtenerEstado($prestado)
{
    if ($prestado != 'No hay registros'){
        switch ($prestado) {
            case true:
                return 'Prestada';
                break;
            case null:
                return 'En espera';
                break;
            case false:
                return 'No Prestada';
                break;
        }
    }else{
        return 'No hay registros';
    }
}
?>