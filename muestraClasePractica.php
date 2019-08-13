<?php	
	session_start();
	
	if (isset($_REQUEST["ID_CLASE_PRACTICA"])){
		$clasepractica["ID_CLASE_PRACTICA"] = $_REQUEST["ID_CLASE_PRACTICA"];
		$clasepractica["FECHA"] = $_REQUEST["FECHA"];
		$clasepractica["ID_MATRICULA"] = $_REQUEST["ID_MATRICULA"];
		$clasepractica["ID_JORNADA_LABORAL"] = $_REQUEST["ID_JORNADA_LABORAL"];
		$clasepractica["ID_TIPO_CARNE"] = $_REQUEST["ID_TIPO_CARNE"];
		$_SESSION["clasepractica"] = $clasepractica;
		if (isset($_REQUEST["borrar"])) Header("Location: accion_borrar_clasePractica.php"); 
	} else Header("Location: clasePractica.php");
?>