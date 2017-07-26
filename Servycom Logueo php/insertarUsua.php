<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Control de empleados</title>
</head>

<body>
<?php

if(isset($_POST['AceptarNuevo']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['nameIn'];
		$dni = $_POST['dniIn'];
		
		
               
		$sql="insert into usuario values ('$dni','$nombre')";  
    	$reg1 =	mysqli_query ($cn,$sql); 	
 		mysqli_close($cn);
 		require ('usuarios.php');
    		 }      
 }
 if(isset($_POST['AceptarModificar']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['nameMod'];
		$dni = $_POST['dniMod'];
		
		
               
		$sql= "update usuario set nombre='$nombre' where dni='$dni'";  
    	$reg1 =	mysqli_query ($cn,$sql); 	
 		mysqli_close($cn);
 		require ('usuarios.php');
    		 }      
 }

 if(isset($_POST['AceptarEliminar']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['eliminar'];
		
               
		$sql1= "delete from usuario where nombre='$nombre'";  
    	$reg1 =	mysqli_query ($cn,$sql1); 	
 		mysqli_close($cn);
 		require ('usuarios.php');
    		 }      
 }
?>
</body>

</html>
