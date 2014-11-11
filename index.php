<?php 
session_start();
if(isset($_SESSION['logueado']))
{
    $logueado =  $_SESSION['logueado'];
}

if(isset($_SESSION['idSocio']))
{
    $idSocio = $_SESSION['idSocio'];
}

if(isset($_GET['contenido']))
{
    $contenido = $_GET['contenido'];
}

if(isset($_GET['login']))
{
    $login = $_GET['login'];
}

if (isset($contenido)){
if( $contenido!= "altaNueva"){
if(!isset($logueado) && isset($login) ){
header("Location:index.php?login");
}
}
}
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<!-- STEP 1 As contenido is not defined we present the portada.php file -->

<?php if(!isset($contenido)) {
	$contenido = "portada";
}?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>VideoClub NTI v 0.1</title>
<style type="text/css">
<!--
.style1 {
	font-size: xx-large;
	font-weight: bold;
	color: red
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: x-small;
}
.alquilar {font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:small; text-decoration:none;color:#CC0000;}

a:link, a:active, a:visited{ font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:x-small; text-decoration:none; color:#FFFFFF}
a:hover { font-family:Verdana, Arial, Helvetica, sans-serif; font-weight:bold; font-size:x-small; text-decoration:none; text-decoration:overline; text-decoration:underline;color:#FFFFFF}

-->
</style>
</head>

<body>
<br>
<table width="80%" height="473" border="1" align="center" cellspacing="0" bordercolor="#000000">
  <tr>
    <td width="1093" height="99" bgcolor="#FFFFFF"><div align="center" class="style1">VideoClub NTI </div></td>
  </tr>
  <tr>
    <td height="92" bgcolor="#0066CC"><?php  if(isset($logueado)){if($logueado==1) {include "menu.php";}}?></td>
  </tr>
  <tr>
    <td height="257"><?php include $contenido.".php"; unset($contenido);?>&nbsp;</td>
	<!-- STEP 4 we load the altaNueva.php file -->
  </tr>
  <tr>
    <td height="23" bgcolor="#0066CC"><div align="center" class="style2"> (Ejemplo 
        de p&aacute;gina web)</div></td>
  </tr>
</table>
</body>
</html>
