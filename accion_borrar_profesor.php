<?php	
	session_start();	
	
	if (isset($_SESSION["profesor"])) {
		$profesor = $_SESSION["profesor"];
		unset($_SESSION["profesor"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_profesor($conexion,$profesor["ID_PROFESOR"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "profesor.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: profesor.php");
	}
	else Header("Location: profesor.php"); // Se ha tratado de acceder directamente a este PHP
?>
