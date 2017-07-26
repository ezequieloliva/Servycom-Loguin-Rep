<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
	 
		$cn= mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
	    $nombre = $_POST['name'];
        $fecha = $_POST['fecha'];
        $dni=$_POST['clave'] ;
        $latitud=$_POST['latitud']	 ;
        $longitud=$_POST['longitud'] ;
        $cellid=$_POST['cellid'] ;
		$mes=date("m");
		$año=date("Y");
		$dia=date("d");
		$hora=date("G");
		$diaSemana=Date("w");

    		 
    
    	$sql="insert into login values ('$dni' , '$nombre', '$fecha', '$latitud', '$longitud', '$cellid','$dia','$mes','$año','$hora','$diaSemana')";	 
    	$reg1 =	mysqli_query ($cn,$sql);
 	
 		mysqli_close($cn);
 		echo"<script type=\"text/javascript\">alert('Datos ingresados correctamente'); window.location='index.php';</script>";         
 

?>

</body>

</html>
