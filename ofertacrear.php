<?php
	session_start();
		if(!isset($_SESSION['ofertaf'])){
		$ofertaf['Regalo'] = "";
		$ofertaf['Descuento'] = "";
		$_SESSION['ofertaf']=$ofertaf;
		}else {
			$ofertaf = $_SESSION['ofertaf']; 
			
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

		<title>Oferta</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
		<script src="https://code.jquery.com/jquery-3.1.1.min.js" type="text/javascript"></script>
  <script src="js/validacion_oferta.js" type="text/javascript"></script>
	</head>

	<body>

		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
<form onsubmit="return validateForm()" action="crearoferta.php">
				
				<fieldset>
					<legend align="left">
						Oferta:
					</legend>
					<table width="100%" border="0" cellspacing="0" cellpadding="10">
						<tr>
							<td>
							<div id="regalo">
								<label>Regalo:</label>
								<br>
								<input id="Regalo" type="Number" name="Regalo" oninput="regaloValidar();" size="30" maxlength="30" value="<?php echo $ofertaf['Regalo'];?>" required="required">
							</div>
							<br />
							<div id="descuento">
								<label>Descuento:</label>
								<br>
								<input id="Descuento" type="Number" name="Descuento" oninput="descuentoValidar();" size="10" maxlength="30" value="<?php echo $ofertaf['Descuento'];?>" required="required">
							</div>
							<br/>
							
						</tr>
					</table>
				</fieldset>
				<br>
				<div id="botones" align="center">
					<button name="submit" type="submit">
						Añadir oferta
					</button>
					<button name="boton" type="reset">
						Borrar
					</button>
				</div>
			</form>












		
	</body>
</html>