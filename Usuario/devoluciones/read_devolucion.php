<?php
$nombre=$_SESSION['usuario'];
$sql="select devolucion.id as id_devolucion,
devolucion.id_prestamo,
devolucion.buenas_condiciones,
devolucion.descripcion
 from devolucion
 inner join prestamo
 on devolucion.id_prestamo=prestamo.id
 inner join usuario
 on prestamo.id_usuario=usuario.codigo
 where usuario.nombre='$nombre'";

$result=mysqli_query(Conectar::conec(),$sql);
if ($result->num_rows > 0) {
$devoluciones = $result->fetch_all(MYSQLI_ASSOC);
}else{
    $devoluciones[] = [
        'id_devolucion' => 'No hay registros',
        'id_prestamo' => 'No hay registros',
        'buenas_condiciones' => 'No hay registros',
        'descripcion' => 'No hay registros',
    ];
}

// Función para obtener el estado
function obtenerEstado($condiciones)
{
    if ($condiciones != 'No hay registros'){
        switch ($condiciones) {
            case true:
                return 'Entregado en buenas condiciones';
                break;
            case false:
                return 'No entregado en buenas condiciones';
                break;
        }
    }else{
        return 'No hay registros';
    }
}
?>