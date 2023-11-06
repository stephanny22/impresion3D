<?php
include('../class/class.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_POST['token'];
    
    // Verificar si las contraseñas coinciden
    if($new_password==$confirm_password){
        // Verificar si el token existe en la base de datos
        $sql="select * from restauracion_de_contraseña_token where token='$token'";
        $res=mysqli_query(Conectar::conec(),$sql);
        //determinar el número de filas
        $row_cnt = $res->num_rows;
        if($row_cnt!=0){    
            // Obtener el email
            $fila = $res->fetch_assoc();
            $usuario_email = $fila["usuario_email"];
            // Actualizar la contraseña en la base de datos
            $mysqli = Conectar::conec();
            $sql_update_password="UPDATE bd_impresoras.usuario
            SET
            contraseña = ?
            WHERE correo = ?;
            ";
            $sentencia=$mysqli->prepare($sql_update_password);
            $sentencia->bind_param("ss",$new_password, $usuario_email);
            $sentencia->execute();

            $eliminar_token = $mysqli->prepare("DELETE FROM bd_impresoras.restauracion_de_contraseña_token
            WHERE token=?");
            $eliminar_token->bind_param("s",$token);
            $eliminar_token->execute();

            echo "<script> alert('Contraseña actualizada con éxito. Ahora puede iniciar sesión con su nueva contraseña.');
            window.location.href = '../LoginU.php';</script>";
        }else{
            echo "<script>
                alert('Algo ha salido mal. Por favor intente realizar el proceso nuevamente.');
                window.history.back();
            </script>";
        }    
    }else{
        echo "<script>
            alert('Las contraseñas no coinciden');
            window.history.back();
        </script>";
    }

}else{
    echo "<script>
        alert('Algo ha salido mal. Por favor intente realizar el proceso nuevamente.');
        window.history.back();
    </script>";
    }
?>