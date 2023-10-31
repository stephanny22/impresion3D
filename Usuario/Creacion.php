<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$usu = new Usuario();
//enviar los datos al metodo insertar
$usu->insertusu($_POST['name'],$_POST['pass'],$_POST['emai']);
?>