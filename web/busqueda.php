<html>
	<head>
		<title>Autopartes | Busqueda </title>
		<link href="style.css" rel="stylesheet" type="text/css" />
		<link rel="shortcut icon" href="imagenes/favicon.ico" type="image/x-icon"/>
	</head>
	<body>
	<!--header paer start -->
		<div id="encabezado">
			<ul>
				<li><a href="home.php" class="home">Inicio</a></li>
				<li><a href="#" class="list">Sucursales</a></li>
				<li><a href="login" class="login">Login/Registro</a></li>
				<li><a href="pruebas.php" >Pruevas</a></li>
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
					include "../php/conexion.php";
					$busq = isset($_POST["busqueda"])?$_POST["busqueda"]:"";
					//comprobamos que no esta vacio
					trim ($busq);
					if (!$busq){
						echo "Campo de b&uacute;squeda vac&iacute;o. Int&eacute;ntalo de nuevo. ";
					}else{
						$result = mysql_query("SELECT * FROM productos WHERE nombre LIKE '%$busq' OR marca LIKE '%$busq' OR modelo LIKE '%$busq' ");
						if ($row = mysql_fetch_array($result)){
							echo "<table>";
								//Mostramos los nombres de las tablas						 		echo"<tr>";
									echo"<th>codigo</th>";
									echo"<th>nombre</th>";
									echo"<th>descripcion</th>";
								echo"</tr>";
								do {
									echo"<tr>";
										echo"<td><a href =\"#\">".$row["codigo"]."</a></td>";
										echo"<td>".$row["nombre"]."</td>";
										echo"<td>".$row["descripcion"]."</td>";
									echo"</tr>";
								} while ($row = mysql_fetch_array($result));
							echo "</table>";
							} else {
							echo "&#161; No se ha encontrado ning&uacute;n registro !";
						}
					}
					include "../php/close_conexion.php";
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
