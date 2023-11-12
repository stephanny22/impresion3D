<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$usu = new Usuario();
//enviar los datos al metodo insertar
$usu->insertusu($_POST['cod'], $_POST['name'], $_POST['namecom'], $_POST['pass'], $_POST['emai'], $_POST['emaiins']);
?>