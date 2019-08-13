<?php	
	session_start();
	
	if (isset($_REQUEST["ID_PERSONA"])){
		$cliente["ID_CLIENTE"] = $_REQUEST["ID_PERSONA"];
		$cliente["NOMBRE"] = $_REQUEST["NOMBRE"];
		$cliente["APELLIDOS"] = $_REQUEST["APELLIDOS"];
		$cliente["DNI"] = $_REQUEST["DNI"];
		$cliente["FECHA_NAC"] = $_REQUEST["FECHA_NAC"];
		$cliente["TELEFONO"] = $_REQUEST["TELEFONO"];
		$cliente["EMAIL"] = $_REQUEST["EMAIL"];
		
		$_SESSION["cliente"] = $cliente;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_cliente.php"); 
	} else Header("Location: cliente.php");
?>