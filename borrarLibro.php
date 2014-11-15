<?php
session_start();
$logueado = $_SESSION['logueado'];
$libro = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");
?>


<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Biblioteca</title>
</head>

<body>
<table width="46%"  border="0" cellpadding="0">
    <tr>
        <td colspan="2"><div align="center">&iquest;Esta seguro que desea borrar el siguiente libro? </div></td>
    </tr>
    <tr>
        <td colspan="2"> <div align="center" style="font-weight:bold"><?php echo $row[nombre];?>

            </div></td>
    </tr>
    <tr>
        <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='procesarLibroSuprecion.php?libro=$libro'>Si</a>";?>
            </div></td>
        <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='index.php?contenido=principal'>No</a>";?>
            </div></td>
    </tr>
</table>
</body>

