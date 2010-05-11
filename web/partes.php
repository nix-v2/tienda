<?php
	session_start(); 
?>
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
$part = isset($_POST["parte"])?$_POST["parte"]:"";

if(isset($_SESSION['k_username'])){

$result = mysql_query("SELECT * FROM productos WHERE nombre='$part' ");

if ($row = mysql_fetch_array($result)){
	echo "<table border = '1'> \n";
//Mostramos los nombres de las tablas
	echo"<tr >";
	echo"<th >"."nombre"."</th> \n";
	echo"<th >"."codigo"."</th> \n";
	echo"<th >"."marca"."</th> \n";
	echo"<th >"."precio"."</th> \n";
	echo"<th >"."descripcion"."</th> \n";
	echo"<tr > \n";
do {
        echo "<tr> \n";
	echo "<td>".$row["nombre"]."</td> \n";
        echo "<td>".$row["codigo"]."</td> \n";
	echo "<td>".$row["marca"]."</td> \n";
	echo "<td>".$row["precio_unitario"]."</td> \n";
        echo "<td>".$row["descripcion"]."</td> \n";
        echo "</tr> \n";
    } while ($row = mysql_fetch_array($result));
        echo "</table> \n";
//opcion comprar
echo   "<td> <form method=\"post\" action=\"buyPartes.php\">	
	<input type=\"submit\" name=\"parte\" value=\"Comprar\" </td>\n";
} else {
echo " ¡se ha producido un error!";
}
}else{
echo "ne cesita ser usuario para poder ver este contenido.";
echo   '<li><a href="login.php" class="login" >Login</a></li>
	<li><a href="registrar.php" class="login">Registrar</a></li>';
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
