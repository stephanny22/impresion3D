<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./sw/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <script type="text/javascript" language="Javascript" src="./js/funciones.js"></script>

    <title>Reestablecer</title>
    <link rel="stylesheet" href="Style/estilo.css">
</head>
<body>
    <div class="login-box">
        <h2>Actualizar contraseña</h2>
        <form action="Usuario/Actualizar_contraseña.php" method="POST">
          <div class="user-box">
            <input type="password" name="new_password">
            <label>Digita tu nueva contraseña</labsel>
          </div>
          <div class="user-box">
            <input type="password" name="confirm_password">
            <label>Confirma tu contraseña</label>
          </div>
          <input type="hidden" name="token" value="<?php echo $_GET['token']; ?>">
            <span></span>
            <span></span>
            <input type="submit" class="btn btn-primary" value="Actualizar contraseña">
          </a>
        </form>
      </div>
  </body>
</html>