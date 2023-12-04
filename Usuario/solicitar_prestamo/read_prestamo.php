<?php
include('../../classa/class.php');
$nombre=$_SESSION['usuario'];
$sql="select * from prestamo 
inner join usuario 
on prestamo.id_usuario=usuario.codigo
where usuario.nombre='$nombre'";
$result=mysqli_query(Conectar::conec(),$sql);
if ($result->num_rows > 0) {
$prestamos = $result->fetch_all(MYSQLI_ASSOC);
}else{
    $prestamos[] = [
        'id' => 'No hay registros',
        'fecha_prestamo' => 'No hay registros',
        'prestado' => 'No hay registros',
        'hora_inicio' => 'No hay registros',
        'hora_devolucion' => 'No hay registros',
        'id_impresora' => 'No hay registros'
    ];
}
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