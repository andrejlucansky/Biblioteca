<?php session_start();
$logueado = $_SESSION['logueado'];
$id = $_GET['id'];
$tipo = $_SESSION['tipo_usuario'];

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


      $clausula = "SELECT * FROM usuario WHERE id=$id;";
      $result=mysql_fetch_array(mysql_query($clausula));

      echo $result[id];
      echo "<input type='hidden' name='id' id='id' value=$result[id] />";
      ?>
                </span>
            </td>
        </tr>
        <tr>
            <td><span class="style8">Apodo:</span></td>
            <td>
                <span class="style9">
                    <?php
                        echo $result[apodo];
                    ?>
                </span>
            </td>
        </tr>
        <tr>
            <td><span class="style8">Nombre:</span></td>
            <td><label>
                    <input type="text" name="nombre" id="nombre" value='<?php echo $result[nombre];?>' />
                </label></td>
        </tr>
        <tr>
            <td><span class="style8">Apellidos:</span></td>
            <td><input type="text" name="apellidos" id="apellidos" value='<?php echo $result[apellidos];?>'></td>
        </tr>
        <tr>
            <td><span class="style8">Email:</span></td>
            <td><input type="text" name="email" id="email" value='<?php echo $result[email];?>'></td>
        </tr>
        <tr>
            <td><span class="style8">Contrase&ntilde;a:</span></td>
            <td><label>
                    <input name="password" type="password" id="password"/>
                </label></td>
        </tr>
        <?php
            if($tipo == "admin") {
                ?>
                <tr>
                    <td></td>
                    <td>
                        <input type="radio" name="tipo"
                               value="admin" <?php if ($result[tipo] == "admin") echo "checked"; ?>/>Admin
                        <input type="radio" name="tipo"
                               value="user" <?php if ($result[tipo] == "user") echo "checked"; ?>/>User
                    </td>
                </tr>
            <?php
            }
        ?>
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
