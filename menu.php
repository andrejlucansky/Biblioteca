<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
if($logueado!=1) header("Location:index.php?login");
?>
<html>
<body>
<table width="90%"  border="0" align="center" cellspacing="0">
  <tr valign="top">
    <td width="29%"><p class="style2">Pel&iacute;culas:<br>
      - <a href="index.php?contenido=listado&crit=todas">Todas</a><br>
      - <a href="index.php?contenido=listado&crit=vistas">Ya vistas</a><br> 
      - <a href="index.php?contenido=listado&crit=novistas">Por ver</a><br>
      - <a href="index.php?contenido=listado&crit=disponibles">Disponibles</a> </p>
    </td>
    <td width="49%"><p  class="style2">Socio:<br>
      - <a href="index.php?contenido=principal">P&aacute;gina principal</a><br>
    - <a href="index.php?contenido=devolverPeliculas">Devolver Película</a></p>
    </td>
    <td width="22%"><p class="style2">Sesi&oacute;n:<br>
      - <a href="logout.php">Cerrar sesi&oacute;n </a></p>
    </td>
  </tr>
</table>
</body>
</html>
