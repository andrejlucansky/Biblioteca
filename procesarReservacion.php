<?php 
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['id'];
$id = $_SESSION['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="SELECT COUNT(*) FROM reservacion WHERE LIBRO_id=$idLibro";
$result=mysql_fetch_array(mysql_query($clausula));
$total = $result[0] + 1;

//echo "<br><span>$total<br></span>";

$clausula="INSERT INTO reservacion (order_number, LIBRO_id, USUARIO_id) VALUES ($total, $idLibro, $id)";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: peliculas");;

header("Location:index.php?contenido=principal");

?>