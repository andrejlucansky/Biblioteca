<?php
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['libro'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="UPDATE prestamo SET hasta=current_date() WHERE hasta IS NULL && LIBRO_id = $idLibro && USUARIO_id = $id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: regreso");

header("Location:index.php?contenido=principal");

?>