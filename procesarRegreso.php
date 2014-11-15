<?php
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['libro'];;
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="SELECT * FROM usuario inner join reservacion ON usuario.id = reservacion.USUARIO_id WHERE LIBRO_id = $idLibro ORDER BY order_number DESC LIMIT 1;";
$user =mysql_fetch_array(mysql_query($clausula));

$clausula="UPDATE prestamo SET hasta=current_date() WHERE hasta IS NULL && LIBRO_id = $idLibro";
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: regreso");

//echo "<span>$user[id]</span>";

$to      = $user[email];
$subject = 'the subject';
$message = 'hello';

mail($to, $subject, $message);

header("Location:index.php?contenido=principal");

?>