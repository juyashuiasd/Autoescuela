<?php	
	session_start();	
	
	if (isset($_SESSION["sancion"])) {
		$sancion = $_SESSION["sancion"];
		unset($_SESSION["sancion"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_sancion($conexion,$sancion["ID_SANCION"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "sancion.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: sancion.php");
	}
	else Header("Location: sancion.php"); // Se ha tratado de acceder directamente a este PHP
?>
