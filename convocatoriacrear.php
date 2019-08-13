<?php
	session_start();
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
		if(!isset($_SESSION['convocatoriaf'])){
		$convocatoriaf['Fecha'] = "";
		$convocatoriaf['Tipo_convocatoria'] = "";
		$convocatoriaf['Calificacion'] = "";
		$convocatoriaf['Id_persona'] = "";
		$convocatoriaf['Id_tipo_carne'] = "";
		$_SESSION['convocatoriaf']=$convocatoriaf;
		}else {
			$convocatoriaf= $_SESSION['convocatoriaf']; 
			
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

		<title>Convocatoria</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body>

		<div id = "general">
			<img width="100%" alt = "Header" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearconvocatoria.php">
				
				<fieldset>
					<legend align="left">
						Convocatoria:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div id="nombre">
								<label>Fecha:</label>
								<br>
								<input id="Fecha" type="date" name="Fecha" size="30" maxlength="30" value="<?php echo $convocatoriaf['Fecha'];?>" required="required">
							</div>
							<br />
							<div id="apellidos">
								<label>Tipo Convocatoria:</label>
								<br>
								<label class="flotar">
				<input name="Tipo_convocatoria" class="butones" type="radio" value="Teórica" <?php if($convocatoriaf['Tipo_convocatoria']=='Teórica') echo ' checked ';?>/>
				Teórica</label>
			<label class="flotar">
				<input name="Tipo_convocatoria" type="radio" class="butones" value="Práctica" <?php if($convocatoriaf['Tipo_convocatoria']=='Práctica') echo ' checked ';?>/>
				Práctica</label>
			
							</div>
							<br/>
							<div id="fecha">
								<label>Calificación:</label>
								<br>
								<label class="flotar">
				<input name="Calificacion" type="radio" class="butones" value="Aprobado" <?php if($convocatoriaf['Calificacion']=='Aprobado') echo ' checked ';?>/>
				Aprobado</label>
			<label class="flotar">
				<input name="Calificacion" type="radio" class="butones" value="Suspenso" <?php if($convocatoriaf['Calificacion']=='Suspenso') echo ' checked ';?>/>
				Suspenso</label>
			
							</div>
							<br/>
							<div>
								<label for="carn">Id persona:<em>*</em></label>
							<input list="opcionesPersona" name="Id_persona" id="Id_persona" required value="<?php echo $convocatoriaf['Id_persona'];?>"/>
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
							<div><label for="carn">Tipo Carné:<em>*</em></label>
			<input list="opcionesCarne" name="Id_tipo_carne" id="Id_tipo_carne" required value="<?php echo $convocatoriaf['Id_tipo_carne'];?>"/>
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
						Añadir convocatoria
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>