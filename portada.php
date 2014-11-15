
<html>
<style type="text/css">
<!--
.style2 {
	font-size: x-small;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style3 {font-size: x-small; font-weight: bold; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style5 {color: #FF0000}
-->
</style>

<body>

<div align="center"><br>
    <span class="style3">Introduzca sus datos:</span></div>
<form name="form1" method="post" action="login.php">
  <table width="31%"  border="0" align="center" cellspacing="0">
    <tr>
      <td width="51%"><div align="right" class="style3">Apodo:</div></td>
      <td width="49%"><input name="identificacion" type="text" id="identificacion"></td>
    </tr>
    <tr>
      <td><div align="right" class="style3">Contrase&ntilde;a:</div></td>
      <td><input name="password" type="password" id="password"></td>
    </tr>
    <tr>
      <td><span class="style4"></span></td>
      <td><div align="right" class="style2">
        <br>
        <input type="submit" name="Submit" value="Entrar">
      </div></td>
    </tr>
  </table>

  <!--<div align="center"><a href="index.php?contenido=altaNueva" style="color:#CC0000">Alta nuevo usuario</a><br>
  <!-- STEP 2 As we are not logged yet we have to select Alta nuevo which leads to index.php?contenido=altaNueva -->
  </div>
  <div align="center" style="color:#CC0000; font-weight:bold; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:x-small "><?php if (isset($login)) echo "Por favor identif�quese para acceder a la aplicaci�n";?></div>
</form>
</body>
</html>
