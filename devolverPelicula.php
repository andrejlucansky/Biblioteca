<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

include "vars.php";
Conectar();

$clausula = "SELECT * FROM peliculas WHERE idPelicula = $id";
$result=mysql_query($clausula);
$row=mysql_fetch_array($result);
?>
<html>
<body>
<div align="center">
<br>
<table width="46%"  border="0" cellpadding="0">
  <tr>
    <td colspan="2"><div align="center">&iquest;Est&aacute; seguro que desea devolver la siguiente pel&iacute;cula? </div></td>
    </tr>
  <tr>
    <td colspan="2"> <div align="center" style="font-weight:bold"><?php echo $row[titulo];?>
      <br>
      <br>
      <br>
      <br>      
     </div></td>
    </tr>
  <tr>
    <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='procesarDevolucion.php?id=$row[idPelicula]'>Sí</a>";?>
     </div></td>
    <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='index.php?contenido=principal'>No</a>";?>
     </div></td>
  </tr>
</table>
<br>
  <p>&nbsp;</p>

<div style="font-weight:bold"> </div>
<br>
<br>


</div>
</body>
</html>
