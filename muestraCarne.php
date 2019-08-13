<?php	
	session_start();
	
	if (isset($_REQUEST["ID_CARNE"])){
		$carne["ID_CARNE"] = $_REQUEST["ID_CARNE"];
		$carne["ID_PERSONA"] = $_REQUEST["ID_PERSONA"];
		$carne["ID_TIPO_CARNE"] = $_REQUEST["ID_TIPO_CARNE"];
		$carne["FECHA_INICIO"] = $_REQUEST["FECHA_INICIO"];
		$carne["FECHA_CAD"] = $_REQUEST["FECHA_CAD"];
		
		$_SESSION["carne"] = $carne;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_carne.php"); 
	} else Header("Location: carne.php");
?>