<?php session_start(); 
if (!isset($_SESSION["cuenta_paginas"])){ 
   	$_SESSION["cuenta_paginas"] = 1; 
}else{ 
   	$_SESSION["cuenta_paginas"]++; 
} 
?> 
<html>
	<head>
		<title>Autopartes | Inicio</title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon"/>
	</head>
	<body>
	<!--header paer start -->
		<div id="encabezado">
			<ul>
				<li><a href="home.php" class="home">Inicio</a></li>
				<li><a href="#" class="list">Sucursales</a></li>
				<li><a href="pruebas.php" >Pruevas</a></li>
				<li>
					<?php 
						echo '<p>Bienvenido,</p> ';
						if (isset($_SESSION['k_username'])) {
							echo '<li>'.$_SESSION['k_username'].'</li>.';
							echo '<li><a href="../php/logout.php" >Logout</a></li>';
						}else{
							echo '<li><a href="login.php" class="login" >Login</a></li>
							<li><a href="registrar.php" class="login">Registrar</a></li>';
						}
					?>
				</li>
			</ul>
			<h1>AUOTPARTES</h1>
			<form name="search_box" method="post"  action="busqueda.php">
				<label>Busqueda</label>
				<input type="text" name="busqueda" />
				<input type="submit" class="button" value="" />
			</form>
		</div>
		<!--header part end -->
		<!--body part start -->
		<div id="cuerpo">
			<!--left side start -->
			<div id="menuIzq">
				<h2>Partes</h2>
				<ul>
					<li><a href="#">CARROCERIAS</a></li>
					<li><a href="#">MOFLES</a></li>
				</ul>
				<h2>Clientes</h2>
				<ul>
					<li><a href="#">Datos</a></li>
					<li><a href="#">Otros</a></li>
				</ul>
				<p />
			</div>
			<!--left side end -->
			<!--right side start -->
			<div id="informacion">

<?php
include "sesion.php";
?>



			</div>
			<!--right side end -->
			<br class="blank" />
		</div>
		<!--body part end -->
		<!--footer start -->
		<div id="pieDePagina">
			<div id="pie">
				<ul>
					<li><a href="#">Inicio</a></li>
					<li><a href="#">Acerca de Nosotros</a></li>
					<li><a href="#">Sucursales</a></li>
					<li><a href="#">Inscripciones</a></li>
					<li><a href="#">Registros</a></li>
					<li><a href="#">Financiamiento</a></li>
					<li><a href="#">Contactos</a></li>
				</ul>
				<p>&copy; Copyright. All rights reserved.</p>
				<p class="designedBy">Designed by: <a href="#" >Template World</a></p>
			</div>
		</div>
		<!--footer end -->
	</body>
</html>