<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // include('../../class/class.php');
    // $id=$_GET["id"];
    // $sql="select * from horario where id=" . $id;
    // $res=mysqli_query(Conectar::conec(),$sql);
    // $horarios = $res->fetch_all(MYSQLI_ASSOC);

    // Obtener valores del formulario
    $dia = $_POST['day'];
    $impresora = $_POST['impresora'];
    if (empty($day) && empty($impresora)) {
        $sql = "SELECT  Horario.dia, Impresora.id,Impresora.nombre, Horario.hora_inicio,Horario.hora_fin FROM Impresora
        LEFT JOIN Horario ON Impresora.id_horario = Horario.id";
    } else {
        // Consulta SQL para buscar según los valores del formulario
        $sql = "SELECT  Horario.dia, Impresora.id,Impresora.nombre, Horario.hora_inicio,Horario.hora_fin FROM Impresora
        LEFT JOIN Horario ON Impresora.id_horario = Horario.id
        WHERE Horario.dia = '$dia' AND Impresora.id = '$impresora'";
    }
    $result = mysqli_query(Conectar::conec(),$sql);

    // Mostrar resultados
    if ($result->num_rows > 0) {
    $horarios = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $horarios[] = [
            'dia' => 'No disponible',
            'id' => 'No disponible',
            'nombre' => 'No disponible',
            'hora_inicio' => 'No disponible',
            'hora_fin' => 'No disponible',
        ];
    }
}else{
    $sql = "SELECT  Horario.dia, Impresora.id,Impresora.nombre, Horario.hora_inicio,Horario.hora_fin FROM Impresora
    LEFT JOIN Horario ON Impresora.id_horario = Horario.id";

$result = mysqli_query(Conectar::conec(),$sql);

// Mostrar resultados
if ($result->num_rows > 0) {
$horarios = $result->fetch_all(MYSQLI_ASSOC);
} else {

        $horarios[] = [
            'dia' => 'No disponible',
            'id' => 'No disponible',
            'nombre' => 'No disponible',
            'hora_inicio' => 'No disponible',
            'hora_fin' => 'No disponible',
        ];
}
}
?>