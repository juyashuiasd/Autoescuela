<?php	
	session_start();	
	
	if (isset($_SESSION["cliente"])) {
		$cliente = $_SESSION["cliente"];
		unset($_SESSION["cliente"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_cliente($conexion,$cliente["ID_CLIENTE"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "cliente.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: cliente.php");
	}
	else Header("Location: cliente.php"); // Se ha tratado de acceder directamente a este PHP
?>
