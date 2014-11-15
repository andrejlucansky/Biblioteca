<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>Untitled Document</title>
<style type="text/css">
<!--
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; font-size: x-small; }

-->
.style9 {color: darkgray}
</style>

    <?php session_start();
    $logueado = $_SESSION['logueado'];
    $idSocio = $_SESSION['id'];
    if($logueado!=1) header("Location:index.php?login");
    ?>
</head>

<body>
<form id="form1" name="form1" method="post" action="procesarAlta.php">
  <br />
  <br />
  <table width="70%" border="0" align="center" cellspacing="0">
    <tr>
      <td><span class="style8">Id Usuario:</span></td>
      <td><span class="style9">
      
      <?php 
	  include "vars.php";
	   Conectar();
	   

$clausula = "SELECT id FROM usuario WHERE 1 ORDER BY id DESC LIMIT 1";
$result=mysql_fetch_array(mysql_query($clausula));
$id = $result[0];
$id++;

echo $id;
	  ?></span></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><label></label></td>
    </tr>
    <tr>
      <td><span class="style8">Nombre:</span></td>
      <td><label>
        <input type="text" name="nombre" id="nombre" />
      </label></td>
    </tr>
    <tr>
      <td><span class="style8">Apellidos:</span></td>
      <td><input type="text" name="apellidos" id="apellidos" /></td>
    </tr>
      <tr>
          <td><span class="style8">Apodo:</span></td>
          <td><label>
                  <input name="apodo" type="text" id="apodo" value="" />
              </label></td>
      </tr>
    <tr>
      <td><span class="style8">Email:</span></td>
      <td><input type="text" name="email" id="email" /></td>
    </tr>
      <tr>
          <td><span class="style8">Contrase&ntilde;a:</span></td>
          <td><label>
                  <input name="password" type="password" id="password" value="" />
              </label></td>
      </tr>
      <tr>
          <td></td>
          <td>
                <input type="radio" name="tipo" value="admin"/>Admin
                <input type="radio" name="tipo" value="user" checked/>User
          </td>
      </tr>

  </table>
  <div align="right"><br />  
    <br />  
    <input type="submit" name="Submit" id="Submit" value="Dar de alta" />
	<!-- STEP 5 let's process the add user choice -->
  </div>
</form>
<br />
</body>
</html>
