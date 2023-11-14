<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$alu = new Usuario();
//enviar los datos al metodo insertar
$alu->insertada($_REQUEST['name'],$_REQUEST['pass'],);
?>