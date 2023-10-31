<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$alu = new Usuario();
//enviar los datos al metodo insertar
$alu->insertusua($_REQUEST['name'],$_REQUEST['pass'],$_REQUEST['emai']);
?>