<?php	
	session_start();	
	
	if (isset($_SESSION["carne"])) {
		$carne = $_SESSION["carne"];
		unset($_SESSION["carne"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_clase_practica($conexion,$carne["ID_CARNE"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "carne.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: carne.php");
	}
	else Header("Location: carne.php"); // Se ha tratado de acceder directamente a este PHP
?>
