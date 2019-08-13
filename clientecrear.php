<?php

	session_start();
		if(!isset($_SESSION['clientef'])){
		$clientef['Dni'] = "";
		$clientef['Telefono'] = "";
		$clientef['Nombre'] = "";
		$clientef['Apellidos'] = "";
		$clientef['FechaNacimiento'] = "";
		$clientef['Email'] = "";
		$_SESSION['clientef']=$clientef;
		}else {
			$clientef = $_SESSION['clientef']; 
			
		}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Cliente</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body>

		<div id = "general">
			<img width="100%" alt = "Header" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearcliente.php">
				
				<fieldset>
					<legend align="left">
						Datos Personales:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div id="nombre">
								<label>Nombre:</label>
								<br>
								<input id="Nombre" type="text" name="Nombre" size="30" maxlength="30" value="<?php echo $clientef['Nombre'];?>" required="required">
							</div>
							<br />
							<div id="apellidos">
								<label>Apellidos:</label>
								<br>
								<input id="Apellidos" type="text" name="Apellidos" size="10" maxlength="30" required value="<?php echo $clientef['Apellidos'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Fecha de Nacimiento:</label>
								<br>
								<input id="FechaNacimiento" type="date" name="FechaNacimiento" size="10" maxlength="30" required value="<?php echo $clientef['FechaNacimiento'];?>" >
							</div>
							<br/>
							<div id="dni">
								<label>DNI:</label>
								<br>
								<input id="Dni" type="text" name="Dni" size="9" maxlength="9" required value="<?php echo $clientef['Dni'];?>" >
							</div>
							<br/>
							<div id="telefono">
								<label>Teléfono:</label>
								<br>
								<input id="Telefono" type="text" name="Telefono" size="9" maxlength="9"  required value="<?php echo $clientef['Telefono'];?>" >
								<br>
								<br>
							</div>
							<div id="email">
								<label>Email:</label>
								<br>
								<input id="Email" type="email" name="Email" size="10" maxlength="30" required value="<?php echo $clientef['Email'];?>" >
								<br>
								<br>
							</div>
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir cliente
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>