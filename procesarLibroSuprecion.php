<?php
session_start();
$logueado = $_SESSION['logueado'];
$id = $_GET['libro'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();
?>

<?php
$clausula="DELETE FROM libro WHERE id=$id";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: libro supresion");

header("Location:index.php?contenido=principal");
?>