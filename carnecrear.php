<?php
	session_start();
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
		if(!isset($_SESSION['carnef'])){
		$carnef['Id_tipo_carne'] = "";
		$carnef['FechaInicio'] = "";
		$carnef['FechaCad'] = "";
		$carnef['Id_persona'] = "";
		$_SESSION['carnef']=$carnef;
		}else {
			$carnef = $_SESSION['carnef']; 
			
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

		<title>Carné</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_carne.js" type="text/javascript"></script>
	</head>

	<body>

		<div id = "general">
			<img width="100%" alt="Header" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearcarne.php">
				
				<fieldset>
					<legend align="left">
						Datos Personales:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div><label for="carn">Tipo Carné:<em>*</em></label>
			<input list="opcionesCarne" name="Id_tipo_carne" id="Id_tipo_carne" required value="<?php echo $carnef['Id_tipo_carne'];?>"/>
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
							<input list="opcionesPersona" name="Id_persona" id="Id_persona" required value="<?php echo $carnef['Id_persona'];?>"/>
			<datalist id="opcionesPersona">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$carnes= listarPersona($conexion);
					cerrarConexionBD($conexion);

			  		foreach($carnes as $Id_tipo_carne) {
			  			echo "<option label='".$Id_tipo_carne["NOMBRE"]." ".$Id_tipo_carne["APELLIDOS"]."' value='".$Id_tipo_carne["ID_PERSONA"]."'>";
					}
				?>
			</datalist>
			</div>
							<br/>
							<div id="fecha">
								<label>Fecha inicio:</label>
								<br>
								<input id="FechaInicio" type="date" name="FechaInicio" size="10" maxlength="30" required value="<?php echo $carnef['FechaInicio'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Fecha de caducidad:</label>
								<br>
								<input id="FechaCaducidad" type="date" name="FechaCaducidad" oninput="fechaDespuesValidar();" size="10" maxlength="30" required value="<?php echo $carnef['FechaCaducidad'];?>" >
							</div>
							<br/>
							
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir carné
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>