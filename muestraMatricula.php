<?php	
	session_start();
	
	if (isset($_REQUEST["ID_MATRICULA"])){
		$matricula["ID_MATRICULA"] = $_REQUEST["ID_MATRICULA"];
		$matricula["ID_PERSONA"] = $_REQUEST["ID_PERSONA"];
		$matricula["FECHA_INICIAL"] = $_REQUEST["FECHA_INICIAL"];
		$matricula["FECHA_FINAL"] = $_REQUEST["FECHA_FINAL"];
		$matricula["BONO"] = $_REQUEST["BONO"];
		$matricula["COSTE"] = $_REQUEST["COSTE"];
		$matricula["ID_TIPO_CARNE"] = $_REQUEST["ID_TIPO_CARNE"];
		
		$_SESSION["matricula"] = $matricula;
		if (isset($_REQUEST["editar"])) Header("Location: matricula.php"); 
		else if (isset($_REQUEST["grabar"])) Header("Location: accion_modificar_matricula.php");
		else /* if (isset($_REQUEST["borrar"])) */ Header("Location: accion_borrar_matricula.php"); 
	} else Header("Location: matricula.php");
?>