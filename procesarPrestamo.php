<?php
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['libro'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula="SELECT USUARIO_id FROM reservacion WHERE LIBRO_id = $idLibro ORDER BY order_number DESC LIMiT 1";
$result = mysql_fetch_array(mysql_query($clausula));

if($result == null || $result[0] == $id) {
    $clausula = "INSERT INTO prestamo (desde, USUARIO_id, LIBRO_id) VALUES (CURRENT_DATE(), $id, $idLibro)";
    $result=mysql_query($clausula) or die("Error en la conexion a la base de datos: prestamo");

    $clausula="DELETE FROM reservacion WHERE USUARIO_id = $id";
    $result=mysql_query($clausula) or die("Error en la conexion a la base de datos: regreso borrar reservacion");

    header("Location:index.php?contenido=principal");
}else{
    echo "<span>Otro usuario tiene reservacion por este libro. No se puede prestar.</span>";
}
?>