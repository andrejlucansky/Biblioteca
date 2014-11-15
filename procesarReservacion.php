<?php 
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['id'];
$id = $_SESSION['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="SELECT order_number FROM reservacion WHERE LIBRO_id=$idLibro ORDER BY order_number DESC LIMIT 1";
$result=mysql_fetch_array(mysql_query($clausula));
$total = $result[0] + 1;

$clausula="SELECT COUNT(*) FROM reservacion WHERE LIBRO_id=$idLibro AND USUARIO_id=$id";
$count = mysql_fetch_array(mysql_query($clausula))[0];

echo "<br><span>$total<br></span>";
echo "<br><span>$idLibro<br></span>";
echo "<br><span>$id<br></span>";

if($count == 0) {
    $clausula = "INSERT INTO reservacion (order_number, LIBRO_id, USUARIO_id) VALUES ($total, $idLibro, $id)";
}
$result=mysql_query($clausula) or die("Error en la conexion a la base de datos: reservation");;

header("Location:index.php?contenido=principal");

?>