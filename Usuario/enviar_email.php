<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
//conexión BD
include('../class/class.php');

function enviar_email($email, $user, $token) {
    $reset_link = "http://localhost:8080/proyectoIng/reestablecer.php?token=" . $token;
    //Configuracion envio de email (PHPmailer)
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'impresoras3Dudistrital@gmail.com';                     //SMTP username
        $mail->Password   = 'teitqnrpkqsewtcb';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('impresoras3Dudistrital@gmail.com', 'impresoras3DUD');
        $mail->addAddress($email, $user);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Recuperación de Contraseña';
        $mail->Body    = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
        </head>
        <body style="margin: 0;">
            <h1 style="color: rgb(240, 238, 247);
            background-color: #03E9F4;
            display: block;
            border: 1px;
            margin: 0;
            size: 100px;
            font-size: 250%;
            padding: 20px;" class="titulo">
                <span style="border: 1px black; margin: 20px;" class="texto_titulo">Recuperación de contraseña</span>
            </h1>
            <section style="
            background-color: rgb(24, 37, 56);
            color: #E3F8F3;
            margin: 0;
            padding: 50px 0;"
            class="cuerpo_email">
                <p style="        
                font-size: 16px;
                margin: 0;
                padding: 0 40px;
                line-height: 3.5;">Haga clic en el siguiente enlace para restablecer su contraseña:
                    <br>
                    <a href="'. $reset_link .'">localhost:8080/proyectoIng/reestablecer.php</a>
                    <br>
                    Si no ha sido usted el que solicito este cambio de contraseña, 
                    por favor haga caso omiso a este correo.</p>
            </section>
            <footer style="        
            background-color: rgb(17, 27, 40);
            color: #098080;
            padding: 40px;">
                <p>
                    Este email ha sido enviado automáticamente por el equipo de prestamo y capacitación 
                    de impresoras 3D de la Universidad Distrital Francisco José de Caldas. 
                    Por favor no responder a este correo.
                </p>
            </footer>
        </body>
        </html>
        ';
        /*$mail->AltBody = 'Haga clic en el siguiente enlace para restablecer su contraseña:'
        . $reset_link .
        'Si no ha sido usted el que solicito este cambio de contraseña, 
        por favor haga caso omiso a este correo';*/
        $mail->CharSet = 'UTF-8';
        $mail->send();
        echo "<script>
        alert('El email fue enviado correctamente. Por favor revisa tu bandeja de entrada');
        window.history.back();
        </script>";
        } catch (Exception $e) {
            echo "El email no pude ser enviado. Mailer Error: {$mail->ErrorInfo}";
        }
    }
//------------------------------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user = $_POST['name'];
    
    // Verificar si el email y el nombre de usuario existen en la base de datos
    $sql="select * from usuario where nombre='$user' and correo='$email'";
    $res=mysqli_query(Conectar::conec(),$sql);
    //determinar el número de filas
    $row_cnt = $res->num_rows;

    if($row_cnt!=0){             //Generar token
        $token = uniqid(true);
        //Verificar si existe un token para el usuario
        $validar_token=mysqli_query(Conectar::conec(),"select * from restauracion_de_contraseña_token where usuario_email='$email'");
        if($validar_token->num_rows==0){
    
             // Almacenar token en la base de datos
             $mysqli = Conectar::conec();
             $sql_create_token="INSERT INTO `bd_impresoras`.`restauracion_de_contraseña_token`
             (`usuario_email`,`token`,`timestamp`)
             VALUES
             (?,?,NOW())";
             $sentencia=$mysqli->prepare($sql_create_token);
             $sentencia->bind_param("ss", $email, $token);
             $sentencia->execute();
             enviar_email($email, $user, $token);

        }else{
            //Actualizar token
                       $mysqli = Conectar::conec();
                       $sql_update_token="UPDATE `bd_impresoras`.`restauracion_de_contraseña_token`
                       SET
                       `token` = ?
                       WHERE `usuario_email` = ?
                       ";
                       $actualizar_token=$mysqli->prepare($sql_update_token);
                       $actualizar_token->bind_param("ss",$token, $email);
                       $actualizar_token->execute();
                       enviar_email($email, $user, $token);
        }
    }else{
        echo "<script>
            alert('Por favor verifica la información ingresada');
            window.history.back();
        </script>";
    }
}

?>
