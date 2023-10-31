<?php
include('../class/class_log.php');
//creamos el objeto de la clase Login
$log=new Login();
//traemos los datos del formulario de login
$user=$_REQUEST['name'];
$pass=$_REQUEST['pass'];
$log->validar($user,$pass);
?>