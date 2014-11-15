<?php session_start();
$logueado = $_SESSION['logueado'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$id = $_POST['id'];
$nombre= $_POST['nombre'];
$autor = $_POST['autor'];
$ano = $_POST['ano'];

$clausula = "UPDATE libro SET nombre = '$nombre', autor = '$autor', ano ='$ano' WHERE id = '$id';";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: editar libro");

header("Location:index.php?contenido=principal");
?>