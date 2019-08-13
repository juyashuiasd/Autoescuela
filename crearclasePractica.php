<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['clasepracticaf']=$form;
require_once ("validacion.php");
require_once("gestionBD.php");
require_once("gestionarBD.php")
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css"  />
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<title>Éxito</title>
	</head>
	<body>
		<?php
		
			$conexion = CrearConexionBD();
			$excepcion=anadir_clase_practica(utf8_decode($_REQUEST["Fecha"]), $_REQUEST["Id_matricula"],$_REQUEST["Id_jornada_laboral"],$_REQUEST["Id_tipo_carne"], $conexion);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "clasePractica.php";
			Header("Location: excepcion.php");
		}
		else {
			Header("Location: clasePractica.php");
			session_unset();
			session_destroy();
		}
		?>
	</body>
</html>
