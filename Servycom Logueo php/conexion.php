<?php
	
	
	$mysqli=new mysqli("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin"); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>