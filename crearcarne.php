<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['carnef']=$form;
require_once ("validacion.php");
require_once("gestionBD.php");
require_once("gestionarBD.php")
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" />
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<title>Éxito</title>
	</head>
	<body>
		<?php
		$valido = true;

		if (!validarFecha($_REQUEST["FechaInicio"],$_REQUEST["FechaCaducidad"])) {
			$valido = false;
		}

		if (!$valido) {
			$_SESSION['Volver'] = "carnecrear.php";
			header("Location:errores.php");
		} else {
			$conexion = CrearConexionBD();
			$waddup=anadir_carne($_REQUEST["Id_tipo_carne"],$_REQUEST["FechaInicio"],$_REQUEST["FechaCaducidad"],$_REQUEST["Id_persona"], $conexion);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "carne.php";
			Header("Location: excepcion.php");
		}
		else {
			Header("Location: carne.php");
			session_unset();
			session_destroy();
		}
		}
		?>
	</body>
</html>
