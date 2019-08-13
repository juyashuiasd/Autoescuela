<?php
    function consultarCliente($conexion) {
	try {

		$stmt = $conexion -> prepare("SELECT * FROM PERSONA");
		$stmt -> execute();
	} catch(PDOException $e) {
		$_SESSION['excepcionBD']="Error de seleccionar cliente";
		header("Location:errores.php");
	}
	return $stmt;
}
	
	function borrar_cliente($conexion,$ID_CLIENTE) {
	try {
		$stmt=$conexion->prepare("DELETE FROM PERSONA WHERE ID_PERSONA=:ID_CLIENTE");
		$stmt->bindParam(':ID_CLIENTE',$ID_CLIENTE);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	function borrar_matricula($conexion,$ID_MATRICULA) {
	try {
		$stmt=$conexion->prepare("DELETE FROM MATRICULA WHERE ID_MATRICULA=:ID_MATRICULA");
		$stmt->bindParam(':ID_MATRICULA',$ID_MATRICULA);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	
	function borrar_profesor($conexion,$ID_PROFESOR) {
	try {
		$stmt=$conexion->prepare("DELETE FROM PERSONA WHERE ID_PERSONA=:ID_PROFESOR");
		$stmt->bindParam(':ID_PROFESOR',$ID_PROFESOR);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	
	function borrar_oferta($conexion,$ID_OFERTA) {
	try {
		$stmt=$conexion->prepare("DELETE FROM OFERTA WHERE ID_OFERTA=:ID_OFERTA");
		$stmt->bindParam(':ID_OFERTA',$ID_OFERTA);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	function borrar_sancion($conexion,$ID_SANCION) {
	try {
		$stmt=$conexion->prepare("DELETE FROM SANCION WHERE ID_SANCION=:ID_SANCION");
		$stmt->bindParam(':ID_SANCION',$ID_SANCION);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
function borrar_clase_practica($conexion,$ID_CLASE_PRACTICA) {
	try {
		$stmt=$conexion->prepare("DELETE FROM CLASE_PRACTICA WHERE ID_CLASE_PRACTICA=:ID_CLASE_PRACTICA");
		$stmt->bindParam(':ID_CLASE_PRACTICA',$ID_CLASE_PRACTICA);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
function borrar_carne($conexion,$ID_CARNE) {
	try {
		$stmt=$conexion->prepare("DELETE FROM CARNE WHERE ID_CARNE=:ID_CARNE");
		$stmt->bindParam(':ID_CARNE',$ID_CARNE);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}

function borrar_convocatoria($conexion,$ID_CONVOCATORIA) {
	try {
		$stmt=$conexion->prepare("DELETE FROM CONVOCATORIA WHERE ID_CONVOCATORIA=:ID_CONVOCATORIA");
		$stmt->bindParam(':ID_CONVOCATORIA',$ID_CONVOCATORIA);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
function borrar_jornada_laboral($conexion,$ID_JORNADA_LABORAL) {
	try {
		$stmt=$conexion->prepare("DELETE FROM JORNADA_LABORAL WHERE ID_JORNADA_LABORAL=:ID_JORNADA_LABORAL");
		$stmt->bindParam(':ID_JORNADA_LABORAL',$ID_JORNADA_LABORAL);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	
	function modificar_oferta($conexion,$ID_OFERTA,$REGALO,$DESCUENTO) {
	try {
		
		$stmt=$conexion->prepare("UPDATE OFERTA SET REGALO =:REGALO,DESCUENTO=:DESCUENTO WHERE ID_OFERTA = :ID_OFERTA");
		$stmt->bindParam(':ID_OFERTA',$ID_OFERTA);
		$stmt->bindParam(':DESCUENTO',$DESCUENTO);
		$stmt->bindParam(':REGALO',$REGALO);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	function anadir_cliente($NOMBRE, $APELLIDOS,$FECHANACIMIENTO,$DNI,$CLIENTE, $TELEFONO, $EMAIL, $conexion){
		
		$fechas = date('d/m/Y', strtotime($FECHANACIMIENTO));
		
		try{
			$consulta = 'CALL anadir_persona(:NOMBRE,:APELLIDOS,:FECHANACIMIENTO,:DNI,:CLIENTE,:TELEFONO,:EMAIL)';
			$stmt=$conexion->prepare($consulta);
			$stmt->bindParam(':NOMBRE',$NOMBRE);
			$stmt->bindParam(':APELLIDOS',$APELLIDOS);
			$stmt->bindParam(':FECHANACIMIENTO',$fechas);
			$stmt->bindParam(':DNI',$DNI);
			$stmt->bindParam(':TELEFONO',$TELEFONO);
			$stmt->bindParam(':EMAIL',$EMAIL);
			$stmt->bindParam(':CLIENTE',$CLIENTE);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	function anadir_profesor($NOMBRE, $APELLIDOS,$FECHANACIMIENTO,$DNI,$CLIENTE, $TELEFONO, $EMAIL, $conexion){
		$fechas = date('d/m/Y', strtotime($FECHANACIMIENTO));
		try{
			$stmt=$conexion->prepare('CALL anadir_persona(:NOMBRE,:APELLIDOS,:FECHANACIMIENTO,:DNI,:CLIENTE,:TELEFONO,:EMAIL)');
			$stmt->bindParam(':NOMBRE',$NOMBRE);
			$stmt->bindParam(':APELLIDOS',$APELLIDOS);
			$stmt->bindParam(':FECHANACIMIENTO',$fechas);
			$stmt->bindParam(':DNI',$DNI);
			$stmt->bindParam(':TELEFONO',$TELEFONO);
			$stmt->bindParam(':EMAIL',$EMAIL);
			$stmt->bindParam(':CLIENTE',$CLIENTE);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	function anadir_convocatoria($FECHA, $TIPO_CONVOCATORIA,$CALIFICACION,$ID_PERSONA,$ID_TIPO_CARNE, $conexion){
		$fechas = date('d/m/Y', strtotime($FECHA));
		try{
			$stmt=$conexion->prepare('CALL anadir_convocatoria(:FECHA,:TIPO_CONVOCATORIA,:CALIFICACION,:ID_PERSONA,:ID_TIPO_CARNE)');
			$stmt->bindParam(':FECHA',$fechas);
			$stmt->bindParam(':TIPO_CONVOCATORIA',$TIPO_CONVOCATORIA);
			$stmt->bindParam(':CALIFICACION',$CALIFICACION);
			$stmt->bindParam(':ID_PERSONA',$ID_PERSONA);
			$stmt->bindParam(':ID_TIPO_CARNE',$ID_TIPO_CARNE);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}

function anadir_clase_practica($FECHA, $ID_MATRICULA,$ID_JORNADA_LABORAL,$ID_TIPO_CARNE, $conexion){
	$fechas = date('d/m/Y', strtotime($FECHA));
		try{
			$stmt=$conexion->prepare('CALL anadir_clase_practica(:FECHA,:ID_TIPO_CARNE,:ID_MATRICULA,:ID_JORNADA_LABORAL)');
			$stmt->bindParam(':FECHA',$fechas);
			$stmt->bindParam(':ID_TIPO_CARNE',$ID_TIPO_CARNE);
			$stmt->bindParam(':ID_MATRICULA',$ID_MATRICULA);
			$stmt->bindParam(':ID_JORNADA_LABORAL',$ID_JORNADA_LABORAL);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	
	function anadir_oferta($REGALO,$DESCUENTO,$conexion){
		try{
			$stmt=$conexion->prepare('CALL anadir_oferta(:REGALO,:DESCUENTO)');
			$stmt->bindParam(':REGALO',$REGALO);
			$stmt->bindParam(':DESCUENTO',$DESCUENTO);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	function anadir_carne($ID_TIPO_CARNE,$FECHA_INICIO,$FECHA_CADUCIDAD,$ID_PERSONA,$conexion){
		$fechaIni = date('d/m/Y', strtotime($FECHA_INICIO));
		$fechaCad = date('d/m/Y', strtotime($FECHA_CADUCIDAD));	
		try{
			$stmt=$conexion->prepare('CALL anadir_carne(:ID_TIPO_CARNE,:FECHA_INICIO,:FECHA_CADUCIDAD,:ID_PERSONA)');
			$stmt->bindParam(':ID_TIPO_CARNE',$ID_TIPO_CARNE);
			$stmt->bindParam(':FECHA_INICIO',$fechaIni);
			$stmt->bindParam(':FECHA_CADUCIDAD',$fechaCad);
			$stmt->bindParam(':ID_PERSONA',$ID_PERSONA);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	function anadir_sancion($FECHAINICIO,$FECHAFINAL,$ID_PERSONA,$conexion){
		$fechaIni = date('d/m/Y', strtotime($FECHAINICIO));
		$fechaFin = date('d/m/Y', strtotime($FECHAFINAL));
		try{
			$stmt=$conexion->prepare('CALL anadir_sancion(:FECHAINICIO,:FECHAFINAL,:ID_PERSONA)');
			$stmt->bindParam(':FECHAINICIO',$fechaIni);
			$stmt->bindParam(':FECHAFINAL',$fechaFin);
			$stmt->bindParam(':ID_PERSONA',$ID_PERSONA);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	function anadir_jornada_laboral($FECHA,$DURACION,$ID_TIPO_CARNE,$ID_PERSONA,$conexion){
		$fechas = date('d/m/Y', strtotime($FECHA));
		try{
			$stmt=$conexion->prepare('CALL anadir_jornada_laboral(:FECHA,:DURACION,:ID_TIPO_CARNE,:ID_PERSONA)');
			$stmt->bindParam(':FECHA',$fechas);
			$stmt->bindParam(':DURACION',$DURACION);
			$stmt->bindParam(':ID_PERSONA',$ID_PERSONA);
			$stmt->bindParam(':ID_TIPO_CARNE',$ID_TIPO_CARNE);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
	
	
	function modificar_matricula($conexion,$ID_MATRICULA,$BONO,$COSTE) {
	try {
		
		$stmt=$conexion->prepare("CALL modificar_matricula(:BONO,:COSTE,:ID_MATRICULA)");
		$stmt->bindParam(':ID_MATRICULA',$ID_MATRICULA);
		$stmt->bindParam(':BONO',$BONO);
		$stmt->bindParam(':COSTE',$COSTE);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	function modificar_convocatoria($conexion,$ID_CONVOCATORIA,$CALIFICACION) {
	try {
		
		$stmt=$conexion->prepare("UPDATE CONVOCATORIA SET CALIFICACION=:CALIFICACION WHERE ID_CONVOCATORIA=:ID_CONVOCATORIA");
		$stmt->bindParam(':CALIFICACION',$CALIFICACION);
		$stmt->bindParam(':ID_CONVOCATORIA',$ID_CONVOCATORIA);
		$stmt->execute();
		return "";
	} catch(PDOException $e) {
		return $e->getMessage();
    }
}
	
	function listarTipoCarne($conexion){
	try{
		$consulta = "SELECT * FROM TIPO_CARNE ORDER BY ID_TIPO_CARNE";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}
	
	function listarJornadaLaboral($conexion){
	try{
		$consulta = "SELECT * FROM JORNADA_LABORAL ORDER BY ID_TIPO_CARNE,FECHA";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}
	function listarCliente($conexion){
	try{
		$consulta = "SELECT * FROM PERSONA WHERE TIPO_PERSONA='Cliente' ORDER BY ID_PERSONA";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}
function listarProfesor($conexion){
	try{
		$consulta = "SELECT * FROM PERSONA WHERE TIPO_PERSONA='Profesor' ORDER BY ID_PERSONA";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}

function listarPersona($conexion){
	try{
		$consulta = "SELECT * FROM PERSONA ORDER BY ID_PERSONA";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}
function listarMatricula($conexion){
	try{
		$consulta = "SELECT * FROM MATRICULA ORDER BY ID_MATRICULA";
    	$stmt = $conexion->query($consulta);
		return $stmt;
	}catch(PDOException $e) {
		return $e->getMessage();
    }
}

function anadir_matricula($ID_PERSONA, $FECHAINICIAL,$FECHAFINAL,$BONO,$COSTE, $ID_TIPO_CARNE, $conexion){
	$fechaIni = date('d/m/Y', strtotime($FECHAINICIAL));
	$fechaFin = date('d/m/Y', strtotime($FECHAFINAL));
		try{
			$stmt=$conexion->prepare('CALL anadir_matricula(:ID_PERSONA,:FECHAINICIAL,:FECHAFINAL,:BONO,:COSTE,:ID_TIPO_CARNE)');
			$stmt->bindParam(':ID_PERSONA',$ID_PERSONA);
			$stmt->bindParam(':FECHAINICIAL',$fechaIni);
			$stmt->bindParam(':FECHAFINAL',$fechaFin);
			$stmt->bindParam(':BONO',$BONO);
			$stmt->bindParam(':COSTE',$COSTE);
			$stmt->bindParam(':ID_TIPO_CARNE',$ID_TIPO_CARNE);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
	}
function anadir_usuario($conexion,$usuario,$contrasena) {
	try{
			$stmt=$conexion->prepare('CALL anadir_usuario(:USUARIO,:CONTRASENA)');
			$stmt->bindParam(':USUARIO',$usuario);
			$stmt->bindParam(':CONTRASENA',$contrasena);
			$stmt->execute();
			return "";
		} catch(PDOException $e){
			return $e->getMessage();
		}
}
function consultar_usuario($conexion,$USUARIO,$CONTRASENA) {
 	$consulta = "SELECT COUNT(*) FROM USUARIOS WHERE USUARIO=:USUARIO AND CONTRASENA=:CONTRASENA";
	$stmt = $conexion->prepare($consulta);
	$stmt->bindParam(':USUARIO',$USUARIO);
	$stmt->bindParam(':CONTRASENA',$CONTRASENA);
	$stmt->execute();
	return $stmt->fetchColumn();
}
?>