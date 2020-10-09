<?php
include "application/register_be.php";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <title>Registro Prueba</title>
  <link rel="stylesheet" href="assets/css/styles.css" />
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
</head>

<body>
  <div class="container-all">
    <!--Inicio del formulario-->
    <div class="container-form">
      <h1 class="title">Registrate</h1>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <!--Inputs-->
        <label for="">Nombre de Usuario</label>
        <input type="text" name="username"/>
        <span class="msg-error"><?php echo $username_error;?></span>
        <label for="">Email</label>
        <input type="text" name="email"/>
        <span class="msg-error"><?php echo $email_error;?></span>
        <label for="">Constraseña</label>
        <input type="password" name="password"/>
        <span class="msg-error"><?php echo $password_error;?></span>
        <!--Botón-->
        <input type="submit" value="Registrarse" />
        <span class="msg-error" id="msg_error"></span>
      </form>
      <!--Mensaje inferior-->
      <span class="text-footer">¿Ya te has registrado?<a href="index.php">Inicia sesión aquí</a></span>
    </div>
    <!--Contenedor de imagen-->
    <div class="container-image"></div>
  </div>
</body>

</html>