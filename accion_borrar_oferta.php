<?php	
	session_start();	
	
	if (isset($_SESSION["oferta"])) {
		$oferta = $_SESSION["oferta"];
		unset($_SESSION["oferta"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_oferta($conexion,$oferta["ID_OFERTA"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "oferta.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: oferta.php");
	}
	else Header("Location: oferta.php"); // Se ha tratado de acceder directamente a este PHP
?>
