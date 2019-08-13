<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['convocatoriaf']=$form;
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

			$conexion = CrearConexionBD();
			$excepcion=anadir_convocatoria($_REQUEST["Fecha"],$_REQUEST["Tipo_convocatoria"],$_REQUEST["Calificacion"] ,$_REQUEST["Id_persona"],$_REQUEST["Id_tipo_carne"], $conexion);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "convocatoria.php";
			Header("Location: excepcion.php");
		}
		else {
			Header("Location: convocatoria.php");
			session_unset();
			session_destroy();
		}
		?>
		
	</body>
</html>
