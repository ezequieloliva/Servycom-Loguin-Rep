	<!DOCTYPE HTML>
<html>
<?php ob_start() ?>
	<head>
		<title>Adminstrador</title>
		 <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	    <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />

        <!--[if lte IE 8]><script src=js/ie/html5shiv.js></script><![endif]-->
		<link rel="stylesheet" href=main.css />
		<!--[if lte IE 9]><link rel="stylesheet" href=ie9.css /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href=ie8.css /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper" style="left: 0px; top: 0px; height: 822px">

				<!-- Header -->
					<header id="header">
						
						<nav>
							<a href= index.php>Volver</a>
						</nav>
					</header>

				
				<!-- Wrapper -->
					<section id="three" class="wrapper spotlight style3">
								<div class="inner">
									<a href="#" class="image"><img src="img/Logo%20Final%20.png" alt="" /></a>
									<div class="content">
										<h2 class= "logo">Servycom Telecomunicaciones SRL</h2>
									</div>
								</div>
					</section>

				<!-- Content -->
	<section id="footer" style="left: 0px; top: -45px; height: 533px">
						<div class="inner">
							<h2 class="major">Login</h2>
								<form method="post" action= Login.php>
								<div class="field">
									<label for="user">Usuario</label>
									<input type="text" name="user" id="user" />
								</div>
								<div class="field">
									<label for="pass">Clave</label>
									<input type="password" name="pass" id="pass" />
								</div>
								<ul class="actions">
									<h1><a href="funcionesLogin.php"> Registros de Logueo</a></h1>							
								</ul>
								<ul class="actions">
									<h1><a href="usuarios.php"> Usuarios</a></h1>							
								</ul>
								<ul class="actions">
									<h1><a href="administradores.php"> Administradores</a></h1>							
								</ul>


								</form>
								
							</div>
						</section>
							

</div>
  </body>
						
<!-- Scripts -->
			<script src= js/skel.min.js></script>
			<script src=js/jquery.min.js></script>
			<script src=js/jquery.scrollex.min.js></script>
			<script src=js/util.js></script>
			<!--[if lte IE 8]><script src=js/ie/respond.min.js></script><![endif]-->
			<script src=js/main.js></script>

<?php ob_end_flush(); ?>	
</html>