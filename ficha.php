<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

 	include "vars.php";
	Conectar();
	
	$clausula="SELECT * FROM peliculas WHERE idPelicula =$id";
	$result=mysql_query($clausula);
	$row=mysql_fetch_array($result);
?>
<html>
<body>
<br>
<br>
<table width="47%"  border="0" align="center" cellpadding="0">
  <tr>
    <td width="26%"><strong>T&iacute;tulo:</strong></td>
    <td width="72%"><?php echo $row[titulo];?></td></tr>
  <tr>
    <td><strong>Gen&eacute;ro:</strong></td>
    <td><?php echo $row[genero];?></td>
  </tr>
  <tr>
    <td><strong>Director:</strong></td>
    <td><?php echo $row[director];?></td>
  </tr>
  <tr>
    <td><strong>Duraci&oacute;n</strong></td>
    <td><?php echo $row[duracion];?></td>
  </tr>
  <tr>
    <td><strong>Formato:</strong></td>
    <td><?php echo $row[formato];?></td>
  </tr>
  <tr>
    <td><strong>Actores:</strong></td>
    <td ><?php echo $row[actores];?></td>
  </tr>
  <tr>
  <td><strong>Disponible:</strong></td>
  <td><?php if($row[alquilada]==0) echo "Si"; else echo "No";?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php if($row[alquilada]==0) echo "<a  style=\"font-size:small;color:#CC0000\" href='index.php?contenido=alquilar&id=$row[idPelicula]'>Alquilar</a>";?></td>
  </tr>
</table>
<br>
</body>
</html>
