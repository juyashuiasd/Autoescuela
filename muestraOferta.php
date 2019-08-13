<?php	
	session_start();
	
	if (isset($_REQUEST["ID_OFERTA"])){
		$oferta["ID_OFERTA"] = $_REQUEST["ID_OFERTA"];
		$oferta["REGALO"] = $_REQUEST["REGALO"];
		$oferta["DESCUENTO"] = $_REQUEST["DESCUENTO"];
		
		$_SESSION["oferta"] = $oferta;
		if (isset($_REQUEST["editar"])) Header("Location: oferta.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_oferta.php");
		else /* if (isset($_REQUEST["borrar"])) */ Header("Location: accion_borrar_oferta.php"); 
	} else Header("Location: oferta.php");
?>