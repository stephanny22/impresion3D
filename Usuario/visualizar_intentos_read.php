<?php
include('class/class.php');
$sql="select * from  intento_inicio_de_sesion";
$res=mysqli_query(Conectar::conec(),$sql);
$intentos = $res->fetch_all(MYSQLI_ASSOC);

// Numero de datos
$row_cnt = $res->num_rows;

// Número de elementos por página
$elementos_por_pagina = 5;

// Página predeterminada si no se especifica ninguna
$pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

// Calcular el índice inicial y final de los elementos a mostrar en esta página
$indice_inicial = ($pagina - 1) * $elementos_por_pagina;
$indice_final = $indice_inicial + $elementos_por_pagina;
// Elementos a mostrar en esta página
$intentos_pagina = array_slice($intentos, $indice_inicial, $elementos_por_pagina);
$contador = $indice_inicial+1;
// Crear enlaces para cambiar entre páginas
$total_paginas = ceil($row_cnt/ $elementos_por_pagina);
?>