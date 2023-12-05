<?php
$sql="select * from devolucion";
$result=mysqli_query(Conectar::conec(),$sql);
if ($result->num_rows > 0) {
$devoluciones = $result->fetch_all(MYSQLI_ASSOC);
}else{
    $devoluciones[] = [
        'id' => 'No hay registros',
        'id_prestamo' => 'No hay registros',
        'buenas_condiciones' => 'No hay registros',
        'descripcion' => 'No hay registros',
    ];
}

/*------------------------------CONSULTA prestamo-------------------------------------*/

$sql="select prestamo.id, prestamo.id_usuario from prestamo";
$res=mysqli_query(Conectar::conec(),$sql);
$prestamos = $res->fetch_all(MYSQLI_ASSOC);


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