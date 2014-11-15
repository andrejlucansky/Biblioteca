<?php session_start();
$logueado = $_SESSION['logueado'];
$id = $_SESSION['id'];
$condicion = $_GET['cond'];
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
<div align='center' style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">
    <?php
     if($condicion == "delete") {
         echo "(click en el usuario quien quiere borrar)";
     }else{
         echo "(click en el usuario quien quiere editar)";
     }
    ?>
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
        <td><strong>E-mail</strong></td>
        <td><strong>Tipo</strong></td>

    </tr>
    <?php
    include "vars.php";
    Conectar();

    $clausula = "SELECT * FROM usuario";
    $result = mysql_query($clausula);

    while ($row = mysql_fetch_array($result)) {
        if($condicion == "delete")
            echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=borrarUsuario&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
        else
            echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=editarUsuario&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
        echo "<td><span>$row[id]</span></td>";
        echo "<td><span>$row[nombre]</span></td>";
        echo "<td><span>$row[apellidos]</span></td>";
        echo "<td><span>$row[apodo]</span></td>";
        echo "<td><span>$row[email]</span></td>";
        echo "<td><span>$row[tipo]</span></td>";
        echo "</tr>";
    }?>

</table>

</body>
</html>

