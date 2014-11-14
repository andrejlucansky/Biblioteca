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
		$cabecera="Listado de todas las pel�culas";
	} else if($crit == 'vistas'){
		$cabecera="Listado de las pel�culas ya vistas";
	} else if($crit == 'novistas'){
		$cabecera="Listado de las pel�culas que no ha visto";
	} else if($crit ==  'disponibles'){
		$cabecera="Listado de las pel�culas disponibles para alquilar";
	}
?>
<div align='center'  style="font-weight:bold "><?php echo $cabecera;?><br></div><div align='center'  style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">(click en la pel&iacute;cula para ver la ficha y alquilarla si lo desea y est� disponible)</div><br>
<br>

<table width="85%"  border="0" align="center" cellpadding="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
  <tr>
    <td ><strong>Nombre</strong></td>
    <td><strong>Genero</strong></td>
    <td><strong>Director</strong></td>
    <td><strong>Formato</strong></td>
    <td><strong>Alquilada</strong></td>
  </tr>

<?php
	include "vars.php";
    Conectar();
?>

<html>

<?php
$consulta = "SELECT *, usuario.nombre as nombre_usuario FROM prestamo
inner join usuario on prestamo.USUARIO_id = usuario.id
inner join libro on prestamo.LIBRO_id = libro.id
WHERE 1";

$qr = mysql_query($consulta);
$num = mysql_num_rows($qr);


?>
<table width="85%"  border="0" align="center" cellpadding="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
    <tr>
        <td ><strong>Nombre</strong></td>
        <td><strong>Genero</strong></td>
        <td><strong>Director</strong></td>
        <td><strong>Formato</strong></td>
        <td><strong>Alquilada</strong></td>
    </tr>
    <?php
    for($x=0;$x<$num;$x++) {
        $fila = mysql_fetch_array($qr);

        ?>
        <tr>

            <td><strong><?php echo $fila['nombre_usuario'];?></strong></td>
            <td><strong>Genero</strong></td>
            <td><strong>Director</strong></td>
            <td><strong>Formato</strong></td>
            <td><strong>Alquilada</strong></td>
        </tr>
    <?php
    }
    ?>
    </table>


</html>
