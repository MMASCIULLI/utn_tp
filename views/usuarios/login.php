<?php
require_once ("../../includes/db.php");
@session_start();


$email= isset($_POST["email"]) ? $_POST["email"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";

if (!empty($email) && !empty($password)) {
    $stmt = $conx->prepare("SELECT * FROM administradores WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $resultado = $stmt->get_result();
    $stmt->close();

    $usuario = $resultado->fetch_object();

    if ($usuario === NULL){
        echo "Usuario o contraseña incorrecta <br>";
    } else {
        $_SESSION["id"] = $usuario->id;
        header("Location: listado.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .boton-ingresar {
            background-color: #90ee90;
        }
    </style>

</head>
<body>
    
</body>
</html>

<form method="POST">
    <input type="email" name="email" placeholder="Ingrese su email" required>
    <input type="password" name="password" placeholder="Contraseña" required>

    <button class= "boton-ingresar" type="sudmit">INGRESAR</button>

</form>