<?php
include "vars.php";
Conectar();
$id = $_POST['id'];
$nombre= $_POST['nombre'];
$apellidos = $_POST['appelidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$apodo = $_POST['apodo'];

//echo "EEE: " . $nombre . " " . $direccion . " " . $telefono . " " .$password ;

//$clausula = "INSERT INTO usuario (nombre, apellidos, email, tipo, password, apodo) VALUES ('$nombre',  '$apellidos', '$email', 'user', '$password', '$apodo')";

$clausula = "UPDATE usuario SET id = '{$id}' ,nombre = '{$nombre}' , apellidos = '{$apellidos}', email ='{$email}', password = '{$password}' WHERE usuario.id = $id;";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: socios");

header("Location:index.php");
?>