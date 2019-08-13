<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['matriculaf']=$form;
require_once ("validacion.php");
require_once("gestionBD.php");
require_once("gestionarBD.php")
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css"   />
<link rel="icon" type="image/png" href="../images/cochecito.png" />

		<title>Éxito</title>
	</head>
	<body>
		<?php
		$valido = true;

		if (!validarFecha($_REQUEST["FechaInicial"],$_REQUEST["FechaFinal"])) {
			$valido = false;
		}
		if (!validarBono($_REQUEST["Bono"])) {
			$valido = false;
		}
		if (!validarCoste($_REQUEST["Coste"])) {
			$valido = false;
		} 
		if (!$valido) {
			$_SESSION['Volver'] = "matriculacrear.php";
			header("Location:errores.php");
		} else {
			$conexion = CrearConexionBD();
			$excepcion=anadir_matricula($_REQUEST["Id_persona"],$_REQUEST["FechaInicial"], $_REQUEST["FechaFinal"] ,$_REQUEST["Bono"],$_REQUEST["Coste"],$_REQUEST["Id_tipo_carne"], $conexion);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "matricula.php";
			Header("Location: excepcion.php");
		}
		else {
			Header("Location: matricula.php");
			session_unset();
			session_destroy();
			}
		}
		?>
	</body>
</html>
