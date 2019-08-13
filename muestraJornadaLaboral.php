<?php	
	session_start();
	
	if (isset($_REQUEST["ID_JORNADA_LABORAL"])){
		$jornadalaboral["ID_JORNADA_LABORAL"] = $_REQUEST["ID_JORNADA_LABORAL"];
		$jornadalaboral["FECHA"] = $_REQUEST["FECHA"];
		$jornadalaboral["DURACION"] = $_REQUEST["DURACION"];
		$jornadalaboral["ID_TIPO_CARNE"] = $_REQUEST["ID_TIPO_CARNE"];
		$jornadalaboral["ID_PERSONA"] = $_REQUEST["ID_PERSONA"];
		$_SESSION["jornadalaboral"] = $jornadalaboral;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_jornadaLaboral.php"); 
	} else Header("Location: clasePractica.php");
?>