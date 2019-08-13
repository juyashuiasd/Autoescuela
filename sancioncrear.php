<?php
	session_start();
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
	
		if(!isset($_SESSION['sancionf'])){
		$sancionf['Id_persona'] = "";
		$sancionf['FechaInicio'] = "";
		$sancionf['FechaFinal'] = "";
		$_SESSION['sancionf']=$sancionf;
		}else {
			$sancionf= $_SESSION['sancionf']; 
			
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
		<title>Sanción</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_sancion.js" type="text/javascript"></script>
	</head>

	<body>

		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearsancion.php">
				
				<fieldset>
					<legend align="left">
						Sanción:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div>
								<label for="carn">Id persona:<em>*</em></label>
							<input list="opcionesPersona" name="Id_persona" id="Id_persona" required value="<?php echo $sancionf['Id_persona'];?>"/>
			<datalist id="opcionesPersona">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$carnes= listarCliente($conexion);
					cerrarConexionBD($conexion);

			  		foreach($carnes as $Id_tipo_carne) {
			  			echo "<option label='".$Id_tipo_carne["NOMBRE"]." ".$Id_tipo_carne["APELLIDOS"]."' value='".$Id_tipo_carne["ID_PERSONA"]."'>";
					}
				?>
			</datalist>
			</div> <br/>
							<div id="fecha">
								<label>Fecha de inicio:</label>
								<br>
								<input id="FechaInicio" type="date" name="FechaInicio" size="10" maxlength="30" required value="<?php echo $sancionf['FechaInicio'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Fecha de final:</label>
								<br>
								<input id="FechaFinal" type="date" name="FechaFinal" oninput="fechaDespuesValidar();"size="10" maxlength="30" required value="<?php echo $sancionf['FechaFinal'];?>" >
							</div>
							<br/>
							
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir sancion
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>