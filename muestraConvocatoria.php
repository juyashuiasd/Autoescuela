<?php	
	session_start();
	
	if (isset($_REQUEST["ID_CONVOCATORIA"])){
		$convocatoria["ID_CONVOCATORIA"] = $_REQUEST["ID_CONVOCATORIA"];
		$convocatoria["ID_PERSONA"] = $_REQUEST["ID_PERSONA"];
		$convocatoria["FECHA"] = $_REQUEST["FECHA"];
		$convocatoria["TIPO_CONVOCATORIA"] = $_REQUEST["TIPO_CONVOCATORIA"];
		$convocatoria["CALIFICACION"] = $_REQUEST["CALIFICACION"];
		$convocatoria["ID_TIPO_CARNE"] = $_REQUEST["ID_TIPO_CARNE"];
		
		$_SESSION["convocatoria"] = $convocatoria;
		if (isset($_REQUEST["editar"])) Header("Location: convocatoria.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_convocatoria.php");
		else /* if (isset($_REQUEST["borrar"])) */ Header("Location: accion_borrar_convocatoria.php"); 
	} else Header("Location: convocatoria.php");
?>