<?php
session_start();
include('class.php');
class Login{

    public function validar($name,$pass){
        //validar si el usuario existe o no
        $sql="select * from usuario where nombre='$name'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_array($res)){
            $sql1="select * from usuario where nombre='$name' and contraseña='$pass'";
            $res1=mysqli_query(Conectar::conec(),$sql1);
             if($row1=mysqli_fetch_array($res1)){
                //se crea la variable de SESION
                $_SESSION['usuario']=$row1['nombre'];
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'success',
                title : 'BIENVENIDO',
                 text :  ' ".$_SESSION['usuario']." al Sistema'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../Usuario/menua.php';
                    }
                }); </script>";
             }else{
                $_SESSION['usuario']=NULL;
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  ' el usuario $name o password  no son correctos'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../LoginU.php';
                    }
                }); </script>";

             }

        }else{
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  ' el usuario $name no existe en el sistema'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../LoginU.php';
                    }
                }); </script>";

        }
    }
    public function validarc($email){
        //validar si el usuario existe o no
        $sql="select * from usuario where correo='$email'";
        $res=mysqli_query(Conectar::conec(),$sql);
        if($row=mysqli_fetch_array($res)){
            $sql1="select * from usuario where nombre='$name' and contraseña='$pass'";
            $res1=mysqli_query(Conectar::conec(),$sql1);
             if($row1=mysqli_fetch_array($res1)){
                //se crea la variable de SESION
                $_SESSION['usuario']=$row1['nombre'];
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'success',
                title : 'BIENVENIDO',
                 text :  ' ".$_SESSION['usuario']." al Sistema'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../Usuario/menua.php';
                    }
                }); </script>";
             }else{
                $_SESSION['usuario']=NULL;
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  ' el usuario $name o password  no son correctos'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../LoginU.php';
                    }
                }); </script>";
             }

        }else{
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            echo "<script type='text/javascript'>
                 Swal.fire({
                 icon : 'error',
                title : 'ERROR!!',
                 text :  ' el usuario $name no existe en el sistema'
                }).then((result) => {
                     if(result.isConfirmed){
                     window.location='../LoginU.php';
                    }
                }); </script>";

        }
    }
}
?>