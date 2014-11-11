<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
if($logueado!=1) header("Location:index.php?login");
?>
<html>
<style type="text/css">
<!--
.style14 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: x-small; }
.style15 {font-size: x-small}
-->
</style>
<?php include "vars.php";
	Conectar();
?>

<body>
<br>
<br>
<table width="43%"  border="0" align="center" cellspacing="0">
  <tr>
    <td width="41%"><span class="style14">Pel&iacute;culas:</span></td>
    <td width="59%"><span class="style15"></span></td>
  </tr>
  <tr>
    <td><span class="style14">- Total: </span></td>
    <td>
	
	<?php 
	$clausula="SELECT COUNT(*) FROM peliculas";
		$result=mysql_fetch_array(mysql_query($clausula));
		$total = $result[0];
		echo $total;
	
	?>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style14">- Vistas: </span></td>
    <td><?php 
	$clausula="SELECT COUNT(*) FROM historial WHERE idSocio='$idSocio'";
	$result=mysql_fetch_array(mysql_query($clausula));
		$vistas = $result[0];
	$clausula="SELECT COUNT(*) FROM alquileres WHERE idSocio='$idSocio'";
	$result=mysql_fetch_array(mysql_query($clausula));
		$vistas += $result[0];
		
		echo $vistas;
	
	?>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style14">-  No vistas: </span></td>
    <td><?php echo $total - $vistas;?></span></td>
  </tr>
  <tr>
    <td><span class="style14">- Disponibles: </span></td>
    <td>
	<?php
	$clausula="SELECT COUNT(*) FROM peliculas WHERE alquilada!=1";
	$result=mysql_fetch_array(mysql_query($clausula));
		$vistas = $result[0];
		echo $vistas;
		?>
	</td>
  </tr>
  <tr>
    <td><span class="style15"><br>
      <br>
      <br>
      <br>
      <br>
    </span></td>
    <td><span class="style15"></span></td>
  </tr>
  <tr>
    <td><span class="style14">Socio:</span></td>
    <td><span class="style15"></span></td>
  </tr>
  <tr>
    <td><span class="style14">-Nombre:</span></td>
    <td><?php
	
	$clausula="SELECT * FROM socios WHERE idSocio='$idSocio'";
	$result=mysql_fetch_array(mysql_query($clausula));
		
		echo $result[nombre];
		
		?></td>
  </tr>
  <tr>
    <td><span class="style14">-Direcci&oacute;n:</span></td>
    <td><?php
	

		echo  $result[direccion];
		
		?></td>
  </tr>
  <tr>
    <td><span class="style14">-Alquiladas:</span></td>
    <td>
      <?php
	    $clausula="SELECT count(*) FROM alquileres WHERE idSocio='$idSocio'";
	    $result=mysql_fetch_array(mysql_query($clausula));
		echo  $result[0];
		
		?>
    </td>
  </tr>
</table>
<br>
<br>
</body>
</html>
