<?php session_start(); 
$logueado = $_SESSION['logueado'];
$id = $_SESSION['id'];
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
    <tr><td><span class="style14">Usuario:</span></tr></td>
    <tr>
        <td><span class="style14">- Id:</span></td>
        <td><?php

            $clausula="SELECT * FROM usuario WHERE id='$id'";
            $result=mysql_fetch_array(mysql_query($clausula));

            echo $result[id];

            ?></td>
    </tr>
    <tr>
        <td><span class="style14">- Nombre:</span></td>
        <td><?php


            echo  $result[nombre];

            ?></td>
    </tr>
    <tr>
        <td><span class="style14">- Apellidos:</span></td>
        <td><?php


            echo  $result[apellidos];

            ?></td>
    </tr>
    <tr>
        <td><span class="style14">- Apodo:</span></td>
        <td><?php


            echo  $result[apodo];

            ?></td>
    </tr>
    <tr>
        <td><span class="style14">- Email:</span></td>
        <td><?php


            echo  $result[email];

            ?></td>
    </tr>
    <tr>
        <td><span class="style14">- Tipo:</span></td>
        <td><?php


            echo  $result[tipo];

            ?></td>
    </tr>
    <td width="59%"><span class="style15"></span></td>

  <tr>
    <td width="41%"><span class="style14">L&iacute;bros:</span></td>
    <td width="59%"><span class="style15"></span></td>

  <tr>
    <td><span class="style14">- Total: </span></td>
    <td>
	
	<?php 
	$clausula="SELECT COUNT(*) FROM libro";
		$result=mysql_fetch_array(mysql_query($clausula));
		$total = $result[0];
		echo $total;
	
	?>&nbsp;</td>
  </tr>
  <tr>
    <td><span class="style14">- Vistos:</span></td>
    <td><?php 
	$clausula="SELECT COUNT(DISTINCT LIBRO_id) FROM prestamo WHERE USUARIO_id='$id'";
	$result=mysql_fetch_array(mysql_query($clausula));
		$vistas = $result[0];
		
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
	$clausula="SELECT COUNT(*) FROM prestamo WHERE desde IS NOT NULL AND hasta IS NULL";
	$result=mysql_fetch_array(mysql_query($clausula));
		$vistas = $total - $result[0];
		echo $vistas;
		?>
	</td>
  </tr>
  <tr>
    <td><span class="style14">- Alquiladas:</span></td>
    <td>
      <?php
	    $clausula="SELECT count(*) FROM prestamo WHERE USUARIO_id='$id' AND hasta IS NULL";
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
