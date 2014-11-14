<?php
		function Conectar()
		{
		$conexion=mysql_connect("127.0.0.1","root","root");
		mysql_select_db("biblioteca_db", $conexion) or die("Se produjo un error en la conexion con la Base de Datos.");
		}
?>