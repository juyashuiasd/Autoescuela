<?php
	session_start();
	// Importar librerías necesarias para gestionar direcciones y géneros literarios
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
	
	// Si no existen datos del formulario en la sesión, se crea una entrada con valores por defecto
	if (!isset($_SESSION['usuariof'])) {
		$usuariof['Usuario'] = "";
		$usuariof['Contrasena'] = "";
		$usuariof['ContrasenaConfirmar'] = "";
	
		$_SESSION['usuariof'] = $usuariof;
	}
	// Si ya existían valores, los cogemos para inicializar el formulario
	else
		$usuariof = $_SESSION['usuariof'];
	
	// Creamos una conexión con la BD
	$conexion = crearConexionBD();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../images/cochecito.png" />
  <link rel="stylesheet" type="text/css" href="css/admin.css" />
  <script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_usuario.js" type="text/javascript"></script>
  <title>Alta de usuario</title>
</head>

<body>
	
	
	
		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
	<?php 
		// Mostrar los erroes de validación (Si los hay)
		if (isset($errores) && count($errores)>0) { 
	    	echo "<div id=\"div_errores\" class=\"error\">";
			echo "<h4> Errores en el formulario:</h4>";
    		foreach($errores as $error){
    			echo $error;
			} 
    		echo "</div>";
  		}
	?>
	
	
	<form id="altaUsuario" method="get" action="crearusuario.php" onsubmit="return validateForm()">

		<fieldset><legend>Datos de cuenta</legend>
			
			<div><label for="nick">Nickname:</label>
				
				<input id="Usuario" name="Usuario" type="text" size="40" required value="<?php echo $usuariof['Usuario'];?>" />
				
			</div>
			<div><label for="pass">Password:<em>*</em></label>
				
                <input type="password" name="Contrasena" id="Contrasena"  pattern="(SUPER.+)?" placeholder="Mínimo 6 caracteres entre letras" required oninput="passwordValidation();"/>
                
			</div>
			<div><label for="confirmpass">Confirmar Password: </label>
				<input type="password" name="ContrasenaConfirmar" id="ContrasenaConfirmar" pattern="(SUPER.+)?"  placeholder="Confirmación de contraseña"  required oninput="passwordConfirmation();" "/>
			</div>
			
		</fieldset>
		<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir usuario
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>
	
	<?php
		cerrarConexionBD($conexion);
	?>
	
	</body>
</html>