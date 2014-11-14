<?php session_start();
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['id'];
if($logueado!=1) header("Location:index.php?login");
?>
<body>
<form id="form1" name="form1" method="post" action="procesarUsuario.php">
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
            <td><span class="style8">Email:</span></td>
            <td><input type="text" name="email" id="email" /></td>
        </tr>
        <tr>
            <td><span class="style8">Contrase&ntilde;a:</span></td>
            <td><label>
                    <input name="password" type="password" id="password" value="" />
                </label></td>
        </tr>

    </table>
    <div align="right"><br />
        <br />
        <input type="submit" name="Submit" id="Submit" value="Actualizar" />
        <!-- STEP 5 let's process the add user choice -->
    </div>
</form>
<br />
</body>
</html>
