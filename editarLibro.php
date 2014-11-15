<?php session_start();
$logueado = $_SESSION['logueado'];
$id = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");
?>
<body>
<form id="form1" name="form1" method="post" action="procesarLibro.php">
    <br />
    <br />
    <table width="70%" border="0" align="center" cellspacing="0">
        <tr>
            <td><span class="style8">Id Usuario:</span></td>
            <td><span class="style9">

      <?php
      include "vars.php";
      Conectar();


      $clausula = "SELECT * FROM libro WHERE id=$id;";
      $result=mysql_fetch_array(mysql_query($clausula));

      echo $result[id];
      echo "<input type='hidden' name='id' id='id' value=$id />";
      ?>
                </span>
            </td>
        </tr>
        <tr>
            <td><span class="style8">Nombre:</span></td>
            <td>
                <input type="text" name="nombre" id="nombre" value='<?php echo $result[nombre];?>' />
            </td>
        </tr>
        <tr>
            <td><span class="style8">Autor:</span></td>
            <td><input type="text" name="autor" id="autor" value='<?php echo $result[autor];?>'></td>
        </tr>
        <tr>
            <td><span class="style8">Ano:</span></td>
            <td><input type="text" name="ano" id="ano" value='<?php echo $result[ano];?>'></td>
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
