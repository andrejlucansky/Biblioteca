<?php 
session_start();
$logueado = $_SESSION['logueado'];
$id = $_GET['id'];
$idSocio = $_SESSION['idSocio'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="UPDATE peliculas SET alquilada=1 WHERE idPelicula = $id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: peliculas");;



$clausula = "INSERT INTO alquileres (idPelicula, idSocio, fechaAlquiler) VALUES ('$id',  '$idSocio', CURDATE())";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: alquileres");

header("Location:index.php?contenido=principal"); 

?>