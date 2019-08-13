<?php	
	session_start();
	
	if (isset($_REQUEST["ID_PERSONA"])){
		$profesor["ID_PROFESOR"] = $_REQUEST["ID_PERSONA"];
		$profesor["NOMBRE"] = $_REQUEST["NOMBRE"];
		$profesor["APELLIDOS"] = $_REQUEST["APELLIDOS"];
		$profesor["DNI"] = $_REQUEST["DNI"];
		$profesor["FECHA_NAC"] = $_REQUEST["FECHA_NAC"];
		$profesor["TELEFONO"] = $_REQUEST["TELEFONO"];
		$profesor["EMAIL"] = $_REQUEST["EMAIL"];
		
		$_SESSION["profesor"] = $profesor;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_profesor.php"); 
	} else Header("Location: profesor.php");
?>