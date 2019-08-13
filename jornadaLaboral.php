<?php
session_start();

require_once ("gestionBD.php");
require_once ("gestionarBD.php");
require_once ("paginacion_consulta.php");

if (isset($_SESSION["jornadalaboral"])) {
		$jornadalaboral = $_SESSION["jornadalaboral"];
		unset($_SESSION["jornadalaboral"]);
	}


	// ¿Venimos simplemente de cambiar página o de haber seleccionado un registro ?
	// ¿Hay una sesión activa?
	if (isset($_SESSION["paginacion"]))
		$paginacion = $_SESSION["paginacion"];
	
	$pagina_seleccionada = isset($_GET["PAG_NUM"]) ? (int)$_GET["PAG_NUM"] : (isset($paginacion) ? (int)$paginacion["PAG_NUM"] : 1);
	$pag_tam = isset($_GET["PAG_TAM"]) ? (int)$_GET["PAG_TAM"] : (isset($paginacion) ? (int)$paginacion["PAG_TAM"] : 5);

	if ($pagina_seleccionada < 1) 		$pagina_seleccionada = 1;
	if ($pag_tam < 1) 		$pag_tam = 5;

	// Antes de seguir, borramos las variables de sección para no confundirnos más adelante
	unset($_SESSION["paginacion"]);

	$conexion = crearConexionBD();

	// La consulta que ha de paginarse
	$query = "SELECT * FROM JORNADA_LABORAL ORDER BY FECHA";

	// Se comprueba que el tamaño de página, página seleccionada y total de registros son conformes.
	// En caso de que no, se asume el tamaño de página propuesto, pero desde la página 1
	$total_registros = total_consulta($conexion, $query);
	$total_paginas = (int)($total_registros / $pag_tam);

	if ($total_registros % $pag_tam > 0)		$total_paginas++;

	if ($pagina_seleccionada > $total_paginas)		$pagina_seleccionada = $total_paginas;

	// Generamos los valores de sesión para página e intervalo para volver a ella después de una operación
	$paginacion["PAG_NUM"] = $pagina_seleccionada;
	$paginacion["PAG_TAM"] = $pag_tam;
	$_SESSION["paginacion"] = $paginacion;

	$filas = consulta_paginada($conexion, $query, $pagina_seleccionada, $pag_tam);

	cerrarConexionBD($conexion);

?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<link rel="icon" type="image/png" href="images/cochecito.png" />

		<!-- Always force latest IE rendering engine (even in intranet) & Chrome Frame
		Remove this if you use the .htaccess -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<title>Jornada Laboral</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>

	<body background="images/fondo.jpg">

		<div id = "general">
			<img width="100%" src = "images/header.jpg" />
	</div>
	
	<div>
			<a id="boton2" href="jornadaLaboralcrear.php" target="principal" style='width:100px; height:15px'>Nueva jornada laboral</a>
			<a id="boton2" href="admin.html" target="principal" >Volver al menú principal</a>


		</div>
		
		<main>

	 <nav>

		<div id="enlaces">

			<?php

				for( $pagina = 1; $pagina <= $total_paginas; $pagina++ )

					if ( $pagina == $pagina_seleccionada) { 	?>

						<span class="current"><?php echo $pagina; ?></span>

			<?php }	else { ?>

						<a href="jornadaLaboral.php?PAG_NUM=<?php echo $pagina; ?>&PAG_TAM=<?php echo $pag_tam; ?>"><?php echo $pagina; ?></a>

			<?php } ?>

		</div>
		
		<form method="get" action="jornadaLaboral.php">

			<input id="PAG_NUM" name="PAG_NUM" type="hidden" value="<?php echo $pagina_seleccionada?>"/>

			Mostrando

			<input id="PAG_TAM" name="PAG_TAM" type="number"

				min="1" max="<?php echo $total_registros; ?>"

				value="<?php echo $pag_tam?>" autofocus="autofocus" />

			entradas de <?php echo $total_registros?>

			<input type="submit" value="Cambiar">

		</form>

	</nav>
		
		
		
		</br>

		<?php
		foreach($filas as $fila) {

	?>
	

	<article class="cliente">

		<form method="post" action="muestraJornadaLaboral.php">

			<div class="fila_cliente">

				<div class="datos_cliente">
					
					<input id="ID_PERSONA" name="ID_PERSONA"

						type="hidden" value="<?php echo $fila["ID_PERSONA"]; ?>"/>

					<input id="ID_JORNADA_LABORAL" name="ID_JORNADA_LABORAL"

						type="hidden" value="<?php echo $fila["ID_JORNADA_LABORAL"]; ?>"/>

					<input id="DURACION" name="DURACION"

						type="hidden" value="<?php echo $fila["DURACION"]; ?>"/>
						
						<input id="ID_TIPO_CARNE" name="ID_TIPO_CARNE"

						type="hidden" value="<?php echo $fila["ID_TIPO_CARNE"]; ?>"/>
						

					<input id="FECHA" name="FECHA"

						type="hidden" value="<?php echo $fila["FECHA"]; ?>"/>
						

						<div class="autor"><?php echo "Profesor: ".$fila["ID_PERSONA"] . " el día: " . $fila["FECHA"]?></div>
						<div class="autor"><?php echo "Dará: ".$fila["DURACION"]." horas de clase para el carné: ".$fila["ID_TIPO_CARNE"]; ?></div>
						
				</div>

				<div id="botones_fila">   

					<button id="borrar" name="borrar" type="submit" class="editar_fila">

						<img src="images/remove_menuito.bmp" class="editar_fila" alt="Borrar cliente">

					</button>
				</div>

				</div>

		</form>

	</article>



	<?php } ?>

</main>
	</body>
</html>