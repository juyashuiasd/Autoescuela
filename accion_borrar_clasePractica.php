<?php	
	session_start();	
	
	if (isset($_SESSION["clasepractica"])) {
		$clasepractica = $_SESSION["clasepractica"];
		unset($_SESSION["clasepractica"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		
		$conexion = crearConexionBD();		
		$excepcion = borrar_clase_practica($conexion,$clasepractica["ID_CLASE_PRACTICA"]);
		cerrarConexionBD($conexion);
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "clasePractica.php";
			Header("Location: excepcion.php");
		}
		else Header("Location: clasePractica.php");
	}
	else Header("Location: clasePractica.php"); // Se ha tratado de acceder directamente a este PHP
?>
