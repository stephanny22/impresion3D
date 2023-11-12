<?php
include('../class/class.php');
//crear el objeto de la clase Alumnos
$alu = new Usuario();
//enviar los datos al metodo insertar
$alu->insertusua($_REQUEST['codigo'],$_REQUEST['name'],$_REQUEST['namecon'],$_REQUEST['pass'],$_REQUEST['emai'],$_REQUEST['emains']);
?>