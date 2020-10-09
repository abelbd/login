<?php
session_start();

if (isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <title>Página de bienvenida</title>
    <link rel="stylesheet" href="assets/css/styles.css" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
  </head>

  <body>
    <div class="container-welcome">
      <h1 class="title-welcome">Bienvenido!</h1>
      <a href="application/logout.php" class="logout">Cerrar Sesión</a>
    </div>
  </body>
</html>
