<?php
include "vars.php";
$nombre= $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$apodo = $_POST['apodo'];
$tipo = $_POST['tipo'];

//echo "EEE: " . $nombre . " " . $direccion . " " . $telefono . " " .$password ;
Conectar();


$clausula = "INSERT INTO usuario (nombre, apellidos, email, tipo, password, apodo) VALUES ('$nombre',  '$apellidos', '$email', '$tipo', '$password', '$apodo')";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: socios");


header("Location:index.php?contenido=principal");
?>