<?php	
	session_start();	
	
	if (isset($_SESSION["matricula"])) {
		$matricula = $_SESSION["matricula"];
		unset($_SESSION["matricula"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		require_once("validacion.php");
		
		$valido=true;
		if (!validarBono($matricula["BONO"])) {
			$valido = false;
		}
		if (!validarCoste($matricula["COSTE"])) {
			$valido = false;
		}
		if (!$valido) {
			$_SESSION['Volver'] = "matricula.php";
			header("Location:errores.php");
		} else {
		$conexion = crearConexionBD();		
		$excepcion = modificar_matricula($conexion,$matricula["ID_MATRICULA"],$matricula["BONO"],$matricula["COSTE"]);
		cerrarConexionBD($conexion);
			session_unset();
			session_destroy();
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "matricula.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: matricula.php");
	} 
	}
	else Header("Location: matricula.php"); // Se ha tratado de acceder directamente a este PHP
?>
