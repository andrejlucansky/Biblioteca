<?php session_start();
$logueado = $_SESSION['logueado'];
$id = $_SESSION['id'];
$tipo = $_SESSION['tipo_usuario'];
$libroId = $_GET['id'];
if ($logueado != 1) header("Location:index.php?login");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Biblioteca</title>
</head>

<body>

<div align='center' style="font-weight:bold "><?php echo $cabecera; ?><br></div>
<div align='center' style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">(click
    en el usuario para que quiere prestar el libro)
</div>
<br>
<br>

<table width="85%" border="0" align="center" cellpadding="0"
       style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
    <tr>
        <td><strong>Id</strong></td>
        <td><strong>Nombre</strong></td>
        <td><strong>Apellidos</strong></td>
        <td><strong>Apodo</strong></td>

    </tr>
        <?php
        include "vars.php";
        Conectar();

        $clausula = "SELECT * FROM usuario";
        $result = mysql_query($clausula);

        while ($row = mysql_fetch_array($result)) {
            echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=procesarPrestamo&id=$row[id]&libro=$libroId'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
            echo "<td><span>$row[id]</span></td>";
            echo "<td><span>$row[nombre]</span></td>";
            echo "<td><span>$row[apellidos]</span></td>";
            echo "<td><span>$row[apodo]</span></td>";
            echo "</tr>";
        }?>

</table>

</body>
</html>

