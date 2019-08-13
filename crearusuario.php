<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['usuariof']=$form;
require_once ("validacion.php");
require_once("gestionBD.php");
require_once("gestionarBD.php")
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css"/>
<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<title>Éxito</title>
	</head>
	<body>
		
	
		<?php
		$valido = true;


		if (!$valido) {
			$_SESSION['Volver'] = "usuariocrear.php";
			header("Location:errores.php");
		} else {
			$conexion = CrearConexionBD();
			$excepcion=anadir_usuario($conexion,$_REQUEST["Usuario"],$_REQUEST["Contrasena"]);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "login.php";
			Header("Location: excepcion.php");
		} else {
			Header("Location: login.php");
			session_unset();
			session_destroy();
		}
		}
		?>
	</body>
</html>
