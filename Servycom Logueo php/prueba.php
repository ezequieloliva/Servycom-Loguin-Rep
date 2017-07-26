
<html>
	<head>
		<title>prueba.php</title>
<style type="text/css">


/* Datagrid */
	body {
  font: normal medium/1.4 sans-serif;
  background: linear-gradient( 0deg, #C0C0C0   , #F8F8F8);}
table {
  border-collapse: collapse;
  width: 100%;
}
th, td {
  padding: 0.25rem;
  border: 1px solid #ccc;
}
tbody tr:nth-child(odd) {
  background: #eee;
}
.centro{
  padding: 0.5rem;
  background: #484848 ;
  color: white;
  text-align: center;
  font-size: 21px;

}

#cuadro{
	width: 90%;
	background: #F8F8F8 ;
	padding: 25px;
	margin: 5px auto;
	border: 3px solid #D8D8D8;
}
#titulo{
	width: 100%;
	background: #282828;
	color:white;

}
	.newStyle1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: medium;
	color: #000000;
}
.auto-style1 {
	color: #000000;
	font-size: small;
}
.auto-style2 {
	text-align: right;
}
	</style>
	</head>
	<body>
	

	<!-- Header -->
		
	<div id="cuadro">
		<center>
		<div >
		<center><h1>Registros</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>DNI</td>
					<td>Nombre</td>
					<td>FECHA</td>
					<td>LAT</td>
					<td>LONG</td>
					<td>CELL</td>
				</tr>
				<tfoot>
				<tbody>
<?php
session_start(); //esta linea tiene que ir antes de cualquier cosa, incluso de espacios
ob_start(); 
	require('conexion.php');
	
	$dni= $_SESSION['resultado']; 
	$desde= $_SESSION['desdee'];
	$hasta= $_SESSION['hastaa'];
	

	$query="SELECT *  FROM login WHERE dni='$dni' AND fecha BETWEEN '$desde' AND '$hasta' ";
		echo $query
     ?>


<?php $resultado=$mysqli->query($query);
	 while($row=$resultado->fetch_assoc()){
$nombre=$row['nombre'];
  
?>
	 

									
									

						<tr>
							<td><?php echo $row['dni'];?>
							</td>
							<td>
								<?php echo $row['nombre'];?>
							</td>
							<td>
								<?php echo $row['fecha'];?>
							</td>
							<td>
								<?php echo $row['latitud'];?>
							</td>
							<td>
								<?php echo $row['longitud'];?>
							</td>
							<td>
								<?php echo $row['cellid'];?>
							</td>

						</tr>
					

					<?php  } ?>
<?php
header("Pragma: public");
header("Expires: 0");
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$nombre.xls");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
?>


				</tbody>
				</tfoot>
				</thead>
			</table>	
			
			</center>

		</div>
	
		

  

	
		</body>
		
				</html>	
		

  
	
