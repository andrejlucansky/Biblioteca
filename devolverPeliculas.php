<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
if($logueado!=1) header("Location:index.php?login");
?>
<body>
<div align='center'  style="font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">Películas alquiladas<br>
 </div> <div align='center'  style="font-size:x-small;font-weight:bold;font-family:Verdana, Arial, Helvetica, sans-serif ">(click en la pel&iacute;cula para devolverla)</div>
<br>
<br>

<table width="85%"  border="0" align="center" cellpadding="0" style="font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small ">
  <tr>
    <td ><strong>Pelicula</strong></td>
    <td><strong>Socio</strong></td>
    <td><strong>Fecha</strong></td>
  </tr>

<?php
	include "vars.php";
	Conectar();
	 $clausula="SELECT * FROM alquileres WHERE idSocio = $idSocio ORDER BY idPelicula ASC";
        $result=mysql_query($clausula);
		while ($row=mysql_fetch_array($result)) {
		echo "<tr name=$row[idPelicula] onClick=\"window.location='index.php?contenido=devolverPelicula&id=$row[idPelicula]'\" onMouseOver=\"bgColor='#0066CC'; this.style.color='#FFFFFF'\" onMouseOut=\"bgColor='#FFFFFF'; this.style.color='#000000'\">
    <td>$row[idPelicula]</td>
    <td>$row[idSocio]</td>
    <td>$row[fechaAlquiler]</td>
  </tr>
";}?>
		
		</table>

</body>
</html>
