<?php	
	session_start();	
	
	if (isset($_SESSION["jornadalaboral"])) {
		$jornadalaboral = $_SESSION["jornadalaboral"];
		unset($_SESSION["jornadalaboral"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_jornada_laboral($conexion,$jornadalaboral["ID_JORNADA_LABORAL"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "jornadaLaboral.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: jornadaLaboral.php");
	}
	else Header("Location: jornadaLaboral.php"); // Se ha tratado de acceder directamente a este PHP
?>
