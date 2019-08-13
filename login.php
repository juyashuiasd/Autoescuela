<?php
	session_start();
  	
  	include_once("gestionBD.php");
 	include_once("gestionarBD.php");
	
	if (isset($_POST['iniciar'])){
		$usuario= $_POST['usuario'];
		$contrasena = $_POST['contrasena'];

		$conexion = crearConexionBD();
		$num_usuarios = consultar_usuario($conexion,$usuario,$contrasena);
		cerrarConexionBD($conexion);	
	
		if ($num_usuarios == 0)
			$login = "error";	
		else {
			$_SESSION['login'] = $usuario;
			Header("Location: admin.html");
		}	
	}

?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../images/cochecito.png" />
  <link rel="stylesheet" type="text/css" href="css/admin.css"" />
  <title>Login</title>
</head>

<body>
<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
<main>
	<?php if (isset($login)) {
		echo "<div class=\"error\">";
		echo "Usuario o contraseña incorrectos";
		echo "</div>";
	}	
	?>
	
	<form action="login.php" method="post">
		<div><label for="usuario">Usuario: </label><input type="text" name="usuario" id="usuario" /></div>
		<div><label for="contrasena">Contraseña: </label><input type="password" name="contrasena" id="contrasena" /></div>
		<input type="submit" name="iniciar" value="iniciar" />
	</form>
		
	<p>¿No estás registrado? <a href="usuariocrear.php">¡Registrate!</a></p>
</main>

</body>
</html>
