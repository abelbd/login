<?php
//Incluir conexión
require_once "application/connection.php";
//Definición de variables
$username = "";
$email = "";
$password = "";
$username_error = "";
$email_error = "";
$password_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Validación de Input de Usuario
    if (empty(trim($_POST["username"]))) {
        $username_error = "Por favor, ingrese un nombre de usuario";
    } else {
        //Declaración de Select
        $sql = "SELECT Id FROM usuarios WHERE Usuario = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = trim($_POST["username"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $username_error = "Este nombre de usuario ya está en uso";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else {
                echo "Ups! =( Algo salió mal, intentalo más tarde";
            }
        }
    }

    //Validación de Input de Email
    if (empty(trim($_POST["email"]))) {
        $email_error = "Por favor, ingrese su dirección de email";
    } else {
        //Declaración de Select
        $sql = "SELECT Id FROM usuarios WHERE Email = ?";
        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = trim($_POST["email"]);
            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if (mysqli_stmt_num_rows($stmt) == 1) {
                    $email_error = "Esta dirección de email ya está en uso";
                } else {
                    $email = trim($_POST["email"]);
                }
            } else {
                echo "Ups! =( Algo salió mal, intentalo más tarde";
            }
        }
    }

    //Validación de contraseña
    if (empty(trim($_POST["password"]))) {
        $password_error = "Por favor, ingrese una contraseña";
    }elseif (strlen(trim($_POST["password"])) < 4) {
        $password_error = "La contraseña debe de tener al menos 4 caracteres";
    }else{
        $password = trim($_POST["password"]);
    }

    //Comrpobar Inputs antes de insertar datos en la DB
    if (empty($username_error) && empty($email_error) && empty($password_error)) {
        $sql = "INSERT INTO usuarios (Usuario, Email, Contrasenia) VALUES(?, ?, ?)";
        if($stmt = mysqli_prepare($con, $sql)){
            mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

            //Establecimiento de parametros
            $param_username = $username;
            $param_email = $email;
            //Encriptar contraseña
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if (mysqli_stmt_execute($stmt)) {
                header("Location: index.php");
            }else {
                echo "Ups! =( Algo salió mal, intentalo más tarde";
            }
        }
    }
    mysqli_close($con);
}
