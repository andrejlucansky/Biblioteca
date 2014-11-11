<?php
include "vars.php";
$nombre= $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

//echo "EEE: " . $nombre . " " . $direccion . " " . $telefono . " " .$password ;
Conectar();


$clausula = "INSERT INTO socios ( nombre, direccion, telefono, numAlquiladas, password) VALUES ('$nombre',  '$direccion', $telefono,0, '$password')";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: socios");


header("Location:index.php");
?>