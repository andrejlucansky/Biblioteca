<?php session_start(); 
$logueado = $_SESSION['logueado'];
$idSocio = $_SESSION['idSocio'];
if($logueado!=1) header("Location:index.php?login");
?>
<html>
<body>
<table width="90%"  border="0" align="center" cellspacing="0">
    <?php
        if($_SESSION['tipo_usuario'] == 'admin') {
            ?>
            <tr valign="top">
                <td width="29%"><p class="style2">L&iacute;bros:<br>
                        - <a href="index.php?contenido=listado&crit=todas">Todas</a><br>
                        - <a href="index.php?contenido=listado&crit=vistas">Historial de pedidios</a><br>
                        - <a href="index.php?contenido=listado&crit=novistas">Por ver</a><br>
                        - <a href="index.php?contenido=listado&crit=disponibles">Libros Disponibles</a></p>
                </td>
                <td width="49%"><p class="style2">Datos del usuario:<br>
                        - <a href="index.php?contenido=principal">P&aacute;gina principal</a><br>
                        - <a href="index.php?contenido=devolverPeliculas">Editar datos </a></p>
                </td>
                <td width="22%"><p class="style2">Sesi&oacute;n:<br>
                        - <a href="logout.php">Cerrar sesi&oacute;n </a></p>
                </td>
            </tr>
        <?php
        }
    else {

        ?>
        <tr>
            <td>
                pico
            </td>
        </tr>
    <?php
    }
    ?>
</table>
</body>
</html>
