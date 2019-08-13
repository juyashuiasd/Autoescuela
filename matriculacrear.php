<?php
	session_start();
	require_once("gestionarBD.php");
	require_once("gestionBD.php");
		if(!isset($_SESSION['matriculaf'])){
		$matriculaf['Id_persona'] = "";
		$matriculaf['FechaInicial'] = "";
		$matriculaf['FechaFinal'] = "";
		$matriculaf['Bono'] = "";
		$matriculaf['Coste'] = "";
		$matriculaf['Id_tipo_carne'] = "";
		$_SESSION['matriculaf']=$matriculaf;
		}else {
			$matriculaf = $_SESSION['matriculaf']; 
			
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

		<title>Matrícula</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_matricula.js" type="text/javascript"></script>
	</head>

	<body>

		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validateForm()" action="crearmatricula.php">
				
				<fieldset>
					<legend align="left">
						Matrícula:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div>
								<label for="carn">Id persona:<em>*</em></label>
							<input list="opcionesPersona" name="Id_persona" id="Id_persona" required value="<?php echo $matriculaf['Id_persona'];?>"/>
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
								<label>Fecha Inicial:</label>
								<br>
								<input id="FechaInicial" type="date" name="FechaInicial" size="10" maxlength="30" required value="<?php echo $matriculaf['FechaInicial'];?>" >
							</div>
							<br/>
							<div id="fecha">
								<label>Fecha Final:</label>
								<br>
								<input id="FechaFinal" type="date" name="FechaFinal" size="10" oninput="fechaDespuesValidar();" maxlength="30" required value="<?php echo $matriculaf['FechaFinal'];?>" >
							</div>
							<br/>
							<div id="bono">
								<label>Bono:</label>
								<br>
								<input id="Bono" type="Number" name="Bono" size="9" maxlength="9" oninput="bonoValidar();" required value="<?php echo $matriculaf['Bono'];?>" >
							</div>
							<br/>
							<div id="Coste">
								<label>Coste:</label>
								<br>
								<input id="Coste" type="Number" name="Coste" size="9" maxlength="9"  required value="<?php echo $matriculaf['Coste'];?>" >
							</div>
							<br/>
							<div><label for="carn">Tipo Carné:<em>*</em></label>
			<input list="opcionesCarne" name="Id_tipo_carne" id="Id_tipo_carne" required value="<?php echo $matriculaf['Id_tipo_carne'];?>"/>
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
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir matrícula
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>