<?php	
	session_start();	
	
	if (isset($_SESSION["convocatoria"])) {
		$convocatoria = $_SESSION["convocatoria"];
		unset($_SESSION["convocatoria"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		require_once("validacion.php");
		
		
		$conexion = crearConexionBD();		
		$excepcion = modificar_convocatoria($conexion,$convocatoria["ID_CONVOCATORIA"],$convocatoria["CALIFICACION"]);
		cerrarConexionBD($conexion);
			session_unset();
			session_destroy();
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "convocatoria.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: convocatoria.php");
	} 
	else Header("Location: convocatoria.php"); // Se ha tratado de acceder directamente a este PHP
?>
