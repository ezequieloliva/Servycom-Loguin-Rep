<!DOCTYPE HTML>

<html>


	<head>
		<title>Logueos</title>		
  <link href=css/font-awesome.min.css rel="stylesheet" type="text/css">
  <link href=css/bootstrap.min.css rel="stylesheet" type="text/css">
  <link href=css/bootstrap-datetimepicker.min.css rel="stylesheet" type="text/css">  
  <link href= css/flexslider.css rel="stylesheet" type="text/css">
  <link href= css/templatemo-style.css rel="stylesheet" type="text/css">
 
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
	.auto-style5 {
	margin-bottom: 0;
}
	.auto-style6 {
	margin-top: 30px;
}
	</style>
	</head>
	<body>
	

	<!-- Header -->
					<header id="header" style="height: 148px">
					<form name="form1"  method="get" >

						<div class="auto-style3">

						<h1 class="auto-style2"><a href= Login.php>
						<span class="auto-style1">Volver</span></a></h1>
							<div class="auto-style4" style="height: 150px">
						<label for="filtro">Filtrar por:</label>
						<select name="filtro" >
					
									<?php 
		                                $cn=new mysqli("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
 		                                $registros= $cn->query("select * from usuario");
		                                while ($filas=$registros->fetch_array())
		                                  { echo "<option value='$filas[dni]'>";
   		                                   echo "$filas[nombre]";
    		                               echo "</option>";
		                                  }
		                                   $cn->close();
	                                  ?>
	                                  					
						</select>
						<input type="submit" value="Buscar"  onclick = "this.form.action = 'funcionesLogin.php'"   >
						<input type="submit" value="Hoy"  onclick = "this.form.action = 'LoguinHoy.php'"   >
						<input type="submit" value="Mes"  onclick = "this.form.action = 'LoguinMes.php'"   >
					     <input type= "submit" value="Exportar" onclick = "this.form.action = 'prueba.php'" ><br>&nbsp;<div class='input-group date' id='datetimepicker2' style="width: 10%">
                         
                         
                         						  
                           <input type='text'  placeholder="Desde"  name="desde" id="desde" class="auto-style5" >
							         <span class="input-group-addon">
							               <span class="fa fa-calendar"></span>
							         </span>
					   
					     </div>
						 <div class='input-group date' id='datetimepicker2' style="width: 10%">
						 	   <input type='text' placeholder="Hasta" name="hasta" id="hasta" class="auto-style5" >
							         <span class="input-group-addon">
							               <span class="fa fa-calendar"></span>
							         </span>
						 </div>

						
					     
                        </div>
						
						</div>
                     		</form>	
				
					</header>
 
	<div id="cuadro" class="auto-style6">
		<center>
		<img src= Logo%20Final%20.png width="349" height="176"><br>
		<div id="titulo">
		<center><h1>Registros</h1></center>
		</div>
		
		<table>
			<thead>
				<tr class="centro">
					<td>DNI</td>
					<td>NOMBRE</td>
					<td>FECHA</td>
					<td>LAT</td>
					<td>LONG</td>
					<td>CELL</td>
				</tr>
				<tbody>
<?php
session_start(); 
ob_start();
	require('conexion.php');
	
if (isset($_GET['filtro'])) {
$dni = $_GET['filtro'];
} else {
$dni = "";
}
if (isset($_GET['desde'])) {
$desde = $_GET['desde'];//. ' - 00:00';
} else {
$desde = "error";
}
if (isset($_GET['hasta'])) {
$hasta = $_GET['hasta'];//. ' - 23:59';
} else {
$hasta = "error";
}


		$_SESSION['resultado']=$dni;
		$_SESSION['desdee']=$desde;
		$_SESSION['hastaa']=$hasta;
	$query="SELECT * FROM login WHERE dni='$dni' AND fecha BETWEEN '$desde' AND '$hasta' ";
    //echo $query
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
											<?php } ?>
				</tbody>
			</table>	
			</center>
		</div>
		   

	<script type="text/javascript" src= js/jquery-1.11.2.min.js></script>      		<!-- jQuery -->
  	<script type="text/javascript" src= js/moment.js></script>							<!-- moment.js -->
	<script type="text/javascript" src= js/bootstrap.min.js></script>					<!-- bootstrap js -->
	<script type="text/javascript" src= js/bootstrap-datetimepicker.min.js></script>	<!-- bootstrap date time picker js, http://eonasdan.github.io/bootstrap-datetimepicker/ -->
	<script type="text/javascript" src= js/jquery.flexslider-min.js></script>
	<script src=js/froogaloop.js></script>
	<script src=js/jquery.fitvid.js></script>
   	<script type="text/javascript" src=js/templatemo-script.js></script>      		<!-- Templatemo Script -->
  
   <script type="text/javascript">
 
	
		$(function() {

			$('#hotelCarTabs a').click(function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

        	$('.date').datetimepicker({
            	format: 'DD/MM/YYYY'
            });
            $('.date-time').datetimepicker();

			// https://css-tricks.com/snippets/jquery/smooth-scrolling/
		  	$('a[href*=#]:not([href=#])').click(function() {
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html,body').animate({
			          scrollTop: target.offset().top
			        }, 1000);
			        return false;
			      }
			    }
		  	});
		});
		
		
		$(window).load(function() {	  		
			

			  

//	para imagenes nomas
		    $('.flexslider').flexslider({
			    controlNav: false
		    });


	  	});
	  	

	  	
	</script>
	

	
		</body>
		
				</html>	
		

  
	
