<?php 
session_start();
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="UPDATE peliculas SET alquilada=0 WHERE idPelicula = $id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: peliculas");;


$clausula = "SELECT fechaAlquiler FROM alquileres WHERE idPelicula  = $id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: fecha alquiler");
$row=mysql_fetch_array($result);
$fecha = $row[fechaAlquiler];


$clausula = "INSERT INTO historial (idSocio, idPelicula, fechaAlquiler, fechaDevolucion) VALUES ('$idSocio',  '$id', '$fecha', CURDATE())";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: historial");



$clausula="DELETE FROM alquileres WHERE idPelicula = $id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: alquileres");;

 header("Location:index.php?contenido=principal"); 
?>