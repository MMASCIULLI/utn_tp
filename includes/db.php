<?php 
//archivo database conexion
$servidor = "localhost";
$user = "root";
$password = "";
$database = "basedatos";


$conx = new mysqli($servidor, $user, $password, $database);// objeto para conexion de base de datos 

if ($conx->connect_errno) {
    echo "error: ".$conx->connect_error;
}
