<?php
include('../../class/class.php');
$nombre_usuario = $_SESSION['usuario'];
$usuario = new Usuario();
$id_usuario = $usuario->get_idusuario($nombre_usuario);

/* Se cuenta el número de contenido total*/
$sql1 = "select count(*) as total from contenido"; // Agrega "as total" para dar un alias al resultado

$resultado1 = mysqli_query(Conectar::conec(), $sql1);
$row1 = mysqli_fetch_assoc($resultado1);
$numero_contenido_total = $row1['total'];

/* Se cuenta el número de contenido revisado*/
$sql2 = "select count(*) as revisado from contenido_revisado 
where id_estudiante='$id_usuario'";

$resultado2 = mysqli_query(Conectar::conec(), $sql2);
$row2 = mysqli_fetch_assoc($resultado2);
$numero_contenido_revisado = $row2['revisado'];

$porcentaje = ($numero_contenido_revisado * 100) / $numero_contenido_total;

/*--------------------------TRAER PROMEDIO-------------------- */
$sql3 = "select promedio from estudiante
where id_usuario='$id_usuario'";

$resultado3 = mysqli_query(Conectar::conec(), $sql3);

// Verificar si la consulta fue exitosa
if ($resultado3) {
    // Obtener la fila asociativa
    $fila = mysqli_fetch_assoc($resultado3);

    // Verificar si se obtuvo una fila
    if ($fila) {
        // Acceder al valor del campo "promedio"
        $promedio = $fila['promedio'];
    } else {
        $promedio="No se encontró ninguna nota";
    }
} else {
    echo "Error en la consulta SQL: " . mysqli_error(Conectar::conec());
}

?>