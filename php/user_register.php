<?php
//Incluir conexión
require_once "connection.php";
//Definición de variables
$fullmane = "";
$username = "";
$email = "";
$password = "";
$fullname_error = "";
$username_error = "";
$email_error= "";
$password_error= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty (trim($_POST["fullname"]))) {
        $fullname_error ="Introduzca su nombre completo";
    }
}
?>