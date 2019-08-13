<?php	
	session_start();
	
	if (isset($_REQUEST["ID_SANCION"])){
		$sancion["ID_SANCION"] = $_REQUEST["ID_SANCION"];
		$sancion["ID_PERSONA"] = $_REQUEST["ID_PERSONA"];
		$sancion["FECHA_INICIO"] = $_REQUEST["FECHA_INICIO"];
		$sancion["FECHA_FINAL"] = $_REQUEST["FECHA_FINAL"];
		
		$_SESSION["sancion"] = $sancion;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_sancion.php"); 
	} else Header("Location: sancion.php");
?>