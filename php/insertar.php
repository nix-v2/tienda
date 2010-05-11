<?php
//Conexion con la base selección de la base de datos con la que vamos a trabajar 
	include "conexion.php";
	//Ejecucion de la sentencia SQL
	$nick = isset($_POST["nick"])?$_POST["nick"]:"";
	
	$passwd = isset($_POST["password"])?$_POST["password"]:"";
	$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
	$correo = isset($_POST["correo"])?$_POST["correo"]:"";
	mysql_query("insert into usuarios (nick,passwrd,nombre,correo)
	values ('$nick','$passwd','$nombre','$correo')");
	include "close_conexion.php";
	header ("Location: http://localhost/autopartes/home.php");
?>
	