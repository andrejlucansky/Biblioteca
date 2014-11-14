<?php session_start();
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
$crit = $_GET['crit'];
if($logueado!=1) header("Location:index.php?login");
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Untitled Document</title>
</head>

<body>
<?php if($crit == 'todas'){
    $cabecera="Listado de todas las películas";
} else if($crit == 'vistas'){
    $cabecera="Listado de las películas ya vistas";
} else if($crit == 'novistas'){
    $cabecera="Listado de las películas que no ha visto";
} else if($crit ==  'disponibles'){
    $cabecera="Listado de las películas disponibles para alquilar";
}
?>
<div align='center'  style="font-weight:bold "><?php echo $cabecera;?><br></div><div align='center'  style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">(click en la pel&iacute;cula para ver la ficha y alquilarla si lo desea y está disponible)</div><br>
<br>

<table width="85%"  border="0" align="center" cellpadding="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
    <tr>
        <td ><strong>Nombre</strong></td>
        <td><strong>Autor</strong></td>
        <td><strong>Ano</strong></td>
        <td><strong>Formato</strong></td>
        <td><strong>Alquilada</strong></td>
    </tr>

    <?php
    include "vars.php";
    Conectar();

    if($crit == 'todas'){
        $clausula="SELECT * FROM libro WHERE 1 ORDER BY nombre ASC";
    } else if($crit == 'vistas'){
        $clausula="SELECT *, usuario.nombre as nombre_usuario FROM prestamo inner join usuario on prestamo.USUARIO_id = usuario.id
        inner join libro on prestamo.LIBRO_id = libro.id
        WHERE 1";
    } else if($crit == 'novistas'){
        $clausula="SELECT * FROM libro WHERE id NOT IN (SELECT id FROM historial WHERE idSocio = '$idSocio' )ORDER BY titulo ASC";
    } else if($crit ==  'disponibles'){
        $clausula="SELECT * FROM libro WHERE alquilada=0 ORDER BY nombre ASC";
    }

    $result=mysql_query($clausula);
    while ($row=mysql_fetch_array($result)) {
        echo "<tr name=$row[id] onClick=\"window.location='index.php?contenido=ficha&id=$row[id]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">
    <td>$row[nombre]</td>
    <td>$row[autor]</td>
    <td>$row[ano]</td>
    <td>$row[formato]</td>
    <td>" ;

        if($row[alquilada]==0)
            echo "No";
        else
            echo "Sí";

        echo "</td>
  </tr>
";}?>

</table>

</body>
</html>

