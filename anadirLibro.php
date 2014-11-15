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
<form id="form1" name="form1" method="post" action="procesarAnadirLibro.php">
    <br />
    <br />
    <table width="70%" border="0" align="center" cellspacing="0">
        <tr>
            <td><span class="style8">Id Usuario:</span></td>
            <td><span class="style9">
      
      <?php
      include "vars.php";
      Conectar();
      ?>
      </span></td>
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
            <td><span class="style8">Autor:</span></td>
            <td><input type="text" name="autor" id="autor" /></td>
        </tr>
        <tr>
            <td><span class="style8">Ano:</span></td>
            <td><label>
                    <input name="ano" type="text" id="ano" value="" />
                </label></td>
        </tr>

    </table>
    <div align="right"><br />
        <br />
        <input type="submit" name="Submit" id="Submit" value="Anadir nuevo libro" />
        <!-- STEP 5 let's process the add user choice -->
    </div>
</form>
<br />
</body>
</html>
