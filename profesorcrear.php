<?php
	session_start();
		if(!isset($_SESSION['profesorf'])){
		$profesorf['Dni'] = "";
		$profesorf['Telefono'] = "";
		$profesorf['Nombre'] = "";
		$profesorf['Apellidos'] = "";
		$profesorf['FechaNacimiento'] = "";
		$profesorf['Email'] = "";
		$_SESSION['profesorf']=$profesorf;
		}else {
			$profesorf = $_SESSION['profesorf']; 
			
		}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<title>Profesor</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body background="images/fondo.jpg">

		<div align = "center" id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearprofesor.php">
				
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
								<input id="Nombre" type="text" name="Nombre" size="30" maxlength="30" value="<?php echo $profesorf['Nombre'];?>" required="required">
							</div>
							<br />
							<div id="apellidos">
								<label>Apellidos:</label>
								<br>
								<input id="Apellidos" type="text" name="Apellidos" size="10" maxlength="30" required value="<?php echo $profesorf['Apellidos'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Fecha de Nacimiento:</label>
								<br>
								<input id="FechaNacimiento" type="date" name="FechaNacimiento" size="10" maxlength="30" required value="<?php echo $profesorf['FechaNacimiento'];?>" >
							</div>
							<br/>
							<div id="dni">
								<label>DNI:</label>
								<br>
								<input id="Dni" type="text" name="Dni" size="9" maxlength="9" required value="<?php echo $profesorf['Dni'];?>" >
							</div>
							<br/>
							<div id="telefono">
								<label>Teléfono:</label>
								<br>
								<input id="Telefono" type="text" name="Telefono" size="9" maxlength="9"  required value="<?php echo $profesorf['Telefono'];?>" >
								<br>
								<br>
							</div>
							<div id="email">
								<label>Email:</label>
								<br>
								<input id="Email" type="email" name="Email" size="10" maxlength="30" required value="<?php echo $profesorf['Email'];?>" >
								<br>
								<br>
							</div>
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir profesor
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>