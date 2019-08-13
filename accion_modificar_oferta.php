<?php	
	session_start();	
	
	if (isset($_SESSION["oferta"])) {
		$oferta = $_SESSION["oferta"];
		unset($_SESSION["oferta"]);
		
		require_once("gestionBD.php");
		require_once("gestionarBD.php");
		require_once("validacion.php");
		
		$valido=true;
		if (!validarRegalo($oferta["REGALO"])) {
			$valido = false;
		}
		if (!validarDescuento($oferta["DESCUENTO"])) {
			$valido = false;
		}
		if (!$valido) {
			$_SESSION['Volver'] = "oferta.php";
			header("Location:errores.php");
		} else {
		$conexion = crearConexionBD();		
		$excepcion = modificar_oferta($conexion,$oferta["ID_OFERTA"],$oferta["REGALO"],$oferta["DESCUENTO"]);
		cerrarConexionBD($conexion);
			session_unset();
			session_destroy();
			
		if ($excepcion<>"") {
			$_SESSION["excepcion"] = $excepcion;
			$_SESSION["destino"] = "oferta.php";
			Header("Location: excepcion.php");
		}
		else
			Header("Location: oferta.php");
	} 
	}
	else Header("Location: oferta.php"); // Se ha tratado de acceder directamente a este PHP
?>
