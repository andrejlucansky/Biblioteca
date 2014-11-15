<?php session_start();
$logueado = $_SESSION['logueado'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$id = $_POST['id'];
$nombre= $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$email = $_POST['email'];
$password = $_POST['password'];
$apodo = $_POST['apodo'];

$clausula = "UPDATE usuario SET nombre = '$nombre', apellidos = '$apellidos', email ='$email', password = '$password' WHERE id = '$id';";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: editar personales");

header("Location:index.php?contenido=principal");
?>