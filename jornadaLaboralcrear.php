<?php
	session_start();
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
		if(!isset($_SESSION['jornadalaboralf'])){
		$jornadalaboralf['Id_tipo_carne'] = "";
		$jornadalaboralf['Fecha'] = "";
		$jornadalaboralf['Duracion'] = "";
		$jornadalaboralf['Id_persona'] = "";
		$_SESSION['jornadalaboralf']=$jornadalaboralf;
		}else {
			$jornadalaboralf = $_SESSION['jornadalaboralf']; 
			
		}

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title>Jornada Laboral</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
			<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_jornada_laboral.js" type="text/javascript"></script>
	</head>

	<body>

		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validateForm()" action="crearjornadaLaboral.php">
				
				<fieldset>
					<legend align="left">
						Jornada Laboral:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div><label for="carn">Tipo Carné:<em>*</em></label>
			<input list="opcionesCarne" name="Id_tipo_carne" id="Id_tipo_carne" required value="<?php echo $jornadalaboralf['Id_tipo_carne'];?>"/>
			<datalist id="opcionesCarne">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$carnes= listarTipoCarne($conexion);
					cerrarConexionBD($conexion);

			  		foreach($carnes as $Id_tipo_carne) {
			  			echo "<option label='".$Id_tipo_carne["TIPO_CARNE"]."' value='".$Id_tipo_carne["ID_TIPO_CARNE"]."'>";
					}
				?>
			</datalist>
			</div>
							<br /><div>
								<label for="carn">Id persona:<em>*</em></label>
							<input list="opcionesPersona" name="Id_persona" id="Id_persona" required value="<?php echo $jornadalaboralf['Id_persona'];?>"/>
			<datalist id="opcionesPersona">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$carnes= listarProfesor($conexion);
					cerrarConexionBD($conexion);

			  		foreach($carnes as $Id_tipo_carne) {
			  			echo "<option label='".$Id_tipo_carne["NOMBRE"]." ".$Id_tipo_carne["APELLIDOS"]."' value='".$Id_tipo_carne["ID_PERSONA"]."'>";
					}
				?>
			</datalist>
			</div>
							<br/>
							<div id="fecha">
								<label>Fecha:</label>
								<br>
								<input id="Fecha" type="date" name="Fecha" size="10" maxlength="30" required value="<?php echo $jornadalaboralf['Fecha'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Duración:</label>
								<br>
								<input id="Duracion" type="number" name="Duracion" pattern="[1-8]{1}" oninput="duracionValidar();" title="Entre 1 y 8" size="10" maxlength="30" required value="<?php echo $jornadalaboralf['Duracion'];?>" >
							</div>
							<br/>
							
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir jornada laboral
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>