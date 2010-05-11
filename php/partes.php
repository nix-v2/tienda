<html>
<body>
<div id="tablaPartes">

<?php 
include "conexion.php";
$part = isset($_POST["parte"])?$_POST["parte"]:"";

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
} else {
echo "¡se ha producido un error!";
}
include "close_conexion.php";
?> </div>
<div id="comprar">
<form method ="post" action="getProductos.php">
<input type="submit" name="compra" value="comprar" >
</div>

</body>
</html>
