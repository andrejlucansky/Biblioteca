<?php session_start();
$logueado = $_SESSION['logueado'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$nombre= $_POST['nombre'];
$autor = $_POST['autor'];
$ano = $_POST['ano'];


$clausula = "INSERT INTO libro (nombre, ano, autor) VALUES ('$nombre',  '$ano', '$autor')";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: anadir libro");


header("Location:index.php?contenido=principal");
?>