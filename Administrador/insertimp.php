<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$alu = new Usuario();
//enviar los datos al metodo insertar
$alu->insertimpa($_REQUEST['id'],$_REQUEST['estado'],$_REQUEST['id_horario']);
?>