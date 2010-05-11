<!-- Manual de PHP de WebEstilo.com --> 
<html> 
<head> 
   <title>Ejemplo de PHP</title> 
</head> 
<body> 
<H1>Ejemplo de uso de bases de datos con PHP y MySQL</H1> 
<FORM ACTION="procesar.php"> 
<TABLE> 
<TR> 
   <TD>Nombre:</TD> 
   <TD><INPUT TYPE="text" NAME="nombre" SIZE="20" MAXLENGTH="30"></TD> 
</TR> 
<TR> 
   <TD>Apellidos:</TD> 
   <TD><INPUT TYPE="text" NAME="apellidos" SIZE="20" MAXLENGTH="30"></TD> 
</TR> 
</TABLE> 
<INPUT TYPE="submit" NAME="accion" VALUE="Grabar"> 
</FORM> 
<hr> 
<?php 
   include("conexion.php"); 
   $link=Conectarse(); 
   $result=mysql_query("select * from prueba",$link); 
?> 
   <TABLE BORDER=1 CELLSPACING=1 CELLPADDING=1> 
      <TR><TD>&nbsp;<B>Nombre</B></TD> <TD>&nbsp;<B>Apellidos</B>&nbsp;</TD></TR> 
<?php       

   while($row = mysql_fetch_array($result)) { 
      printf("<tr><td>&nbsp;%s</td> <td>&nbsp;%s&nbsp;</td></tr>", $row["Nombre"], $row["Apellidos"]); 
   } 
   mysql_free_result($result); 
   mysql_close($link);    
?> 
</table> 
</body> 
</html> 