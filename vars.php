<?php
		function Conectar()
		{
		$conexion=mysql_connect("127.0.0.1","videoclub_user","1234");
		mysql_select_db("videoclubdb", $conexion) or die("Se produjo un error en la conexion con la Base de Datos.");
		}
?>