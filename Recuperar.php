<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>

    <title>Inicio de sesión</title>
    <link rel="stylesheet" href="Style/estilo.css">
  </head>
  <body>
    <div class="login-box">
        <h2>Recuperar contraseña</h2>
        <form action="Usuario/enviar_email.php" method="POST">
          <div class="user-box">
            <input type="text" name="name" required="">
            <label>Digita tu usuario</label>
          </div>
          <div class="user-box">
            <input type="email" name="email" required="">
            <label>Digita tu email</label>
          </div>
          <a href="#">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <input type="submit" class="btn btn-primary" value="Recuperar contraseña">
          </a>
        </form><br>
        <a align="center" href="Crearusuario.php">¿No tienes cuenta? Crea una aqui.</a><br>
        <a align="center" href="LoginU.php">Ya tengo cuenta.</a>
      </div>
  </body>
</html>