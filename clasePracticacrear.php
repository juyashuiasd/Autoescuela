<?php
	session_start();
	require_once("gestionBD.php");
	require_once("gestionarBD.php");
		if(!isset($_SESSION['clasepracticaf'])){
		$clasepracticaf['Fecha'] = "";
		$clasepracticaf['Id_matricula'] = "";
		$clasepracticaf['Id_jornada_laboral'] = "";
		$clasepracticaf['Id_tipo_carne'] = "";
		$_SESSION['clasepracticaf']=$clasepracticaf;
		}else {
			$clasepracticaf = $_SESSION['clasepracticaf']; 
			
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

		<title>Clase Práctica</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body>

		<div id = "general">
			<img width="100%" alt = "Header" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validacion()" action="crearclasePractica.php">
				
				<fieldset>
					<legend align="left">
						Datos Personales:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							
								<label>Fecha:</label>
								<br>
								<input id="Fecha" type="date" name="Fecha" size="10" maxlength="30" required value="<?php echo $clasepracticaf['Fecha'];?>" >
							</div>
							<br/>
							<br/>
							<div><label for="matri">Matrícula:<em>*</em></label>
			<input list="opcionesMatricula" name="Id_matricula" id="Id_matricula" required value="<?php echo $clasepracticaf['Id_matricula'];?>"/>
			<datalist id="opcionesMatricula">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$carnes= listarMatricula($conexion);
					cerrarConexionBD($conexion);

			  		foreach($carnes as $Id_tipo_carne) {
			  			echo "<option label='"."Persona: ".$Id_tipo_carne["ID_PERSONA"]." Tipo carne: ".$Id_tipo_carne["ID_TIPO_CARNE"]."' value='".$Id_tipo_carne["ID_MATRICULA"]."'>";
					}
				?>
			</datalist>
			</div>
							<br/>
							<div><label for="carn">Jornada Laboral:<em>*</em></label>
			<input list="opcionesJornada" name="Id_jornada_laboral" id="Id_jornada_laboral" required value="<?php echo $clasepracticaf['Id_jornada_laboral'];?>"/>
			<datalist id="opcionesJornada">
			  	<?php
			  	$conexion=crearConexionBD();
			  		$jornadalaboral= listarJornadaLaboral($conexion);
					cerrarConexionBD($conexion);

			  		foreach($jornadalaboral as $jornada) {
			  			echo "<option label='".$jornada["ID_TIPO_CARNE"]."-".$jornada["FECHA"]."' value='".$jornada["ID_JORNADA_LABORAL"]."'>";
					}
				?>
				
			</datalist>
			<br>
				<br/>
			</div>
							<div><label for="carn">Tipo Carné:<em>*</em></label>
			<input list="opcionesCarne" name="Id_tipo_carne" id="Id_tipo_carne" required value="<?php echo $clasepracticaf['Id_tipo_carne'];?>"/>
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
						Añadir clase practica
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>