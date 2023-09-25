<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="styles_consultas.css">
	<link rel="icon" type="image/png" href="../images/icono.png" />
	<title> Borrar de Datos </title>
</head>
<body>		
	<div class="nav">
		<nav>
		<p class="titulo">APP DE INVENTARIO</p>
		<ul>
			<li><a href="../index.html">Inicio</a></li>
			<li><a href="../Caracteristicas.html">Caracteristicas</b></a></li>
			<li><a href="../Planes.html">Planes</a></li>
			<li><a href="../Contacto.html">Contacto</a></li>
			<li><a href="../Nosotros.html">Sobre Nosotros</a></li>
		</ul>
	</nav>
	</div>
	<center>
	<h1> Digte el prodcuto que desea borrar </h1>
	<form action="borrar.php" method="POST">
		<table class="p" cellspacing="7px">
			<tr>
				<td><b>ID producto:</b></td><td><input type="text" name="bpd"></td><td><input type="submit" name="Borrar" value="Borrar" class="btn1"></td>
			</tr>
		</table><br>
	<input class="btn"  onClick="window.location.href='inicio.html'" name="submit" type="button" value="Volver"/> <br><br>
	</form><br><br>
	</center>
	<footer><center><br>COPYRIGHT © 2018 Inventory Software S.A.S.</center></footer>
	</rp>
<?php

if(isset($_POST['Borrar']))
{
	include("abrir_conexion.php");

	$borrar = $_POST['bpd'];

	$sql = "DELETE FROM $tabla_pd WHERE id_prod=$borrar"; 
	mysqli_query($conexion,$sql);    

	include("cerrar_conexion.php");
}

?>

</body>
</html>