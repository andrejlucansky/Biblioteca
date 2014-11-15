<?php session_start(); 
$logueado = $_SESSION['logueado'];
$id = $_SESSION['id'];
if($logueado!=1) header("Location:index.php?login");
?>
<html>
<body>
<table width="90%"  border="0" align="center" cellspacing="0">
            <tr valign="top">
                <td width="20%"><span class="style2">Libros:<br></span>
                        - <a href="index.php?contenido=listarLibros&crit=todas">Todas</a><br>
                        - <a href="index.php?contenido=listarLibros&crit=vistas">Historial de pedidios</a><br>
                    <?php
                    if($_SESSION['tipo_usuario'] == 'admin') {
                        ?>
                        - <a href="index.php?contenido=listarLibros&crit=disponibles">Prestar libro</a></br>
                        - <a href="index.php?contenido=listarLibros&crit=prestados">Volver libro</a></p>
                    <?php
                    }     else {
                        ?>
                        - <a href="index.php?contenido=listarLibros&crit=disponibles">Libros Disponibles</a></br>
                    <?php
                    }
                    ?>
                </td>
                <td width="20%"><span class="style2">Datos del propio usuario:<br></span>
                        - <a href="index.php?contenido=principal">Pagina principal</a><br>
                        - <?php echo "<a href='index.php?contenido=editarUsuario&id=$id'>Editar datos personales </a></p>"; ?>
                </td>
                <?php
                if($_SESSION['tipo_usuario'] == 'admin') {
                    ?>
                    <td width="20%"><span class="style2">Administrar libros:<br></span>
                            -- <a href="index.php?contenido=anadirLibro">Anadir</a></br>
                            -- <a href="index.php?contenido=listarLibros&crit=borrar">Borrar</a></br>
                            -- <a href="index.php?contenido=listarLibros&crit=editar">Editar</a></br>
                    </td>
                    <td width="20%"><span class="style2">Administrar usuarios:<br></span>
                            -- <a href="index.php?contenido=altaNueva">Anadir</a></br>
                            -- <a href="index.php?contenido=listarUsuarios&cond=delete">Borrar</a></br>
                            -- <a href="index.php?contenido=listarUsuarios&cond=edit">Editar</a></br>
                    </td>
                <?php
                }
                ?>
                <td width="20"><p class="style2">Sesi&oacute;n:<br>
                        - <a href="logout.php">Cerrar sesi&oacute;n </a></p>
                </td>
            </tr>
</table>
</body>
</html>
