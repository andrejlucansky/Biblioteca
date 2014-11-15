<?php session_start();
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['id'];
$tipo = $_SESSION['tipo_usuario'];
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
} else if ($crit == 'prestados'){
    $cabecera = "Listado de los libros prestados para volver";
} else if ($crit == 'editar'){
    $cabecera = "Click en el libro que quiere editar";
}else if ($crit == 'borrar'){
    $cabecera = "Click en el libro que quiere borrar";
}
?>
<div align='center' style="font-weight:bold "><?php echo $cabecera; ?><br></div>
<div align='center' style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">
    <?php
    if ($crit == 'todas' && $tipo=='user') {
        echo "(click en el libro para reservir, si lo desea y ahora esta prestamo)";
    }
    ?>
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

        if ($crit == 'todas' || $crit == 'editar' || $crit == 'borrar') {
            $clausula = "SELECT * FROM libro WHERE 1 ORDER BY nombre ASC";
        } else if ($crit == 'vistas') {
            echo "<td><strong>Desde</strong></td><td><strong>Hasta</strong></td>";

            $clausula = "SELECT *, usuario.nombre as nombre_usuario FROM prestamo inner join usuario on prestamo.USUARIO_id = usuario.id
                       inner join libro on prestamo.LIBRO_id = libro.id WHERE prestamo.USUARIO_id=$idSocio";
        } else if ($crit == 'novistas') {
            $clausula = "SELECT * FROM libro WHERE id NOT IN (SELECT id FROM historial WHERE idSocio = '$idSocio' )ORDER BY titulo ASC";
        } else if ($crit == 'disponibles') {
            $clausula = "SELECT * FROM libro WHERE id NOT IN (SELECT LIBRO_id FROM prestamo WHERE hasta IS NULL)";
        } else if($crit == 'prestados'){
            $clausula = "SELECT * FROM libro WHERE id IN (SELECT LIBRO_id FROM prestamo WHERE hasta IS NULL)";
        }

        echo "        <td><strong>Prestado</strong></td>    </tr>";

        $result = mysql_query($clausula);
        while ($row = mysql_fetch_array($result)) {
            $clausula = "SELECT * FROM prestamo WHERE hasta IS NULL AND LIBRO_id = $row[id]";
            $res = mysql_num_rows(mysql_query($clausula));

            if ($tipo == "user") {
                if ($res > 0) {
                    echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=reservirLibro&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                } else {
                    echo "<tr name=$row[id] onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                }
            }

            if ($tipo == "admin") {
                if ($crit == 'prestados')
                    echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=volverLibro&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                else if ($crit == 'editar')
                    echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=editarLibro&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                else if ($crit == 'borrar')
                    echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=borrarLibro&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                else if ($crit == 'disponibles')
                    echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=prestarLibro&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
                else
                    echo "<tr name=$row[id] onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">";
            }

            echo "<td>$row[nombre]</td>";
            echo "<td>$row[autor]</td>";
            echo "<td>$row[ano]</td>";
            if ($crit == 'vistas') {
                echo "<td>";
                echo date_format(new DateTime($row[desde]), 'd.m.Y');
                echo "</td><td>";
                echo date_format(new DateTime($row[hasta]), 'd.m.Y');
                echo "</td>";
            }

            if ($res == 0)
                echo "<td>No</td>";
            else
                echo "<td>Si</td>";

            echo "</td></tr>";
        }
        ?>

</table>

</body>
</html>

