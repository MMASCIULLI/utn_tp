<?php
//archivo formulario 

require_once("../../includes/db.php");

if(isset($_GET["id"]) ) {
    $id = $_GET["id"];
    $sentencia = $conx->prepare("SELECT * FROM usuarios WHERE id = ?");  
    $sentencia->bind_param('i', $id);
    $sentencia->execute(); 
    $resultado = $sentencia->get_result(); 
    $usuario = $resultado->fetch_object();  

} else {

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <style>
        .boton-guardar {
            background-color: #90ee90;
        }
    </style>


</head>
<body>
    <?php if (isset($_GET["id"])){?> 
        <h1>Editar Usuario</h1>
    <?php } else { ?>
        <h1>Crear Usuario</h1>

    <?php }?>


    <form action="../../controllers/usuarios.php?operacion=<?php echo (isset($_GET["id"])) ? "EDIT" : "NEW" ?>"  method="POST">
        <input type="hidden" name="id" value="<?php echo (isset($_GET["id"])) ? $usuario->id : "" ?>" />
        <div>
            <label>Email</label> <br>
             <input type="text"  name="email" value="<?php echo (isset($_GET["id"])) ? $usuario->id : "" ?>" />
        </div>
        <div>
            <label>Password</label> <br> 
             <input type="text"  name="password" value="<?php echo (isset($_GET["id"])) ? $usuario->id : "" ?>" />
        </div>
         <br> <button class= "boton-guardar" >Guardar</button>
    </form>
</body>
</html>

