<?php session_start();
 
//datos para establecer la conexion con la base de mysql.
mysql_connect('localhost','tomcat','tomcat00')or die ('Ha fallado la conexi&oacute;n: '.mysql_error());
mysql_select_db('autopartes')or die ('Error al seleccionar la Base de Datos: '.mysql_error());
 
function quitar($mensaje)
{
    $nopermitidos = array("'",'\\','<','>',"\"");
    $mensaje = str_replace($nopermitidos, "", $mensaje);
    return $mensaje;
}     
 
if(trim($HTTP_POST_VARS["usuario"]) != "" && trim($HTTP_POST_VARS["password"]) != "")
{
    // Puedes utilizar la funcion para eliminar algun caracter en especifico
    //$usuario = strtolower(quitar($HTTP_POST_VARS["usuario"]));
    //$password = $HTTP_POST_VARS["password"];
   
    // o puedes convertir los a su entidad HTML aplicable con htmlentities
    $usuario = strtolower(htmlentities($HTTP_POST_VARS["usuario"], ENT_QUOTES));   
    $password = $HTTP_POST_VARS["password"];
     
 
    $result = mysql_query('SELECT password, usuario FROM usuarios WHERE usuario=\''.$usuario.'\'');
    if($row = mysql_fetch_array($result)){
        if($row["password"] == $password){
 
            $_SESSION["k_username"] = $row['usuario'];
           
            echo 'Has sido logueado correctamente '.$_SESSION['k_username'].' <p>';
            echo '<a href="index.php">Index</a></p>';
           
            //Elimina el siguiente comentario si quieres que re-dirigir autom&aacute;ticamente a index.php
           
            /*Ingreso exitoso, ahora sera dirigido a la pagina principal.
            <SCRIPT LANGUAGE="javascript">
            location.href = "index.php";
            </SCRIPT>*/
 
        }else{
            echo 'Password incorrecto';
        }
    }else{
        echo 'Usuario no existente en la base de datos';
    }
    mysql_free_result($result);
}else{
    echo 'Debe especificar un usuario y password';
}
mysql_close();
?>
