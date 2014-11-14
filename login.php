<?php
		include "vars.php";
		Conectar();		   
	 $identificacion= $_POST['identificacion'];
	 $password = $_POST['password'];
		$clausula="SELECT * FROM usuario WHERE apodo='$identificacion' AND password='$password'";
		$result=mysql_query($clausula);
		$row=mysql_fetch_array($result);
				// Si el numero de registros que lo cumplen es mayor que 0 correcto, si no es que no hay ninguna error.
			if (mysql_num_rows($result)>0) {
			session_start();
			$_SESSION['logueado'] = 1;
			$_SESSION['id'] = $row[id];
            $_SESSION['tipo_usuario'] = $row['tipo'];
			//setcookie("videoclubNTI", $row[idSocio], time()+36000,"/","");
			header("Location:index.php?contenido=principal");

			} 
			else {
			header("Location:index.php?contenido=portada") ;
			}	 
	?>