<?php 
	session_start();
	$excepcion = $_SESSION["excepcion"];
	unset($_SESSION["excepcion"]);
	
	if (isset ($_SESSION["destino"])) {
		$destino = $_SESSION["destino"];
		unset($_SESSION["destino"]);	
	} else 
		$destino = "";
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../images/cochecito.png" />
  <link rel="stylesheet" type="text/css" href="css/errores.css" />
  <title>Autoescuela: ¡Se ha producido un problema!</title>
</head>
<body>	

	<div>
		<h2>Ups!</h2>
		<?php if ($destino<>"") { ?>
		<p>Ocurrió un problema durante el procesado de los datos. Pulse <a href="<?php echo $destino ?>">aquí</a> para volver a la página principal.</p>
		<?php } else { ?>
		<p>Ocurrió un problema para acceder a la base de datos. </p>
		<?php } ?>
	</div>
		
	<div class='excepcion'>	
		<?php echo "Información relativa al problema: $excepcion;" ?>
	</div>


</body>
</html>