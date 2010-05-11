<?php
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$db="autopartes";

$conexion=mysql_connect($dbhost,$dbuser,$dbpassword)or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
mysql_select_db($db,$conexion)or die ('Error al seleccionar la Base de Datos: '.mysql_error());;

?>