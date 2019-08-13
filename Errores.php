<html><head>
		<link rel="stylesheet" />
		<link rel="icon" type="image/png" href="../images/cochecito.png" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Errores</title>
	</head>
	<body>
		<fieldset><legend>Errores:</legend>
<ul class="error">
<?php
session_start();
	echo"<div id=\"registro\">";	
	
if (($_SESSION['Nombre']) != "")
	echo "<li>" . $_SESSION['Nombre'] . "</li><br>";
if (($_SESSION['Apellidos']) != "")
	echo "<li>" . $_SESSION['Apellidos'] . "</li><br>";
if (($_SESSION['Email']) != "")
	echo "<li>" . $_SESSION['Email'] . "</li><br>";
if (($_SESSION['Telefono']) != "")
	echo "<li>" . $_SESSION['Telefono'] . "</li><br>";
if (($_SESSION['Dni']) != "")
	echo "<li>" . $_SESSION['Dni'] . "</li><br>";
if (($_SESSION['Regalo']) != "")
	echo "<li>" . $_SESSION['Regalo'] . "</li><br>";
if (($_SESSION['Descuento']) != "")
	echo "<li>" . $_SESSION['Descuento'] . "</li><br>";
if (($_SESSION['Bono']) != "")
	echo "<li>" . $_SESSION['Bono'] . "</li><br>";
if (($_SESSION['Coste']) != "")
	echo "<li>" . $_SESSION['Coste'] . "</li><br>";
if (($_SESSION['Fechas']) != "")
	echo "<li>" . $_SESSION['Fechas'] . "</li><br>";
if (($_SESSION['Tipo_Carne']) != "")
	echo "<li>" . $_SESSION['Tipo_Carne'] . "</li><br>";
if (($_SESSION['Duracion']) != "")
	echo "<li>" . $_SESSION['Duracion'] . "</li><br>";
if (($_SESSION['Volver']) != "")
	echo "<b><h3> Pulse <a href=\"".$_SESSION['Volver']."\">aquí</a> para volver a la página anterior.</h3></b><br>";

else{
echo "<b><h3> Pulse <a href=\"admin.html\">aquí</a> para volver a la página principal.</h3></b><br>";
}
echo"</div>";
?></ul></fieldset></body>
</html>