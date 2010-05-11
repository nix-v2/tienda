<?php 
	session_start();
	include 'conexion.php';
	function formRegistro(){
?>
		<table class="login">
			<form action="registrar.php" method="post">
				<tr>
					<th>Nombre (max 20):</th>
					<th><input type="text" name="name" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th>Usuario (max 20):</th>
					<th><input type="text" name="username" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th>Password (max 10):</th>
					<th><input type="password" name="password" size="10" maxlength="10" /></th>
				</tr>
				<tr>
					<th>Confirma: </th>
					<th><input type="password" name="password2" size="10" maxlength="10" /></th>
				</tr>
				<tr>
					<th>Email (max 40):</th>
					<th><input type="text" name="email" size="20" maxlength="40" /></th>
				</tr>
				<tr>
					<th>Telefono (max 20):</th>
					<th><input type="text" name="telefono" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th>Direccion (max 40):</th>
					<th><input type="text" name="direccion" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th>Codigo Postal (max 20):</th>
					<th><input type="text" name="zip" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th>Estado (max 20):</th>
					<th><input type="text" name="estado" size="20" maxlength="20" /></th>
				</tr>
				<tr>
					<th><input type="submit" value="Registrar" /></th>
				</tr>
			</form>
		</table>
<?php
	}
	// verificamos si se han enviado ya las variables necesarias.
	if (isset($_POST["username"])) {
	    $username = $_POST["username"];
	    $password = $_POST["password"];
	    $password2 = $_POST["password2"];
	    $email = $_POST["email"];
	    // Hay campos en blanco
	    if($username==NULL|$password==NULL|$password2==NULL|$email==NULL) {
	        echo "un campo est&aacute; vacio.";
	        formRegistro();
	    }else{
	        // ¿Coinciden las contrase&ntilde;as?
	        if($password!=$password2) {
	            echo "Las contrase&ntilde;as no coinciden";
	            formRegistro();
	        }else{
	            // Comprobamos si el nombre de usuario o la cuenta de correo ya exist&iacute;an
	            $checkuser = mysql_query("SELECT usuario FROM usuarios WHERE usuario='$username'");
	            $username_exist = mysql_num_rows($checkuser);
	           
	            $checkemail = mysql_query("SELECT email FROM usuarios WHERE email='$email'");
	            $email_exist = mysql_num_rows($checkemail);
	   
	            if ($email_exist>0|$username_exist>0) {
	                echo "El nombre de usuario o la cuenta de correo estan ya en uso";
	                formRegistro();
	            }else{
	                $query = 'INSERT INTO usuarios (usuario, password, email, fecha)
	                VALUES (\''.$username.'\',\''.$password.'\',\''.$email.'\',\''.date("Y-m-d").'\')';
	               
	                mysql_query($query) or die(mysql_error());
	                echo 'El usuario '.$username.' ha sido registrado de manera satisfactoria.<br />';
	                echo 'Ahora puede entrar ingresando su usuario y su password <br />';
	                include 'validar_usuario.php';
	            }
	        }
	    }
	}else{
	    formRegistro();
	}
?>
