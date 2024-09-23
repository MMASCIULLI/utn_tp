<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require_once("../../includes/db.php");


//echo 'probando ';
$resultado = $conx->query("SELECT * FROM usuarios");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Usuarios</title>
    <link rel="stylesheet" href="utn/views/usuarios/edicion.ss">
    <style>
        body {
            background-color: #f0f0f0; /*color de fondo */
            color: #333; /* Color del texto */
        }

        .boton-color {
            cursor: pointer;
            background-color: #90ee90;
        }
    </style>

</head>
<body>
    
    <h1>INICIO</h1>

    <a href="formulario.php" class= "registrar-user">Registrar Usuario</a>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Password</th>
                <th>Email</th>
            </tr>
        </thead>
        <?php while ($fila = $resultado->fetch_object()) {?> 
            <tr>
                <td><?php echo $fila->id ?></td>
                <td><?php echo $fila->email ?></td>
                <td><?php echo $fila->password ?></td>
                <td><a href="formulario.php?id=<?php echo $fila->id ?>"> Editar </a></td>
                <td><a href="../../controllers/usuarios.php?operacion=DELETE&id=<?php echo $fila->id ?>"> Eliminar </a></td>
            </tr>
        <?php } ?>
    </table>
<form action="/utn/controllers/cerrarsesion.php" method="POST">
    <button class= "boton-color" name="logout" type="submit">Cerrar Sesion</button>
</form> 

</body>
</html>