<?php
session_start();
$logueado = $_SESSION['logueado'];
$idLibro = $_GET['id'];
if($logueado!=1) header("Location:index.php?login");

?>
<html>


<body>
<?php
include "vars.php";
Conectar();

$clausula = "SELECT * FROM libro WHERE id = $idLibro";
$result=mysql_query($clausula);
$row=mysql_fetch_array($result);
?>

<div align="center">
    <br>
    <table width="46%"  border="0" cellpadding="0">
        <tr>
            <td colspan="2"><div align="center">&iquest;Esta seguro que desea volver el siguiente libro? </div></td>
        </tr>
        <tr>
            <td colspan="2"> <div align="center" style="font-weight:bold"><?php echo $row[nombre];?>
                    <br>
                    <br>
                    <br>
                    <br>
                </div></td>
        </tr>
        <tr>
            <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='procesarRegreso.php?libro=$idLibro'>Si</a>";?>
                </div></td>
            <td> <div align="center"><?php echo "<a style=\"font-size:small;color:#CC0000\" href='index.php?contenido=principal'>No</a>";?>
                </div></td>
        </tr>
    </table>
    <br>
    <p>&nbsp;</p>

    <div style="font-weight:bold"> </div>
    <br>
    <br>


</div>
</body>
</html>
