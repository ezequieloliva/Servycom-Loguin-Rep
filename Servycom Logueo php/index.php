<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
        <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

        <!--[if lte IE 8]><script src=js/ie/html5shiv.js></script><![endif]-->
		<link rel="stylesheet" href=main.css />
		<!--[if lte IE 9]><link rel="stylesheet" href=ie9.css /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href=ie8.css /><![endif]-->
	
<title>Servycom/Login</title>
<script type="text/javascript">
function delayer(){
document.write("<?php getRealIP();?>");
}
</script>
</head>

<body onUnLoad="delayer();">
<script type=”text/javascript”>

document.oncontextmenu = function(){return false;}

</script>
<!-- Header -->
					<header id="header">
						<h1><a href="index.php"></a></h1>
						
					</header>
<!--Menu-->
<section id="banner">
															
					<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<a href="buscador.html" class="image"><img src="img/Logo%20Final%20.png" alt="" /></a>
									<div class="content">
										<h2 class= "logo">Servycom Telecomunicaciones SRL</h2>
									</div>
								</div>
					</section>
 <section id="footer" style="left: 0px; top: -45px; height: 533px">
						<div class="inner">
							<h2 class="major">Logueo</h2>
								<form method="post" action= funciones.php>
								<div class="field">
									<label for="name">Nombre</label>						
									<input type="text" name="name" id "name" value="" required>	
									
								</div>
								<div class="field">
									<label for="clave">DNI</label>
								
								<select name="clave" id "clave" onchange="mostrarValor(this.value);">>
						
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
	                                  </select>


								</div>
								<div class="field">
									<label for="cellid"> Lugar de Trabajo </label>
									<select name="cellid" id="cellid">
									
									<option value="Viajando">En viaje </option>
									<option value="Obra">Obra</option>
									<option value="Oficina">Oficina</option>
									<option value="Deposito">Deposito</option>
									<option value="Descanso">Inicio de Descanso</option>
									<option value="Deposito">Fin de Descanso</option>

                                    </select>
								</div>
								<div class="field">
									<label for="latitud">Latitud</label>
									<input type="text" name="latitud" id="latitud"   readonly="readonly"  required />			
								</div>
								<div class="field">
									<label for="longitud">Longitud</label>
									<input type="text" name="longitud" id="longitud" readonly="readonly"  required />			
								</div>
								<div class="field">
									<label for="fecha">Fecha y Hora</label>
									<input type="text" name="fecha" id="fecha"  readonly="readonly" required />			
								</div>
								<div class="field">
								<ul class="actions">
									<li><input type="submit" onclick="cargarmap()" value="Registrar" class="special" style="" /></li>
								</ul>
								</div>
								
								
</form>
<div class="field">
								<ul class="actions">
								<li><button class="special" onclick="cargarmap()">Cargar Ubicacion / Refrescar</button></li>
								</ul>
</div>
 <!-- Scripts -->
			<script src= js/skel.min.js></script>
			<script src=js/jquery.min.js></script>
			<script src=js/jquery.scrollex.min.js></script>
			<script src=js/util.js></script>
			<!--[if lte IE 8]><script src=js/ie/respond.min.js></script><![endif]-->
			<script src=js/main.js></script>
 <!-- Se determina y escribe la localizacion -->
<div id='ubicacion'></div>
<script type="text/javascript">

</script>

<!-- Se escribe un mapa con la localizacion anterior-->

<div id="demo"></div>
<div id="mapholder"></div>
<p></p>
<div class="inner">
<div class="field">
<script src="http://maps.google.com/maps/api/js?key= AIzaSyBIScIY82vtVXKNVfHf_YHtrByHjRRUXC0"></script>
</div>
</div>

</div>
</section>

<script type="text/javascript">
<!-- Funcion para pasar el nombre a la caja de texto -->




var x=document.getElementById("demo");
<!--Cargar mapa en form -->
function cargarmap(){
navigator.geolocation.getCurrentPosition(showPosition,showError);

<!-- mostrar posicion-->
function showPosition(position)
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  document.getElementById("latitud").value=lat;
  document.getElementById("longitud").value=lon;
  var hoy = new Date();
  var dd = hoy.getDate();
  var mm = hoy.getMonth()+1; //hoy es 0!
  var yyyy = hoy.getFullYear();

if(dd<10) {
    dd='0'+dd
} 

if(mm<10) {
    mm='0'+mm
} 
  document.getElementById("fecha").value= dd+'/'+mm+'/'+yyyy+' - '+hoy.getHours()+':'+hoy.getMinutes();
  latlon=new google.maps.LatLng(lat, lon)
  mapholder=document.getElementById('mapholder')
  mapholder.style.height='200px';
  mapholder.style.width='100%';
  var myOptions={
  center:latlon,zoom:10,
  mapTypeId:google.maps.MapTypeId.ROADMAP,
  mapTypeControl:false,
  navigationControlOptions:{style:google.maps.NavigationControlStyle.SMALL}
  };
  var map=new google.maps.Map(document.getElementById("mapholder"),myOptions);
  var marker=new google.maps.Marker({position:latlon,map:map,title:"You are here!"});
  }
function showError(error)
  {
  switch(error.code) 
    {
    case error.PERMISSION_DENIED:
      x.innerHTML="Denegada la peticion de Geolocalización en el navegador."
      break;
    case error.POSITION_UNAVAILABLE:
      x.innerHTML="La información de la localización no esta disponible."
      break;
    case error.TIMEOUT:
      x.innerHTML="El tiempo de petición ha expirado."
      break;
    case error.UNKNOWN_ERROR:
      x.innerHTML="Ha ocurrido un error desconocido."
      break;
    }
  }}
  <!-- obtener ubicacion-->
  function obtenerLat()
  {
  lat=position.coords.latitude;
  lon=position.coords.longitude;
  return lat
}

</script>


</body>

</html>
<?php
function getRealIP()
{
   $client_ip= $_SERVER["REMOTE_ADDR"];
   $hoy = strftime( "%Y/%m/%d-%H:%M:%S", time() );
   $cn= mysqli_connect("wo22","loguinse_eoliva","Clave123","loguinse_base_loguin");
   $sql="insert into auditoria(ip,fecha_hora) values ('$client_ip','$hoy')";	 
    	$reg1 =	mysqli_query ($cn,$sql);
 	
 		mysqli_close($cn);
   //return $client_ip;
 
}
?>
