<?php
//Inicializar sesión
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: welcome.php");
    exit;
}

require_once "connection.php";

$email = "";
$password = "";
$email_error = "";
$password_error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_error = "Por favor, ingrese el correo electrónico";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_error = "Por favor, ingrese una contraseña";
    } else {
        $password = trim($_POST["password"]);
    }

    //Validación de credenciales
    if (empty($email_error) && empty($password_error)) {
        $sql = "SELECT Id, Usuario, Email, Contrasenia FROM usuarios WHERE Email = ?";

        if ($stmt = mysqli_prepare($con, $sql)) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if (mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
            }

            if (mysqli_stmt_num_rows($stmt) == 1) {
                mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hash);
                if (mysqli_stmt_fetch($stmt)) {
                    if (password_verify($password, $hash)) {
                        session_start();

                        //Almacenamiento de datos en variables de sesión
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["email"] = $email;

                        header("location: welcome.php");
                    } else {
                        $password_error = "La contraseña es incorrecta";
                    }
                }
            }else {
                $email_error = "No se ha encontrado ninguna cuenta con esa dirección de correo electrónico";
            }
        }else{
            echo "UPS! Algo salió mal, intentlo más tarde";
        }
    }
    mysqli_close($con);
}
?>