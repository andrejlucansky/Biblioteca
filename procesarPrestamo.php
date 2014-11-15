<?php
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['libro'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="INSERT INTO prestamo (desde, USUARIO_id, LIBRO_id) VALUES (CURRENT_DATE(), $id, $idLibro)";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: prestamo");;

header("Location:index.php?contenido=principal");

?>