<?php	
	session_start();	
	
	if (isset($_SESSION["matricula"])) {
		$matricula = $_SESSION["matricula"];
		unset($_SESSION["matricula"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_matricula($conexion,$matricula["ID_MATRICULA"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "matricula.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: matricula.php");
	}
	else Header("Location: matricula.php"); // Se ha tratado de acceder directamente a este PHP
?>
