<?php session_start();
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['id'];
$crit = $_GET['crit'];
if ($logueado != 1) header("Location:index.php?login");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Biblioteca</title>
</head>

<body>
<?php if ($crit == 'todas') {
    $cabecera = "Listado de todas los libros";
} else if ($crit == 'vistas') {
    $cabecera = "Listado de los libros ya vistas";
} else if ($crit == 'novistas') {
    $cabecera = "Listado de los libros que no ha visto";
} else if ($crit == 'disponibles') {
    $cabecera = "Listado de los libros disponibles para alquilar";
}
?>
<div align='center' style="font-weight:bold "><?php echo $cabecera; ?><br></div>
<div align='center' style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">(click
    en el libro para ver la ficha y alquilarla si lo desea y esta disponible)
</div>
<br>
<br>

<table width="85%" border="0" align="center" cellpadding="0"
       style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
    <tr>
        <td><strong>Nombre</strong></td>
        <td><strong>Autor</strong></td>
        <td><strong>Ano</strong></td>

        <?php
        include "vars.php";
        Conectar();

        if ($crit == 'todas') {
            $clausula = "SELECT * FROM libro WHERE 1 ORDER BY nombre ASC";
        } else if ($crit == 'vistas') {
            echo "<td><strong>Desde</strong></td><td><strong>Hasta</strong></td>";

            $clausula = "SELECT *, usuario.nombre as nombre_usuario FROM prestamo inner join usuario on prestamo.USUARIO_id = usuario.id
                       inner join libro on prestamo.LIBRO_id = libro.id WHERE prestamo.USUARIO_id=$idSocio";
        } else if ($crit == 'novistas') {
            $clausula = "SELECT * FROM libro WHERE id NOT IN (SELECT id FROM historial WHERE idSocio = '$idSocio' )ORDER BY titulo ASC";
        } else if ($crit == 'disponibles') {
            $clausula = "SELECT * FROM libro WHERE id NOT IN (SELECT LIBRO_id FROM prestamo WHERE hasta IS NULL)";
        }

        echo "        <td><strong>Prestado</strong></td>    </tr>";

        $result = mysql_query($clausula);
        while ($row = mysql_fetch_array($result)) {
            echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=ficha&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">
    <td>$row[nombre]</td>
    <td>$row[autor]</td>";
            if($crit == 'vistas'){
                echo "<td>$row[desde]</td><td>$row[hasta]</td>";
            }
      echo"<td>$row[ano]</td><td>";

            $clausula = "SELECT * FROM prestamo WHERE hasta IS NULL AND LIBRO_id = $row[id]";
            $res = mysql_num_rows(mysql_query($clausula));
            if ($res == 0)
                echo "No";
            else
                echo "Si";

            echo "</td></tr>";
        }?>

</table>

</body>
</html>

