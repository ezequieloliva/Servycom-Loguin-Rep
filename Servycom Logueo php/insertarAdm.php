<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Control de Administradores</title>
</head>

<body>
<?php

if(isset($_POST['AceptarNuevo']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['nameIn'];
		$dni = $_POST['dniIn'];
		$clave = $_POST['claveIn'];
		
               
		$sql="insert into administrador values ('$dni','$nombre','$clave')";  
    	$reg1 =	mysqli_query ($cn,$sql); 	
 		mysqli_close($cn);
 		require ('administradores.php');
    		 }      
 }
 if(isset($_POST['AceptarModificar']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['nameMod'];
		$dni = $_POST['dniMod'];
		$clave = $_POST['claveMod'];
		
               
		$sql= "update administrador set nombre='$nombre', clave='$clave' where dni='$dni'";  
    	$reg1 =	mysqli_query ($cn,$sql); 	
 		mysqli_close($cn);
 		require ('administradores.php');
    		 }      
 }

 if(isset($_POST['AceptarEliminar']))
{
if (!empty ($_POST))  {

		$cn = mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	       
		$nombre  = $_POST['eliminar'];
		
               
		$sql1= "delete from administrador where nombre='$nombre'";  
    	$reg1 =	mysqli_query ($cn,$sql1); 	
 		mysqli_close($cn);
 		require ('administradores.php');
    		 }      
 }
?>


</body>

</html>
