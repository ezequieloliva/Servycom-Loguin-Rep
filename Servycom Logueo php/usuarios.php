
<html>
	<head>
		<title>Usuarios</title>
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
	.auto-style3 {
	text-align: center;
}
	.auto-style4 {
	text-align: left;
}
	</style>
	</head>
	<body>
	

	<!-- Header -->
					<header id="header" style="height: 77px">
					<form name="form1"  method="get" >

						<div class="auto-style3">

						<h1 class="auto-style2"><a href= Login.php>
						<span class="auto-style1">Volver</span></a></h1>
					    </DIV>
				     </form>	
				
					</header>
<form method= "post" action= insertarUsua.php> 
					<HR width=80% align="center">
					<nav id="menu">
						<div class="inner">
							<h4>Ingresar Nuevo Empleado:</h4>
							<ul >
							     <label for="name">Nombre:</label>
							     <input type="text" name="nameIn" id="nameIn">
							     <label for="dni">DNI:</label>
							     <input type="text" name="dniIn" id="dniIn">
							     <input type="submit" name="AceptarNuevo" value="Insertar" class="special">


							</ul>
						</div>
					</nav>
				
					<HR width=80% align="center">
					<nav id="menu">
						<div class="inner">
							<h4>Modificar Datos de Empleado:</h4>
							<ul >
							     <label for="name">Nombre:</label>
							     <input type="text" name="nameMod" id="nameMod">
							     <label for="dni">DNI:</label>
							     
							     <Select name="dniMod" id="dniMod">
							    <?php 
		                                $cn=new mysqli("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
 		                                $registros= $cn->query("select * from usuario");
		                                while ($filas=$registros->fetch_array())
		                                  { echo "<option value='$filas[dni]'>";
   		                                   echo "$filas[dni]";
    		                               echo "</option>";
		                                  }
		                                   $cn->close();
	                                  ?>

							     </Select>
							     <input type="submit" name="AceptarModificar" value="Modificar" class="special">



							</ul>
						</div>
					</nav>
					<HR width=80% align="center">
					<nav id="menu">
						<div class="inner">
							<h4>Eliminar Empleado:</h4>
							<ul >
							    <Select name="eliminar" id="eliminar">
							    <?php 
		                                $cn=new mysqli("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
 		                                $registros= $cn->query("select * from usuario");
		                                while ($filas=$registros->fetch_array())
		                                  { echo "<option value='$filas[nombre]'>";
   		                                   echo "$filas[nombre]";
    		                               echo "</option>";
		                                  }
		                                   $cn->close();
	                                  ?>

							    </Select>
							    <input type="submit" name="AceptarEliminar" value="Eliminar" class="special">


							</ul>
						</div>
					</nav>


</form>

	<div id="cuadro">
		<center>
		<img src= "Logo Final .png" width="349" height="176"><br>
		<div id="titulo">
		<center><h1>Empleados autorizados</h1></center>
	</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>DNI</td>
					<td>Nombre</td>
					
				</tr>
				<tbody>
<?php
	require('conexion.php');
	$query="SELECT *  FROM usuario";

		
?>

<?php $resultado=$mysqli->query($query);
	 while($row=$resultado->fetch_assoc()){
?>
									
						<tr>
							<td><?php echo $row['dni'];?>
							</td>
							<td>
								<?php echo $row['nombre'];?>
							</td>
							
						</tr>
						
					<?php } ?>
				</tbody>
			</table>	
			</center
		
	</body>
		</div>
				</html>	
