<?php
session_start();

	foreach ($_REQUEST as $c => $datos){ //Recuperando formulario
		$form[$c]=$datos;
	}
	$_SESSION['clientef']=$form;
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

		if (!validarNombre($_REQUEST["Nombre"])) {
			$valido = false;
		}
		if (!validarApellido($_REQUEST["Apellidos"])) {
			$valido = false;
		}
		if (!validarDNI($_REQUEST["Dni"])) {
			$valido = false;
		} 
		if (!validarTelefono($_REQUEST["Telefono"])) {
			$valido = false;
		}
		if (!validarEmail($_REQUEST["Email"])) {
			$valido = false;
		} 

		if (!$valido) {
			$_SESSION['Volver'] = "clientecrear.php";
			header("Location:errores.php");
		} else {
			$conexion = CrearConexionBD();
			$excepcion=anadir_cliente($_REQUEST["Nombre"],$_REQUEST["Apellidos"],$_REQUEST["FechaNacimiento"],$_REQUEST["Dni"],'Cliente',$_REQUEST["Telefono"], $_REQUEST["Email"], $conexion);
			CerrarConexionBD($conexion);
			if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "cliente.php";
			Header("Location: excepcion.php");
		} else {
			Header("Location: cliente.php");
			session_unset();
			session_destroy();
		}
		}
		?>
	</body>
</html>
