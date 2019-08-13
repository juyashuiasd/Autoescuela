<?php
session_start();
$_SESSION['Telefono'] = "";
$_SESSION['Nombre'] = "";
$_SESSION['Apellidos'] = "";
$_SESSION['Fecha'] = "";
$_SESSION['Dni'] = "";
$_SESSION['Email'] = "";
$_SESSION['Regalo']="";
$_SESSION['Descuento']="";
$_SESSION['Bono']="";
$_SESSION['Coste']="";
$_SESSION['Fechas']="";
$_SESSION['Tipo_Carne']="";
$_SESSION['Duracion']="";

require_once("gestionBD.php");
require_once("gestionarBD.php");

function validarNombre($Nombre) {
	$valido = true;
	if ($Nombre == "") {
		$_SESSION['Nombre'] = "El nombre no puede estar vacío";
		$valido = false;

	}
	return $valido;
}
function validarApellido($Apellido) {
	$valido = true;
	if ($Apellido == "") {
		$_SESSION['Apellidos'] = "El apellido no puede estar vacío";
		$valido = false;
	}
	return $valido;
}

function validarTelefono($Telefono) {
	$valido = true;
	if ($Telefono == "") {
		$_SESSION['Telefono'] = "El teléfono no puede estar vacío";
		$valido = false;
	} else {
		if (!preg_match('/^[9|6|7][0-9]{8}$/', $Telefono)) {
			$valido = false;
			$_SESSION['Telefono'] = "El teléfono no es correcto o no existe";
		}
	}

	return $valido;
}

function validarEmail($Email) {
	$valido = true;
	if (filter_var($Email, FILTER_VALIDATE_EMAIL) == false) {
		$valido = false;
		$_SESSION['Email'] = "El email no es correcto";
		}
	return $valido;
}

function validarDNI($Dni){
	$valido = true;
	if(!preg_match("/^[0-9]{8}[A-Z]$/", $Dni)){
		$valido = false;
		$_SESSION["Dni"] = "El DNI no es correcto";
	} else if (!valid_NIF($Dni)){
		$valido = false;
		$_SESSION["Dni"]="Letra del NIF errónea!";
	}
	return $valido;
}
function valid_NIF($dnis){
		$letra=substr($dnis, -1); //-1 empieza por el final. Devuelve la letra del NIF
		$numeros= substr($dnis,0,-1); //Números del NIF
		$ind = $numeros%23; //La letra está en el elemento %ind
		$letra_calc = substr("TRWAGMYFPDXBNJZSQVHLCKE",$ind,1);
		return ($letra_calc==$letra)?true:false;
	}

function validarRegalo($Regalo){
$valido = true;
	if ($Regalo== "") {
		$_SESSION['Regalo'] = "El regalo no puede estar vacío";
		$valido = false;
	} else {
		if ($Regalo < 0) {
			$valido = false;
			$_SESSION['Regalo'] = "El regalo no puede ser negativo";
		}
	}

	return $valido;
}

function validarDescuento($Descuento){
$valido = true;
	if ($Descuento== "") {
		$_SESSION['Descuento'] = "El descuento no puede estar vacío";
		$valido = false;
	} else {
		if ($Descuento < 0 || $Descuento > 100) {
			$valido = false;
			$_SESSION['Descuento'] = "El descuento debe encontrarse entre 0 y 100";
		}
	}

	return $valido;
}

function validarBono($Bono){
$valido = true;
	if ($Bono== "") {
		$_SESSION['Bono'] = "El bono no puede estar vacío";
		$valido = false;
	} else {
		if ($Bono < 0) {
			$valido = false;
			$_SESSION['Bono'] = "El bono no puede ser negativo";
		}
	}

	return $valido;
}

function validarCoste($Coste){
$valido = true;
	if ($Coste== "") {
		$_SESSION['Coste'] = "El coste no puede estar vacío";
		$valido = false;
	} else {
		if ($Coste < 0) {
			$valido = false;
			$_SESSION['Coste'] = "El coste no puede ser negativo";
		}
	}

	return $valido;
}

function validarFecha($FechaInicial,$FechaFinal){
$valido = true;
	if ($FechaInicial== "" || $FechaFinal=="") {
		$_SESSION['Fechas'] = "Las fechas no pueden estar vacías";
		$valido = false;
	} else {
		if ($FechaFinal < $FechaInicial) {
			$valido = false;
			$_SESSION['Fechas'] = "La fecha final no puede ser menor que la fecha inicial";
		}
	}

	return $valido;
}

function validarDuracion($Duracion){
$valido = true;
	if ($Duracion== "") {
		$_SESSION['Duracion'] = "La duración no puede estar vacía";
		$valido = false;
	} else {
		if ($Duracion < 1 || $Duracion > 8) {
			$valido = false;
			$_SESSION['Duracion'] = "La duración se comprende entre 1 y 8";
		}
	}

	return $valido;
}

?>